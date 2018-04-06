<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 05/04/18
 * Time: 10:52
 */

?>
<div class="grid-sizer"></div>

<?php foreach($testimonials['posts']->posts as $post) : ?>
    <div class="col col-4 || grid-item">

        <div class="m2 || border border-smoke">

            <div class="content || p3 pb0 px4">

                <p><?=get_field('reviewer_body', $post->ID)?></p>

            </div>


            <div class="content || pt2 pb3 px4">

                <div class="author bold">

                    <p class="block h6 mb0"><?=get_field('reviewer_name', $post->ID)?></p>
                    <p class="block h6 mb0"><?=get_field('reviewer_locations', $post->ID)?></p>

                </div>

            </div>

        </div>

    </div>
<?php endforeach; ?>