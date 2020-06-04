<?php do_action( 'onclinic-theme/comments/comment-before' ); ?>
<div class="comment-body__holder">
	<?php if ( ! empty( onclinic_comment_author_avatar() ) ) : ?>
		<div class="comment-author vcard">
			<?php echo onclinic_comment_author_avatar( array(
				'size' => 60
			) ); ?>
		</div>
	<?php endif; ?>
	<div class="comment-content-wrap">
		<footer class="comment-meta">
			<div class="comment-metadata">
				<?php echo onclinic_get_comment_author_link(); ?>
				<?php echo onclinic_get_comment_date(); ?>
			</div>
			<div class="reply">
				<?php echo onclinic_get_comment_reply_link( array(
					'before' 		=> '<svg class="icon-svg icon-svg__comments" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.958 8.786L0.918 4.772L5.958 0.776V4.376H14.454V5.186H5.958V8.786Z"/></svg>',
					'reply_text' 	=> esc_html__( 'Reply', 'onclinic' ),
				) ); ?>
			</div>
		</footer>
		<div class="comment-content">
			<?php echo onclinic_get_comment_text(); ?>
		</div>
	</div>
</div>


<?php do_action( 'onclinic-theme/comments/comment-after' ); ?>
