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




<!-- カスタム投稿記事   animalsーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->

<div class="l-article">
    <div class="p-article">
        <div class="p-article__inner l-inner  animals-summary">
            <div class="p-article__box">
                <div class="p-article__box-inner">
                    <!--ループ -->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="p-article__date">
                                <ul>
                                    <li>
                                        <p>年齢：<?php the_field('age'); ?></p>
                                    </li>
                                    <li>
                                        <p>生まれ：<?php the_field('birthplace'); ?></p>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="p-article__title"><?php the_title(); ?>紹介</h2>
                            <p> <?php the_content(); ?></p>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>


            <div class="p-article__box">
                <div class="p-article__box-inner">
                    <h2 class="p-article__title"><?php the_terms($post->ID, 'animal_category', '別の', '', 'をみる'); ?></h2>
                </div>

                <div class="p-article__items">
                    <?php
                    $term = array_shift(get_the_terms($post->ID, 'animal_category')); //←ここが追加
                    $args = array(
                        'post_type' => 'animals', // 投稿タイプを指定
                        'posts_per_page' => 3, // 表示件数を指定
                        'orderby' =>  'rand', // ランダムに投稿を取得
                        'post__not_in' => array($post->ID), // 現在の投稿を除外
                        'tax_query' => array( // タクソノミーパラメーターを使用
                            array(
                                'taxonomy' => 'animal_category', // タームを取得タクソノミーを指定
                                'field' => 'slug', // スラッグに一致するタームを返す
                                'terms' => $term // タームの配列を指定
                            )
                        )
                    );
                    ?>

                    <?php $the_query = new WP_Query($args); ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


                            <div class="p-article__item">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?><p><?php the_title(); ?></p></a>
                            </div>


                        <?php endwhile; ?>

                    <?php else : ?>
                        <p>関連アイテムはまだありません。</p>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="p-article__nav">
                <div class="p-nav">
                    <div class="p-nav__btn">
                        <a href="<?php echo esc_url(home_url('/animals')); ?>" class="c-btn">一覧をみる</a>
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