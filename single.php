<?php get_header(); ?>

<div class="l-singleMv">
    <div class="p-singleMv">
        <div class="p-singleMv__inner l-inner">
            <div class="p-singleMv__items">
                <div class="p-singleMv__item">
                    <!--ループ -->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <!-- <img src="   ?php echo esc_url(get_theme_file_uri('./images/common/gorilla.png')); ?>" alt="ゴリラ"> -->
                            <?php if (has_post_thumbnail()) : ?>
                                <!-- // アイキャッチ画像が設定されてれば設定したサイズで表示 -->
                                <?php the_post_thumbnail(); ?>
                            <?php else : ?>
                                <!-- // なければnoimage画像をデフォルトで表示 -->
                                <img src="<?php esc_url(get_template_directory_uri('/images/common/noimg.png')); ?>" alt="noimage">
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <!-- <img src="<?php echo esc_url(get_theme_file_uri('./images/info2/mv_01.png')); ?>" alt="メインビュー"> -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- デフォルト投稿記事ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
<div class="l-article">
    <div class="p-article">
        <div class="p-article__inner l-inner  animals-summary">
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
                            <p> <?php the_content(); ?></p>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>



            <div class="p-article__nav">
                <div class="p-nav">
                    <div class="p-nav__btn">
                        <a href="<?php echo esc_url(home_url('/info')); ?>" class="c-btn">一覧をみる</a>
                    </div>

                    <div class="p-nav__arrows">
                        <?php
                        $previmage = wp_get_attachment_image(129, [30, 30]);
                        $nextimage = wp_get_attachment_image(128, [30, 30]);
                        ?>
                        <div class="p-nav__arrow">

                            <?php previous_post_link('%link', $previmage . '<span>前のページへ</span>'); ?>

                        </div>

                        <div class="p-nav__arrow">
                            <?php next_post_link('%link', '<span>次のページへ</span>' . $nextimage); ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



<?php get_footer(); ?>