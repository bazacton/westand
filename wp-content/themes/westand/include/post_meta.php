<?php
		if(function_exists('cs_meta_boxes')) {
	     cs_meta_boxes('cs_meta_post_add');
		}
function cs_meta_post_add()
{  
if(function_exists('cs_meta_box')) {
	cs_meta_box( 'cs_meta_post', 'Post Options', 'cs_meta_post', 'post', 'normal', 'high' );  
}
}
function cs_meta_post( $post ) {
	$post_xml = get_post_meta($post->ID, "post", true);
	global $cs_xmlObject;
	if ( $post_xml <> "" ) {
		$cs_xmlObject = new SimpleXMLElement($post_xml);
			$sub_title = $cs_xmlObject->sub_title;
			$post_thumb_view = $cs_xmlObject->post_thumb_view;
			$post_featured_image_as_thumbnail = $cs_xmlObject->post_featured_image_as_thumbnail;
			$post_thumb_audio = $cs_xmlObject->post_thumb_audio;
			$post_thumb_video = $cs_xmlObject->post_thumb_video;
			$post_thumb_slider = $cs_xmlObject->post_thumb_slider;
			$post_thumb_slider_type = $cs_xmlObject->post_thumb_slider_type;						
			$inside_post_thumb_view = $cs_xmlObject->inside_post_thumb_view;
			$inside_post_featured_image_as_thumbnail = $cs_xmlObject->inside_post_featured_image_as_thumbnail;
			$inside_post_thumb_audio = $cs_xmlObject->inside_post_thumb_audio;
			$inside_post_thumb_video = $cs_xmlObject->inside_post_thumb_video;
			$inside_post_thumb_slider = $cs_xmlObject->inside_post_thumb_slider;
			$inside_post_thumb_slider_type = $cs_xmlObject->inside_post_thumb_slider_type;
 			$post_social_sharing = $cs_xmlObject->post_social_sharing;
			$post_author_info_show = $cs_xmlObject->post_author_info_show;
			
			$post_tags_show = $cs_xmlObject->post_tags_show;
			$post_pagination_show = $cs_xmlObject->post_pagination_show;
	}
	else {
		$sub_title = '';
		$post_thumb_view = '';
		$post_featured_image_as_thumbnail = '';
		$post_thumb_audio = '';
		$post_thumb_video = '';
		$post_thumb_slider = '';
		$post_thumb_slider_type = '';
		$inside_post_thumb_view = '';
		$inside_post_featured_image_as_thumbnail = '';
		$inside_post_thumb_audio = '';
		$inside_post_thumb_video = '';
		$inside_post_thumb_slider = '';
		$inside_post_thumb_slider_type = '';
 		$post_social_sharing = 'on';
		$post_author_info_show = 'on';
		$post_tags_show = $post_pagination_show = 'on';
		
	}
?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/scripts/admin/select.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/scripts/admin/prettyCheckable.js"></script>
	<div class="page-wrap">
        <div class="option-sec row">
        	<?php subheader_meta_layout();?>
            <div class="clear"></div>
            <div class="opt-conts">
  				<ul class="form-elements noborder">
                    <li class="to-label"><label><?php _e('Thumbnail View','westand');?></label></li>
                    <li class="to-field">
                        <select name="post_thumb_view" class="dropdown" onchange="javascript:new_toggle(this.value)">
                            <option <?php if($post_thumb_view=="Single Image")echo "selected";?> ><?php _e('Single Image','westand');?></option>
                            <option <?php if($post_thumb_view=="Audio")echo "selected";?> ><?php _e('Audio','westand');?></option>
                            <option <?php if($post_thumb_view=="Video")echo "selected";?> value="Video"><?php _e('Video/Soundcloud','westand');?></option>
                            <option <?php if($post_thumb_view=="Slider")echo "selected";?> ><?php _e('Slider','westand');?></option>
                        </select>
                        <p id="post_thumb_image" style="display:<?php if($post_thumb_view=="Single Image" or $post_thumb_view == "")echo 'inline"';else echo 'none';?>"><?php _e('Use Featured Image as Thumbnail','westand');?></p>
                    </li>
                        
                        <ul class="form-elements" id="post_thumb_audio" style="display:<?php if($post_thumb_view=="Audio")echo 'inline"';else echo 'none';?>" >
                            <li class="to-label"><label><?php _e('Audio URL','westand');?></label></li>
                            <li class="to-field">
                                <input type="text" id="post_thumb_audio2" name="post_thumb_audio" value="<?php echo htmlspecialchars($post_thumb_audio)?>" class="txtfield" />
                                <input type="button" id="post_thumb_audio2" name="post_thumb_audio2" class="uploadfile left" value="Browse"/>
                                <p><?php _e('Enter Specific Audio URL (Youtube, Vimeo and all otheres wordpress supported)','westand');?></p>
                            </li>
                        </ul>
                        <ul class="form-elements" id="post_thumb_video" style="display:<?php if($post_thumb_view=="Video")echo 'inline"';else echo 'none';?>" >
                            <li class="to-label"><label><?php _e('Use featured image as video thumbnail','westand');?></label></li>
                            <li class="to-field">
                                <div class="on-off"><input type="checkbox" name="post_featured_image_as_thumbnail" value="on" class="styled" <?php if($post_featured_image_as_thumbnail=='on')echo "checked"?> /></div>
                                <p><?php _e('It will work only for self hosted video','westand');?></p>
                            </li>
                            <li class="full">&nbsp;</li>
                            <li class="to-label"><label><?php _e('Thumbnail Video URL','westand');?></label></li>
                            <li class="to-field">
                                <input id="post_thumb_video2" name="post_thumb_video" value="<?php echo cs_allow_special_char($post_thumb_video);?>" type="text" class="small" />
                                <input id="post_thumb_video2" name="post_thumb_video2" type="button" class="uploadfile left" value="Browse"/>
                                <p><?php _e('Enter Specific Video URL (Youtube, Vimeo and all otheres wordpress supported) OR you can select it from your media library','westand');?></p>
                            </li>
                        </ul>
                        <ul class="form-elements noborder" id="post_thumb_slider" style="display:<?php if($post_thumb_view=="Slider")echo 'inline"';else echo 'none';?>" >
                            <li class="to-label"><label><?php _e('Select Slider','westand');?></label></li>
                            <li class="to-field">
                                <select name="post_thumb_slider" class="dropdown">
                                    <option value="0"><?php _e('-- Select Slider --','westand');?></option>
                                    <?php
                                        $query = array( 'posts_per_page' => '-1', 'post_type' => 'cs_slider', 'orderby'=>'ID', 'post_status' => 'publish' );
                                        $wp_query = new WP_Query($query);
                                        while ($wp_query->have_posts()) : $wp_query->the_post();
                                    ?>
                                        <option <?php if(get_the_ID()==$post_thumb_slider)echo "selected";?> value="<?php the_ID()?>"><?php the_title()?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </li>
							<li class="full">&nbsp;</li>
                         </ul>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Inside Post Thumbnail View','westand');?></label></li>
                    <li class="to-field">
                        <select name="inside_post_thumb_view" class="dropdown" onchange="javascript:new_toggle_inside_post(this.value)">
                            <option <?php if($inside_post_thumb_view=="Single Image")echo "selected";?> ><?php _e('Single Image','westand');?></option>
                            <option <?php if($inside_post_thumb_view=="Audio")echo "selected";?> ><?php _e('Audio','westand');?></option>
                            <option <?php if($inside_post_thumb_view=="Video")echo "selected";?> value="Video"><?php _e('Video/Soundcloud','westand');?></option>
                            <option <?php if($inside_post_thumb_view=="Slider")echo "selected";?> ><?php _e('Slider','westand');?></option>
                        </select>
                        <p id="inside_post_thumb_image" style="display:<?php if($inside_post_thumb_view=="Single Image" or $inside_post_thumb_view=="")echo 'inline"';else echo 'none';?>"><?php _e('Use Featured Image as Thumbnail','westand');?></p>
                    </li>
                        
                        <ul class="form-elements" id="inside_post_thumb_audio" style="display:<?php if($inside_post_thumb_view=="Audio")echo 'inline"';else echo 'none';?>" >
                            <li class="to-label"><label><?php _e('Audio URL','westand');?></label></li>
                            <li class="to-field">
                                <input type="text" id="inside_post_thumb_audio2" name="inside_post_thumb_audio" value="<?php echo htmlspecialchars($inside_post_thumb_audio)?>" class="txtfield" />
                                <input type="button" id="inside_post_thumb_audio2" name="inside_post_thumb_audio2" class="uploadfile left" value="Browse"/>
                                <p><?php _e('Enter Specific Audio URL (Youtube, Vimeo and all otheres wordpress supported)','westand');?></p>
                            </li>
                        </ul>
                        <ul class="form-elements" id="inside_post_thumb_video" style="display:<?php if($inside_post_thumb_view=="Video")echo 'inline"';else echo 'none';?>" >
                            <li class="to-label"><label><?php _e('Use featured image as video thumbnail','westand');?></label></li>
                            <li class="to-field">
                                <div class="on-off"><input type="checkbox" name="inside_post_featured_image_as_thumbnail" value="on" class="styled" <?php if($inside_post_featured_image_as_thumbnail=='on')echo "checked"?> /></div>
                                <p><?php _e('It will work only for self hosted video','westand');?></p>
                            </li>
                            <li class="full">&nbsp;</li>
                            <li class="to-label"><label><?php _e('Thumbnail Video URL','westand');?></label></li>
                            <li class="to-field">
                                <input id="inside_post_thumb_video2" name="inside_post_thumb_video" value="<?php echo cs_allow_special_char($inside_post_thumb_video);?>" type="text" class="small" />
                                <input id="inside_post_thumb_video2" name="inside_post_thumb_video2" type="button" class="uploadfile left" value="Browse"/>
                                <p><?php _e('Enter Specific Video URL (Youtube, Vimeo and all otheres wordpress supported) OR you can select it from your media library','westand');?></p>
                            </li>
                        </ul>
                        <ul class="form-elements" id="inside_post_thumb_slider" style="display:<?php if($inside_post_thumb_view=="Slider")echo 'inline"';else echo 'none';?>" >
                            <li class="to-label"><label><?php _e('Select Slider','westand');?></label></li>
                            <li class="to-field">
                                <select name="inside_post_thumb_slider" class="dropdown">
                                    <option value="0"><?php _e('-- Select Slider --','westand');?></option>
                                    <?php
                                        $query = array( 'posts_per_page' => '-1', 'post_type' => 'cs_slider', 'orderby'=>'ID', 'post_status' => 'publish' );
                                        $wp_query = new WP_Query($query);
                                        while ($wp_query->have_posts()) : $wp_query->the_post();
                                    ?>
                                        <option <?php if(get_the_ID()==$inside_post_thumb_slider)echo "selected";?> value="<?php the_ID()?>"><?php the_title()?></option>
                                    <?php
                                        endwhile;
                                    ?>
                                </select>
                            </li>
							<li class="full">&nbsp;</li>
                        </ul>
                </ul>
                <div class="clear"></div>
                <div class="opt-head">
                    <h4><?php _e('Other Option','westand');?></h4>
                    <div class="clear"></div>
                </div>
                <ul class="form-elements noborder">
                    <li class="to-label"><label><?php _e('Social Sharing','westand');?></label></li>
                    <li class="to-field">
                        <div class="on-off"><input type="checkbox" name="post_social_sharing" value="on" class="myClass" <?php if($post_social_sharing=='on')echo "checked"?> /></div>
                    </li>
                </ul>
                <ul class="form-elements noborder">
                    <li class="to-label"><label><?php _e('Post Author','westand');?></label></li>
                    <li class="to-field">
                        <div class="on-off"><input type="checkbox" name="post_author_info_show" value="on" class="myClass" <?php if($post_author_info_show=='on')echo "checked"?> /></div>
                    </li>
                </ul>
                <ul class="form-elements noborder">
                    <li class="to-label"><label><?php _e('Tags','westand');?></label></li>
                    <li class="to-field">
                        <div class="on-off"><input type="checkbox" name="post_tags_show" value="on" class="myClass" <?php if(isset($post_tags_show) && $post_tags_show=='on')echo "checked"?> /></div>
                       
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Next Previous Button','westand');?></label></li>
                    <li class="to-field">
                        <div class="on-off"><input type="checkbox" name="post_pagination_show" value="on" class="myClass" <?php if(isset($post_pagination_show) && $post_pagination_show=='on')echo "checked"?> /></div>
                        
                    </li>
                </ul>
                
			</div>
		</div>
		<div class="clear"></div>
		<?php meta_layout()?>
        <input type="hidden" name="post_meta_form" value="1" />
    </div>
<?php
}
		if ( isset($_POST['post_meta_form']) and $_POST['post_meta_form'] == 1 ) {
			add_action( 'save_post', 'cs_meta_post_save' );
			function cs_meta_post_save( $post_id ) {
				if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
					if ( empty($_POST['post_social_sharing']) ) $_POST['post_social_sharing'] = "";
					if (empty($_POST["post_thumb_view"])){ $_POST["post_thumb_view"] = "";}
					if (empty($_POST["post_featured_image_as_thumbnail"])){ $_POST["post_featured_image_as_thumbnail"] = "";}
					if (empty($_POST["post_thumb_audio"])){ $_POST["post_thumb_audio"] = "";}
					if (empty($_POST["post_thumb_video"])){ $_POST["post_thumb_video"] = "";}
					if (empty($_POST["post_thumb_slider"])){ $_POST["post_thumb_slider"] = "";}
					if (empty($_POST["post_thumb_slider_type"])){ $_POST["post_thumb_slider_type"] = "";}
					if (empty($_POST["inside_post_thumb_view"])){ $_POST["inside_post_thumb_view"] = "";}
					if (empty($_POST["inside_post_featured_image_as_thumbnail"])){ $_POST["inside_post_featured_image_as_thumbnail"] = "";}
					if (empty($_POST["inside_post_thumb_audio"])){ $_POST["inside_post_thumb_audio"] = "";}
					if (empty($_POST["inside_post_thumb_video"])){ $_POST["inside_post_thumb_video"] = "";}
					if (empty($_POST["inside_post_thumb_slider"])){ $_POST["inside_post_thumb_slider"] = "";}
					if (empty($_POST["inside_post_thumb_slider_type"])){ $_POST["inside_post_thumb_slider_type"] = "";}
 					if (empty($_POST["post_social_sharing"])){ $_POST["post_social_sharing"] = "";}
					if (empty($_POST["post_author_info_show"])){ $_POST["post_author_info_show"] = "";}
					if (empty($_POST["post_tags_show"])){ $_POST["post_tags_show"] = "";}
					if (empty($_POST["post_pagination_show"])){ $_POST["post_pagination_show"] = "";}

						$sxe = new SimpleXMLElement("<cs_meta_post></cs_meta_post>");
							$sxe->addChild('post_thumb_view', $_POST['post_thumb_view'] );
							$sxe->addChild('post_featured_image_as_thumbnail', $_POST['post_featured_image_as_thumbnail'] );
							$sxe->addChild('post_thumb_audio', $_POST['post_thumb_audio'] );
							$sxe->addChild('post_thumb_video', $_POST['post_thumb_video'] );
							$sxe->addChild('post_thumb_slider', $_POST['post_thumb_slider'] );
							$sxe->addChild('post_thumb_slider_type', $_POST['post_thumb_slider_type'] );
							$sxe->addChild('inside_post_thumb_view', $_POST['inside_post_thumb_view'] );
							$sxe->addChild('inside_post_featured_image_as_thumbnail', $_POST['inside_post_featured_image_as_thumbnail'] );
							$sxe->addChild('inside_post_thumb_audio', $_POST['inside_post_thumb_audio'] );
							$sxe->addChild('inside_post_thumb_video', $_POST['inside_post_thumb_video'] );
							$sxe->addChild('inside_post_thumb_slider', $_POST['inside_post_thumb_slider'] );
							$sxe->addChild('inside_post_thumb_slider_type', $_POST['inside_post_thumb_slider_type'] );
 							$sxe->addChild('post_social_sharing', $_POST['post_social_sharing'] );
							$sxe->addChild('post_author_info_show', $_POST['post_author_info_show'] );
							$sxe->addChild('post_tags_show', htmlspecialchars($_POST['post_tags_show']) );
							$sxe->addChild('post_pagination_show', htmlspecialchars($_POST['post_pagination_show']) );

 							$sxe = save_layout_xml($sxe);
				update_post_meta( $post_id, 'post', $sxe->asXML() );
			}
		}

?>