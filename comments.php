<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to shaken_comments which is
 * located in the functions.php file.
 */
?>

<?php if ( have_comments() || comments_open() ) : ?>
    <div id="comments">
<?php if ( post_password_required() ) :
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php if ( have_comments() ) : 
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="navigation">
    	<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'shaken' ) ); ?> | 
    	<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'shaken' ) ); ?>
    </div> <!-- .navigation -->
    <?php endif; // check for comment navigation ?>

    <ol class="commentlist">
    	<?php
    		/* Loop through and list the comments. Tell wp_list_comments()
    		 * to use shaken_comments() to format the comments.
    		 * If you want to overload this in a child theme then you can
    		 * define shaken_comments() and that will be used instead.
    		 * See shaken_comments() in shaken/functions.php for more.
    		 */
    		wp_list_comments( array( 'callback' => 'shaken_comments' ) );
    	?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="navigation">
    	<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'shaken' ) ); ?> | 
    	<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'shaken' ) ); ?>
    </div> <!-- .navigation -->
    <?php endif; // check for comment navigation ?>

<?php endif; // end have_comments() ?>

<div class="clearfix"></div>
<?php comment_form( array( 'comment_notes_after' => '' ) ); ?>

</div><!-- #comments -->

<?php endif; // end have_comments() or comments_open() ?>