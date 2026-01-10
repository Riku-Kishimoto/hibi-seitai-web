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

<main class="main--edit">

<section class="admin-group">
    <?php
        $groups = [
            'seitai-menu'   => '日比整体の料金表',
            'sekkotsu-menu' => 'だいせんじ接骨院の料金表',
            'none'     => 'その他の料金表',
        ];

    // タグ付き
        foreach (['seitai-menu', 'sekkotsu-menu'] as $slug) {

            $items = get_posts([
                'post_type'      => 'item',
                'posts_per_page' => -1,
                'tax_query'      => [
                    [
                        'taxonomy' => 'item_cat',
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
        echo '<div class="item-title">';
        echo '<a id="edit__fee" href="' . admin_url("post.php?post={$item->ID}&action=edit") . '">';
        echo esc_html($item->post_title);
        echo '</a>';
        echo '</div>';
        echo '<div class="item-actions">';
        echo ' <a class="editbtn" href="' . admin_url("post.php?post={$item->ID}&action=edit") . '">編集</a>';
        echo ' <a class="deletebtn" href="' . get_delete_post_link($item->ID, '', true) . '"
                    onclick="return confirm(\'本当に削除（ゴミ箱へ移動）しますか？\')">削除</a>';
        echo '</div>';
        echo '</li>';
    }

    echo '</ul>';
    echo '<div class="admin-actions">';
    echo '<a href="' . admin_url('post-new.php?post_type=item') . '" class="btn-add">';
    echo '＋ 新しい料金表を追加';
    echo '</a>';
    echo '</div>';
    if ($slug === 'seitai-menu') {
    echo '<a class="btn btn--edit" href="' . home_url('/seitai-menu/#fee') . '">整体料金表へ戻る</a>';
    } elseif ($slug === 'sekkotsu-menu') {
    echo '<a class="btn btn--edit" href="' . home_url('/sekkotsu-menu/#fee') . '">接骨院料金表へ戻る</a>';
    }
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
        echo '<p>＊こちらの料金表はサイトに表示されていません。<br>
        サイトに表示させる場合は、編集から整体・接骨院どちらかのカテゴリーを選択してください。</p>';
        echo '<ul>';

    foreach ($no_tag_items as $item) {
        echo '<li>';
        echo '<div class="item-title">';
        echo '<a class="titlebtn" href="' . admin_url("post.php?post={$item->ID}&action=edit") . '">';
        echo esc_html($item->post_title);
        echo '</a>';
        echo '</div>';
        echo '<div class="item-actions">';
        echo ' <a class="editbtn" href="' . admin_url("post.php?post={$item->ID}&action=edit") . '">編集</a>';
        echo ' <a class="deletebtn" href="' . get_delete_post_link($item->ID, '', true) . '"
                    onclick="return confirm(\'本当に削除（ゴミ箱へ移動）しますか？\')">削除</a>';
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
            ＋ 新しい料金表を追加
        </a>
    </div>

</section>

<section class="admin-news admin-group">
    <h3 id="edit__posts">お知らせ管理</h3>

    <ul id="news-list">
        <?php
        $news_posts = get_posts([
            'post_type'      => 'post',
            'posts_per_page' => 10,
        ]);

        if ($news_posts) :
            foreach ($news_posts as $post) : ?>
                <li>
                    <div class="item-title">
                        <a href="<?php echo admin_url("post.php?post={$post->ID}&action=edit"); ?>">
                        <?php echo esc_html($post->post_title); ?>
                        <span style="font-size: 14px; color: #666; margin-left: 10px;">
                            (<?php echo get_the_date('Y/m/d', $post->ID); ?>)
                        </span>
                        </a>
                    </div>
                    <div class="item-actions">
                        <a class="editbtn" href="<?php echo admin_url("post.php?post={$post->ID}&action=edit"); ?>" class="btn-edit">
                            編集
                        </a>
                        <a class="deletebtn" href="<?php echo get_delete_post_link($post->ID); ?>"
                            class="btn-delete"
                            onclick="return confirm('本当に削除（ゴミ箱へ移動）しますか？')">
                            削除
                        </a>
                    </div>
                </li>
            <?php endforeach;
        else : ?>
            <p>お知らせはありません。</p>
        <?php endif; ?>
    </ul>

    <div class="admin-actions" style="margin-bottom: 20px;">
        <a href="<?php echo admin_url('post-new.php'); ?>" class="btn-add">
            ＋ 新しいお知らせを追加
        </a>
    </div>

    <a class="btn btn--edit" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">お知らせ一覧へ</a>

</section>


<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$scf_saved = false;
$target_post_id = 33;
$group_name = 'about';

$fields = [
    'about-access'  => 'アクセス',
    'about-address'    => '住所',
    'about-parking' => '駐車場',
    'about-tel'     => '電話番号',
    'about-hours'    => '平日営業時間',
    'about-hours-holiday'    => '土日営業時間',
];

if (isset($_POST['scf_save']) && check_admin_referer('scf_edit_action', 'scf_edit_nonce')) {
    if (current_user_can('edit_post', $target_post_id)) {

        $save_data = [];
        foreach ($fields as $key => $label) {
            $save_data[$key] = sanitize_textarea_field($_POST[$key] ?? '');
        }

        update_post_meta($target_post_id, $group_name, [$save_data]);

        foreach ($save_data as $key => $value) {
            update_post_meta($target_post_id, $key, $value);
        }

        $scf_saved = true;

        wp_redirect(add_query_arg('saved', '1', get_permalink()));
        exit;
    }
}

$group_data = get_post_meta($target_post_id, $group_name, true);

$current_values = [];
if (is_array($group_data) && isset($group_data[0]) && is_array($group_data[0])) {
    $current_values = $group_data[0];
} else {
    foreach ($fields as $key => $label) {
        $value = get_post_meta($target_post_id, $key, true);
        if ($value !== '') {
            $current_values[$key] = $value;
        }
    }
}
?>

<section class="admin-group admin-basic">
    <h3>基本情報</h3>

    <?php if ($scf_saved): ?>
        <!-- <p class="admin-notice admin-notice--success">保存しました</p> -->
    <?php endif; ?>

    <form method="post">
        <?php wp_nonce_field('scf_edit_action', 'scf_edit_nonce'); ?>

        <ul class="basic-list">
            <?php foreach ($fields as $key => $label): ?>
                <li class="basic-item">
                    <div class="item-title">
                        <?php echo esc_html($label); ?>
                    </div>

                    <div class="item-actions">
                        <textarea
                            name="<?php echo esc_attr($key); ?>"
                            rows="2"
                            class="textarea"
                            style="width:350px;
                            text-align:right"
                        ><?php echo esc_textarea($current_values[$key] ?? ''); ?></textarea>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="admin-actions" style="margin-top:10px;">
            <button type="submit" name="scf_save" class="btn-add">保存</button>
        </div>
    </form>
</section>

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