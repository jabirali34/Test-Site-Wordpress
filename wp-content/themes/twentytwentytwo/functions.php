<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Add styles inline.
		wp_add_inline_style( 'twentytwentytwo-style', twentytwentytwo_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

if ( ! function_exists( 'twentytwentytwo_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', twentytwentytwo_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'twentytwentytwo_editor_styles' );


if ( ! function_exists( 'twentytwentytwo_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions twentytwentytwo_styles() and twentytwentytwo_editor_styles() above.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return string
	 */
	function twentytwentytwo_get_font_face_styles() {

		return "
		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Italic.ttf.woff2' ) . "') format('woff2');
		}
		";

	}

endif;

if ( ! function_exists( 'twentytwentytwo_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'twentytwentytwo_preload_webfonts' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';


    //Team custom post type 
	function team_post_types(){
		// team post type
		register_post_type('team', array(
			'supports' => array('title', 'thumbnail'),
			'rewrite' => array('slug' => 'team'),
			'has_archive' => true,
			'public' => true,
			'taxonomies' => array( 'category' ),
			'labels' => array(
				'name' => 'Team',
				'add_new_item' => 'Add New Team',
				'edit_item' => 'Edit Team',
				'all_items' => 'All team',
				'singular_name' => 'team',
			),
	
		));
	
	}
	add_action('init', 'team_post_types');



	

    //shortcode function for team custom post type
    function team_shotcode_function( $atts = array() ) {

        $args = array(
            'post_type'      => 'team',
            'posts_per_page' => 10,
        );
		
		?>

		<div class="gallery-wrapper ">
        <?php    
        $loop = new WP_Query($args);
		$i = 1;	
        if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post(); 
            ?>
				<div class="image-wrapper">
					<a href=<?php echo "#lightbox-image-$i" ?>>
						<div class="image">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="text">
							<h4><?php the_title() ?></h4>
						</div>

						<a href="" class="anchor">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a>
					</a>
				</div>

        <?php
        $i++;						
        endwhile;
        endif;
        wp_reset_postdata();
        
        ?> </div> 
			<div class="gallery-lightboxes">
		<?php
		$loop = new WP_Query($args);
		$i = 1;	
        if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post(); 
            //$id = str_replace(" ","-", $title );  

			$next_title = '';
            $prev_title     = '';
            if(get_previous_post()){
                $prev_post = get_previous_post();
                $prev_title = $prev_post->post_title;
            }
            if(get_next_post()){
                $next_post = get_next_post();
                $next_title = $next_post->post_title;
            }

            ?>

				<div class="image-lightbox" id= <?php echo "lightbox-image-$i" ?>>
					<div class="image-lightbox-wrapper">
						<a href="#" class="close"></a>
						<div class="col-left">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="col-right">
							<div class="content">
								<h4><?php the_title() ?></h4>
								<span><?php the_field('designation') ?></span>
								<p><?php the_field('description') ?></p>
							</div>

							<div class="arrows">

								<a href="#lightbox-image-3" class="arrow-left">
									<i class="fa fa-angle-left" aria-hidden="true"></i>
									<?php echo $prev_title?>
								</a>
								<a href="#lightbox-image-2" class="arrow-right">
									<?php echo $next_title ?>
									<i class="fa fa-angle-right" aria-hidden="true"></i>
								</a>
							</div>
						</div>

					</div>
				</div>

        <?php
        $i++;						
        endwhile;
        endif;
        wp_reset_postdata();
        
        ?> </div> 

<?php

    }
    
    add_shortcode('team', 'team_shotcode_function');




	/*
            <div id="<?php echo $i ?>" class="fancybox-hide">
                <div class="lightbox-flex-container">
                    <div class="lightbox-img-1"></div>
                    <div class="lightbox-copy">
                        <h1 class="pra-name"><?php the_title(); ?></h1>
                        <h4 class="pra-title"><em><?php the_field('designation') ?></em></h4>
                        <p><?php the_field('description') ?></p>
						<p><?php echo $prev_title ?></p>
						<p><?php echo $next_title ?></p>
                    </div>
                </div>
            </div>
            <div class="light-box-panel">
                <a href="<?php echo "#$i" ?>" class="ari-fancybox hit" group="quiz" data-fancybox-group="fb_gallery_0_0" data-fancybox="fb_gallery_0_0"></a>
                <div class="pra-exec-img-1" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
                <h1 class="pra-name"><?php the_title(); ?></h1>
                <h4 class="pra-title"><em><?php the_field('designation') ?></em></h4>
                <div class="pra-read-more">READ MORE</div>
            </div>
			*/?>