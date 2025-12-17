<?php
/*
Template Name: Edit Item
*/
get_header();

// --- 投稿IDを取得 ---
$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;

// --- ログインチェック ---
if (!is_user_logged_in()) {
    echo "<p style='padding:40px; text-align:center;'>ログインしてください。</p>";
    get_footer();
    exit;
}

if (!$post_id) {
    echo "<p style='padding:40px; text-align:center;'>編集する項目が選択されていません。</p>";
    get_footer();
    exit;
}

// --- 元のページURLに戻るリンク ---
$back_url = wp_get_referer() ?: home_url('/menu-fee/');
?>

<div class="edit-wrapper" style="max-width:800px; margin:40px auto; background:#fff; padding:30px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">

    <a href="<?php echo esc_url($back_url); ?>" style="display:inline-block; margin-bottom:20px; color:#001F3F; font-weight:bold;">
        ← 料金ページに戻る
    </a>

    <h2 style="margin-bottom:20px; font-size:24px; font-weight:bold;">料金項目の編集</h2>

    <p style="margin-bottom:30px; color:#444;">
        タイトル・説明・画像などを編集できます。
        編集が終わったら下の「更新する」を押してください。
    </p>

    <?php
    // ACFフォームのデザイン
    acf_form(array(
        'post_id' => $post_id,
        'post_title'  => true,
        'post_content'=> true,
        'return'      => $back_url, // 保存後に戻る
        'html_submit_button' => '<button class="edit-submit" type="submit">更新する</button>',
        'submit_value' => false, // ボタンは上書きするため disabled
    ));
    ?>

</div>

<style>
.edit-submit {
    margin-top: 20px;
    background: #001F3F;
    color: #fff;
    padding: 12px 30px;
    font-size: 16px;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    font-weight: bold;
}
.edit-submit:hover {
    opacity: .85;
}
</style>

<?php get_footer(); ?>



<!--
                    <?php if (is_user_logged_in()) : ?>
                        <p class="edit-btn">
                            <a href="/edit-item/?post_id=<?php the_ID(); ?>">編集</a>
                        </p>
                    <?php endif; ?> -->