<?php
global $cs_theme_option;
if ( comments_open() ) {
	if ( post_password_required() ) return;
?>
		<?php if ( have_comments() ) : ?>
			<div id="comments">
				 <header class="cs-heading-title">
					<h2 class="cs-section-title"><?php echo comments_number(__('No Comments', 'westand'), __('1 Comment', 'westand'), __('% Comments', 'westand') );?></h2>
				</header>
                 <ul>
                    <?php wp_list_comments( array( 'callback' => 'cs_comment' ) );	?>
                </ul>
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
					<div class="navigation">
						<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'westand') ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'westand') ); ?></div>
					</div> <!-- .navigation -->
				<?php endif; // check for comment navigation ?>
                
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                    <div class="navigation">
                        <div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'westand') ); ?></div>
                        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'westand') ); ?></div>
                    </div><!-- .navigation -->
                <?php endif; ?>
			</div>
		<?php endif; // end have_comments() ?>
	
 			<?php 
			global $post_id;
			$you_may_use = __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'westand');
			$must_login = __( 'You must be <a href="%s">logged in</a> to post a comment.', 'westand');
			$logged_in_as = __('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'westand');
			$required_fields_mark = ' ' . __('Required fields are marked %s', 'westand');
			$required_text = sprintf($required_fields_mark , '<span class="required">*</span>' );
	
			$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', 
				array(
					'notes' => '<p class="comment-notes">
                            </p>',
					'author' => '<p class="comment-form-author">'.
					'<span class="icon-input" for="author">' . __( '', 'westand').
					''.( $req ? __( '', 'westand') : '' ) .'<input id="author" name="author" class="nameinput" type="text" value="Name"' .
					esc_attr( $commenter['comment_author'] ) . '" size="30" tabindex="1"  />' .
					'<i class="fa fa-user"></i></span></p><!-- #form-section-author .form-section -->',
					
					'email'  => '<p class="comment-form-email">' .
					'<span class="icon-input" for="email">'. __( '', 'westand').
					''.( $req ? __( '', 'westand') : '' ) .''.
					'<input id="email" name="email" class="emailinput" type="text"  value="Email"' . 
					esc_attr(  $commenter['comment_author_email'] ) . '" size="30" tabindex="2"/>' .
					'<i class="fa fa-phone"></i></span></p><!-- #form-section-email .form-section -->',
					
					'url'    => '<p class="comment-form-website">' .
					'<span class="icon-input" for="url">' . __( '', 'westand') . '' .
					'<input id="url" name="url" type="text" class="websiteinput"  value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" tabindex="3" />' .
					'<i class="fa fa-envelope-o"></i></span></p><!-- #<span class="hiddenSpellError" pre="">form-section-url</span> .form-section -->' ) ),
					
					'comment_field' => '',
					
					'must_log_in' => '<p class="must-log-in">' .  sprintf( $must_login,	wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
					'logged_in_as' => '<p class="logged-in-as">' . sprintf( $logged_in_as, admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ),
					'comment_notes_before' => '',
					'comment_notes_after' =>  '',
					'class_form' => 'comform',
					'id_form' => 'commentform',
					'id_submit' => 'submit-comment',
					'title_reply' => __( 'Leave a Comment', 'westand' ),
					'title_reply_to' => __( 'Leave a Reply to %s', 'westand' ),
					'cancel_reply_link' => __( 'Cancel reply', 'westand' ),
					'label_submit' => __( 'Submit', 'westand' ),); 
					comment_form($defaults, $post_id); 
				?>
				
 <?php }?>