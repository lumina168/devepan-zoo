<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('リンリン', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
		<!--検索全投稿から取るようにするためやったけどなんか違うから一旦保留
		<input type="hidden" value="animal-category" name="post_type" />
		<input type="hidden" value="animal-tag" name="post_type" />
		<input type="hidden" value="post-tag" name="post_type" />
		<input type="hidden" value="category" name="post_type" /> -->
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>" />
</form>