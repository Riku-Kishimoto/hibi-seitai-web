   <footer class="footer-edit">
        <div class="footer__inner">
            <p class="admin-footer__text">
                <a
                    href="<?php echo home_url('/'); ?>"
                    class="admin-footer__link"
                    target="_blank"
                    rel="noopener"
                >
                    サイトへ戻る
                </a>

                <span class="admin-footer__sep">｜</span>

                <a
                    href="<?php echo admin_url(); ?>"
                    class="admin-footer__link"
                    target="_blank"
                    rel="noopener"
                >
                    WordPress 管理画面へ
                </a>
            </p>
        </div>

        <div class="footer__copy">
            <p>Copyright © 2026 日比整体 だいせんじ接骨院 All Rights Reserved.</p>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html>