<?php get_header(); ?>

<div class="l-singleMv">
    <div class="p-singleMv">
        <div class="p-singleMv__inner l-inner">
            <div class="p-singleMv__items">
                <div class="p-singleMv__item">
                    <!--ループ -->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>

                            <?php
                            if (has_post_thumbnail()) {
                                // アイキャッチ画像が設定されてれば設定したサイズで表示
                                the_post_thumbnail();
                            } else {
                                // なければnoimage画像をデフォルトで表示
                                echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/common/noimg.png" alt="noimage">';
                            }
                            ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <!-- <img src="<?php echo esc_url(get_theme_file_uri('./images/info2/mv_01.png')); ?>" alt="メインビュー"> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="l-article">
    <div class="p-article">
        <div class="p-article__inner l-inner">
            <div class="p-article__box">
                <div class="p-article__box-inner">
                    <!--ループ -->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="p-article__date">
                                <span><?php echo get_the_date('Y.m.d'); ?>記事</span>
                                <span><?php echo get_the_modified_date('Y.m.d'); ?>更新</span>
                            </div>
                            <div class="p-article__tag c-tag c-tag--yellow"><?php the_category(); ?></div>
                            <h2 class="p-article__title"><?php the_title(); ?></h2>

                            <div class="p-article__wrap">

                                <p> <?php the_content(); ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>



            <div class="p-article__nav">
                <div class="p-nav">
                    <div class="p-nav__btn">
                        <a href="<?php echo esc_url(home_url('/about')); ?>" class="c-btn">一覧をみる</a>
                    </div>
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