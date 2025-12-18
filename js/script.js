jQuery(function ($) {

    //ヘッダー
    const $header = $('.header');
    let lastScrollY = 0;
    const $firstHeader = $('.header__first');
    const firstHeaderHeight = $firstHeader.length ? $firstHeader.outerHeight(true) : 0;

    const hideDelay = 10;
    const breakpoint = 768;
    let hideTimer = null;

    $(window).on('scroll', function () {
        const currentScrollY = $(this).scrollTop();
        const windowWidth = $(window).width();

        const isPC = windowWidth >= breakpoint;

        if (currentScrollY > lastScrollY && currentScrollY > 10) {
            if (hideTimer) clearTimeout(hideTimer);

            const action = function () {
                if ($(window).scrollTop() > firstHeaderHeight) {
                    $header.addClass('header--hidden');
                }
            };

            isPC ? hideTimer = setTimeout(action, hideDelay) : action();

        } else if (currentScrollY < lastScrollY || currentScrollY <= firstHeaderHeight) {
            if (hideTimer) clearTimeout(hideTimer);
            $header.removeClass('header--hidden');
        }

        lastScrollY = currentScrollY;
    });


    //navigation
    const $nav = $('.navigation');
    const navThreshold = 500;

    $(window).on('scroll', function () {
        const currentScroll = $(this).scrollTop();
        if (currentScroll > navThreshold) {
            $nav.addClass('is-visible');
        } else {
            $nav.removeClass('is-visible');
        }
    });

    $(window).trigger('scroll');


    const $rese = $('.rese');
    const reseThreshold = 100;

    $(window).on('scroll', function () {
        const currentScroll = $(this).scrollTop();
        if (currentScroll > reseThreshold) {
            $rese.addClass('is-visible');
        } else {
            $rese.removeClass('is-visible');
        }
    });

    $(window).trigger('scroll');
});

//ハンバーガーメニュー
document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger-overlay');
    const nav = document.querySelector('.nav-overlay');

    if (!hamburger || !nav) return;

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        nav.classList.toggle('active');

        const isOpen = hamburger.classList.contains('active');
        hamburger.setAttribute('aria-expanded', isOpen);
        nav.setAttribute('aria-hidden', !isOpen);

        document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && nav.classList.contains('active')) {
            hamburger.classList.remove('active');
            nav.classList.remove('active');
            hamburger.setAttribute('aria-expanded', false);
            nav.setAttribute('aria-hidden', true);
            document.body.style.overflow = '';
        }
    });
});


//アニメーション
const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        }
    });
}, {
    rootMargin: '0px 0px -10% 0px',
    threshold: 0
});

document.querySelectorAll('.fade-in-item').forEach(item => {
    observer.observe(item);
});


//インジケーター
const dots = document.querySelectorAll('.indicator__dot');
const yellowLine = document.querySelector('.scrollbar__line--yellow');

let current = 0;

function updateIndicator() {
    if (!dots.length || !yellowLine) return;

    dots.forEach((d, i) => d.classList.toggle('active', i === current));

    yellowLine.style.animation = 'none';
    void yellowLine.offsetWidth;
    yellowLine.style.animation = 'scrollLine 5s linear forwards';

    current = (current + 1) % dots.length;
}

setInterval(updateIndicator, 5000);
updateIndicator();

//ローディングアニメーション


const loading = document.getElementById('loading');

if (!sessionStorage.getItem('visited')) {
    loading.classList.add('is-active');

    window.addEventListener('load', () => {
        setTimeout(() => {
            loading.classList.add('is-hidden');
            sessionStorage.setItem('visited', 'true');
        }, 2000);
    });
} else {
    loading.style.display = 'none';
}
