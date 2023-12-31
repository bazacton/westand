<?php
// event start
	//adding columns start
    add_filter('manage_events_posts_columns', 'event_columns_add' );
		function event_columns_add($columns) {
			$columns['category'] = 'Categories';
			$columns['author'] = 'Author';
			$columns['tag'] = 'Tags';
			return $columns;
	    }
    add_action('manage_events_posts_custom_column', 'event_columns');
		function event_columns($name) {
			global $post;
			switch ($name) {
				case 'category':
					$categories = get_the_terms( $post->ID, 'event-category' );
						if($categories <> ""){
							$couter_comma = 0;
							foreach ( $categories as $category ) {
								echo $category->name;
								$couter_comma++;
								if ( $couter_comma < count($categories) ) {
									echo ", ";
								}
							}
						}
					break;
				case 'author':
					echo get_the_author();
					break;
				case 'tag':
					$categories = get_the_terms( $post->ID, 'event-tag' );
						if($categories <> ""){
							$couter_comma = 0;
							foreach ( $categories as $category ) {
								echo $category->name;
								$couter_comma++;
								if ( $couter_comma < count($categories) ) {
									echo ", ";
								}
							}
						}
					break;
			}
		}
	//adding columns end
	
	function cs_event_register() {  
		$labels = array(
			'name' => 'Events',
			'all_items' => 'All Events',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'new_item' => 'New Event Item',
			'add_new' => 'Add New Event',
			'view_item' => 'View Event Item',
			'search_items' => 'Search Event',
			'not_found' => 'Nothing found',
			'not_found_in_trash' => 'Nothing found in Trash',
			'parent_item_colon' => ''
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_icon' => 'dashicons-admin-post',
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'has_archive' => true,
			'supports' => array('title','editor','thumbnail', 'excerpt', 'comments')
		); 
        register_post_type( 'events' , $args );  

			// adding Manage Location start
				$labels = array(
					'name' => 'Locations',
					'add_new_item' => 'Add New Location (Venue Title)',
					'edit_item' => 'Edit Location',
					'new_item' => 'New Location Item',
					'add_new' => 'Add New Location',
					'view_item' => 'View Location Item',
					'search_items' => 'Search Location',
					'not_found' => 'Nothing found',
					'not_found_in_trash' => 'Nothing found in Trash',
					'parent_item_colon' => ''
				);
				$args = array(
					'labels' => $labels,
					'public' => true,
					'publicly_queryable' => true,
					'show_ui' => true,
					'query_var' => true,
					'menu_icon' => 'dashicons-admin-post',
					'show_in_menu' => 'edit.php?post_type=events',
					'show_in_nav_menus'=>true,
					'rewrite' => true,
					'capability_type' => 'post',
					'hierarchical' => false,
					'menu_position' => null,
					'supports' => array('title')
				); 
				register_post_type( 'event-location' , $args );  
			// adding Manage Location end
    }
	add_action('init', 'cs_event_register');

	function cs_event_categories() 
	{
		  $labels = array(
			'name' => 'Event Categories',
			'search_items' => 'Search Event Categories',
			'edit_item' => 'Edit Event Category',
			'update_item' => 'Update Event Category',
			'add_new_item' => 'Add New Category',
			'menu_name' => 'Event Categories',
		  ); 	
		  register_taxonomy('event-category',array('events'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'event-category' ),
		  ));
	}
	add_action( 'init', 'cs_event_categories');

	function cs_event_tag() {
		  $labels = array(
			'name' => 'Event Tags',
			'singular_name' => 'event-tag',
			'search_items' => 'Search Tags',
			'popular_items' => 'Popular Tags',
			'all_items' => 'All Tags',
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => 'Edit Tag',
			'update_item' => 'Update Tag',
			'add_new_item' => 'Add New Tag',
			'new_item_name' => 'New Tag Name',
			'separate_items_with_commas' => 'Separate writers with commas',
			'add_or_remove_items' => 'Add or remove tags',
			'choose_from_most_used' => 'Choose from the most used tags',
			'menu_name' => 'Event Tags',
		  ); 
		  register_taxonomy('event-tag','events',array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var' => true,
			'rewrite' => array( 'slug' => 'event-tag' ),
		  ));
	}
	add_action( 'init', 'cs_event_tag');

	// event-location custom fields start
		add_action( 'add_meta_boxes', 'event_loc_meta' );  
		function event_loc_meta()
		{
			add_meta_box( 'event_loc_meta', 'Add Location With Map', 'event_loc_meta_data', 'event-location', 'normal', 'high' );
		}
		function event_loc_meta_data($post) {
                        global $cs_theme_option;
                        $google_api_key = isset( $cs_theme_option['google_api_key'] )? $cs_theme_option['google_api_key'] : '';
			$event_loc_meta = get_post_meta($post->ID, "cs_event_loc_meta", true);
			if ( $event_loc_meta <> "" ) {
				$cs_xmlObject = new SimpleXMLElement($event_loc_meta);
					$event_loc_lat = $cs_xmlObject->event_loc_lat;
					$event_loc_long = $cs_xmlObject->event_loc_long;
					$event_loc_zoom = $cs_xmlObject->event_loc_zoom;
					$loc_address = $cs_xmlObject->loc_address;
					$loc_city = $cs_xmlObject->loc_city;
					$loc_postcode = $cs_xmlObject->loc_postcode;
					$loc_region = $cs_xmlObject->loc_region;
					$loc_country = $cs_xmlObject->loc_country;
			}
			else {
				$event_loc_lat = '';
				$event_loc_long = '';
				$event_loc_zoom = '';
				$loc_address = '';
				$loc_city = '';
				$loc_postcode = '';
				$loc_region = '';
				$loc_country = '';
			}
			?>
				<fieldset class="gllpLatlonPicker">
                <div class="page-wrap page-opts left" style="overflow:hidden; position:relative;">
                	<script src="http://maps.googleapis.com/maps/api/js?key=<?php echo cs_allow_special_char($google_api_key); ?>&sensor=false"></script>
                    <script src="<?php echo get_template_directory_uri()?>/scripts/admin/jquery-gmaps-latlon-picker.js"></script>
            		<div class="option-sec" style="margin-bottom:0;">
                        <div class="opt-conts">
                            <ul class="form-elements noborder">
                                <li class="to-label"><label><?php _e('Address','westand');?></label></li>
                                <li class="to-field"><input name="loc_address" id="loc_address" type="text" value="<?php echo htmlspecialchars($loc_address)?>" class="gllpSearchButton" onblur="gll_search_map()" /></li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label"><label><?php _e('City / Town','westand');?></label></li>
                                <li class="to-field"><input name="loc_city" id="loc_city" type="text" value="<?php echo htmlspecialchars($loc_city)?>" class="gllpSearchButton" onblur="gll_search_map()" /></li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label"><label><?php _e('Post Code','westand');?></label></li>
                                <li class="to-field"><input name="loc_postcode" id="loc_postcode" type="text" value="<?php echo htmlspecialchars($loc_postcode)?>" class="gllpSearchButton" onblur="gll_search_map()" /></li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label"><label><?php _e('Region','westand');?></label></li>
                                <li class="to-field"><input name="loc_region" id="loc_region" type="text" value="<?php echo htmlspecialchars($loc_region)?>" class="gllpSearchButton" onblur="gll_search_map()" /></li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label"><label><?php _e('Country','westand');?></label></li>
                                <li class="to-field">
                                    <select name="loc_country" id="loc_country" class="gllpSearchButton" onblur="gll_search_map()" >
										<?php foreach( cs_get_countries() as $key => $val ):?>
                                        	<option <?php if($loc_country==$val)echo "selected"?> ><?php echo $val;?></option>
										<?php endforeach; ?>  
                                    </select>
                                </li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label"><label></label></li>
                                <li class="to-field"><input type="button" class="gllpSearchButton" value="Search This Location on Map" onclick="gll_search_map()"></li>
                            </ul>
                            <ul class="form-elements">
                                <input type="hidden" name="add_new_loc" class="gllpSearchField" style="margin-bottom:10px;" >
                                <div class="gllpMap"><?php _e('Google Maps','westand');?></div>
                                <input type="hidden" name="event_loc_lat" value="<?php echo $event_loc_lat?>" class="gllpLatitude" />
                                <input type="hidden" name="event_loc_long" value="<?php echo $event_loc_long?>" class="gllpLongitude" />
                                <input type="hidden" name="event_loc_zoom" value="<?php echo $event_loc_zoom?>" class="gllpZoom" />
                                <input type="button" class="gllpUpdateButton" value="update map" style="display:none">
							</ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
				</fieldset>
				<input type="hidden" name="event_loc_meta_form" value="1" />
			<?php
		}
	// event-location custom fields end
	

	// event custom fields start
	add_action( 'add_meta_boxes', 'cs_event_meta' );  
    function cs_event_meta()
    {
        add_meta_box( 'event_meta', 'Event Options', 'cs_event_meta_data', 'events', 'normal', 'high' );
    }
	function cs_event_meta_data($post) {
		$cs_event_meta = get_post_meta($post->ID, "cs_event_meta", true);
		global $cs_xmlObject;
		if ( $cs_event_meta <> "" ) {
			$cs_xmlObject = new SimpleXMLElement($cs_event_meta);
				$event_thumb_view = $cs_xmlObject->event_thumb_view;
				$event_social_sharing = $cs_xmlObject->event_social_sharing;
				$event_start_time = $cs_xmlObject->event_start_time;
				$event_end_time = $cs_xmlObject->event_end_time;
				$event_all_day = $cs_xmlObject->event_all_day;
				$event_address = $cs_xmlObject->event_address;
				$event_loc_lat = $cs_xmlObject->event_loc_lat;
				$event_loc_long = $cs_xmlObject->event_loc_long;
				$event_loc_zoom = $cs_xmlObject->event_loc_zoom;
				$event_buy_now = $cs_xmlObject->event_buy_now;
				$event_ticket_options = $cs_xmlObject->event_ticket_options;
				$event_map = $cs_xmlObject->event_map;
				$event_ticket_color = $cs_xmlObject->event_ticket_color;
				$post_author_info_show = $cs_xmlObject->post_author_info_show;
				$event_calendar = $cs_xmlObject->event_calendar;
				$event_pagination = $cs_xmlObject->event_pagination;
				$event_tags = $cs_xmlObject->event_tags;
				$event_like = $cs_xmlObject->event_like;
		
		}
		else {
 			$slider_id = '';
			$event_thumb_view = '';
			
			$event_related = '';
			$event_start_time = '';
			$event_end_time = '';
			$event_all_day = '';
			$event_address = '';
			$event_loc_lat = '';
			$event_loc_long = '';
			$event_loc_zoom = '';
			$event_map = '';
			$event_buy_now = '';
			$event_ticket_options = 'Buy Now $99';
			$event_ticket_color = '#ce1a37';
			$post_author_info_show = 'on';
			$event_social_sharing = 'on';
			$event_calendar = $event_pagination = $event_tags = $event_like = 'on';
		//	event_calendar, event_pagination, event_tags
 		}
		$cs_event_from_date = get_post_meta($post->ID, "cs_event_from_date", true);
		$cs_event_to_date = get_post_meta($post->ID, "cs_event_to_date", true);
	?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/scripts/admin/select.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/scripts/admin/prettyCheckable.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/scripts/admin/jquery.timepicker.js"></script>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/admin/jquery.ui.datepicker.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/admin/jquery.ui.datepicker.theme.css">
        <script>
		jQuery(document).ready(function($){
			$('.bg_color').wpColorPicker(); 
        });
            jQuery(function($) {
                $('#event_start_time').timepicker();
                $('#event_end_time').timepicker();
            });
            jQuery(function($) {
				//$('#event_start_timee').timepicker({ 'scrollDefaultNow': true });
				//$('#event_end_timee').timepicker({ 'scrollDefaultNow': true });
                $( "#from_date" ).datepicker({
                    defaultDate: "+1w",
					dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onSelect: function( selectedDate ) {
                        $( "#to_date" ).datepicker( "option", "minDate", selectedDate );
                    }
                });
                $( "#to_date" ).datepicker({
                    defaultDate: "+1w",
					dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onSelect: function( selectedDate ) {
                        $( "#from_date" ).datepicker( "option", "maxDate", selectedDate );
                    }
                });
            });
        </script>

    	<div class="page-wrap">
            <div class="option-sec" style="margin-bottom:0;">
                <div class="opt-conts">
                    <?php subheader_meta_layout();?>
                    <ul class="form-elements">
                        <li class="to-label"><label><?php _e('Thumbnail View','westand');?></label></li>
                        <li class="to-field">
                            <select name="event_thumb_view" class="dropdown" onchange="javascript:new_toggle(this.value)">
                                <option <?php if($event_thumb_view=="Single Image")echo "selected";?> ><?php _e('Single Image','westand');?></option>
                                <option <?php if($event_thumb_view=="Map")echo "selected";?> ><?php _e('Map','westand');?></option>
                            </select>
                           <p id="post_thumb_image" style="display:<?php if($event_thumb_view=="Single Image" or $event_thumb_view == "")echo 'inline"';else echo 'none';?>"></p>
                        </li>
                     </ul>
                    <div class="clear"></div>
                   <div class="opt-head">
                        <h4><?php _e('Event Date, Time and Location','westand');?></h4>
                        <div class="clear"></div>
                    </div>   
                    
                    <ul class="form-elements noborder">
                        <li class="to-label"><label><?php _e('Event Date','westand');?></label></li>
                        <li class="to-field short-field">
                            <input type="text" id="from_date" name="event_from_date" value="<?php if($cs_event_from_date=='') echo gmdate("Y-m-d"); else echo $cs_event_from_date?>" />
                            <p><?php _e('Start date','westand');?></p>
                        </li>
                        <li class="to-label short-label"><label><?php _e('To','westand');?></label></li>
                        <li class="to-field short-field">
                            <input type="text" id="to_date" name="event_to_date" value="<?php if($cs_event_to_date=='') echo gmdate("Y-m-d"); else echo $cs_event_to_date?>" />
                            <p><?php _e('End date','westand');?></p>
                        </li>
                    </ul>

                    <ul class="form-elements event-day noborder">
                        <li class="to-label"><label><?php _e('Start Time','westand');?></label></li>
                        <li class="to-field">
                            <div id="event_time" <?php if($event_all_day=='on')echo 'style="display:none"'?>>
                                <div class="cs-left-sec">
                                <input id="event_start_time" name="event_start_time" value="<?php echo $event_start_time?>" type="text" class="vsmall" />
                                <label class="first-label"><?php _e('Start time','westand');?></label></div>
                                <span class="short"><?php _e('To','westand');?></span>
                                <div class="cs-left-sec">
                                <input id="event_end_time" name="event_end_time" value="<?php echo $event_end_time?>" type="text" class="vsmall"  />
                                <label class="sec-label"><?php _e('End time','westand');?></label></div>
                            	<div class="checkbox-list" style="padding-top:15px;">
                                    <div class="checkbox-item">
                                        <input type="checkbox" name="event_all_day" value="on" <?php if($event_all_day=='on')echo "checked"?> onclick="cs_toggle('event_time')" class="styled" />
                                        <label><?php _e('All Day','westand');?></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    
                    <ul class="form-elements noborder">
                        <li class="to-label"><label><?php _e('Location / Address','westand');?></label></li>
                        <li class="to-field">
                        	<?php
                            //echo $event_address."<br />";
								query_posts( array('post_type' => 'event-location') );
									while ( have_posts()) : the_post();
										//echo get_the_ID();
									endwhile;
							?>
                        	<select name="event_address" class="dropdown">
                            	<option value="0"><?php _e('Select Map Location','westand');?></option>
                                <?php
									query_posts( array('posts_per_page' => "-1", 'post_status' => 'publish', 'post_type' => 'event-location') );
										while ( have_posts()) : the_post();
										?>
	                                        <option <?php if($event_address==get_the_ID())echo "selected"?> value="<?php the_ID()?>"><?php the_title()?></option>
                                        <?php
										endwhile;
                                ?>
                            </select>
                        </li>
                    </ul>
                    <ul class="form-elements noborder" id="event_map">
                        <li class="to-label"><label><?php _e('Show Map','westand');?></label></li>
                        <li class="to-field">
                        	<div class="on-off"><input type="checkbox"  name="event_map" class="myClass" <?php if(empty($event_map) || $event_map == "on"){ echo "checked"; }?> /></div>
                        </li>
                    </ul>
                    <?php if ( empty( $_GET['post']) ) {?>
                        <ul class="form-elements">
                            <li class="to-label"><label><?php _e('Repeat','westand');?></label></li>
                            <li class="to-field">
                                <select name="repeat" class="dropdown" onchange="toggle_with_value('num_repeat', this.value)">
									<option value="0"><?php _e('-- Never Repeat --','westand');?></option>
									<option value="+1 day"><?php _e('Every Day','westand');?></option>
									<option value="+1 week"><?php _e('Every Week','westand');?></option>
									<option value="+1 month"><?php _e('Every Month','westand');?></option>
                                </select>
                            </li>
                        </ul>
                        <ul class="form-elements" id="num_repeat" style="display:none">
                            <li class="to-label"><label><?php _e('Repeat how many time','westand');?></label></li>
                            <li class="to-field">
                                <select name="num_repeat" class="dropdown">
                                    <?php for ( $i = 1; $i <= 25; $i++ ) {?>
                                        <option><?php echo $i?></option>
                                    <?php }?>
                                </select>
                            </li>
                        </ul>
                    <?php }?>
                    <div class="clear"></div>
                    <div class="opt-head">
                        <h4><?php _e('Ticket Options','westand');?></h4>
                        <div class="clear"></div>
                    </div> 
                    <ul class="form-elements noborder">
                        <li class="to-label">
                            <label><?php _e('Button Title and Price','westand');?></label>
                        </li>
                        <li class="to-field">
                        	<input type="text" id="event_ticket_options" name="event_ticket_options" value="<?php echo $event_ticket_options;?>" />
                        </li>
                   </ul>
                    <ul class="form-elements noborder">
                        <li class="to-label"><label><?php _e('Buy Now URL','westand');?></label></li>
                        <li class="to-field">
                            <input type="text" id="event_buy_now" name="event_buy_now" value="<?php echo $event_buy_now;?>" />
                        </li>
                    </ul>
                    <ul class="form-elements">
                        <li class="to-label"><label><?php _e('Ticket Button Color','westand');?></label></li>
                        <li class="to-field">
                            <input type="text" name="event_ticket_color" value="<?php echo $event_ticket_color;?>" class="bg_color" />
                        </li>
                    </ul>
                    <div class="clear"></div>
                    <div class="opt-head">
                        <h4><?php _e('Other Options','westand');?></h4>
                        <div class="clear"></div>
                    </div>
                           <ul class="form-elements noborder">
                            <li class="to-label"><label><?php _e('Post Author','westand');?></label></li>
                            <li class="to-field">
                                <div class="on-off"><input type="checkbox" name="post_author_info_show" value="on" class="myClass" <?php if($post_author_info_show=='on')echo "checked"?> /></div>
                     
                            </li>
                        </ul> 
                        <ul class="form-elements noborder">
                            <li class="to-label"><label><?php _e('Social Sharing','westand');?></label></li>
                            <li class="to-field">
                                <div class="on-off"><input type="checkbox" name="event_social_sharing" value="on" class="myClass" <?php if($event_social_sharing=='on')echo "checked"?> /></div>
                            
                            </li>
                        </ul>
                        <ul class="form-elements noborder">
                            <li class="to-label"><label><?php _e('Tags','westand');?></label></li>
                            <li class="to-field">
                                <div class="on-off"><input type="checkbox" name="event_tags" value="on" class="myClass" <?php if($event_tags=='on')echo "checked"?> /></div>
                            
                            </li>
                        </ul>
                        <ul class="form-elements noborder">
                            <li class="to-label"><label><?php _e('Next Previous button','westand');?></label></li>
                            <li class="to-field">
                                <div class="on-off"><input type="checkbox" name="event_pagination" value="on" class="myClass" <?php if($event_pagination=='on')echo "checked"?> /></div>
         
                            </li>
                        </ul>
                        
                        <ul class="form-elements noborder">
                            <li class="to-label"><label><?php _e('Add to calendar button','westand');?></label></li>
                            <li class="to-field">
                                <div class="on-off"><input type="checkbox" name="event_calendar" value="on" class="myClass" <?php if($event_calendar=='on')echo "checked"?> /></div>
                            </li>
                        </ul>
                        <ul class="form-elements">
                            <li class="to-label"><label><?php _e('Like Button','westand');?></label></li>
                            <li class="to-field">
                                <div class="on-off"><input type="checkbox" name="event_like" value="on" class="myClass" <?php if($event_like=='on')echo "checked"?> /></div>
                            </li>
                        </ul>
                </div>
            </div>
            <div class="clear"></div>
            <?php meta_layout()?>
            <input type="hidden" name="event_meta_form" value="1" />
			<div class="clear"></div>
		</div>
    
    <?php
	}
	// event custom fields end
	// event-location custom fields save start
		if ( isset($_POST['event_loc_meta_form']) and $_POST['event_loc_meta_form'] == 1 ) {
			add_action( 'save_post', 'event_loc_meta_save' );
			function event_loc_meta_save( $post_id ) {
				if (empty($_POST["event_loc_lat"])){ $_POST["event_loc_lat"] = "";}
				if (empty($_POST["event_loc_long"])){ $_POST["event_loc_long"] = "";}
				if (empty($_POST["event_loc_zoom"])){ $_POST["event_loc_zoom"] = "";}
				if (empty($_POST["loc_address"])){ $_POST["loc_address"] = "";}
				if (empty($_POST["loc_city"])){ $_POST["loc_city"] = "";}
				if (empty($_POST["loc_postcode"])){ $_POST["loc_postcode"] = "";}
				if (empty($_POST["loc_region"])){ $_POST["loc_region"] = "";}
				if (empty($_POST["loc_country"])){ $_POST["loc_country"] = "";}
				
				$sxe = new SimpleXMLElement("<event_loc></event_loc>");
					$sxe->addChild('event_loc_lat',$_POST['event_loc_lat']);
					$sxe->addChild('event_loc_long',$_POST['event_loc_long']);
					$sxe->addChild('event_loc_zoom',$_POST['event_loc_zoom']);
					$sxe->addChild('loc_address',htmlspecialchars($_POST['loc_address']) );
					$sxe->addChild('loc_city',htmlspecialchars($_POST['loc_city']) );
					$sxe->addChild('loc_postcode',htmlspecialchars($_POST['loc_postcode']) );
					$sxe->addChild('loc_region',htmlspecialchars($_POST['loc_region']) );
					$sxe->addChild('loc_country',$_POST['loc_country']);
					update_post_meta( $post_id, 'cs_event_loc_meta', $sxe->asXML() );
			}
		}
	// event-location custom fields save end
	// event custom fields save start
		if ( isset($_POST['event_meta_form']) and $_POST['event_meta_form'] == 1 ) {
			add_action( 'save_post', 'cs_event_meta_save' );
			function cs_event_meta_save( $post_id ) {
				// repeating events start
				if ( isset($_POST['num_repeat'] ) ) {
					global $wpdb;
					$post_thumbnail_id = get_post_thumbnail_id( $post_id );
					$post = get_post($post_id);
					$from_date = $_POST["event_from_date"];
					$to_date = $_POST["event_to_date"];
						for ( $i = 1; $i < $_POST['num_repeat']; $i++ ) {
							$wpdb->insert( $wpdb->prefix.'posts',
									array(
										'post_date'			=> $post->post_date,
										'post_date_gmt'		=> $post->post_date_gmt,
										'post_content'		=> $post->post_content,
										'post_title'		=> $post->post_title,
										'post_excerpt'		=> $post->post_excerpt,
										'post_status'		=> $post->post_status,
										'comment_status'	=> $post->comment_status,
										'ping_status'		=> $post->ping_status,
										'post_name'			=> $post->post_name."-".$i,
										'post_modified'		=> $post->post_modified,
										'post_modified_gmt'	=> $post->post_modified_gmt,
										'post_type'			=> $post->post_type
									)
							);
							$inserted_id = (int) $wpdb->insert_id;
							// adding categories start
								$terms = wp_get_post_terms($post->ID, "event-category");
								foreach ( $terms as $val ) {
									$wpdb->insert( $wpdb->prefix.'term_relationships',
											array(
												'object_id'	=> $inserted_id,
												'term_taxonomy_id'	=> $val->term_id,
												'term_order'	=> 0
											)
									);
								}
							// adding categories end
							// adding tag start
								$terms = wp_get_post_terms($post->ID, "event-tag");
								foreach ( $terms as $val ) {
									$wpdb->insert( $wpdb->prefix.'term_relationships',
											array(
												'object_id'	=> $inserted_id,
												'term_taxonomy_id'	=> $val->term_id,
												'term_order'	=> 0
											)
									);
								}
							// adding tag end
							// adding feature image start
								if ( $post_thumbnail_id ) update_post_meta( $inserted_id, '_thumbnail_id', $post_thumbnail_id );
							// adding feature image end
							events_meta_save($inserted_id);
							if ( $_POST['repeat'] <> 0 ) {
								$from_date = strtotime(date("Y-m-d", strtotime($from_date)) . $_POST['repeat'] );
									$from_date = date('Y-m-d', $from_date);
								$to_date = strtotime(date("Y-m-d", strtotime($to_date)) . $_POST['repeat'] );
									$to_date = date('Y-m-d', $to_date);

								update_post_meta( $inserted_id, 'cs_event_from_date', $from_date );
								update_post_meta( $inserted_id, 'cs_event_to_date', $to_date );
								$cs_event_datetime=$_POST["event_from_date"].' '.$_POST["event_start_time"];
  								update_post_meta( $inserted_id, 'cs_event_from_date_time', $cs_event_datetime );

							}
						}
				}
				// repeating events end
				events_meta_save($post_id);
					update_post_meta( $post_id, 'cs_event_from_date', $_POST["event_from_date"] );
					update_post_meta( $post_id, 'cs_event_to_date', $_POST["event_to_date"] );
					$cs_event_datetime=$_POST["event_from_date"].' '.$_POST["event_start_time"];
 					update_post_meta( $post_id, 'cs_event_from_date_time', $cs_event_datetime );

			}
		}
	// event custom fields save end
	
// event end
?>