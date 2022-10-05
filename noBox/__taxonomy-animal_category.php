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
                            <p class="p-content__today">TODAY</p>
                            <div class="p-content__month">
                                <span>
                                    <?php echo date_i18n('Y'); //年月日を表示
                                    ?>
                                </span>
                                <span>
                                    <?php echo date_i18n('m'); //年月日を表示
                                    ?>
                                </span>
                            </div>
                            <div class="p-content__day">
                                <span>
                                    <?php
                                    $week = array('日', '月', '火', '水', '木', '金', '土'); //曜日を用意
                                    echo '（' . $week[date_i18n('w')]  . '）'; //曜日を表示
                                    ?>
                                </span>
                                <span>
                                    <?php echo date_i18n('d'); //年月日を表示
                                    ?>
                                </span>
                            </div>

                        </div>
                        <div class="p-content__tag c-tag">
                            <!-- 土日は閉館日 -->
                            <?php
                            $today = getdate();
                            if ($today['wday'] == 0 || $today['wday'] == 6) {
                                echo "今日は閉園日";
                            } elseif ($today['wday'] >= 1 and $today['wday'] < 6) {
                                echo "今日は開園日";
                            }
                            ?>
                        </div>


                        <div class="p-content__pickup">
                            <figure class="p-content__star">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/common/bigStar.svg')); ?>" alt="星のイラスト">
                            </figure>
                            <div class="p-content__title">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/common/pickup.svg')); ?>" alt="今日のピックアップ動物">
                            </div>
                            <figure class="p-content__img">

                                <!-- ピックアップ画像は動物たち一覧のサムネイルから取得  サブクエリ-->



                                <img src="<?php echo esc_url(get_theme_file_uri('./images/common/mv_02.png')); ?>" alt="今日のピックアップ動物の写真">






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
                            <!-- ご案内   決まったタグのname リンク を表示  サブクエリ-->
                            <div class="p-mv__box-tag c-tag">
                            <?php get_the_term_list($post->id,'animal_category','',''); ?>

                            </div>

                            <div class="p-mv__box-tag c-tag">#ゴリラ</div>
                            <div class="p-mv__box-tag c-tag">#パンダ</div>
                            <div class="p-mv__box-tag c-tag">#キリン</div>
                            <div class="p-mv__box-tag c-tag">#カピバラ</div>
                            <div class="p-mv__box-tag c-tag">#ハシビロコウ</div>
                        </div>
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





                <!-- 検索条件動物種類タクソノミー nameとリンクを取得    サブクエリ -->
                <dl class="p-search__form-row">
                    <dt class="p-search__subtitle">検索結果：<?php single_term_title(); ?>の一覧を探しました。</dt>
                    <dd>
                        <label>
                            <a href="">
                                <span>・パンダ</span>
                            </a>
                        </label>
                        <label>
                            <a href="">
                                <span>・レッサーパンダ</span>
                            </a>
                        </label>
                        <label>
                            <a href="">
                                <span>・ハシビロコウ</span>
                            </a>
                        </label>
                        <label>
                            <a href="">
                                <span>・キリン</span>
                            </a>
                        </label>
                        <label>
                            <a href="">
                                <span>・ゴリラ</span>
                            </a>
                        </label>
                        <label>
                            <a href="">
                                <span>・カピバラ</span>
                            </a>
                        </label>
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






                <!--ループ -->
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="p-cards__card">
                            <div class="p-card">
                                <a href="<?php echo get_permalink(); ?>">
                                    <figure class="p-card__img">
                                        <!-- <img src="<?php echo esc_url(get_theme_file_uri('./images/common/gorilla.png')); ?>" alt="ゴリラ"> -->
                                        <?php
                                        if (has_post_thumbnail()) {
                                            // アイキャッチ画像が設定されてれば設定したサイズで表示
                                            the_post_thumbnail('thumbnail');
                                        } else {
                                            // なければnoimage画像をデフォルトで表示
                                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/common/noimg.png" alt="noimage">';
                                        }
                                        ?>


                                    </figure>
                                    <div class="p-card__date">


                                        <p class="p-card__date-post">投稿日：<?php echo get_the_date(); ?></p>
                                        <p class="p-card__date-update">更新日：<?php echo get_the_modified_date(); ?></p>

                                    </div>
                                    <div class="p-card__tag c-tag">
                                        <?php
                                        $terms = get_the_terms($post->ID, 'animal_category');
                                        foreach ($terms as $term) :/* 3配列 or オブジェクトの取り出し */
                                        ?>
                                            <?php echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';   ?>

                                        <?php endforeach; ?>
                                    </div>
                                    <h3 class="p-card__title"><?php the_title(); ?></h3>
                                    <p class="p-card__text c-text"><?php the_excerpt(); ?></p>
                                </a>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>










            </div>
            <div class="p-cards__nav">
                <div class="p-nav">
                    <ul class="p-nav__pager">
                        <li class="p-nav__page is-active">
                            <a href="#">1</a>
                        </li>
                        <li class="p-nav__page">
                            <a href="#">2</a>
                        </li>
                        <li class="p-nav__page">
                            <a href="#">3</a>
                        </li>
                    </ul>
                    <div class="p-nav__arrows ">
                        <div class="p-nav__arrow">
                            <a href="#">
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/common/prev-arrow2.svg')); ?>" alt="前のページへ">
                                <span>前のページへ</span>
                            </a>
                        </div>
                        <div class="p-nav__arrow">
                            <a href="#">
                                <span>次のページへ</span>
                                <img src="<?php echo esc_url(get_theme_file_uri('./images/common/next-arrow2.svg')); ?>" alt="次のページへ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










<?php get_footer(); ?>