

        <?php if (get_row_layout() == 'home_banner'): 
            $banner = get_sub_field('home_banner');

            $heading      = $banner['heading'] ?? '';
            $description  = $banner['description'] ?? '';
            $contact      = $banner['contact'] ?? '';
            $find_courses = $banner['find_courses'] ?? '';
            $image        = $banner['image'] ?? '';
        ?>

        <section class="banner-section">
            <div class="container">
                <div class="inner-wrapper">
                    <div class="row">

                        <div class="col-lg-5">
                            <div class="banner-content">

                                <?php if ($heading): ?>
                                    <h1 class="mb-24"><?php echo esc_html($heading); ?></h1>
                                <?php endif; ?>

                                <?php if ($description): ?>
                                    <p class="mb-4 text-black">
                                        <?php echo esc_html($description); ?>
                                    </p>
                                <?php endif; ?>

                                <div class="d-flex align-items-center button-wrapper">

                                    <?php if ($contact): ?>
                                        <a href="<?php echo esc_url($contact['url']); ?>"
                                           class="banner-btn banner-btn-blue"
                                           target="<?php echo esc_attr($contact['target'] ?: '_self'); ?>">
                                            <?php echo esc_html($contact['title']); ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-white.png" alt="">
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($find_courses): ?>
                                        <a href="<?php echo esc_url($find_courses['url']); ?>"
                                           class="banner-btn banner-btn-white"
                                           target="<?php echo esc_attr($find_courses['target'] ?: '_self'); ?>">
                                            <?php echo esc_html($find_courses['title']); ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-blue.png" alt="">
                                        </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <?php if ($image): ?>
                                <figure>
                                    <img src="<?php echo esc_url($image['url']); ?>"
                                         alt="<?php echo esc_attr($image['alt']); ?>">
                                </figure>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="banner-design1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/design1.png" alt="">
            </div>

            <div class="banner-design2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/design2.png" alt="">
            </div>
        </section>

        <?php endif; ?>

