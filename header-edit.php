<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日比整体&nbsp;だいせんじ接骨院</title>

    <meta name="description" content="日比整体 だいせんじ接骨院の公式ホームページです。" />

    <meta property="og:url" content="ページのURL" />
    <meta property="og:title" content="ページのタイトル" />
    <meta property="og:type" content="ページのタイプ">
    <meta property="og:description" content="記事の抜粋" />
    <meta property="og:image" content="画像のURL" />
    <meta name="twitter:card" content="カード種類" />
    <meta name="twitter:site" content="@Twitterユーザー名" />
    <meta property="og:site_name" content="サイト名" />
    <meta property="og:locale" content="ja_JP" />
    <meta property="fb:app_id" content="appIDを入力" />

    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />

    <link rel="apple-touch-icon-precomposed" href="画像のURL" />

    <meta name="msapplication-TileImage" content="画像のURL" />
    <meta name="msapplication-TileColor" content="カラーコード（例：#F89174）" />

<?php wp_head();?>
</head>

<body>
    <header>
        <div class="header__inner">
                <h1 class="header__title"><a href="<?php echo esc_url( home_url('/edit/') ); ?>">日比整体&nbsp;だいせんじ接骨院&nbsp;管理者専用ページ</a></h1>
        <nav class="gnav">
            <div class="gnav__inner">
                <ul class="gnav__list">
                    <li class="gnav__item"><a href="<?php echo esc_url( home_url('/edit/#edit__fee') ); ?>">日比整体料金表編集</a></li>
                    <li class="gnav__item"><a href="<?php echo esc_url( home_url('/edit/#edit__fee') ); ?>">だいせんじ接骨院料金表編集</a></li>
                    <li class="gnav__item"><a href="<?php echo esc_url( home_url('/edit/#edit__posts') ); ?>">お知らせ追加・編集</a></li>
                    <li class="gnav__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?>">サイトへ戻る</a></li>
                </ul>
            </div>
        </nav>
        </div>
    </header>