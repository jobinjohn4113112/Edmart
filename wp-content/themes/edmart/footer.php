<!-- Footer -->
<footer class="footer mt-auto">
    <div class="container">
        <div class="row">

            <!-- Column 1 -->
            <div class="col-lg-4 col-md-12 mb-5 mb-md-5 mb-lg-0">
                <a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Edmart 1 Footer Logo.png"
                         alt="Edmart"
                         class="img-fluid mb-4"
                         style="max-height: 77px;" />
                </a>

                <p class="text-muted">
                    <?php echo get_theme_mod('footer_description', 'Add footer description from customizer'); ?>
                </p>
            </div>

            <!-- Column 2 -->
            <div class="col-lg-2 col-md-4 mb-4 mb-lg-0">
                <h5 class="footer-head">Company</h5>

                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_menu',
                    'container' => false,
                    'menu_class' => 'list-unstyled mb-0',
                    'fallback_cb' => false
                ]);
                ?>
            </div>

            <!-- Column 3 -->
            <div class="col-lg-3 col-md-4 mb-4 mb-lg-0">
                <h5 class="footer-head">Contact Us</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-12">
                        <a href="#" class="footer-link">
                            <?php echo get_theme_mod('footer_address', 'Add address in customizer'); ?>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 4 -->
            <div class="col-lg-3 col-md-4 mb-4 mb-lg-0">
                <h5 class="footer-head">Connect Us</h5>
                <ul class="list-unstyled mb-0">

                    <li>
                        <a href="#" class="footer-link">
                            WhatsApp :
                            <span class="fw-semibold">
                                <?php echo get_theme_mod('footer_whatsapp', '+353...'); ?>
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="footer-link">
                            Email :
                            <span class="fw-semibold">
                                <?php echo get_theme_mod('footer_email', 'info@email.com'); ?>
                            </span>
                        </a>
                    </li>

                    <li>
                        <ul class="list-unstyled d-flex gap-3 mt-32">
                            <li><a href="<?php echo get_theme_mod('facebook_link'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt=""></a></li>
                            <li><a href="<?php echo get_theme_mod('whatsapp_link'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/whatsapp.png" alt=""></a></li>
                            <li><a href="<?php echo get_theme_mod('instagram_link'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt=""></a></li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>

        <hr style="background: rgba(73, 81, 109, 0.50);">

        <div class="row align-items-center">
            <div class="col-12 text-center">
                <p class="copyright mb-0">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
                    <span class="lavender mx-2">|</span>

                    <?php wp_nav_menu([
                        'theme_location' => 'footer_bottom_menu',
                        'container' => false,
                        'menu_class' => 'd-inline-flex gap-2',
                        'fallback_cb' => false
                    ]); ?>
                </p>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
