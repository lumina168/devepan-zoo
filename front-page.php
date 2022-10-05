<?php get_header(); ?>



<div class="l-mv">
    <div class="p-mv">
        <div class="p-mv__inner l-inner">
            <div class="p-mv__wrap">
                <div class="p-mv__content">
                    <div class="p-content">
                        <div class="p-content__date">
                            <!-- 日付パーツ -->
                            <?php get_template_part('template-parts/day'); ?>
                        </div>
                        <div class="p-content__tag c-tag">
                            <!-- 土日は閉館日 -->
                            <?php get_template_part('template-parts/business-day'); ?>
                        </div>
                        <div class="p-content__box">
                            <div class="p-content__box-head">週刊旬予報</div>
                            <div class="p-content__box-main">
                                <p class="p-content__box-text"><?php echo get_field('weekly-text1'); ?></p>
                                <p class="p-content__box-text"><?php echo get_field('weekly-text2'); ?></p>
                                <p class="p-content__box-text"><?php echo get_field('weekly-text3'); ?></p>
                            </div>
                        </div>
                        <div class="p-content__pickup">
                            <figure class="p-content__star">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/common/bigStar.svg')); ?>" alt="星のイラスト">
                            </figure>
                            <div class="p-content__title">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/common/pickup.svg')); ?>" alt="今日のピックアップ動物">
                            </div>


                            <!-- ピックアップ画像は動物たち一覧のサムネイルから取得  サブクエリ-->
                            <figure class="p-content__img">
                                <?php
                                $seed = wp_date('Ymd');
                                $args = [
                                    'post_type' => 'animals',
                                    'posts_per_page' => 1,
                                    'orderby' => 'rand($seed)',
                                ];
                                $the_query = new WP_Query($args);
                                if ($the_query->have_posts()) : ?>

                                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                        <?php echo the_post_thumbnail(); ?>

                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php else : ?>
                                    <!-- 投稿が無い場合の内容 -->
                                <?php endif; ?>

                            </figure>
                        </div>


                        <div class="p-content__sns">
                            <div class="p-content__sns-title">SNS</div>
                            <ul class="p-content__sns-links">

                                <!-- インスタ -->
                                <?php $insta = get_field('sns-insta-acf'); ?>
                                <?php if ($insta) : ?>
                                    <li class="p-content__sns-link">
                                        <a href="<?php the_field('sns-insta-acf'); ?>">
                                            <img src="<?php echo esc_url(get_theme_file_uri('./images/common/instagram.svg')); ?>" alt="instagram">
                                        </a>
                                    </li>

                                <?php endif; ?>

                                <!-- facebook -->
                                <?php $facebook = get_field('sns-facebook-acf'); ?>
                                <?php if ($facebook) : ?>
                                    <li class="p-content__sns-link">
                                        <a href="<?php the_field('sns-facebook-acf'); ?>">
                                            <img src="<?php echo esc_url(get_theme_file_uri('./images/common/facebook.svg')); ?>" alt="facebook">
                                        </a>
                                    </li>
                                <?php endif; ?>



                                <!-- twitter -->
                                <?php $twitter = get_field('sns-twitter-acf'); ?>
                                <?php if ($twitter) : ?>
                                    <li class="p-content__sns-link">
                                        <a href="<?php the_field('sns-twitter-acf'); ?>">
                                            <img src="<?php echo esc_url(get_theme_file_uri('./images/common/twitter.svg')); ?>" alt="twitter">
                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- スライダー -->
                <div class="p-mv__items js-mv-slider">
                    <picture class="p-mv__item">
                        <source srcset="<?php echo esc_url(get_theme_file_uri('./images/top/mv_pc.png')); ?>" media="(min-width:768px)">
                        <img src="<?php echo esc_url(get_theme_file_uri('./images/top/mv.png')); ?>" alt="Welcome to DEBEPAN">
                    </picture>
                    <picture class="p-mv__item">
                        <source srcset="<?php echo get_field('top-slider1'); ?>" media="(min-width:768px)">
                        <img src="<?php echo get_field('top-slider1'); ?>" alt="Welcome to DEBEPAN">
                    </picture>
                    <picture class="p-mv__item">
                        <source srcset="<?php echo get_field('top-slider2'); ?>" media="(min-width:768px)">
                        <img src="<?php echo get_field('top-slider2'); ?>" alt="Welcome to DEBEPAN">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="l-info">
    <div class="p-info">
        <div class="p-info__inner l-inner">
            <div class="p-info__title">
                <div class="c-title">
                    <h2 class="c-title__ja">ご案内</h2>
                    <div class="c-title__img">
                        <img src="<?php echo esc_url(get_theme_file_uri('./images/common/title.svg')); ?>" alt="足跡のイラスト">
                    </div>
                    <p class="c-title__en">information</p>
                </div>
            </div>

            <!-- １最新投稿 ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー-->
            <div class="p-info__units">

                <?php
                $args = [
                    'post_type' => 'post',
                    'posts_per_page' => 1,

                ];
                $the_query = new WP_Query($args);
                ?>

                <div class="p-info__unit">
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


                            <a href="<?php the_permalink(); ?>">
                                <div class="p-info__unit-number"><span>01</span></div>
                                <div class="p-info__unit-tag c-tag">最新ニュース</div>
                                <p class="p-info__unit-text c-text"> <?php the_title(); ?> </p>
                            </a>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <!-- 投稿が無い場合の内容 -->
                    <?php endif; ?>
                </div>




                <!-- ２おすすめ投稿 ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー-->

                <div class="p-info__unit">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'category_name' => 'public-offering',
                        'posts_per_page' => 1,
                    ];
                    $the_query = new WP_Query($args);
                    ?>

                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <a href="<?php the_permalink(); ?>">
                                <div class="p-info__unit-number"><span>02</span></div>
                                <div class="p-info__unit-tag c-tag">おすすめ</div>
                                <p class="p-info__unit-text c-text"> <?php the_title(); ?> </p>
                            </a>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <!-- 投稿が無い場合の内容 -->
                    <?php endif; ?>
                </div>



                <!-- ３今日のことの投稿 ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー-->
                <div class="p-info__unit">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                    ];
                    $the_query = new WP_Query($args);
                    ?>

                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <a href="<?php the_permalink(); ?>">
                                <div class="p-info__unit-number"><span>03</span></div>
                                <div class="p-info__unit-tag c-tag">今日のこと</div>
                                <p class="p-info__unit-text c-text"> <?php the_title(); ?> </p>
                            </a>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <!-- 投稿が無い場合の内容 -->
                    <?php endif; ?>
                </div>

            </div>
            <div class="p-info__tree01 u-desktop">
                <img src="<?php echo esc_url(get_theme_file_uri('./images/top/info_tree_01.png')); ?>" alt="木のイラスト">
            </div>
            <div class="p-info__tree02 u-desktop">
                <img src="<?php echo esc_url(get_theme_file_uri('./images/top/info_tree_01.png')); ?>" alt="木のイラスト">
            </div>
        </div>
    </div>
