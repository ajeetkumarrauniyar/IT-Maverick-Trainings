<?php

/**
 * Template Name: LogIn
 *
 * This is the template that displays the Login page.
 *
 * @package TutorStarter
 */

if (is_user_logged_in()) {
    wp_redirect(home_url('/dashboard')); // Specify the redirect path after login
}

get_header();

$error_message = '';
if (isset($_GET['login'])) {
    switch ($_GET['login']) {
        case 'failed':
            $error_message = 'Login failed. Please try again.';
            break;
        case 'empty':
            $error_message = 'Please fill in all fields.';
            break;
        case 'false':
            $error_message = 'You are already logged in.';
            break;
    }
}
?>
<div class="login-container" style="display: flex; justify-content: space-between; align-items: center; height: 100vh;">
    <div class="login-info" style="flex: 1; padding: 20px;">
        <h2>Welcome Back!</h2>
        <p>Enter your credentials to access your account.</p>
    </div>
    <div class="login-form" style="flex: 1; padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 10px;">
        <h2>Login</h2>
        <?php if ($error_message) : ?>
            <p class="login-error" style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <?php
        $args = array(
            'redirect' => home_url('/dashboard'), // Specify the redirect path after login
            'form_id' => 'loginform-custom',
            'label_username' => __('Username'),
            'label_password' => __('Password'),
            'label_remember' => __('Remember Me'),
            'label_log_in' => __('Log In'),
            'remember' => true
        );
        wp_login_form($args);
        ?>
        <p style="margin-top: 10px;">
            <a href="<?php echo home_url('/forgot-password'); ?>">Forgot Password?</a>
        </p>
    </div>
</div>