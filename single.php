<?php get_header(); ?>

			<div id="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php if (function_exists('post_class')){post_class();}else{echo 'class="post" ';} ?> id="post-<?php the_ID(); ?>">
					<div class="post-head">
						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'dark_marble'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
						<div class="post-title-meta"> <span class="author"><?php printf(__('Posted by %s', 'dark_marble'), the_author('',false) ); ?></span>
							<?php the_time(__('F jS, Y', 'dark_marble')) ?>
						</div>
					</div>
					<div class="entry">
					<?php the_content(__('Read the rest of this entry &raquo;', 'dark_marble')); ?>
							<p class="postfooter"><?php the_tags(__('Tags:', 'dark_marble') . ' ', ', ', '<br />'); ?>
														<?php if (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<?php printf(__('Comments Off', 'dark_marble'), trackback_url(false)); ?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('Pings Off.', 'dark_marble'); ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Comments Off , Pings Off.', 'dark_marble'); ?>

						<?php } edit_post_link(__('Edit this entry', 'dark_marble'),'','.'); ?></p>
					</div>
		<?php if(get_next_post() || get_previous_post()) : ?>
					<div id="new-old-navigation">
						<?php if(next_post_link('<p class="newer">'.__('Newer :', 'dark_marble').' %link </p>')) : ?><?php endif ; ?>
						<?php if(previous_post_link('<p class="older">'.__('Older :', 'dark_marble').' %link </p>')) : ?><?php endif ; ?>
					</div>
		<?php endif; ?>
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.', 'dark_marble'); ?></p>

	<?php endif; ?>

				</div>
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