</section>

<section class="l-about">
    <div class="p-about">
        <?php

        // サブクエリをセット
        $args = [
            'post_type' => 'page',  // 投稿タイプ
            'posts_per_page' => 1,
            'name' => 'about',
        ];

        $query = new WP_Query($args);

        ?>
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="p-about__inner l-inner">

                    <div class="p-about__title">
                        <div class="c-title">
                            <h2 class="c-title__ja">園について</h2>
                            <div class="c-title__img">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/common/title.svg')); ?>" alt="足跡のイラスト">
                            </div>
                            <p class="c-title__en">about debepan</p>
                        </div>
                    </div>

                    <p class="p-about__text c-text">
                        <?php the_content(); ?>
                    </p>

                    <div class="p-about__btn">
                        <a href="<?php echo esc_url(home_url('/about')); ?>" class="c-btn"> もっと見る </a>
                    </div>

                    <div class="p-about__map">
                        <picture class="p-about__map-tag">
                            <source srcset="<?php echo esc_url(get_theme_file_uri('./images/top/about_02_pc.png')); ?>" media="(min-width:768px)">
                            <img src="<?php echo esc_url(get_theme_file_uri('./images/top/about_02_sp.png')); ?>" alt="デベパンのアニマルマップ">
                        </picture>
                        <figure class="p-about__map-img">
                            <?php if (has_post_thumbnail()) : ?>
                                <!-- // アイキャッチ画像が設定されてれば設定したサイズで表示 -->
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <!-- // なければnoimage画像をデフォルトで表示 -->
                                <img src="<?php esc_url(get_template_directory_uri('/images/common/noimg.png')); ?>" alt="noimage">
                            <?php endif; ?>
                        </figure>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <!-- 投稿が無い場合の内容 -->
        <?php endif; ?>
    </div>
