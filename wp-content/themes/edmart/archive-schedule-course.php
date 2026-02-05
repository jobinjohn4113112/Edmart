<?php
/* Template Name: Course Schedule */
get_header();
?>

<section class="schedule-listing">
<div class="container">

<h1>Course Schedule</h1>
<div class="divider"></div>

<?php
$courses = get_terms(array(
    'taxonomy'   => 'course',
    'hide_empty' => false
));

if($courses):
foreach($courses as $course):

    $args = array(
        'post_type' => 'schedule-course',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'course',
                'field'    => 'term_id',
                'terms'    => $course->term_id
            )
        )
    );

    $schedule_query = new WP_Query($args);

    if(!$schedule_query->have_posts()){
        wp_reset_postdata();
        continue;
    }

    $listing_page_title = get_field('listing_page_title', $course);
    $course_fee  = get_field('course_fee', $course);
    $description = get_field('listing_page_description', $course);
?>

<!-- ================= COURSE CATEGORY ================= -->
<div class="course-category">

 <div class="row">
        <div class="col-12">
            <div class="course-listing-card-top">
                   <?php if($listing_page_title): ?>
                <div class="course-listing-card-header">
                    <h2 class="course-listing-card-title"><?php echo $listing_page_title; ?></h2>
                </div>
                 <?php endif; ?>

                 <?php if($description): ?>
                <div class="course-listing-card-body">
                    <p class="course-listing-card-text"><?php echo $description; ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ================= SCHEDULE CARDS ================= -->
    <div class="schedule-listing-card">
        <div class="row">

        <?php 
        while($schedule_query->have_posts()): 
            $schedule_query->the_post();

            $course_date = get_field('course_date');
            $time = get_field('time');
            $start_time = $time['starting_time'] ?? '';
            $end_time   = $time['ending_time'] ?? '';
        ?>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="inner-card">

                <div class="course-date">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/date-picker.png" alt="">
                    <p>Course Date :
                        <span class="fw-semibold"><?php echo esc_html($course_date); ?></span>
                    </p>
                </div>

                <div class="divider"></div>

                <div class="course-time">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/timer-icon.png" alt="">
                    <p>Timing : <?php echo esc_html($start_time . ' - ' . $end_time); ?></p>
                </div>

                <div class="booking-btn-wrapper">
                    <div class="price-tag">€<?php echo esc_html($course_fee); ?></div>
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

<?php endforeach; endif; ?>

<!-- ================= STATIC BOOKING DETAILS ================= -->
    <?php if( have_rows('bottom_contents') ): ?>
        <div class="booking-details">

            <?php while( have_rows('bottom_contents') ): the_row(); 
                $heading          = get_sub_field('heading');
                $description      = get_sub_field('description');
                $bold_description = get_sub_field('bold_description');
            ?>

                <div class="booking-details-wrapper">
                    <?php if($heading): ?>
                        <h2><?php echo esc_html($heading); ?></h2>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <p><?php echo esc_html($description); ?></p>
                    <?php endif; ?>

                    <?php if($bold_description): ?>
                        <span class="fw-semibold"><?php echo esc_html($bold_description); ?></span>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>

        </div>
    <?php endif; ?>


</div><!-- container -->

<!-- Background Shapes -->
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

<?php get_footer(); ?>
