function initLandingPage() {
    let hasLandingUi = document.getElementById('navbar') && document.getElementById('mobile-menu');

    if (!hasLandingUi) {
        return;
    }

    // Theme toggle
    let key = 'pantoo-theme';
    let root = document.documentElement;
    let toggle = document.getElementById('theme-toggle');
    let iconSun = document.getElementById('icon-sun');
    let iconMoon = document.getElementById('icon-moon');

    function applyTheme(t) {
        root.dataset.theme = t;
        root.classList.toggle('dark', t === 'dark');
        if (iconSun && iconMoon) {
            iconSun.style.display = t === 'dark' ? 'none' : 'block';
            iconMoon.style.display = t === 'dark' ? 'block' : 'none';
        }
    }

    function getTheme() {
        let s = localStorage.getItem(key);
        if (s === 'light' || s === 'dark') return s;
        return matchMedia('(prefers-color-scheme:dark)').matches ? 'dark' : 'light';
    }

    applyTheme(getTheme());

    if (toggle) {
        toggle.addEventListener('click', function() {
            let next = root.dataset.theme === 'dark' ? 'light' : 'dark';
            localStorage.setItem(key, next);
            applyTheme(next);
        });
    }

    // Mobile menu
    let mobileToggle = document.getElementById('mobile-toggle');
    let mobileClose = document.getElementById('mobile-close');
    let mobileMenu = document.getElementById('mobile-menu');

    if (mobileToggle) {
        mobileToggle.addEventListener('click', function() {
            mobileMenu.classList.add('open');
            document.body.style.overflow = 'hidden';
        });
    }

    globalThis.closeMobileMenu = function() {
        mobileMenu.classList.remove('open');
        document.body.style.overflow = '';
    };

    if (mobileClose) {
        mobileClose.addEventListener('click', globalThis.closeMobileMenu);
    }

    // Navbar scroll shadow
    let navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 10) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }, { passive: true });

    // Scroll animations (Intersection Observer)
    let fadeEls = document.querySelectorAll('.fade-up');
    if ('IntersectionObserver' in globalThis) {
        let obs = new IntersectionObserver(function(entries) {
            entries.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    obs.unobserve(e.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        fadeEls.forEach(function(el) { obs.observe(el); });
    } else {
        fadeEls.forEach(function(el) { el.classList.add('visible'); });
    }

    // Hero solve carousel controls
    let heroSolveCarousel = document.getElementById('hero-solve-carousel');
    let heroSolvePrev = document.getElementById('hero-solve-prev');
    let heroSolveNext = document.getElementById('hero-solve-next');

    if (heroSolveCarousel && heroSolvePrev && heroSolveNext) {
        let heroSolveSlides = heroSolveCarousel.querySelectorAll('.hero-solve-slide');
        let totalHeroSlides = heroSolveSlides.length;
        let currentHeroSlide = 0;

        function clampHeroIndex(idx) {
            if (idx < 0) return 0;
            if (idx > totalHeroSlides - 1) return totalHeroSlides - 1;
            return idx;
        }

        function getSlideStep() {
            let firstSlide = heroSolveCarousel.querySelector('.hero-solve-slide');
            if (!firstSlide) return heroSolveCarousel.clientWidth;
            let styles = globalThis.getComputedStyle(heroSolveCarousel);
            let gap = Number.parseFloat(styles.columnGap);
            if (Number.isNaN(gap)) gap = Number.parseFloat(styles.gap);
            if (Number.isNaN(gap)) gap = 0;

            let slideWidth = firstSlide.getBoundingClientRect().width;
            if (!slideWidth) return heroSolveCarousel.clientWidth;

            return slideWidth + gap;
        }

        function goToHeroSlide(index, behavior) {
            if (!totalHeroSlides) return;
            currentHeroSlide = clampHeroIndex(index);
            heroSolveCarousel.scrollTo({
                left: getSlideStep() * currentHeroSlide,
                behavior: behavior || 'smooth'
            });
            updateHeroSolveNavState();
        }

        function updateHeroSolveNavState() {
            heroSolvePrev.disabled = currentHeroSlide <= 0;
            heroSolveNext.disabled = currentHeroSlide >= (totalHeroSlides - 1);
        }

        heroSolvePrev.addEventListener('click', function() {
            goToHeroSlide(currentHeroSlide - 1, 'smooth');
        });

        heroSolveNext.addEventListener('click', function() {
            goToHeroSlide(currentHeroSlide + 1, 'smooth');
        });

        heroSolveCarousel.addEventListener('scroll', function() {
            let step = getSlideStep();
            if (!step) return;
            currentHeroSlide = clampHeroIndex(Math.round(heroSolveCarousel.scrollLeft / step));
            updateHeroSolveNavState();
        }, { passive: true });

        window.addEventListener('resize', function() {
            goToHeroSlide(currentHeroSlide, 'auto');
        });

        requestAnimationFrame(function() {
            goToHeroSlide(0, 'auto');
        });
    }
}

initLandingPage();
