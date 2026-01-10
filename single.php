<?php get_header(); ?>

    <main class="main">

 <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <section class="mainvisual">
            <div class="mainvisual__img mainvisual__img--seitai"></div>
            <div class="mainvisual__inner">
                <h2 class="mainvisual__title"><?php the_title(); ?></h2>
            </div>
        </section>

        <section class="post">
            <div class="post__inner">
                <div class="post__top">
                    <h3 class="post__title"><?php the_title(); ?></h3>
                    <p class="post__date">投稿日：<?php echo get_the_date('Y.m.d'); ?></p>
                </div>

                <div class="post__content">
                    <?php the_content(); ?>
                </div>

                <?php
                the_post_navigation( array(
                    'prev_text' => '<span class="nav-prev-icon"></span><span class="nav-prev-text">前の記事</span>',
                    'next_text' => '<span class="nav-next-text">次の記事</span><span class="nav-next-icon"></span>',
                ) );
                ?>
                <a class="information__link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">お知らせ一覧ページへ</a>
            </div>
        </section>

        <?php endwhile; ?>
    <?php else : ?>
        <p>お探しの記事は見つかりませんでした。</p>
    <?php endif; ?>
    </main>

<?php get_footer(); ?>