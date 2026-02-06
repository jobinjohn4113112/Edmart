<?php
/*
Template Name: Contact Page
*/
get_header();
?>

<section class="schedule-listing contact-section">
    <div class="container">
        <div class="registration-wrapper row">

            <!-- Sidebar -->
            <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="registration-sidebar">
                    <h2 class="course-title mb-5"><?php echo get_field('title'); ?></h2>

                    <div class="contact-info-item d-flex align-items-start mb-4">
                        <div class="icon-wrapper me-3 mt-1">
                             <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                    <g clip-path="url(#clip0_460_974)">
                                        <path
                                            d="M19.1667 3.83331H3.83341C2.77925 3.83331 1.92633 4.69581 1.92633 5.74998L1.91675 17.25C1.91675 18.3041 2.77925 19.1666 3.83341 19.1666H19.1667C20.2209 19.1666 21.0834 18.3041 21.0834 17.25V5.74998C21.0834 4.69581 20.2209 3.83331 19.1667 3.83331ZM19.1667 7.66665L11.5001 12.4583L3.83341 7.66665V5.74998L11.5001 10.5416L19.1667 5.74998V7.66665Z"
                                            fill="#2563EB" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_460_974">
                                            <rect width="23" height="23" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                        </div>
                        <div class="content">
                            <p>Email:</p>
                            <a href="mailto:info@edmart.ie"><?php echo get_field('email'); ?></a>
                        </div>
                    </div>

                    <div class="contact-info-item d-flex align-items-start mb-4">
                        <div class="icon-wrapper me-3 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                    <path
                                        d="M4.69063 0C5.28008 0.112683 5.79427 0.594717 5.85071 1.21447C5.93223 2.08464 5.91969 2.78578 6.12662 3.66221C6.20814 4.01278 6.42134 4.48855 6.42134 4.83286C6.42134 5.60912 5.12958 6.82986 4.6969 7.52474C4.26423 8.21962 4.68436 7.80018 4.78469 7.98799C5.64378 9.64068 7.05468 11.043 8.64117 11.9945C8.76031 12.0696 9.23061 12.3576 9.32467 12.3764C9.41873 12.3952 9.44382 12.3326 9.49398 12.295C10.1336 11.863 10.7732 11.2245 11.4128 10.8301C12.0963 10.4044 12.6293 10.7174 13.3066 10.8802C14.1907 11.093 14.8742 11.0805 15.7521 11.1556C16.3855 11.212 16.8683 11.7128 17 12.3138V15.832C16.8683 16.433 16.4356 16.8649 15.8399 16.9964C15.5452 16.9839 15.2442 17.0089 14.9432 16.9964C7.2428 16.6583 0.827885 10.586 0.0754023 2.91098C-0.0249287 1.89683 -0.244403 0.187805 1.17277 0.00626014H4.69063V0Z"
                                        fill="#2563EB" />
                                </svg>
                        </div>
                        <div class="content">
                            <p>Phone:</p>
                            <a href="tel:<?php echo get_field('phone'); ?>"><?php echo get_field('phone'); ?></a>
                        </div>
                    </div>

                    <div class="contact-info-item d-flex align-items-start">
                        <div class="icon-wrapper me-3 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="22" viewBox="0 0 17 22" fill="none">
                                    <path
                                        d="M9.0807 0C13.0142 0.283657 16.3131 3.23369 16.906 7.02658C17.6159 11.5651 14.1667 16.4683 11.1853 19.6696C10.7092 20.1802 9.4064 21.5903 8.88026 21.8983C8.38752 22.1739 8.05346 21.8335 7.71105 21.5417C4.41222 18.6727 0.244835 13.1941 0.0109936 8.78526C-0.222848 4.31158 3.30148 0.291761 7.93654 0H9.08905H9.0807ZM8.27895 3.66322C4.53749 3.84963 2.48303 8.01533 4.71288 10.9654C6.94272 13.9154 11.7699 13.2022 12.9808 9.73348C14.0415 6.68619 11.5861 3.50114 8.27895 3.67133V3.66322Z"
                                        fill="#2563EB" />
                                </svg>
                        </div>
                        <div class="content">
                            <p>Address:</p>
                                <p><?php echo get_field('address'); ?></p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7 offset-lg-1">
                <div class="registration-form">
                    <?php echo do_shortcode('[contact-form-7 id="6e49f72" title="Contact Page Form"]'); ?>
                </div>
            </div>

        </div>
    </div>

    <!-- Shapes -->
    <div class="course-listing-shape">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-bg-1.png">
    </div>

    <div class="course-listing-shape-2">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-bg-2.png">
    </div>

    <div class="course-listing-shape-3">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-bg-3.png">
    </div>

</section>


<?php get_footer(); ?>
