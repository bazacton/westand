<?php
get_header();
	global  $cs_theme_option;
	if(isset($cs_theme_option['cs_layout'])){ $cs_layout = $cs_theme_option['cs_layout']; }else{ $cs_layout = '';} 
	if(isset($cs_theme_option['default_excerpt_length']) && $cs_theme_option['default_excerpt_length'] <> ''){ $default_excerpt_length = $cs_theme_option['default_excerpt_length']; }else{ $default_excerpt_length = '255';}
?>
		<?php
			
			if ( $cs_layout <> '' and $cs_layout  <> "none" and $cs_layout  == 'left') :  ?>
				<aside class="left-content col-md-3">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($cs_theme_option['cs_sidebar_left']) ) : endif; ?>
				</aside>
		<?php endif; ?>	
        <div class="<?php cs_default_pages_meta_content_class( $cs_layout ); ?>">
	       	<div class="postlist blog archive-page">
                <!-- Blog Post Start -->
                 <?php 
				 if(is_author()){
					 global $author;
					 $userdata = get_userdata($author);
				 }
				 if(category_description() || is_tag() || (is_author() && isset($userdata->description) && !empty($userdata->description))){
					echo '<div class="rich_editor_text">';
					if(is_author()){
						echo '<p>'.$userdata->description.'</p>';
					} elseif ( is_category() ) {
						 echo category_description();
					} elseif(is_tag()){
						$tag_description = tag_description();
                           if ( ! empty( $tag_description ) )
                                echo apply_filters( 'tag_archive_meta', $tag_description );
					}
					echo '</div>';
					
				}?>
				<?php
                    if (empty($_GET['page_id_all']))
                        $_GET['page_id_all'] = 1;
                    if (!isset($_GET["s"])) {
                        $_GET["s"] = '';
                    }
 					$taxonomy = 'category';
					$taxonomy_tag = 'post_tag';
					$args_cat = array();
					if(is_author()){
						$args_cat = array('author' => $wp_query->query_vars['author']);
						$post_type = array( 'post', 'events', 'cs_cause');
					} elseif(is_date()){
						if(is_month() || is_year() || is_day() || is_time()){
							$args_cat = array('monthnum' => $wp_query->query_vars['monthnum'],'year' => $wp_query->query_vars['year'],'day' => $wp_query->query_vars['day'],'hour' => $wp_query->query_vars['hour'], 'minute' => $wp_query->query_vars['minute'], 'second' => $wp_query->query_vars['second']);
						}
						$post_type = array( 'post');
					} elseif (isset($wp_query->query_vars['taxonomy']) && !empty($wp_query->query_vars['taxonomy'])){
						$taxonomy = $wp_query->query_vars['taxonomy'];
						$taxonomy_category='';
							$taxonomy_category=$wp_query->query_vars[$taxonomy];
						if( $wp_query->query_vars['taxonomy']=='cs_cause-category' || $wp_query->query_vars['taxonomy']=='cs_cause-tag') {
						  $args_cat = array( $taxonomy => "$taxonomy_category");
						  $post_type='cs_cause';
							
					  } else if( $wp_query->query_vars['taxonomy']=='event-category' || $wp_query->query_vars['taxonomy']=='event-tag') {
						  $args_cat = array( $taxonomy => "$taxonomy_category");
						  $post_type='events';
							  
						} else {
							$taxonomy = 'category';
							$args_cat = array();
							$post_type='post';
						}
					}elseif(isset($wp_query->query_vars['post_type']) && !empty($wp_query->query_vars['post_type'])){
						
						if($wp_query->query_vars['post_type']=='events'){
							$post_type='events';
						}elseif($wp_query->query_vars['post_type']=='cs_cause'){
							$post_type='cs_cause';
						}else{
							$post_type='post';
						}
						
					}elseif(is_category()){
						$taxonomy = 'category';
						$args_cat = array();
						$category_blog = $wp_query->query_vars['cat'];
						$post_type='post';
						$args_cat = array( 'cat' => "$category_blog");
					} elseif(is_tag()){
						$taxonomy = 'category';
						$args_cat = array();
						$tag_blog = $wp_query->query_vars['tag'];
						$post_type='post';
						$args_cat = array( 'tag' => "$tag_blog");
					} else {
						$taxonomy = 'category';
						$args_cat = array();
						$post_type='post';
					}
					$args = array( 
					'post_type'		 => $post_type, 
					'paged'			 => $_GET['page_id_all'],
					'post_status'	 => 'publish', 
					'order'			 => 'DESC',
				);
				$args = array_merge($args_cat,$args);
				$custom_query = new WP_Query($args);
                 ?>
                <?php if ( $custom_query->have_posts() ): ?>
	            <?php
				    while ( $custom_query->have_posts() ) : $custom_query->the_post();
					$image_url = cs_attachment_image_src(get_post_thumbnail_id($post->ID), 342, 193);
					$post_class = '';
					 if($image_url == ''){
					  $post_class = ' no-image';
					 }
 					$event_from_date = get_post_meta($post->ID, "cs_event_from_date", true);  
					
						
					?> 
                    
					<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
                    	<?php 
						if($image_url <> ""){
							echo '<figure>
									<a href="'.get_permalink().'" ><img src="'.$image_url.'" alt="image_url" ></a>
								  </figure>';
						}
						?>
                      <!-- Text Start -->
                      <div class="blog_text webkit">
                              <div class="text">
                                  <h2 class="heading-color cs-post-title"><a href="<?php the_permalink(); ?>" class="cs-colrhvr"><?php the_title(); ?></a></h2>
                              </div>
                              <?php cs_posted_on(); ?> 
                          <p><?php echo cs_get_the_excerpt($default_excerpt_length,true); ?></p>
                      </div>
                     <!-- Text End -->
                  </article>
						
                <?php endwhile; 
				// If no content, include the "No posts found" template.
				else :
					fnc_no_result_found();
				endif;  
				?>
                  
        		</div>
                  <?php
                         $qrystr = '';
                        // pagination start
                        	if ($custom_query->found_posts > get_option('posts_per_page')) {
                                      if ( isset($_GET['page_id']) ) $qrystr .= "&page_id=".$_GET['page_id'];
									 if ( isset($_GET['author']) ) $qrystr .= "&author=".$_GET['author'];
									 if ( isset($_GET['tag']) ) $qrystr .= "&tag=".$_GET['tag'];
									 if ( isset($_GET['cat']) ) $qrystr .= "&cat=".$_GET['cat'];
									 if ( isset($_GET['event-category']) ) $qrystr .= "&event-category=".$_GET['event-category'];
									 if ( isset($_GET['cs_cause-category']) ) $qrystr .= "&cs_cause-category=".$_GET['cs_cause-category'];
									 if ( isset($_GET['event-tag']) ) $qrystr .= "&event-tag=".$_GET['event-tag'];
									 if ( isset($_GET['cs_cause-tag']) ) $qrystr .= "&cs_cause-tag=".$_GET['cs_cause-tag'];
									 if ( isset($_GET['m']) ) $qrystr .= "&m=".$_GET['m'];
 						        echo cs_pagination($custom_query->found_posts,get_option('posts_per_page'), $qrystr);
                             }
                        // pagination end
                    
				?>
        </div>  
		<?php
			if ( $cs_layout <> '' and $cs_layout  <> "none" and $cs_layout  == 'right') :  ?>
				<aside class="left-content col-md-3">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($cs_theme_option['cs_sidebar_left']) ) : endif; ?>
				</aside>
		<?php endif; ?>	
<?php get_footer(); ?> 