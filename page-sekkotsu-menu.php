<?php get_header(); ?>

<main class="main">

        <section class="mainvisual">
            <div class="mainvisual__img mainvisual__img--sekkotu"></div>
            <div class="mainvisual__inner">
                <h2 class="mainvisual__title">だいせんじ接骨院&nbsp;施術案内 / メニュー・料金</h2>
            </div>
        </section>

          <div class="rese rese--seitai">
                <p class="rese__tel" href="#">こちらはだいせんじ接骨院です</p>
                <a class="rese__tel" href="<?php echo home_url('/seitai/'); ?>">日比整体ページはこちら</a>
            </div>

        <section id="menu" class="menu">
            <div class="menu__inner">
                <h3 class="menu__title"><span>メニュー</span></h3>
                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_menu1.webp" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">肩の治療</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>肩関節は首や腕を支える重要な部位であり、筋肉がこわばると痛みや可動域の制限が生じやすくなります。
                                当院では、痛みの原因となっている筋肉に手技で直接アプローチし、筋緊張をほぐしながら肩の動きを改善していきます。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_flow2.webp" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">腰の治療</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>肩甲骨の動きが悪く、背中のつっぱりや違和感を感じる方におすすめです。
                                肩甲骨まわりの筋肉を丁寧にほぐし、可動域を広げることで姿勢改善や肩こり解消にもつながります。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_menu2.webp" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">首まわりの治療</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>膝の痛み、足の疲労やむくみ、しびれなどの不調に対応します。
                                血流やリンパの流れを促進し、足を軽く整えることで「足を細くしたい」という美容面のご希望にも効果的です。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_point2.webp" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">交通事故治療</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>足首のねんざや、かかと・足裏の痛み、正座ができないといった症状に対して矯正を行います。
                                足関節のズレを整えることで、歩行時のバランスや姿勢の安定性を取り戻します。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_menu3.webp" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">自律神経調整施術</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>足首のねんざや、かかと・足裏の痛み、正座ができないといった症状に対して矯正を行います。
                                足関節のズレを整えることで、歩行時のバランスや姿勢の安定性を取り戻します。</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="fee" id="fee">
            <div class="fee__inner">
                <h3 class="fee__title"><span>料金表</span></h3>
                <div class="fee__content">
                    <p>だいせんじ接骨院は<span class="bold">各種健康保険、労災、交通事故</span>による自賠責適用となります</p>
                </div>
                <div class="fee__list">
                    <?php
                        $args = array(
                            'post_type' => 'item',
                            'tax_query' => array(
                            array(
                            'taxonomy' => 'item_cat',
                            'field'    => 'slug',
                            'terms'    => 'sekkotsu-menu',
                            ),
                        ),
                        'orderby' => array(
                                'menu_order' => 'ASC',
                                'date'       => 'DESC',
                            )
                    );

                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <div class="fee__item">
                            <div class="explanation explanation--fee">
                                <h4 class="explanation__title explanation__title--fee">
                                    <?php the_title(); ?>
                                </h4>
                            </div>

                            <?php if (has_post_thumbnail()): ?>
                            <div class="fee__thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <?php endif; ?>

                            <div class="fee__list">
                                <?php
                                echo apply_filters('the_content', get_the_content());
                                ?>
                            </div>
                        </div>

                    <?php endwhile;
                    endif;

                    wp_reset_postdata();
                    ?>

                </div>
                <?php if ( is_user_logged_in() && current_user_can('edit_posts') ) : ?>
                    <a class="btn btn--edit" href="<?php echo esc_url( home_url('/edit/') ); ?>" class="price-edit-btn">
                    料金表を編集
                    </a>
                <?php endif; ?>
            </div>
        </section>

        <section class="flow" id="flow">
            <div class="flow__inner">
                <h3 class="flow__title"><span>施術の流れ</span></h3>
                <div class="flow__timeline">
                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.01</p>
                            <h4 class="flow__heading">受付・問診表に症状を記入</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_flow1.webp" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    初めてご来院の方には、受付で問診票をお渡しします。
                                    必要事項をご記入のうえ、ご提出ください。
                                    ご不明な点がありましたら、スタッフまでお気軽にお声かけください。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.02</p>
                            <h4 class="flow__heading">問診</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_flow3.webp" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    問診表をもとに、今お困りの症状やお体の状態を詳しく伺います。
                                    必要に応じて、手術歴や服薬状況も確認いたします。
                                    頭痛や不眠など気になることがあれば、遠慮なくご相談ください。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.03</p>
                            <h4 class="flow__heading">お身体の検査</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_flow1.webp" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    痛みのある部位だけでなく、原因となる他の箇所もチェックします。
                                    筋肉の硬さ・関節の可動域・左右のバランスなどを検査し、症状の原因を探ります。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.04</p>
                            <h4 class="flow__heading">施術</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_flow2.webp" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    検査結果に合わせて施術を行います。痛みの原因となる筋肉の張りを手技でほぐし、必要に応じて干渉波やハイボルテージ、超音波などの電気治療器を使い、根本的な改善を目指します。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.05</p>
                            <h4 class="flow__heading">施術後の説明</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_flow4.webp" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    施術後には現在のお身体の状態や、今後の来院頻度をご説明します。また、症状の早期改善につながるストレッチや、日常生活で気を付けていただきたいことについてもお伝えします。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.06</p>
                            <h4 class="flow__heading">お会計</h4>
                            <div class="flow__text">
                                <p>
                                    健康保険の負担割合により、窓口料金が異なります。
                                    明細書をお渡しいたしますので、ご確認のうえお支払いとなります。
                                    次回のご予約も承っております。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  </main>

<?php get_footer(); ?>