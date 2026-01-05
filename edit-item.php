<?php
/*
Template Name: 料金表 編集（個別）
*/

if (!is_user_logged_in()) {
  wp_redirect(home_url());
  exit;
}

get_header("edit");
?>

<div id="items-wrapper"></div>
<button id="save-btn">保存</button>

<?php get_footer(); ?>