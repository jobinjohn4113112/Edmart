<?php if (get_row_layout() == 'legitimate_courses'):

    $section = get_sub_field('legitimate_courses');

    $heading    = $section['heading'] ?? '';
    $logos      = $section['logos'] ?? [];
    $categories = $section['categories'] ?? [];

?>

<section class="legitimate-courses">
    <div class="container">

        <?php if ($heading): ?>
            <h2><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php if (!empty($logos)): ?>
            <div class="company-logo">
                <?php foreach ($logos as $logo): 
                    $image = $logo['logo_image'] ?? '';
                ?>
                    <?php if ($image): ?>
                        <div class="logo-wrapper">
                            <img src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($categories)): ?>
            <div class="course-category">
                <?php foreach ($categories as $item): 
                    $text = $item['category_text'] ?? '';
                ?>
                    <?php if ($text): ?>
                        <h3><?php echo esc_html($text); ?></h3>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="divider"></div>

    </div>
</section>

<?php endif; ?>
