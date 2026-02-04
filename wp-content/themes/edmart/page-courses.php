<?php
/* Template Name: Courses Listing */
get_header();

$terms = get_terms(array(
    'taxonomy'   => 'course',
    'hide_empty' => false,
));
?>

<section class="course-listing course-listing-course">
    <div class="container">
        <h1>Book Now</h1>
        <div class="divider"></div>

        <div class="course-listing-wrapper">
            <div class="row">

                <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
                    <?php foreach ($terms as $term) :
                        $term_link = get_term_link($term);
                    ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="course-card">
                                <figure>
                                    <?php
                                    $image = get_field('featured_image', 'course_' . $term->term_id);
                                    if ($image && is_array($image)) :
                                    ?>
                                        <img
                                            src="<?php echo esc_url($image['url']); ?>"
                                            alt="<?php echo esc_attr($term->name); ?>">
                                    <?php else : ?>
                                        <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/course-placeholder.jpg"
                                            alt="Placeholder">
                                    <?php endif; ?>

                                    <div class="course-tag">
                                        <span class="tag-text">
                                            <?php echo esc_html(strtoupper(get_field('course_code', 'course_' . $term->term_id))); ?>
                                        </span>
                                    </div>
                                </figure>

                                <div class="course-card-content">
                                    <h3><?php echo esc_html($term->name); ?></h3>

                                    <?php if ($term->description) : ?>
                                        <p><?php echo esc_html(wp_trim_words($term->description, 12)); ?></p>
                                    <?php endif; ?>
                                    <?php
                                        $course_fee = get_field('course_fee', 'course_' . $term->term_id);
                                    ?>
                                    <span class="course-fee">Fee: €<?php echo $course_fee ?></span>
                                    <div class="d-flex align-items-center gap-3">
                                        <a href="<?php echo esc_url($term_link); ?>" class="banner-btn banner-btn-white">
                                            Read More
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-blue.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No courses found.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>