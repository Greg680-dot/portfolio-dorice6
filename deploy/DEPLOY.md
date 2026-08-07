# Déploiement sur VPS (Ubuntu/Debian, sans panel)

Objectif : faire tourner la vraie application Laravel (base de données, admin, upload de photos) au lieu du `static-export/` actuellement utilisé par le Dockerfile/nixpacks.toml/netlify.toml — c'est ce qui cause l'erreur 500 sur l'admin.

## 1. Paquets système

```bash
sudo apt update
sudo apt install -y nginx mysql-server php8.3-fpm php8.3-mysql php8.3-mbstring \
  php8.3-xml php8.3-curl php8.3-zip php8.3-gd php8.3-bcmath unzip git
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

## 2. Récupérer le projet

```bash
sudo mkdir -p /var/www/dorice-portfolio
sudo chown $USER:$USER /var/www/dorice-portfolio
git clone <url-du-repo> /var/www/dorice-portfolio
cd /var/www/dorice-portfolio
composer install --no-dev --optimize-autoloader
```

## 3. Configuration

```bash
cp .env.example .env
php artisan key:generate
```

Éditer `.env` : mettre `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://ton-domaine.com`, les identifiants MySQL (créer la base au préalable avec `mysql -u root -p`), `ADMIN_EMAIL`/`ADMIN_PASSWORD` (identifiants de connexion à `/admin` — mets un vrai mot de passe, pas la valeur par défaut), et les identifiants Brevo pour l'envoi d'emails (voir ci-dessous).

### Configurer Brevo pour l'envoi d'emails

1. Créer un compte sur [brevo.com](https://www.brevo.com) (gratuit jusqu'à 300 emails/jour).
2. Valider l'adresse d'expéditeur (celle qui ira dans `MAIL_FROM_ADDRESS`) dans **Expéditeurs, domaines & délivrabilité → Expéditeurs**.
3. Aller dans **Paramètres (icône engrenage) → SMTP & API → onglet SMTP**. Copier le **Login SMTP** affiché (une valeur du type `9xxxxx001@smtp-brevo.com` — ce n'est pas l'email du compte Brevo, c'est un identifiant technique dédié) et générer/copier la **clé SMTP** si ce n'est pas déjà fait.
4. Renseigner dans `.env` :

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp-relay.brevo.com
MAIL_PORT=587
MAIL_USERNAME=9xxxxx001@smtp-brevo.com
MAIL_PASSWORD=la-cle-smtp-brevo
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=contact@ton-domaine.com
MAIL_FROM_NAME="Dorice DJETON"
MAIL_TO_ADDRESS=djetondory@gmail.com
```

`MAIL_USERNAME` est bien le Login SMTP (`...@smtp-brevo.com`), jamais l'email de connexion au compte Brevo — c'est l'erreur la plus fréquente. `MAIL_FROM_ADDRESS` doit être une adresse validée dans Brevo, sinon les envois échouent. Aucune modification de code n'est nécessaire : Brevo est compatible SMTP standard, donc le mailer `smtp` déjà utilisé par le projet fonctionne tel quel.

## 4. Base de données, compte admin et stockage

```bash
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
sudo chown -R www-data:www-data storage bootstrap/cache public/images
sudo chmod -R 775 storage bootstrap/cache
```

`db:seed` crée (ou met à jour) le compte administrateur utilisé pour se connecter sur `/login`.

## 5. Nginx

Copier `deploy/nginx.conf` vers `/etc/nginx/sites-available/dorice-portfolio`, adapter `server_name` et le chemin du socket PHP-FPM (`php -v` pour vérifier la version), puis :

```bash
sudo ln -s /etc/nginx/sites-available/dorice-portfolio /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx
```

## 6. HTTPS

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d ton-domaine.com -d www.ton-domaine.com
```

## 7. Assets front (Vite)

```bash
npm install
npm run build
```

## Points de vigilance

- Ne plus copier/pointer vers `static-export/` : c'était un export figé sans backend, incompatible avec le formulaire admin.
- `EventController`/`TrophyController` écrivent les photos directement dans `public/images` — sur un VPS classique ça fonctionne (disque persistant), contrairement à un hébergement serverless en lecture seule.
- Le fichier de migration `2026_04_23_add_photo_to_events.php` a un nom non conforme (il manque l'heure). Ça ne bloque pas `migrate`, mais évite de le renommer une fois que `migrate` a tourné en production (ça casserait le suivi des migrations déjà appliquées).
- Après tout déploiement futur : `php artisan migrate --force`, `php artisan config:cache`, `php artisan route:cache`.
- `/admin` est maintenant protégé par une connexion (`/login`), avec une limite de 5 tentatives par minute contre le bruteforce. Le compte est créé par `php artisan db:seed` à partir de `ADMIN_EMAIL`/`ADMIN_PASSWORD` — change ce mot de passe régulièrement, notamment après la première connexion.
- Le formulaire de contact (`/contact`) envoie un email à `MAIL_TO_ADDRESS` (djetondory@gmail.com par défaut) via Brevo (voir section Configuration ci-dessus).
