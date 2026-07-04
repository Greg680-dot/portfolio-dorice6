import AOS from 'aos';
import 'aos/dist/aos.css';

const phrases = [
    'Education aux medias',
    'Genre et medias',
    'Soft skills',
    'Capitalisation d experience',
    'Citoyennete numerique',
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

function animateCounter(element) {
    const target = Number(element.dataset.countTarget) || 0;
    const duration = 2000;
    let start = 0;
    const startTime = performance.now();

    function step(timestamp) {
        const progress = Math.min((timestamp - startTime) / duration, 1);
        const easeOut = 1 - Math.pow(1 - progress, 3);
        element.textContent = Math.floor(easeOut * target);
        if (progress < 1) {
            requestAnimationFrame(step);
        } else {
            element.textContent = target;
        }
    }

    requestAnimationFrame(step);
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

function initCounters() {
    const counters = document.querySelectorAll('[data-count-target]');
    if (!counters.length) {
        return;
    }

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                obs.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.4,
    });

    counters.forEach((counter) => observer.observe(counter));
}

// Curseur personnalisÃ© dynamique
// Particules flottantes
function initFloatingParticles() {
    const particlesContainer = document.createElement('div');
    particlesContainer.className = 'floating-particles';
    document.body.appendChild(particlesContainer);

    for (let i = 0; i < 50; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 20 + 's';
        particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
        particlesContainer.appendChild(particle);
    }
}

// Animation des cartes au scroll
function initCardAnimations() {
    const cards = document.querySelectorAll('.group.overflow-hidden');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.transform = 'translateY(0) scale(1)';
                    entry.target.style.opacity = '1';
                }, index * 100);
            }
        });
    }, {
        threshold: 0.1,
    });

    cards.forEach(card => {
        card.style.transform = 'translateY(30px) scale(0.95)';
        card.style.opacity = '0';
        card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        observer.observe(card);
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

// Animation des gradients
function initGradientAnimation() {
    const gradients = document.querySelectorAll('.animate-gradient');

    gradients.forEach(gradient => {
        gradient.style.animation = 'gradient-shift 8s ease-in-out infinite';
    });
}

// ThÃ¨me dynamique basÃ© sur l'heure
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
    }, 3600000); // VÃ©rifier chaque heure
}

// Tooltips interactifs
function initTooltips() {
    const tooltipElements = document.querySelectorAll('[data-tooltip]');

    tooltipElements.forEach(element => {
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip';
        tooltip.textContent = element.dataset.tooltip;
        document.body.appendChild(tooltip);

        element.addEventListener('mouseenter', (e) => {
            const rect = element.getBoundingClientRect();
            tooltip.style.left = rect.left + (rect.width / 2) + 'px';
            tooltip.style.top = rect.top - 10 + 'px';
            tooltip.classList.add('visible');
        });

        element.addEventListener('mouseleave', () => {
            tooltip.classList.remove('visible');
        });
    });
}

// Micro-interactions au scroll
function initScrollInteractions() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
            }
        });
    }, observerOptions);

    // Observer tous les Ã©lÃ©ments avec des classes d'animation
    document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));
}

// Effet de reveal au scroll
function initScrollReveal() {
    const reveals = document.querySelectorAll('.reveal-on-scroll');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    });

    reveals.forEach(reveal => revealObserver.observe(reveal));
}

// Animation des Ã©lÃ©ments au hover
function initHoverEffects() {
    const hoverElements = document.querySelectorAll('.hover-lift, .hover-glow, .hover-scale');

    hoverElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            element.style.transform = 'translateY(-8px) scale(1.02)';
            element.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
        });

        element.addEventListener('mouseleave', () => {
            element.style.transform = 'translateY(0) scale(1)';
            element.style.boxShadow = '';
        });
    });
}

// Effet de texte qui se rÃ©vÃ¨le lettre par lettre
function initTextReveal() {
    const textElements = document.querySelectorAll('.text-reveal');

    textElements.forEach(element => {
        const text = element.textContent;
        element.textContent = '';
        element.style.opacity = '1';

        for (let i = 0; i < text.length; i++) {
            setTimeout(() => {
                element.textContent += text[i];
            }, i * 50);
        }
    });
}

// Animation des icÃ´nes
function initIconAnimations() {
    const icons = document.querySelectorAll('.icon-animate');

    icons.forEach((icon, index) => {
        icon.style.animationDelay = `${index * 0.1}s`;
        icon.classList.add('animate-bounce-slow');
    });
}

// Effet de loading initial
function initLoadingAnimation() {
    const loader = document.createElement('div');
    loader.className = 'loading-overlay';
    loader.innerHTML = `
        <div class="loading-spinner">
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
            <div class="spinner-ring"></div>
        </div>
    `;
    document.body.appendChild(loader);

    window.addEventListener('load', () => {
        setTimeout(() => {
            loader.style.opacity = '0';
            setTimeout(() => loader.remove(), 500);
        }, 1000);
    });
}

window.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        easing: 'ease-out-cubic',
        duration: 1000,
        once: true,
        offset: 100,
    });

    updateHeroTyping();
    initScrollProgress();
    initCounters();
    initMobileNav();
    initFloatingParticles();
    initCardAnimations();
    initParallax();
    initGradientAnimation();
    initDynamicTheme();
    initTooltips();
    initScrollInteractions();
    initScrollReveal();
    initHoverEffects();
    initTextReveal();
    initIconAnimations();
    initLoadingAnimation();
});
