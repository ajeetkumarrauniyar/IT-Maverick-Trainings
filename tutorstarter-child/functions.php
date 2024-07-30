<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;


// BEGIN ENQUEUE PARENT ACTION

// Enqueue Parent Theme Stylesheet
function child_theme_enqueue_styles()
{
    // Enqueue Parent Stylesheet
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Enqueue Child Theme Stylesheet
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), wp_get_theme()->get('1.0.0'));

    // Enqueue Tailwind CSS Stylesheets
    // wp_enqueue_style('tailwind-style', get_stylesheet_directory_uri() . '/tailwindcss_output.css', array('child-style'), wp_get_theme()->get('1.0.0'));

    // Enqueue Additional Stylesheets
    wp_enqueue_style('custom-styles', get_stylesheet_directory_uri() . '/global-style.css', array('child-style'), wp_get_theme()->get('1.0.0'));

    // Enqueue Checkout Stylesheets
    if (is_checkout()) {
        wp_enqueue_style('custom-checkout', get_stylesheet_directory_uri() . '/custom-checkout.css');
    }
}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');

// Enqueue RTL Stylesheet if necessary
if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

// Enqueue Child Theme Configurator Stylesheet
if (!function_exists('child_theme_configurator_css')) :
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_separate', trailingslashit(get_stylesheet_directory_uri()) . 'ctc-style.css', array('main'));
    }
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 10);

// END ENQUEUE PARENT ACTION

/*----------------------------------------------------------------
Redirect to Home Page after Logout
---------------------------------------------------------------- */
add_action('wp_logout', 'auto_redirect_after_logout');

function auto_redirect_after_logout()
{
    wp_safe_redirect(home_url());
    exit;
}

/*----------------------------------------------------------------
Woocommerce Actions & Customizations
---------------------------------------------------------------- */
// Change "Add to cart" text to "Enroll Now"
add_filter('woocommerce_product_add_to_cart_text', 'custom_add_to_cart_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'custom_add_to_cart_text');
function custom_add_to_cart_text()
{
    return __('Enroll Now', 'tutorstarter');
}

// Redirect cart page to checkout
add_action('template_redirect', 'redirect_cart_to_checkout');
function redirect_cart_to_checkout()
{
    if (is_cart()) {
        wp_redirect(wc_get_checkout_url());
        exit;
    }
}

// Add WooCommerce theme support
function tutorstarter_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'tutorstarter_add_woocommerce_support');


//  Remove all possible WooCommerce Checkout Field for Virtual Products
function wc_remove_checkout_fields($fields)
{

    // Billing fields
    unset($fields['billing']['billing_company']);
    // unset( $fields['billing']['billing_email'] );
    // unset( $fields['billing']['billing_phone'] );
    // unset( $fields['billing']['billing_state'] );
    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);

    // Shipping fields
    // unset( $fields['shipping']['shipping_company'] );
    // unset( $fields['shipping']['shipping_phone'] );
    // unset( $fields['shipping']['shipping_state'] );
    // unset( $fields['shipping']['shipping_first_name'] );
    // unset( $fields['shipping']['shipping_last_name'] );
    // unset( $fields['shipping']['shipping_address_1'] );
    // unset( $fields['shipping']['shipping_address_2'] );
    // unset( $fields['shipping']['shipping_city'] );
    // unset( $fields['shipping']['shipping_postcode'] );

    // Order fields
    unset($fields['order']['order_comments']);

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'wc_remove_checkout_fields');

// Move coupon form before subtotal in WooCommerce checkout
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
add_action('woocommerce_review_order_after_cart_contents', 'woocommerce_checkout_coupon_form_custom');
function woocommerce_checkout_coupon_form_custom()
{
    echo '<tr class="coupon-form"><td colspan="2">';

    wc_get_template(
        'checkout/form-coupon.php',
        array(
            'checkout' => WC()->checkout(),
        )
    );
    echo '</tr></td>';
}
