<?php
/**
 * Template Name: Generic Template
 */

get_header();
// Check value exists.
if( have_rows('flexible_content') ):

    // Loop through rows.
    while ( have_rows('flexible_content') ) : the_row();

        // Case: Paragraph layout.
        if( get_row_layout() == 'home_banner' ):
            $banner = get_sub_field('home_banner');
            // Do something...

        // Case: Download layout.
     elseif ( get_row_layout() == 'all_categorys' ) :
        $category = get_sub_field('all_categorys');
        get_template_part('taxonomy-course', null, array('category' => $category));

            // Do something...
        
        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
 get_footer();