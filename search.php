<?php get_header(); ?>

			<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="archivetitle"><?php _e('Search Results', 'dark_marble'); ?></h2>



		<?php while (have_posts()) : the_post(); ?>

			<div <?php if (function_exists('post_class')){post_class();}else{echo 'class="post" ';} ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'dark_marble'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>
				
				
				<?php the_excerpt(); ?>

				<p class="postfooter"><?php the_tags(__('Tags:', 'dark_marble') . ' ', ', ', '<br />'); ?>
					<?php edit_post_link(__('Edit', 'dark_marble'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'dark_marble'), __('1 Comment &#187;', 'dark_marble'), __('% Comments &#187;', 'dark_marble'), '', __('Comments Closed', 'dark_marble') ); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'dark_marble')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'dark_marble')) ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('No posts found. Try a different search?', 'dark_marble'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
