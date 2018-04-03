<?php
/**
 * Template Name: Jobs – Listing
 *
 * TODO: Needs converting to single when CPT has been added.
 */

$blockTitle  = get_field('page_title');
$blockTitle  = $blockTitle['title'];
get_header();

include_once(MODELS_DIR . '_block_jobs.php');
$jobs_controller = new _block_jobs(null, null);
$jobs_controller->fetchCategories();
$block = $jobs_controller->fetchFeedPosts();

?>

<div class="clearfix || mt6" id="listing-job">

    <div class="container">

        <div class="col col-12 md-col-12 lg-col-12 || mb5 text-center || limit-p limit-p-80">

            <?php
            if (!empty($blockTitle[0]['title'])) {
                include(get_template_directory() .'/template-parts/newBlocks/sub-elements/_block_titles.php'); } ?>

            <div class="wysiwyg h4">
                <?=get_field('page_introduction')?>
            </div>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 clearfix">

            <div class="col col-12 mb5">

                <form action="#" class="width-100 || flex justify-center">

                    <?php $disabled = sizeof($block['sector_select_options']) == 0 ? "disabled" : ""; ?>
                    <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 jobs-filters" data-loadvalue="<?=get_query_var('sector')?>" id="sortby_sector" <?=$disabled?>>
                        <option value="">Filter by Sector</option>
                        <?php
                            foreach($block['sector_select_options'] as $option) :?>
                                <option value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>

                    <?php $disabled = sizeof($block['type_select_options']) == 0 ? "disabled" : ""; ?>
                    <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 jobs-filters" id="sortby_type" <?=$disabled?>>
                        <option value="">Filter by Type</option>
                        <?php
                            foreach($block['type_select_options'] as $option) :?>
                                <option value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>

                    <?php $disabled = sizeof($block['location_select_options']) == 0 ? "disabled" : ""; ?>
                    <select style="min-width:20%;" class="select md-ml3 width-100 md-width-auto box-shadow-3 jobs-filters" id="sortby_location" <?=$disabled?>>
                        <option value="">Filter by Location</option>
                        <?php foreach($block['location_select_options'] as $option) : ?>
                            <option class="option" value="<?=$option->slug?>" data-taxonomy="<?=$option->taxonomy?>"><?=$option->name?></option>
                            <?php foreach($option->children as $option_children): ?>
                                    <option class="optgroup" value="<?=$option_children->slug?>" data-taxonomy="<?=$option_children->taxonomy?>"><?=$option_children->name?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>

                </form>

            </div>

            <div id="jobs-listing" class="col col-12 md-col-8 mb6 clearfix">

                <?php foreach($block['posts']->posts as $post) :?>
                <div class="listItem || relative clearfix border-bottom border-light px5 py5 mb4 box-shadow-2">

                    <div class="col col-9">

                        <a href=""><h3 class="mb2 h4"><?=$post->post_title?></h3></a>

                        <?php if(get_field('jobs_role_salary', $post->ID) != 0):
                            $salary = "£".number_format(get_field('jobs_role_salary', $post->ID));
                        else :
                            $salary = "Salary not Specified";
                        endif; ?>
                        <p class="h5 mb0"><?=$post->locations[0]->name?><span class="muted"> •</span> <?=$salary?> <span class="muted">•</span> <?=$post->types[0]->name?></p>

                    </div>

                    <div class="col col-3 mt1">

                        <a href="<?=get_permalink($post->ID)?>" class="btn btn-primary btn-small white width-100 h6 right">Apply Now</a>

                    </div>

                </div>
                <?php endforeach; $page = 1;?>
                <nav class="pagination || clearfix block text-center border-top border-darken-1 py4 mt5">

                    <?php if($page - 2 > 0) :?> <span aria-current="page" data-page-number="<?=$page-2?>" class="page-numbers page-number cursor-pointer"><?=$page-2?></span> <?php endif;?>
                    <?php if($page - 1 > 0) :?> <span aria-current="page" data-page-number="<?=$page-1?>" class="page-numbers page-number cursor-pointer"><?=$page-1?></span> <?php endif;?>
                    <span aria-current="page" class="page-numbers current cursor-pointer"><?=$page?></span>
                    <?php if($page + 1 <= $block['posts']->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+1?>" class="page-numbers page-number cursor-pointer"><?=$page+1?></span><?php endif;?>
                    <?php if($page + 2 <= $block['posts']->max_num_pages) :?><span aria-current="page" data-page-number="<?=$page+2?>" class="page-numbers page-number cursor-pointer"><?=$page+2?></span><?php endif;?>

                </nav>

            </div>

            <div class="col col-12 md-col-4 mb5 px4">

                <div class="p4 bg-smoke">

                    <div class="block relative mb4 || min-height-v15 bg-cover bg-center bg-darken-3" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/ludovic-fremondiere-386793.jpg')">

                        <a href="#1" class="flex items-center justify-center || min-height-v15 || darken-background darken-background-4">

                            <h5 class="h3 white mb0">Box Title to Go Here</h5>

                        </a>

                    </div>

                    <div class="block relative mb4 || min-height-v15 bg-cover bg-center bg-darken-3" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/ludovic-fremondiere-386793.jpg')">

                        <a href="#2" class="flex items-center justify-center || min-height-v15 || darken-background darken-background-4">

                            <h5 class="h3 white mb0">Box Title to Go Here</h5>

                        </a>

                    </div>

                    <div class="block relative mb4 || min-height-v15 bg-cover bg-center bg-darken-3" style="background-image: url('http://devlocal.motionlabtheme.d3z.uk/app/uploads/2018/01/ludovic-fremondiere-386793.jpg')">

                        <a href="#3" class="flex items-center justify-center || min-height-v15 || darken-background darken-background-4">

                            <h5 class="h3 white mb0">Box Title to Go Here</h5>

                        </a>

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>

<script>

    //TODO: Move this into JS file

    function fetchJobs(page_number) {

        //TODO: Add loader while fetching data.
        var sector_filter   = $('#sortby_sector option:selected').val();
        var type_filter     = $('#sortby_type option:selected').val();
        var location_filter = $('#sortby_location option:selected').val();

        $.ajax({
            url: '<?php echo admin_url( "admin-ajax.php"); ?>',
            method: 'POST',
            data: {
                action: 'fetch_jobs',
                jobs_page: page_number,
                sector_filter: sector_filter,
                type_filter: type_filter,
                location_filter: location_filter
            },
            success: function(response){
                $('#jobs-listing').html(response);
                $('.js-match-height').matchHeight();
                $('html,body').animate({
                    scrollTop: 0},
                    'slow');
                }
        });
    }

    function updateFilterState(load_val) {
        $('#sortby_sector').val(load_val);
        fetchNewsPosts(1);
    }

    $(document).on('click', '.page-number', function(){
        var page_number = $(this).data('page-number');
        fetchJobs(page_number);
    });

    $('.jobs-filters').on('change', function() {
        if ($(this).attr('id') == 'sortby_sector') {
            history.pushState("find-a-job", "Cummins Mellor Recruitment", "/find-a-job/"+$(this).val());
        }
        fetchJobs(1);
    });

    $(document).on("ready", function() {
        updateFilterState($('#sortby_sector').data('loadvalue'));
    });

    window.onpopstate = function(event) {
        var value = document.location.href.substring(document.location.href.lastIndexOf("/") + 1) ;
        if(value != null)
            updateFilterState(value);
    };

</script>

<?php get_footer(); ?>
