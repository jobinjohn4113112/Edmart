<?php if (get_row_layout() == 'contact_section'):

    $section = get_sub_field('contact_section');

    $items = $section['contact_items'] ?? [];
    $image = $section['image'] ?? '';

?>

<section class="contact-section">
    <div class="container">
        <div class="contact-section-wrapper">

            <?php if (!empty($items)): ?>
                <div class="contact-content">

                    <?php foreach ($items as $item): 
                        $icon  = $item['icon'] ?? '';
                        $label = $item['label'] ?? '';
                        $link  = $item['link'] ?? '';
                    ?>

                        <div class="whatsapp">
                            <?php if ($icon): ?>
                                <img src="<?php echo esc_url($icon['url']); ?>"
                                     alt="<?php echo esc_attr($icon['alt']); ?>">
                            <?php endif; ?>

                            <div class="whatsapp-content">
                                <?php if ($label): ?>
                                    <span class="whatsapp-text">
                                        <?php echo esc_html($label); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ($link): ?>
                                    <span class="whatsapp-number">
                                        <a href="<?php echo esc_url($link['url']); ?>"
                                           target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                            <?php echo esc_html($link['title']); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

            <?php if ($image): ?>
                <figure>
                    <img src="<?php echo esc_url($image['url']); ?>"
                         alt="<?php echo esc_attr($image['alt']); ?>">
                </figure>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php endif; ?>
