<?php
get_header(); ?>

<!--Services Details Start-->
<section class="services-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="services-details__left">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="services-details__img">
                            <?php the_post_thumbnail('aivons_service_details_770X424'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="services-details__top-content">
                        <h2 class="services-details__top-title"><?php echo strip_tags(get_the_title()); ?></h2>
                        <?php the_content(); ?>
                    </div>
                    <div class="services-details__bottom-box">
                        <?php $avson_feature_items = get_post_meta(get_the_ID(), 'aivons_service_feature_box', true); ?>
                        <?php if (!empty($avson_feature_items)) : ?>
                            <?php foreach ($avson_feature_items as $item) : ?>
                                <div class="services-details__bottom-box-single">
                                    <div class="services-details__bottom-box-icon">
                                        <?php
                                        $aivons_service_fontawesome = '';
                                        if ('yes' == $item['aivons_feature_is_fontawesome']) {
                                            $aivons_service_fontawesome = $item['feature_fontawesome_types'];
                                        }
                                        ?>
                                        <span class="<?php echo esc_attr($item['aivons_feature_box_icon'] . ' ' . $aivons_service_fontawesome); ?>"></span>
                                    </div>
                                    <div class="services-details__bottom-box-content">
                                        <h4 class="services-details__bottom-box-title"><?php echo wp_kses($item['aivons_feature_box_title'], 'aivons_allowed_tags'); ?></h4>
                                        <p class="services-details__bottom-box-text"><?php echo wp_kses($item['aivons_feature_box_content'], 'aivons_allowed_tags'); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="services-details__sidebar">
                    <div class="services-details__services-list-box">
                        <h3 class="services-detials__categories"><?php echo wp_kses(get_theme_mod('aivons_sidebar_menu_title', __('All Services', 'aivons')), 'aivons_allowed_tags'); ?></h3>
                        <?php if (!empty(get_theme_mod('aivons_sidebar_menu_item'))) : ?>
                            <?php wp_nav_menu(array(
                                'menu' => get_theme_mod('aivons_sidebar_menu_item'),
                                'menu_class' => 'services-details__services-list list-unstyled ml-0',
                                'link_before'      => '<span class="icon-right-arrow"></span>'
                            )); ?>
                        <?php endif; ?>
                    </div>
                    <div class="services-details__help-box">
                        <?php if (!empty(get_theme_mod('aivons_contact_sidebar_image'))) : ?>
                            <div class="services-details__help-box-bg" style="background-image: url( <?php echo esc_url(get_theme_mod('aivons_contact_sidebar_image')); ?> )">
                            </div>
                        <?php endif; ?>
                        <div class="services-details__help-box-bg-overly"></div>
                        <h3 class="services-details__help-box-title"><?php echo wp_kses(get_theme_mod('aivons_sidebar_contact_title', __('Need Help?', 'aivons')), 'aivons_allowed_tags'); ?></h3>
                        <p class="services-details__help-box-text"><?php echo wp_kses(get_theme_mod('aivons_sidebar_contact_text', __('Default Text?', 'aivons')), 'aivons_allowed_tags'); ?>
                        </p>
                        <a href="tel:<?php echo esc_url(get_theme_mod('aivons_sidebar_contact_number_link', __('#', 'aivons'))); ?>" class="services-details__phone"><?php echo esc_html(get_theme_mod('aivons_sidebar_contact_number', __('666 888 000', 'aivons'))); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Services Details End-->

<?php
get_footer();