</section>

<section class="l-animals">
    <div class="p-animals">
        <div class="p-animals__inner l-inner">
            <div class="p-animals__title">
                <div class="c-title">
                    <h2 class="c-title__ja">動物たち</h2>
                    <div class="c-title__img">
                        <img src="<?php echo esc_url(get_theme_file_uri('./images/common/title.svg')); ?>" alt="足跡のイラスト">
                    </div>
                    <p class="c-title__en">about animals</p>
                </div>
            </div>

            <div class="p-animals__cards">

                <!-- 動物たち１ -->
                <!-- サブクエリで回していく -->
                <?php
                $args = [
                    'post_type' => 'animals',
                    'posts_per_page' => 1,

                ];
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <!-- 投稿の内容 -->

                        <div class="p-animals__wrap">
                            <div class="p-animals__card">
                                <div class="p-animals__card--top">
                                    <figure class="p-animals__card-img">
                                        <?php the_post_thumbnail(); ?>
                                    </figure>
                                    <div class="p-animals__card--date c-tag c-tag--none"><?php echo get_the_date('Y' . '.' . 'm' . '.' . 'd'); ?></div>
                                </div>
                                <div class="p-animals__card--bottom">

                                    <?php
                                    $terms = get_the_terms($post->ID, 'animal_tag');
                                    foreach ($terms as $term) : ?>
                                        <div class="p-animals__card-tag c-tag c-tag--cat"><a href="<?php echo get_term_link($term, 'animal_tag'); ?>"><?php echo $term->name;  ?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>


                            <div class="p-animals__card p-animals__card--sub">
                                <h3 class="p-animals__card-title">動物名：<?php the_field('animal-names'); ?></h3>
                                <p class="p-animals__card-area">出没エリア：<?php echo get_field('appearance-area'); ?>
                                </p>
                                <p class="p-animals__card-text c-text">
                                    <?php the_content(); ?>
                                </p>
                                <div class="p-animals__card-btn">
                                    <a href="<?php the_permalink(); ?>" class="c-btn"> もっと見る <img src="<?php echo esc_url(get_theme_file_uri('./images/common/news-arrow2.svg')); ?>" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <!-- 投稿が無い場合の内容 -->
                <?php endif; ?>

                <hr class="p-animals__border">

                <!-- 動物たち２リバース -->
                <?php
                $args = [
                    'post_type' => 'animals',
                    'posts_per_page' => 1,
                    'offset' => 1,
                ];
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <div class="p-animals__wrap p-animals__wrap--reverse">
                            <div class="p-animals__card">
                                <div class="p-animals__card--top">
                                    <figure class="p-animals__card-img">
                                        <?php the_post_thumbnail(); ?>
                                    </figure>
                                    <div class="p-animals__card--date c-tag c-tag--none"><?php echo get_the_date('Y' . '.' . 'm' . '.' . 'd'); ?></div>
                                </div>
                                <div class="p-animals__card--bottom">

                                    <?php $terms = get_the_terms($post->ID, 'animal_tag'); ?>
                                    <?php foreach ($terms as $term) : ?>
                                        <div class="p-animals__card-tag c-tag c-tag--cat"><a href="<?php echo get_term_link($term, 'animal_tag'); ?>"><?php echo $term->name; ?></a></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>



                            <div class="p-animals__card p-animals__card--sub p-animals__card--sub02">
                                <h3 class="p-animals__card-title">動物名：<?php the_field('animal-names'); ?></h3>
                                <p class="p-animals__card-area">出没エリア：<?php the_field('appearance-area'); ?>
                                <p class="p-animals__card-text c-text">
                                    <?php the_content(); ?>
                                </p>
                                <div class="p-animals__card-btn">
                                    <a href="<?php the_permalink(); ?>" class="c-btn"> もっと見る <img src="<?php echo esc_url(get_theme_file_uri('./images/common/news-arrow2.svg')); ?>" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <!-- 投稿が無い場合の内容 -->

                <?php endif; ?>






            </div>
            <div class="p-animals__tree01 u-desktop">
                <img src="<?php echo esc_url(get_theme_file_uri('./images/top/animals_tree_01.png')); ?>" alt="木のイラスト">
            </div>
            <div class="p-animals__tree02 u-desktop">
                <img src="<?php echo esc_url(get_theme_file_uri('./images/top/animals_tree_02.png')); ?>" alt="木のイラスト">
            </div>
            <div class="p-animals__tree03 u-desktop">
                <img src="<?php echo esc_url(get_theme_file_uri('./images/top/animals_tree_03.png')); ?>" alt="木のイラスト">
            </div>
        </div>
    </div>
