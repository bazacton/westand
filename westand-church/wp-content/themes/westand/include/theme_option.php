<?php

function theme_option() {
    global $post, $cs_theme_option;
    //$cs_theme_option = get_option('cs_theme_option');
    ?>
    <link href="<?php echo get_template_directory_uri() ?>/css/admin/datePicker.css" rel="stylesheet" type="text/css" />
    <form id="frm" method="post" action="javascript:theme_option_save('<?php echo admin_url() ?>', '<?php echo get_template_directory_uri() ?>');">
        <div class="theme-wrap fullwidth">
            <div class="loading_div"></div>
            <div class="form-msg"></div>
            <div class="inner">
                <div class="row"> 
                    <!-- Left Column Start -->
                    <div class="col1">
                        <div class="logo"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/admin/logo.png" /></a></div>
                        <div class="arrowlistmenu" id="paginate-slider2">
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon g-setting">&nbsp;</span><?php _e('General Settings', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-color active"><a href="#tab-color" onClick="toggleDiv(this.hash);return false;"><?php _e('Color and Style', 'westand'); ?></a></li>
                                <li class="tab-logo"><a href="#tab-logo" onClick="toggleDiv(this.hash);return false;"><?php _e('Logo / Fav Icon', 'westand'); ?></a></li>
                                <li class="tab-head-scripts"><a href="#tab-head-scripts" onClick="toggleDiv(this.hash);return false;"><?php _e('Header Settings', 'westand'); ?></a></li>
                                <li class="tab-foot-setting"><a href="#tab-foot-setting" onClick="toggleDiv(this.hash);return false;"><?php _e('Footer Settings', 'westand'); ?></a></li>
                                <li class="tab-under-consturction"><a href="#tab-under-consturction" onClick="toggleDiv(this.hash);return false;"><?php _e('Under Constrution', 'westand'); ?></a></li>
                                <li class="tab-other"><a href="#tab-other" onClick="toggleDiv(this.hash);return false;"><?php _e('Other Settings', 'westand'); ?></a></li>

                                <li class="tab-api-key"><a href="#tab-api-key" onClick="toggleDiv(this.hash);return false;"><?php _e('API Settings', 'westand'); ?></a></li>

                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon h-setting">&nbsp;</span><?php _e('Home Page Settings', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-slider"><a href="#tab-slider" onClick="toggleDiv(this.hash);return false;"><?php _e('Slider', 'westand'); ?></a></li>

                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon h-setting">&nbsp;</span><?php _e('Donations', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-paypalapi"><a href="#tab-paypalapi" onClick="toggleDiv(this.hash);return false;"><?php _e('Paypal and Payment settings', 'westand'); ?></a></li>
                                <li class="tab-donationsbtns"><a href="#tab-donationsbtns" onClick="toggleDiv(this.hash);return false;"><?php _e('Model Window Buttons', 'westand'); ?></a></li>
                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon side-bar">&nbsp;</span><?php _e('Side Bars', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-manage-sidebars"><a href="#tab-manage-sidebars" onClick="toggleDiv(this.hash);return false;"><?php _e('Manage Sidebars', 'westand'); ?></a></li>
                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon slider-setting">&nbsp;</span><?php _e('Slider Setting', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-flex-slider"><a href="#tab-flex-slider" onClick="toggleDiv(this.hash);return false;"><?php _e('Flex Slider', 'westand'); ?></a></li>
                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon s-network">&nbsp;</span><?php _e('Sahre', 'westand'); ?><?php _e('Social Settings', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-social-network"><a href="#tab-social-network" onClick="toggleDiv(this.hash);return false;"><?php _e('Social Network', 'westand'); ?></a></li>
                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon languages">&nbsp;</span><?php _e('Language', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-upload-languages"><a href="#tab-upload-languages" onClick="toggleDiv(this.hash);return false;"><?php _e('Upload New Languages', 'westand'); ?></a></li>
                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon translation">&nbsp;</span><?php _e('Translation', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-cause-translation"><a href="#tab-cause-translation" onClick="toggleDiv(this.hash);return false;"><?php _e('Cause', 'westand'); ?></a></li>
                                <li class="tab-contact-translation"><a href="#tab-contact-translation" onClick="toggleDiv(this.hash);return false;"><?php _e('Contact', 'westand'); ?></a></li>
                                <li class="tab-other-translation"><a href="#tab-other-translation" onClick="toggleDiv(this.hash);return false;"><?php _e('Others', 'westand'); ?></a></li>
                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon default-pages">&nbsp;</span><?php _e('Default Pages', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li class="tab-default-pages"><a href="#tab-default-pages" onClick="toggleDiv(this.hash);return false;"><?php _e('Default Pages', 'westand'); ?></a></li>
                            </ul>
                            <h3 class="menuheader expandable"><a href="#"><span class="nav-icon default-pages">&nbsp;</span><?php _e('Backup Options', 'westand'); ?></a></h3>
                            <ul class="categoryitems">
                                <li><a href="#tab-import-export-backup" onClick="toggleDiv(this.hash);return false;"><?php _e('Theme Options Backup', 'westand'); ?></a></li> 
                                <li class="tab-import-export"><a onclick="cs_to_restore_default_option('<?php echo admin_url() ?>', '<?php echo get_template_directory_uri() ?>')"><?php _e('Restore Default', 'westand'); ?></a></li>

                            </ul>

                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- Left Column End -->
                    <div class="col2">
                        <input type="button" value="Reset Option" class="top_btn_reset" onclick="cs_to_restore_default_option('<?php echo admin_url() ?>', '<?php echo get_template_directory_uri() ?>')" />
                        <input type="submit" id="submit_btn" name="submit_btn" class="top_btn_save" value="Save All Settings" />
                        <!-- Color And Style Start -->
                        <div id="tab-color">
                            <div class="theme-header">
                                <h1><?php _e('General Settings', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Color And Styles', 'westand'); ?></h4>
                                <p><?php _e('Theme color scheme and styling setting', 'westand'); ?></p>
                            </div>

                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Select Color Scheme', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <div id="colorpickerwrapp">
                                        <?php
                                        $cs_color_array = array('#45b363', '#339a74', '#1d7f5b', '#3fb0c3', '#2293a6', '#137d8f', '#9374ae', '#775b8f', '#dca13a', '#c46d32', '#c44732',
                                            '#c44d55', '#425660', '#292f32'
                                        );
                                        foreach ($cs_color_array as $colors) {
                                            $active = '';
                                            if ($colors == $cs_theme_option['custom_color_scheme']) {
                                                $active = 'active';
                                            }
                                            echo '<span class="col-box ' . $active . '" data-color="' . $colors . '" style="background: ' . $colors . '"></span>';
                                        }
                                        ?>

                                    </div>

                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Custom Color Scheme', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="cs_custom_color_style" name="custom_color_scheme" value="<?php
                                    if (isset($cs_theme_option['custom_color_scheme'])) {
                                        echo cs_allow_special_char($cs_theme_option['custom_color_scheme']);
                                    }
                                    ?>" class="bg_color"  />
                                    <p><?php _e('Pick a custom color for Scheme of the theme', 'westand'); ?> e.g. #697e09</p>
                                </li>
                            </ul>
                            <div class="clear"></div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Layout Options', 'westand'); ?></h4>
                                <div class="clear"></div>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Layout Option', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <span id="wrapper_boxed_layoutoptions1"> <input type="radio" name="layout_option"  value="wrapper_boxed" <?php if (isset($cs_theme_option['layout_option']) && $cs_theme_option['layout_option'] == "wrapper_boxed") echo "checked" ?> class="styled" /></span>
                                    <label><?php _e('Boxed', 'westand'); ?></label>
                                    <span id="wrapper_boxed_layoutoptions2"><input type="radio" name="layout_option"  value="wrapper" <?php if (isset($cs_theme_option['layout_option']) && $cs_theme_option['layout_option'] == "wrapper") echo "checked" ?> class="styled" /></span>
                                    <label><?php _e('Wide', 'westand'); ?></label>
                                </li>
                            </ul>
                            <div id="layout-background-theme-options" <?php
                            if (isset($cs_theme_option['layout_option']) && $cs_theme_option['layout_option'] == "wrapper") {
                                echo 'style="display: none;"';
                            }
                            ?>	>
                                <div class="clear"></div>
                                <div class="theme-help">
                                    <h4 style="padding-bottom:0px;"><?php _e('Background Options', 'westand'); ?></h4>
                                    <div class="clear"></div>
                                </div>
                                <ul class="form-elements">
                                    <li class="to-label">
                                        <label><?php _e('Background Image', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <div class="meta-input pattern">
                                            <?php
                                            for ($i = 0; $i < 8; $i++) {
                                                ?>
                                                <div class='radio-image-wrapper'>
                                                    <input <?php if (isset($cs_theme_option['bg_img']) && $cs_theme_option['bg_img'] == $i) echo "checked" ?> onclick="select_bg()" type="radio" name="bg_img" class="radio" value="<?php echo cs_allow_special_char($i); ?>" />
                                                    <label for="radio_<?php echo cs_allow_special_char($i); ?>"> <span class="ss"><img src="<?php echo get_template_directory_uri() ?>/images/background/background<?php echo cs_allow_special_char($i) ?>.png" /></span> <span <?php if ($cs_theme_option['bg_img'] == $i) echo "class='check-list'" ?> id="check-list">&nbsp;</span> </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li class="full">&nbsp;</li>
                                    <li class="to-label">
                                        <label><?php _e('Background Image', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input id="bg_img_custom" name="bg_img_custom" value="<?php echo cs_allow_special_char($cs_theme_option['bg_img_custom']) ?>" type="text" class="small" />
                                        <input id="bg_img_custom" name="bg_img_custom" type="button" class="uploadfile left" value="Browse"/>
                                        <?php if ($cs_theme_option['bg_img_custom'] <> "") { ?>
                                            <div class="thumb-preview" id="bg_img_custom_img_div"> <img src="<?php echo cs_allow_special_char($cs_theme_option['bg_img_custom']) ?>" /> <a href="javascript:remove_image('bg_img_custom')" class="del">&nbsp;</a> </div>
                                        <?php } ?>
                                    </li>
                                    <li class="full">&nbsp;</li>
                                    <li class="to-label">
                                        <label><?php _e('Position', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input type="radio" name="bg_position" value="left" <?php if (isset($cs_theme_option['bg_position']) && $cs_theme_option['bg_position'] == "left") echo "checked" ?> class="styled" />
                                        <label><?php _e('Left', 'westand'); ?></label>
                                        <input type="radio" name="bg_position" value="center" <?php if (isset($cs_theme_option['bg_position']) && $cs_theme_option['bg_position'] == "center") echo "checked" ?> class="styled" />
                                        <label><?php _e('Center', 'westand'); ?></label>
                                        <input type="radio" name="bg_position" value="right" <?php if (isset($cs_theme_option['bg_position']) && $cs_theme_option['bg_position'] == "right") echo "checked" ?> class="styled" />
                                        <label><?php _e('Right', 'westand'); ?></label>
                                    </li>
                                    <li class="full">&nbsp;</li>
                                    <li class="to-label">
                                        <label><?php _e('Repeat', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input type="radio" name="bg_repeat" value="no-repeat" <?php if (isset($cs_theme_option['bg_repeat']) && $cs_theme_option['bg_repeat'] == "no-repeat") echo "checked" ?> class="styled" />
                                        <label><?php _e('No Repeat', 'westand'); ?></label>
                                        <input type="radio" name="bg_repeat" value="repeat" <?php if (isset($cs_theme_option['bg_repeat']) && $cs_theme_option['bg_repeat'] == "repeat") echo "checked" ?> class="styled" />
                                        <label><?php _e('Tile', 'westand'); ?></label>
                                        <input type="radio" name="bg_repeat" value="repeat-x" <?php if (isset($cs_theme_option['bg_repeat']) && $cs_theme_option['bg_repeat'] == "repeat-x") echo "checked" ?> class="styled" />
                                        <label><?php _e('Tile Horizontally', 'westand'); ?></label>
                                        <input type="radio" name="bg_repeat" value="repeat-y" <?php if (isset($cs_theme_option['bg_repeat']) && $cs_theme_option['bg_repeat'] == "repeat-y") echo "checked" ?> class="styled" />
                                        <label><?php _e('Tile Vertically', 'westand'); ?></label>
                                    </li>
                                    <li class="full">&nbsp;</li>
                                    <li class="to-label">
                                        <label><?php _e('Attachment', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input type="radio" name="bg_attach" value="scroll" <?php if (isset($cs_theme_option['bg_attach']) && $cs_theme_option['bg_attach'] == "scroll") echo "checked" ?> class="styled" />
                                        <label>Scroll</label>
                                        <input type="radio" name="bg_attach" value="fixed" <?php if (isset($cs_theme_option['bg_attach']) && $cs_theme_option['bg_attach'] == "fixed") echo "checked" ?> class="styled" />
                                        <label><?php _e('Fixed', 'westand'); ?></label>
                                    </li>
                                </ul>
                                <ul class="form-elements">
                                    <li class="to-label">
                                        <label><?php _e('Background Pattern', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <div class="meta-input pattern">
                                            <?php
                                            for ($i = 0; $i < 16; $i++) {
                                                ?>
                                                <div class='radio-image-wrapper'>
                                                    <input <?php if ($cs_theme_option['pattern_img'] == $i) echo "checked" ?> onclick="select_pattern()" type="radio" name="pattern_img" class="radio" value="<?php echo cs_allow_special_char($i); ?>" />
                                                    <label for="radio_<?php echo cs_allow_special_char($i); ?>"> <span class="ss"><img src="<?php echo get_template_directory_uri() ?>/images/pattern/pattern<?php echo cs_allow_special_char($i); ?>.png" /></span> <span <?php if ($cs_theme_option['pattern_img'] == $i) echo "class='check-list'" ?> id="check-list">&nbsp;</span> </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </li>
                                    <li class="full">&nbsp;</li>
                                    <li class="to-label">
                                        <label><?php _e('Background Pattern', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input id="custome_pattern" name="custome_pattern" value="<?php echo cs_allow_special_char($cs_theme_option['custome_pattern']); ?>" type="text" class="small" />
                                        <input id="custome_pattern" name="custome_pattern" type="button" class="uploadfile left" value="Browse"/>
                                        <?php if ($cs_theme_option['custome_pattern'] <> "") { ?>
                                            <div class="thumb-preview" id="custome_pattern_img_div"> <img src="<?php echo cs_allow_special_char($cs_theme_option['custome_pattern']); ?>" /> <a href="javascript:remove_image('custome_pattern')" class="del">&nbsp;</a> </div>
                                        <?php } ?>
                                    </li>
                                    <li class="full">&nbsp;</li>
                                    <li class="to-label">
                                        <label><?php _e('Background Color', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input type="text" name="bg_color" value="<?php echo cs_allow_special_char($cs_theme_option['bg_color']); ?>" class="bg_color" data-default-color="" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Color And Style End --> 
                        <!-- Logo Tabs -->
                        <div id="tab-logo" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Logo / Fav Icon Settings', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Logo / Fav Icon Settings', 'westand'); ?></h4>
                                <p><?php _e('Add your logo and fav icon', 'westand'); ?></p>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Upload Logo', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input id="logo" name="logo" value="<?php echo cs_allow_special_char($cs_theme_option['logo']); ?>" type="text" class="small {validate:{accept:'jpg|jpeg|gif|png|bmp'}}" />
                                    <input id="log" name="logo" type="button" class="uploadfile left" value="Browse"/>
                                    <?php if ($cs_theme_option['logo'] <> "") { ?>
                                        <div class="thumb-preview" id="logo_img_div"><img width="<?php echo cs_allow_special_char($cs_theme_option['logo_width']); ?>" height="<?php echo cs_allow_special_char($cs_theme_option['logo_height']); ?>" src="<?php echo cs_allow_special_char($cs_theme_option['logo']); ?>" /> <a href="javascript:remove_image('logo')" class="del">&nbsp;</a> </div>
                                    <?php } ?>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Width', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="logo_width" id="width-value" value="<?php echo cs_allow_special_char($cs_theme_option['logo_width']); ?>" class="vsmall" />
                                    <span class="short">px</span>
                                    <p><?php _e('Please enter the required size', 'westand'); ?></p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Height', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="logo_height" id="height-value" value="<?php echo cs_allow_special_char($cs_theme_option['logo_height']); ?>" class="vsmall" />
                                    <span class="short">px</span>
                                    <p><?php _e('Please enter the required size', 'westand'); ?></p>
                                </li>
                            </ul>

                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('FAV Icon', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input id="fav_icon" name="fav_icon" value="<?php echo cs_allow_special_char($cs_theme_option['fav_icon']); ?>" type="text" class="small {validate:{accept:'ico|png'}}" />
                                    <input id="fav_icon" name="fav_icon" type="button" class="uploadfile left" value="Browse" />
                                    <p><?php _e('Browse a small fav icon, only .ICO or .PNG format allowed', 'westand'); ?></p>
                                </li>
                            </ul>
                        </div>

                        <!-- Logo Tabs End --> 

                        <!-- Header Styles --> 

                        <!-- Header Script -->
                        <div id="tab-head-scripts" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Header Settings', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Header Settings', 'westand'); ?></h4>
                                <p><?php _e('Modify your header settings', 'westand'); ?></p>
                            </div>
                            <ul class="form-elements noborder header-bg">
                                <li class="to-label">
                                    <label><?php _e('Menu Background Color', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="menu_bg_color" value="<?php
                                    if (isset($cs_theme_option['menu_bg_color'])) {
                                        echo cs_allow_special_char($cs_theme_option['menu_bg_color']);
                                    }
                                    ?>" class="bg_color" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Menu Font Color', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="menu_font_color" value="<?php
                                    if (isset($cs_theme_option['menu_font_color'])) {
                                        echo cs_allow_special_char($cs_theme_option['menu_font_color']);
                                        ;
                                    }
                                    ?>" class="bg_color" />
                                </li>

                            </ul>

                            <?php
                            $wpmlsettings = get_option('icl_sitepress_settings');

                            if (function_exists('icl_object_id')) {
                                if (!isset($cs_theme_option['header_languages'])) {
                                    $cs_theme_option['header_languages'] = 'on';
                                }
                                ?>
                                <ul class="form-elements">
                                    <li class="full">&nbsp;</li>
                                    <li class="to-label">
                                        <label><?php _e('Header Languages', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input type="hidden" name="header_languages" value="" />
                                        <input type="checkbox" class="myClass" name="header_languages" <?php if ($cs_theme_option['header_languages'] == "on") echo "checked" ?> />
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <input type="hidden" name="header_languages" value="" />
                            <?php } ?>
                            <?php
                            if (function_exists('is_woocommerce')) {
                                if (!isset($cs_theme_option['header_cart'])) {
                                    $cs_theme_option['header_cart'] = 'on';
                                }
                                ?> 
                                <ul class="form-elements">
                                    <li class="to-label">
                                        <label><?php _e('Cart Count', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input type="hidden" name="header_cart" value=""/>
                                        <input type="checkbox" class="myClass" name="header_cart" <?php if ($cs_theme_option['header_cart'] == "on") echo "checked" ?>/>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <input type="hidden" name="header_cart" value=""/>
                            <?php } ?>



                            <ul class="form-elements donation-button-theme-options noborder">
                                <li class="to-label">
                                    <label><?php _e('Donation', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="header_donation_button" value="" />
                                    <input type="checkbox" class="myClass" name="header_donation_button" <?php if (isset($cs_theme_option['header_donation_button']) && $cs_theme_option['header_donation_button'] == "on") echo "checked" ?> />
                                </li>
                            </ul>
                            <ul class="form-elements donation-button-theme-options">
                                <li class="to-label">
                                    <label><?php _e('Donation Title', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="donation_btn_title" value="<?php if (isset($cs_theme_option['donation_btn_title']) && $cs_theme_option['donation_btn_title'] <> '') echo cs_allow_special_char($cs_theme_option['donation_btn_title']); ?>" class="vsmall" />

                                </li>
                            </ul>

                            <?php
                            $header_banner_style_default = $header_banner_image_default = $page_sub_title_default = $header_banner_flex_slider_default = $custom_slider_id_default = $page_subheader_color_default = '';
                            if (isset($cs_theme_option['header_banner_style_default']))
                                $header_banner_style_default = $cs_theme_option['header_banner_style_default'];
                            if (isset($cs_theme_option['page_subheader_color_default']))
                                $page_subheader_color_default = $cs_theme_option['page_subheader_color_default'];
                            if (isset($cs_theme_option['header_banner_image_default']))
                                $header_banner_image_default = $cs_theme_option['header_banner_image_default'];
                            if (isset($cs_theme_option['page_sub_title_default']))
                                $page_sub_title_default = $cs_theme_option['page_sub_title_default'];
                            if (isset($cs_theme_option['header_banner_flex_slider_default']))
                                $header_banner_flex_slider_default = $cs_theme_option['header_banner_flex_slider_default'];
                            if (isset($cs_theme_option['custom_slider_id_default']))
                                $custom_slider_id_default = $cs_theme_option['custom_slider_id_default'];
                            ?>
                            <ul class="form-elements noborder">
                                <li class="to-label"><label><?php _e('Sub Header Style', 'westand'); ?></label></li>
                                <li class="to-field">
                                    <select name="header_banner_style_default" class="dropdown" onchange="javascript:home_slider_header_toggle(this.value)">

                                        <option <?php
                                        if (isset($header_banner_style_default) and $header_banner_style_default == "breadcrumbs") {
                                            echo "selected";
                                        }
                                        ?> value="breadcrumbs" ><?php _e('Breadcrumbs', 'westand'); ?></option>
                                        <option <?php
                                        if (isset($header_banner_style_default) and $header_banner_style_default == "no-header") {
                                            echo "selected";
                                        }
                                        ?> value="no-header" ><?php _e('No Subheader', 'westand'); ?></option>
                                        <option <?php
                                        if (isset($header_banner_style_default) and $header_banner_style_default == "flex_slider") {
                                            echo "selected";
                                        }
                                        ?> value="flex_slider" ><?php _e('Flex Slider', 'westand'); ?></option>
                                        <option <?php
                                        if (isset($header_banner_style_default) and $header_banner_style_default == "custom_slider") {
                                            echo "selected";
                                        }
                                        ?> value="custom_slider" ><?php _e('Custom Slider', 'westand'); ?></option>
                                    </select>
                                    <p><?php _e('These settings will apply to all those pages or post where you select the Default Header Style', 'westand'); ?></p>
                                </li>
                            </ul>
                            <div id="header_custom_image" style="display:<?php
                            if ($header_banner_style_default == "breadcrumbs" || $header_banner_style_default == "")
                                echo 'inline"';
                            else
                                echo 'none';
                            ?>"  >
                                <ul class="form-elements  noborder">
                                    <li class="to-label"><label><?php _e('Sub-Header Background', 'westand'); ?></label></li>
                                    <li class="to-field">
                                        <input id="header_banner_image_default" name="header_banner_image_default" value="<?php echo cs_allow_special_char($header_banner_image_default); ?>" type="text" class="small" />
                                        <input id="header_banner_image_default" name="header_banner_image_default" type="button" class="uploadfile left" value="Browse"/>
                                        <p><?php _e('Default background can be changed by uploading', 'westand'); ?>(image size 1600*900)</p>
                                    </li>
                                </ul>
                                <ul class="form-elements">
                                    <li class="to-label"><label><?php _e('Page Sub Header Color', 'westand'); ?></label></li>
                                    <li class="to-field">
                                        <input type="text" name="page_subheader_color_default" class="bg_color" value="<?php echo cs_allow_special_char($page_subheader_color_default); ?>" />
                                    </li>
                                </ul>
                                <ul class="form-elements">
                                    <li class="to-label"><label><?php _e('Page Sub Title', 'westand'); ?></label></li>
                                    <li class="to-field">
                                        <input type="text" name="page_sub_title_default" value="<?php echo cs_allow_special_char($page_sub_title_default); ?>" />
                                    </li>
                                </ul>
                            </div>
                            <div class="slider_options" id="ws_slider_options" style="display:<?php
                            if ($header_banner_style_default == "flex_slider")
                                echo 'inline"';
                            else
                                echo 'none';
                            ?>" >
                                <ul class="form-elements">
                                    <li class="to-label"><label><?php _e('Select Slider', 'westand'); ?></label></li>
                                    <li class="to-field">
                                        <select name="header_banner_flex_slider_default" class="dropdown">
                                            <?php
                                            $query = array('posts_per_page' => '-1', 'post_type' => 'cs_slider', 'orderby' => 'ID', 'post_status' => 'publish');
                                            $wp_query = new WP_Query($query);
                                            while ($wp_query->have_posts()) : $wp_query->the_post();
                                                ?>
                                                <option <?php if ($post->post_name == $header_banner_flex_slider_default) echo "selected"; ?> value="<?php echo cs_allow_special_char($post->post_name); ?>"><?php the_title() ?></option>
                                                <?php
                                            endwhile;
                                            ?>
                                        </select>
                                        <p><?php _e('You can use already created slider OR create new slider', 'westand'); ?> <a href="<?php echo admin_url(); ?>/post-new.php?post_type=cs_slider" target="_blank"><?php _e('Click Here', 'westand'); ?></a>.</p>
                                    </li>
                                </ul>
                            </div>
                            <ul class="form-elements" id="header_custom_slider" style=" <?php
                            if (isset($header_banner_style_default) and $header_banner_style_default <> "custom_slider")
                                echo "display:none";
                            else
                                "display:inline";
                            ?>" >
                                <li class="to-label">
                                    <label><?php _e('Custom Slider Short Code', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="custom_slider_id_default" class="txtfield" value="<?php if (isset($custom_slider_id_default)) echo cs_allow_special_char($custom_slider_id_default); ?>" />
                                    <p><?php _e('Please enter the short code for Layer Slider OR Revolution Slider if already included in package. Otherwise buy Sliders from', 'westand'); ?> <a href="#" target="_blank"><?php _e('Codecanyon', 'westand'); ?></a>.<?php _e('But its optional', 'westand'); ?> </p>
                                </li>
                            </ul> 

                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Header Code', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea rows="" cols="" class="header_code_indent" name="header_code"><?php echo cs_allow_special_char($cs_theme_option['header_code']); ?></textarea>
                                    <p><?php _e('Paste your Html or Css Code here', 'westand'); ?></p>
                                </li>
                            </ul>

                        </div>
                        <!-- Header Script End --> 
                        <!-- Footer Settings -->
                        <div id="tab-foot-setting" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Footer Settings', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Footer Settings', 'westand'); ?></h4>
                                <p><?php _e('Add footer setting detail', 'westand'); ?></p>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Footer Widget Background Color', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="footer_widgetarea_bg_color" name="footer_widgetarea_bg_color" value="<?php
                                           if (isset($cs_theme_option['footer_widgetarea_bg_color'])) {
                                               echo cs_allow_special_char($cs_theme_option['footer_widgetarea_bg_color']);
                                           }
                                           ?>" class="bg_color"  />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Footer Background Color', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="footer_bg_color" name="footer_bg_color" value="<?php
                                           if (isset($cs_theme_option['footer_bg_color'])) {
                                               echo cs_allow_special_char($cs_theme_option['footer_bg_color']);
                                           }
                                           ?>" class="bg_color"  />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Custom Copyright', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea rows="2" cols="4" name="copyright"><?php echo cs_allow_special_char($cs_theme_option['copyright']) ?></textarea>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Powered By Text', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea rows="2" cols="4" name="powered_by"><?php echo cs_allow_special_char($cs_theme_option['powered_by']); ?></textarea>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Analytics Code', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea rows="" cols="" class="analytics_indent" name="analytics"><?php echo cs_allow_special_char($cs_theme_option['analytics']); ?></textarea>
                                    <p><?php _e('Paste your Google Analytics (or other) tracking code here', 'westand'); ?>.<br />
    <?php _e('This will be added into the footer template of your theme', 'westand'); ?>.</p>
                                </li>
                            </ul>
                        </div>
                        <!-- Footer Settings End --> 
                        <!-- Maintenance Page Settings start -->
                        <div id="tab-under-consturction" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Maintenance Page Settings', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Maintenance Page Settings', 'westand'); ?></h4>
                                <p><?php _e('Add maintenance page setting detail', 'westand'); ?>.</p>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Maintenance Page', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="under-construction" value="" />
                                    <input type="checkbox" class="myClass" name="under-construction" <?php if ($cs_theme_option['under-construction'] == "on") echo "checked" ?> />
                                    <p><?php _e('Set the maintenance page On/Off', 'westand'); ?></p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Show Logo', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="showlogo" value="" />
                                    <input type="checkbox" class="myClass" name="showlogo" <?php if ($cs_theme_option['showlogo'] == "on") echo "checked" ?> />
                                    <p><?php _e('Set show logo On/Off', 'westand'); ?></p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Maintenance Text', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea rows="2" cols="4" name="under_construction_text"><?php echo cs_allow_special_char($cs_theme_option['under_construction_text']); ?></textarea>

                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Launch Date', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="launch_date" name="launch_date" value="<?php
                                    if ($cs_theme_option['launch_date'] == '') {
                                        echo gmdate("Y-m-d");
                                    } else {
                                        echo cs_allow_special_char($cs_theme_option['launch_date']);
                                    }
                                    ?>" />

                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Social Network', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="socialnetwork" value="" />
                                    <input type="checkbox" class="myClass" name="socialnetwork" <?php if ($cs_theme_option['socialnetwork'] == "on") echo "checked" ?> />
                                    <p><?php _e('Set social network On/Off', 'westand'); ?></p>
                                </li>
                            </ul>
                        </div>
                        <!-- Maintenance Page Settings end --> 
                        <!-- Other Settings Start -->
                        <div id="tab-other" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Other Setting', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Other Setting', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Sticky Menu', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="header_sticky_menu" value="" />
                                    <input type="checkbox" class="myClass" name="header_sticky_menu" <?php if ($cs_theme_option['header_sticky_menu'] == "on") echo "checked" ?> />
                                    <p><?php _e('Set the Main Navigation Sticky On/Off', 'westand'); ?></p>
                                </li>
                            </ul>

                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Responsive', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="responsive" value="" />
                                    <input type="checkbox" class="myClass" name="responsive" <?php if ($cs_theme_option['responsive'] == "on") echo "checked" ?> />
                                    <p><?php _e('Set the responsive On/Off', 'westand'); ?></p>
                                </li>
                            </ul>

                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Color Switcher', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="color_switcher" value="" />
                                    <input type="checkbox" class="myClass" name="color_switcher" <?php if ($cs_theme_option['color_switcher'] == "on") echo "checked" ?> />
                                    <p><?php _e('Set the color switcher for user demo', 'westand'); ?></p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Translation Switcher', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="trans_switcher" value="" />
                                    <input type="checkbox" class="myClass" name="trans_switcher" <?php if ($cs_theme_option['trans_switcher'] == "on") echo "checked" ?> />
                                    <p><?php _e('Set the translation switcher for user demo', 'westand'); ?></p>
                                </li>
                            </ul>
                        </div>

                        <div id="tab-paypalapi" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Paypal & Payments', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Paypal & Payments Setting', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Paypal Email', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="paypal_email" name="paypal_email" value="<?php echo cs_allow_special_char($cs_theme_option['paypal_email']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Paypal Ipn URL', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="paypal_ipn_url" name="paypal_ipn_url" value="<?php echo cs_allow_special_char($cs_theme_option['paypal_ipn_url']); ?>"/>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Currency', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                        <?php $currency_array = array('U.S. Dollar' => 'USD', 'Australian Dollar' => 'AUD', 'Brazilian Real' => 'BRL', 'Canadian Dollar' => 'CAD', 'Czech Koruna' => 'CZK', 'Danish Krone' => 'DKK', 'Euro' => 'EUR', 'Hong Kong Dollar' => 'HKD', 'Hungarian Forint' => 'HUF', 'Israeli New Sheqel' => 'ILS', 'Japanese Yen' => 'JPY', 'Malaysian Ringgit' => 'MYR', 'Mexican Peso' => 'MXN', 'Norwegian Krone' => 'NOK', 'New Zealand Dollar' => 'NZD', 'Philippine Peso' => 'PHP', 'Polish Zloty' => 'PLN', 'Pound Sterling' => 'GBP', 'Singapore Dollar' => 'SGD', 'Swedish Krona' => 'SEK', 'Swiss Franc' => 'CHF', 'Taiwan New Dollar' => 'TWD', 'Thai Baht' => 'THB', 'Turkish Lira' => 'TRY'); ?>
                                    <select name="paypal_currency">
                                        <?php foreach ($currency_array as $key => $val) { ?>
                                            <option value="<?php echo cs_allow_special_char($val); ?>" <?php
                                                    if ($cs_theme_option['paypal_currency'] == $val) {
                                                        echo ' selected="selected"';
                                                    }
                                                    ?>><?php echo cs_allow_special_char($key); ?></option>
    <?php } ?>
                                    </select>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Currency Sign', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="paypal_currency_sign" name="paypal_currency_sign" value="<?php
                                    if ($cs_theme_option['paypal_currency_sign'] == '') {
                                        echo '$';
                                    } else {
                                        echo cs_allow_special_char($cs_theme_option['paypal_currency_sign']);
                                    }
                                    ?>"/>
                                    <p><?php _e('Use Currency Sign', 'westand'); ?> eg: &pound;,&yen;</p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Paypal Payments', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="paypal_payments" name="paypal_payments" value="<?php
                                    if (isset($cs_theme_option['paypal_payments']) && $cs_theme_option['paypal_payments'] == '') {
                                        echo '';
                                    } else {
                                        echo cs_allow_special_char($cs_theme_option['paypal_payments']);
                                    }
                                    ?>"/>
                                    <p><?php _e('Please enter payments by comma seperated', 'westand'); ?>.</p>
                                </li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Model Window Heading', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea name="header_support_button_text_heading3" cols="20" rows="8"><?php
                                        if (isset($cs_theme_option['header_support_button_text_heading3'])) {
                                            echo cs_allow_special_char($cs_theme_option['header_support_button_text_heading3']);
                                        }
                                        ?></textarea>

                                </li>
                            </ul>
                        </div>

                        <div id="tab-donationsbtns" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Support Buttons', 'westand'); ?></h1>
                            </div>
                            <div class="clear"></div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Tab 1', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Donation Title', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_title3" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_title3'])) echo cs_allow_special_char($cs_theme_option['header_support_button_title3']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Fontawsome Icon', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_icon3" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_icon3'])) echo cs_allow_special_char($cs_theme_option['header_support_button_icon3']); ?>" />
                                    <p><?php _e('Put Fontawsome icon url. You can get fontawsome icons from fontawsome website', 'westand'); ?></p>
                                </li>
                            </ul>

                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Button Text', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_text3" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_text3'])) echo cs_allow_special_char($cs_theme_option['header_support_button_text3']); ?>" />
                                </li>
                            </ul>

                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Cause', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <select name="header_support_button_url3" class="dropdown">
                                        <option value="">Select Cause</option>
                                        <?php
                                        $args_cause = array(
                                            'posts_per_page' => "-1",
                                            'post_type' => 'cs_cause',
                                            'post_status' => 'publish',
                                            'meta_key' => 'cs_cause_percentage_amount',
                                            'meta_value' => "100",
                                            'meta_compare' => ">",
                                            'orderby' => 'meta_value',
                                            'order' => 'ASC',
                                        );
                                        //  $query = array( 'posts_per_page' => '-1', 'post_type' => 'cs_cause', 'orderby'=>'ID', 'post_status' => 'publish' );
                                        $wp_query = new WP_Query($args_cause);
                                        while ($wp_query->have_posts()) : $wp_query->the_post();
                                            ?>
                                            <option <?php if ($post->post_name == $cs_theme_option['header_support_button_url3']) echo "selected"; ?> value="<?php echo cs_allow_special_char($post->post_name); ?>"><?php the_title() ?></option>
        <?php
    endwhile;
    ?>
                                    </select>

                                </li>
                            </ul>
                            <div class="clear"></div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Tab 2', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Join Our Movement Title', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_title1" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_title1'])) echo cs_allow_special_char($cs_theme_option['header_support_button_title1']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Fontawsome Icon', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_icon1" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_icon1'])) echo cs_allow_special_char($cs_theme_option['header_support_button_icon1']); ?>" />
                                    <p><?php _e('Put Fontawsome icon url. You can get fontawsome icons from fontawsome', 'westand'); ?> </a></p>
                                </li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Button Text', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_text1" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_text1'])) echo cs_allow_special_char($cs_theme_option['header_support_button_text1']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('URL', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_url1" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_url1'])) echo cs_allow_special_char($cs_theme_option['header_support_button_url1']); ?>" />
                                </li>
                            </ul>
                            <div class="clear"></div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Tab 3', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Become Volunteer Title', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_title2" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_title2'])) echo cs_allow_special_char($cs_theme_option['header_support_button_title2']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Fontawsome Icon', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_icon2" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_icon2'])) echo cs_allow_special_char($cs_theme_option['header_support_button_icon2']); ?>" />
                                    <p><?php _e('Put Fontawsome icon url. You can get fontawsome icons from fontawsome website', 'westand'); ?></a></p>
                                </li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Button Text', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_text2" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_text2'])) echo cs_allow_special_char($cs_theme_option['header_support_button_text2']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements noborder">
                                <li class="to-label">
                                    <label><?php _e('Button URL', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="header_support_button_url2" class="txtfield" value="<?php if (isset($cs_theme_option['header_support_button_url2'])) echo cs_allow_special_char($cs_theme_option['header_support_button_url2']); ?>" />
                                </li>
                            </ul>
                        </div> 
                        <!-- Other Settings End --> 

                        <!-- API Settings Start -->
                        <div id="tab-api-key" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('API Setting', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('API Setting', 'westand'); ?></h4>
                            </div>
                            
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Google API Key', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="google_api_key" name="google_api_key" value="<?php
                                    if (isset($cs_theme_option['google_api_key'])) {
                                        echo cs_allow_special_char($cs_theme_option['google_api_key']);
                                    } else {
                                        $cs_theme_option['google_api_key'] = '';
                                    }
                                    ?>" />
                                </li>
                            </ul>
                            
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('MailChimp Key', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" id="mailchimp_key" name="mailchimp_key" value="<?php
                                    if (isset($cs_theme_option['mailchimp_key'])) {
                                        echo cs_allow_special_char($cs_theme_option['mailchimp_key']);
                                    } else {
                                        $cs_theme_option['mailchimp_key'] = '';
                                    }
                                    ?>" />
                                    <p><?php echo __('Enter a valid MailChimp API key here to get started. Once you\'ve done that, you can use the MailChimp Widget from the Widgets menu. You will need to have at least MailChimp list set up before the using the widget.', 'westand') . __(' You can get your mailchimp activation key', 'westand') . ' <u><a href="' . get_admin_url() . 'https://login.mailchimp.com/">' . __('here', 'westand') . '</a></u>' ?> 				
                                    </p>
                                </li>
                            </ul>
                            <div class="clear"></div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Twitter API Setting', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Cache Time Limit', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="cache_limit_time" value="" />
                                    <input type="text" id="cache_limit_time" name="cache_limit_time" value="<?php echo isset($cs_theme_option['cache_limit_time']) ? $cs_theme_option['cache_limit_time'] : ''; ?>"  class="{validate:{required:true}}"/>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Number of tweet', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="tweet_num_post" value="" />
                                    <input type="text" id="tweet_num_post" name="tweet_num_post" value="<?php echo isset($cs_theme_option['tweet_num_post']) ? $cs_theme_option['tweet_num_post'] : ''; ?>"  class="{validate:{required:true}}"/>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Date Time Formate', 'westand') ?></label>
                                </li>
                                <li class="to-field">
                                    <select name="twitter_datetime_formate" class="dropdown" id="cs_twitter_datetime_formate" onchange="javascript:home_breadcrumb_toggle(this.value)">
                                        <option <?php
                                            if (isset($cs_theme_option['twitter_datetime_formate']) && $cs_theme_option['twitter_datetime_formate'] == "default") {
                                                echo "selected";
                                            }
                                            ?> value="default" ><?php _e('Displays November 06 2012', 'westand') ?></option>
                                        <option <?php
                                            if (isset($cs_theme_option['twitter_datetime_formate']) && $cs_theme_option['twitter_datetime_formate'] == "eng_suff") {
                                                echo "selected";
                                            }
                                            ?> value="eng_suff" ><?php _e('Displays 6th November', 'westand') ?></option>
                                        <option <?php
                                            if (isset($cs_theme_option['twitter_datetime_formate']) && $cs_theme_option['twitter_datetime_formate'] == "ddmm") {
                                                echo "selected";
                                            }
                                            ?> value="ddmm" ><?php _e('Displays 06 Nov', 'westand') ?></option>
                                        <option <?php
                                            if (isset($cs_theme_option['twitter_datetime_formate']) && $cs_theme_option['twitter_datetime_formate'] == "ddmmyy") {
                                                echo "selected";
                                            }
                                            ?> value="ddmmyy" ><?php _e('Displays 06 Nov 2012', 'westand') ?></option>
                                        <option <?php
                                            if (isset($cs_theme_option['twitter_datetime_formate']) && $cs_theme_option['twitter_datetime_formate'] == "full_date") {
                                                echo "selected";
                                            }
                                            ?> value="full_date" ><?php _e('Displays Tues 06 Nov 2012', 'westand') ?></option>
                                        <option <?php
                                            if (isset($cs_theme_option['twitter_datetime_formate']) && $cs_theme_option['twitter_datetime_formate'] == "time_since") {
                                                echo "selected";
                                            }
                                            ?> value="time_since" ><?php _e('Displays in hours, minutes etc', 'westand') ?></option>
                                    </select>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Consumer Key', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="consumer_key" value="" />
                                    <input type="text" id="consumer_key" name="consumer_key" value="<?php
                                           if (isset($cs_theme_option['consumer_key'])) {
                                               echo cs_allow_special_char($cs_theme_option['consumer_key']);
                                           }
                                           ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Consumer Secret', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="consumer_secret" value="" />
                                    <input type="text" id="consumer_secret" name="consumer_secret" value="<?php
                                           if (isset($cs_theme_option['consumer_secret'])) {
                                               echo cs_allow_special_char($cs_theme_option['consumer_secret']);
                                           }
                                           ?>"/>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Access Token', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="access_token" value="" />
                                    <input type="text" id="access_token" name="access_token" value="<?php
                                           if (isset($cs_theme_option['access_token'])) {
                                               echo cs_allow_special_char($cs_theme_option['access_token']);
                                           }
                                           ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Access Token Secret', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="access_token_secret" value="" />
                                    <input type="text" id="access_token_secret" name="access_token_secret" value="<?php
                                           if (isset($cs_theme_option['access_token_secret'])) {
                                               echo cs_allow_special_char($cs_theme_option['access_token_secret']);
                                           }
                                           ?>" />
                                </li>
                            </ul>
                        </div>


                        <!-- API Settings end -->
                        <div id="tab-slider" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Home Page Slider', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Home Page Slider', 'westand'); ?></h4>
                                <p><?php _e('Edit home page slider settings', 'westand'); ?></p>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Show Slider', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="show_slider" value="" />
                                    <input type="checkbox" class="myClass" name="show_slider" <?php if (isset($cs_theme_option['show_slider']) and $cs_theme_option['show_slider'] == "on") echo "checked" ?> />
                                    <p><?php _e('Switch it on if you want to show slider at home page. If you switch it off it will not show slider at home page', 'westand'); ?></p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label"><label><?php _e('Choose SliderType', 'westand'); ?></label></li>
                                <li class="to-field">
                                    <select name="slider_type" class="dropdown" onchange="javascript:home_slider_toggle(this.value)">
                                        <option <?php
                                            if (isset($cs_theme_option['slider_type']) and $cs_theme_option['slider_type'] == "post_slider") {
                                                echo "selected";
                                            }
                                            ?> value="post_slider" ><?php _e('Post Slider', 'westand'); ?></option>
                                        <option <?php
                                            if (isset($cs_theme_option['slider_type']) and $cs_theme_option['slider_type'] == "custom") {
                                                echo "selected";
                                            }
                                            ?> value="custom" ><?php _e('Custom Slider', 'westand'); ?></option>
                                    </select>
                                </li>
                            </ul>


                            <div class="form-elements" id="post_sliders"  style=" <?php
                                 if ($cs_theme_option['slider_type'] <> "post_slider")
                                     echo "display:none";
                                 else
                                     "display:inline";
                                 ?>">
                                <ul class="form-elements">
                                    <li class="to-label">
                                        <label><?php _e('Select Post Category For posts', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <select name="cs_slider_blog_cat" class="dropdown">

                                            <option value="0"><?php _e('-- Select Category --', 'westand'); ?></option>

    <?php show_all_cats('', '', $cs_theme_option['cs_slider_blog_cat'], "category"); ?>

                                        </select>

                                    </li>
                                </ul>
                                <ul class="form-elements">
                                    <li class="to-label">
                                        <label><?php _e('No of Posts', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input type="text" name="slider_no_posts" class="txtfield" value="<?php if (isset($cs_theme_option['slider_no_posts'])) echo cs_allow_special_char($cs_theme_option['slider_no_posts']); ?>" />
                                    </li>
                                </ul>
                                <ul class="form-elements">
                                    <li class="to-label">
                                        <label><?php _e('Show Slider Pagination', 'westand'); ?></label>
                                    </li>
                                    <li class="to-field">
                                        <input type="hidden" name="show_slider_pagination" value="" />
                                        <input type="checkbox" class="myClass" name="show_slider_pagination" <?php if (isset($cs_theme_option['show_slider_pagination']) and $cs_theme_option['show_slider_pagination'] == "on") echo "checked" ?> />
                                        <p><?php _e('Switch it on if you want to show slider pagination at home page. If you switch it off it will not show slider at home page', 'westand'); ?></p>
                                    </li>
                                </ul>
                            </div>


                            <ul class="form-elements" id="custom_slider" style=" <?php
    if (isset($cs_theme_option['slider_type']) and $cs_theme_option['slider_type'] <> "custom")
        echo "display:none";
    else
        "display:inline";
    ?>" >
                                <li class="to-label">
                                    <label><?php _e('Custom Slider Short Code', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="slider_id" class="txtfield" value="<?php if (isset($cs_theme_option['slider_id'])) echo cs_allow_special_char($cs_theme_option['slider_id']); ?>" />
                                    <p>><?php _e('Please enter the short code for Layer Slider OR Revolution Slider if already included in package. Otherwise buy Sliders from', 'westand'); ?> <a href="#" target="_blank"><?php _e('Codecanyon', 'westand'); ?></a>.<?php _e('But its optional', 'westand'); ?> </p>
                                </li>
                            </ul>


                        </div>

                        <div id="tab-manage-sidebars" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Manage Sidebars', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Manage Sidebars', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Sidebar Name', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input class="small" type="text" name="sidebar_input" id="sidebar_input" style="width:420px;" />
                                    <input type="button" value="Add Sidebar" onclick="javascript:add_sidebar()" />
                                    <p><?php _e('Please enter the desired title of sidebar', 'westand'); ?></p>
                                </li>
                            </ul>
                            <div class="clear"></div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Already Added Sidebars', 'westand'); ?></h4>
                                <div class="clear"></div>
                            </div>
                            <div class="boxes">
                                <table class="to-table" border="0" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php _e('Sider Bar Name', 'westand'); ?></th>
                                            <th class="centr"><?php _e('Actions', 'westand'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="sidebar_area">
                                        <?php
                                        if (isset($cs_theme_option['sidebar']) and count($cs_theme_option['sidebar']) > 0) {
                                            $cs_counter_sidebar = rand(10000, 20000);
                                            foreach ($cs_theme_option['sidebar'] as $sidebar) {
                                                $cs_counter_sidebar++;
                                                echo '<tr id="' . $cs_counter_sidebar . '">';
                                                echo '<td><input type="hidden" name="sidebar[]" value="' . $sidebar . '" />' . $sidebar . '</td>';
                                                echo '<td class="centr"> <a onclick="javascript:return confirm(\'Are you sure! You want to delete this\')" href="javascript:cs_div_remove(' . $cs_counter_sidebar . ')">Del</a> </td>';
                                                echo '</tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="tab-flex-slider" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Flex Slider', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Flex Slider Options', 'westand'); ?></h4>
                                <p><?php _e('Configure Flex Slider setting', 'westand'); ?></p>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Effects', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <select class="dropdown" name="flex_effect">
                                        <option <?php
                                        if (isset($cs_theme_option['flex_effect']) and $cs_theme_option['flex_effect'] == "fade") {
                                            echo "selected";
                                        }
                                        ?> value="fade" ><?php _e('Fade', 'westand'); ?></option>
                                        <option <?php
                                        if (isset($cs_theme_option['flex_effect']) and $cs_theme_option['flex_effect'] == "slide") {
                                            echo "selected";
                                        }
                                        ?> value="slide" ><?php _e('Slide', 'westand'); ?></option>
                                    </select>
                                    <p><?php _e('Please select Effect for flex Slider', 'westand'); ?></p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Auto Play', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="hidden" name="flex_auto_play" value="" />
                                    <input type="checkbox" name="flex_auto_play" <?php
                                if (isset($cs_theme_option['flex_auto_play']) and $cs_theme_option['flex_auto_play'] == "on") {
                                    echo "checked";
                                }
                                ?> class="myClass" />
                                    <p><?php _e('If true, the slideshow will start running on page load', 'westand'); ?></p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Animation Speed', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="flex_animation_speed" size="5" class="{validate:{required:true}} bar" value="<?php if (isset($cs_theme_option['flex_animation_speed'])) echo cs_allow_special_char($cs_theme_option['flex_animation_speed']); ?>" />
                                    <p><?php _e('How long the slideshow transition takes (in milliseconds)', 'westand'); ?></p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Pause Time', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="flex_pause_time" size="5" class="{validate:{required:true}} bar" value="<?php if (isset($cs_theme_option['flex_pause_time'])) echo cs_allow_special_char($cs_theme_option['flex_pause_time']); ?>" />
                                    <p><?php _e('Resume slideshow after user interaction (in milliseconds)', 'westand'); ?></p>
                                </li>
                            </ul>
                        </div>
                        <div id="tab-social-network" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Social Settings', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Social Network', 'westand'); ?></h4>
                                <p><?php _e('Edit Social Network', 'westand'); ?></p>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Section Title', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="social_net_title" value="<?php if (isset($cs_theme_option['social_net_title'])) echo cs_allow_special_char($cs_theme_option['social_net_title']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Icon Path', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input id="social_net_icon_path_input" type="text" class="small" onblur="javascript:update_image('social_net_icon_path_input_img_div')" />
                                    <input id="social_net_icon_path_input" name="social_net_icon_path_input" type="button" class="uploadfile left" value="Browse"/>
                                </li>
                                <li class="full">&nbsp;</li>
                                <li class="to-label">
                                    <label><?php _e('Awesome Font', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input class="small" type="text" id="social_net_awesome_input" style="width:420px;" />
                                    <p><?php _e('Put Awesome Font Code like "icon-facebook".', 'westand'); ?></p>
                                </li>

                                <li class="full">&nbsp;</li>
                                <li class="to-label">
                                    <label><?php _e('URL', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input class="small" type="text" id="social_net_url_input" style="width:420px;" />
                                    <p><?php _e('Please enter full URL', 'westand'); ?></p>
                                </li>
                                <li class="full">&nbsp;</li>
                                <li class="to-label">
                                    <label><?php _e('Title', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input class="small" type="text" id="social_net_tooltip_input" style="width:420px;" />
                                    <p><?php _e('Please enter text for icon tooltip', 'westand'); ?></p>
                                </li>
                                <li class="full">&nbsp;</li>
                                <li class="to-label"></li>
                                <li class="to-field">
                                    <input type="button" value="Add" onclick="javascript:cs_add_social_icon('<?php echo admin_url() ?>')" />
                                </li>
                            </ul>
                            <div class="clear"></div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Already Added Social Icons', 'westand'); ?></h4>
                                <div class="clear"></div>
                            </div>
                            <div class="boxes">
                                <table class="to-table" border="0" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><?php _e('Icon Path', 'westand'); ?></th>
                                            <th><?php _e('URL', 'westand'); ?></th>
                                            <th class="centr"><?php _e('Actions', 'westand'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody id="social_network_area">
                                        <?php
                                        if (isset($cs_theme_option['social_net_url']) and count($cs_theme_option['social_net_url']) > 0) {
                                            wp_enqueue_style('font-awesome_css', get_template_directory_uri() . '/css/font-awesome.css');
                                            // Register stylesheet
                                            // Apply IE conditionals
                                            // Enqueue stylesheet
                                            $cs_counter_social_network = rand(10000, 20000);
                                            $i = 0;
                                            //print_r($cs_theme_option['social_net_url']);
                                            foreach ($cs_theme_option['social_net_url'] as $val) {
                                                //print_r($cs_theme_option['social_net_color_input'][$i]);
                                                $cs_counter_social_network++;
                                                echo '<tr id="del_' . $cs_counter_social_network . '">';
                                                if (isset($cs_theme_option['social_net_awesome'][$i]) && $cs_theme_option['social_net_awesome'][$i] <> '') {
                                                    echo '<td><i class="fa ' . $cs_theme_option['social_net_awesome'][$i] . ' fa-2x"></td>';
                                                } else {
                                                    echo '<td><img width="50" src="' . $cs_theme_option['social_net_icon_path'][$i] . '"></td>';
                                                }
                                                echo '<td>' . $val . '</td>';
                                                echo '<td class="centr"> 
											<a onclick="javascript:return confirm(\'Are you sure! You want to delete this\')" href="javascript:social_icon_del(' . $cs_counter_social_network . ')">Del</a>
											| <a href="javascript:cs_toggle(' . $cs_counter_social_network . ')">Edit</a>
										</td>';
                                                echo '</tr>';
                                                ?>
                                                <tr id="<?php echo cs_allow_special_char($cs_counter_social_network); ?>" style="display:none">
                                                    <td colspan="3"><ul class="form-elements">
                                                            <li class="to-label">
                                                                <label><?php _e('Icon Path', 'westand'); ?></label>
                                                            </li>
                                                            <li class="to-field">
                                                                <input id="social_net_icon_path<?php echo cs_allow_special_char($cs_counter_social_network); ?>" name="social_net_icon_path[]" value="<?php echo cs_allow_special_char($cs_theme_option['social_net_icon_path'][$i]); ?>" type="text" class="small" />
                                                            </li>
                                                            <li><a onclick="cs_toggle('<?php echo cs_allow_special_char($cs_counter_social_network); ?>')"><img src="<?php echo get_template_directory_uri() ?>/images/admin/close-red.png" /></a></li>
                                                            <li class="full">&nbsp;</li>
                                                            <li class="to-label">
                                                                <label><?php _e('Awesome Font', 'westand'); ?></label>
                                                            </li>
                                                            <li class="to-field">
                                                                <input class="small" type="text" id="social_net_awesome" name="social_net_awesome[]" value="<?php echo cs_allow_special_char($cs_theme_option['social_net_awesome'][$i]); ?>" style="width:420px;" />
                                                                <p><?php _e('Put Awesome Font Code like "icon-flag".', 'westand'); ?></p>
                                                            </li>
                                                            <li class="full">&nbsp;</li>
                                                            <li class="to-label">
                                                                <label><?php _e('URL', 'westand'); ?></label>
                                                            </li>
                                                            <li class="to-field">
                                                                <input class="small" type="text" id="social_net_url" name="social_net_url[]" value="<?php echo cs_allow_special_char($val); ?>" style="width:420px;" />
                                                                <p><?php _e('Please enter full URL', 'westand'); ?></p>
                                                            </li>
                                                            <li class="full">&nbsp;</li>
                                                            <li class="to-label">
                                                                <label>Title</label>
                                                            </li>
                                                            <li class="to-field">
                                                                <input class="small" type="text" id="social_net_tooltip" name="social_net_tooltip[]" value="<?php echo cs_allow_special_char($cs_theme_option['social_net_tooltip'][$i]); ?>" style="width:420px;" />
                                                                <p><?php _e('Please enter text for icon tooltip', 'westand'); ?></p>
                                                            </li>
                                                        </ul></td>
                                                </tr>
            <?php
            $i++;
        }
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="tab-default-pages" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Default Pages', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Default Pages Settings', 'westand'); ?></h4>
                                <p><?php _e('Manage Default Pages (Archive, Search, Categories, Tags and Author Pages)', 'westand'); ?></p>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Pagination', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <select name="pagination" class="dropdown" onchange="cs_toggle('record_per_page')">
                                        <option <?php if (isset($cs_theme_option['pagination']) and $cs_theme_option['pagination'] == "Show Pagination") echo "selected"; ?> ><?php _e('Show Pagination', 'westand'); ?></option>
                                        <option <?php if (isset($cs_theme_option['pagination']) and $cs_theme_option['pagination'] == "Single Page") echo "selected"; ?> ><?php _e('Single Page', 'westand'); ?></option>
                                    </select>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Exerpt Length', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="default_excerpt_length" value="<?php if (isset($cs_theme_option['default_excerpt_length'])) echo cs_allow_special_char($cs_theme_option['default_excerpt_length']); ?>" />
                                </li>
                            </ul>

                            <?php
                            global $cs_xmlObject;
                            $cs_xmlObject = new stdClass();
                            $cs_xmlObject->sidebar_layout = new stdClass();

                            if (isset($cs_theme_option['header_banner_style'])) {
                                $cs_xmlObject->header_banner_style = $cs_theme_option['header_banner_style'];
                            } else {
                                $cs_xmlObject->header_banner_style = '';
                            }
                            if (isset($cs_theme_option['page_subheader_color'])) {
                                $cs_xmlObject->page_subheader_color = $cs_theme_option['page_subheader_color'];
                            } else {
                                $cs_xmlObject->page_subheader_color = '';
                            }

                            if (isset($cs_theme_option['header_banner_image'])) {
                                $cs_xmlObject->header_banner_image = $cs_theme_option['header_banner_image'];
                            } else {
                                $cs_xmlObject->header_banner_image = '';
                            }
                            if (isset($cs_theme_option['header_banner_flex_slider'])) {
                                $cs_xmlObject->header_banner_flex_slider = $cs_theme_option['header_banner_flex_slider'];
                            } else {
                                $cs_xmlObject->header_banner_flex_slider = '';
                            }
                            if (isset($cs_theme_option['custom_slider_id'])) {
                                $cs_xmlObject->custom_slider_id = $cs_theme_option['custom_slider_id'];
                            } else {
                                $cs_xmlObject->custom_slider_id = '';
                            }




                            if (isset($cs_theme_option['cs_layout'])) {
                                $cs_xmlObject->sidebar_layout->cs_layout = $cs_theme_option['cs_layout'];
                            } else {
                                $cs_xmlObject->sidebar_layout->cs_layout = '';
                            }
                            if (isset($cs_theme_option['cs_sidebar_left'])) {
                                $cs_xmlObject->sidebar_layout->cs_sidebar_left = $cs_theme_option['cs_sidebar_left'];
                            } else {
                                $cs_xmlObject->sidebar_layout->cs_sidebar_left = '';
                            }
                            if (isset($cs_theme_option['cs_sidebar_right'])) {
                                $cs_xmlObject->sidebar_layout->cs_sidebar_right = $cs_theme_option['cs_sidebar_right'];
                            } else {
                                $cs_xmlObject->sidebar_layout->cs_sidebar_right = '';
                            }
                            if (isset($cs_theme_option['cs_layout'])) {
                                if ($cs_theme_option['cs_layout'] == "none") {
                                    $cs_xmlObject->sidebar_layout->cs_sidebar_left = '';
                                    $cs_xmlObject->sidebar_layout->cs_sidebar_right = '';
                                } else if ($cs_theme_option['cs_layout'] == "left") {
                                    $cs_xmlObject->sidebar_layout->cs_sidebar_right = '';
                                } else if ($cs_theme_option['cs_layout'] == "right") {
                                    $cs_xmlObject->sidebar_layout->cs_sidebar_left = '';
                                }
                            }
                            subheader_meta_layout();
                            meta_layout('default');
                            ?>
                        </div>

                        <div id="tab-upload-languages" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Upload New Language', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Upload New Language', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Upload Language (MO File)', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <div class="fileinputs">
                                        <input type="file" class="file" size="78" name="mofile" id="mofile" />
                                        <div class="fakefile">
                                            <input type="text" />
                                            <button><?php _e('Browse', 'westand'); ?></button>
                                        </div>
                                    </div>
                                    <p><?php _e('Please upload new language file (MO format only). It will be uploaded in your themes languages folder.', 'westand'); ?> </p>
                                    <p><?php _e('Download MO files from', 'westand'); ?> <a target="_blank" href="http://translate.wordpress.org/projects/wp/">http://translate.wordpress.org/projects/wp/</a> </p>
                                    <p>
                                        <button type="button" id="upload_btn"><?php _e('Upload Files!', 'westand'); ?></button>
                                    </p>
                                </li>
                            </ul>
                            <ul id="image-list">
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Already Uploaded Languages', 'westand'); ?></label>
                                </li>
                                <li class="to-field"> <strong>
                                        <?php
                                        $cs_counter = 0;
                                        foreach (glob(get_template_directory() . "/languages/*.mo") as $filename) {
                                            $cs_counter++;
                                            $val = str_replace(get_template_directory() . "/languages/", "", $filename);
                                            echo "<p>" . $cs_counter . ". " . str_replace(".mo", "", $val) . "</p>";
                                        }
                                        ?>
                                    </strong>
                                </li>
                                <p><?php _e('Please copy the language name, open config.php file, find WPLANG constant and set its value by replacing the language name.', 'westand'); ?> </p>

                                <p><strong><?php _e('Language Translations', 'westand'); ?></strong><br/><?php _e('All of our Themes are able to be translated into any language. The process of translating the theme is a user responsibility. The following instructions are given as guidance.', 'westand'); ?> </p>
                                <ul class="lnag-listing">

                                    <li>
                                        <?php _e('1. Open wp-config.php and replace this: define', 'westand'); ?>('WPLANG', '');<?php _e('with this (subsitute the language string (bg_BG) with your own!): define', 'westand'); ?>('WPLANG', 'bg_BG');
                                    </li>



                                    <li>
                                        <?php _e('2. Download and install POEDIT', 'westand'); ?> 
                                    </li>
                                    <li>
                                        <?php _e('3. Connect to your site -> open your theme/languages directory', 'westand'); ?> 
                                    </li>
                                    <li>
                                        <?php _e('4. Download the default.po file and open it with POEDIT.', 'westand'); ?> 
                                    </li>
                                    <li>
                                        <?php _e('5. Translate file and save it as bg_BG (the file name must match with the string you inserted into wp-config.php)', 'westand'); ?> 
                                    </li>
                                    <li>
    <?php _e('6. Two files will be generated after save. bg_BG.po and bg_BG.mo', 'westand'); ?> 
                                    </li>
                                    <li>
    <?php _e(' 7. Upload the .mo and .po files into wp-content/themes/your-theme/languages folder', 'westand'); ?> 
                                    </li>


                                    </li>
                                </ul>
                            </ul>
                            </ul>
                        </div>

                        <div id="tab-upload-languages" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Manage Languages', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Upload Languages', 'westand'); ?></h4>
                                <p><?php _e('Upload new language', 'westand'); ?></p>
                            </div>
                        </div>

                        <div id="tab-cause-translation" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Cause Translation', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Cause Translation', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Raised', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="cause_raised" value="<?php
                                if (isset($cs_theme_option['cause_raised'])) {
                                    echo cs_allow_special_char($cs_theme_option['cause_raised']);
                                }
                                ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('End Date', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="cause_end_date" value="<?php
                                if (isset($cs_theme_option['cause_end_date'])) {
                                    echo cs_allow_special_char($cs_theme_option['cause_end_date']);
                                }
                                ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Goal', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="cause_goal" value="<?php
                                if (isset($cs_theme_option['cause_goal'])) {
                                    echo cs_allow_special_char($cs_theme_option['cause_goal']);
                                }
                                ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Close', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="cause_status" value="<?php
                                if (isset($cs_theme_option['cause_status'])) {
                                    echo cs_allow_special_char($cs_theme_option['cause_status']);
                                }
                                ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Donors', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="cause_donors" value="<?php
                                if (isset($cs_theme_option['cause_donors'])) {
                                    echo cs_allow_special_char($cs_theme_option['cause_donors']);
                                }
                                ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Donation', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="cause_donation" value="<?php
                                if (isset($cs_theme_option['cause_donation'])) {
                                    echo cs_allow_special_char($cs_theme_option['cause_donation']);
                                }
                                ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Donate Now', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="cause_donate" value="<?php
                                if (isset($cs_theme_option['cause_donate'])) {
                                    echo cs_allow_special_char($cs_theme_option['cause_donate']);
                                }
                                ?>" />
                                </li>
                            </ul>

                        </div>


                        <div id="tab-contact-translation" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Contact Translation', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Contact Translation', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('First Name', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="res_first_name" value="<?php if (isset($cs_theme_option['res_first_name'])) echo cs_allow_special_char($cs_theme_option['res_first_name']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Last Name', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="res_last_name" value="<?php if (isset($cs_theme_option['res_last_name'])) echo cs_allow_special_char($cs_theme_option['res_last_name']) ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Subject', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_subject" value="<?php if (isset($cs_theme_option['trans_subject'])) echo cs_allow_special_char($cs_theme_option['trans_subject']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Message', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_message" value="<?php if (isset($cs_theme_option['trans_message'])) echo cs_allow_special_char($cs_theme_option['trans_message']); ?>" />
                                </li>
                            </ul>
                        </div>
                        <div id="tab-other-translation" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Other Translation', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4 style="padding-bottom:0px;"><?php _e('Other Translation', 'westand'); ?></h4>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('404 Content', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea name="trans_content_404"><?php if (isset($cs_theme_option['trans_content_404'])) echo cs_allow_special_char($cs_theme_option['trans_content_404']); ?></textarea>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Share Now', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_share_this_post" value="<?php if (isset($cs_theme_option['trans_share_this_post'])) echo cs_allow_special_char($cs_theme_option['trans_share_this_post']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Current Page', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_current" value="<?php if (isset($cs_theme_option['trans_current'])) echo cs_allow_special_char($cs_theme_option['trans_current']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Likes', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_likes" value="<?php if (isset($cs_theme_option['trans_likes'])) echo cs_allow_special_char($cs_theme_option['trans_likes']) ?>" />
                                </li>
                            </ul>

                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Sort By', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_sortby" value="<?php if (isset($cs_theme_option['trans_sortby'])) echo cs_allow_special_char($cs_theme_option['trans_sortby']) ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Featured', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_featured" value="<?php if (isset($cs_theme_option['trans_featured'])) echo cs_allow_special_char($cs_theme_option['trans_featured']) ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Read More', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_read_more" value="<?php if (isset($cs_theme_option['trans_read_more'])) echo cs_allow_special_char($cs_theme_option['trans_read_more']); ?>" />
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('View All', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="text" name="trans_view_all" value="<?php if (isset($cs_theme_option['trans_view_all'])) echo cs_allow_special_char($cs_theme_option['trans_view_all']); ?>" />
                                </li>
                            </ul>
                        </div>

                        <!-- import export Start -->
                        <div id="tab-import-export-backup" style="display:none;">
                            <div class="theme-header">
                                <h1><?php _e('Backup Options', 'westand'); ?></h1>
                            </div>
                            <div class="theme-help">
                                <h4><?php _e('Backup Options', 'westand'); ?></h4>
                                <p><?php _e('Theme Options Backup and restore settings', 'westand'); ?></p>
                            </div>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Last Backup Taken on', 'westand'); ?></label>
                                </li>
                                <li class="to-field"> <strong><span id="last_backup_taken">
                                            <?php
                                            if (get_option('cs_theme_option_backup_time')) {
                                                echo get_option('cs_theme_option_backup_time');
                                            } else {
                                                echo "Not Taken Yet";
                                            }
                                            ?>
                                        </span></strong> </li>
                                <li class="full">&nbsp;</li>
                                <li class="to-label">
                                    <label><?php _e('Take Backup', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="button" value="Take Backup" onclick="cs_to_backup('<?php echo admin_url() ?>', '<?php echo get_template_directory_uri() ?>')" />
                                    <p><?php _e('Take the Backup of your current theme options, it will replace the old backup if you have already taken', 'westand'); ?></p>
                                </li>
                                <li class="full">&nbsp;</li>
                                <li class="to-label">
                                    <label><?php _e('Restore Backup', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <input type="button" value="Restore Backup" onclick="cs_to_backup_restore('<?php echo admin_url() ?>', '<?php echo get_template_directory_uri() ?>')" />
                                    <p><?php _e('Restore your last backup taken (It will be replaced on your curernt theme options)', 'westand'); ?>.</p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Current Theme Option Data', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea id="theme_option_data"  readonly="readonly" onclick="this.select()"><?php
                                    if (function_exists('base_64_encode')) {
                                        echo base_64_encode(serialize($cs_theme_option));
                                    }
                                    ?></textarea>
                                    <p><?php _e('You can copy your current theme data in a text file and import it later by replacing the above text', 'westand'); ?>.</p>
                                </li>
                            </ul>
                            <ul class="form-elements">
                                <li class="to-label">
                                    <label><?php _e('Import Theme Option Data', 'westand'); ?></label>
                                </li>
                                <li class="to-field">
                                    <textarea id="theme_option_data_import" name="theme_option_data_import"></textarea>
                                    <p><?php _e('You can paste theme option backup data', 'westand'); ?>.</p>
                                    <p><input type="button" value="Import This Data" onclick="cs_to_import_export_option('<?php echo admin_url() ?>', '<?php echo get_template_directory_uri() ?>')" /></p>
                                </li>
                            </ul>
                        </div>

                        <!-- import / export end --> 

                    </div>
                    <div class="clear"></div>
                    <!-- Right Column End --> 
                </div>
                <div class="footer">
                    <input type="button" value="Reset Option" class="bottom_btn_reset" onclick="cs_to_restore_default('<?php echo admin_url() ?>', '<?php echo get_template_directory_uri() ?>')" />

                    <input type="submit" id="submit_btn" name="submit_btn" class="bottom_btn_save" value="Save All Settings" />
                    <input type="hidden" name="action" value="theme_option_save" />
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/admin/select.js"></script> 
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/admin/functions.js"></script> 
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/admin/jquery.validate.metadata.js"></script> 
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/admin/jquery.validate.js"></script> 
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/admin/ddaccordion.js"></script> 
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/admin/prettyCheckable.js"></script> 
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/scripts/admin/jquery.timepicker.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/admin/jquery.ui.datepicker.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/admin/jquery.ui.datepicker.theme.css">
    <script type="text/javascript">
                        jQuery(document).ready(function ($) {
                            $('.bg_color').wpColorPicker();

                            $('textarea.header_code_indent').keydown(function (e) {
                                if (e.keyCode == 9) {
                                    var start = $(this).get(0).selectionStart;
                                    $(this).val($(this).val().substring(0, start) + "    " + $(this).val().substring($(this).get(0).selectionEnd));
                                    $(this).get(0).selectionStart = $(this).get(0).selectionEnd = start + 4;
                                    return false;
                                }
                            });

                            $('textarea.analytics_indent').keydown(function (e) {
                                if (e.keyCode == 9) {
                                    var start = $(this).get(0).selectionStart;
                                    $(this).val($(this).val().substring(0, start) + "    " + $(this).val().substring($(this).get(0).selectionEnd));
                                    $(this).get(0).selectionStart = $(this).get(0).selectionEnd = start + 4;
                                    return false;
                                }
                            });


                        });
                        function load_default_settings(id) {
                            jQuery("#" + id + " input.button.wp-picker-default").trigger('click');
                            jQuery("#" + id + " input[type='checkbox'].myClass").each(function (index) {
                                var da = jQuery(this).data('default-header');
                                var ch = jQuery(this).next().hasClass("checked")
                                if ((da == 'on') && (!ch)) {
                                    jQuery(this).next().trigger('click');
                                }
                                if ((da == 'off') && (ch)) {
                                    jQuery(this).next().trigger('click');
                                }
                            });
                            jQuery("#" + id + " input[type='text'].vsmall").each(function (index) {
                                var da = jQuery(this).data('default-header');
                                jQuery(this).val(da);

                            });
                            jQuery("#" + id + " .to-field input.small").each(function (index) {
                                var da = jQuery(this).data('default-header');
                                jQuery(this).val(da);
                                jQuery(this).parent().find(".thumb-preview").find('img').attr("src", da)
                            });
                            jQuery("#" + id + " textarea").each(function (index) {
                                var da = jQuery(this).data('default-header');
                                jQuery(this).val(da);

                            });
                            jQuery("#" + id + " select").each(function (index) {

                                var da = jQuery(this).data('default-header');
                                jQuery(this).find("option[value='" + da + "']").attr("selected", "selected");

                            });

                        }
    </script> 
    <script type="text/javascript">
        jQuery(function ($) {
            $("#launch_date").datepicker({
                defaultDate: "+1w",
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                numberOfMonths: 1,
                onSelect: function (selectedDate) {
                    $("#launch_date").datepicker("option", "minDate", selectedDate);
                }
            });
        });
        function toggleDiv(id)
        {
            jQuery('.col2').children().hide();
            jQuery(id).show();
            location.hash = id + "-show";
            var link = id.replace('#', '');
            jQuery('.categoryitems li').removeClass('active');
            jQuery(".menuheader.expandable").removeClass('openheader');
            jQuery(".categoryitems").hide();
            jQuery("." + link).addClass('active');
            jQuery("." + link).parent("ul").show().prev().addClass("openheader");

        }
        jQuery(document).ready(function () {
            jQuery(".categoryitems").hide();
            jQuery(".categoryitems:first").show();
            jQuery(".menuheader:first").addClass("openheader");
            jQuery(document).on("click", ".menuheader", function (event) {
                if (jQuery(this).hasClass('openheader')) {
                    jQuery(".menuheader").removeClass("openheader");
                    jQuery(this).next().slideUp(200);
                    return false;
                }
                jQuery(".menuheader").removeClass("openheader");
                jQuery(this).addClass("openheader");
                jQuery(".categoryitems").slideUp(200);
                jQuery(this).next().slideDown(200);
                return false;
            });
            var hash = window.location.hash.substring(1);
            var id = hash.split("-show")[0];
            if (id) {
                jQuery('.col2').children().hide();
                jQuery("#" + id).show();
                jQuery('.categoryitems li').removeClass('active');
                jQuery(".menuheader.expandable").removeClass('openheader');
                jQuery(".categoryitems").hide();
                jQuery("." + id).addClass('active');
                jQuery("." + id).parent("ul").slideDown(300).prev().addClass("openheader");

            }
        });

        var counter_sidebar = 0;
        function add_sidebar() {
            counter_sidebar++;
            var sidebar_input = jQuery("#sidebar_input").val();
            if (sidebar_input != "") {
                jQuery("#sidebar_area").append('<tr id="' + counter_sidebar + '"> \
                                <td><input type="hidden" name="sidebar[]" value="' + sidebar_input + '" />' + sidebar_input + '</td> \
                                <td class="centr"> <a onclick="javascript:return confirm(\'Are you sure! You want to delete this\')" href="javascript:cs_div_remove(' + counter_sidebar + ')">Del</a> </td> \
                            </tr>');
                jQuery("#sidebar_input").val("");
            }
        }
        jQuery().ready(function ($) {
            var container = $('div.container');
            // validate the form when it is submitted
            var validator = $("#frm").validate({
                errorContainer: container,
                errorLabelContainer: $(container),
                errorElement: 'span',
                errorClass: 'ele-error',
                meta: "validate"
            });
        });
        jQuery(document).ready(function ($) {
            var consoleTimeout;
            $('.minicolors').each(function () {
                $(this).minicolors({
                    change: function (hex, opacity) {
                        // Generate text to show in console
                        text = hex ? hex : 'transparent';
                        if (opacity)
                            text += ', ' + opacity;
                        text += ' / ' + $(this).minicolors('rgbaString');
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            jQuery(document).on("click", "#colorpickerwrapp span.col-box", function (event) {
                var a = jQuery(this).data('color');
                jQuery("#cs_custom_color_style").val(a);
                jQuery('.wp-color-result').css('background-color', a);
                jQuery("#colorpickerwrapp span.col-box").removeClass('active');
                jQuery(this).addClass("active");
            });
        });
    </script>
<?php } ?>
