<?php
get_header();

$term = get_queried_object();
$term_key = $term->taxonomy . '_' . $term->term_id;

$featured_image = get_field('featured_image', $term_key);
?>

<!-- FIRST SECTION ONLY -->
<section class="schedule-listing course-single">
    <div class="container">

        <h1><?php echo esc_html($term->name); ?></h1>
        <div class="divider"></div>

        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-6">
                    <div class="course-img">
                        <?php if ($featured_image): ?>
                            <img src="<?php echo esc_url($featured_image['url']); ?>" alt="">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="course-content">
                        <h2><?php echo esc_html($term->name); ?></h2>
                        <?php echo term_description($term); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Decorative shapes stay inside first section -->
    <div class="course-listing-shape">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-bg-1.png" alt="">
    </div>
    <div class="course-listing-shape-2">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-bg-2.png" alt="">
    </div>
    <div class="course-listing-shape-3">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-bg-3.png" alt="">
    </div>
</section>


<!-- FLEXIBLE CONTENT STARTS HERE -->
<?php if (have_rows('course_flexible_content', $term_key)): ?>
    <?php while (have_rows('course_flexible_content', $term_key)):
        the_row(); ?>


        <!-- LEFT RIGHT BLOCK -->
        <?php if (get_row_layout() == 'left_right_repeater_content'): ?>

            <section class="requirements-section">
                <div class="container">
                    <div class="row requirements">

                        <div class="col-lg-6 requirements-left">

                            <?php while (have_rows('heading_description_repeater_left')):
                                the_row(); ?>
                                <div class="requirements-content">
                                    <?php
                                    $color = get_sub_field('heading_color');
                                    $class = ($color == 'optional') ? 'optional' : '';
                                    ?>
                                    <h3 class="<?php echo esc_attr($class); ?>">
                                        <?php echo esc_html(get_sub_field('heading')); ?>
                                    </h3>
                                    <?php echo wp_kses_post(get_sub_field('description')); ?>
                                </div>
                            <?php endwhile; ?>

                        </div>

                        <div class="col-lg-6 requirements-right">

                            <?php while (have_rows('heading_description_repeater_right')):
                                the_row(); ?>
                                <div class="requirements-content">
                                    <?php
                                    $color = get_sub_field('heading_color');
                                    $class = ($color == 'optional') ? 'optional' : '';
                                    ?>
                                    <h3 class="<?php echo esc_attr($class); ?>">
                                        <?php echo esc_html(get_sub_field('heading')); ?>
                                    </h3>
                                    <?php echo wp_kses_post(get_sub_field('description')); ?>
                                </div>
                            <?php endwhile; ?>

                        </div>

                    </div>
                </div>
            </section>

        <?php endif; ?>


        <!-- COURSE CONTENT COLUMNS -->
        <?php if (get_row_layout() == 'course_content_repeater'): ?>

            <section class="course-content-section">
                <div class="container">
                    <div class="row">

                        <h3>Course Content:</h3>

                        <?php
                        $cols = get_sub_field('number_of_columns');

                        if ($cols == 3 && have_rows('three_column_repeater')):
                            while (have_rows('three_column_repeater')):
                                the_row();
                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <ul class="course-content-list">
                                        <?php while (have_rows('list_text')):
                                            the_row(); ?>
                                            <li><?php echo esc_html(get_sub_field('text')); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endwhile; endif; ?>


                        <?php
                        if ($cols == 2 && have_rows('two_column_repeater')):
                            while (have_rows('two_column_repeater')):
                                the_row();
                                ?>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <ul class="course-content-list">
                                        <?php while (have_rows('list_text')):
                                            the_row(); ?>
                                            <li><?php echo esc_html(get_sub_field('text')); ?></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endwhile; endif; ?>

                    </div>
                </div>
            </section>

        <?php endif; ?>

        <?php if (get_row_layout() == 'related_course_schedule'): ?>

<section class="schedule-listing related-course-schedule">
    <div class="container">

        <h2>Course Schedule</h2>
        <div class="divider"></div>

        <?php
        // Get current taxonomy term
        $current_term = get_queried_object();

        $args = array(
            'post_type' => 'schedule-course',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'course',
                    'field'    => 'term_id',
                    'terms'    => $current_term->term_id,
                )
            )
        );

        $schedule_query = new WP_Query($args);

        if ($schedule_query->have_posts()):

            $listing_page_title = get_field('listing_page_title', $current_term);
            $course_fee = get_field('course_fee', $current_term);
            $description = get_field('listing_page_description', $current_term);
        ?>

        <!-- ================= COURSE CATEGORY ================= -->
        <div class="course-category">

            <div class="row">
                <div class="col-12">
                    <div class="course-listing-card-top">

                        <?php if ($listing_page_title): ?>
                            <div class="course-listing-card-header">
                                <h2 class="course-listing-card-title">
                                    <?php echo esc_html($listing_page_title); ?>
                                </h2>
                            </div>
                        <?php endif; ?>

                        <?php if ($description): ?>
                            <div class="course-listing-card-body">
                                <p class="course-listing-card-text">
                                    <?php echo esc_html($description); ?>
                                </p>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <!-- ================= SCHEDULE CARDS ================= -->
            <div class="schedule-listing-card">
                <div class="row">

                    <?php
                    while ($schedule_query->have_posts()):
                        $schedule_query->the_post();

                        $course_date = get_field('course_date');
                        $time = get_field('time');
                        $start_time = $time['starting_time'] ?? '';
                        $end_time = $time['ending_time'] ?? '';
                    ?>

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-card">

                            <div class="course-date">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/date-picker.png" alt="">
                                <p>
                                    Course Date :
                                    <span class="fw-semibold">
                                        <?php echo esc_html($course_date); ?>
                                    </span>
                                </p>
                            </div>

                            <div class="divider"></div>

                            <div class="course-time">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/timer-icon.png" alt="">
                                <p>
                                    Timing :
                                    <?php echo esc_html($start_time . ' - ' . $end_time); ?>
                                </p>
                            </div>

                            <div class="booking-btn-wrapper">
                                <div class="price-tag">
                                    €<?php echo esc_html($course_fee); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="book-now-btn">
                                    Book Now
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-blue.png" alt="">
                                </a>
                            </div>

                        </div>
                    </div>

                    <?php endwhile; wp_reset_postdata(); ?>

                </div>
            </div>

            <div class="divider"></div>

        </div>

        <?php endif; ?>

        <!-- ================= STATIC BOOKING DETAILS ================= -->
        <?php if (have_rows('bottom_contents')): ?>
            <div class="booking-details">

                <?php while (have_rows('bottom_contents')):
                    the_row();
                    $heading = get_sub_field('heading');
                    $description = get_sub_field('description');
                    $bold_description = get_sub_field('bold_description');
                ?>

                <div class="booking-details-wrapper">

                    <?php if ($heading): ?>
                        <h2><?php echo esc_html($heading); ?></h2>
                    <?php endif; ?>

                    <?php if ($description): ?>
                        <p><?php echo esc_html($description); ?></p>
                    <?php endif; ?>

                    <?php if ($bold_description): ?>
                        <span class="fw-semibold">
                            <?php echo esc_html($bold_description); ?>
                        </span>
                    <?php endif; ?>

                </div>

                <?php endwhile; ?>

            </div>
        <?php endif; ?>

    </div>
</section>

        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>