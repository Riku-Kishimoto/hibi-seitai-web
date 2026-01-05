<?php
add_filter('show_admin_bar', '__return_false');
// add_filter('show_admin_bar', function() {
//     return false;
// });
if ( !is_user_logged_in() ) {
    // ログインしていない場合はログイン画面へ（ログイン後にこのページに戻す）
    auth_redirect();
}

if ( !current_user_can('edit_posts') ) {
    // ログインはしてるけど編集権限がない（購読者など）場合
    wp_die('このページの編集権限がありません。管理者に問い合わせてください。');
}

// 2. 編集対象のID取得
// 編集対象のIDを判定
if ( !empty($_GET['id']) ) {
    // URLに ?id=xx がある場合はそれを使用
    $post_id = intval($_GET['id']);
} else {
    // URLにIDがない場合は、最新の料金表（item）を1件取得
    $latest_items = get_posts(array(
        'post_type'      => 'item',
        'posts_per_page' => 1,
        'post_status'    => 'publish' // 公開済みのものだけ
    ));
    $post_id = !empty($latest_items) ? $latest_items[0]->ID : 0;
}

// 最終確認：IDが0（どこにも該当しない）ならエラーを出す
if ( !$post_id ) {
    wp_die('編集できる料金表（投稿）が見つかりません。');
}

// 3. REST API用のスクリプト設定
wp_enqueue_script(
  'main-script',
  get_template_directory_uri() . '/js/script.js',
  array('jquery'),
  '1.0',
  true
);

wp_localize_script('main-script', 'wpApiSettings', array(
    'root'   => esc_url_raw(rest_url()),
    'nonce'  => wp_create_nonce('wp_rest'),
    'postId' => $post_id,
    'home'   => home_url()
));

?>

<main>
    <div class="editor-container" style="max-width: 800px; margin: 20px auto; padding: 20px;">
        <h1>料金表の編集 (ID: <?php echo $post_id; ?>)</h1>

        <div id="loading-status">データを読み込み中... (ID: <?php echo $post_id; ?>)</div>

        <div id="edit-form" style="display:none;">
            <div id="items-wrapper"></div>
            <div style="margin-top: 20px; border-top: 1px solid #ccc; padding-top: 20px;">
                <button type="button" id="add-row-btn">＋ 行を追加する</button>
                <button type="button" id="save-btn" style="background: #0073aa; color: #fff; border: none; padding: 10px 30px; cursor: pointer;">
                    保存する
                </button>
            </div>
        </div>
        <p style="margin-top: 20px;"><a href="<?php echo home_url(); ?>">← 戻る</a></p>
    </div>

<div id="item-list" style="max-width:800px;margin:40px auto;">
  <h2>料金表一覧</h2>
  <p>読み込み中...</p>
</div>
</main>

<?php wp_footer(); ?>
</body>
