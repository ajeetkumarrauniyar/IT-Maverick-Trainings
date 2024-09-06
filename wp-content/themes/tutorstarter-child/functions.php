<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

// BEGIN ENQUEUE PARENT ACTION

// Enqueue Parent and Child Theme Stylesheets
function child_theme_enqueue_styles()
{
    // Enqueue Parent Stylesheet
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Enqueue Child Theme Stylesheet
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), wp_get_theme()->get('Version'));

    // Enqueue Global Stylesheet
    wp_enqueue_style('global-style', get_stylesheet_directory_uri() . '/global-style.css', array('child-style'), wp_get_theme()->get('Version'));

    // Enqueue Additional Stylesheets Conditionally
    if (is_page_template('page-home.php')) {
        wp_enqueue_style('page-home-styles', get_stylesheet_directory_uri() . '/page-home.css', array('global-styles'), wp_get_theme()->get('Version'));
    }

    if (is_page('login')) {
        wp_enqueue_style('login-styles', get_stylesheet_directory_uri() . '/login.css', array('global-styles'), wp_get_theme()->get('Version'));
    }

    if (is_page('password-reset')) {
        wp_enqueue_style('password-reset-styles', get_stylesheet_directory_uri() . '/password-reset.css', array('global-styles'), wp_get_theme()->get('Version'));
    }

    // Enqueue Custom Blog Stylesheets
    if (is_home()) {
        wp_enqueue_style('home-styles', get_stylesheet_directory_uri() . '/home.css', array('global-styles'), wp_get_theme()->get('Version'));
    }
    // Enqueue Checkout Stylesheets
    if (is_checkout()) {
        wp_enqueue_style('custom-checkout', get_stylesheet_directory_uri() . '/custom-checkout.css', array('child-style'), wp_get_theme()->get('Version'));
    }

    //Enqueue Contact us Stylesheet
    wp_enqueue_style('contact-us', get_stylesheet_directory_uri() . '/page-contact.css', array('child-style'), wp_get_theme()->get('Version'));

}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');

// Enqueue RTL Stylesheet if necessary
if (!function_exists('chld_thm_cfg_locale_css')):
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

// Enqueue Child Theme Configurator Stylesheet
if (!function_exists('child_theme_configurator_css')):
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_separate', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('main'));
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
// add_action('template_redirect', 'redirect_cart_to_checkout');
// function redirect_cart_to_checkout()
// {
//     if (is_cart()) {
//         wp_redirect(wc_get_checkout_url());
//         exit;
//     }
// }

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

/*----------------------------------------------------------------
Custom Common Login & Registration 
---------------------------------------------------------------- */
// Handle registration
function custom_registration_handler()
{
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = sanitize_user($_POST['username']);
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];

        $userdata = array(
            'user_login' => $username,
            'user_email' => $email,
            'user_pass' => $password,
            'role' => 'subscriber', // Set the default role or adjust as needed
        );

        $user_id = wp_insert_user($userdata);

        if (!is_wp_error($user_id)) {
            wp_redirect(home_url('/login'));
            exit;
        } else {
            // Handle errors (display error messages or redirect)
            wp_redirect(home_url('/register?error=1'));
            exit;
        }
    }
}
add_action('admin_post_nopriv_custom_registration', 'custom_registration_handler');
add_action('admin_post_custom_registration', 'custom_registration_handler');
//--------------------------------------------------------------------------------------------------------------------
// Redirect users to a specific page after they log in
function custom_login_redirect($redirect_to, $request, $user)
{
    $login_page = home_url('/login');
    // Ensure $user is an object before accessing properties
    if (is_wp_error($user) || !is_object($user)) {
        return $login_page;
    }

    // Check if the user is logged in
    if (is_array($user->roles)) {
        return home_url('/dashboard'); // redirect to dashboard page after login
    } else {
        return $redirect_to;
    }
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);

// Redirect to Custom Login Page on Error
function custom_login_failed()
{
    $login_page = home_url('/login');
    wp_redirect($login_page . '?login=failed');
    exit;
}
add_action('wp_login_failed', 'custom_login_failed');

function custom_verify_user_pass($user, $username, $password)
{
    $login_page = home_url('/login');
    if ($username == '' || $password == '') {
        wp_redirect($login_page . '?login=empty');
        exit;
    }
    return $user; // Always return $user
}
add_filter('authenticate', 'custom_verify_user_pass', 1, 3);

// Redirect the default lost password URL to the custom password reset page
function custom_lost_password_redirect()
{
    if (isset($_GET['action']) && $_GET['action'] === 'lostpassword') {
        wp_redirect(home_url('/forgot-password'));
        exit;
    }
}
add_action('login_form_lostpassword', 'custom_lost_password_redirect');



// Create a Table For store contact us form data 
function create_contact_form_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form_submissions';

    // Define the structure of the table
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(20) DEFAULT '' NOT NULL,
        message text NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    // Include the upgrade function to create the table
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('init', 'create_contact_form_table');

//Handle contact us form submission 
function handle_contact_form_submission()
{
    if (isset($_POST['submit_contact_form'])) {
        global $wpdb;

        // Sanitize form data
        $name = sanitize_text_field($_POST['full-name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone-number']);
        $message = sanitize_textarea_field($_POST['message']);

        // Validate required fields
        if (empty($name) || empty($email) || empty($message)) {
            wp_die('Please fill in all required fields.');
        }

        // Insert form data into custom table
        $table_name = $wpdb->prefix . 'contact_form_submissions';
        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
                'created_at' => current_time('mysql'),
            )
        );

        // Send an email to admin
        $admin_email = "testing@rajballavkumar.com";
        $subject = "New Contact Form Submission from " . $name;

        $body = "<html>
                        <head>
                            <title>New Contact Form Submission</title>
                            <style>
                                body { font-family: Arial, sans-serif; }
                                .container { width: 100%; padding: 20px; background-color: #f4f4f4; }
                                .content { background-color: #fff; padding: 20px; border-radius: 5px; }
                                h2 { color: #333; }
                            </style>
                        </head>
                        <body>
                            <div class='container'>
                                <div class='content'>
                                    <h2>New Contact Form Submission</h2>
                                    <p><strong>Name:</strong> {$name}</p>
                                    <p><strong>Email:</strong> {$email}</p>
                                    <p><strong>Phone:</strong> {$phone}</p>
                                    <p><strong>Message:</strong></p>
                                    <p>{$message}</p>
                                </div>
                            </div>
                        </body>
                </html>  ";

        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $admin_email
        );
        $touser = $admin_email; // change touser to recive email on given email address

        // Send email to the admin
        if (wp_mail($touser, $subject, $body, $headers)) {
            // Redirect to a thank-you page
            wp_redirect(home_url('/'));
            exit;
        } else {
            wp_die('There was a problem sending the email.');
        }


    }
}
add_action('init', 'handle_contact_form_submission');
