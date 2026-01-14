<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日比整体&nbsp;だいせんじ接骨院</title>

    <meta name="description" content="日比整体 だいせんじ接骨院の公式ホームページです。" />

    <meta property="og:url" content="<?php echo esc_url( get_theme_file_uri('/images/ogp.png') ); ?>" />
    <meta property="og:title" content="日比整体 だいせんじ接骨院｜春日井市の整体・接骨院" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="春日井市で40年以上続く、整体と接骨院を併設した施術院です。" />
    <meta property="og:image" content="<?php echo esc_url( get_theme_file_uri('/images/ogp.png') ); ?>" />

    <meta property="og:site_name" content="日比整体 だいせんじ接骨院" />
    <meta property="og:locale" content="ja_JP" />

    <meta name="twitter:card" content="summary_large_image" />

    <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_theme_file_uri('/images/ogp.png') ); ?>" />

    <meta name="msapplication-TileImage" content="<?php echo esc_url( get_theme_file_uri('/images/ogp.png') ); ?>" />
    <meta name="msapplication-TileColor" content="#F2C94C" />

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
                    <a class="btn header__btn btn--top"
                        href="<?php echo esc_url('https://lin.ee/cDKVgr8'); ?>"
                        target="_blank"
                        rel="noopener">LINEで予約</a>
                </div>

            </div>
            <div class="rese rese--always">
                <a class="rese__line" href="<?php echo esc_url('https://lin.ee/cDKVgr8'); ?>"
                        target="_blank"
                        rel="noopener">LINEで予約</a>
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

        <nav class="gnav">
            <div class="gnav__inner">
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
                    <li class="gnav__item dropdown dropdowntext"><a href="#">メニュー・料金</a>
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

                        <li class="gnav__item <?php if (is_front_page()) echo 'is-current'; ?>">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a>
                        </li>

                        <li class="gnav__item <?php if (is_page('seitai')) echo 'is-current'; ?>">
                            <a href="<?php echo home_url('/seitai/'); ?>">日比整体</a>
                        </li>

                        <li class="gnav__item <?php if (is_page('sekkotsu')) echo 'is-current'; ?>">
                            <a href="<?php echo home_url('/sekkotsu/'); ?>">だいせんじ接骨院</a>
                        </li>

                        <li class="gnav__item dropdown dropdowntext
                            <?php if (is_page(['seitai-menu', 'sekkotsu-menu'])) echo 'is-current'; ?>">
                            <a href="">
                                <span class="nav-default">メニュー・料金</span>
                                <span class="nav-hover">下記から選択</span>
                            </a>

                        <ul class="dropdown__menu dropdown__menu--big dropdown__menu--navigation">
                            <li class="gnav__item--nonhov">
                                <a href="<?php echo home_url('/seitai-menu/'); ?>">整体&nbsp;メニュー・料金</a>
                            </li>
                            <li class="gnav__item--nonhov">
                                <a href="<?php echo home_url('/sekkotsu-menu/'); ?>">接骨院&nbsp;メニュー・料金</a>
                            </li>
                        </ul>
                    </li>

                <li class="gnav__item <?php if (is_page('sekkotsu')) echo 'is-current-sub'; ?>">
                    <a href="<?php echo home_url('/sekkotsu/#worthy'); ?>">交通事故治療</a>
                </li>

                <li class="gnav__item <?php if (is_front_page()) echo 'is-current-sub'; ?>">
                    <a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?>#access">アクセス</a>
                </li>

                <li class="gnav__item <?php if (is_front_page()) echo 'is-current-sub'; ?>">
                    <a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?>#calendar">営業案内</a>
                </li>

                    <li class="gnav__item gnav__item--nonhov gnav__item--btn">
                        <a class="btn"
                        href="<?php echo esc_url('https://lin.ee/cDKVgr8'); ?>"
                        target="_blank"
                        rel="noopener">
                            LINEで予約
                        </a>
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
                <li class="nav-overlay__item"><a href="<?php echo home_url('/sekkotsu/#worthy'); ?>"
                        class="nav-overlay__link">交通事故治療</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #access" class="nav-overlay__link">アクセス</a>
                </li>
                <li class="nav-overlay__item"><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #calendar" class="nav-overlay__link">営業案内</a>
                </li>
                <div class="nav-overlay__rese nav-overlay__item">
                    <a class="rese__line" href="<?php echo esc_url('https://lin.ee/cDKVgr8'); ?>"
                        target="_blank"
                        rel="noopener">LINEで予約</a>
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