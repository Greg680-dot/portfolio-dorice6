import AOS from 'aos';
import 'aos/dist/aos.css';

const phrases = window.heroTypingPhrases && window.heroTypingPhrases.length
    ? window.heroTypingPhrases
    : [
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
    const backdrop = document.getElementById('mobile-menu-backdrop');
    const iconOpen = document.getElementById('mobile-menu-icon-open');
    const iconClose = document.getElementById('mobile-menu-icon-close');
    const label = document.getElementById('mobile-menu-button-label');

    if (!button || !menu) {
        return;
    }

    const openLabel = button.dataset.openLabel || (label ? label.textContent : '');
    const closeLabel = button.dataset.closeLabel || openLabel;

    const isOpen = () => button.getAttribute('aria-expanded') === 'true';

    const openMenu = () => {
        menu.classList.remove('max-h-0', 'opacity-0', 'invisible');
        menu.classList.add('max-h-[32rem]', 'opacity-100', 'visible');
        menu.removeAttribute('aria-hidden');
        menu.removeAttribute('inert');
        if (backdrop) {
            backdrop.classList.remove('opacity-0', 'invisible');
            backdrop.classList.add('opacity-100');
        }
        button.setAttribute('aria-expanded', 'true');
        iconOpen?.classList.add('hidden');
        iconClose?.classList.remove('hidden');
        if (label) {
            label.textContent = closeLabel;
        }
        const firstLink = menu.querySelector('a');
        firstLink?.focus();
    };

    const closeMenu = (returnFocus = false) => {
        menu.classList.add('max-h-0', 'opacity-0', 'invisible');
        menu.classList.remove('max-h-[32rem]', 'opacity-100', 'visible');
        menu.setAttribute('aria-hidden', 'true');
        menu.setAttribute('inert', '');
        if (backdrop) {
            backdrop.classList.add('opacity-0', 'invisible');
            backdrop.classList.remove('opacity-100');
        }
        button.setAttribute('aria-expanded', 'false');
        iconOpen?.classList.remove('hidden');
        iconClose?.classList.add('hidden');
        if (label) {
            label.textContent = openLabel;
        }
        if (returnFocus) {
            button.focus();
        }
    };

    button.addEventListener('click', () => {
        if (isOpen()) {
            closeMenu(true);
        } else {
            openMenu();
        }
    });

    backdrop?.addEventListener('click', () => closeMenu());

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && isOpen()) {
            closeMenu(true);
        }
    });

    menu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => closeMenu());
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && isOpen()) {
            closeMenu();
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

// Bascule manuelle entre mode sombre (par défaut) et mode clair, mémorisée dans localStorage
function initThemeToggle() {
    const toggles = [
        document.getElementById('theme-toggle'),
        document.getElementById('theme-toggle-mobile'),
    ].filter(Boolean);

    if (!toggles.length) {
        return;
    }

    const root = document.documentElement;

    const applyLabel = () => {
        const isLight = root.classList.contains('light');
        toggles.forEach(btn => {
            btn.setAttribute('aria-label', isLight ? 'Passer en mode sombre' : 'Passer en mode clair');
        });
    };

    applyLabel();

    toggles.forEach(btn => {
        btn.addEventListener('click', () => {
            const isLight = root.classList.toggle('light');
            localStorage.setItem('theme', isLight ? 'light' : 'dark');
            applyLabel();
        });
    });
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
    initThemeToggle();
    initFormSubmitGuard();
});