</section>
<section class="l-access">
    <div class="p-access">
        <div class="p-access__inner l-inner">
            <div class="p-access__title">
                <div class="c-title">
                    <h2 class="c-title__ja">アクセス</h2>
                    <div class="c-title__img">
                        <img src="<?php echo esc_url(get_theme_file_uri('./images/common/title.svg')); ?>" alt="足跡のイラスト">
                    </div>
                    <p class="c-title__en c-title__en--white">access</p>
                </div>
            </div>
            <picture class="p-access__map">
                <source srcset="<?php echo esc_url(get_theme_file_uri('./images/top/access_01.jpg')); ?>" media="(min-width:768px)">
                <img src="<?php echo esc_url(get_theme_file_uri('./images/top/access_01_sp.jpg')); ?>" alt="地図">
            </picture>
            <div class="p-access__box">
                <div class="p-access__info">
                    <div class="p-access__unit">
                        <p class="p-access__unit-title"><span>●</span>住所</p>
                        <p class="p-access__unit-text c-text"> 〒000-0000 <br class="u-mobile">
                            東京都ぞでぃ区デベ町2丁目-25-25 </p>
                    </div>
                    <div class="p-access__unit">
                        <p class="p-access__unit-title"><span>●</span>近隣施設</p>
                        <p class="p-access__unit-text c-text"> お車でのご来園がおすすめです。 </p>
                    </div>
                    <div class="p-access__unit">
                        <p class="p-access__unit-title"><span>●</span>アクセス</p>
                        <p class="p-access__unit-text c-text"> お車でのご来園がおすすめです。 </p>
                        <picture class="p-access__unit-img">
                            <source srcset="<?php echo esc_url(get_theme_file_uri('./images/top/access_pc.svg')); ?>" media="(min-width:768px)">
                            <img src="<?php echo esc_url(get_theme_file_uri('./images/top/access_sp.png')); ?>" alt="所要時間">
                        </picture>
                    </div>
                </div>
                <figure class="p-access__img">
                    <img src="<?php echo esc_url(get_theme_file_uri('./images/top/access_02.png')); ?>" alt="来てね">
                </figure>
            </div>
            <div class="p-access__tree01 u-desktop">
                <img src="<?php echo esc_url(get_theme_file_uri('./images/top/access_tree_01.png')); ?>" alt="木のイラスト">
            </div>
            <div class="p-access__tree02 u-desktop">
                <img src="<?php echo esc_url(get_theme_file_uri('./images/top/access_tree_02.png')); ?>" alt="木のイラスト">
            </div>
        </div>
    </div>
</section>



<?php get_footer(); ?>