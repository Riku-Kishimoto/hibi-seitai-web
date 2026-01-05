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


    const $rese = $('.rese').not('.rese--always');
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


// const loading = document.getElementById('loading');

// if (!sessionStorage.getItem('visited')) {
//     loading.classList.add('is-active');

//     window.addEventListener('load', () => {
//         setTimeout(() => {
//             loading.classList.add('is-hidden');
//             sessionStorage.setItem('visited', 'true');
//         }, 2000);
//     });
// } else {
//     loading.style.display = 'none';
// }

const loading = document.getElementById('loading');

if (loading) {
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
}

document.addEventListener('DOMContentLoaded', async () => {
    const listWrap = document.querySelector('#item-list');

    if (!listWrap) {
        console.error('#item-list が見つからない');
        return;
    }

    try {
        const res = await fetch(`${wpApiSettings.root}wp/v2/item?per_page=100`, {
            headers: {
                'X-WP-Nonce': wpApiSettings.nonce
            }
        });

        if (!res.ok) {
            throw new Error('API取得失敗');
        }

        const items = await res.json();

        if (!items.length) {
            listWrap.innerHTML = '<h2>料金表一覧</h2><p>データがありません</p>';
            return;
        }

        let html = '<h2>料金表一覧</h2><ul>';

        items.forEach(item => {
            html += `
        <li style="margin-bottom:10px;">
          ${item.title.rendered}
          <a href="${wpApiSettings.home}/wp-admin/post.php?post=${item.id}&action=edit" style="margin-left:10px;">
            編集
          </a>
        </li>
      `;
        });

        html += '</ul>';

        listWrap.innerHTML = html;

    } catch (err) {
        console.error(err);
        listWrap.innerHTML = '<p style="color:red;">読み込みエラー</p>';
    }
});