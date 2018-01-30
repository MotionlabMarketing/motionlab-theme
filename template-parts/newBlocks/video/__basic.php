<?php
/**
 * TEAM – BASIC LAYOUT BLOCK ------------------------
 * A basic listing layout for some of the team members.
 *
 * @author Joe Curran
 * @created 29 Jan 2018
 *
 * @version 1.00
 */

$videosShow = get_sub_field('number_of_videos');

$blockTitle = get_sub_field('block_videos_title_title');
?>

<section class="video-basic || clearfix my4 mb6">

    <div class="container">

        <div class="col-12 || mb5 || text-center">

            <div class="mb4">
                <?php
                if (!empty($blockTitle)) {
                    include(get_template_directory() . '/template-parts/newBlocks/sub-elements/_block_titles.php');
                } ?>
            </div>

            <div class="wysiwyg || mx6 px6">
                <?= get_sub_field('block_video_content'); ?>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="col col-4">

            <div class="m2 || border border-smoke">

                <div class="video || block relative min-height-v25">

                    <iframe width="100%" height="285" src="https://www.youtube.com/embed/Tby7FnaCqAo" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    <p class="absolute bottom-0 right-0 white p2 pl3 px4 mb0 bg-lighten-4"
                       style="bottom: 0.4rem; border-radius: 1rem 0 0 0; right: -0.05rem; ">0:00</p>

                </div>

                <div class="image || p4">

                    <h3 class="mb2">Video Title</h3>

                    <p><?=limit_words(strip_tags("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie erat tempus sem commodo, in sagittis odio hendrerit."), "10")?></p>

                    <div class="author">

                        <img src="<?= get_avatar_url(get_current_user_id()); ?>" alt=""
                             class="circle mr2 left profile-small">

                        <p class="inline-block h6 muted">John Doe</p>

                    </div>

                </div>

            </div>

        </div>

        <div class="col col-4">

            <div class="m2 || border border-smoke">

                <div class="video || block relative min-height-v25">

                    <iframe width="100%" height="285" src="https://www.youtube.com/embed/Tby7FnaCqAo" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    <p class="absolute bottom-0 right-0 white p2 pl3 px4 mb0 bg-lighten-4"
                       style="bottom: 0.4rem; border-radius: 1rem 0 0 0; right: -0.05rem; ">0:00</p>

                </div>

                <div class="image || p4">

                    <h3 class="mb2">Video Title</h3>

                    <p><?=limit_words(strip_tags("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie erat tempus sem commodo, in sagittis odio hendrerit."), "10")?></p>

                    <div class="author">

                        <img src="<?= get_avatar_url(get_current_user_id()); ?>" alt=""
                             class="circle mr2 left profile-small">

                        <p class="inline-block h6 muted">John Doe</p>

                    </div>

                </div>

            </div>

        </div>

        <div class="col col-4">

            <div class="m2 || border border-smoke">

                <div class="video || block relative min-height-v25">

                    <iframe width="100%" height="285" src="https://www.youtube.com/embed/Tby7FnaCqAo" frameborder="0"
                            allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    <p class="absolute bottom-0 right-0 white p2 pl3 px4 mb0 bg-lighten-4"
                       style="bottom: 0.4rem; border-radius: 1rem 0 0 0; right: -0.05rem; ">0:00</p>

                </div>

                <div class="image || p4">

                    <h3 class="mb2">Video Title</h3>

                    <p><?=limit_words(strip_tags("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin molestie erat tempus sem commodo, in sagittis odio hendrerit."), "10")?></p>

                    <div class="author">

                        <img src="<?= get_avatar_url(get_current_user_id()); ?>" alt=""
                             class="circle mr2 left profile-small">

                        <p class="inline-block h6 muted">John Doe</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>