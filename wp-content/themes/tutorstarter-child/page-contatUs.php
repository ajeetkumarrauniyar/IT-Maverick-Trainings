<?php

/**
 * Template Name: Contact Us
 *
 * This is the template that displays the constact us page.
 *
 * @package TutorStarter
 */

get_header();
?>

<body>
    <div class="parent-container">
        <main>
            <section class="shape-container">
                <div id="heading-container">
                    <h1>CONTACT WITH US</h1>
                    <p>Let’s Be Friends</p>
                </div>

                <div class="circle-container">
                    <div class="circle first-circle"></div>
                    <div class="circle second-circle"></div>
                </div>

                <div class="butterfly-container">
                    <div class="btr-img btr-img1">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . './asset/images/contactUs/butterfly.svg'); ?>"
                            alt="butterfly image">
                    </div>
                    <div class="btr-img btr-img2">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri() . './asset/images/contactUs/butterfly.svg'); ?>"
                            alt="butterfly image">
                    </div>
                </div>

            </section>

            <section class="form-container">
                <div class="contact-form">
                    <form method="POST" action="">
                        <div class="form-col">
                            <label for="full-name">Full Name<span>*</span></label>
                            <input id="full-name" name="full-name" type="text" required>
                        </div>
                        <div class="form-col">
                            <label for="email">Email<span>*</span></label>
                            <input id="email" name="email" type="email" required>
                        </div>
                        <div class="form-col">
                            <label for="phone-number">Phone Number<span>*</span></label>
                            <input id="phone-number" name="phone-number" type="number" required>
                        </div>
                        <div class="form-col">
                            <label for="message">Message<span>*</span></label>
                            <textarea rows="5" id="message" name="message" required></textarea>
                        </div>

                        <button id="submit-btn" class="blue-button" name="submit_contact_form" type="submit">Send
                            Message</button>
                    </form>
                </div>

                <div class="google-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462332.33082934027!2d84.86552238464357!3d25.136659962061717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f2f331d4ad0dc3%3A0x2d288b5d09c00dbe!2sRuins%20of%20Nalanda%20University!5e0!3m2!1sen!2sin!4v1724744055782!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <p>E-Mail ID:
                        <a href="mailto:support@itmavericksolutions.in">support@itmavericksolutions.in</a>
                    </p>
                </div>


            </section>

            <section id="contact-us-newsletter">
                <!-- newsletter for mobile devices only  -->
                <?php get_template_part('template-parts/newsletter'); ?>
            </section>

        </main>
    </div>

</body>

<?php
get_footer();
?>