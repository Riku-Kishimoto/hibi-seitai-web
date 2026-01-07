<?php
function mytheme_enqueue_scripts() {
    wp_enqueue_style(
        'reset-css',
        'https://cdn.jsdelivr.net/npm/the-new-css-reset/css/reset.min.css',
        array(),
        null
    );

    wp_enqueue_style(
        'custom-style',
        get_template_directory_uri() . '/css/style.min.css',
        array(),
        filemtime( get_template_directory() . '/css/style.min.css' )
    );

    wp_enqueue_style(
        'zen-maru',
        'https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@400;500;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'zen-antique',
        'https://fonts.googleapis.com/css2?family=Zen+Antique+Soft&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'material-icons',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_right_alt',
        array(),
        null
    );

    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=call',
        array(),
        null
    );

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'custom-script',
        get_template_directory_uri() . '/js/script.js',
        array('jquery'),
        filemtime(get_template_directory() . '/js/script.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

/**
 * カスタムフィールドのオプションページを追加する
 *
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（manage_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
SCF::add_options_page( 'ページタイトル', '基本情報', 'manage_options', 'theme-options' );

/**
 * カスタム投稿タイプとタクソノミーの登録
 */
function my_custom_post_type_settings() {

    // ----------------------------------------------------------------
    // 1. カスタム投稿タイプ「商品 (item)」の登録
    // ----------------------------------------------------------------
    register_post_type( 'item', // 【重要】投稿タイプのスラッグ（URLになります）
        array(
            'labels' => array(
                'name'          => '料金表', // 管理画面のメニュー名
                'singular_name' => '料金表',
                'add_new'       => '料金表を新規追加',
                'add_new_item'  => '新しい料金表を追加',
                'edit_item'     => '料金表を編集',
                'new_item'      => '新しい料金表',
                'view_item'     => '料金表を見る',
                'search_items'  => '料金表を検索',
                'not_found'     => '料金表は見つかりませんでした',
                'not_found_in_trash' => 'ゴミ箱に料金表は見つかりませんでした',
                'hierarchical' => true,
            ),
            'public'        => true,  // ユーザーが利用・検索可能にするか
            'has_archive'   => true,  // 一覧ページ（archive-item.php）を持つか
            'menu_position' => 5,     // 管理画面でのメニュー表示位置（5は投稿の下）
            'show_in_rest'  => true,  // 【重要】新エディタ（Gutenberg）を使う場合はtrue
            'menu_icon'     => 'dashicons-store', // アイコン（後述）
            'supports'      => array(
                'title',     // タイトル
                'editor',    // 本文エディタ
                'thumbnail', // アイキャッチ画像
                'excerpt',   // 抜粋
                'revisions', // リビジョン（保存履歴）
                'page-attributes',
                // 'custom-fields', // 標準のカスタムフィールドを使う場合はコメントアウト解除
            ),

            'template' => array(
                    array(
                        'myplugin/fee-table',
                        array(

                        ),
                    ),
            ),
            'template_lock' => 'all',
        )
    );

    // ----------------------------------------------------------------
    // 2. カスタムタクソノミー「商品カテゴリー (item_cat)」の登録
    // ----------------------------------------------------------------
    register_taxonomy(
        'item_cat', // 【重要】タクソノミーのスラッグ
        'item',     // どの投稿タイプに紐付けるか（上のregister_post_typeと同じにする）
        array(
            'label'         => '料金表カテゴリー', // 管理画面のラベル
            'hierarchical'  => true,          // trueだとカテゴリー風（階層あり）、falseだとタグ風
            'public'        => true,
            'show_in_rest'  => true,          // 【重要】新エディタで選択画面を表示するにはtrue
            'rewrite'       => array( 'slug' => 'item_cat' ), // URLの設定
        )
    );


}
add_action( 'init', 'my_custom_post_type_settings' );

//item をブロックエディタ専用にする
add_filter(
    'use_block_editor_for_post_type',
    function ($use, $post_type) {
        if ($post_type === 'item') {
            return true;
        }
        return $use;
    },
    10,
    2
);


function my_login_redirect( $redirect_to, $request, $user ) {
    return home_url();
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );