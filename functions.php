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

//     register_post_type('item', array(
//     'label' => '料金表',
//     'public' => true,
//     'menu_position' => 5,
//     'menu_icon' => 'dashicons-list-view',

//     'supports' => array(
//         'title',        // メニュー名
//         'editor',       // 料金・説明（必須）
//         'thumbnail',    // 画像
//         'page-attributes', // 並び順
//     ),

//     'template' => array(
//         array(
//             'core/paragraph',
//             array(
//                 'content' => '【施術内容】ここに施術内容を入力してください。',
//             ),
//         ),
//         array(
//             'core/paragraph',
//             array(
//                 'content' => '【料金】例：3,000円',
//             ),
//         ),
//     ),

//     'template_lock' => 'all',

//     'show_in_rest' => true,
// ));

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

// add_action( 'init', function() {
//     register_block_type(
//         // block.json ファイルの絶対パスを渡す
//         get_template_directory() . '/blocks/fee-row/block.json'
//     );
// } );

// function my_item_sortable() {
//     add_post_type_support( 'item', 'page-attributes' );
// }
// add_action( 'init', 'my_item_sortable' );


/**
 * SCFを利用してフロントエンドからのカスタム投稿データ更新を処理
 */
// function handle_scf_frontend_update() {
//     // フォーム送信がされていない、または必須フィールドがない場合は処理しない
//     if ( ! isset( $_POST['scf_post_update'] ) || ! isset( $_POST['post_id'] ) ) {
//         return;
//     }

//     $post_id = intval( $_POST['post_id'] );

//     // 1. ログインチェックと権限チェック（必須）
//     // ユーザーがログインしているか、その投稿を編集する権限があるかを確認
//     if ( ! is_user_logged_in() || ! current_user_can( 'edit_post', $post_id ) ) {
//         // 権限がない場合は処理を終了
//         return;
//     }

//     // 2. SCFのコア関数を呼び出し、POSTデータをカスタムフィールドに保存
//     // SCFのNonce（セキュリティトークン）の検証も同時に行われます
//     SCF::post_meta_request();

//     // 3. データ保存後、二重送信を防ぐためにリダイレクト
//     wp_safe_redirect( get_permalink( $post_id ) );
//     exit;
// }
// add_action( 'init', 'handle_scf_frontend_update' );

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

// //編集画面にフロントCSSを読み込む
// add_action('enqueue_block_editor_assets', function () {
//     wp_enqueue_style(
//         'editor-front-style',
//         get_template_directory_uri() . '/css/style.min.css',
//         array(),
//         filemtime(get_template_directory() . '/css/style.min.css')
//     );
// });

// // item 編集画面用CSSを読み込む
// add_action('admin_enqueue_scripts', function ($hook) {

//     if ($hook !== 'post.php' && $hook !== 'post-new.php') {
//         return;
//     }

//     $screen = get_current_screen();
//     if ($screen && $screen->post_type === 'item') {
//         wp_enqueue_style(
//             'editor-item-style',
//             get_template_directory_uri() . '/css/editor-item.css',
//             array(),
//             filemtime(get_template_directory() . '/css/editor-item.css')
//         );
//     }
// });