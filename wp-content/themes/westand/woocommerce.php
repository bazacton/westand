<?php
get_header();
/* * *************** Shop Page ***************** */
if (is_shop()) {
    $cs_shop_id = wc_get_page_id('shop');
    $cs_meta_page = cs_meta_shop_page('cs_page_builder', $cs_shop_id);
    if (post_password_required($cs_shop_id)) {
        echo '<div class="rich_editor_text">' . cs_password_form() . '</div>';
    } else {
        if (count($cs_meta_page) > 0)  {                           
            if (isset($cs_meta_page->sidebar_layout->cs_layout) && $cs_meta_page->sidebar_layout->cs_layout <> '' and $cs_meta_page->sidebar_layout->cs_layout <> "none" and $cs_meta_page->sidebar_layout->cs_layout == 'left') :
                ?>
                <aside class="col-md-3">
                    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($cs_meta_page->sidebar_layout->cs_sidebar_left)) : endif; ?>
                </aside>
            <?php endif; ?>
            <div class="<?php echo cs_meta_content_class(); ?>">
                <?php
                wp_reset_query();
                if (have_posts()) :
                    echo "<div class='cs_shop_wrap'>";
                    woocommerce_content();
                    echo "</div>";
                endif;
                global $cs_counter_node;
                foreach ($cs_meta_page->children() as $cs_node) {
                    if ($cs_node->getName() == "blog") {
                        $cs_counter_node++;
                        $layout = $cs_meta_page->sidebar_layout->cs_layout;
                        get_template_part('page_blog', 'page');
                    } else if ($cs_node->getName() == "gallery") {
                        $cs_counter_node++;
                        if ($cs_node->album <> "" and $cs_node->album <> "0") {
                            get_template_part('page_gallery', 'page');
                        }
                    } else if ($cs_node->getName() == "event") {
                        $cs_counter_node++;
                        if ($cs_node->cs_event_category <> "") {
                            get_template_part('page_event', 'page');
                        }
                    } elseif ($cs_node->getName() == "cause") {
                        $cs_counter_node++;
                        get_template_part('page_cause', 'page');
                    } else if ($cs_node->getName() == "slider" and $cs_node->slider_view == "content") {
                        $cs_counter_node++;
                        get_template_part('page_slider', 'page');
                    } elseif ($cs_node->getName() == "contact") {
                        $cs_counter_node++;
                        get_template_part('page_contact', 'page');
                    } else if ($cs_node->getName() == "team") {
                        $cs_counter_node++;
                        get_template_part('page_team', 'page');
                    } elseif ($cs_node->getName() == "accordions") {
                        $cs_counter_node++;
                        cs_accordions_page();
                    } elseif ($cs_node->getName() == "tabs") {
                        $cs_counter_node++;
                        echo cs_tabs_page();
                    } elseif ($cs_node->getName() == "services") {
                        $cs_counter_node++;
                        cs_services_page();
                    } elseif ($cs_node->getName() == "video") {
                        $cs_counter_node++;
                        echo cs_video_page();
                    } elseif ($cs_node->getName() == "quote") {
                        $cs_counter_node++;
                        echo cs_quote_page();
                    } elseif ($cs_node->getName() == "column") {
                        $cs_counter_node++;
                        cs_column_page();
                    } elseif ($cs_node->getName() == "map") {
                        $cs_counter_node++;
                        echo cs_map_page();
                    } elseif ($cs_node->getName() == "parallax") {
                        $cs_counter_node++;
                        get_template_part('page_parallax', 'page');
                    }
                }
            }
            if (comments_open()) :
                comments_template('', true);
            endif;
            ?>
        </div>
            <?php if (isset($cs_meta_page->sidebar_layout->cs_layout) && $cs_meta_page->sidebar_layout->cs_layout <> '' and $cs_meta_page->sidebar_layout->cs_layout <> "none" and $cs_meta_page->sidebar_layout->cs_layout == 'right') : ?>
            <aside class="col-md-3">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($cs_meta_page->sidebar_layout->cs_sidebar_right)) : endif; ?>
            </aside>
            <?php
            endif;
        } //post password else end here
    }
    /*     * *************** Single Page ***************** */

    else if (is_single()) {
        $cs_layout = "col-md-12";

        if (have_posts()) :

            $post_xml = get_post_meta($post->ID, "product", true);

            if ($post_xml <> "") {

                $cs_xmlObject = new SimpleXMLElement($post_xml);

                $sub_title = $cs_xmlObject->sub_title;
                $cs_layout = $cs_xmlObject->sidebar_layout->cs_layout;
                $cs_sidebar_left = $cs_xmlObject->sidebar_layout->cs_sidebar_left;
                $cs_sidebar_right = $cs_xmlObject->sidebar_layout->cs_sidebar_right;
                if ($cs_layout == "left") {
                    $cs_layout = "content-right col-md-9";
                } else if ($cs_layout == "right") {
                    $cs_layout = "content-left col-md-9";
                } else {
                    $cs_layout = "col-md-12";
                }
            }
            if ($cs_layout == 'content-right col-md-9') {
                ?>
            <aside class="sidebar-left col-md-3"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($cs_sidebar_left)) : ?><?php endif; ?></aside>
        <?php } ?>
        <div class="<?php echo cs_allow_special_char($cs_layout); ?> cs_shop_wrap">
        <?php woocommerce_content(); ?>
        </div>
        <?php if ($cs_layout == 'content-left col-md-9') { ?>
            <aside class="sidebar-right col-md-3"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($cs_sidebar_right)) : ?><?php endif; ?></aside>
        <?php } ?>
        <?php
    endif;
}
/* * *************** Shop Taxonomies pages ***************** */
else if (is_product_category() or is_product_tag()) {
    global $cs_theme_option;
    isset($cs_theme_option['cs_layout']);
    $cs_layout = $cs_theme_option['cs_layout'];
    if (have_posts()) :
        ?>
        <?php if ($cs_layout <> '' and $cs_layout <> "none" and $cs_layout == 'left') : ?>
            <aside class="left-content col-md-3">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($cs_theme_option['cs_sidebar_left'])) : endif; ?>
            </aside>
        <?php endif; ?>	
        <div class="<?php cs_default_pages_meta_content_class($cs_layout); ?> cs_shop_wrap">
        <?php woocommerce_content(); ?>
        </div>
        <?php if ($cs_layout <> '' and $cs_layout <> "none" and $cs_layout == 'right') : ?>
            <aside class="left-content col-md-3">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($cs_theme_option['cs_sidebar_left'])) : endif; ?>
            </aside>
        <?php endif; ?>	
    <?php endif; ?>
    <?php
}
/* * *************** Shop Other Pages ***************** */
else {
    if (have_posts()) :
        ?>
        <div class="cs_shop_wrap">
        <?php woocommerce_content(); ?>
        </div>
    <?php endif; ?>
    <?php
}
?>    
<?php get_footer(); ?>