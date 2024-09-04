<?php

/**
 * Template Name: Password Reset
 *
 * This is the template that displays the Password Reset page.
 *
 * @package TutorStarter
 */

get_header();

$message = '';
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    $message = 'Check your email for the confirmation link.';
}

if (isset($_POST['user_login'])) {
    $user_login = sanitize_text_field($_POST['user_login']);
    $user = get_user_by('email', $user_login);

    if (!$user) {
        $user = get_user_by('login', $user_login);
    }

    if ($user) {
        $reset_key = get_password_reset_key($user);

        if (!is_wp_error($reset_key)) {
            $reset_url = add_query_arg(array(
                'action' => 'rp',
                'key' => $reset_key,
                'login' => rawurlencode($user->user_login)
            ), network_site_url('wp-login.php'));

            $message = 'To reset your password, visit the following address: ' . $reset_url;
            wp_mail($user->user_email, 'Password Reset Request', $message);

            echo '<p>Check your email for the confirmation link.</p>';
        } else {
            echo '<p>An error occurred while resetting the password. Please try again later.</p>';
        }
    } else {
        echo '<p>No user found with that email or username.</p>';
    }
}
?>

<div class="password-reset-container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="password-reset-form" style="padding: 20px; background-color: #f9f9f9; border: 1px solid #ddd; border-radius: 10px;">
        <h2>Reset Password</h2>
        <?php if ($message) : ?>
            <p class="password-reset-message" style="color: green;"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <p>
                <label for="user_login">Email or Username</label>
                <input type="text" name="user_login" id="user_login" required>
            </p>
            <p>
                <input type="submit" value="Reset Password">
            </p>
        </form>
    </div>
</div>
<?php get_footer(); ?>