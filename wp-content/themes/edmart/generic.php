<?php
/**
 * Template Name: Generic Template
 */

get_header();

if (have_rows('flexible_content')) :

    while (have_rows('flexible_content')) : the_row();

        $layout = get_row_layout();

        // Load template part based on layout name
        get_template_part('template-parts/' . $layout);

    endwhile;

endif;

get_footer();
