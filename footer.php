   <footer class="footer">
        <div class="footer__inner">
            <div class="footer__link">
                <div class="footer__nav">
                    <div class="footer__content">
                        <h3 class="footer__content__title"><a href="#">ホーム</a></h3>
                        <ul class="footer__content__list">
                            <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #access">お問い合わせ</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #access">アクセス</a></li>
                            <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #calendar">営業案内</a></li>
                        </ul>
                    </div>
                    <div class="footer__content">
                        <h3 class="footer__content__title"><a href="<?php echo home_url('/seitai/'); ?>">日比整体</a></h3>
                        <ul class="footer__content__list">
                            <li><a href="<?php echo home_url('/sekkotsu/#symptoms'); ?>">施術内容</a></li>
                            <li><a href="<?php echo home_url('/seitai-menu/'); ?>">料金</a></li>
                            <li><a href="<?php echo home_url('/seitai/#worthy'); ?>">酸素カプセル</a></li>
                        </ul>
                    </div>
                    <div class="footer__contet">
                        <h3 class="footer__content__title"><a href="<?php echo home_url('/sekkotsu/'); ?>">だいせんじ接骨院</a></h3>
                        <ul class="footer__content__list">
                            <li><a href="<?php echo home_url('/sekkotsu/#symptoms'); ?>">施術内容</a></li>
                            <li><a href="<?php echo home_url('/sekkotsu-menu/'); ?>">料金</a></li>
                            <li><a href="<?php echo home_url('/sekkotsu/#worthy'); ?>">交通事故治療</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer__btns">
                    <a href="#" class="btn btn--line">LINEで予約</a>
                    <a href="tel:0568843383" class="btn btn--tel"><?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-tel' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></a>
                </div>
            </div>

            <div class="footer__info explanation">
                <h3 class="explanation__title">日比整体 だいせんじ接骨院</h3>
                <div class="explanation__content">
                    <p><?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-address' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?>
                    </p>
                    <p>【平日】<?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-hours' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></p>
                    <p>【土日祝】<?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-hours-holiday' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></p>
                </div>
            </div>
            <div class="footer__sns">
                <a href="https://www.instagram.com/hibiseitai/" target="_blank" rel="noopener">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Instagram_Glyph_Black.svg"
                        alt="Instagramへのリンク">
                </a>
                <a href="https://www.youtube.com/channel/UCHM63UeOF5oRmwf-WXDowMQ"
                    target="_blank"
                    rel="noopener">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/youtube_social_icon_dark.png"
                    alt="日比整体のYouTubeチャンネルへのリンク">
                </a>
            </div>

        </div>
        <div class="footer__copy">
            <p>Copyright © 2025 日比整体 だいせんじ接骨院 All Rights Reserved.</p>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html>