import AOS from 'aos';
import 'aos/dist/aos.css';

const phrases = [
    'Éducation aux médias',
    'Genre et médias',
    'Soft skills',
    'Capitalisation d\'expérience',
    'Citoyenneté numérique',
    'Leadership des femmes',
];

let phraseIndex = 0;
let letterIndex = 0;
let isDeleting = false;

function updateHeroTyping() {
    const heroText = document.getElementById('hero-typed');
    if (!heroText) {
        return;
    }

    const currentPhrase = phrases[phraseIndex];
    heroText.textContent = currentPhrase.slice(0, letterIndex);

    if (!isDeleting) {
        letterIndex += 1;
        if (letterIndex > currentPhrase.length) {
            isDeleting = true;
            setTimeout(updateHeroTyping, 1800);
            return;
        }
    } else {
        letterIndex -= 1;
        if (letterIndex === 0) {
            isDeleting = false;
            phraseIndex = (phraseIndex + 1) % phrases.length;
        }
    }

    setTimeout(updateHeroTyping, isDeleting ? 50 : 100);
}

function initScrollProgress() {
    const progressBar = document.getElementById('scroll-progress');
    if (!progressBar) {
        return;
    }

    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const documentHeight = document.documentElement.scrollHeight - window.innerHeight;
        const percent = documentHeight > 0 ? (scrollTop / documentHeight) * 100 : 0;
        progressBar.style.width = `${percent}%`;
    });
}

function initMobileNav() {
    const button = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');

    if (!button || !menu) {
        return;
    }

    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        const expanded = menu.classList.contains('hidden') ? 'false' : 'true';
        button.setAttribute('aria-expanded', expanded);
    });

    menu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        });
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && !menu.classList.contains('hidden')) {
            menu.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        }
    });
}

// Effet de parallaxe subtil
function initParallax() {
    const parallaxElements = document.querySelectorAll('[data-parallax]');

    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;

        parallaxElements.forEach(element => {
            const rate = element.dataset.parallax || 0.5;
            const yPos = -(scrolled * rate);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });
}

// Thème dynamique basé sur l'heure
function initDynamicTheme() {
    const hour = new Date().getHours();
    const body = document.body;

    if (hour >= 18 || hour < 6) {
        body.classList.add('night-mode');
    } else {
        body.classList.add('day-mode');
    }

    // Changement automatique toutes les heures
    setInterval(() => {
        const currentHour = new Date().getHours();
        if (currentHour >= 18 || currentHour < 6) {
            body.classList.remove('day-mode');
            body.classList.add('night-mode');
        } else {
            body.classList.remove('night-mode');
            body.classList.add('day-mode');
        }
    }, 3600000); // Vérifier chaque heure
}

// Empêche le double-submit des formulaires (double-clic sur un bouton d'envoi)
function initFormSubmitGuard() {
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', () => {
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton && !submitButton.disabled) {
                submitButton.disabled = true;
                submitButton.classList.add('opacity-60', 'cursor-not-allowed');
            }
        });
    });
}

window.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        easing: 'ease-out-cubic',
        duration: 800,
        once: true,
        offset: 100,
    });

    updateHeroTyping();
    initScrollProgress();
    initMobileNav();
    initParallax();
    initDynamicTheme();
    initFormSubmitGuard();
});
