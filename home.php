<?php get_header(); ?>

    <main class="main">

        <section class="mainvisual">
            <div class="mainvisual__img mainvisual__img--seitai"></div>
            <div class="mainvisual__inner">
                <h2 class="mainvisual__title">お知らせ</h2>
            </div>
        </section>

        <section class="infomation">
            <div class="infomation__inner">
                <div class="infomation__article">
                    <?php if ( have_posts() ) : ?>
                <ul class="infomation__items">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <li class="infomation__list">
                            <a class="infomation__first" href="<?php the_permalink(); ?>">
                                <span class="infomation__date"><?php echo get_the_date('Y.m.d'); ?></span>
                                <span class="infomation__title"><?php the_title(); ?></span>
                            </a>
                            <?php if ( is_user_logged_in() && current_user_can('edit_posts') ) : ?>
                                <a class="infomation__editbtn" href="<?php echo get_edit_post_link(); ?>">編集</a>
                            <?php endif; ?>
                        </li>

                    <?php endwhile; ?>

                </ul>

                <?php if ( is_user_logged_in() && current_user_can('edit_posts') ) : ?>
                    <div class="infomation__head">
                        <a class="infomation__add" href="<?php echo admin_url('post-new.php'); ?>">＋ 新しい記事を追加</a>
                    </div>
                <?php endif; ?>
                <?php else : ?>
                    <p>まだ記事が投稿されていません。</p>
                <?php endif; ?>
                </div>
                <div class="pagination">
                    <?php
                // ページネーションの関数
                $args = array(
                    'mid_size'  => 2, // 現在のページの両側に表示するページ数
                    'prev_text' => '前へ',
                    'next_text' => '次へ',
                    'screen_reader_text' => 'ページナビゲーション',
                    'type'      => 'list', // ul/liタグで出力
                );

                // ページネーションをカスタムクラスでラップ
                echo '<div class="pagination__wrap">';

                // ページネーションの出力
                $pagination_html = get_the_posts_pagination( $args );

                // 出力されたHTMLを編集してクラスを適用
                // WordPress標準のページネーションのクラス名を、ご提示のクラス名に置換します
                $pagination_html = str_replace(
                    array(
                        'page-numbers',
                        'prev',
                        'next',
                        'dots',
                        '<ul class="page-numbers">',
                    ),
                    array(
                        'pagination__item',
                        'pagination__item',
                        'pagination__item',
                        'pagination__item',
                        '<ul class="pagination__list">',
                    ),
                    $pagination_html
                );

                // 現在のページを示す `current` クラスを `active` クラスに置換（CSSに合わせて）
                $pagination_html = str_replace(
                    'current',
                    'active',
                    $pagination_html
                );

                echo $pagination_html;

                echo '</div>';
                ?>
                </div>
                <?php if ( is_user_logged_in() && current_user_can('edit_posts') ) : ?>
                    <a class="btn btn--edit btn--edit--top" href="<?php echo esc_url( home_url('/edit/#edit__posts') ); ?>" class="price-edit-btn">
                    お知らせを編集
                    </a>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>