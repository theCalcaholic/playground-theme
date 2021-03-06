<?php get_header(); ?>

			<div id="content">

	<?php if (have_posts()) : ?>

		<?php if(is_archive()): ?>
		 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="archivetitle"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'dark_marble'), single_cat_title('', false)); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="archivetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'dark_marble'), single_tag_title('', false) ); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="archivetitle"><?php printf(_c('Archive for %s|Daily archive page', 'dark_marble'), get_the_time(__('F jS, Y', 'dark_marble'))); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="archivetitle"><?php printf(_c('Archive for %s|Monthly archive page', 'dark_marble'), get_the_time(__('F, Y', 'dark_marble'))); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="archivetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'dark_marble'), get_the_time(__('Y', 'dark_marble'))); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="archivetitle"><?php _e('Author Archive', 'dark_marble'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="archivetitle"><?php _e('Blog Archives', 'dark_marble'); ?></h2>
 	  <?php } ?>
		<?php endif ; ?>


		<?php while (have_posts()) : the_post(); ?>

				<div <?php if (function_exists('post_class')){post_class();}else{echo 'class="post" ';} ?> id="post-<?php the_ID(); ?>">
					<div class="post-head">
						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'dark_marble'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
						<div class="post-title-meta"><?php printf( get_the_category_list(', ')); ?> | <span class="author"><?php printf(__('Posted by %s', 'dark_marble'), the_author('',false) ); ?></span>
							<?php the_time(__('F jS, Y', 'dark_marble')) ?>
						</div>
					</div>
					<div class="entry">
					<?php the_content(__('Read the rest of this entry &raquo;', 'dark_marble')); ?>
					<p class="postfooter"><?php the_tags(__('Tags:', 'dark_marble') . ' ', ', ', '<br />'); ?>
					<?php edit_post_link(__('Edit', 'dark_marble'), '', ' | '); ?> <?php comments_popup_link(__('No Comments &#187;', 'dark_marble'), __('1 Comment &#187;', 'dark_marble'), __('% Comments &#187;', 'dark_marble'), '', __('Comments Closed', 'dark_marble') ); ?></p>
					</div><!--/entry-->

				</div>
		<?php endwhile; ?>

				<div class="entry-footer">
					<div id="new-old-navigation">
						<?php if(next_posts_link('<p class="older">'.__('Older Entries', 'dark_marble').' </p>')) : ?><?php endif ; ?>
						<?php if(previous_posts_link('<p class="newer">'.__('Newer Entries', 'dark_marble').' </p>')) : ?><?php endif ; ?>
					</div>
				</div>

	<?php else : ?>
				<div class="post">
					<div class="post-head">
					<h2 class="post-title"><?php _e('Not Found', 'dark_marble'); ?></h2>
					</div>
					<div class="entry">
					<p><?php _e('Sorry, but you are looking for something that isn&#8217;t here.', 'dark_marble'); ?></p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
					<?php wp_list_categories(''); ?>
					</div>
				</div>
	<?php endif; ?>

			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
