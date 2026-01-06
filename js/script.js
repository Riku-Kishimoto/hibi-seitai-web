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

jQuery(function ($) {

    const apiRoot = wpApiSettings.root + 'wp/v2/posts';
    const nonce = wpApiSettings.nonce;

    // 一覧取得
    function loadNews() {
        $.get(apiRoot, { per_page: 10 })
            .done(function (posts) {
                let html = '';

                posts.forEach(post => {
                    html += `
                        <div class="news-item" data-id="${post.id}">
                            <h3>${post.title.rendered}</h3>
                            <button class="edit">編集</button>
                            <button class="delete">削除</button>
                        </div>
                    `;
                });

                $('#news-list').html(html);
            });
    }

    loadNews();

    // 新規追加
    $('#add-news').on('click', function () {
        $('#news-id').val('');
        $('#news-title').val('');
        $('#news-content').val('');
        $('#news-form').show();
    });

    // 編集
    $(document).on('click', '.edit', function () {
        const id = $(this).closest('.news-item').data('id');

        $.get(`${apiRoot}/${id}`)
            .done(post => {
                $('#news-id').val(post.id);
                $('#news-title').val(post.title.rendered);
                $('#news-content').val(post.content.raw);
                $('#news-form').show();
            });
    });

    $(document).on('click', '.edit', function () {
        const id = $(this).closest('.item-row').data('id');

        $.ajax({
            url: `${apiRoot}/${id}?context=edit`,
            method: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            }
        }).done(item => {
            $('#item-id').val(item.id);
            $('#item-title').val(item.title.raw);
            $('#item-content').val(item.content.raw); // ← ここ重要
            $('#item-price').val(item.meta?.price ?? '');
            $('#item-form').show();
        });
    });

    // 保存（追加 or 更新）
    $('#save-news').on('click', function () {
        const id = $('#news-id').val();
        const method = id ? 'POST' : 'POST';
        const url = id ? `${apiRoot}/${id}` : apiRoot;

        $.ajax({
            url: url,
            method: method,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            data: {
                title: $('#news-title').val(),
                content: $('#news-content').val(),
                status: 'publish'
            }
        }).done(() => {
            $('#news-form').hide();
            loadNews();
        });
    });

    // 削除
    $(document).on('click', '.delete', function () {
        if (!confirm('削除しますか？')) return;

        const id = $(this).closest('.news-item').data('id');

        $.ajax({
            url: `${apiRoot}/${id}`,
            method: 'DELETE',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            }
        }).done(loadNews);
    });

    // キャンセル
    $('#cancel-news').on('click', function () {
        $('#news-form').hide();
    });

});

jQuery(function ($) {

    const apiRoot = wpApiSettings.root + 'wp/v2/item';
    const nonce = wpApiSettings.nonce;

    // 一覧取得
    function loadItems() {
        $.get(apiRoot, { per_page: 20 })
            .done(function (items) {
                if (!items.length) {
                    $('#items').html('<p>料金表がありません</p>');
                    return;
                }

                let html = '';
                items.forEach(item => {
                    html += `
                        <div class="item-row" data-id="${item.id}">
                            <strong>${item.title.rendered}</strong>
                            <div class="actions">
                                <button class="edit">編集</button>
                                <button class="delete">削除</button>
                            </div>
                        </div>
                    `;
                });

                $('#items').html(html);
            });
    }

    loadItems();

    // 追加
    $('#add-item').on('click', function () {
        $('#item-id').val('');
        $('#item-title').val('');
        $('#item-content').val('');
        $('#item-price').val('');
        $('#item-form').show();
    });

    // 編集
    $(document).on('click', '.edit', function () {
        const id = $(this).closest('.item-row').data('id');

        $.get(`${apiRoot}/${id}`)
            .done(item => {
                $('#item-id').val(item.id);
                $('#item-title').val(item.title.rendered);
                $('#item-content').val(item.content.raw);
                $('#item-price').val(item.meta?.price ?? '');
                $('#item-form').show();
            });
    });

    // 保存（追加・更新）
    $('#save-item').on('click', function () {
        const id = $('#item-id').val();
        const url = id ? `${apiRoot}/${id}` : apiRoot;

        $.ajax({
            url: url,
            method: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            },
            data: {
                title: $('#item-title').val(),
                content: $('#item-content').val(),
                status: 'publish',
                meta: {
                    price: $('#item-price').val()
                }
            }
        }).done(() => {
            $('#item-form').hide();
            loadItems();
        });
    });

    // 削除
    $(document).on('click', '.delete', function () {
        if (!confirm('この料金表を削除しますか？')) return;

        const id = $(this).closest('.item-row').data('id');

        $.ajax({
            url: `${apiRoot}/${id}`,
            method: 'DELETE',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', nonce);
            }
        }).done(loadItems);
    });

    // キャンセル
    $('#cancel-item').on('click', function () {
        $('#item-form').hide();
    });

});