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

<?php wp_head(); ?>
</head>

<body class="top">
<?php wp_body_open(); ?>

    <header class="header fade-in-section">
        <div class="header__inner">
            <div class="header__first fade-in-item">
                <h1 class="header__title"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?>">日比整体 だいせんじ接骨院</a></h1>
                <div class="header__reservation">
                    <p class="header__tel"><span class="material-symbols-outlined">
                            call
                        </span><a href="tel:0568843383"><?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-tel' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></a></p>
                    <a class="btn header__btn btn--top" href="">LINEで予約</a>
                </div>

            </div>
            <div class="rese">
                <a class="rese__line" href="#">LINEで予約</a>
                <a class="rese__tel" href="tel:0568843383"><span class="material-symbols-outlined">
                        call
                    </span><?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-tel' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></a>
            </div>
        </div>

        <div id="loading" class="loading">
            <div class="loading__list">
                <svg class="wave" width="160" height="30" viewBox="0 0 160 30">
                    <path
                        d="M0 15
                            C20 5, 40 25, 60 15
                            C80 5, 100 25, 120 15
                            C140 5, 160 25, 180 15"
                        fill="none"
                        stroke-width="2"
                    />
                </svg>
                <p class="loading__text">読み込み中…</p>
            </div>
        </div>

        <nav class="gnav fade-in-section">
            <div class="gnav__inner fade-in-item">
                <ul class="gnav__list">
                    <li class="gnav__item dropdown"><a href="<?php echo home_url('/seitai/'); ?>">日比整体</a>
                        <ul class="dropdown__menu">
                            <li><a href="<?php echo home_url('/seitai/#symptoms'); ?>">施術内容</a></li>
                            <li><a href="<?php echo home_url('/seitai/#worthy'); ?>">酸素カプセル</a></li>
                            <li><a href="<?php echo home_url('/seitai/#staff'); ?>">スタッフ紹介</a></li>
                        </ul>
                    </li>
                    <li class="gnav__item dropdown"><a href="<?php echo home_url('/sekkotsu/'); ?>">だいせんじ接骨院</a>
                        <ul class="dropdown__menu">
                            <li><a href="<?php echo home_url('/sekkotsu/#symptoms'); ?>">施術内容</a></li>
                            <li><a href="<?php echo home_url('/sekkotsu/#worthy'); ?>">交通事故治療</a></li>
                            <li><a href="<?php echo home_url('/sekkotsu/#staff'); ?>">スタッフ紹介</a></li>
                        </ul>
                    </li>
                    <li class="gnav__item dropdown"><a href="#">メニュー・料金</a>
                        <ul class="dropdown__menu dropdown__menu--big">
                            <li><a href="<?php echo home_url('/seitai-menu/'); ?>">整体&nbsp;メニュー・料金</a></li>
                            <li><a href="<?php echo home_url('/sekkotsu-menu/'); ?>">接骨院&nbsp;メニュー・料金</a></li>
                        </ul>
                    </li>
                    <li class="gnav__item dropdown"><a href="<?php echo home_url('/sekkotsu/#worthy'); ?>">交通事故治療</a>
                        <ul class="dropdown__menu">
                            <li><a href="<?php echo home_url('/sekkotsu/#worthy'); ?>">保険適用について</a></li>
                        </ul>
                    </li>
                    <li class="gnav__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #access">アクセス</a></li>
                    <li class="gnav__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #calendar">営業案内</a></li>
                </ul>
            </div>
        </nav>

        <div class="navigation">
            <div class="navigation__inner">
                <div class="navigation__item">
                    <ul class="gnav__list navigation__content">
                        <li class="gnav__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
                        <li class="gnav__item"><a href="<?php echo home_url('/seitai/'); ?>">日比整体</a></li>
                        <li class="gnav__item"><a href="<?php echo home_url('/sekkotsu/'); ?>">だいせんじ接骨院</a></li>
                        <li class="gnav__item dropdown"><a href="#">メニュー・料金</a>
                            <ul class="dropdown__menu dropdown__menu--big dropdown__menu--navigation">
                                <li class="gnav__item--nonhov"><a href="<?php echo home_url('/seitai-menu/'); ?>">整体&nbsp;メニュー・料金</a></li>
                                <li class="gnav__item--nonhov"><a href="<?php echo home_url('/sekkotsu-menu/'); ?>">接骨院&nbsp;メニュー・料金</a></li>
                            </ul>
                        </li>
                        <li class="gnav__item"><a href="<?php echo home_url('/seitai-menu/'); ?> #worthy">交通事故治療</a></li>
                        <li class="gnav__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #access">アクセス</a></li>
                        <li class="gnav__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #calendar">営業案内</a></li>
                        <li class="gnav__item gnav__item--nonhov gnav__item--btn"><a class="btn" href="">LINEで予約</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="hamburger" id="hamburger">
        <button class="hamburger-overlay" aria-label="ナビゲーションメニュー" aria-controls="overlay-menu" aria-expanded="false">
            <span class="hamburger-overlay__line"></span>
            <span class="hamburger-overlay__line"></span>
            <span class="hamburger-overlay__line"></span>
        </button>
    </div>

    <nav id="overlay-menu" class="nav-overlay" aria-hidden="true">
        <div class="nav-overlay__content">
            <ul class="nav-overlay__list">
                <li class="nav-overlay__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?>" class="nav-overlay__link">ホーム</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo home_url('/seitai/'); ?>" class="nav-overlay__link">日比整体</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo home_url('/sekkotsu/'); ?>"
                        class="nav-overlay__link">だいせんじ接骨院</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo home_url('/seitai-menu/'); ?>" class="nav-overlay__link">整体&nbsp;メニュー・料金</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo home_url('/sekkotsu-menu/'); ?>" class="nav-overlay__link">接骨院&nbsp;メニュー・料金</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo home_url('/seitai-menu/'); ?> #worthy"
                        class="nav-overlay__link">交通事故治療</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #access" class="nav-overlay__link">アクセス</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #calendar" class="nav-overlay__link">営業案内</a>
                </li>
                <div class="nav-overlay__rese nav-overlay__item">
                    <a class="rese__line" href="#">LINEで予約</a>
                    <a class="rese__tel" href="tel:0568843383"><span class="material-symbols-outlined">
                        call
                    </span><?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-tel' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></a>
                </div>
            </ul>
        </div>
    </nav>