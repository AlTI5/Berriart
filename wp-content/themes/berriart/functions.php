<?php

class Berriart {
    
    const VERSION = '5';
    const LANG_DOMAIN = 'berriart';
    
    public function __construct() {
        add_action('wp_enqueue_scripts', array(&$this, 'scriptsAndStyles'));
    }
    
    public function scriptsAndStyles() {
        // Scripts
        wp_register_script('foundation-modernizer', get_template_directory_uri() . '/javascripts/foundation/modernizr.foundation.js', array(), '2.6.0');
        wp_register_script('foundation-jquery', get_template_directory_uri() . '/javascripts/foundation/jquery.js', array(), '1.8.1', true);
        wp_register_script('foundation-placeholder', get_template_directory_uri() . '/javascripts/foundation/jquery.placeholder.js', array('foundation-jquery'), '2.0.7', true);
        wp_register_script('foundation-navigation', get_template_directory_uri() . '/javascripts/foundation/jquery.foundation.navigation.js', array('foundation-jquery'), '2.0.7', true);
        wp_register_script('foundation-tooltips', get_template_directory_uri() . '/javascripts/foundation/jquery.foundation.tooltips.js', array('foundation-jquery'), '2.0.7', true);
        wp_register_script('jquery-snippet', get_template_directory_uri() . '/javascripts/jquery.snippet.min.js', array('foundation-jquery'), '2.0.0', true);
        wp_register_script('berriart', get_template_directory_uri() . '/javascripts/app.js', array('jquery-snippet', 'foundation-modernizer', 'foundation-tooltips', 'foundation-jquery', 'foundation-placeholder', 'foundation-navigation'), self::VERSION, true);
        wp_enqueue_script('berriart'); 
        
        /*
         <!-- Included JS Files (Uncompressed) -->
	
	<script src="javascripts/foundation/jquery.foundation.tabs.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.accordion.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.forms.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.topbar.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.reveal.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.tooltips.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.orbit.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.alerts.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.navigation.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.mediaQueryToggle.js"></script>
	
	<script src="javascripts/foundation/jquery.foundation.buttons.js"></script>
	
	
  <!-- Application Javascript, safe to override -->
  <script src="javascripts/foundation/app.js"></script>
         */
        
        // Style
        wp_register_style('berriart', get_template_directory_uri() . '/stylesheets/app.css', array(), self::VERSION);
        wp_enqueue_style('berriart');
        
        
    }
    
    public function contentNav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', self::LANG_DOMAIN ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', self::LANG_DOMAIN ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', self::LANG_DOMAIN ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
    }
    
    public function postedOn() {
        printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', self::LANG_DOMAIN ),
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( __( 'View all posts by %s', self::LANG_DOMAIN ), get_the_author() ) ),
            get_the_author()
        );
    }
    
    /**
     * Function based on http://sltaylor.co.uk/blog/better-wordpress-pagination/
     * 
     * @global WP_Query $wp_query
     * @param WP_Query $query
     * @param string $baseURL
     */
    function pagination( $query = null, $baseURL = '' ) {
        if(!$query) {
            global $wp_query;
            $query = $wp_query;
        }
        
	if ( ! $baseURL ) $baseURL = get_bloginfo( 'url' );
	$page = $query->query_vars["paged"];
	if ( !$page ) $page = 1;
	$qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
	// Only necessary if there's more posts than posts-per-page
	if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
		echo '<ul class="pagination">';
		// Previous link?
		if ( $page > 1 ) {
			echo '<li class="arrow"><a href="'.$baseURL.'page/'.($page-1).'/'.$qs.'">&laquo;</a></li>';
		}
		// Loop through pages
                $arePagesOmited = false;
		for ( $i=1; $i <= $query->max_num_pages; $i++ ) {
			// Current page or linked page?
			if ( $i == $page ) {
				echo '<li class="current"><span>'.$i.'</span></li>';
                                $arePagesOmited = false;
			} 
                        elseif(abs($page-$i) <= 2 || $i == 1 || $i == 2 || $i == $query->max_num_pages || $i == $query->max_num_pages-1) {
                            echo '<li><a href="'.$baseURL.'page/'.$i.'/'.$qs.'">'.$i.'</a></li>';
                        }
                        else {
                            if(!$arePagesOmited) {
                                echo '<li class="unavailable"><span>...</span></li>';
                                $arePagesOmited = true;
                            }
			}
		}
		// Next link?
		if ( $page < $query->max_num_pages ) {
			echo '<li class="arrow"><a href="'.$baseURL.'page/'.($page+1).'/'.$qs.'">&raquo;</a></li>';
		}
		echo '</ul>';
	}
    }
}

global $berriart;
$berriart = new Berriart();