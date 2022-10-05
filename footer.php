	
</main>
	<footer class="l-footer">
		<div class="p-footer">
			<div class="p-footer__inner l-inner">
				<div class="p-footer__img">
					<img src="<?php echo esc_url(get_theme_file_uri('./images/common/logo.png')); ?>" alt="ロゴ">
				</div>
				<nav class="p-footer__nav">
					<ul class="p-footer__links">
						<li class="p-footer__link">
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo esc_url(get_theme_file_uri('./images/common/panda.svg')); ?>" alt="HOME">
								<span>HOME</span>
							</a>
						</li>
						<li class="p-footer__link">
							<a href="<?php echo esc_url(home_url('/info')); ?>">
								<img src="<?php echo esc_url(get_theme_file_uri('./images/common/map.svg')); ?>" alt="ご案内">
								<span>ご案内</span>
							</a>
						</li>
						<li class="p-footer__link">
							<a href="<?php echo esc_url(home_url('/animals')); ?>">
								<img src="<?php echo esc_url(get_theme_file_uri('./images/common/animal.svg')); ?>" alt="動物たち">
								<span>動物たち</span>
							</a>
						</li>
						<li class="p-footer__link">
							<a href="<?php echo esc_url(home_url('/about')); ?>">
								<img src="<?php echo esc_url(get_theme_file_uri('./images/common/star.svg')); ?>" alt="園について">
								<span>園について</span>
							</a>
						</li>
					</ul>
				</nav>
				<p class="p-footer__copy">presenterd by debepan</p>
			</div>
		</div>
	</footer>

	<!-- JavaScript -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
	<!-- <script defer src="?php echo esc_url(get_theme_file_uri('./js/script.js')); ?>"></script> -->

	<?php wp_footer(); ?>
</body>

</html>