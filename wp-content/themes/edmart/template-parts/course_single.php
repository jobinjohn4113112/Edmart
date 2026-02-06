<?php if (get_row_layout() == 'course_single'):

    $section = get_sub_field('course_single');

    $term      = $section['course'] ?? null;
    $override  = $section['override_description'] ?? '';
    $image_ovr = $section['override_image'] ?? '';

    if (!$term) return;

    $title = $term->name;
    $desc  = $override ? $override : $term->description;

    // default ACF image from taxonomy
    $image = $image_ovr ?: get_field('featured_image', 'course_' . $term->term_id);
?>

<section class="schedule-listing course-single">
    <div class="container">

        <h1><?php echo esc_html($title); ?></h1>

        <div class="divider"></div>

        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-6">
                    <div class="course-img">

                        <?php if ($image): ?>
                            <img src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_attr($title); ?>">
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course-placeholder.jpg"
                                 alt="Placeholder">
                        <?php endif; ?>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="course-content">

                        <h2><?php echo esc_html($title); ?></h2>

                        <?php if ($desc): ?>
                            <p><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- shapes stay static -->
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

<?php endif; ?>
