<?php get_header(); ?>

<div class="l-mv">
	<div class="p-mv">
		<div class="p-mv__inner l-inner">
			<div class="p-mv__wrap">
				<div class="p-mv__content">
					<div class="p-content">
						<div class="p-content__top">
							<div class="c-title">
								<h2 class="c-title__ja">ご案内</h2>
								<p class="c-title__en">information</p>
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
				<div class="p-mv__main p-mv__main--info">
					<div class="p-mv__top">
						<div class="p-mv__top-head">
							<div class="c-title">
								<h2 class="c-title__ja">ご案内</h2>
								<p class="c-title__en">information</p>
							</div>
						</div>
						<p class="p-mv__top-text c-text"> デベパン動物園の今を発信。テキストテキストテキスト </p>
						<div class="p-mv__slider p-mv__slider--info js-mv-slider">

							<?php
							$args = [
								'post_type' => 'animals',
								'posts_per_page' => 3,
								'orderby' => 'rand',
							];
							$the_query = new WP_Query($args);
							if ($the_query->have_posts()) : ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<div class="p-mv__slider-item p-mv__slider-item--info">
										<?php echo the_post_thumbnail(); ?>
									</div>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php else : ?>
								<!-- 投稿が無い場合の内容 -->
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
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
							<div class="p-card p-cardArchive">
								<a href="<?php echo get_permalink(); ?>">

									<figure class="p-card__img p-card__imgArchive">
										<?php if (has_post_thumbnail()): // アイキャッチ画像が設定されてれば設定したサイズで表示 ?>

										<?php the_post_thumbnail(); ?>
									<?php else: // なければnoimage画像をデフォルトで表示 ?>
											
									<img src="<?php echo esc_url(get_template_directory_uri('/images/common/noimg.png')) ?>" alt="noimage">
										
										<?php endif; ?>
									</figure>

									<div class="p-card__date p-card__dateArchive">
										<p class="p-card__date-post">投稿日：<?php echo get_the_date('Y.m.d'); ?></p>
										<p class="p-card__date-update">更新日：<?php echo get_the_modified_date('Y.m.d'); ?></p>
									</div>

									<?php $tags = get_the_tags(); ?>
									<?php foreach ($tags as $tag) : ?>
										<div class="p-card__tag c-tag c-tagArchive"><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo  $tag->name; ?></a></div>
									<?php endforeach; ?>

									<h3 class="p-card__title"><?php the_title(); ?></h3>
									<p class="p-card__text c-text">
										<?php the_excerpt(); ?> </p>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
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