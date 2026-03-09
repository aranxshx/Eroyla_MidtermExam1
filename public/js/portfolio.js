/* ============================================================
   E-Portfolio — Nothing × Apple JS
   Navbar hide/show on scroll + Scroll reveal + Active nav + Skill bars
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {

    /* ---------- Navbar: hide on scroll-down, show on scroll-up ---------- */
    const navbar = document.querySelector('.navbar-portfolio');
    if (navbar) {
        let lastScrollY = window.scrollY;
        let ticking = false;

        const updateNavbar = () => {
            const currentScrollY = window.scrollY;

            if (currentScrollY > 80) {
                navbar.classList.add('nav-scrolled');
            } else {
                navbar.classList.remove('nav-scrolled');
            }

            if (currentScrollY > lastScrollY && currentScrollY > 120) {
                navbar.classList.add('nav-hidden');
            } else {
                navbar.classList.remove('nav-hidden');
            }

            lastScrollY = currentScrollY;
            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(updateNavbar);
                ticking = true;
            }
        }, { passive: true });
    }

    /* ---------- Scroll Reveal (IntersectionObserver) ---------- */
    const reveals = document.querySelectorAll('.reveal');

    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.10, rootMargin: '0px 0px -30px 0px' });

        reveals.forEach(el => revealObserver.observe(el));
    } else {
        reveals.forEach(el => el.classList.add('revealed'));
    }

    /* ---------- Skill Bar Animation ---------- */
    const bars = document.querySelectorAll('.skill-bar');

    if (bars.length && 'IntersectionObserver' in window) {
        const barObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.width = entry.target.dataset.width || '0%';
                    barObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        bars.forEach(bar => barObserver.observe(bar));
    }

    /* ---------- Active Nav Link ---------- */
    const currentPath = window.location.pathname;
    document.querySelectorAll('.navbar-portfolio .nav-link').forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentPath || (currentPath === '/' && href === '/')) {
            link.classList.add('active');
        }
    });

});
