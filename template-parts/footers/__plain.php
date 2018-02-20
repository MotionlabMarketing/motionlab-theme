<div class="bg-body">

    <div class="container">

        <div class="col col-12 lg-col-12 text-left pt3 md-pb3 lg-pt3 lg-pb6 md-mb4">

            <div class="col col-12 sm-col-4 md-col-2 mb3 md-mb0 || black || js-match-height">

                <?php dynamic_sidebar( 'footer_column_1' ); ?>

            </div>

            <div class="col col-12 sm-col-4 md-col-2 mb3 md-mb0 || black || js-match-height">

                <?php dynamic_sidebar( 'footer_column_2' ); ?>

            </div>

            <div class="col col-12 sm-col-4 md-col-2 mb3 md-mb0 || black || js-match-height">

                <?php dynamic_sidebar( 'footer_column_3' ); ?>

            </div>

            <div class="col col-12 md-col-6 relative || black || js-match-height">

                <nav class="social social-inline">

                    <ul class="list-reset || md-absolute bottom-0 right-0 text-right mt3 md-mt0">
                        <?php if (have_rows('social_links', 'option')): while (have_rows('social_links', 'option')): the_row() ?>
                            <li>
                                <a target="_blank" href="<?=get_sub_field('link', 'option') ?>" class="brand-primary">
                                    <i class="fa <?=get_sub_field('icon', 'option'); ?> mr3"></i>
                                </a>
                            </li>
                        <?php endwhile; endif; ?>
                    </ul>

                </nav>

            </div>

        </div>

    </div>

    <?php if ($hidden == true):?>
    <div class="container clearfix py3 h6 pb4">

        <?php include(get_template_directory() . '/template-parts/global/menus/tnc_menu.php'); ?>

    </div>
    <?php endif; ?>

</div>
