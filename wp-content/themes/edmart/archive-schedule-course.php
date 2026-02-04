<?php
/* Template Name: Course Schedule */
get_header();
?>

<section class="schedule-listing">
<div class="container">
<h1><?php echo get_the_title(); ?></h1>
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

        <?php while($schedule_query->have_posts()): $schedule_query->the_post();

            $course_date = get_field('course_date');
            $time = get_field('time');

            $start_time = $time['starting_time'];
            $end_time   = $time['ending_time'];
        ?>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="inner-card">

                <div class="course-date">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/date-picker.png">
                    <p>Course Date : <span class="fw-semibold"><?php echo $course_date; ?></span></p>
                </div>

                <div class="divider"></div>

                <div class="course-time">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/timer-icon.png">
                    <p>Timing : <?php echo $start_time; ?> - <?php echo $end_time; ?></p>
                </div>

                <div class="booking-btn-wrapper">
                    <div class="price-tag">€<?php echo $course_fee; ?></div>
                    <a href="<?php the_permalink(); ?>" class="book-now-btn">
                        Book Now
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-blue.png">
                    </a>
                </div>

            </div>
        </div>

        <?php endwhile; wp_reset_postdata(); ?>

        </div>
    </div>

    <div class="divider"></div>

</div>
<!-- ================= END COURSE CATEGORY ================= -->

<?php endforeach; endif; ?>
