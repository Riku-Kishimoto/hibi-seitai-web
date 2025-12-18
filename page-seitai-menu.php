<?php get_header(); ?>

<main class="main">

        <section class="mainvisual">
            <div class="mainvisual__img mainvisual__img--seitai"></div>
            <div class="mainvisual__inner">
                <h2 class="mainvisual__title">日比整体施術案内 / メニュー・料金</h2>
            </div>
        </section>

        <section id="menu" class="menu">
            <div class="menu__inner">
                <h3 class="menu__title"><span>メニュー</span></h3>
                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_menu1.png" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">首・肩の施術</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>ひどい肩こりや頭痛、寝違え、手のしびれなど、首や肩まわりの不調に対応しています。
                                筋肉や関節の動きを整え、つらい症状を根本から改善へ導きます。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_flow4.png" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">肩甲骨の施術</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>肩甲骨の動きが悪く、背中のつっぱりや違和感を感じる方におすすめです。
                                肩甲骨まわりの筋肉を丁寧にほぐし、可動域を広げることで姿勢改善や肩こり解消にもつながります。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_menu3.png" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">足の施術</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>膝の痛み、足の疲労やむくみ、しびれなどの不調に対応します。
                                血流やリンパの流れを促進し、足を軽く整えることで「足を細くしたい」という美容面のご希望にも効果的です。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_menu4.png" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">足関節矯正</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>足首のねんざや、かかと・足裏の痛み、正座ができないといった症状に対して矯正を行います。
                                足関節のズレを整えることで、歩行時のバランスや姿勢の安定性を取り戻します。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_menu5.png" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">頸椎牽引矯正</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>首の歪みや脊椎のズレ、首まわりのつまり感を改善します。
                                やさしい牽引矯正で頸椎を正しい位置に導き、神経や筋肉への負担を軽減してスムーズな可動性を回復させます。</p>
                        </div>
                    </div>
                </div>

                <div class="menu__grid">
                    <div class="menu__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_menu6.png" alt="">
                    </div>
                    <div class="menu__items explanation">
                        <h4 class="explanation__title explanation__title--short">猫背の矯正</h4>
                        <div class="explanation__content explanation__content--normal">
                            <p>背中の丸まりや姿勢の崩れを整える矯正です。
                                姿勢改善により背中の痛みを軽減し、見た目の印象もスッと美しく。
                                「身長を少しでも高く見せたい」という方にもおすすめです。</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="fee" id="fee">
            <div class="fee__inner">
                <h3 class="fee__title"><span>料金表</span></h3>
                <div class="fee__content">
                    <p>日比整体は<span class="bold">自費治療</span>となります。</p>
                </div>
                <div class="fee__list">
                    <?php
                        $args = array(
                            'post_type' => 'item',
                            'tax_query' => array(
                            array(
                            'taxonomy' => 'item_cat',
                            'field'    => 'slug',
                            'terms'    => 'seitai-menu',
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
            </div>
        </section>

        <section class="flow" id="flow">
            <div class="flow__inner">
                <h3 class="flow__title"><span>施術の流れ</span></h3>
                <div class="flow__timeline">
                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.01</p>
                            <h4 class="flow__heading">受付</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_flow1.png" alt="">
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
                            <h4 class="flow__heading">準備・お着替え</h4>
                            <div class="flow__text">
                                <p>
                                    施術を受けやすいように、動きやすい服装をご用意ください。<br>
                                    <span class="bold">〈女性の方へ〉</span><br>
                                    ワイヤー入りのブラジャーを着用されている場合、施術中に押さえた部分に痛みが残ることがあります。
                                    できるだけワイヤーのないタイプの着用をおすすめします。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.03</p>
                            <h4 class="flow__heading">温熱マット（約20分/自由選択）</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_flow2.png" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    「玉川の湯の華」岩盤浴マットを使用し、身体の内側からじんわりと温めます。
                                    血行を促進し、施術の効果を高めます。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.04</p>
                            <h4 class="flow__heading">検査・触診</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_flow3.png" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    関節の動きや痛みの程度を確認し、身体の状態を丁寧にチェックします。
                                    症状の原因となっている部分を見つけ、分かりやすくご説明します。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.05</p>
                            <h4 class="flow__heading">施術（約40分）</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_flow4.png" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    当院では、無理にボキボキと矯正することはありません。
                                    やさしく筋肉をほぐしてから必要に応じて骨格を整え、体調に合わせて力加減を調整します。
                                    初めての方でも安心して受けていただけます。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.06</p>
                            <h4 class="flow__heading">ご説明・アドバイス</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_flow5.png" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    関節の動きや痛みの程度を確認し、身体の状態を丁寧にチェックします。
                                    症状の原因となっている部分を見つけ、分かりやすくご説明します。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.07</p>
                            <h4 class="flow__heading">ローラーベッド（約8分/自由選択）</h4>
                            <div class="flow__image">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_flow6.png" alt="">
                            </div>
                            <div class="flow__text">
                                <p>
                                    施術後は、ローラーベッドで横になりながらリラックス。
                                    心地よい刺激で血行を整え、体をゆっくり休めます。
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flow__item">
                        <div class="flow__content">
                            <p class="flow__step">STEP.08</p>
                            <h4 class="flow__heading">お会計</h4>
                            <div class="flow__text">
                                <p>
                                    回数券や会員特典は、当日からご利用いただけます。
                                    ご希望の方はお気軽にお申し出ください。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>