import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const initRevealAnimations = () => {
    const elements = document.querySelectorAll('[data-reveal]');

    if (!elements.length) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        },
        {
            threshold: 0.14,
            rootMargin: '0px 0px -8% 0px',
        },
    );

    elements.forEach((element) => {
        const delay = element.dataset.delay;

        if (delay) {
            element.style.transitionDelay = `${delay}ms`;
        }

        observer.observe(element);
    });
};

const initStickyNavigation = () => {
    const nav = document.querySelector('[data-app-nav]');

    if (!nav) {
        return;
    }

    const sync = () => {
        nav.classList.toggle('is-scrolled', window.scrollY > 18);
    };

    sync();
    window.addEventListener('scroll', sync, { passive: true });
};

document.addEventListener('DOMContentLoaded', () => {
    initRevealAnimations();
    initStickyNavigation();
});
