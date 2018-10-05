<?php foreach($block['posts']->posts as $post) :
    if (has_post_thumbnail($post->ID)) {
        $image_url = get_attachment_image_url(get_post_thumbnail_id( $post->ID ), 'medium');
    } else {
        $image_url = get_field('fallback_image_news_listing', 'option');
    }
    ?>

    <div class="relative col col-12 sm-col-6 md-col-6 lg-col-4 pl4 pr4 my2" data-mh="post">

        <a href="<?=get_permalink($post->ID)?>"><h3 class="h4 brand-primary" data-mh="post-title"><?=$post->post_title?></h3></a>

        <a href="<?=get_permalink($post->ID)?>">
            <div class="image-holder bg-smoke square img-cover img-center mb4" style="background-image: url('<?=$image_url?>');">
                <?php if(empty($image_url)): ?>
                    <div class="flex items-center justify-center" style="padding-top:3.6rem">
                        <p class="lead text-center p4"><strong>NEWS POST</strong><br/><span style="font-size: .9rem; line-height: 1rem;">Please select or upload a featured image into this post!</span></p>
                    </div>
                <?php endif; ?>
            </div>
        </a>

        <p class="h5 mb3" data-mh="post-content"><?= strlen($post->post_excerpt) > 1 ? strip_tags($post->post_excerpt) : shorten_string(strip_tags($post->post_content),30);?></p>

        <a href="<?=get_permalink($post->ID)?>" class="block mb4 h5 bold">Read full story</a>

        <ul class="tags mb3 border-radius" data-mh="post-tags">
            <?php foreach($post->categories as $category) : ?>
                <li><a href="<?=$category->slug?>"><?=$category->name?></a></li>
            <?php endforeach; ?>
        </ul>

    </div>

<?php endforeach; ?>

<div class="clearfix relative">

    <?php include(BLOCKS_DIR . '_parts/__basic_pagination.php'); ?>

</div>
