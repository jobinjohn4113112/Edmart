<?php if (get_row_layout() == 'our_courses'):

    $section = get_sub_field('our_courses');

    $limit   = $section['course_count'] ?? 3;
$terms = get_terms(array(
    'taxonomy'   => 'course',
    'hide_empty' => false,
    'number'     => $limit,
    'orderby'    => 'term_id',
    'order'      => 'DESC',
));

    
$heading = $section['top_heading'] ?? '';

    // Cut array to limit
   
?>

<section class="course-listing">
    <div class="container">

        <div class="top-head">

            <?php if ($heading): ?>
                <h2><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <a href="<?php echo esc_url(get_permalink(get_page_by_path('courses'))); ?>"
               class="banner-btn banner-btn-white">
                More Courses
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-blue.png" alt="">
            </a>

        </div>

        <div class="course-listing-wrapper">
            <div class="row">

                <?php if (!empty($terms)): ?>
                    <?php foreach ($terms as $term):

                        $term_link = get_term_link($term);
                        $image     = get_field('featured_image', 'course_' . $term->term_id);
                        $code      = get_field('course_code', 'course_' . $term->term_id);
                        $fee       = get_field('course_fee', 'course_' . $term->term_id);

                    ?>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="course-card">

                                <figure>

                                    <?php if ($image): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>"
                                             alt="<?php echo esc_attr($term->name); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course-placeholder.jpg"
                                             alt="Placeholder">
                                    <?php endif; ?>

                                    <?php if ($code): ?>
                                        <div class="course-tag">
                                            <span class="tag-text">
                                                <?php echo esc_html(strtoupper($code)); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                </figure>

                                <div class="course-card-content">

                                    <h3><?php echo esc_html($term->name); ?></h3>

                                    <?php if ($term->description): ?>
                                        <p><?php echo esc_html(wp_trim_words($term->description, 12)); ?></p>
                                    <?php endif; ?>

                                    <?php if ($fee): ?>
                                        <span class="course-fee">
                                            Fee: €<?php echo esc_html($fee); ?>
                                        </span>
                                    <?php endif; ?>

                                    <div class="d-flex align-items-center gap-3">
                                        <a href="<?php echo esc_url($term_link); ?>"
                                           class="banner-btn banner-btn-white">
                                            Read More
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-blue.png" alt="">
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>

    </div>
</section>

<?php endif; ?>
