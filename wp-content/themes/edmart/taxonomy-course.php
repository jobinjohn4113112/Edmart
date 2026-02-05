<?php
get_header();

$term = get_queried_object();
$term_key = $term->taxonomy . '_' . $term->term_id;

$featured_image = get_field('featured_image', $term_key);
?>

<!-- Course Single -->
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

<?php if (have_rows('course_flexible_content', $term_key)): ?>
<?php while (have_rows('course_flexible_content', $term_key)) : the_row(); ?>

<!-- LEFT RIGHT BLOCK -->
<?php if (get_row_layout() == 'left_right_repeater_content'): ?>

<div class="row requirements">

    <div class="col-lg-6 requirements-left">

        <?php while (have_rows('heading_description_repeater_left')) : the_row(); ?>
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

        <?php while (have_rows('heading_description_repeater_right')) : the_row(); ?>
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
while (have_rows('three_column_repeater')) : the_row();
?>
<div class="col-lg-4 col-md-6 col-sm-12">
    <ul class="course-content-list">
        <?php while (have_rows('list_text')) : the_row(); ?>
            <li><?php echo esc_html(get_sub_field('text')); ?></li>
        <?php endwhile; ?>
    </ul>
</div>
<?php endwhile; endif; ?>


<?php
if ($cols == 2 && have_rows('two_column_repeater')):
while (have_rows('two_column_repeater')) : the_row();
?>
<div class="col-lg-6 col-md-6 col-sm-12">
    <ul class="course-content-list">
        <?php while (have_rows('list_text')) : the_row(); ?>
            <li><?php echo esc_html(get_sub_field('text')); ?></li>
        <?php endwhile; ?>
    </ul>
</div>
<?php endwhile; endif; ?>

</div>
</div>
</section>

<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

        </div>
    </div>

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
