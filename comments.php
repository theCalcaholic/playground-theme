<?php // Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'dark_marble'); ?></p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->


<?php if ( have_comments() ) : ?>
	<h3 class="comments"><?php comments_number(__('No Responses', 'dark_marble'), __('One Response', 'dark_marble'), __('% Responses', 'dark_marble'));?></h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments('avatar_size=48');?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'dark_marble'); ?></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>


<div id="cancel-comment-reply"> 
	<small><?php cancel_comment_reply_link() ?></small>
</div> 

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'dark_marble'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'dark_marble'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'dark_marble'); ?>"><?php _e('Log out &raquo;', 'dark_marble'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php /* if ($req) echo "aria-required='true'"; */?> />
<label for="author"><small><?php _e('Name', 'dark_marble'); ?> <?php if ($req) _e("(required)", "dark_marble"); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php /* if ($req) echo "aria-required='true'"; */?> />
<label for="email"><small><?php _e('Mail (will not be published)', 'dark_marble'); ?> <?php if ($req) _e("(required)", "dark_marble"); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website', 'dark_marble'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'dark_marble'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value=" " />
<?php comment_id_fields(); ?> 
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>



<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

						<?php if ('open' == $post->ping_status) :
							// Pings are Open ?>
<div id="trackbackbox">
<p><?php _e('Trackback URL for this entry', 'dark_marble'); ?></p>
<input name="trackback_url" value="<?php trackback_url(true); ?>" readonly="readonly" id="trackback_url" onfocus="this.select()" type="text" />

</div>
						<?php endif; ?>