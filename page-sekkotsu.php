<?php get_header(); ?>

<main class="main">

        <section class="mainvisual">
            <div class="mainvisual__img mainvisual__img--sekkotu"></div>
            <div class="mainvisual__inner">
                <h2 class="mainvisual__title">だいせんじ接骨院</h2>
            </div>
        </section>

        <div class="rese rese--seitai">
                <p class="rese__tel" href="#">こちらはだいせんじ接骨院です</p>
                <a class="rese__tel" href="<?php echo home_url('/seitai/'); ?>">日比整体ページはこちら</a>
            </div>

        <section class="about">
            <div class="about__inner">
                <h3 class="about__title"><span>だいせんじ接骨院について</span></h3>
                <div class="about__content">
                    <p>
                        当院では、患者様お一人おひとりの症状やお身体の状態を丁寧に把握し、
                        その方に最も合った施術を行うことで、早期回復を目指します。
                        一時的な痛みの軽減だけでなく、原因を見極め、再発しにくい身体づくりをサポートいたします。
                        心も身体も軽くなり、笑顔で日常を過ごせるよう、真心を込めて施術いたします。
                    </p>
                </div>
        </section>
        <section class="point" id="point">
            <div class="point__inner">
                <h3 class="point__title"><span>だいせんじ接骨院のポイント</span></h3>
                <article class="point__article card">
                    <div class="card__side card__side--meta">
                        <div class="card__num">01</div>
                        <h4 class="card__title">女性治療師による<br>やさしい施術</h4>
                    </div>

                    <div class="card__side card__side--media">
                        <figure class="card__figure">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotuinn_point1.webp" alt="" class="card__img">
                            <figcaption class="card__caption">
                                初めての施術で不安を感じる方にも、安心して受けていただけるよう丁寧に対応いたします。
                                女性治療師ならではのきめ細やかな気配りと共感のある施術で、心身の緊張をほぐしながら不調を整えます。
                            </figcaption>
                        </figure>
                    </div>
                </article>

                <article class="point__article card">
                    <div class="card__side card__side--meta card__side--second">
                        <div class="card__num">02</div>
                        <h4 class="card__title">交通事故による<br>体の痛みを根本改善</h4>
                    </div>

                    <div class="card__side card__side--media">
                        <figure class="card__figure">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_point2.webp" alt="" class="card__img card__img--second">
                            <figcaption class="card__caption">
                                むちうちや事故後の痛み・不調に専門的に対応。
                                手技と電気治療を組み合わせ、筋肉・靭帯・関節へ的確にアプローチします。
                                弁護士と提携し、保険手続きもサポート。
                                予約制で待ち時間が少なく、土日も一部営業しています
                            </figcaption>
                        </figure>
                    </div>
                </article>

                <article class="point__article card" id="point3">
                    <div class="card__side card__side--meta">
                        <div class="card__num">03</div>
                        <h4 class="card__title">自律神経バランス調整</h4>
                    </div>

                    <div class="card__side card__side--media">
                        <figure class="card__figure">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_point3.webp" alt="" class="card__img">
                            <figcaption class="card__caption">
                                ストレスや疲労による不調に。
                                手技と電気刺激で筋肉の緊張をゆるめ、血流とリンパの流れを整えます。
                                副交感神経を優位にして、心身ともにリラックスできる状態へ導きます。
                            </figcaption>
                        </figure>
                    </div>
                </article>
            </div>
        </section>

        <section class="symptoms" id="symptoms">
            <div class="symptoms__inner">
                <h3 class="symptoms__title"><span>施術内容</span></h3>

                <div class="symptoms__items explanation">
                    <h4 class="explanation__title explanation__title--short">急性腰痛（ぎっくり腰）</h4>
                    <div class="explanation__content explanation__content--normal">
                        <p>急性腰痛には、超音波やハイボルテージで症状を和らげ、殿筋・腸腰筋・多裂筋の緊張を緩めて早期回復を目指します。ストレッチや動作時の注意点、テーピングも提案します。
                        </p>
                    </div>
                </div>

                <div class="symptoms__items explanation">
                    <h4 class="explanation__title explanation__title--short">頚部捻挫（寝違え・首の痛み）</h4>
                    <div class="explanation__content explanation__content--normal">
                        <p>微弱電流や超音波治療器を使用し、首の筋肉・関節・靭帯に生じている炎症や緊張を取り除く施術を行います。
                            肩や背中の筋肉が症状の原因となる場合もあるため、触診で状態を丁寧に確認し、筋肉を緩めることで症状の軽減を目指します。</p>
                    </div>
                </div>

                <div class="symptoms__items explanation">
                    <h4 class="explanation__title explanation__title--short">足関節捻挫</h4>
                    <div class="explanation__content explanation__content--normal">
                        <p>受傷直後にはハイボルテージで疼痛を緩和し、超音波治療器で腫れの軽減を行います。
                            正しい処置を行うことで、回復の見込みを高めることが可能です。
                        </p>
                    </div>
                </div>

                <div class="symptoms__items explanation">
                    <h4 class="explanation__title explanation__title--short">肉離れ（ハムストリングス・大腿四頭筋・内転筋・ふくらはぎ）</h4>
                    <div class="explanation__content explanation__content--normal">
                        <p>超音波治療器や微弱電流を用いて、損傷した組織の早期修復を目指します。
                            再発防止のため、足部のアライメントや下肢の筋肉バランスの調整も行います。</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="worthy" id="worthy">
            <div class="worthy__inner">
                <h3 class="worthy__title worthy__title--sekkotsu"><span>交通事故治療</span></h3>

                <div class="worthy__items explanation">
                    <h4 class="explanation__title explanation__title--short">交通事故治療</h4>
                    <div class="explanation__content explanation__content--normal">
                        <p>だいせんじ接骨院では、交通事故によるむちうちや体の痛みに対し、
                            手技と電気治療機を組み合わせて、痛みの原因から丁寧にアプローチします。
                            予約制で待ち時間も少なく、弁護士とも提携しているため安心して通えます。
                            レントゲンでは異常がない方や、長引く違和感にお悩みの方もご相談ください</p>
                    </div>
                </div>

                <div class="worthy__grid">
                    <div class="worthy__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/sekkotu_cure.webp" alt="">
                    </div>

                    <div class="worthy__items table">
                        <h4 class="table__title">保険適用について</h4>
                        <div class="table__content">
                            <p>交通事故治療は自賠責・任意保険が適用され、窓口負担は0円です。症状に合わせて施術内容や期間も柔軟に対応します。</p>
                        </div>
                        <h4 class="table__title">こんな方におすすめ</h4>
                        <div class="table__list">
                            <ol class="table__list__item">
                                <li>レントゲンでは異常がないが首に違和感を感じる</li>
                                <li>雨の日など天気の悪いと体の調子が悪くなる</li>
                                <li>長く通っているが改善しない</li>
                                <li>スポーツや趣味を事故する前と同じように楽しみたい</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="nextbtn">
                <a href="<?php echo home_url('/sekkotsu-menu/#fee'); ?>">
                    <div class="nextbtn__inner">
                        <div class="nextbtn__content">
                            <p>料金表ページへ<span class="dli-arrow-right"></span></p>
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <section class="staff" id="staff">
            <div class="staff__inner">
                <h3 class="staff__title"><span>スタッフ紹介</span></h3>

                <div class="person">
                    <div class="person__info">

                        <div class="person__info__image">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/akiko_photo.webp" alt="">
                        </div>

                        <div class="person__info__role">院長</div>
                        <div class="person__info__name">
                            <span class="person__info__name__ruby">ヒビ&nbsp;アキコ</span>
                            <span class="person__info__name__name">日比&nbsp;亜希子</span>
                        </div>
                    </div>

                    <div class="person__content">
                        <div class="person__items explanation">
                            <h4 class="explanation__title">ひとこと</h4>
                            <div class="explanation__content explanation__content--normal">
                                <p>地域の皆さまが安心して通える場所を目指し、女性や若い方にもリラックスしていただけるよう、院内の雰囲気づくりや丁寧な説明を心がけています。
                                    交通事故によるむち打ちや腰痛、スポーツによるけがなど、幅広い症状に対応しております。
                                    患者さま一人ひとりの声に耳を傾け、心と身体の両面からサポートできるよう努めています。どんな些細なお悩みでも、どうぞお気軽にご相談ください。</p>
                            </div>
                        </div>
                        <p class="person__tag bgc bold">柔道整復師</p>
                    </div>
                </div>

            </div>

            </div>
            <div class="nextbtn">
                <a href="<?php echo home_url('/sekkotsu-menu/#flow'); ?>">
                    <div class="nextbtn__inner">
                        <div class="nextbtn__content">
                            <p>施術の流れ<span class="dli-arrow-right"></span></p>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </main>

<?php get_footer(); ?>