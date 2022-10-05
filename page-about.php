<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="l-singleMv">
            <div class="p-singleMv">
                <div class="p-singleMv__inner l-inner">
                    <div class="p-singleMv__items">
                        <div class="p-singleMv__item">
                            <!--ループ -->

                            <?php if (has_post_thumbnail()) : ?>
                                <!-- // アイキャッチ画像が設定されてれば設定したサイズで表示 -->
                                <?php the_post_thumbnail(); ?>
                            <?php else : ?>
                                <!-- // なければnoimage画像をデフォルトで表示 -->
                                <img src="<?php esc_url(get_template_directory_uri('/images/common/noimg.png')); ?>" alt="noimage">
                            <?php endif; ?>

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

                            <div class="p-article__date">
                                <span><?php echo get_the_date('Y.m.d'); ?>記事</span>
                                <span><?php echo get_the_modified_date('Y.m.d'); ?></span>
                            </div>
                            <h2 class="p-article__title"><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>