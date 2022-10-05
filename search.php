<?php get_header(); ?>


<div class="l-mv">
    <div class="p-mv">
        <div class="p-mv__inner l-inner">
            <div class="p-mv__wrap">
                <div class="p-mv__content">
                    <div class="p-content">
                        <div class="p-content__top">
                            <div class="c-title">
                                <h2 class="c-title__ja">動物たち</h2>
                                <p class="c-title__en">Animals</p>
                            </div>
                        </div>
                        <div class="p-content__date p-content__date--animals">
                            <?php get_template_part('template-parts/day'); ?>
                        </div>
                        <div class="p-content__tag c-tag">
                            <!-- 土日は閉館日 -->
                            <?php get_template_part('template-parts/business-day'); ?>
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


                    </div>
                </div>
                <div class="p-mv__main">
                    <div class="p-mv__top">
                        <div class="p-mv__top-head">
                            <div class="c-title">
                                <h2 class="c-title__ja">動物たち</h2>
                                <p class="c-title__en">Animals</p>
                            </div>
                        </div>



                        <div class="p-mv__slider js-mv-slider">

                            <!-- カスタム投稿のサムネイルをランダム表示     サブクエリ -->

                            <div class="p-mv__slider-item">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/animals/mv_01.png')); ?>" alt="Welcome to DEBEPAN">
                            </div>
                            <div class="p-mv__slider-item">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/animals/mv_02.png')); ?>" alt="Welcome to DEBEPAN">
                            </div>
                            <div class="p-mv__slider-item">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/animals/mv_03.png')); ?>" alt="Welcome to DEBEPAN">
                            </div>
                        </div>

                    </div>
                    <div class="p-mv__box p-mv__box--small">

                        <div class="p-mv__box-head c-bigText">動物たちの日常</div>
                        <div class="p-mv__box-tags">
                            <?php
                            // 動物たちページ、動物たちの日常で名前は出したけどただこれで名前を出してターム先に飛ばすのはいいけど日常を見せるわけじゃないから違うのかな〜
                            $args = [
                                'taxonomy' => 'animal_category'
                            ];
                            $terms = get_terms($args);
                            foreach ($terms as $term) : ?>
                                <div class="p-mv__box-tag c-tag"><a href="<?php get_term_link($term); ?>"><?php echo $term->name; ?></a></div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="l-search">
        <div class="p-search">
            <div class="p-search__inner l-inner">
                <h2 class="p-search__title">
                    <img src="<?php echo esc_url(get_theme_file_uri('./images/common/search.svg')); ?>" alt="検索">
                    <span>条件検索</span>
                </h2>
                <form action="" method="get" class="p-search__form">

                    <!-- 検索結果 -->
                    <div class="p-search__subtitle search__subtitleAnser">
                        <?php if (have_posts()) : ?>
                            <?php
                            if (isset($_GET['s']) && empty($_GET['s'])) {
                                echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
                            } else {
                                echo '“' . $_GET['s'] . '”の検索結果：' . $wp_query->found_posts . '件'; // 検索キーワードと該当件数を表示
                            }
                            ?>
                        <?php else : ?>
                            検索された名前の動物はいませんでした
                        <?php endif; ?>
                    </div>

                    <!-- 検索条件動物種類タクソノミー nameとを取得  -->
                    <dl class="p-search__form-row">
                        <dt class="p-search__subtitle">動物名から探す</dt>
                        <dd>
                            <?php
                            $args = [
                                'taxonomy' => 'animal_category'
                            ];
                            $terms = get_terms($args);
                            foreach ($terms as $term) : ?>


                                <label><a href="<?php echo get_term_link($term); ?>"><span><?php echo $term->name; ?></span></a></label>
                            <?php endforeach; ?>
                        </dd>
                    </dl>


                    <!-- 検索条件動物たち種類ターム nameとリンクを取得     -->
                    <dl class="p-search__form-row p-search__form-row--center">
                        <dt class="p-search__subtitle">タグから探す</dt>
                        <dd>
                            <?php
                            $args = [
                                'taxonomy' => 'animal_tag'
                            ];
                            $terms = get_terms($args);
                            foreach ($terms as $term) : ?>
                                <label><a href="<?php echo get_term_link($term); ?>"><span class="c-tag"><?php echo $term->name; ?></span></a></label>
                            <?php endforeach; ?>

                        </dd>
                    </dl>
                    <!-- 検索条件  動物の名前      -->

                    <dl class="p-search__form-row p-search__form-row--text">
                        <dt class="p-search__subtitle">名前から探す</dt>
                        <dd>
                            <?php get_search_form(); ?>
                        </dd>
                    </dl>

                </form>
            </div>
        </div>
    </div>

    <div class="l-cards">
        <div class="p-cards">
            <div class="p-cards__inner l-inner">
                <div class="p-cards__wrap">



                    <?php if (have_posts()) : ?>
                        <?php if (!$_GET['s']) { ?>
                            <p>検索キーワードが未入力です
                            <p>
                            <?php } else { ?>

                                <?php while (have_posts()) : the_post(); ?>
                                    <?php
                                    $cat = get_the_category();
                                    $catname = $cat[0]->cat_name;
                                    ?>
                            <div class="p-cards__card">
                                <div class="p-card">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <figure class="p-card__img">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <!-- // アイキャッチ画像が設定されてれば設定したサイズで表示 -->
                                                <?php the_post_thumbnail(); ?>
                                            <?php else : ?>
                                                <!-- // なければnoimage画像をデフォルトで表示 -->
                                                <img src="<?php esc_url(get_template_directory_uri('/images/common/noimg.png')); ?>" alt="noimage">
                                            <?php endif; ?>
                                        </figure>

                                        <div class="p-card__date">

                                            <p class="p-card__date-post">投稿日：<?php echo get_the_date(); ?></p>
                                            <p class="p-card__date-update">更新日：<?php echo get_the_modified_date(); ?></p>

                                        </div>


                                        <div class="p-card__tag c-tag"><?php echo get_field('appearance-area'); ?></div>

                                        <h3 class="p-card__title"><?php the_title(); ?></h3>
                                        <p class="p-card__text c-text"><?php the_excerpt(); ?></p>

                                    </a>

                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php } ?>
                 <?php endif; ?>

                </div>

                <!-- ============= ページング ============= -->
                <?php
                global $wp_query;
                $big = 10000;
                $paged = max(1, get_query_var('paged'))
                ?>


                <?php
                $args = [
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?page=%#%',
                    'total' => $wp_query->max_num_pages,
                    'current' => $paged,
                    'show_all' => FALSE,
                    'end_size' => 1,
                    'mid_size' => 2,
                    'prev_next' => FAlSE,
                    'type' => 'array',
                ];
                $navs = paginate_links($args);
                ?>

                <?php if ($navs) :  ?>

                    <div class="p-cards__nav">
                        <div class="p-nav">

                            <ul class="p-nav__pager">
                                <?php foreach ($navs as $nav) : ?>
                                    <li class="p-nav__page">
                                        <?php echo $nav; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="p-nav__arrows">
                                <div class="p-nav__arrow">
                                    <?php
                                    $previmage = wp_get_attachment_image(129, [30, 30]);
                                    $nextimage = wp_get_attachment_image(128, [30, 30]);
                                    previous_posts_link($previmage . '<span>前のページへ</span>'); ?>
                                </div>
                                <div class="p-nav__arrow">
                                    <?php next_posts_link($nextimage . '<span>次のページへ</span>'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php get_footer(); ?>