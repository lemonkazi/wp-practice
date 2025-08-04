<?php $aivons_portfolio_category =  get_the_terms(get_the_iD(), 'portfolio_cat'); ?>
<?php $aivons_get_single_page_layout = !empty(get_post_meta(get_the_iD(), 'aivons_portfolio_single_layout', true)) ? get_post_meta(get_the_iD(), 'aivons_portfolio_single_layout', true) : 'layout_one'; ?>
<?php get_header(); ?>

    <!--Cases Details Start-->
    <section class="cases-details">
            <div class="container">
              <?php if( has_post_thumbnail() ) : ?>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cases-details__img">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_iD(), 'aivons_1170X534')); ?>" alt="<?php the_title(); ?>">
                        </div>
                    </div>
                </div>
              <?php endif; ?>
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="cases-details__left">
                            <div class="cases-details__content">
                                <div class="cases-details__icon">
                                <?php
                                $aivons_portfolio_fontawesome = '';
                                    if ('yes' == get_post_meta(get_the_ID(), 'aivons_portfolio_is_fontawesome', true)) {
                                        $aivons_portfolio_fontawesome = get_post_meta(get_the_ID(), 'portfolio_fontawesome_type', true);
                                    }
                                ?>
                                <span class="<?php echo esc_attr(get_post_meta(get_the_iD(), 'aivons_select_portfolio_icon', true) . ' ' . $aivons_portfolio_fontawesome); ?>"></span>
                                </div>
                                <h2 class="cases-details__title"><?php the_title(); ?></h2>
                                 <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="cases-details__right">
                            <ul class="cases-details__right-list list-unstyled">
                                <li>
                                    <p><?php esc_html_e('Client', 'aivons-addon'); ?></p>
                                    <span><?php echo esc_html(get_post_meta(get_the_iD(), 'aivons_portfolio_client', true)); ?></span>
                                </li>
                                <li>
                                    <p><?php esc_html_e('Category', 'aivons-addon'); ?></p>
                                    <?php foreach ($aivons_portfolio_category as $cat) {
                                         echo '<span class="category">' . esc_attr($cat->name) . '</span>';
                                     } ?>
                                </li>
                                <li>
                                    <p><?php esc_html_e('Date', 'aivons-addon'); ?></p>
                                    <span><?php echo esc_html(get_post_meta(get_the_iD(), 'aivons_portfolio_date', true)); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cases-details__pagination-box">
                            <ul class="cases-details__pagination list-unstyled ml-0">
                                <li class="next">
                                  <?php echo get_previous_post_link('%link', '<i class="icon-right-arrow"></i> &nbsp; ' . __('PREV', 'aivons-addon'))  ?>
                                    </li>
                                        <li class="count"><a href="#"></a></li>
                                        <li class="count"><a href="#"></a></li>
                                        <li class="count"><a href="#"></a></li>
                                        <li class="count"><a href="#"></a></li>
                                       <li class="previous">
                                        <?php echo get_next_post_link('%link', __('Next', 'aivons-addon') . '&nbsp;<i class="icon-right-arrow"></i>') ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!--Cases Details End-->

<?php get_footer(); ?>