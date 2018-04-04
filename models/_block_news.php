<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 01/03/18
 * Time: 11:57
 */
Class _block_news
{

	private $current;
	private $layout;
	private $block = [];
	private $latest = true;

	public function __construct($block, $current) {

		$this->block = $block;
		$this->current = $current;
		$this->layout = get_sub_field($current . '_layout');

		$this->loadBlockSettings();

		$this->fetchLatestPosts();

	}

	private function loadBlockSettings() {

		$this->block['content']['type']      = get_sub_field($this->current . '_selection');
		$this->block['content']['feeds']     = get_sub_field($this->current . '_enabledSocial');
		$this->block['content']['link']      = get_sub_field($this->current . '_enabledmore');
		$this->block['content']['articles']  = get_sub_field($this->current . '_articles');
		$this->block['content']['link']      = get_sub_field($this->current . '_news_link');
		$this->block['content']['txtColor']  = get_sub_field($this->current . '_txtColor_system_text_colours');

		$this->block['content']['date']      = get_sub_field($this->current . '_enablePostDate');
		$this->block['content']['buttons']   = get_sub_field($this->current . '_enableButtons');
		$this->block['content']['button']    = get_sub_field($this->current . '_buttons');



		// GET THE COLUMN SIZES NEEDED IF SOCIAL IS INCLUDED.
		if ($this->block['content']['feeds'] == true):

		    $this->block['content']['cols'] = [0 => '8', 1 => '4'];
		    $this->block['temp'] = get_field('social_links', 'option');

		    // NEED TO BE SWITCHED ROUND REALLY.
		    foreach ($this->block['temp'] as $a):

		        // GET FACEBOOK USERNAME
		        if (strpos($a['link'] , "facebook") == true):
		            $b = explode("/", $a['link']);
                    $this->block['content']['profiles']['facebook'] = $b[3];
		        endif;

		        // GET TWITTER USERNAME
		        if (strpos($a['link'] , "twitter") == true):
		            $b = explode("/", $a['link']);
                    $this->block['content']['profiles']['twitter'] = $b[3];
		        endif;
		    endforeach;

		    unset($this->block['temp']);

		else:

		    $this->block['content']['cols'] = [0 => '12'];

		endif;

	}

	public function fetchFeedPosts( $post_per_page = 12, $page = 1 ) {

		$tax_query = [];
		if(isset($_POST['order_filter']) && $_POST['order_filter'] != ''): $orderby = $_POST['order_filter']; else : $orderby = 'date'; endif;
		if ( isset($_POST['category_filter']) && $_POST['category_filter'] != '' ) {
			$tax_query[] = [
				'taxonomy'  => 'category',
				'terms'     => [ $_POST['category_filter'] ],
				'field'     => 'slug'
			];
		}

		$order = "ASC";
		if($orderby == 'date')
			$order = "DESC";

		$args = array(
			'posts_per_page'    => $post_per_page,
			'paged'             => $page,
			'post_type'         => 'post',
			'orderby'           => $orderby,
			'order'             => $order,
			'tax_query'         => $tax_query
		);

		$this->block['posts'] = new WP_Query( $args );

		foreach($this->block['posts']->posts as $key => $post) {

			$this->block['posts']->posts[$key]->categories = get_the_terms($post->ID, 'category');

		}

		return $this->block['posts'];
	}

	public function fetchCSRPosts( $post_per_page = 12, $page = 1 ) {

		$tax_query[] = [
			'taxonomy'  => 'post_specific_types',
			'terms'     => [ 'csr' ],
			'field'     => 'slug'
		];

		if(isset($_POST['order_filter']) && $_POST['order_filter'] != ''): $orderby = $_POST['order_filter']; else : $orderby = 'date'; endif;

		if ( isset($_POST['category_filter']) && $_POST['category_filter'] != '' ) {
			$tax_query[] = [
				array(
					'relation'  => 'AND',
					[
						'taxonomy'  => 'category',
						'terms'     => [ $_POST['category_filter'] ],
						'field'     => 'slug'
					],
					$tax_query[0]
				)

			];
		}

		$order = "ASC";
		if($orderby == 'date')
			$order = "DESC";

		$args = array(
			'posts_per_page'    => $post_per_page,
			'paged'             => $page,
			'post_type'         => 'post',
			'orderby'           => $orderby,
			'order'             => $order,
			'tax_query'         => $tax_query
		);

		$this->block['posts'] = new WP_Query( $args );

		foreach($this->block['posts']->posts as $key => $post) {

			$this->block['posts']->posts[$key]->categories = get_the_terms($post->ID, 'category');

		}

		return $this->block['posts'];
	}

	private function fetchLatestPosts($count = 3) {

		if($this->block['content']['type'] == "latest") {

			$args = array(
				'posts_per_page'    => $count,
				'paged'             => 1,
				'post_type'         => 'post',
				'orderby'           => 'date',
				'order'             => 'DESC'
			);

			$this->block['posts'] = new WP_Query( $args );

			foreach($this->block['posts']->posts as $key => $post) {

				$this->block['posts']->posts[$key]->categories = get_the_terms($post->ID, 'category');

			}

		} else {

			foreach(get_sub_field('block_news_articles') as $post_id) {
				$this->block['posts']->posts[] = get_post($post_id);
			}

			foreach($this->block['posts']->posts as $key => $post) {

				$this->block['posts']->posts[$key]->categories = get_the_terms($post->ID, 'category');

			}
		}


	}

	public function renderBlock() {
		$block = $this->block;

		switch ($block['layout']):
		    case "list":
		        include(BLOCKS_DIR . 'news/__list.php');
		        break;
		    case "row":
		        include(BLOCKS_DIR . 'news/__row.php');
		        break;
		    default:
		        include(BLOCKS_DIR . 'news/__column.php');
		        break;
		endswitch;

	}
}
