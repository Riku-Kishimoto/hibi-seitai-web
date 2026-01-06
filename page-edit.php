<?php
/* Template Name: 料金表一覧（編集用） */

add_filter('show_admin_bar', '__return_false');

if ( !is_user_logged_in() ) {
    auth_redirect();
}

if ( !current_user_can('edit_posts') ) {
    wp_die('このページの編集権限がありません。管理者に問い合わせてください。');
}

get_header("edit");

?>

<main>
    <!-- <div id="item-list">
        <h2>料金表一覧</h2>
        <p>読み込み中...</p>
    </div> -->

    <?php
        $groups = [
            'seitai-menu'   => '整体の料金',
            'sekkotsu-menu' => '接骨院の料金',
            'none'     => 'その他の料金',
        ];

    // タグ付き
        foreach (['seitai-menu', 'sekkotsu-menu'] as $slug) {

            $items = get_posts([
                'post_type'      => 'item',
                'posts_per_page' => -1,
                'tax_query'      => [
                    [
                        'taxonomy' => 'item_cat', // 独自なら taxonomy 名
                        'field'    => 'slug',
                        'terms'    => $slug,
                    ],
                ],
            ]);

        if (!$items) continue;

            echo '<section class="admin-group">';
            echo '<h3>' . esc_html($groups[$slug]) . '</h3>';
            echo '<ul>';

    foreach ($items as $item) {
        echo '<li>';
        echo esc_html($item->post_title);

        echo ' <a href="' . admin_url("post.php?post={$item->ID}&action=edit") . '">編集</a>';
        echo ' <a href="' . get_delete_post_link($item->ID, '', true) . '"
                    onclick="return confirm(\'削除しますか？\')"
                    style="color:red;">削除</a>';

        echo '</li>';
    }

    echo '</ul>';
    echo '</section>';
    }

    // タグなし
    $no_tag_items = get_posts([
        'post_type'      => 'item',
        'posts_per_page' => -1,
        'tax_query'      => [
        [
            'taxonomy' => 'item_cat',
            'operator' => 'NOT EXISTS',
        ],
        ],
    ]);

    if ($no_tag_items) {
        echo '<section class="admin-group">';
        echo '<h3>' . esc_html($groups['none']) . '</h3>';
        echo '<ul>';

    foreach ($no_tag_items as $item) {
        echo '<li>';
        echo '<div>';
        echo esc_html($item->post_title);
        echo '</div>';
        echo '<div class="item-actions">';
        echo ' <a href="' . admin_url("post.php?post={$item->ID}&action=edit") . '">編集</a>';
        echo ' <a href="' . get_delete_post_link($item->ID, '', true) . '"
                    onclick="return confirm(\'削除しますか？\')"
                    style="color:red;">削除</a>';
        echo '</div>';
        echo '</li>';
    }

    echo '</ul>';
    echo '</section>';
    }
    ?>

    <div class="admin-actions">
    <a href="<?php echo admin_url('post-new.php?post_type=item'); ?>"
            class="btn-add">
            ＋ 新しい料金メニューを追加
        </a>
    </div>

<!-- 追加・編集フォーム -->
<div id="item-form" style="display:none;">
    <input type="hidden" id="item-id">

    <label>
        メニュー名
        <input type="text" id="item-title">
    </label>

    <label>
        説明
        <textarea id="item-content"></textarea>
    </label>

    <label>
        価格
        <input type="text" id="item-price">
    </label>

    <div class="form-buttons">
        <button id="save-item">保存</button>
        <button id="cancel-item">キャンセル</button>
    </div>
</div>

    <section class="admin-news">
    <h2>お知らせ管理</h2>

    <button id="add-news">＋ 新しいお知らせ</button>

    <div id="news-list">
        <p>読み込み中...</p>
    </div>
</section>

<!-- 新規・編集フォーム -->
<div id="news-form" style="display:none;">
    <input type="hidden" id="news-id">

    <label>
        タイトル
        <input type="text" id="news-title">
    </label>

    <label>
        内容
        <textarea id="news-content"></textarea>
    </label>

    <button id="save-news">保存</button>
    <button id="cancel-news">キャンセル</button>
</div>

</main>

<?php
wp_enqueue_script(
    'main-script',
    get_template_directory_uri() . '/js/script.js',
    array('jquery'),
    '1.0',
    true
);

wp_localize_script('main-script', 'wpApiSettings', array(
    'root'  => esc_url_raw(rest_url()),
    'nonce' => wp_create_nonce('wp_rest'),
    'home'  => home_url()
));

get_footer("edit");