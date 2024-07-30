<?php

/**
 * Template Name: HomePage
 *
 * This is the template that displays the homepage.
 *
 * @package TutorStarter
 */

get_header();
?>

<main>
    <div class="butterfly-container">
        <img id="first-butterfly" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/butterfly_one.svg'); ?>" alt="First butterfly" />
        <img id="second-butterfly" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/butterfly_two.svg'); ?>" alt="Second butterfly" />
        <img id="third-butterfly" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/butterfly_three.svg'); ?>" alt="Third butterfly" />
    </div>

    <!-- butterfly for mobile device  -->
    <div class="butterfly-container-mobile">
        <img id="first-butterfly-mobile" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/white-butterfly-1.png'); ?>" alt="First butterfly" />
        <img id="second-butterfly-mobile" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/white-butterfly-2.png'); ?>" alt="Second butterfly" />
        <img id="third-butterfly-mobile" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/white-butterfly-3.png'); ?>" alt="Third butterfly" />
    </div>

    <section class="hero-section">
        <div class="ellipse-container">
            <!-- Ellipse content goes here -->
        </div>

        <div class="hero-left">
            <div>
                <h2>
                    <span><?php esc_html_e('Learning', 'tutorstarter'); ?></span> <span><?php esc_html_e('keeps', 'tutorstarter'); ?></span>
                    <br />
                    <span><?php esc_html_e('you', 'tutorstarter'); ?></span> <span><?php esc_html_e('in the lead', 'tutorstarter'); ?></span>
                </h2>
                <button class="blue-button browse-course-button">
                    <?php esc_html_e('Browse Course', 'tutorstarter'); ?>
                </button>
            </div>
        </div>

        <div class="hero-right">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/hero_girl.png'); ?>" alt="A girl holding books" />
        </div>
    </section>

    <!-- Course categories section start -->
    <section id="course-details">
        <div id="Course-details-icon">
            <div>
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/course_details_icon.svg'); ?>" alt="<?php esc_attr_e('Course details', 'tutorstarter'); ?>" />
                <span><?php esc_html_e('Course details', 'tutorstarter'); ?></span>
            </div>
        </div>

        <h2 id="course-details-heading"><?php esc_html_e('Explore Our Categories', 'tutorstarter'); ?></h2>

        <div class="grid-container">
            <div class="grid-item">
                <div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/data-science-icon.svg'); ?>" alt="<?php esc_attr_e('Data Science', 'tutorstarter'); ?>" />
                    <p><?php esc_html_e('Data Science', 'tutorstarter'); ?></p>
                </div>
            </div>
            <div class="grid-item">
                <div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/Machine-Learning-icon.svg'); ?>" alt="<?php esc_attr_e('Machine Learning', 'tutorstarter'); ?>" />
                    <p><?php esc_html_e('Machine Learning', 'tutorstarter'); ?></p>
                </div>
            </div>
            <div class="grid-item">
                <div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/Code-Analytics-icon.svg'); ?>" alt="<?php esc_attr_e('Code Analytics', 'tutorstarter'); ?>" />
                    <p><?php esc_html_e('Code Analytics', 'tutorstarter'); ?></p>
                </div>
            </div>
            <div class="grid-item">
                <div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/Data-Engineer-icon.svg'); ?>" alt="<?php esc_attr_e('Data Engineer', 'tutorstarter'); ?>" />
                    <p><?php esc_html_e('Data Engineer', 'tutorstarter'); ?></p>
                </div>
            </div>
        </div>

        <h3 id="join-community">
            <?php esc_html_e('Join a community of 3,000+ Professional Web Designer & Developers', 'tutorstarter'); ?>
        </h3>

        <!-- second grid  -->
        <div class="join-community-grid">
            <div class="image-shape-container">
                <div></div>
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/butterfly_59.png'); ?>" alt="<?php esc_attr_e('butterfly', 'tutorstarter'); ?>">
            </div>

            <div class="join-community-grid-item">
                <div class="mobile-device-ellipse"></div>
                <div>
                    <h4><?php esc_html_e('Help From Experts', 'tutorstarter'); ?></h4>
                    <p>
                        <?php esc_html_e('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.et.', 'tutorstarter'); ?>
                    </p>
                </div>
            </div>
            <div class="join-community-grid-item">
                <div class="mobile-device-ellipse"></div>
                <div>
                    <h4><?php esc_html_e('Build Your Network', 'tutorstarter'); ?></h4>
                    <p>
                        <?php esc_html_e('Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.', 'tutorstarter'); ?>
                    </p>
                </div>
            </div>
            <div class="join-community-grid-item">
                <div class="mobile-device-ellipse"></div>
                <div>
                    <h4><?php esc_html_e('Real-life Lessons', 'tutorstarter'); ?></h4>
                    <p>
                        <?php esc_html_e('Deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.', 'tutorstarter'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Course categories section ends -->

    <!-- Learn the art & business of web design section starts  -->
    <section id="course-details">
        <div id="Course-details-icon">
            <div>
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/course_details_icon.svg'); ?>" alt="<?php esc_attr_e('Course details', 'tutorstarter'); ?>" />
                <span><?php esc_html_e('Course details', 'tutorstarter'); ?></span>
            </div>
        </div>

        <h2 id="course-details-heading"><?php esc_html_e('Explore Our Categories', 'tutorstarter'); ?></h2>

        <div class="grid-container">
            <div class="grid-item">
                <div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/data-science-icon.svg'); ?>" alt="<?php esc_attr_e('Data Science', 'tutorstarter'); ?>" />
                    <p><?php esc_html_e('Data Science', 'tutorstarter'); ?></p>
                </div>
            </div>
            <div class="grid-item">
                <div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/Machine-Learning-icon.svg'); ?>" alt="<?php esc_attr_e('Machine Learning', 'tutorstarter'); ?>" />
                    <p><?php esc_html_e('Machine Learning', 'tutorstarter'); ?></p>
                </div>
            </div>
            <div class="grid-item">
                <div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/Code-Analytics-icon.svg'); ?>" alt="<?php esc_attr_e('Code Analytics', 'tutorstarter'); ?>" />
                    <p><?php esc_html_e('Code Analytics', 'tutorstarter'); ?></p>
                </div>
            </div>
            <div class="grid-item">
                <div>
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/Data-Engineer-icon.svg'); ?>" alt="<?php esc_attr_e('Data Engineer', 'tutorstarter'); ?>" />
                    <p><?php esc_html_e('Data Engineer', 'tutorstarter'); ?></p>
                </div>
            </div>
        </div>

        <h3 id="join-community">
            <?php esc_html_e('Join a community of 3,000+ Professional Web Designer & Developers', 'tutorstarter'); ?>
        </h3>

        <div class="join-community-grid">
            <div class="image-shape-container">
                <div></div>
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/butterfly_59.png'); ?>" alt="<?php esc_attr_e('butterfly', 'tutorstarter'); ?>">
            </div>

            <div class="join-community-grid-item">
                <div class="mobile-device-ellipse"></div>
                <div>
                    <h4><?php esc_html_e('Help From Experts', 'tutorstarter'); ?></h4>
                    <p>
                        <?php esc_html_e('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.et.', 'tutorstarter'); ?>
                    </p>
                </div>
            </div>
            <div class="join-community-grid-item">
                <div class="mobile-device-ellipse"></div>
                <div>
                    <h4><?php esc_html_e('Build Your Network', 'tutorstarter'); ?></h4>
                    <p>
                        <?php esc_html_e('Velit officia consequat duis enim velit mollit. Exercitation veniam consequat.', 'tutorstarter'); ?>
                    </p>
                </div>
            </div>
            <div class="join-community-grid-item">
                <div class="mobile-device-ellipse"></div>
                <div>
                    <h4><?php esc_html_e('Real-life Lessons', 'tutorstarter'); ?></h4>
                    <p>
                        <?php esc_html_e('Deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis.', 'tutorstarter'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Learn the art & business of web design section ends  -->


    <!-- Course listing section starts -->
    <section id="art-business">
        <div id="pill-container">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/ellipse-26.svg'); ?>" alt="<?php esc_attr_e('ellipse shape', 'tutorstarter'); ?>" />
            <p><?php esc_html_e('Learn the art & business of web design', 'tutorstarter'); ?></p>
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/ellipse-27.svg'); ?>" alt="<?php esc_attr_e('ellipse shape', 'tutorstarter'); ?>" />
        </div>

        <div id="quote-container">
            <p id="quote">
                <?php esc_html_e('Learning often happens in classrooms but it doesn’t have to. Eduflow to facilitate learning experiences no matter the context.', 'tutorstarter'); ?>
            </p>
        </div>

        <div class="hide-scrollbar">
            <div class="course-enrollment-grid">
                <?php
                $args = array(
                    'post_type' => 'courses',
                    'posts_per_page' => 3, // Adjust the number of courses to display
                );
                $courses = new WP_Query($args);

                if ($courses->have_posts()) :
                    while ($courses->have_posts()) : $courses->the_post();
                        $course_id = get_the_ID();
                        $rating = tutor_utils()->get_course_rating($course_id);
                ?>
                        <div class="course-enrollment-grid-item">
                            <div id="course-enroll-img-container">
                                <?php echo get_the_post_thumbnail($course_id, 'medium'); ?>
                            </div>
                            <div class="course-enroll-text-container">
                                <div>
                                    <span>
                                        <?php tutor_utils()->star_rating_generator($rating->rating_avg); ?>
                                    </span>
                                    <span id="review-marks">
                                        <?php echo esc_html($rating->rating_avg . ' (' . $rating->rating_count . ')'); ?>
                                    </span>
                                </div>
                                <p><?php the_title(); ?></p>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="tutor-btn tutor-btn-primary">
                                <?php esc_html_e('Enroll Now', 'tutorstarter'); ?>
                            </a>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    esc_html_e('No courses found', 'tutorstarter');
                endif;
                ?>
            </div>
        </div>

        <div class="course-enroll-btn-container">
            <a href="<?php echo get_post_type_archive_link('courses'); ?>" class="tutor-btn tutor-btn-primary">
                <?php esc_html_e('Browse Courses', 'tutorstarter'); ?>
            </a>
        </div>
    </section>
    <!-- Course listing section ends -->

    <!-- iframe-section start  -->
    <section id="iframe-section">
        <h2>
            <?php esc_html_e('Everything is a learning experience', 'tutorstarter'); ?>
        </h2>

        <p id="iframe-quote"><?php esc_html_e('Learning often happens in classrooms but it doesn’t have to. Use Eduflow to facilitate learning experiences no matter the context.', 'tutorstarter'); ?></p>

        <div id="iframe-container">
            <div>
                <iframe width="650" height="350" src="https://www.youtube.com/embed/z0n1aQ3IxWI?si=nEJ1qepVwBP7Pec-" title="<?php esc_attr_e('YouTube video player', 'tutorstarter'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>
            <div>
                <p>
                    <span><?php esc_html_e('Jessica Felicio', 'tutorstarter'); ?></span>
                    <br>
                    <?php esc_html_e('Featured Teacher', 'tutorstarter'); ?>
                </p>
            </div>
        </div>
    </section>
    <!-- iframe-section ends  -->

    <!-- tutor Success Stories section start  -->
    <section id="Tutor-Success-Stories">
        <div class="Tutor-Success-Stories-pill" id="pill-container">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/ellipse-26.svg'); ?>" alt="<?php esc_attr_e('ellipse shape', 'tutorstarter'); ?>">
            <p><?php esc_html_e('Tutor Success Stories', 'tutorstarter'); ?></p>
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/ellipse-27.svg'); ?>" alt="<?php esc_attr_e('ellipse shape', 'tutorstarter'); ?>">
        </div>
        <p><?php esc_html_e('Real students, real results', 'tutorstarter'); ?></p>

        <div class="hide-scrollbar">
            <div id="testimonial-grid-container">

                <div class="testimonial-grid-item">
                    <div class="testimonial-grid-item-profile">
                        <img height="60" width="60" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/Theresa-Webb.png'); ?>" alt="<?php esc_attr_e('tutor Webb', 'tutorstarter'); ?>">
                        <p><?php esc_html_e('Theresa Webb', 'tutorstarter'); ?></p>
                    </div>
                    <div class="testimonial-grid-item-text">
                        <p>
                            <?php esc_html_e('Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.', 'tutorstarter'); ?>
                        </p>
                    </div>
                </div>

                <div class="testimonial-grid-item">
                    <div class="testimonial-grid-item-profile">
                        <img height="60" width="60" src="https://images.ctfassets.net/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=1200&h=992&q=70&fm=webp" alt="<?php esc_attr_e('tutor Simmons', 'tutorstarter'); ?>">
                        <p><?php esc_html_e('Brooklyn Simmons', 'tutorstarter'); ?></p>
                    </div>
                    <div class="testimonial-grid-item-text">
                        <p>
                            <?php esc_html_e('Thousands of easy‑to‑install add‑ons mean you’ll never outgrow your website. Collect leads, create contact forms, create subscriptions, automatically backup.', 'tutorstarter'); ?>
                        </p>
                    </div>
                </div>

                <div class="testimonial-grid-item">
                    <div class="testimonial-grid-item-profile">
                        <img height="60" width="60" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/asset/images/index-page/Eleanor-Pena.png'); ?>" alt="<?php esc_attr_e('tutor Pena', 'tutorstarter'); ?>">
                        <p><?php esc_html_e('Eleanor Pena', 'tutorstarter'); ?></p>
                    </div>
                    <div class="testimonial-grid-item-text">
                        <p>
                            <?php esc_html_e('Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip deserunt reprehenderit elit laborum.', 'tutorstarter'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/newsletter'); ?>

    </section>
    <!-- tutor Success Stories section ends  -->

</main>
<!-- Footer Section -->
<?php
// get_footer();
?>