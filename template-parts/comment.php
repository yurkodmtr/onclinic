<?php do_action( 'ocularis-theme/comments/comment-before' ); ?>
<div class="comment-body__holder">
	<?php if ( ! empty( ocularis_comment_author_avatar() ) ) : ?>
		<div class="comment-author vcard">
			<?php echo ocularis_comment_author_avatar( array(
				'size' => 60
			) ); ?>
		</div>
	<?php endif; ?>
	<div class="comment-content-wrap">
		<footer class="comment-meta">
			<div class="comment-metadata">
				<?php echo ocularis_get_comment_author_link(); ?>
				<?php echo ocularis_get_comment_date(); ?>
			</div>
		</footer>
		<div class="comment-content">
			<?php echo ocularis_get_comment_text(); ?>
		</div>
        <div class="reply">
            <?php echo ocularis_get_comment_reply_link( array(
                'before' 		=> '',
                'reply_text' 	=> esc_html__( '< Reply', 'ocularis' ),
            ) ); ?>
        </div>
	</div>
</div>


<?php do_action( 'ocularis-theme/comments/comment-after' ); ?>
