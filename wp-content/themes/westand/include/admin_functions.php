<?php

// page bulider items start
// gallery html form for page builder start

function cs_pb_gallery($die = 0) {

    global $cs_node, $cs_count_node, $post;

    if (isset($_POST['action'])) {

        $name = $_POST['action'];

        $cs_counter = $_POST['counter'];

        $gallery_element_size = '50';

        $cs_gal_header_title_db = '';

        $cs_gal_layout_db = '';

        $cs_gal_album_db = '';

        $cs_gal_pagination_db = '';

        $cs_gal_media_per_page_db = get_option("posts_per_page");
    } else {

        $name = $cs_node->getName();

        $cs_count_node++;

        $gallery_element_size = $cs_node->gallery_element_size;

        $cs_gal_header_title_db = $cs_node->header_title;

        $cs_gal_layout_db = $cs_node->layout;

        $cs_gal_album_db = $cs_node->album;

        $cs_gal_pagination_db = $cs_node->pagination;

        $cs_gal_media_per_page_db = $cs_node->media_per_page;

        $cs_counter = $post->ID . $cs_count_node;
    }
    ?> 

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($gallery_element_size); ?>" item="gallery" data="<?php echo element_size_data_array_index($gallery_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="gallery_element_size[]" class="item" value="<?php echo cs_allow_special_char($gallery_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a> &nbsp; 

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;  

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5><?php _e('Edit Gallery Options', 'westand'); ?></h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Gallery Header Title', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_gal_header_title[]" class="txtfield" value="<?php echo htmlspecialchars($cs_gal_header_title_db) ?>" />

                        <p><?php _e('Please enter gallery header title', 'westand'); ?></p>

                    </li>                    

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Choose Gallery Layout', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_gal_layout[]" class="dropdown">

                            <option value="gallery-four-col" <?php if ($cs_gal_layout_db == "gallery-four-col") echo "selected"; ?> ><?php _e('4 Column', 'westand'); ?></option>

                            <option value="gallery-three-col" <?php if ($cs_gal_layout_db == "gallery-three-col") echo "selected"; ?> ><?php _e('3 Column', 'westand'); ?></option>

                            <option value="gallery-two-col" <?php if ($cs_gal_layout_db == "gallery-two-col") echo "selected"; ?> ><?php _e('2 Column', 'westand'); ?></option>

                            <option value="gallery-masonry" <?php if ($cs_gal_layout_db == "gallery-masonry") echo "selected"; ?> ><?php _e('Masonry', 'westand'); ?></option>

                        </select>



                        <p><?php _e('Select gallery layout, single column, double column, thriple column or four column', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Choose Gallery/Album', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_gal_album[]" class="dropdown">

                            <option value="0"><?php _e('-- Select Gallery --', 'westand'); ?></option>

    <?php
    $query = array('posts_per_page' => '-1', 'post_type' => 'cs_gallery', 'orderby' => 'ID', 'post_status' => 'publish');

    $wp_query = new WP_Query($query);

    while ($wp_query->have_posts()) : $wp_query->the_post();
        ?>

                                <option <?php if ($post->post_name == $cs_gal_album_db) echo "selected"; ?> value="<?php echo cs_allow_special_char($post->post_name); ?>"><?php echo get_the_title() ?></option>

                                <?php
                            endwhile;
                            ?>

                        </select>

                        <p><?php _e('Select gallery album to show images', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Pagination', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_gal_pagination[]" class="dropdown" >

                            <option <?php if ($cs_gal_pagination_db == "Show Pagination") echo "selected"; ?> ><?php _e('Show Pagination', 'westand'); ?></option>

                            <option <?php if ($cs_gal_pagination_db == "Single Page") echo "selected"; ?> ><?php _e('Single Page', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements" >

                    <li class="to-label"><label><?php _e('No. of Media Per Page', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_gal_media_per_page[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_gal_media_per_page_db); ?>" />

                        <p><?php _e('To display all the records, leave this field blank', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements noborder">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="cs_orderby[]" value="gallery" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_gallery', 'cs_pb_gallery');

// gallery html form for page builder end
// services html form for page builder start

function cs_pb_services($die = 0) {

    global $cs_node, $cs_count_node, $post;

    if (isset($_POST['action'])) {

        $name = $_POST['action'];

        $cs_counter = $_POST['counter'];

        $services_element_size = '50';

        $service_title = '';

        $service_text = '';

        $service_link_url = '';

        $service_bg_image = '';
    } else {

        $name = $cs_node->getName();

        $cs_count_node++;

        $services_element_size = $cs_node->services_element_size;

        $service_title = $cs_node->service_title;

        $service_type = $cs_node->service_type;

        $service_text = $cs_node->service_text;

        $service_link_url = $cs_node->service_link_url;

        $service_text = $cs_node->service_bg_image;

        $cs_counter = $post->ID . $cs_count_node;
    }
    ?> 

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column parentdelete column_<?php echo cs_allow_special_char($services_element_size); ?>" item="services" data="<?php echo element_size_data_array_index($services_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="services_element_size[]" class="item" value="<?php echo cs_allow_special_char($services_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a> &nbsp; 

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;  

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5>Edit Services Options</h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="wrapptabbox">

                <div class="clone_append">

    <?php
    $services_num = 0;

    if (isset($cs_node)) {

        $services_num = count($cs_node->service);

        foreach ($cs_node->service as $service) {
            ?>

                            <div class='clone_form'>

                                <a href='#' class='deleteit_node'>Delete it</a>

                                <label><?php _e('Service Title', 'westand'); ?></label> <input class="txtfield" type="text" name="service_title[]" value="<?php echo cs_allow_special_char($service->service_title); ?>" />

                                <label><?php _e('Service Type', 'westand'); ?></label> 
                                <select name="service_type[]" class="dropdown">
                                    <option value="type1" <?php if ($service->service_type == 'type1') {
                echo 'selected="selected"';
            } ?>><?php _e('Type 1', 'westand'); ?></option>
                                    <option value="type2" <?php if ($service->service_type == 'type2') {
                    echo 'selected="selected"';
                } ?>><?php _e('Type 2', 'westand'); ?></option>
                                </select>


                                <label>Service Fontawsome Icon:</label> <input class="txtfield" type="text" name="service_icon[]" value="<?php echo cs_allow_special_char($service->service_icon); ?>" />
                                <p><?php _e('You can get fontawsome icons from fontawsome website', 'westand'); ?></p>

                                <label><?php _e('Service Bg Image', 'westand'); ?></label> <input class="txtfield" type="text" name="service_bg_image[]" value="<?php echo cs_allow_special_char($service->service_bg_image); ?>" />

                                <label><?php _e('Service Link URL', 'westand'); ?></label> <input class="txtfield" type="text" name="service_link_url[]" value="<?php echo cs_allow_special_char($service->service_link_url); ?>" />

                                <label><?php _e('Service Text', 'westand'); ?></label> <textarea class="txtfield" name="service_text[]"><?php echo cs_allow_special_char($service->service_text); ?></textarea>



                            </div>



            <?php
        }
    }
    ?>

                </div>

                <div class="opt-conts">

                    <ul class="form-elements">

                        <li class="to-label"><label></label></li>

                        <li class="to-field"><a href="#" class="add_services"><?php _e('Add service', 'westand'); ?></a></li>

                    </ul>

                    <ul class="form-elements noborder">

                        <li class="to-label"></li>

                        <li class="to-field">

                            <input type="hidden" name="services_num[]" value="<?php echo cs_allow_special_char($services_num); ?>" class="fieldCounter"  />

                            <input type="hidden" name="cs_orderby[]" value="services" />

                            <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                        </li>

                    </ul>

                </div>

            </div>



        </div>

    </div>

    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_services', 'cs_pb_services');

// services html form for page builder end
// slider html form for page builder start

function cs_pb_slider($die = 0) {

    global $cs_node, $cs_count_node, $post;


    if (isset($_POST['action'])) {

        $name = $_POST['action'];

        $cs_counter = $_POST['counter'];

        $slider_element_size = '50';

        $cs_slider_header_title_db = '';

        $cs_slider_type_db = '';

        $cs_slider_db = '';

        $cs_slider_width_db = '';

        $cs_slider_height_db = '';

        $slider_view = '';

        $slider_id = '';
    } else {

        $name = $cs_node->getName();

        $cs_count_node++;

        $slider_element_size = $cs_node->slider_element_size;

        $cs_slider_header_title_db = $cs_node->slider_header_title;

        $cs_slider_type_db = $cs_node->slider_type;

        $cs_slider_db = $cs_node->slider;

        $slider_view = $cs_node->slider_view;

        $slider_id = $cs_node->slider_id;

        $cs_slider_width_db = $cs_node->width;

        $cs_slider_height_db = $cs_node->height;

        $cs_counter = $post->ID . $cs_count_node;
    }
    ?>

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($slider_element_size); ?>" item="slider" data="<?php echo element_size_data_array_index($slider_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="slider_element_size[]" class="item" value="<?php echo cs_allow_special_char($slider_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a>

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5><?php _e('Edit Slider Options', 'westand'); ?></h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Slider Header Title', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_slider_header_title[]" class="txtfield" value="<?php echo htmlspecialchars($cs_slider_header_title_db) ?>" />

                        <p><?php _e('Please enter slider header title', 'westand'); ?></p>

                    </li>                    

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Choose SliderType', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_slider_type[]" class="dropdown" onchange="cs_toggle_height(this.value, 'cs_slider_height<?php echo cs_allow_special_char($name . $cs_counter); ?>')">

                            <option value="Flex Slider" <?php if ($cs_slider_type_db == "Flex Slider") {
        echo "selected";
    } ?> ><?php _e('Flex Slider', 'westand'); ?></option>

                            <option value="Custom Slider"  <?php if ($cs_slider_type_db == "Custom Slider") {
        echo "selected";
    } ?> ><?php _e('Custom Slider', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements" id="choose_slider" style="display:<?php if ($cs_slider_type_db == "Custom Slider") echo "none";
    else echo "inline"; ?>">

                    <li class="to-label"><label><?php _e('Choose Slider', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_slider[]" class="dropdown">

    <?php
    $query = array('posts_per_page' => '-1', 'post_type' => 'cs_slider', 'orderby' => 'ID', 'post_status' => 'publish');

    $wp_query = new WP_Query($query);

    while ($wp_query->have_posts()) : $wp_query->the_post();
        ?>

                                <option <?php if ($post->post_name == $cs_slider_db) echo "selected"; ?> value="<?php echo cs_allow_special_char($post->post_name); ?>"><?php the_title() ?></option>

        <?php
    endwhile;
    ?>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements" >

                    <li class="to-label"><label><?php _e('Slider View', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="slider_view[]" class="dropdown" >

                            <option <?php if ($slider_view == "content") echo "selected"; ?> ><?php _e('content', 'westand'); ?></option>

                            <option <?php if ($slider_view == "header") echo "selected"; ?> ><?php _e('header', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements" id="layer_slider" style="display:<?php if ($cs_slider_type_db == "Custom Slider") echo "inline";
                        else echo "none"; ?>" >

                    <li class="to-label">

                        <label><?php _e('Use Short Code', 'westand'); ?></label>

                    </li>


                    <li class="to-field">

                        <input type="text" name="cs_slider_id[]" class="txtfield" value="<?php echo htmlspecialchars($slider_id); ?>" />

                    </li>

                    <li class="to-label"></li>

                    <li class="to-field">

                        <p><?php _e('Please enter the Revolution/Other Slider Short Code like [rev_slider WeStand]', 'westand'); ?></p>

                    </li>                                            

                </ul>

                <ul class="form-elements noborder">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="cs_orderby[]" value="slider" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_slider', 'cs_pb_slider');

// slider html form for page builder end

add_action('wp_ajax_add_gradiants_to_list', 'add_gradiants_to_list');

function add_gradiants_to_list() {

    global $counter_track, $address_name, $payer_email, $payment_gross, $txn_id, $payment_date;

    foreach ($_POST as $keys => $values) {

        $$keys = $values;
    }
    ?>

    <tr id="edit_track<?php echo cs_allow_special_char($counter_track); ?>">

        <td id="address_name<?php echo cs_allow_special_char($counter_track); ?>" style="width:20%;"><?php echo cs_allow_special_char($address_name); ?></td>

        <td id="payer_email<?php echo cs_allow_special_char($counter_track); ?>" style="width:20%;"><?php echo cs_allow_special_char($payer_email); ?></td>

        <td id="payment_gross<?php echo cs_allow_special_char($counter_track); ?>" style="width:20%;"><?php echo cs_allow_special_char($payment_gross); ?></td>

        <td id="txn_id<?php echo cs_allow_special_char($counter_track); ?>" style="width:20%;"><?php echo cs_allow_special_char($txn_id); ?></td>

        <td id="payment_date<?php echo cs_allow_special_char($counter_track); ?>" style="width:20%;"><?php echo cs_allow_special_char($payment_date); ?></td>

        <td class="centr" style="width:20%;">

            <a href="javascript:openpopedup('edit_track_form<?php echo cs_allow_special_char($counter_track); ?>')" class="actions edit">&nbsp;</a>

            <a onclick="javascript:return confirm('Are you sure! You want to delete this Transaction')" href="javascript:cs_div_remove('edit_track<?php echo cs_allow_special_char($counter_track); ?>')" class="actions delete">&nbsp;</a>

            <div class="poped-up" id="edit_track_form<?php echo cs_allow_special_char($counter_track); ?>" style="position:absolute;">

                <div class="opt-head">

                    <h5><?php _e('Edit Donation', 'westand'); ?></h5>

                    <a href="javascript:closepopedup('edit_track_form<?php echo cs_allow_special_char($counter_track); ?>')" class="closeit">&nbsp;</a>

                    <div class="clear"></div>

                </div>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Donar Name', 'westand'); ?></label></li>

                    <li class="to-field"><input type="text" name="address_name[]" value="<?php echo htmlspecialchars($address_name) ?>" id="address_name<?php echo cs_allow_special_char($counter_track); ?>" /><p><?php _e('Put Donar Name', 'westand'); ?></p></li>



                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Email', 'westand'); ?></label></li>

                    <li class="to-field"><input type="text" name="payer_email[]" value="<?php echo htmlspecialchars($payer_email) ?>" id="payer_email<?php echo cs_allow_special_char($counter_track); ?>" /><p>
    <?php _e('Put Donor Email', 'westand'); ?></p></li>



                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Amount', 'westand'); ?></label></li>

                    <li class="to-field"><input type="text" name="payment_gross[]" value="<?php echo htmlspecialchars($payment_gross) ?>" id="payment_gross<?php echo cs_allow_special_char($counter_track); ?>" /><p><?php _e('Put Donor Raised Amount', 'westand'); ?></p></li>



                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Transaction ID', 'westand'); ?></label></li>

                    <li class="to-field"><input type="text" name="txn_id[]" value="<?php echo htmlspecialchars($txn_id) ?>" id="txn_id<?php echo cs_allow_special_char($counter_track); ?>" /><p>
    <?php _e('Put Donor Trasaction id', 'westand'); ?></p></li>



                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Donation Date', 'westand'); ?></label></li>

                    <li class="to-field"><input type="text" name="payment_date[]" value="<?php echo htmlspecialchars($payment_date) ?>" id="payment_date<?php echo cs_allow_special_char($counter_track); ?>" /><p>Put Donation Date</p></li>



                </ul>

                <ul class="form-elements noborder">

                    <li class="to-label"><label></label></li>

                    <li class="to-field"><input type="button" value="Update Donation" onclick="update_title(<?php echo cs_allow_special_char($counter_track) ?>); closepopedup('edit_track_form<?php echo cs_allow_special_char($counter_track); ?>')" /></li>

                </ul>

            </div>

        </td>

    </tr>

                            <?php
                        }

                        if (isset($action))
                            die();

// blog html form for page builder start

                        function cs_pb_blog($die = 0) {

                            global $cs_node, $cs_count_node, $post;

                            if (isset($_POST['action'])) {

                                $name = $_POST['action'];

                                $cs_counter = $_POST['counter'];

                                $blog_element_size = '50';

                                $cs_blog_title_db = '';

                                $cs_blog_description_db = '';

                                $cs_blog_view_db = '';

                                $cs_blog_cat_db = '';

                                $cs_blog_excerpt_db = '255';

                                $cs_blog_num_post_db = get_option("posts_per_page");

                                $cs_blog_pagination_db = '';

                                $cs_post_description_db = '';

                                $var_pb_blog_view_all = '';

                                $cs_blog_orderby_db = 'DESC';
                            } else {

                                $name = $cs_node->getName();

                                $cs_count_node++;

                                $blog_element_size = $cs_node->blog_element_size;

                                $cs_blog_title_db = $cs_node->cs_blog_title;

                                $cs_blog_description_db = $cs_node->cs_blog_description;

                                $cs_blog_view_db = $cs_node->cs_blog_view;

                                $cs_blog_cat_db = $cs_node->cs_blog_cat;

                                $cs_blog_excerpt_db = $cs_node->cs_blog_excerpt;

                                $cs_blog_num_post_db = $cs_node->cs_blog_num_post;

                                $cs_blog_pagination_db = $cs_node->cs_blog_pagination;

                                $cs_blog_description_db = $cs_node->cs_blog_description;

                                $cs_blog_orderby_db = $cs_node->cs_blog_orderby;

                                $var_pb_blog_view_all = $cs_node->var_pb_blog_view_all;

                                $cs_counter = $post->ID . $cs_count_node;
                            }
                            ?> 

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($blog_element_size); ?>" item="blog" data="<?php echo element_size_data_array_index($blog_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="blog_element_size[]" class="item" value="<?php echo cs_allow_special_char($blog_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a>

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5><?php _e('Edit Blog Options', 'westand'); ?></h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Blog Header Title', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_blog_title[]" class="txtfield" value="<?php echo htmlspecialchars($cs_blog_title_db) ?>" />

                        <p><?php _e('Please enter Blog header title', 'westand'); ?></p>

                    </li>                    

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Select View', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_blog_view[]" class="dropdown"  onchange="javascript:blog_toggle(this.value,<?php echo cs_allow_special_char($cs_counter); ?>)">

                            <option <?php if ($cs_blog_view_db == "blog-large") echo "selected"; ?> value="blog-large"><?php _e('Large', 'westand'); ?></option>

                            <option <?php if ($cs_blog_view_db == "blog-medium") echo "selected"; ?> value="blog-medium"><?php _e('Medium', 'westand'); ?></option>

                            <option <?php if ($cs_blog_view_db == "blog-grid") echo "selected"; ?> value="blog-grid"><?php _e('Grid', 'westand'); ?></option>

                            <option <?php if ($cs_blog_view_db == "blog-carousel-view") echo "selected"; ?> value="blog-carousel-view"><?php _e('Carousal', 'westand'); ?></option>

                        </select>


                    </li>                                        

                </ul>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Choose Category', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_blog_cat[]" class="dropdown">

                            <option value="0"><?php _e('-- Select Category --', 'westand'); ?></option>

    <?php show_all_cats('', '', $cs_blog_cat_db, "category"); ?>

                        </select>

                        <p><?php _e('Please select category to show posts. If you dont select category it will display all posts', 'westand'); ?></p>

                    </li>                                        

                </ul>
                <div id="Blog-listing<?php echo cs_allow_special_char($cs_counter); ?>" <?php if ($cs_blog_view_db == "blog-carousel-view") echo 'style="display:none"' ?>>
                    <ul class="form-elements">
                        <li class="to-label"><label><?php _e('Post Order', 'westand'); ?></label></li>
                        <li class="to-field">
                            <select name="cs_blog_orderby[]" class="dropdown" >
                                <option <?php if ($cs_blog_orderby_db == "ASC") echo "selected"; ?> value="ASC"><?php _e('ASC', 'westand'); ?></option>
                                <option <?php if ($cs_blog_orderby_db == "DESC") echo "selected"; ?> value="DESC"><?php _e('DESC', 'westand'); ?></option>
                            </select>
                        </li>
                    </ul>

                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Post Description', 'westand'); ?></label></li>

                        <li class="to-field">

                            <select name="cs_blog_description[]" class="dropdown" >

                                <option <?php if ($cs_blog_description_db == "yes") echo "selected"; ?> value="yes"><?php _e('Yes', 'westand'); ?></option>

                                <option <?php if ($cs_blog_description_db == "no") echo "selected"; ?> value="no"><?php _e('No', 'westand'); ?></option>

                            </select>

                        </li>

                    </ul>



                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Length of Excerpt', 'westand'); ?></label></li>

                        <li class="to-field">

                            <input type="text" name="cs_blog_excerpt[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_blog_excerpt_db); ?>" />

                            <p><?php _e('Enter number of character for short description text', 'westand'); ?></p>

                        </li>                         

                    </ul>

                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Pagination', 'westand'); ?></label></li>

                        <li class="to-field">

                            <select name="cs_blog_pagination[]" class="dropdown" >

                                <option <?php if ($cs_blog_pagination_db == "Show Pagination") echo "selected"; ?> ><?php _e('Show Pagination', 'westand'); ?></option>

                                <option <?php if ($cs_blog_pagination_db == "Single Page") echo "selected"; ?> ><?php _e('Single Page', 'westand'); ?></option>

                                <!--<option <?php //if($cs_blog_pagination_db=="Load More")echo "selected"; ?> >Load More</option>-->

                            </select>

                        </li>

                    </ul>
                </div>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('No. of Post Per Page', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_blog_num_post[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_blog_num_post_db); ?>" />

                        <p><?php _e('To display all the records, leave this field blank', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements noborder">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="cs_orderby[]" value="blog" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_blog', 'cs_pb_blog');

// blog html form for page builder end
// Team page builder function
function cs_pb_team($die = 0) {
    global $cs_node, $count_node, $post;
    if (isset($_POST['action'])) {
        $name = $_POST['action'];
        $counter = $_POST['counter'];
        $var_pb_team_element_size = '50';
        $var_pb_team_title = '';
        $var_pb_team_cat = '';
        $var_pb_team_view = '';
        $var_pb_team_filterable = '';
        $var_pb_team_pagination = '';
        $cs_team_excerpt = '255';
        $cs_team_orderby = 'DESC';
        $var_pb_team_per_page = get_option("posts_per_page");
    } else {
        $name = $cs_node->getName();
        $count_node++;
        $var_pb_team_element_size = $cs_node->var_pb_team_element_size;
        $var_pb_team_title = $cs_node->var_pb_team_title;
        $var_pb_team_cat = $cs_node->var_pb_team_cat;
        $var_pb_team_view = $cs_node->var_pb_team_view;
        $var_pb_team_filterable = $cs_node->var_pb_team_filterable;
        $var_pb_team_pagination = $cs_node->var_pb_team_pagination;
        $var_pb_team_per_page = $cs_node->var_pb_team_per_page;
        $cs_team_excerpt = $cs_node->cs_team_excerpt;
        $cs_team_orderby = $cs_node->cs_team_orderby;
        $counter = $post->ID . $count_node;
    }
    ?> 
    <div id="<?php echo cs_allow_special_char($name . $counter); ?>_del" class="column parentdelete column_<?php echo cs_allow_special_char($var_pb_team_element_size); ?>" item="blog" data="<?php echo element_size_data_array_index($var_pb_team_element_size) ?>" >
        <div class="column-in">
            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>
            <input type="hidden" name="var_pb_team_element_size[]" class="item" value="<?php echo cs_allow_special_char($var_pb_team_element_size); ?>" >
            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="options">Options</a>
            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp; 
            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 
            <a class="increment" onclick="javascript:increment(this)">Inc</a>
        </div>
        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $counter); ?>" style="border:none; background:#f8f8f8;" >
            <div class="opt-head">
                <h5><?php _e('Edit Album Options', 'westand'); ?></h5>
                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="closeit">&nbsp;</a>
            </div>
            <div class="opt-conts">
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Team Title', 'westand'); ?></label></li>
                    <li class="to-field">
                        <input type="text" name="var_pb_team_title[]" class="txtfield" value="<?php echo htmlspecialchars($var_pb_team_title) ?>" />
                        <p><?php _e('Team Page Title', 'westand'); ?></p>
                    </li>                                            
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Choose Category', 'westand'); ?></label></li>
                    <li class="to-field">
                        <select name="var_pb_team_cat[]" class="dropdown">
                            <option value="0"><?php _e('-- All Categories --', 'westand'); ?></option>
    <?php show_all_cats('', '', $var_pb_team_cat, "team-category"); ?>
                        </select>
                        <p><?php _e('Choose category to show Team list', 'westand'); ?></p>
                    </li>
                </ul>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Select View', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="var_pb_team_view[]" class="dropdown">

                            <option <?php if ($var_pb_team_view == "listing") echo "selected"; ?> value="listing"><?php _e('Listing View', 'westand'); ?></option>
                            <option <?php if ($var_pb_team_view == "grid") echo "selected"; ?> value="grid"><?php _e('Large Grid View', 'westand'); ?></option>
                            <option <?php if ($var_pb_team_view == "small") echo "selected"; ?> value="small"><?php _e('Small Grid View', 'westand'); ?></option>

                        </select>



                    </li>                                        

                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Post Order', 'westand'); ?></label></li>
                    <li class="to-field">
                        <select name="cs_team_orderby[]" class="dropdown" >
                            <option <?php if ($cs_team_orderby == "ASC") echo "selected"; ?> value="ASC"><?php _e('ASC', 'westand'); ?></option>
                            <option <?php if ($cs_team_orderby == "DESC") echo "selected"; ?> value="DESC"><?php _e('DESC', 'westand'); ?></option>
                        </select>
                    </li>
                </ul>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Length of Excerpt', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_team_excerpt[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_team_excerpt); ?>" />

                        <p><?php _e('Enter number of character for short description text', 'westand'); ?></p>

                    </li>                         

                </ul>

                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Pagination', 'westand'); ?></label></li>
                    <li class="to-field">
                        <select name="var_pb_team_pagination[]" class="dropdown" >
                            <option <?php if ($var_pb_team_pagination == "Show Pagination") echo "selected"; ?> ><?php _e('Show Pagination', 'westand'); ?></option>
                            <option <?php if ($var_pb_team_pagination == "Single Page") echo "selected"; ?> ><?php _e('Single Page', 'westand'); ?></option>
                        </select>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('No. of Team Per Page', 'westand'); ?></label></li>
                    <li class="to-field">
                        <input type="text" name="var_pb_team_per_page[]" class="txtfield" value="<?php echo cs_allow_special_char($var_pb_team_per_page); ?>" />
                        <p><?php _e('To display all the records, leave this field blank', 'westand'); ?></p>
                    </li>
                </ul>
                <ul class="form-elements noborder">
                    <li class="to-label"><label></label></li>
                    <li class="to-field">
                        <input type="hidden" name="cs_orderby[]" value="staff" />
                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_team', 'cs_pb_team');

// event html form for page builder start
// Events Meta data save

function events_meta_save($post_id) {

    global $wpdb;

    //event_calendar, event_pagination, event_tags

    if (empty($_POST["sub_title"])) {
        $_POST["sub_title"] = "";
    }

    if (empty($_POST["event_thumb_view"])) {
        $_POST["event_thumb_view"] = "";
    }

    if (empty($_POST["event_social_sharing"])) {
        $_POST["event_social_sharing"] = "";
    }

    if (empty($_POST["event_buy_now"])) {
        $_POST["event_buy_now"] = "";
    }

    if (empty($_POST["event_start_time"])) {
        $_POST["event_start_time"] = "";
    }

    if (empty($_POST["event_end_time"])) {
        $_POST["event_end_time"] = "";
    }

    if (empty($_POST["event_all_day"])) {
        $_POST["event_all_day"] = "";
    }

    if (empty($_POST["event_address"])) {
        $_POST["event_address"] = "";
    }

    if (empty($_POST["event_ticket_options"])) {
        $_POST["event_ticket_options"] = "";
    }

    if (empty($_POST["event_map"])) {
        $_POST["event_map"] = "";
    }

    if (empty($_POST["event_ticket_price"])) {
        $_POST["event_ticket_price"] = "";
    }

    if (empty($_POST["event_ticket_color"])) {
        $_POST["event_ticket_color"] = "";
    }

    if (empty($_POST["post_author_info_show"])) {
        $_POST["post_author_info_show"] = "";
    }

    if (empty($_POST["event_calendar"])) {
        $_POST["event_calendar"] = "";
    }
    if (empty($_POST["event_pagination"])) {
        $_POST["event_pagination"] = "";
    }
    if (empty($_POST["event_tags"])) {
        $_POST["event_tags"] = "";
    }
    if (empty($_POST["event_like"])) {
        $_POST["event_like"] = "";
    }

    $sxe = new SimpleXMLElement("<event></event>");

    $sxe->addChild('event_thumb_view', $_POST['event_thumb_view']);

    $sxe->addChild('event_social_sharing', $_POST["event_social_sharing"]);

    $sxe->addChild('event_buy_now', $_POST["event_buy_now"]);

    $sxe->addChild('event_start_time', $_POST["event_start_time"]);

    $sxe->addChild('event_end_time', $_POST["event_end_time"]);
    $sxe->addChild('event_ticket_color', $_POST["event_ticket_color"]);


    $sxe->addChild('event_ticket_options', $_POST["event_ticket_options"]);
    $sxe->addChild('event_ticket_color', $_POST["event_ticket_color"]);

    $sxe->addChild('event_address', $_POST["event_address"]);

    $sxe->addChild('event_map', $_POST["event_map"]);
    $sxe->addChild('event_calendar', $_POST["event_calendar"]);
    $sxe->addChild('event_like', $_POST["event_like"]);
    $sxe->addChild('event_pagination', $_POST["event_pagination"]);
    $sxe->addChild('event_tags', $_POST["event_tags"]);


    $sxe->addChild('post_author_info_show', $_POST["post_author_info_show"]);



    $sxe->addChild('event_all_day', $_POST["event_all_day"]);







    $sxe = save_layout_xml($sxe);

    update_post_meta($post_id, 'cs_event_meta', $sxe->asXML());
}

// parallax html form for page builder start
function cs_pb_parallax($die = 0) {
    global $cs_node, $cs_count_node, $post;
    if (isset($_POST['action'])) {
        $name = $_POST['action'];
        $cs_counter = $_POST['counter'];
        $parallax_element_size = '100';
        $parallax_title = '';
        $parallax_height = '';
        $parallax_margin_top = '20';
        $parallax_margin_bottom = '20';
        $parallax_padding_top = '20';
        $parallax_padding_bottom = '20';


        $parallax_custom_text = '';
        $parallax_custom_img = '';
        $parallax_custom_bgcolor = '';
    } else {
        $name = $cs_node->getName();
        $cs_count_node++;
        $parallax_element_size = $cs_node->parallax_element_size;
        $parallax_title = $cs_node->parallax_title;
        $parallax_height = $cs_node->parallax_height;
        $parallax_margin_top = $cs_node->parallax_margin_top;
        $parallax_margin_bottom = $cs_node->parallax_margin_bottom;
        $parallax_padding_top = $cs_node->parallax_padding_top;
        $parallax_padding_bottom = $cs_node->parallax_padding_bottom;

        $parallax_custom_text = $cs_node->parallax_custom_text;
        $parallax_custom_img = $cs_node->parallax_custom_img;
        $parallax_back_top = $cs_node->parallax_back_top;
        $parallax_custom_bgcolor = $cs_node->parallax_custom_bgcolor;

        $cs_counter = $post->ID . $cs_count_node;
    }
    ?> 


    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($parallax_element_size); ?>" item="event" data="<?php echo element_size_data_array_index($parallax_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="parallax_element_size[]" class="item" value="<?php echo cs_allow_special_char($parallax_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a>

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>


        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >
            <div class="opt-head">
                <h5><?php _e('Edit Parallax Options', 'westand'); ?></h5>
                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>
            </div>
            <div class="opt-conts">
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Title', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="parallax_title[]" class="txtfield" value="<?php echo cs_allow_special_char($parallax_title); ?>" /></li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Height', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="parallax_height[]" class="txtfield" value="<?php echo cs_allow_special_char($parallax_height); ?>" /></li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Paddding Top', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="parallax_padding_top[]" class="txtfield" value="<?php echo cs_allow_special_char($parallax_padding_top); ?>" />
                        <p><?php _e('Set the top paddding (In PX)', 'westand'); ?></p>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Paddding Bottom', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="parallax_padding_bottom[]" class="txtfield" value="<?php echo cs_allow_special_char($parallax_padding_bottom); ?>" />
                        <p><?php _e('Set the bottom Paddding (In PX)', 'westand'); ?></p>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Button', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="parallax_margin_top[]" class="txtfield" value="<?php echo cs_allow_special_char($parallax_margin_top); ?>" />
                        <p><?php _e('Set the top margin (In PX)', 'westand'); ?></p>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Button', 'westand'); ?>Margin Bottom</label></li>
                    <li class="to-field"><input type="text" name="parallax_margin_bottom[]" class="txtfield" value="<?php echo cs_allow_special_char($parallax_margin_bottom); ?>" />
                        <p><?php _e('Set the bottom margin (In PX)', 'westand'); ?></p>
                    </li>
                </ul>


                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Text', 'westand'); ?></label></li>
                    <li class="to-field"><textarea name="parallax_custom_text[]"><?php echo cs_allow_special_char($parallax_custom_text); ?></textarea></li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Image Path', 'westand'); ?></label></li>
                    <li class="to-field">
                        <input type="text" name="parallax_custom_img[]" class="txtfield" value="<?php echo cs_allow_special_char($parallax_custom_img); ?>" />
                        <p>e.g. http://yourdomain.com/logo.png</p>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Background Color', 'westand'); ?></label></li>
                    <li><input type="text"  name="parallax_custom_bgcolor[]" class="parallax_custom_bgcolor" value="<?php echo cs_allow_special_char($parallax_custom_bgcolor); ?>" data-default-color=""  /></li>
                    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            $('.parallax_custom_bgcolor').wpColorPicker();
                        });
                    </script>
                </ul>

                <ul class="form-elements noborder">
                    <li class="to-label"></li>
                    <li class="to-field">
                        <input type="hidden" name="cs_orderby[]" value="parallax" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_parallax', 'cs_pb_parallax');

// parallax html form for page builder end




function cs_pb_event($die = 0) {

    global $cs_node, $cs_count_node, $post;

    if (isset($_POST['action'])) {

        $name = $_POST['action'];

        $cs_counter = $_POST['counter'];

        $event_element_size = '50';

        $cs_event_title_db = '';

        $cs_event_type_db = '';

        $cs_event_view_db = '';

        $cs_event_category_db = '';

        $cs_event_featured_category_db = '';

        $cs_event_time_db = '';

        $cs_event_organizer_db = '';

        $cs_event_filterables_db = '';

        $cs_event_pagination_db = '';

        $cs_event_view_all_link = '';

        $cs_event_excerpt = '150';

        $cs_event_thumbnail = '';

        $cs_event_featured_category = '';

        $cs_event_per_page_db = get_option("posts_per_page");
    } else {

        $name = $cs_node->getName();

        $cs_count_node++;

        $event_element_size = $cs_node->event_element_size;

        $cs_event_title_db = $cs_node->cs_event_title;

        $cs_event_type_db = $cs_node->cs_event_type;

        $cs_event_category_db = $cs_node->cs_event_category;

        $cs_event_view_db = $cs_node->cs_event_view;

        $cs_event_time_db = $cs_node->cs_event_time;

        $cs_event_filterables_db = $cs_node->cs_event_filterables;

        $cs_event_pagination_db = $cs_node->cs_event_pagination;

        $cs_event_per_page_db = $cs_node->cs_event_per_page;

        $cs_event_excerpt = $cs_node->cs_event_excerpt;

        $cs_event_view_all_link = $cs_node->cs_event_view_all_link;

        $cs_event_featured_category = $cs_node->cs_event_featured_category;

        $cs_event_thumbnail = $cs_node->cs_event_thumbnail;

        $cs_counter = $post->ID . $cs_count_node;
    }
    ?> 

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($event_element_size); ?>" item="event" data="<?php echo element_size_data_array_index($event_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="event_element_size[]" class="item" value="<?php echo cs_allow_special_char($event_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a>

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5><?php _e('Edit Event Options', 'westand'); ?></h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Event Title', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_event_title[]" class="txtfield" value="<?php echo htmlspecialchars($cs_event_title_db) ?>" />

                        <p><?php _e('Event Page Title', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Event Types', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_event_type[]" class="dropdown">

                            <option <?php if ($cs_event_type_db == "All Events") echo "selected"; ?> ><?php _e('All Events', 'westand'); ?></option>

                            <option <?php if ($cs_event_type_db == "Upcoming Events") echo "selected"; ?> ><?php _e('Upcoming Events', 'westand'); ?></option>

                            <option <?php if ($cs_event_type_db == "Past Events") echo "selected"; ?> ><?php _e('Past Events', 'westand'); ?></option>

                        </select>

                        <p><?php _e('Select event type', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Select Category', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_event_category[]" class="dropdown">

                            <option value="0"><?php _e('-- All Categories Posts --', 'westand'); ?></option>

    <?php show_all_cats('', '', $cs_event_category_db, "event-category"); ?>

                        </select>

                    </li>

                </ul>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Select View', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_event_view[]" class="dropdown" onchange="javascript:event_toggle(this.value, '<?php echo cs_allow_special_char($cs_counter); ?>')">

                            <option <?php if ($cs_event_view_db == "eventlisting") echo "selected"; ?> value="eventlisting"><?php _e('Listing View', 'westand'); ?></option>
                            <option <?php if ($cs_event_view_db == "event-gridview") echo "selected"; ?> value="event-gridview"><?php _e('Grid View', 'westand'); ?></option>
                            <option <?php if ($cs_event_view_db == "event-calendarview") echo "selected"; ?> value="event-calendarview"><?php _e('Calendar View', 'westand'); ?></option>
                            <option <?php if ($cs_event_view_db == "event-timeline") echo "selected"; ?> value="event-timeline"><?php _e('Timeline Listing', 'westand'); ?></option>

                        </select>



                    </li>                                        

                </ul>
                <div id="featured_timeline_event<?php echo cs_allow_special_char($cs_counter); ?>" <?php if ($cs_event_view_db <> "event-timeline") echo 'style="display:none"' ?>>
                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Featured Event Category', 'westand'); ?></label></li>

                        <li class="to-field">

                            <select name="cs_event_featured_category[]" class="dropdown">

                                <option value="0"><?php _e('-- Select Category --', 'westand'); ?></option>

    <?php show_all_cats('', '', $cs_event_featured_category, "event-category"); ?>

                            </select>

                        </li>

                    </ul>
                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Show Thumbnail', 'westand'); ?></label></li>

                        <li class="to-field">

                            <select name="cs_event_thumbnail[]" class="dropdown">

                                <option value="Yes" <?php if ($cs_event_thumbnail == "Yes") echo "selected"; ?> ><?php _e('Yes', 'westand'); ?></option>

                                <option value="No" <?php if ($cs_event_thumbnail == "No") echo "selected"; ?> ><?php _e('No', 'westand'); ?></option>

                            </select>

                        </li>

                    </ul>

                </div>
                <div id="event-lising<?php echo cs_allow_special_char($cs_counter); ?>"  <?php if ($cs_event_view_db == "event-calendarview") echo 'style="display:none"' ?>>
                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Show Time', 'westand'); ?></label></li>

                        <li class="to-field">

                            <select name="cs_event_time[]" class="dropdown">

                                <option value="Yes" <?php if ($cs_event_time_db == "Yes") echo "selected"; ?> ><?php _e('Yes', 'westand'); ?></option>

                                <option value="No" <?php if ($cs_event_time_db == "No") echo "selected"; ?> ><?php _e('No', 'westand'); ?></option>

                            </select>

                        </li>

                    </ul>
                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('View All Events Link', 'westand'); ?></label></li>

                        <li class="to-field">

                            <input type="text" name="cs_event_view_all_link[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_event_view_all_link); ?>" />


                        </li>                         

                    </ul>


                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Length of Excerpt', 'westand'); ?></label></li>

                        <li class="to-field">

                            <input type="text" name="cs_event_excerpt[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_event_excerpt);
    ; ?>" />

                            <p><?php _e('Enter number of character for short description text', 'westand'); ?></p>

                        </li>                         

                    </ul>

                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Filterables', 'westand'); ?></label></li>

                        <li class="to-field">

                            <select name="cs_event_filterables[]" class="dropdown" >

                                <option value="No" <?php if ($cs_event_filterables_db == "No") echo "selected"; ?> ><?php _e('No', 'westand'); ?></option>

                                <option value="Yes" <?php if ($cs_event_filterables_db == "Yes") echo "selected"; ?> ><?php _e('Yes', 'westand'); ?></option>

                            </select>

                        </li>

                    </ul>

                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Pagination', 'westand'); ?></label></li>

                        <li class="to-field">

                            <select name="cs_event_pagination[]" class="dropdown" >

                                <option <?php if ($cs_event_pagination_db == "Show Pagination") echo "selected"; ?> ><?php _e('Show Pagination', 'westand'); ?></option>

                                <!--<option <?php //if($cs_event_pagination_db=="Load More")echo "selected"; ?> >Load More</option>-->

                                <option <?php if ($cs_event_pagination_db == "Single Page") echo "selected"; ?> ><?php _e('Single Page', 'westand'); ?></option>

                            </select>

                            <p><?php _e('Show navigation only at List View.', 'westand'); ?></p>

                        </li>

                    </ul>

                </div>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('No. of Events Per Page', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_event_per_page[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_event_per_page_db); ?>" />

                        <p><?php _e('To display all the records, leave this field blank', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements noborder">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="cs_orderby[]" value="event" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_event', 'cs_pb_event');

// event html form for page builder end
// Cause form for page builder start

function cs_pb_cause($die = 0) {

    global $cs_node, $cs_count_node, $post;

    if (isset($_POST['action'])) {

        $name = $_POST['action'];

        $cs_counter = $_POST['counter'];

        $cause_element_size = '50';

        $cause_cat = '';

        $cause_title = '';

        $cause_pagination = '';

        $cause_per_page = get_option("posts_per_page");

        $cs_cause_excerpt = '140';

        $cause_type = '';

        $cause_view = '';

        $cs_cause_last_miles_percentage = '';
    } else {

        $name = $cs_node->getName();

        $cs_count_node++;

        $cause_element_size = $cs_node->cause_element_size;

        $cause_title = $cs_node->cause_title;

        $cause_cat = $cs_node->cause_cat;

        $cause_pagination = $cs_node->cause_pagination;

        $cause_per_page = $cs_node->cause_per_page;

        $cs_counter = $post->ID . $cs_count_node;

        $cs_cause_excerpt = $cs_node->cs_cause_excerpt;

        if ($cs_cause_excerpt == '') {
            $cs_cause_excerpt = 140;
        }


        $cause_type = $cs_node->cause_type;

        $cause_view = $cs_node->cause_view;

        $cs_cause_last_miles_percentage = '';

        $cs_cause_last_miles_percentage = $cs_node->cs_cause_last_miles_percentage;
    }
    ?> 

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($cause_element_size); ?>" item="blog" data="<?php echo element_size_data_array_index($cause_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="cause_element_size[]" class="item" value="<?php echo cs_allow_special_char($cause_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a>

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5><?php _e('Edit Menu Options', 'westand'); ?></h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Cause Title', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cause_title[]" class="txtfield" value="<?php echo htmlspecialchars($cause_title) ?>" />

                        <p><?php _e('Cause Section Title', 'westand'); ?></p>

                    </li>                                            

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Choose Category', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cause_cat[]" class="dropdown">

                            <option value=""><?php _e('-- All Categories Posts --', 'westand'); ?></option>

    <?php show_all_cats('', '', $cause_cat, "cs_cause-category"); ?>

                        </select>

                        <p><?php _e('Choose category to show Cause list', 'westand'); ?></p>

                    </li>

                </ul>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Select View', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cause_view[]" class="dropdown">

                            <option <?php if ($cause_view == "listing") echo "selected"; ?> value="listing"><?php _e('Listing View', 'westand'); ?></option>
                            <option <?php if ($cause_view == "small") echo "selected"; ?> value="small"><?php _e('Grid View', 'westand'); ?></option>


                        </select>



                    </li>                                        

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Cause Types', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cause_type[]" class="dropdown" onchange="cs_toggle_cause_last_miles(this.value, '<?php echo cs_allow_special_char($cs_counter); ?>')">

                            <option <?php if ($cause_type == "All") echo "selected"; ?> ><?php _e('All', 'westand'); ?></option>

                            <option <?php if ($cause_type == "Upcoming Causes") echo "selected"; ?> ><?php _e('Upcoming Causes', 'westand'); ?></option>

                            <option <?php if ($cause_type == "Past Causes") echo "selected"; ?> ><?php _e('Past Causes', 'westand'); ?></option>

                            <option <?php if ($cause_type == "cause-succesfully") echo "selected"; ?> value="cause-succesfully" ><?php _e('Successfully Funded', 'westand'); ?></option>

                            <option value="cause-last-miles" <?php if ($cause_type == 'cause-last-miles') {
        echo 'selected="selected"';
    } ?>><?php _e('Last Miles', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <div id="port_last<?php echo cs_allow_special_char($cs_counter); ?>" <?php if ($cause_type <> "cause-last-miles") echo 'style=" display:none"' ?> >

                    <ul class="form-elements  noborder">

                        <li class="to-label"><label><?php _e('Percentage for last miles', 'westand'); ?></label></li>

                        <li class="to-field">

                            <input type="text" name="cs_cause_last_miles_percentage[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_cause_last_miles_percentage); ?>" />

                        </li>

                    </ul>



                </div>

                <div id="port_pagination<?php echo cs_allow_special_char($name . $cs_counter); ?>">

                    <ul class="form-elements">

                        <li class="to-label"><label><?php _e('Pagination', 'westand'); ?></label></li>

                        <li class="to-field">

                            <select name="cause_pagination[]" class="dropdown">

                                <option <?php if ($cause_pagination == "Show Pagination") echo "selected"; ?> ><?php _e('Show Pagination', 'westand'); ?></option>

                                <option <?php if ($cause_pagination == "Single Page") echo "selected"; ?> ><?php _e('Single Page', 'westand'); ?></option>

                            </select>

                        </li>

                    </ul>



                </div>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Length of Excerpt', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_cause_excerpt[]" class="txtfield" value="<?php echo cs_allow_special_char($cs_cause_excerpt); ?>" />

                        <p><?php _e('Enter number of character for short description text', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('No. of record Per Page', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cause_per_page[]" class="txtfield" value="<?php echo cs_allow_special_char($cause_per_page); ?>" />

                        <p><?php _e('To display all the records, leave this field blank', 'westand'); ?></p>

                    </li>

                </ul>
                <ul class="form-elements noborder">

                    <li class="to-label"><label></label></li>

                    <li class="to-field">

                        <input type="hidden" name="cs_orderby[]" value="cause" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                    </li>

                </ul>

            </div>

        </div>

    </div>


    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_cause', 'cs_pb_cause');

// contact us html form for page builder start

function cs_pb_contact($die = 0) {

    global $cs_node, $cs_count_node, $post;

    if (isset($_POST['action'])) {

        $name = $_POST['action'];

        $cs_counter = $_POST['counter'];

        $contact_element_size = '50';

        $cs_contact_email_db = '';

        $cs_contact_succ_msg_db = '';
    } else {

        $name = $cs_node->getName();

        $cs_count_node++;

        $contact_element_size = $cs_node->contact_element_size;

        $cs_contact_email_db = $cs_node->cs_contact_email;

        $cs_contact_succ_msg_db = $cs_node->cs_contact_succ_msg;

        $cs_counter = $post->ID . $cs_count_node;
    }
    ?> 

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($contact_element_size); ?>" item="contact" data="<?php echo element_size_data_array_index($contact_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="contact_element_size[]" class="item" value="<?php echo cs_allow_special_char($contact_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a>

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5><?php _e('Edit Contact Form', 'westand'); ?></h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Contact Email', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="cs_contact_email[]" class="txtfield" value="<?php if ($cs_contact_email_db == "") echo get_option("admin_email");
    else echo cs_allow_special_char($cs_contact_email_db); ?>" />

                        <p><?php _e('Please enter Contact email Address', 'westand'); ?></p>

                    </li>                    

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Successful Message', 'westand'); ?></label></li>

                    <li class="to-field"><textarea name="cs_contact_succ_msg[]"><?php if ($cs_contact_succ_msg_db == "") echo "Email Sent Successfully.\nThank you, your message has been submitted to us.";
    else echo cs_allow_special_char($cs_contact_succ_msg_db); ?></textarea></li>

                </ul>

                <ul class="form-elements noborder">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="cs_orderby[]" value="contact" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_contact', 'cs_pb_contact');

// contact us html form for page builder end
// column html form for page builder start

function cs_pb_column($die = 0) {

    global $cs_node, $cs_count_node, $post;

    if (isset($_POST['action'])) {

        $name = $_POST['action'];

        $cs_counter = $_POST['counter'];

        $column_element_size = '25';

        $column_text = '';
    } else {

        $name = $cs_node->getName();

        $cs_count_node++;

        $column_element_size = $cs_node->column_element_size;

        $column_text = $cs_node->column_text;

        $cs_counter = $post->ID . $cs_count_node;
    }
    ?> 

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($column_element_size); ?>" item="column" data="<?php echo element_size_data_array_index($column_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="column_element_size[]" class="item" value="<?php echo cs_allow_special_char($column_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a> &nbsp; 

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;  

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5>Edit Column Options</h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Column Text', 'westand'); ?></label></li>

                    <li class="to-field">

                        <textarea name="column_text[]"><?php echo cs_allow_special_char($column_text); ?></textarea>

                        <p><?php _e('Shortcodes and HTML tags allowed', 'westand'); ?></p>

                    </li>                  

                </ul>

                <ul class="form-elements noborder">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="cs_orderby[]" value="column" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_column', 'cs_pb_column');

// column html form for page builder end 
// video html form for page builder start
function cs_pb_video($die = 0) {
    global $cs_node, $count_node, $post;
    if (isset($_POST['action'])) {
        $name = $_POST['action'];
        $counter = $_POST['counter'];
        $video_element_size = '25';
        $video_url = '';
        $video_width = '';
        $video_height = '';
    } else {
        $name = $cs_node->getName();
        $count_node++;
        $video_element_size = $cs_node->video_element_size;
        $video_url = $cs_node->video_url;
        $video_width = $cs_node->video_width;
        $video_height = $cs_node->video_height;
        $counter = $post->ID . $count_node;
    }
    ?> 
    <div id="<?php echo cs_allow_special_char($name . $counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($video_element_size); ?>" item="video" data="<?php echo element_size_data_array_index($video_element_size) ?>" >
        <div class="column-in">
            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>
            <input type="hidden" name="video_element_size[]" class="item" value="<?php echo cs_allow_special_char($video_element_size); ?>" >
            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="options">Options</a> &nbsp; 
            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;  
            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 
            <a class="increment" onclick="javascript:increment(this)">Inc</a>
        </div>
        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $counter); ?>" style="border:none; background:#f8f8f8;" >
            <div class="opt-head">
                <h5><?php _e('Edit Video Options', 'westand'); ?></h5>
                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="closeit">&nbsp;</a>
            </div>
            <div class="opt-conts">
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Video URL', 'westand'); ?></label></li>
                    <li class="to-field">
                        <input type="text" name="video_url[]" class="txtfield" value="<?php echo cs_allow_special_char($video_url); ?>" />
                        <p><?php _e('Enter Video URL (Youtube, Vimeo or any other supported by wordpress)', 'westand'); ?></p>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Width', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="video_width[]" class="txtfield" value="<?php echo cs_allow_special_char($video_width); ?>" /></li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Height', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="video_height[]" class="txtfield" value="<?php echo cs_allow_special_char($video_height); ?>" /></li>
                </ul>
                <ul class="form-elements noborder">
                    <li class="to-label"></li>
                    <li class="to-field">
                        <input type="hidden" name="cs_orderby[]" value="video" />
                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_video', 'cs_pb_video');

// video html form for page builder end 
// google map html form for page builder start

function cs_pb_map($die = 0) {

    global $cs_node, $cs_count_node, $post;

    if (isset($_POST['action'])) {

        $name = $_POST['action'];

        $cs_counter = $_POST['counter'];

        $map_element_size = '25';

        $map_title = '';

        $map_height = '';

        $map_lat = '';

        $map_lon = '';

        $map_zoom = '';

        $map_type = '';

        $map_info = '';

        $map_info_width = '';

        $map_info_height = '';

        $map_marker_icon = '';

        $map_show_marker = '';

        $map_controls = '';

        $map_draggable = '';

        $map_scrollwheel = '';

        $map_view = '';

        $map_conactus_content = '<a href="' . home_url() . '" class="logo"><img src="' . get_template_directory_uri() . '/images/logo.png" alt="image_url"></a>

                            <p>25 Infinite Square,</br> Red StreetCA 123456,</br> City name Canada,</p>

                            <ul>

                                <li><span>Phonee</span>123.456.78910</li>

                                <li><span>Mobile</span>(800) 123 4567 89</li>

                                <li><span>Emailx</span><a class="colrhover" href="#">resturant@resturant.com</a></li>

                                <li><span>Timing</span>Mon-Thu (09:00 to 17:30)</li>

                            </ul>';
    } else {

        $name = $cs_node->getName();

        $cs_count_node++;

        $map_element_size = $cs_node->map_element_size;

        $map_title = $cs_node->map_title;

        $map_height = $cs_node->map_height;

        $map_lat = $cs_node->map_lat;

        $map_lon = $cs_node->map_lon;

        $map_zoom = $cs_node->map_zoom;

        $map_type = $cs_node->map_type;

        $map_info = $cs_node->map_info;

        $map_info_width = $cs_node->map_info_width;

        $map_info_height = $cs_node->map_info_height;

        $map_marker_icon = $cs_node->map_marker_icon;

        $map_show_marker = $cs_node->map_show_marker;

        $map_controls = $cs_node->map_controls;

        $map_draggable = $cs_node->map_draggable;

        $map_scrollwheel = $cs_node->map_scrollwheel;

        $map_view = $cs_node->map_view;

        $map_conactus_content = $cs_node->map_conactus_content;

        $cs_counter = $post->ID . $cs_count_node;
    }
    ?> 

    <div id="<?php echo cs_allow_special_char($name . $cs_counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($map_element_size); ?>" item="map" data="<?php echo element_size_data_array_index($map_element_size) ?>" >

        <div class="column-in">

            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>

            <input type="hidden" name="map_element_size[]" class="item" value="<?php echo cs_allow_special_char($map_element_size); ?>" >

            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="options">Options</a> &nbsp; 

            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;  

            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 

            <a class="increment" onclick="javascript:increment(this)">Inc</a>

        </div>

        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $cs_counter); ?>" style="border:none; background:#f8f8f8;" >

            <div class="opt-head">

                <h5><?php _e('Edit Map Options', 'westand'); ?></h5>

                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Title', 'westand'); ?></label></li>

                    <li class="to-field"><input type="text" name="map_title[]" class="txtfield" value="<?php echo cs_allow_special_char($map_title); ?>" /></li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Button', 'westand'); ?>Map Height</label></li>

                    <li class="to-field">

                        <input type="text" name="map_height[]" class="txtfield" value="<?php echo cs_allow_special_char($map_height); ?>" />

                        <p><?php _e('Info Max Height in PX (Default is 200)', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Latitude', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="map_lat[]" class="txtfield" value="<?php echo cs_allow_special_char($map_lat); ?>" />

                        <p><?php _e('Put Latitude (Default is 0)', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Longitude', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="map_lon[]" class="txtfield" value="<?php echo cs_allow_special_char($map_lon); ?>" />

                        <p><?php _e('Put Longitude (Default is 0)', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Zoom', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="map_zoom[]" class="txtfield" value="<?php echo cs_allow_special_char($map_zoom); ?>" />

                        <p><?php _e('Put Zoom Level (Default is 11)', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Map Types', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="map_type[]" class="dropdown" >

                            <option <?php if ($map_type == "ROADMAP") echo "selected"; ?> ><?php _e('ROADMAP', 'westand'); ?></option>

                            <option <?php if ($map_type == "HYBRID") echo "selected"; ?> ><?php _e('HYBRID', 'westand'); ?></option>

                            <option <?php if ($map_type == "SATELLITE") echo "selected"; ?> ><?php _e('SATELLITE', 'westand'); ?></option>

                            <option <?php if ($map_type == "TERRAIN") echo "selected"; ?> ><?php _e('TERRAIN', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Info Text', 'westand'); ?></label></li>

                    <li class="to-field"><input type="text" name="map_info[]" class="txtfield" value="<?php echo cs_allow_special_char($map_info); ?>" /></li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Info Max Width', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="map_info_width[]" class="txtfield" value="<?php echo cs_allow_special_char($map_info_width); ?>" />

                        <p><?php _e('Info Max Width in PX (Default is 200)', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Info Max Height', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="map_info_height[]" class="txtfield" value="<?php echo cs_allow_special_char($map_info_height); ?>" />

                        <p><?php _e('Info Max Height in PX (Default is 100)', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Marker Icon Path', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="map_marker_icon[]" class="txtfield" value="<?php echo cs_allow_special_char($map_marker_icon); ?>" />

                        <p>e.g. http://yourdomain.com/logo.png</p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Show Marker', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="map_show_marker[]" class="dropdown" >

                            <option value="true" <?php if ($map_show_marker == "true") echo "selected"; ?> ><?php _e('On', 'westand'); ?></option>

                            <option value="false" <?php if ($map_show_marker == "false") echo "selected"; ?> ><?php _e('Off', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Disable Map Controls', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="map_controls[]" class="dropdown" >

                            <option value="false" <?php if ($map_controls == "false") echo "selected"; ?> ><?php _e('Off', 'westand'); ?></option>

                            <option value="true" <?php if ($map_controls == "true") echo "selected"; ?> ><?php _e('On', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Draggable', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="map_draggable[]" class="dropdown" >

                            <option value="true" <?php if ($map_draggable == "true") echo "selected"; ?> ><?php _e('On', 'westand'); ?></option>

                            <option value="false" <?php if ($map_draggable == "false") echo "selected"; ?> ><?php _e('Off', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Scroll Wheel', 'westand'); ?></label></li>

                    <li class="to-field">



                        <select name="map_scrollwheel[]" class="dropdown" >

                            <option value="true" <?php if ($map_scrollwheel == "true") echo "selected"; ?> ><?php _e('On', 'westand'); ?></option>

                            <option value="false" <?php if ($map_scrollwheel == "false") echo "selected"; ?> ><?php _e('Off', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Map View', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="map_view[]" class="dropdown"  onchange="map_contactus_element(this.value,<?php echo cs_allow_special_char($cs_counter); ?>)">

                            <option <?php if ($map_view == "content") echo "selected"; ?> value="content" ><?php _e('Boxed View', 'westand'); ?></option>

                            <option <?php if ($map_view == "header") echo "selected"; ?> value="header" ><?php _e('Full View', 'westand'); ?></option>

                        </select>

                    </li>

                </ul>

                <ul class="form-elements noborder">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="cs_orderby[]" value="map" />

                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $cs_counter); ?>')" />

                    </li>

                </ul>

            </div>



        </div>

    </div>

    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_map', 'cs_pb_map');

// accordion html form for page builder start
function cs_pb_accordion($die = 0) {
    global $cs_node, $count_node, $post;
    if (isset($_POST['action'])) {
        $name = $_POST['action'];
        $counter = $_POST['counter'];
        $accordion_element_size = '50';
        $accordion_title = '';
        $accordion_text = '';
    } else {
        $name = $cs_node->getName();
        $count_node++;
        $accordion_element_size = $cs_node->accordion_element_size;
        $accordion_title = $cs_node->accordion_title;
        $accordion_text = $cs_node->accordion_text;
        $counter = $post->ID . $count_node;
    }
    ?> 
    <div id="<?php echo cs_allow_special_char($name . $counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($accordion_element_size); ?>" item="accordion" data="<?php echo element_size_data_array_index($accordion_element_size) ?>" >
        <div class="column-in">
            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>
            <input type="hidden" name="accordion_element_size[]" class="item" value="<?php echo cs_allow_special_char($accordion_element_size) ?>" >
            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="options">Options</a> &nbsp; 
            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;  
            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 
            <a class="increment" onclick="javascript:increment(this)">Inc</a>
        </div>
        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $counter); ?>" style="border:none; background:#f8f8f8;" >
            <div class="opt-head">
                <h5><?php _e('Edit Accordion Options', 'westand'); ?></h5>
                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="closeit">&nbsp;</a>
            </div>
            <div class="wrapptabbox">
                <div class="clone_append">
    <?php
    $accordion_num = 0;
    if (isset($cs_node)) {
        $accordion_num = count($cs_node->accordion);
        foreach ($cs_node->accordion as $val) {
            if ($val->accordion_active == "yes") {
                $tab_active = "selected";
            } else {
                $tab_active = "";
            }
            echo "<div class='clone_form'>";
            echo "<a href='#' class='deleteit_node'>Delete it</a>";
            echo '<label>Tab Title:</label> <input class="txtfield" type="text" name="accordion_title[]" value="' . $val->accordion_title . '" />';
            echo '<label>Tab Text:</label> <textarea class="txtfield" name="accordion_text[]">' . $val->accordion_text . '</textarea>';
            echo '<label>Title Icon:</label> <input class="txtfield" type="text" name="accordion_title_icon[]" value="' . $val->accordion_title_icon . '" />';
            echo '<label>Active:</label> <select name="accordion_active[]"><option>no</option><option ' . $tab_active . '>yes</option></select> ';
            echo "</div>";
        }
    }
    ?>
                </div>
                <div class="opt-conts">
                    <ul class="form-elements">
                        <li class="to-label"><label></label></li>
                        <li class="to-field"><a href="#" class="add_accordion"><?php _e('Add Tab', 'westand'); ?></a></li>
                    </ul>
                    <ul class="form-elements noborder">
                        <li class="to-label"></li>
                        <li class="to-field">
                            <input type="hidden" name="accordion_num[]" value="<?php echo cs_allow_special_char($accordion_num); ?>" class="fieldCounter"  />
                            <input type="hidden" name="cs_orderby[]" value="accordions" />
                            <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" />
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
                    <?php
                    if ($die <> 1)
                        die();
                }

                add_action('wp_ajax_cs_pb_accordion', 'cs_pb_accordion');

// accordion html form for page builder end
// tabs html form for page builder start
                function cs_pb_tabs($die = 0) {
                    global $cs_node, $count_node, $post;
                    if (isset($_POST['action'])) {
                        $name = $_POST['action'];
                        $counter = $_POST['counter'];
                        $tabs_element_size = '50';
                        $tab_title = '';
                        $tab_text = '';
                    } else {
                        $name = $cs_node->getName();
                        $count_node++;
                        $tabs_element_size = $cs_node->tabs_element_size;
                        $tab_title = $cs_node->tab_title;
                        $tab_text = $cs_node->tab_text;
                        $counter = $post->ID . $count_node;
                    }
                    ?> 
    <div id="<?php echo cs_allow_special_char($name . $counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($tabs_element_size); ?>" item="tabs" data="<?php echo element_size_data_array_index($tabs_element_size) ?>" >
        <div class="column-in">
            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>
            <input type="hidden" name="tabs_element_size[]" class="item" value="<?php echo cs_allow_special_char($tabs_element_size); ?>" >
            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="options">Options</a> &nbsp; 
            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;  
            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 
            <a class="increment" onclick="javascript:increment(this)">Inc</a>
        </div>
        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $counter); ?>" style="border:none; background:#f8f8f8;" >
            <div class="opt-head">
                <h5><?php _e('Edit Tabs Options', 'westand'); ?></h5>
                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="closeit">&nbsp;</a>
            </div>
            <div class="wrapptabbox">
                <div class="clone_append">
    <?php
    $tabs_num = 0;
    if (isset($cs_node)) {
        $tabs_num = count($cs_node->tab);
        foreach ($cs_node->tab as $tab) {
            if ($tab->tab_active == "yes") {
                $tab_active = "selected";
            } else {
                $tab_active = "";
            }
            echo "<div class='clone_form'>";
            echo "<a href='#' class='deleteit_node'>Delete it</a>";
            echo '<label>Tab Title:</label> <input class="txtfield" type="text" name="tab_title[]" value="' . $tab->tab_title . '" />';
            echo '<label>Tab Text:</label> <textarea class="txtfield" name="tab_text[]">' . $tab->tab_text . '</textarea>';
            echo '<label>Title Icon:</label> <input class="txtfield" type="text" name="tab_title_icon[]" value="' . $tab->tab_title_icon . '" />';
            echo '<label>Active:</label> <select name="tab_active[]"><option>no</option><option ' . $tab_active . '>yes</option></select> ';
            echo "</div>";
        }
    }
    ?>
                </div>
                <div class="opt-conts">
                    <ul class="form-elements">
                        <li class="to-label"><label></label></li>
                        <li class="to-field"><a href="#" class="addedtab"><?php _e('Add Tab', 'westand'); ?></a></li>
                    </ul>
                    <ul class="form-elements noborder">
                        <li class="to-label"></li>
                        <li class="to-field">
                            <input type="hidden" name="tabs_num[]" value="<?php echo cs_allow_special_char($tabs_num); ?>" class="fieldCounter"  />
                            <input type="hidden" name="cs_orderby[]" value="tabs" />
                            <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" />
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
                    <?php
                    if ($die <> 1)
                        die();
                }

                add_action('wp_ajax_cs_pb_tabs', 'cs_pb_tabs');

// tabs html form for page builder end
// quote html form for page builder start
                function cs_pb_quote($die = 0) {
                    global $cs_node, $count_node, $post;
                    if (isset($_POST['action'])) {
                        $name = $_POST['action'];
                        $counter = $_POST['counter'];
                        $quote_element_size = '25';
                        $quote_text_color = '';
                        $quote_align = '';
                        $quote_content = '';
                    } else {
                        $name = $cs_node->getName();
                        $count_node++;
                        $quote_element_size = $cs_node->quote_element_size;
                        $quote_text_color = $cs_node->quote_text_color;
                        $quote_align = $cs_node->quote_align;
                        $quote_content = $cs_node->quote_content;
                        $counter = $post->ID . $count_node;
                    }
                    ?> 
    <div id="<?php echo cs_allow_special_char($name . $counter); ?>_del" class="column  parentdelete column_<?php echo cs_allow_special_char($quote_element_size); ?>" item="quote" data="<?php echo element_size_data_array_index($quote_element_size) ?>" >
        <div class="column-in">
            <h5><?php echo ucfirst(str_replace("cs_pb_", "", $name)) ?></h5>
            <input type="hidden" name="quote_element_size[]" class="item" value="<?php echo cs_allow_special_char($quote_element_size); ?>" >
            <a href="javascript:hide_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="options">Options</a> &nbsp; 
            <a href="#" class="delete-it btndeleteit">Del</a> &nbsp;  
            <a class="decrement" onclick="javascript:decrement(this)">Dec</a> &nbsp; 
            <a class="increment" onclick="javascript:increment(this)">Inc</a>
        </div>
        <div class="poped-up" id="<?php echo cs_allow_special_char($name . $counter); ?>" style="border:none; background:#f8f8f8;" >
            <div class="opt-head">
                <h5><?php _e('Edit Quote Options', 'westand'); ?></h5>
                <a href="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" class="closeit">&nbsp;</a>
            </div>
            <div class="opt-conts">
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Text Color', 'westand'); ?></label></li>
                    <li class="to-field">
                        <input type="text" name="quote_text_color[]" class="txtfield" value="<?php echo cs_allow_special_char($quote_text_color); ?>" />
                        <p><?php _e('Enter the color code like', 'westand'); ?> #000000</p>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Align', 'westand'); ?></label></li>
                    <li class="to-field">
                        <select name="quote_align[]" class="dropdown" >
                            <option <?php if ($quote_align == "left") echo "selected"; ?> ><?php _e('left', 'westand'); ?></option>
                            <option <?php if ($quote_align == "right") echo "selected"; ?> ><?php _e('right', 'westand'); ?></option>
                            <option <?php if ($quote_align == "center") echo "selected"; ?> ><?php _e('center', 'westand'); ?></option>
                        </select>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Quote Content', 'westand'); ?></label></li>
                    <li class="to-field"><textarea name="quote_content[]"><?php echo cs_allow_special_char($quote_content); ?></textarea></li>
                </ul>
                <ul class="form-elements noborder">
                    <li class="to-label"></li>
                    <li class="to-field">
                        <input type="hidden" name="cs_orderby[]" value="quote" />
                        <input type="button" value="Save" style="margin-right:10px;" onclick="javascript:show_all('<?php echo cs_allow_special_char($name . $counter); ?>')" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    if ($die <> 1)
        die();
}

add_action('wp_ajax_cs_pb_quote', 'cs_pb_quote');

// quote html form for page builder start
// google map html form for page builder end
// page bulider items end
// saving all the theme options start

function theme_option_save() {

    if (isset($_POST['logo'])) {

        $_POST = stripslashes_htmlspecialchars($_POST);
        $request_methods = '';
        if (function_exists('cs_glob_server')) {
            $request_methods = cs_glob_server("REQUEST_METHOD");
        }
        if ($request_methods == "POST" and isset($_POST['twitter_setting'])) {

            update_option("cs_theme_option", $_POST);

            echo "All Settings Saved";
        } else {

            update_option("cs_theme_option", $_POST);

            echo "All Settings Saved";
        }
    } else {

        $target_path_mo = get_template_directory() . "/languages/" . $_FILES["mofile"]["name"][0];

        if (move_uploaded_file($_FILES["mofile"]["tmp_name"][0], $target_path_mo)) {

            chmod($target_path_mo, 0777);
        }

        echo "New Language Uploaded Successfully";
    }

    die();
}

add_action('wp_ajax_theme_option_save', 'theme_option_save');

// saving all the theme options end
// saving theme options import export start


function theme_option_import_export() {
    if ($_POST['theme_option_data'] and $_POST['theme_option_data'] <> '') {
        if (function_exists('base_64_decode')) {
            $a = unserialize(base_64_decode(trim($_POST['theme_option_data'])));
        }
        update_option("cs_theme_option", $a);
        echo "OPtions Imported";
        die();
    } else {
        echo "Import failed<br>Textarea is empty.";
        die();
    }
}

add_action('wp_ajax_theme_option_import_export', 'theme_option_import_export');

// saving theme options import export end
// restoring default theme options start
function theme_option_restore_default() {

    update_option("cs_theme_option", get_option('cs_theme_option_restore'));
    echo "Default Theme Options Restored";
    die();
}

add_action('wp_ajax_theme_option_restore_default', 'theme_option_restore_default');

// restoring default theme options end
// saving theme options backup start

function theme_option_backup() {

    update_option("cs_theme_option_backup", get_option('cs_theme_option'));

    update_option("cs_theme_option_backup_time", gmdate("Y-m-d H:i:s"));

    echo "Current Backup Taken @ " . gmdate("Y-m-d H:i:s");

    die();
}

add_action('wp_ajax_theme_option_backup', 'theme_option_backup');

// saving theme options backup end
// restore backup start

function theme_option_backup_restore() {

    update_option("cs_theme_option", get_option('cs_theme_option_backup'));

    echo "Backup Restored";

    die();
}

add_action('wp_ajax_theme_option_backup_restore', 'theme_option_backup_restore');

// restore backup end





function add_social_icon() {

    $template_path = get_template_directory_uri() . '/scripts/admin/media_upload.js';

    wp_enqueue_script('my-upload2', $template_path, array('jquery', 'media-upload', 'thickbox', 'jquery-ui-droppable', 'jquery-ui-datepicker', 'jquery-ui-slider', 'wp-color-picker'));



    echo '<tr id="del_' . $_POST['counter_social_network'] . '"> 

		<td><img width="50" src="' . $_POST['social_net_icon_path'] . '"></td> 

		<td>' . $_POST['social_net_url'] . '</td> 

		<td class="centr"> 

			<a onclick="javascript:return confirm(\'Are you sure! You want to delete this\')" href="javascript:social_icon_del(' . $_POST['counter_social_network'] . ')">Del</a> 

			| <a href="javascript:cs_toggle(' . $_POST['counter_social_network'] . ')">Edit</a>

		</td> 

	</tr> 

	<tr id="' . $_POST['counter_social_network'] . '" style="display:none"> 

		<td colspan="3"> 

			<ul class="form-elements">

				<li class="to-label"><label>' . __('Icon Path', 'westand') . '</label></li>

				<li class="to-field">

				  <input id="social_net_icon_path' . $_POST['counter_social_network'] . '" name="social_net_icon_path[]" value="' . $_POST['social_net_icon_path'] . '" type="text" class="small" /> 

				</li>

				<li><a onclick="cs_toggle(' . $_POST['counter_social_network'] . ')"><img src="' . get_template_directory_uri() . '/images/admin/close-red.png"></a></li>

				<li class="full">&nbsp;</li>

				<li class="to-label"><label>' . __('Awesome Font', 'westand') . '</label></li>

				<li class="to-field">

				  <input class="small" type="text" id="social_net_awesome" name="social_net_awesome[]" value="' . $_POST['social_net_awesome'] . '" style="width:420px;" />

				  <p>Put Awesome Font Code like "icon-flag".</p>

				</li>

				<li class="full">&nbsp;</li>

				<li class="to-label"><label>' . __('URL', 'westand') . '</label></li>

				<li class="to-field">

				  <input class="small" type="text" id="social_net_url" name="social_net_url[]" value="' . $_POST['social_net_url'] . '" style="width:420px;" />

				  <p>' . __('Please enter full URL', 'westand') . '</p>

				</li>

				<li class="full">&nbsp;</li>

				<li class="to-label"><label>' . __('Title', 'westand') . '</label></li>

				<li class="to-field">

				  <input class="small" type="text" id="social_net_tooltip" name="social_net_tooltip[]" value="' . $_POST['social_net_tooltip'] . '" style="width:420px;" />

				  <p>' . __('Please enter text for icon tooltip', 'westand') . '</p>

				</li>

			</ul>

		</td> 

	</tr>';

    die;
}

add_action('wp_ajax_add_social_icon', 'add_social_icon');

// media pagination for slider/gallery in admin side start

function media_pagination() {

    foreach ($_REQUEST as $keys => $values) {

        $$keys = $values;
    }

    $records_per_page = 10;

    if (empty($page_id))
        $page_id = 1;

    $offset = $records_per_page * ($page_id - 1);
    ?>

    <ul class="gal-list">
    <?php
    $query_images_args = array('post_type' => 'attachment', 'post_mime_type' => 'image', 'post_status' => 'inherit', 'posts_per_page' => -1,);
    $query_images = new WP_Query($query_images_args);
    if (empty($total_pages))
        $total_pages = count($query_images->posts);
    $query_images_args = array('post_type' => 'attachment', 'post_mime_type' => 'image', 'post_status' => 'inherit', 'posts_per_page' => $records_per_page, 'offset' => $offset,);
    $query_images = new WP_Query($query_images_args);
    $images = array();
    foreach ($query_images->posts as $image) {
        $image_path = wp_get_attachment_image_src((int) $image->ID, array(get_option("thumbnail_size_w"), get_option("thumbnail_size_h")));
        ?>
            <li style="cursor:pointer"><img src="<?php echo cs_allow_special_char($image_path[0]); ?>" onclick="javascript:clone('<?php echo cs_allow_special_char($image->ID); ?>')" alt="image_url" /></li>
        <?php
    }
    ?>
    </ul>
    <br />
    <div class="pagination-cus">

        <ul>

    <?php
    if ($page_id > 1)
        echo "<li><a href='javascript:show_next(" . ($page_id - 1) . ",$total_pages)'>Prev</a></li>";

    for ($i = 1; $i <= ceil($total_pages / $records_per_page); $i++) {

        if ($i <> $page_id)
            echo "<li><a href='javascript:show_next($i,$total_pages)'>" . $i . "</a></li> ";
        else
            echo "<li class='active'><a>" . $i . "</a></li>";
    }

    if ($page_id < $total_pages / $records_per_page)
        echo "<li><a href='javascript:show_next(" . ($page_id + 1) . ",$total_pages)'>Next</a></li>";
    ?>

        </ul>

    </div>
    <?php
    if (isset($_POST['action']))
        die();
}

add_action('wp_ajax_media_pagination', 'media_pagination');

// media pagination for slider/gallery in admin side end
// to make a copy of media image for slider start
function cs_slider_clone() {
    global $cs_node, $cs_counter;
    if (isset($_POST['action'])) {
        $cs_node = new stdClass();
        $cs_node->title = '';
        $cs_node->description = '';
        $cs_node->link = '';
        $cs_node->link_target = '';
        $cs_node->use_image_as = '';
        $cs_node->video_code = '';
    }
    if (isset($_POST['counter']))
        $cs_counter = $_POST['counter'];
    if (isset($_POST['path']))
        $cs_node->path = $_POST['path'];
    ?>
    <li class="ui-state-default" id="<?php echo cs_allow_special_char($cs_counter); ?>">
        <div class="thumb-secs">
        <?php $image_path = wp_get_attachment_image_src((int) $cs_node->path, array(get_option("thumbnail_size_w"), get_option("thumbnail_size_h"))); ?>
            <img src="<?php echo cs_allow_special_char($image_path[0]); ?>" alt="image_url">
            <div class="gal-edit-opts">
                <!--<a href="#" class="resize"></a>-->

                <a href="javascript:slidedit(<?php echo cs_allow_special_char($cs_counter); ?>)" class="edit"></a>
                <a href="javascript:del_this(<?php echo cs_allow_special_char($cs_counter); ?>)" class="delete"></a>
            </div>
        </div>
        <div class="poped-up" id="edit_<?php echo cs_allow_special_char($cs_counter); ?>">
            <div class="opt-head">
                <h5><?php _e('Edit Options', 'westand'); ?></h5>
                <a href="javascript:slideclose(<?php echo cs_allow_special_char($cs_counter); ?>)" class="closeit">&nbsp;</a>
                <div class="clear"></div>
            </div>
            <div class="opt-conts">
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Image Title', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="cs_slider_title[]" value="<?php echo htmlspecialchars($cs_node->title) ?>" class="txtfield" /></li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Image Description', 'westand'); ?></label></li>
                    <li class="to-field"><textarea class="txtarea" name="cs_slider_description[]"><?php echo htmlspecialchars($cs_node->description) ?></textarea></li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Link', 'westand'); ?></label></li>
                    <li class="to-field"><input type="text" name="cs_slider_link[]" value="<?php echo htmlspecialchars($cs_node->link) ?>" class="txtfield" /></li>
                </ul>
                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Link Target', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="cs_slider_link_target[]" class="select_dropdown">

                            <option <?php if ($cs_node->link_target == "_self") echo "selected" ?>>_self</option>

                            <option <?php if ($cs_node->link_target == "_blank") echo "selected" ?>>_blank</option>

                        </select>

                        <p><?php _e('Please select image target', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="path[]" value="<?php echo cs_allow_special_char($cs_node->path); ?>" />

                        <input type="button" value="Submit" onclick="javascript:slideclose(<?php echo cs_allow_special_char($cs_counter); ?>)" class="close-submit" />

                    </li>

                </ul>

                <div class="clear"></div>

            </div>

        </div>

    </li>

    <?php
    if (isset($_POST['action']))
        die();
}

add_action('wp_ajax_slider_clone', 'cs_slider_clone');

// to make a copy of media image for slider end
// to make a copy of media image for gallery start

function cs_gallery_clone() {

    global $cs_node, $cs_counter;

    if (isset($_POST['action'])) {

        $cs_node = new stdClass();

        $cs_node->title = "";

        $cs_node->use_image_as = "";

        $cs_node->video_code = "";

        $cs_node->link_url = "";

        $cs_node->use_image_as_db = "";

        $cs_node->link_url_db = '';
    }

    if (isset($_POST['counter']))
        $cs_counter = $_POST['counter'];

    if (isset($_POST['path']))
        $cs_node->path = $_POST['path'];
    ?>

    <li class="ui-state-default" id="<?php echo cs_allow_special_char($cs_counter); ?>">

        <div class="thumb-secs">

    <?php $image_path = wp_get_attachment_image_src((int) $cs_node->path, array(get_option("thumbnail_size_w"), get_option("thumbnail_size_h"))); ?>

            <img src="<?php echo cs_allow_special_char($image_path[0]); ?>" alt="image_url">

            <div class="gal-edit-opts">

                <!--<a href="#" class="resize"></a>-->

                <a href="javascript:galedit(<?php echo cs_allow_special_char($cs_counter); ?>)" class="edit"></a>

                <a href="javascript:del_this(<?php echo cs_allow_special_char($cs_counter); ?>)" class="delete"></a>

            </div>

        </div>

        <div class="poped-up" id="edit_<?php echo cs_allow_special_char($cs_counter); ?>">

            <div class="opt-head">

                <h5><?php _e('Edit Options', 'westand'); ?></h5>

                <a href="javascript:galclose(<?php echo cs_allow_special_char($cs_counter); ?>)" class="closeit">&nbsp;</a>

            </div>

            <div class="opt-conts">

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Image Title', 'westand'); ?></label></li>

                    <li class="to-field"><input type="text" name="title[]" value="<?php echo htmlspecialchars($cs_node->title) ?>" class="txtfield" /></li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"><label><?php _e('Use Image As', 'westand'); ?></label></li>

                    <li class="to-field">

                        <select name="use_image_as[]" class="select_dropdown" onchange="cs_toggle_gal(this.value, <?php echo cs_allow_special_char($cs_counter); ?>)">

                            <option <?php if ($cs_node->use_image_as == "0") echo "selected"; ?> value="0"><?php _e('LightBox to current thumbnail', 'westand'); ?></option>

                            <option <?php if ($cs_node->use_image_as == "1") echo "selected"; ?> value="1"><?php _e('LightBox to Video', 'westand'); ?></option>

                            <option <?php if ($cs_node->use_image_as == "2") echo "selected"; ?> value="2"><?php _e('Link URL', 'westand'); ?></option>

                        </select>

                        <p><?php _e('Please select Image link where it will go', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements" id="video_code<?php echo cs_allow_special_char($cs_counter); ?>" <?php if ($cs_node->use_image_as == "0" or $cs_node->use_image_as == "" or $cs_node->use_image_as == "2") echo 'style="display:none"'; ?> >

                    <li class="to-label"><label><?php _e('Video URL', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="video_code[]" value="<?php echo htmlspecialchars($cs_node->video_code) ?>" class="txtfield" />

                        <p><?php _e('(Enter Specific Video URL Youtube or Vimeo)', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements" id="link_url<?php echo cs_allow_special_char($cs_counter); ?>" <?php if ($cs_node->use_image_as == "0" or $cs_node->use_image_as == "" or $cs_node->use_image_as == "1") echo 'style="display:none"'; ?> >

                    <li class="to-label"><label><?php _e('Link URL', 'westand'); ?></label></li>

                    <li class="to-field">

                        <input type="text" name="link_url[]" value="<?php echo htmlspecialchars($cs_node->link_url) ?>" class="txtfield" />

                        <p><?php _e('(Enter Specific Link URL)', 'westand'); ?></p>

                    </li>

                </ul>

                <ul class="form-elements">

                    <li class="to-label"></li>

                    <li class="to-field">

                        <input type="hidden" name="path[]" value="<?php echo cs_allow_special_char($cs_node->path); ?>" />

                        <input type="button" onclick="javascript:galclose(<?php echo cs_allow_special_char($cs_counter); ?>)" value="Submit" class="close-submit" />

                    </li>

                </ul>

                <div class="clear"></div>

            </div>

        </div>

    </li>

    <?php
    if (isset($_POST['action']))
        die();
}

add_action('wp_ajax_gallery_clone', 'cs_gallery_clone');

// to make a copy of media image for gallery end
// add Team Scoial function
function cs_add_social_to_list() {
    global $counter_social, $var_cp_title, $var_cp_image_url, $var_cp_team_text;
    foreach ($_POST as $keys => $values) {
        $$keys = $values;
    }
    ?>
    <tr id="edit_track<?php echo cs_allow_special_char($counter_social); ?>">
        <td id="album-title<?php echo cs_allow_special_char($counter_social); ?>" style="width:80%;"><?php echo cs_allow_special_char($var_cp_title); ?></td>
        <td class="centr" style="width:20%;">
            <a href="javascript:openpopedup('edit_track_form<?php echo cs_allow_special_char($counter_social); ?>')" class="actions edit">&nbsp;</a>
            <a onclick="javascript:return confirm('Are you sure! You want to delete this social icon')" href="javascript:cs_div_remove('edit_track<?php echo cs_allow_special_char($counter_social); ?>')" class="actions delete">&nbsp;</a>
            <div class="poped-up" id="edit_track_form<?php echo cs_allow_special_char($counter_social); ?>">
                <div class="opt-head">
                    <h5><?php _e('Settings', 'westand'); ?></h5>
                    <a href="javascript:closepopedup('edit_track_form<?php echo cs_allow_special_char($counter_social); ?>')" class="closeit">&nbsp;</a>
                    <div class="clear"></div>
                </div>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Title', 'westand'); ?></label></li>
                    <li class="to-field">
                        <input type="text" name="var_cp_title[]" value="<?php echo htmlspecialchars($var_cp_title) ?>" id="var_cp_title<?php echo cs_allow_special_char($counter_social); ?>" />

                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('icon/image URL', 'westand'); ?></label></li>
                    <li class="to-field">
                        <input id="var_cp_image_url<?php echo cs_allow_special_char($counter_social); ?>" name="var_cp_image_url[]" value="<?php echo htmlspecialchars($var_cp_image_url) ?>" type="text" class="small" />
                        <input id="var_cp_image_url<?php echo cs_allow_special_char($counter_social); ?>" name="var_cp_image_url<?php echo cs_allow_special_char($counter_track) ?>" type="button" class="uploadfile left" value="Browse"/>
                        <p><?php _e('Put Fontawsome icon/image url. You can get fontawsome icons from fontawsome website', 'westand'); ?></p>
                    </li>
                </ul>
                <ul class="form-elements">
                    <li class="to-label"><label><?php _e('Text', 'westand'); ?></label></li>
                    <li class="to-field">

                        <textarea name="var_cp_team_text[]" rows="5" cols="20"><?php echo htmlspecialchars($var_cp_team_text) ?></textarea>
                    </li>
                </ul>
                <ul class="form-elements noborder">
                    <li class="to-label"><label></label></li>
                    <li class="to-field"><input type="button" value="Update Personal Information" onclick="update_title(<?php echo cs_allow_special_char($counter_social); ?>);
                            closepopedup('edit_track_form<?php echo cs_allow_special_char($counter_social); ?>')" /></li>
                </ul>
            </div>
        </td>
    </tr>
    <?php
    if (isset($action))
        die();
}

add_action('wp_ajax_cs_add_social_to_list', 'cs_add_social_to_list');

// side bar layout in pages, post and default page(theme options) start

function subheader_meta_layout($default_theme_options_check = '') {
    global $cs_xmlObject, $post;

    $page_subheader_color = '';
    if (empty($cs_xmlObject->header_banner_style))
        $header_banner_style = "";
    else
        $header_banner_style = $cs_xmlObject->header_banner_style;

    if (empty($cs_xmlObject->page_subheader_color))
        $page_subheader_color = "#0e1f33";
    else
        $page_subheader_color = $cs_xmlObject->page_subheader_color;

    if (empty($cs_xmlObject->header_banner_image))
        $header_banner_image = "";
    else
        $header_banner_image = $cs_xmlObject->header_banner_image;

    if (empty($cs_xmlObject->header_banner_flex_slider))
        $header_banner_flex_slider = "";
    else
        $header_banner_flex_slider = $cs_xmlObject->header_banner_flex_slider;

    if (empty($cs_xmlObject->custom_slider_id))
        $custom_slider_id = "";
    else
        $custom_slider_id = htmlspecialchars($cs_xmlObject->custom_slider_id);

    if (isset($cs_xmlObject->page_title)) {
        $page_title = $cs_xmlObject->page_title;
    } else {
        $page_title = '';
    }

    if (isset($cs_xmlObject->page_sub_title)) {
        $page_sub_title = $cs_xmlObject->page_sub_title;
    } else {
        $page_sub_title = '';
    }
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.bg_color').wpColorPicker();
        });
    </script>
    <div class="clear"></div>

    <div class="theme-help">

        <h4 style="padding-bottom:0px;"><?php _e('Subheader Options', 'westand'); ?></h4>

        <div class="clear"></div>

    </div>
    <ul class="form-elements noborder">
        <li class="to-label"><label><?php _e('Sub Header Style', 'westand'); ?></label></li>
        <li class="to-field">
            <select name="header_banner_style" class="dropdown" onchange="javascript:home_slider_header_toggle(this.value)">
                <option <?php if (isset($header_banner_style) and $header_banner_style == "default_header") {
        echo "selected";
    } ?> value="default_header" ><?php _e('Default Header Style', 'westand'); ?></option>
                <option <?php if (isset($header_banner_style) and $header_banner_style == "breadcrumbs") {
        echo "selected";
    } ?> value="breadcrumbs" ><?php _e('Breadcrumbs', 'westand'); ?></option>
                <option <?php if (isset($header_banner_style) and $header_banner_style == "no-header") {
        echo "selected";
    } ?> value="no-header" ><?php _e('No Subheader', 'westand'); ?></option>
                <option <?php if (isset($header_banner_style) and $header_banner_style == "flex_slider") {
        echo "selected";
    } ?> value="flex_slider" ><?php _e('Flex Slider', 'westand'); ?></option>
                <option <?php if (isset($header_banner_style) and $header_banner_style == "custom_slider") {
        echo "selected";
    } ?> value="custom_slider" ><?php _e('Custom Slider', 'westand'); ?></option>
            </select>
            <p><?php _e('Default header Style settings', 'westand'); ?> <a href="<?php echo admin_url(); ?>/themes.php?page=cs_theme_options#tab-head-scripts-show" target="_blank"><?php _e('Here', 'westand'); ?></a></p>
        </li>
    </ul>
    <div id="header_custom_image" style="display:<?php if ($header_banner_style == "breadcrumbs") echo 'inline"';
    else echo 'none'; ?>"  >
        <ul class="form-elements  noborder">
            <li class="to-label"><label><?php _e('Sub-Header Background', 'westand'); ?></label></li>
            <li class="to-field">
                <input id="header_banner_image" name="header_banner_image" value="<?php echo cs_allow_special_char($header_banner_image); ?>" type="text" class="small" />
                <input id="header_banner_image" name="header_banner_image" type="button" class="uploadfile left" value="Browse"/>
                <p><?php _e('Default background can be changed by uploading', 'westand'); ?>(image size 1600*900)</p>
            </li>
        </ul>
        <ul class="form-elements">
            <li class="to-label"><label><?php _e('Page Sub Header Color', 'westand'); ?></label></li>
            <li class="to-field">
                <input type="text" name="page_subheader_color"  class="bg_color" value="<?php echo cs_allow_special_char($page_subheader_color); ?>" />
            </li>
        </ul>
        <ul class="form-elements  noborder">
            <li class="to-label"><label><?php _e('Page Sub Title', 'westand'); ?></label></li>
            <li class="to-field">
                <input type="text" name="page_sub_title" value="<?php echo cs_allow_special_char($page_sub_title); ?>" />
            </li>
        </ul>
    </div>
    <div class="slider_options" id="ws_slider_options" style="display:<?php if ($header_banner_style == "flex_slider") echo 'inline"';
    else echo 'none'; ?>" >
        <ul class="form-elements noborder">
            <li class="to-label"><label><?php _e('Select Slider', 'westand'); ?></label></li>
            <li class="to-field">
                <select name="header_banner_flex_slider" class="dropdown">
    <?php
    $query = array('posts_per_page' => '-1', 'post_type' => 'cs_slider', 'orderby' => 'ID', 'post_status' => 'publish');
    $wp_query = new WP_Query($query);
    while ($wp_query->have_posts()) : $wp_query->the_post();
        ?>
                        <option <?php if ($post->post_name == $header_banner_flex_slider) echo "selected"; ?> value="<?php echo cs_allow_special_char($post->post_name);
        ; ?>"><?php the_title() ?></option>
        <?php
    endwhile;
    ?>
                </select>
                <p><?php _e('You can use already created slider OR create new slider', 'westand'); ?> <a href="<?php echo admin_url(); ?>/post-new.php?post_type=cs_slider" target="_blank"><?php _e('Click Here', 'westand'); ?></a>.</p>
            </li>
        </ul>
    </div>
    <ul class="form-elements  noborder" id="header_custom_slider" style=" <?php if (isset($header_banner_style) and $header_banner_style <> "custom_slider") echo "display:none";
    else "display:inline"; ?>" >
        <li class="to-label">
            <label><?php _e('Custom Slider Short Code', 'westand'); ?></label>
        </li>
        <li class="to-field">
            <input type="text" name="custom_slider_id" class="txtfield" value="<?php if (isset($custom_slider_id)) echo cs_allow_special_char($custom_slider_id); ?>" />
            <p><?php _e('Please enter the short code for Layer Slider OR Revolution Slider if already included in package. Otherwise buy Sliders from ', 'westand'); ?><a href="#" target="_blank"><?php _e('Codecanyon', 'westand'); ?></a>.<?php _e('But its optional', 'westand'); ?> </p>
        </li>
    </ul>

                    <?php
                }

                function meta_layout($default_theme_options_check = '') {

                    global $cs_xmlObject, $post;

                    if (empty($cs_xmlObject->sidebar_layout->cs_layout))
                        $cs_layout = "";
                    else
                        $cs_layout = $cs_xmlObject->sidebar_layout->cs_layout;

                    if (empty($cs_xmlObject->sidebar_layout->cs_sidebar_left))
                        $cs_sidebar_left = "";
                    else
                        $cs_sidebar_left = $cs_xmlObject->sidebar_layout->cs_sidebar_left;

                    if (empty($cs_xmlObject->sidebar_layout->cs_sidebar_right))
                        $cs_sidebar_right = "";
                    else
                        $cs_sidebar_right = $cs_xmlObject->sidebar_layout->cs_sidebar_right;

                    if (empty($cs_xmlObject->header_banner_style))
                        $header_banner_style = "";
                    else
                        $header_banner_style = $cs_xmlObject->header_banner_style;

                    if (empty($cs_xmlObject->header_banner_image))
                        $header_banner_image = "";
                    else
                        $header_banner_image = $cs_xmlObject->header_banner_image;

                    if (empty($cs_xmlObject->header_banner_flex_slider))
                        $header_banner_flex_slider = "";
                    else
                        $header_banner_flex_slider = $cs_xmlObject->header_banner_flex_slider;

                    if (empty($cs_xmlObject->custom_slider_id))
                        $custom_slider_id = "";
                    else
                        $custom_slider_id = htmlspecialchars($cs_xmlObject->custom_slider_id);

                    if (isset($cs_xmlObject->page_title)) {
                        $page_title = $cs_xmlObject->page_title;
                    } else {
                        $page_title = '';
                    }

                    if (isset($cs_xmlObject->page_sub_title)) {
                        $page_sub_title = $cs_xmlObject->page_sub_title;
                    } else {
                        $page_sub_title = '';
                    }
                    ?>
    <div class="clear"></div>
    <div class="elementhidden">
        <div class="clear"></div>
        <div class="theme-help">

            <h4 style="padding-bottom:0px;"><?php _e('Post/Page Sidebar Settings', 'westand'); ?></h4>

            <div class="clear"></div>

        </div>
        <ul class="form-elements">

            <li class="to-label">

                <label><?php _e('Select Layout', 'westand'); ?></label>

            </li>

            <li class="to-field">

                <div class="meta-input">

                    <div class='radio-image-wrapper'>

                        <input <?php if ($cs_layout == "none") echo "checked" ?> onclick="show_sidebar('none')" type="radio" name="cs_layout" class="radio" value="none" id="radio_1" />

                        <label for="radio_1">

                            <span class="ss"><img src="<?php echo get_template_directory_uri() ?>/images/admin/1.gif"  alt="image_url" /></span>

                            <span <?php if ($cs_layout == "none") echo "class='check-list'" ?> id="check-list"><img src="<?php echo get_template_directory_uri() ?>/images/admin/1-hover.gif" alt="image_url" /></span>

                        </label>

                    </div>

                    <div class='radio-image-wrapper'>

                        <input <?php if ($cs_layout == "right") echo "checked" ?> onclick="show_sidebar('right')" type="radio" name="cs_layout" class="radio" value="right" id="radio_2"  />

                        <label for="radio_2">

                            <span class="ss"><img src="<?php echo get_template_directory_uri() ?>/images/admin/2.gif" alt="image_url_gif" /></span>

                            <span <?php if ($cs_layout == "right") echo "class='check-list'" ?> id="check-list"><img src="<?php echo get_template_directory_uri() ?>/images/admin/2-hover.gif" alt="image_url" /></span>

                        </label>

                    </div>

                    <div class='radio-image-wrapper'>

                        <input <?php if ($cs_layout == "left") echo "checked" ?> onclick="show_sidebar('left')" type="radio" name="cs_layout" class="radio" value="left" id="radio_3" />

                        <label for="radio_3">

                            <span class="ss"><img src="<?php echo get_template_directory_uri() ?>/images/admin/3.gif" alt="image_url" /></span>

                            <span <?php if ($cs_layout == "left") echo "class='check-list'" ?> id="check-list"><img src="<?php echo get_template_directory_uri() ?>/images/admin/3-hover.gif" alt="image_url" /></span>

                        </label>

                    </div>

                </div>

            </li>

        </ul>

        <ul class="form-elements meta-body" style=" <?php if ($cs_sidebar_left == "") {
                        echo "display:none";
                    } else echo "display:block"; ?>" id="sidebar_left" >

            <li class="to-label">

                <label><?php _e('Select Left Sidebar', 'westand'); ?></label>

            </li>

            <li class="to-field">

                <select name="cs_sidebar_left" class="select_dropdown" id="page-option-choose-left-sidebar">

                    <?php
                    global $cs_theme_option;
                    //$cs_theme_option = get_option('cs_theme_option');

                    if (isset($cs_theme_option['sidebar']) and count($cs_theme_option['sidebar']) > 0) {

                        foreach ($cs_theme_option['sidebar'] as $sidebar) {
                            ?>

                            <option <?php if ($cs_sidebar_left == $sidebar) echo "selected"; ?> ><?php echo cs_allow_special_char($sidebar); ?></option>

            <?php
        }
    }
    ?>

                </select>
                <p> <?php _e('Add New Sidebar', 'westand'); ?> <a href="<?php echo admin_url(); ?>themes.php?page=cs_theme_options#tab-manage-sidebars-show" target="_blank"><?php _e('Click Here', 'westand'); ?></a></p>
            </li>

        </ul>

        <ul class="form-elements meta-body" style=" <?php if ($cs_sidebar_right == "") {
        echo "display:none";
    } else echo "display:block"; ?>" id="sidebar_right" >

            <li class="to-label">

                <label><?php _e('Select Right Sidebar', 'westand'); ?></label>

            </li>

            <li class="to-field">

                <select name="cs_sidebar_right" class="select_dropdown" id="page-option-choose-right-sidebar">

                    <?php
                    if (isset($cs_theme_option['sidebar']) and count($cs_theme_option['sidebar']) > 0) {

                        foreach ($cs_theme_option['sidebar'] as $sidebar) {
                            ?>

                            <option <?php if ($cs_sidebar_right == $sidebar) echo "selected"; ?> ><?php echo cs_allow_special_char($sidebar); ?></option>

            <?php
        }
    }
    ?>

                </select>
                <p><?php _e('Add New Sidebar', 'westand'); ?><a href="<?php echo admin_url(); ?>themes.php?page=cs_theme_options#tab-manage-sidebars-show" target="_blank"><?php _e('Click Here', 'westand'); ?></a></p>
                <input type="hidden" name="cs_orderby[]" value="meta_layout" />

            </li>

        </ul>

    </div>

    <div class="clear"></div>

    <?php
}

// side bar layout in pages, post and default page(theme options) end
// Default xml data save

function save_layout_xml($sxe) {


//
    if (empty($_POST['page_title']))
        $_POST['page_title'] = "";

    if (empty($_POST['cs_layout']))
        $_POST['cs_layout'] = "";

    if (empty($_POST['cs_sidebar_left']))
        $_POST['cs_sidebar_left'] = "";

    if (empty($_POST['cs_sidebar_right']))
        $_POST['cs_sidebar_right'] = "";

    if (empty($_POST['header_banner_style'])) {
        $_POST['header_banner_style'] = "";
    }
    if (empty($_POST['page_subheader_color'])) {
        $_POST['page_subheader_color'] = "";
    }
    if (empty($_POST['header_banner_image'])) {
        $_POST['header_banner_image'] = "";
    }
    if (empty($_POST['header_banner_flex_slider'])) {
        $_POST['header_banner_flex_slider'] = "";
    }
    if (empty($_POST['custom_slider_id'])) {
        $_POST['custom_slider_id'] = "";
    }


    $sxe->addChild('page_title', $_POST['page_title']);
    $sxe->addChild('page_sub_title', $_POST['page_sub_title']);
    $sxe->addChild('page_subheader_color', $_POST['page_subheader_color']);

    $sxe->addChild('header_banner_style', $_POST["header_banner_style"]);

    $sxe->addChild('header_banner_image', $_POST["header_banner_image"]);

    $sxe->addChild('header_banner_flex_slider', $_POST["header_banner_flex_slider"]);

    $sxe->addChild('custom_slider_id', htmlspecialchars($_POST["custom_slider_id"]));


    $sidebar_layout = $sxe->addChild('sidebar_layout');



    $sidebar_layout->addChild('cs_layout', $_POST["cs_layout"]);


    if ($_POST["cs_layout"] == "left") {

        $sidebar_layout->addChild('cs_sidebar_left', $_POST['cs_sidebar_left']);
    } else if ($_POST["cs_layout"] == "right") {

        $sidebar_layout->addChild('cs_sidebar_right', $_POST['cs_sidebar_right']);
    } else if ($_POST["cs_layout"] == "both_right" or $_POST["cs_layout"] == "both_left" or $_POST["cs_layout"] == "both") {

        $sidebar_layout->addChild('cs_sidebar_left', $_POST['cs_sidebar_left']);

        $sidebar_layout->addChild('cs_sidebar_right', $_POST['cs_sidebar_right']);
    }

    return $sxe;
}

function element_size_data_array_index($size) {

    if ($size == "" or $size == 100)
        return 0;

    else if ($size == 75)
        return 1;

    else if ($size == 67)
        return 2;

    else if ($size == 50)
        return 3;

    else if ($size == 33)
        return 4;

    else if ($size == 25)
        return 5;
}

// Show all Categories

function show_all_cats($parent, $separator, $selected = "", $taxonomy) {

    if ($parent == "") {

        global $wpdb;

        $parent = 0;
    } else
        $separator .= " &ndash; ";

    $args = array(
        'parent' => $parent,
        'hide_empty' => 0,
        'taxonomy' => $taxonomy
    );

    $categories = get_categories($args);

    foreach ($categories as $category) {
        ?>

        <option <?php if ($selected == $category->slug) echo "selected"; ?> value="<?php echo cs_allow_special_char($category->slug); ?>"><?php echo cs_allow_special_char($separator . $category->cat_name); ?></option>

        <?php
        show_all_cats($category->term_id, $separator, $selected, $taxonomy);
    }
}

// import demo xml file
if (!function_exists('cs_demo_importer')) {

    function cs_demo_importer() {
        $server_requirements = get_server_requirements();
        ?>
        <div class="cs-demo-data">
            <h2><?php _e('Import Demo Data', 'westand'); ?></h2>
            <div class="inn-text">

                <ul class="import-data">
                    <li><p><?php _e('Importing demo data helps to build site like the demo site by all means. It is the quickest way to setup theme. Following things happen when dummy data is imported', 'westand'); ?></p></li>
                    <li><?php _e('All wordpress settings will remain same and intact', 'westand'); ?> </li>
                    <li> <?php _e('Posts, pages and dummy images shown in demo will be imported', 'westand'); ?></li>
                    <li><?php _e('Only dummy images will be imported as all demo images have copy right restriction', 'westand'); ?> </li>
                    <li><?php _e('No existing posts, pages, categories, custom post types or any other data will be deleted or modified', 'westand'); ?> </li>
                    <li><?php _e('To proceed, please click "Import Demo Data" and wait for a while', 'westand'); ?></li>
                </ul>

                <ul class="importer-requirement">
                    <li><h3><?php _e('Server Requirements', 'westand'); ?></h3></li>
                    <?php if (!empty($server_requirements)) : ?>
                        <?php foreach ($server_requirements as $requirement) : ?>
                            <li>
                                <div class="pull-left">
                                    <div class="text-holder">
                                        <span class="text-bold text-uppercase"><?php echo $requirement['title']; ?></span>
                                        <span class="details"><?php echo $requirement['description']; ?></span>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <div class="importer-version">
                                        <span><?php echo $requirement['version']; ?></span>
                                        <i class="<?php echo $requirement['is_met'] ? 'icon-check-circle' : 'error icon-circle-with-cross'; ?>"></i>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

            </div>
            <form method="post">
                <ul class="westand-demo-images">
                    <li>
                        <input type="radio" id="politics" name="westand_demo" value="politics" class="hide" checked="checked">
                        <label for="politics">
                            <span><?php _e('Politics', 'westand'); ?></span>
                            <img src="<?php echo esc_url(DEMO_DATA_IMG_URL . 'politics.png'); ?>"></label>
                    </li>
                    <li>
                        <input type="radio" id="charity" name="westand_demo" value="charity" class="hide">
                        <label for="charity">
                            <span><?php _e('Charity', 'westand'); ?></span>
                            <img src="<?php echo esc_url(DEMO_DATA_IMG_URL . 'charity.png'); ?>"></label>
                    </li>
                    <li>
                        <input type="radio" id="church" name="westand_demo" value="church" class="hide">
                        <label for="church">
                            <span><?php _e('Church', 'westand'); ?></span>
                            <img src="<?php echo esc_url(DEMO_DATA_IMG_URL . 'church.png'); ?>"></label>
                    </li>

                </ul>



                <input name="reset"  type="submit" value="Import Demo Data" id="submit_btn" />
                <input type="hidden" name="demo" value="demo-data" />
            </form>
        </div>
        <?php
        if (isset($_REQUEST['demo']) && $_REQUEST['demo'] == 'demo-data') {
            require_once ABSPATH . 'wp-admin/includes/import.php';
            $westand_demo = isset($_REQUEST['westand_demo']) ? $_REQUEST['westand_demo'] : 'politics';
            $westand_demo_file = DEMO_DATA_URL . $westand_demo . '.xml';
            if (!defined('WP_LOAD_IMPORTERS'))
                define('WP_LOAD_IMPORTERS', true);
            $cs_demoimport_error = false;

            if (!class_exists('WP_Importer')) {
                $cs_import_class = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
                if (file_exists($cs_import_class)) {
                    require_once $cs_import_class;
                } else {
                    $cs_demoimport_error = true;
                }
            }

            if (!class_exists('WP_Import')) {
                $cs_import_class = get_template_directory() . '/include/importer/wordpress-importer.php';
                if (file_exists($cs_import_class))
                    require_once $cs_import_class;
                else
                    $cs_demoimport_error = true;
            }

            if ($cs_demoimport_error) {
                echo __('Error.', 'westand') . '</p>';
                die();
            } else {


                global $wpdb;
                $theme_mod_val = array();
                $term_exists = term_exists('main-menu', 'nav_menu');
                if (!$term_exists) {

                    $wpdb->insert(
                            $wpdb->terms, array(
                        'name' => 'Main Menu',
                        'slug' => 'main-menu',
                        'term_group' => 0
                            ), array(
                        '%s',
                        '%s',
                        '%d'
                            )
                    );
                    $insert_id = $wpdb->insert_id;
                    $theme_mod_val['main-menu'] = $insert_id;
                    $wpdb->insert(
                            $wpdb->term_taxonomy, array(
                        'term_id' => $insert_id,
                        'taxonomy' => 'nav_menu',
                        'description' => '',
                        'parent' => 0,
                        'count' => 0
                            ), array(
                        '%d',
                        '%s',
                        '%s',
                        '%d',
                        '%d'
                            )
                    );
                } else
                    $theme_mod_val['main-menu'] = $term_exists['term_id'];

                set_theme_mod('nav_menu_locations', $theme_mod_val);

                $home = get_page_by_title('Home');
                if ($home <> '' && get_option('page_on_front') == "0") {
                    update_option('page_on_front', $home->ID);
                    update_option('show_on_front', 'page');
                }
                
                $cs_theme_option    = get_option('cs_theme_option');
                $cs_theme_option['show_slider'] = 'on';
                $cs_theme_option['slider_type'] = 'post_slider';
                update_option('cs_theme_option', $cs_theme_option);
                

                $cs_demo_import = new WP_Import();
                $cs_demo_import->fetch_attachments = true;
                $cs_demo_import->import($westand_demo_file);

                // Menu Location
            }
        }
    }

}
// Shortcode Dropdown
add_action('media_buttons', 'cs_shortcode_dropdown', 11);

function cs_shortcode_dropdown() {
    $cs_shortcode_tags = array('accordion', 'button', 'column', 'divider', 'heading', 'icon', 'list', 'message_box', 'quote', 'testimonials', 'services', 'toogle', 'tabs', 'table', 'tooltip', 'video');

    $cs_shortcodes_list = '';

    echo '&nbsp;<select id="sc_select"><option>Shortcode</option>';
    foreach ($cs_shortcode_tags as $val) {

        $cs_shortcodes_list .= "<option value='" . $val . "'>" . $val . "</option>";
    }
    echo cs_allow_special_char($cs_shortcodes_list);
    echo '</select>';
}

add_action('admin_head', 'cs_button_js');

function cs_button_js() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            cs_shortocde_selection();
        });
    </script>
    <?php
}

if (!function_exists('get_server_requirements')) {

    /**
     * Return server requirements for importer
     *
     * @return	array	server resources requirements for importer
     */
    function get_server_requirements() {
        $post_max_size = ini_get('post_max_size');
        $post_max_size_val = str_replace('M', '', $post_max_size);
        $upload_max_filesize = ini_get('upload_max_filesize');
        $upload_max_filesize_val = str_replace('M', '', $upload_max_filesize);
        $memory_limit = ini_get('memory_limit');
        $memory_limit_val = str_replace('M', '', $memory_limit);
        $max_input_time = ini_get('max_input_time');
        $max_execution_time = ini_get('max_execution_time');
        $max_input_vars = ini_get('max_input_vars');
        $safe_mode = ini_get('safe_mode');
        $safe_mode = ( $safe_mode == '') ? 'OFF' : 'ON';


        $recommended_php_version = '7.0';
        $recommended_post_max_size = 128;
        $recommended_post_max_size_unit = 'M';
        $recommended_upload_max_filesize = 128;
        $recommended_upload_max_filesize_unit = 'M';
        $recommended_memory_limit = 256;

        $recommended_max_input_time = '300 or -1';
        $recommended_max_execution_time = '300 or 0';
        $recommended_max_input_vars = '5000 or above';
        $recommended_safe_mode = 'OFF';

        $recommended_memory_limit_unit = 'M';

        $server_requirements = array(
            array(
                'title' => 'Minimum PHP Version = ' . $recommended_php_version . ' ( Available ' . phpversion() . ' )',
                'version' => '',
                'is_met' => ( version_compare(phpversion(), $recommended_php_version, '>') ),
            ),
            array(
                'title' => 'post_max_size = ' . $recommended_post_max_size . $recommended_post_max_size_unit . ' ( Available ' . $post_max_size . ' )',
                'version' => '',
                'is_met' => ( $recommended_post_max_size <= $post_max_size_val ),
            ),
            array(
                'title' => 'upload_max_filesize = ' . $recommended_upload_max_filesize . $recommended_upload_max_filesize_unit . ' ( Available ' . $upload_max_filesize . ' )',
                'version' => '',
                'is_met' => ( $recommended_upload_max_filesize <= $upload_max_filesize_val ),
            ),
            array(
                'title' => 'max_input_time = ' . $recommended_max_input_time . ' ( Available ' . $max_input_time . ' )',
                'version' => '',
                'is_met' => ( $max_input_time == -1 || $max_input_time >= 300 ),
            ),
            array(
                'title' => 'max_execution_time = ' . $recommended_max_execution_time . ' ( Available ' . $max_execution_time . ' )',
                'version' => '',
                'is_met' => ( $max_execution_time == 0 || $max_execution_time >= 300 ),
            ),
            array(
                'title' => 'max_input_vars = ' . $recommended_max_input_vars . ' ( Available ' . $max_input_vars . ' )',
                'version' => '',
                'is_met' => ( $max_input_vars >= 5000 ),
            ),
        );
        return $server_requirements;
    }

}