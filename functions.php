<?php

/*
=======================================================================================================================================================================
========== SIDEBARS ===================================================================================================================================================
=======================================================================================================================================================================
*/

add_action( 'widgets_init', 'my_register_sidebars' );

function my_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'main',
			'name' => __( 'Main Sidebar', 'shininess' ),
			'description' => __( 'On almost every page', 'shininess' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	register_sidebar(
		array(
			'id' => 'top',
			'name' => __( 'Top Sidebar', 'shininess' ),
			'description' => __( 'A long banner above posts', 'shininess' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	register_sidebar(
		array(
			'id' => 'home',
			'name' => __( 'Home Page Sidebar', 'shininess' ),
			'description' => __( 'Used only on the home page', 'shininess' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	register_sidebar(
		array(
			'id' => 'footer',
			'name' => __( 'Footer Content', 'shininess' ),
			'description' => __( 'Used to add widgets to the footer above the copyright', 'shininess' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	/* Repeat register_sidebar() code for additional sidebars. */
}



















//:::: Step 1 :::::: add the following to functions.php :::::::::::::::::://
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://
 
 
 
add_action( 'better_page_links', 'better_page_links', 10, 1 );
/**
 * Modification of wp_link_pages() for custom styling for foundation 2 & 3 by Zurb for use within wordpress.
 *
 * Please retain author links.
 *
 * @ author:     Flickapix Dezign
 * @ author url: http://dezign.flickapix.co.uk
 * @ param  array $args
 * @ return void
 */
function better_page_links( $args = array () )
{
    $defaults = array(
        'before'         => '<ul>',
        'after'          => '</ul>',
        'link_before'    => '',
        'next_or_number' => 'number',
        'link_after'     => '',
        'pagelink'       => '%',
        'echo'           => 1,
        'pages'          => '',
        'current_first'  => '<li class="current">',
        'current_last'   => '</li>',
    );
 
    $r = wp_parse_args( $args, $defaults );
    $r = apply_filters( 'wp_link_pages_args', $r );
    extract( $r, EXTR_SKIP );
 
    global $page, $numpages, $multipage, $more, $pagenow;
 
    
 
    if ( ! $multipage )
    {
        return;
    }
 
    $output = $before;
    
 //   print $output . $pages;
    
    for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
    {
        $j       = str_replace( '%', $i, $pagelink );
        $output .= ' ';
 
        if ( $i != $page || ( ! $more && 1 == $page ) )
        {
            $output .= "<li>";
            $output .= _wp_link_page( $i ) . "{$link_before}{$j}{$link_after}</a>";
            $output .= "</li>";
        }
        else
        {   
            $output .= "{$current_first}{$link_before}{$j}{$link_after}{$current_last}";
        }
    }
 
    print '<div class="pagination"><span>Page ' . $page . ' of ' . $j . '</span>' . $output . $after . '</div>';
}

 
//:::: Step 2 :::::: add the following to loop-page.php :::::::::::::::::://
//::::::::::::::::::: replacing wp_link_pages line :::::::::::::::::::::://
 

 
//:::: Step 3 :::::: add the following to styles.css :::::::::::::::::://
//:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::://
 
// ul.pagination .pages { float: left; display: block; height: 24px; font-size: 15px; margin:4px 10px 0 5px;}
 
 
//::::::::::::::::: Thats it ! Enjoy native foundation pagination styling on pages :::::::::::::::::::::::://








/*
=======================================================================================================================================================================
========== PAGINATION =================================================================================================================================================
=======================================================================================================================================================================
*/

function pagination($pages = '', $range = 4)

{

     $showitems = ($range * 2)+1;  

 

     global $paged;

     if(empty($paged)) $paged = 1;

 

     if($pages == '')

     {

         global $wp_query;

         $pages = $wp_query->max_num_pages;

         if(!$pages)

         {

             $pages = 1;

         }

     }   

 

     if(1 != $pages)

     {

         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span><ul>";

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";

         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

 

         for ($i=1; $i <= $pages; $i++)

         {

             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

             {

                 echo ($paged == $i)? "<li class=\"current\">".$i."</span>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";

             }

         }

 

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";

         echo "</ul></div>\n";

     }

}






 

 
/**
 * This class removes the default excerpt metabox
 * and adds a new box with the wysiwyg editor capability
 * @author etessore
 */
class TinyMceExcerptCustomization{
	const textdomain = '';
	const custom_excerpt_slug = '_custom-excerpt';
	var $contexts;
 
	/**
	 * Set the feature up
	 * @param array $contexts a list of context where you want the wysiwyg editor in the excerpt field. Default array('post','page')
	 */
	function __construct($contexts=array('post', 'review', 'page')){
		
		$this->contexts = $contexts;
		
		add_action('admin_menu', array($this, 'remove_excerpt_metabox'));
		add_action('add_meta_boxes', array($this, 'add_tinymce_to_excerpt_metabox'));
		add_filter('wp_trim_excerpt',  array($this, 'custom_trim_excerpt'), 10, 2);
		add_action('save_post', array($this, 'save_box'));
	}
	
	/**
	 * Removes the default editor for the excerpt
	 */
	function remove_excerpt_metabox(){
		foreach($this->contexts as $context)
			remove_meta_box('postexcerpt', $context, 'normal');
	}
	
	/**
	 * Adds a new excerpt editor with the wysiwyg editor
	 */
	function add_tinymce_to_excerpt_metabox(){
		foreach($this->contexts as $context)
		add_meta_box(
			'tinymce-excerpt', 
			__('Excerpt', self::textdomain), 
			array($this, 'tinymce_excerpt_box'), 
			$context, 
			'normal', 
			'high'
		);
	}
	
	/**
	 * Manages the excerpt escaping process
	 * @param string $text the default filtered version
	 * @param string $raw_excerpt the raw version
	 */
	function custom_trim_excerpt($text, $raw_excerpt) {
		global $post;
		$custom_excerpt = get_post_meta($post->ID, self::custom_excerpt_slug, true);
		if(empty($custom_excerpt)) return $text;
		$custom_excerpt = do_shortcode($custom_excerpt);
		return $custom_excerpt;
	}
 
	/**
	 * Prints the markup for the tinymce excerpt box
	 * @param object $post the post object
	 */
	function tinymce_excerpt_box($post){
		$content = get_post_meta($post->ID, self::custom_excerpt_slug, true);
		if(empty($content)) $content = '';
		wp_editor(
			$content,
			self::custom_excerpt_slug,
			array(
				'wpautop'		=>	true,
				'media_buttons'	=>	true,
				'textarea_rows'	=>	10,
				'textarea_name'	=>	self::custom_excerpt_slug
			)
		);
	}
	
	/**
	 * Called when the post is being saved
	 * @param int $post_id the post id
	 */
	function save_box($post_id){
		if (isset($_POST[self::custom_excerpt_slug]))
			update_post_meta($post_id, self::custom_excerpt_slug, $_POST[self::custom_excerpt_slug]);
	}
}
 
global $tinymce_excerpt;
$tinymce_excerpt = new TinyMceExcerptCustomization();












/*
=======================================================================================================================================================================
========== THEME SUPPORT ==============================================================================================================================================
=======================================================================================================================================================================
*/


if ( ! isset( $content_width ) ) $content_width = 829;
$args = array(
	'flex-width'    => true,
	'width'         => 1170,
	'flex-height'    => true,
	'height'        => 200,
	'header-text'   => true,
	'default-image' => get_template_directory_uri() . '/img/header.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'menus' );
add_theme_support( 'woocommerce' );
add_image_size( 'featured', 548, 9999 ); //548 pixels wide (and unlimited height)


function register_my_menus() {
  register_nav_menus(
    array(
      'menu1' => __( 'Menu 1', 'shininess' ),
      'menu2' => __( 'Menu 2', 'shininess' )
    )
  );
}
add_action( 'init', 'register_my_menus' );





 
/* old crappy way of stripping image widths and heights
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
 
function remove_thumbnail_dimensions( $html ) {
        $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
        return $html;
}
*/





// scripts function
add_action('wp_enqueue_scripts','wpexplorer_scripts_function');
function wpexplorer_scripts_function() {

// load jquery if it isn't
wp_enqueue_script('jquery');

 // SuperFish Scripts
 wp_enqueue_script('hoverintent', get_stylesheet_directory_uri() . '/js/hoverintent.js');
 wp_enqueue_script('superfish', get_stylesheet_directory_uri() . '/js/superfish.js');
 wp_enqueue_script('supersubs', get_stylesheet_directory_uri() . '/js/supersubs.js');
}


// remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {

	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'review' ) );

	return $query;
}














function my_custom_post_review() {
	$labels = array(
		'name'               => _x( 'Reviews', 'post type general name' ),
		'singular_name'      => _x( 'Review', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'review' ),
		'add_new_item'       => __( 'Add New Review', 'shininess' ),
		'edit_item'          => __( 'Edit Review', 'shininess' ),
		'new_item'           => __( 'New Review', 'shininess' ),
		'all_items'          => __( 'All Reviews', 'shininess' ),
		'view_item'          => __( 'View Review', 'shininess' ),
		'search_items'       => __( 'Search Reviews', 'shininess' ),
		'not_found'          => __( 'No reviews found', 'shininess' ),
		'not_found_in_trash' => __( 'No reviews found in the Trash', 'shininess' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Reviews'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Product and Media Reviews',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'author', 'trackbacks', 'revisions', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'review', $args );	
}
add_action( 'init', 'my_custom_post_review' );

function my_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['review'] = array(
		0 => '', 
		1 => sprintf( __('Review updated. <a href="%s">View review</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.', 'shininess'),
		3 => __('Custom field deleted.', 'shininess'),
		4 => __('Review updated.', 'shininess'),
		5 => isset($_GET['revision']) ? sprintf( __('Review restored to revision from %s', 'shininess'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Review published. <a href="%s">View review</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Review saved.'),
		8 => sprintf( __('Review submitted. <a target="_blank" href="%s">Preview review</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Review scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview review</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Review draft updated. <a target="_blank" href="%s">Preview review</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
}





add_filter( 'post_updated_messages', 'my_updated_messages' );

function my_contextual_help( $contextual_help, $screen_id, $screen ) { 
	if ( 'edit-review' == $screen->id ) {

		$contextual_help = '<h2>Reviews</h2>
		<p>Reviews are a thorough examination of a product with ratings and comparisons to similar products. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
		<p>You can view/edit the details of each review by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';

	} elseif ( 'review' == $screen->id ) {
		$contextual_help = '<h2>Editing reviews</h2>
		<p>This page allows you to view/modify reviews. Please make sure to fill out the available boxes with the appropriate details and <strong>not</strong> add these details to the review description.</p>';
	}
	return $contextual_help;
}
add_action( 'contextual_help', 'my_contextual_help', 10, 3 );


function codex_custom_help_tab() {
	global $post_ID;
	$screen = get_current_screen();

	if( isset($_GET['post_type']) ) $post_type = $_GET['post_type'];
	else $post_type = get_post_type( $post_ID );

	if( $post_type == 'review' ) :

		$screen->add_help_tab( array(
			'id' => 'ratings', //unique id for the tab
			'title' => 'Ratings System I', //unique visible title for the tab
			'content' => '<h3>How to use the Star Ratings</h3><p>The review system defaults to a 5-star system. Use shortcodes to control the score for any number of categories. All scores are converted to a 100-point system and rounded to the closest half-star.</p>
			<p>Examples:<ul><li>[rating:3.5] becomes 3 and a half stars out of 5 because of the default 5-star system</li><li>[rating:3/4] becomes 3 stars out of 4 because the amount of stars was explicitly stated as 4</li><li>[rating:10/20] becomes ten stars out of twenty. Twenty is the max amount of stars possible.</li><li>[rating:47/100]becomes 2 and a half stars because it rounds to the closest half-star.</li></ul></p>',  //actual help text
		));
		$screen->add_help_tab( array(
			'id' => 'ratings2', //unique id for the tab
			'title' => 'Ratings System II', //unique visible title for the tab
			'content' => '<h3>Overall Ratings</h3><p>You can use the overall shortcode to display an average total rating based on previous ratings in the same review.</p>
			<p>Examples:<ul><li>[rating:overall] shows the overall rating using the five-star system</li><li>[rating:overall/4] shows the overall rating in a 4-star system. Max is 20 stars.</li></p>
			<p>The overall shortcode can be used to total one of several groups in a review. The overall rating shortcode will only average ratings that have gone before it, and will not average ratings that precede another overall shortcode.
			<p>In the event you use several overall shortcodes in your review, a cumulative score is still displayed using the built-in rating field, displayed near the title in this theme.</p>',  //actual help text
		));

	endif;

}

add_action('admin_head', 'codex_custom_help_tab');





function my_taxonomies_review() {
	$labels = array(
		'name'              => _x( 'Review Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Review Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Review Categories', 'shininess' ),
		'all_items'         => __( 'All Review Categories', 'shininess' ),
		'parent_item'       => __( 'Parent Review Category', 'shininess' ),
		'parent_item_colon' => __( 'Parent Review Category:', 'shininess' ),
		'edit_item'         => __( 'Edit Review Category', 'shininess' ), 
		'update_item'       => __( 'Update Review Category', 'shininess' ),
		'add_new_item'      => __( 'Add New Review Category', 'shininess' ),
		'new_item_name'     => __( 'New Review Category', 'shininess' ),
		'menu_name'         => __( 'Review Categories', 'shininess' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'review_category', 'review', $args );
}
add_action( 'init', 'my_taxonomies_review', 0 );







/*
=======================================================================================================================================================================
========== BREADCRUMBS MODIFIED FROM BOOTSTRAPWP ======================================================================================================================
=======================================================================================================================================================================
*/
 function shiny_breadcrumbs() {

  $home = 'Home'; // text for the 'Home' link
  $before = '<li class="currentcrumb">'; // tag before the current crumb
  $after = '</li>'; // tag after the current crumb

  if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<ul class="breadcrumb clearfix">';

    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo $before . (get_category_parents($parentCat, TRUE, '')) . $after;  // double quotes after TRUE define no trailing slash
      echo $before . 'All articles in <em>' . single_cat_title('', false) . '</em>' . $after;

    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) { // if it's single and not an attachment
      if ( get_post_type() != 'post' ) {    // if it's not a post or for some reason a page though I don't see where it checks that
        $post_type = get_post_type_object(get_post_type()); 
        $slug = $post_type->rewrite;  // rewrite the slug variable to the post type which only works with pretty permalinks
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '">' . $post_type->labels->singular_name . 's</a></li>';  // builds breadcrumb link to custom post type
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0]; // we make cat the category with the lowest id number if there are multiple categories
        echo '<li>' . get_category_parents($cat, TRUE, '') . '</li>'; // outputs the category, the quotes after TRUE prevent a trailing slash
        echo $before . get_the_title() . $after; // outputs the article name
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . 's' . $after; // we sneak an s onto the end of our custom post type

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE);
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . '';
      echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Articles tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
      echo __('<li class="currentcrumb">Page', '') . ' ' . get_query_var('paged') . '</li>';
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '';
    }

    echo '</ul>';

  }
} 

/*
=======================================================================================================================================================================
========== COMMENT ADDONS =============================================================================================================================================
=======================================================================================================================================================================
*/

function delete_comment_link($id) {
  if (current_user_can('edit_post', 1)) {		// couldn't find documentation on valid args, so threw a 1 in there and it works
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">del</a> ';
    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">spam</a>';
  }
}



//this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
 
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-author vcard">
     <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
       <div class="comment-meta"<a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s', 'shininess'), get_comment_author_link()) ?></a></div>
       <small><?php printf(__('%1$s at %2$s', 'shininess'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
     </div>
     <div class="clear"></div>
 
     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.', 'shininess') ?></em>
       <br />
     <?php endif; ?>
 
     <div class="comment-text">	
         <?php comment_text() ?>
     </div>
 
   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	  <?php delete_comment_link(get_comment_ID()); ?>
   </div>
  
   <div class="clear"></div>
<?php } ?>

<?php function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == “”) {
        wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, get out of here!') );
    }
}
 
add_action('check_comment_flood', 'check_referrer');












/*
=======================================================================================================================================================================
========== STAR RATING FOR REVIEWS ====================================================================================================================================
=======================================================================================================================================================================
*/

/*
Plugin Name: Star Rating for Reviews
Plugin URI: http://www.channel-ai.com/blog/plugins/star-rating/
Description: Insert inline rating stars within your posts based on the score you assign, supports outputting list of reviews sorted by date, score or post title.
Version: 0.4
Author: Yaosan Yeo
Author URI: http://www.channel-ai.com/blog/
*/

/*  Copyright 2007  Yaosan Yeo  (email : eyn@channel-ai.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// I have modified this script to remove "depricated" errors and remove internal css and jquery in favor of wordpress's built-in jquery and style.css
// It also now generates a span around ratings with a title that gives the precise rating in a tooltip

// configurable variables (global variables)

	$sr_limitstar = 0;				// globally limit max number of stars, put 0 if choose not to use
	$sr_defaultstar = 5;			// default max score when not explicitly expressed, e.g. [rating:3.5] is evaluated as 3.5/$sr_defaultstar
	$sr_prefix = "";					// prefix text before inserting star graphics, can leave blank if desired
	$sr_allprefix = "";		// prefix used for overall rating
	$sr_suffix = "";				// to close tags or whatever you feel like doing
	$sr_ext = "png";				// file extension for star images
	$sr_usetext = 1;				// output plain text instead of star images in posts and feeds, options as below:
									// 0: images for posts and feeds;	1: images for posts, text for feeds;	2: text for all

	$sr_autometa = 1;				// option to insert meta key (custom field) automatically, put 1 to enable this feature
	$sr_metakey = 'rating';			// meta key for custom field, change this if there's conflict with other plugins

	$sr_cuttitle = 20;				// max amount of characters shown in post title when using sidebar functions, 0 to disable cut off

// end of configurable variables



// global variables for calculating cumulative average (do not touch)
	$sr_tscore = 0;
	$sr_counter = 0;




//////////////////////// DATABASE RELATED FUNCTIONS ////////////////////////


/////////// Functions that retrieves data ///////////


//
// sidebar functions
//

function sr_getreviews($limit=5, $orderby='date', $order='DESC', $usestar=5, $prefix='<li>', $suffix='</li>') {
	global $wpdb, $sr_metakey;

	if ( stristr($orderby, 'date') )
		$orderby = 'post_date';
	elseif ( stristr($orderby, 'title') )
		$orderby = 'post_title';
	else
		$orderby = 'meta_value+0';	// force sort by integer

	$order = ( stristr($order, 'DESC') ) ? 'DESC' : 'ASC';
	$limit = intval($limit);

	$sql = "SELECT id, post_title, meta_value";
	$sql .= " FROM  $wpdb->postmeta, $wpdb->posts";
	$sql .= " WHERE meta_key = '$sr_metakey'";
	$sql .= " AND post_id = id";
	$sql .= " AND post_status = 'publish'";
	$sql .= " ORDER BY $orderby $order";
	if ($limit)
		$sql .= " LIMIT $limit";

	$reviews = $wpdb->get_results($sql);
	
	// if no reviews can be found, output warning and exit
	if (empty($reviews)) {
		sr_warning();
	} else {
		foreach($reviews as $review) {
			$rating = $review->meta_value;
			$post_title = htmlspecialchars(stripslashes($review->post_title));
			$permalink = get_permalink($review->id);

			// output image tags for stars instead of percentage if requested
			if ($usestar) {
				$rating_output = sr_usestar($rating, $usestar);
			// output percentage
			} else {
				$rating_output = $rating . '%';
			}
			
			$output = sr_output($permalink, $post_title, $rating, $rating_output, $prefix, $suffix);

			echo $output;
		}
	}
}

function sr_getrandom($limit=5, $usestar=5, $prefix='<li>', $suffix='</li>') {
	global $wpdb, $sr_metakey;
	
	$sql = "SELECT id, post_title, meta_value";
	$sql .= " FROM  $wpdb->postmeta, $wpdb->posts";
	$sql .= " WHERE meta_key = '$sr_metakey'";
	$sql .= " AND post_id = id";
	$sql .= " AND post_status = 'publish'";

	$reviews = $wpdb->get_results($sql);
	
	// if no reviews can be found, output warning and exit
	if (empty($reviews)) {
		sr_warning();
	} else {
		// randomize the returned 2D array
		$shuffles = array_rand($reviews, intval($limit));
		$review = array();

		foreach($shuffles as $shuffle) {
			$review = $reviews[$shuffle];

			$rating = $review->meta_value;
			$post_title = htmlspecialchars(stripslashes($review->post_title));
			$permalink = get_permalink($review->id);

			// output image tags for stars instead of percentage if requested
			if ($usestar) {
				$rating_output = sr_usestar($rating, $usestar);
			// output percentage
			} else {
				$rating_output = $rating . '%';
			}
			
			$output = sr_output($permalink, $post_title, $rating, $rating_output, $prefix, $suffix);

			echo $output;
		}
	}
}

function sr_listreviews($orderby='date', $order='DESC', $usestar=5, $date="M j, Y", $limit=0) {
	global $wpdb, $sr_metakey;

	if ( stristr($orderby, 'date') )
		$orderby = 'post_date';
	elseif ( stristr($orderby, 'title') )
		$orderby = 'post_title';
	else
		$orderby = 'meta_value+0';	// force sort by integer

	$order = ( stristr($order, 'DESC') ) ? 'DESC' : 'ASC';
	$limit = intval($limit);

	$sql = "SELECT id, post_title, post_date, meta_value";
	$sql .= " FROM  $wpdb->postmeta, $wpdb->posts";
	$sql .= " WHERE meta_key = '$sr_metakey'";
	$sql .= " AND post_id = id";
	$sql .= " AND post_status = 'publish'";
	$sql .= " ORDER BY $orderby $order";
	if ($limit)
		$sql .= " LIMIT $limit";

	$reviews = $wpdb->get_results($sql);
	
	// if no reviews can be found, output warning and exit
	if (empty($reviews)) {
		sr_warning();
	} else {
		$path = get_option('siteurl') . '/wp-content/plugins/star-rating-for-reviews/jquery.tablesorter.js';
		print <<< THEAD
	<script type="text/javascript" src="$path"></script>
	<table id="sr-table">
	<thead>
	<tr>
		<th class="date">Date</th>
		<th>Title</th>
		<th>Rating</th>
	</tr>
	</thead>
	<tfoot>
	<tr>
		<td colspan="3">
			<span class="sr-tips">Tips: Shift+Click to sort multiple columns</span><span class="sr-plugin">Powered by <a href="http://www.channel-ai.com/blog/plugins/star-rating/" title="Star Rating for Reviews WordPress Plugin">Star Rating for Reviews</a></span>
		</td>
	</tr>
	</tfoot>
	<tbody>
THEAD;
		
		$counter = 0;
		
		foreach($reviews as $review) {
			$rating = $review->meta_value;
			$post_title = htmlspecialchars(stripslashes($review->post_title));
			$post_date = date( $date, strtotime($review->post_date) );
			$permalink = get_permalink($review->id);
			
			if ($counter % 2)
				$row = "odd";
			else
				$row = "even";
				
			$counter++;

			// output image tags for stars instead of percentage if requested
			if ($usestar) {
				$rating_output = sr_usestar($rating, $usestar);
			// output percentage
			} else {
				$rating_output = $rating . '%';
			}
			
			// hidden date in ISO format, used for sorting
			$post_date = '<span class="hidden">' . date( "Y-m-d", strtotime($review->post_date) ) . '</span> ' . $post_date;
			
			// hidden rating, used for sorting
			if ($usestar)
				$rating_output = '<span class="hidden">' . $rating . '</span> ' . $rating_output;
			
			print <<< TROW
	<tr class="$row">
		<td class="date">$post_date</td>
		<td><a href="$permalink" title="$post_title - $rating%">$post_title</a></td>
		<td>$rating_output</td>
	</tr>
TROW;
		}
		print <<< TFOOT
	</tbody>
	</table>
	
	<script type="text/javascript">
	jQuery(document).ready(function() 
	    { 
	        jQuery("#sr-table").tablesorter({widgets: ["zebra"]});
	    } 
	);
    </script>
TFOOT;
	}
}



//
// single post functions
//

function sr_getsingle($post_id, $usestar=0, $prefix='', $suffix='', $size=0) {
	$rating = sr_getrating($post_id);

	// jump out of function if no rating data can be found for this single post
	if (empty($rating))
		return 0;

	// output image tags for stars instead of percentage if requested
	if ($usestar) {
		$rating_output = sr_usestar($rating, $usestar, $size);
	// output percentage
	} else {
		$rating_output = $rating;
	}

	$output = $prefix . $rating_output . $suffix . "\n";

	echo $output;
}

function sr_getrating($post_id) {
	global $wpdb, $sr_metakey;

	$sql = "SELECT meta_value";
	$sql .= " FROM  $wpdb->postmeta";
	$sql .= " WHERE meta_key = '$sr_metakey'";
	$sql .= " AND post_id = '$post_id'";
	
	$rating = $wpdb->get_var($sql);
	
	return $rating;
}

//
// common functions
//

// generates the xhtml code for star rating images, e.g. <img src="" />

function sr_usestar($rating, $star_count, $big=0) {
	global $sr_ext;

	$star = $rating / 100 * $star_count;

	if ($big)
		$path = get_option('siteurl') . '/wp-content/themes/shininess/img/';
	else
		$path = get_option('siteurl') . '/wp-content/themes/shininess/img/tiny-';

	// check if half star occurs
	// e.g. [3.75 , 4.25) = 4 stars; [4.25 , 4.75) = 4.5 stars
	$star = round( $star * 2 );

	if ( $star % 2 ) {	// there is half star
		$halfstar = '<img src="' . $path . 'halfstar.' . $sr_ext . '" alt="&frac12;" />';
		$star = floor( $star / 2 );
		$blankstar = $star_count - $star - 1;
	} else 	{	// there is no half star
		$halfstar = "";
		$star = $star / 2;
		$blankstar = $star_count - $star;
	}

	// finally, generate html for rating stars
	$output = '<span title="' . $rating . '/100">' . str_repeat ('<img src="' . $path . 'star.' . $sr_ext . '" alt="&#9733;" />', $star) . $halfstar . str_repeat('<img src="' . $path . 'blankstar.' . $sr_ext . '" alt="&#9734;" />', $blankstar) . '</span>';

	return $output;
}


// generates the final output

function sr_output($permalink, $post_title, $rating, $rating_output, $prefix, $suffix) {
	global $sr_cuttitle;
	
	if ( $sr_cuttitle && (strlen($post_title) > $sr_cuttitle) )
		$short_title = substr($post_title, 0, $sr_cuttitle) . "...";
	else
		$short_title = $post_title;
	
	$output = $prefix . '<span class="sr-review"><a href="' . $permalink . '" title="' . $post_title . " - " . $rating . '%">' . $short_title . '</a></span>';
	$output .= '<span class="sr-rating">' . $rating_output . '</span><div class="sr-clear"></div>';		// &nbsp; required or floating element takes up no space -> messed up layout
	$output .= $suffix . "\n";
	
	return $output;
}


// outputs warning when no rating data can be found

function sr_warning() {
	echo "<p>Please make sure database writing has been enabled via plugin options and have at least one blog entry having its custom field properly set. See <a href='http://www.channel-ai.com/blog/plugins/star-rating/' title='Star Rating for Reviews Documentation'>documentation</a> for further info.</p>\n";
}



// includes jQuery 1.2.1

function sr_js() {
	if ( function_exists('wp_enqueue_script') ) {
		wp_enqueue_script('jquery', get_option('siteurl') . '/wp-content/plugins/star-rating-for-reviews/jquery.js');
	}
}


/////////// Functions that stores data ///////////


//
// post editing / meta values functions
//

function sr_addratings($post_id) {
	global $wpdb, $sr_tscore, $sr_counter, $sr_autometa, $sr_metakey;

	// jump out of function if auto meta is not enabled
	if (!$sr_autometa) {
		return $post_id;
	}

	$content = $wpdb->get_var("SELECT post_content
							FROM $wpdb->posts
							WHERE ID = '$post_id'");

	// parse post content for rating tags, and store rating information in global variables
	$content = preg_replace_callback( "/(?<!`)\[rating:(([^]]+))]/i", "sr_genratings", $content );

	// calculate overall ratings
	if ($sr_tscore > 0) {
		$rating = round( $sr_tscore / $sr_counter * 100 , 1 );	// in percentage
	}
	else {
		return $post_id;	// jump out of function if [rating:none] is found or no [rating:] tags at all
	}

	// read rating custom field from database
	$rating_meta = $wpdb->get_var("SELECT meta_value
							FROM $wpdb->postmeta
							WHERE post_id = '$post_id'
							AND meta_key = '$sr_metakey'");

	// if already exist, update the value with new ratings
	if (!empty($rating_meta)) {
		$results=  $wpdb->query("UPDATE $wpdb->postmeta
								SET meta_value = '$rating'
								WHERE post_id = '$post_id'
								AND meta_key = '$sr_metakey'");
	// if not exist, write rating custom field to database
	} else {
		$results = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value)
								VALUES ('$post_id', '$sr_metakey', '$rating')");
	}

	return $post_id;
}

function sr_genratings($matches) {
	global $sr_defaultstar, $sr_tscore, $sr_counter;

	list($score, $maxscore) = explode("/", $matches[2]);             // = explode("/", $matches[2]);

	if (!$maxscore) {
		$maxscore = $sr_defaultstar;
	}

	// if not overall rating, add to cumulative
	if ( !(strncasecmp(trim($score), "overall", 7) == 0) ) {
		$percent = $score / $maxscore;
		$sr_counter++;
		$sr_tscore += $percent;
	}

	// disable autometa if [rating:none] is found
	if ( strncasecmp(trim($score), "none", 4) == 0) {
		$sr_tscore = -99999;
	}

	return 0;
}

add_action('save_post', 'sr_addratings');
add_action('wp_print_scripts', 'sr_js');



//////////////////////// CORE (PRESENTATION ONLY) FUNCTIONS ////////////////////////


function sr_addstar($content) {
	$content = preg_replace_callback( "/(?<!`)\[rating:(([^]]+))]/i","sr_genstar", $content );
	$content = preg_replace( "/`(\[rating:(?:[^]]+)])`?/i", "$1", $content );	//escape rating tags by using `[rating:]`

	return $content;
}

function sr_genstar($matches) {
	global $post, $sr_limitstar, $sr_defaultstar, $sr_prefix, $sr_allprefix, $sr_suffix, $sr_usetext, $sr_tscore, $sr_counter;

	list($score, $maxscore) = explode("/", $matches[2]);  // explode("/", $matches[2]);

	// check if we should get overall rating
	if ( strncasecmp(trim($score), "overall", 7) == 0 ) {
		// test if overall tag is found before any rating score is given (some people might want to display overall score before the <!--more-->)
		// uses rating data stored in database if found
		if ($sr_counter == 0) {
			$rating = (sr_getrating($post->ID)) ? sr_getrating($post->ID) : 0;
		} 
		// if previous rating score is found within the same post, calculate overall score
		else {
			$rating = $sr_tscore / $sr_counter;
		}

		if ($maxscore)
			$maxstar = $maxscore;
		else
			$maxstar = $sr_defaultstar;

		// clear cummulative variables for cases where multiple overall rating is required within single post
		$sr_tscore = 0;
		$sr_counter = 0;
		$prefix = $sr_allprefix;
	}

	// ignore the escaping rating tag that prevents autometa
	elseif ( strncasecmp(trim($score), "none", 4) == 0 ) {
		return "";
	}

	// if not overall, calculate rating based on score assigned
	else {
		if ($maxscore) {
			// limit max number of stars to 20
			$maxstar = ($maxscore <= 20) ? $maxscore : $sr_defaultstar;
		}
		else {
			$maxscore = $sr_defaultstar;
			$maxstar = $sr_defaultstar;
		}

		// check if we should limit the global max number of stars
		if ($sr_limitstar) {
			$maxstar = $sr_limitstar;
		}

		$rating = $score / $maxscore * 100;
		$sr_counter++;
		$sr_tscore += $rating;
		$prefix = $sr_prefix;
	}

	// graphical output i.e. with star images
	$output = $prefix . sr_usestar($rating, $maxstar, 1) . $sr_suffix;
	
	// text only output
	$stars = $rating / 100 * $maxstar;
	$output_text = $prefix . round($stars, 2) . " out of " . round($maxstar) . " stars" . $sr_suffix; 

	// select output based on options
	if ( $sr_usetext == 1 && is_feed() )
		return $output_text;
	elseif ( $sr_usetext == 2 )
		return $output_text;
	else
		return $output;
}

add_filter('the_content', 'sr_addstar');
add_filter('the_excerpt', 'sr_addstar');












 ?>



