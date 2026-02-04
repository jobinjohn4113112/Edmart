<?php
$category = $args['category'] ?? null;
?>

<section class="course-listing course-listing-course">
    <div class="container">
        <h1>Book Now</h1>
        <div class="divider"></div>

        <div class="course-listing-wrapper">
            <div class="row">

                <?php if( have_rows('courses') ): ?>
                    <?php while( have_rows('courses') ): the_row(); 

                        $image = get_sub_field('course_image');
                        $tag   = get_sub_field('course_tag');
                        $title = get_sub_field('course_title');
                        $desc  = get_sub_field('course_description');
                        $fee   = get_sub_field('course_fee');
                        $link  = get_sub_field('course_link');
                    ?>

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="course-card">
                            <figure>
                                <?php if($image): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <?php endif; ?>

                                <?php if($tag): ?>
                                    <div class="course-tag">
                                        <span class="tag-text"><?php echo esc_html($tag); ?></span>
                                    </div>
                                <?php endif; ?>
                            </figure>

                            <div class="course-card-content">
                                <h3><?php echo nl2br(esc_html($title)); ?></h3>
                                <p><?php echo esc_html($desc); ?></p>

                                <?php if($fee): ?>
                                    <span class="course-fee">Fee: <?php echo esc_html($fee); ?></span>
                                <?php endif; ?>

                                <?php if($link): ?>
                                <div class="d-flex align-items-center gap-3">
                                    <a href="<?php echo esc_url($link); ?>" class="banner-btn banner-btn-white">
                                        Read More 
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-blue.png">
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No courses added in ACF.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
