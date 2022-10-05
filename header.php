<!DOCTYPE html>
<html lang="ja">

<head>
	<meta name="robots" content="noindex" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<meta name="format-detection" content="telephone=no" />
	<!-- meta情報 -->
	<title>
		<?php
		wp_title('|', true, 'right');
		bloginfo('name');
		?>
	</title>
	<meta name="description" content="<?php bloginfo('discription'); ?>" />
	<meta name="keywords" content="" />
	<!-- ogp -->
	<meta property="og:title" content="" />
	<meta property="og:type" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:card" content="summary" />
	<!-- ファビコン -->
	<link rel="icon" href="#" />
	<!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&family=Kiwi+Maru:wght@400;500&display=swap" rel="stylesheet">
	<!-- css -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" /> -->
	<!-- <link rel="stylesheet" href="       ?php echo esc_url(get_theme_file_uri('./css/style.css')); ?>" /> -->



	<?php wp_head(); ?>
</head>

<body>
	<?php wp_body_open(); ?>

	<!-- header -->
	<header class="l-header">
		<div class="p-header">
			<div class="p-header__inner l-inner">
				<h1 class="p-header__logo">
					<!-- home_url('/') homeのURL取得-->
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<!-- esc_url()セキュリティ的    get_theme_file_uri()テーマフォルダまでのrootパスを取得する -->
						<img src="<?php echo esc_url(get_theme_file_uri('./images/common/logo.png')); ?>" alt="ロゴ">
					</a>
				</h1>
				<nav class="p-header__globalNav">
					<div class="p-globalNav">
						<ul class="p-globalNav__menus">
							<li class="p-globalNav__menu is-selected">
								<a href="<?php echo esc_url(home_url('/')); ?>">
									<img src="<?php echo esc_url(get_theme_file_uri('./images/common/panda.svg')); ?>" alt="HOME">
									<span>HOME</span>
								</a>
							</li>
							<li class="p-globalNav__menu">
								<a href="<?php echo esc_url(home_url('/info')); ?>">
									<img src="<?php echo esc_url(get_theme_file_uri('./images/common/map.svg')); ?>" alt="ご案内">
									<span>ご案内</span>
								</a>
							</li>
							<li class="p-globalNav__menu js-subMenu">
								<a href="<?php echo esc_url(home_url('/animals')); ?>">
									<img src="<?php echo esc_url(get_theme_file_uri('./images/common/animal.svg')); ?>" alt="動物たち">
									<span>動物たち</span>
								</a>



								<!-- 動物たち種類のナビ -->
								<div class="p-globalNav__nav">
									<ul class="p-globalNav__subMenus">
										<?php
										$args = [
											'post_type' => 'animals',
										];
										$the_query = new WP_Query($args);
										?>
										<?php if ($the_query->have_posts()) : ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
												<?php
												$terms = get_the_terms($post->ID, 'animal_category');
												foreach ($terms as $term) : ?>
													<li class="p-globalNav__subMenu"><a href="<?php echo get_term_link($term, 'animal_category') ?>"><?php echo $term->name; ?></a></li>
												<?php endforeach; ?>
											<?php endwhile; ?>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>
									</ul>
								</div>




							<li class="p-globalNav__menu">
								<a href="<?php echo esc_url(home_url('/about')); ?>">
									<img src="<?php echo esc_url(get_theme_file_uri('./images/common/star.svg')); ?>" alt="園について">
									<span>園について</span>
								</a>
							</li>
						</ul>
						<ul class="p-globalNav__contact">
							<li class="p-globalNav__contact-link">
								<a href="<?php echo esc_url(home_url('/contact-form')); ?>">
									<span class="u-desktop">お問い合わせ</span>
									<div class="p-globalNav__contact-img"></div>
								</a>
							</li>
						</ul>
					</div>
				</nav>
				<!-- ドロワー -->
				<div class="p-header__hamburger">
					<div class="p-hamburger js-hamburger">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<div class="p-header__drawer">
					<div class="p-drawer">
						<div class="p-drawer__inner l-inner">
							<nav class="p-drawer__nav">
								<ul class="p-drawer__menus">
									<li class="p-drawer__menu">
										<a href="<?php echo esc_url(home_url('/')); ?>">
											<img src="<?php echo esc_url(get_theme_file_uri('./images/common/panda.svg')); ?>" alt="HOME">
											<span>HOME</span>
										</a>
									</li>
									<li class="p-drawer__menu">
										<a href="<?php echo esc_url(home_url('/info')); ?>">
											<img src="<?php echo esc_url(get_theme_file_uri('./images/common/map.svg')); ?>" alt="ご案内">
											<span>ご案内</span>
										</a>
									</li>
									<li class="p-drawer__menu js-drawer-subMenu is-open">
										<a href="<?php echo esc_url(home_url('/animals')); ?>">
											<img src="<?php echo esc_url(get_theme_file_uri('./images/common/animals.svg')); ?>" alt="動物たち">
											<span>動物たち</span>
										</a>
										<ul class="p-drawer__subMenus">
											<?php
											$args = [
												'post_type' => 'animals',
											];
											$the_query = new WP_Query($args);
											?>
											<?php if ($the_query->have_posts()) : ?>
												<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
													<?php
													$terms = get_the_terms($post->ID, 'animal_category');
													foreach ($terms as $term) : ?>
														<li class="p-drawer__subMenu"><a href="<?php echo esc_url(get_term_link($term, 'animal_category')); ?>"><span><?php echo esc_html($term->name); ?></span></a></li>
													<?php endforeach; ?>

												<?php endwhile; ?>
												<?php wp_reset_postdata(); ?>


											<?php endif; ?>

										</ul>
									</li>
									<li class="p-drawer__menu">
										<a href="<?php echo esc_url(home_url('/about')); ?>">
											<img src="<?php echo esc_url(get_theme_file_uri('./images/common/star.svg')); ?>" alt="園について">
											<span>園について</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<main>
		<!-- ここまで<header>-->