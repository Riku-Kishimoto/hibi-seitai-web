<?php get_header(); ?>

    <main class="main  fade-in-section">
        <section class="mainvisual  fade-in-item">
            <div class="mainvisual__imageside">
                <div class="mainvisual__img mainvisual__img--top">
                    <div class="slider-img"></div>
                    <div class="slider-img"></div>
                    <div class="slider-img"></div>
                </div>
                <div class="mainvisual__side">
                    <div class="indicator">
                        <span class="indicator__dot"></span>
                        <span class="indicator__dot"></span>
                        <span class="indicator__dot"></span>
                    </div>
                    <div class="scrollbar">
                        <div class="scrollbar__text">SCROLL</div>
                        <div class="scrollbar__line">
                            <div class="scrollbar__line--yellow"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mainvisual__inner">
                <h2 class="mainvisual__title mainvisual__title--top">しんどくなったら、日比整体</h2>
            </div>
        </section>

        <section class="about">
            <div class="about__inner">
                <h3 class="about__title"><span>初めての方へ</span></h3>
                <div class="about__content">
                    <p>
                        「どこへ行っても良くならない」<wbr>「もう治らないかも…」<wbr><br class="about__br">
                        そんなお悩み、あきらめていませんか？<wbr><br class="about__br">
                        当院では肩こり・腰痛など、 一人ひとりに合わせた施術で“本来の笑顔”を取り戻すお手伝いをしています。<wbr><br class="about__br">
                        愛知県春日井市で40年以上、延べ40万人以上の方にご来院いただき、<wbr> 中日ドラゴンズの選手も訪れる信頼の技術です。
                    </p>
                </div>


                <article class="clinic">
                    <div class="clinic__top">
                        <div class="clinic__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/seitai_visual.webp" alt="日比整体">
                        </div>
                        <div class="clinic__content explanation">
                            <h3 class="clinic__title explanation__title">日比整体</h3>
                            <div class="explanation__content explanation__content--normal">
                                <p>
                                    国家資格「あん摩マッサージ指圧師」を持つ院長の技術をもとに、体のバランスを整え、肩こり・腰痛・疲れ・姿勢のゆがみを改善します。
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clinic__link">
                        <ul class="clinic__tags">
                            <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_on_front' ) ) ); ?> #calendar">土日祝も早朝営業</a></li>
                            <li><a href="<?php echo home_url('/seitai/'); ?>#point">独自の足圧施術</a></li>
                            <li><a href="<?php echo home_url('/seitai/#symptoms'); ?>">肩こり・腰痛対応</a></li>
                            <li><a href="<?php echo home_url('/seitai/#worthy'); ?>">酸素カプセル</a></li>
                        </ul>
                        <!-- <div>
                            <h4 class="table__title">こんな方におすすめ</h4>
                        <div class="table__list">
                            <ol class="table__list__item">
                                <li>疲れが取れにくい</li>
                                <li>肩こり・頭痛がつらい</li>
                                <li>集中力を高めたい</li>
                                <li>ケガの回復を早めたい</li>
                            </ol>
                        </div>
                        </div> -->
                        <a href="<?php echo home_url('/seitai/'); ?>" class="btn btn--clinic">日比整体個別ページへ<span class="dli-arrow-right"></span></a>
                    </div>
                </article>

                <article class="clinic">
                    <div class="clinic__top">
                        <div class="clinic__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotuinn_visual.webp" alt="日比整体">
                        </div>
                        <div class="clinic__content explanation">
                            <h3 class="clinic__title explanation__title">だいせんじ接骨院</h3>
                            <div class="explanation__content explanation__content--normal">
                                <p>
                                    国家資格「柔道整復師」を持つ施術者が、交通事故やケガによる痛みに丁寧に対応。保険適用の施術で、体の回復と再発しにくい体づくりを目指します。
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clinic__link">
                        <ul class="clinic__tags">
                            <li><a href="<?php echo home_url('/sekkotsu/#point'); ?>">女性の施術師</a></li>
                            <li><a href="<?php echo home_url('/sekkotsu/#worthy'); ?>">交通事故治療</a></li>
                            <li><a href="<?php echo home_url('/sekkotsu-menu/#fee'); ?>">保険治療</a></li>
                            <li><a href="<?php echo home_url('/sekkotsu/#point3'); ?>">自律神経調整施術</a></li>
                        </ul>
                        <a href="<?php echo home_url('/sekkotsu/'); ?>" class="btn btn--clinic">だいせんじ接骨院個別ページへ<span class="dli-arrow-right"></span></a>
                    </div>
                </article>
            </div>
        </section>

        <section class="information">
            <div class="information__inner">
                <h3 class="information__title"><span>お知らせ</span></h3>
                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                );
                $the_query = new WP_Query( $args );

                if ( $the_query->have_posts() ) :
                ?>
                <ul class="information__list">
                    <?php
                    $post_count = 0;
                    $total_posts = $the_query->post_count;

                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        $post_count++;

                        $li_class = 'information__items';
                        if ($post_count < $total_posts) {
                            $li_class .= ' information__border';
                        }
                    ?>
                    <li class="<?php echo $li_class; ?>">
                        <a href="<?php the_permalink(); ?>"><span><?php echo get_the_date('Y.m.d'); ?></span></a>

                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php
                else :
                    // 投稿がない場合の表示
                    echo '<p>現在、お知らせはありません。</p>';
                endif;

                // クエリのリセット（重要）
                wp_reset_postdata();
                ?>
                <a class="information__link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">お知らせ一覧ページへ</a>
                <?php if ( is_user_logged_in() && current_user_can('edit_posts') ) : ?>
                    <a class="btn btn--edit btn--edit--top" href="<?php echo esc_url( home_url('/edit/#edit__posts') ); ?>" class="price-edit-btn">
                    お知らせを編集
                    </a>
                <?php endif; ?>
            </div>
        </section>
        <section id="calendar" class="calendar">
            <div class="calendar__inner">
                <h3 class="calendar__title"><span>営業案内</span></h3>
                <div class="calendar__content">
                    <p>日比整体とだいせんじ接骨院の休診日が<br class="calendar__br">異なりますのでご注意ください。</p>
                </div>
                <div class="calendar__item">
                    <section class="schedule calendar__schedule">
                        <table class="schedule__table">
                            <thead>
                                <tr>
                                    <th>診療時間</th>
                                    <th>月</th>
                                    <th>火</th>
                                    <th>水</th>
                                    <th>木</th>
                                    <th>金</th>
                                    <th>土</th>
                                    <th>日</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>09:00~12:00</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>休</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                </tr>
                                <tr>
                                    <td>15:00~18:30</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>休</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                    <div class="calendar__list explanation explanation--cal">
                        <p class="explanation__title explanation__title--short">日比整体</p>
                        <div class="explanation__content explanation__content--normal">
                            <p>【土日祝】08:00~11:00/14:00~17:00</p>
                            <p>【休診日】水曜・第1/3/5火曜・不定休 </p>
                        </div>
                    </div>
                </div>

                <div class="calendar__item">
                    <section class="schedule calendar__schedule">
                        <table class="schedule__table">
                            <thead>
                                <tr>
                                    <th>診療時間</th>
                                    <th>月</th>
                                    <th>火</th>
                                    <th>水</th>
                                    <th>木</th>
                                    <th>金</th>
                                    <th>土</th>
                                    <th>日</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>09:00~12:00</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>休</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>休</td>
                                </tr>
                                <tr>
                                    <td>15:00~18:30</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>休</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>◯</td>
                                    <td>休</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                    <div class="calendar__list explanation explanation--cal">
                        <p class="explanation__title explanation__title--short">だいせんじ接骨院</p>
                        <div class="explanation__content explanation__content--normal">
                            <p>【土日祝】08:00~11:00/14:00~17:00</p>
                            <p>【休診日】水曜・第1/3/5火曜・日曜(月2回)・不定休</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="access" class="access">
            <div class="access__inner">
                <h3 class="access__title"><span>アクセス</span></h3>
                <div class="access__item">
                    <div class="access__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3257.2932789185797!2d137.0034634757674!3d35.27383385224607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60036db91f795555%3A0xc4444c9197646b3e!2z5pel5q-U5pW05L2TIOOBoOOBhOOBm-OCk-OBmOaOpemqqOmZog!5e0!3m2!1sja!2sjp!4v1763004204466!5m2!1sja!2sjp"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="access__info">
                        <h4 class="access__info__title">日比整体 だいせんじ接骨院</h4>
                        <div class="access__info__items explanation">
                            <p class="explanation__title explanation__title--short">所在地</p>
                            <div class="explanation__content explanation__content--normal">
                                <p class="bold"><?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-access' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></p>
                                <p><?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-address' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></p>
                                <p>駐車場<?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-parking' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?>台</p>
                            </div>
                            <p class="explanation__title explanation__title--short">ご予約・お問い合わせ</p>
                            <div class="explanation__content explanation__content--normal">
                                <p class="bgc bold">TEL：<?php
                        $custom_field_value = SCF::get_option_meta( 'theme-options', 'about-tel' );
                        if ( $custom_field_value ) {
                            echo esc_html( $custom_field_value );
                        }
                        ?></p>
                                <p>＊だいせんじ接骨院は完全予約制となります</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./js/script.js"></script>

    <?php get_footer(); ?>