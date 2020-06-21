<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://markmarzeotti.com
 * @since      1.0.0
 *
 * @package    EAB_Register
 * @subpackage EAB_Register/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    EAB_Register
 * @subpackage EAB_Register/includes
 * @author     Mark Marzeotti <mark@markmarzeotti.com>
 */
class EAB_Register {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $theme_blocks_directory;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_blocks_directory;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->theme_blocks_directory = get_template_directory() . '/acf-blocks/';
		$this->plugin_blocks_directory = EASY_ACF_BLOCKS_DIRECTORY . 'plugin-blocks/';
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function register_theme_blocks() {
		if ( ! function_exists( 'acf_register_block_type' ) ) {
			return;
		}

		$theme_blocks  = glob( $this->theme_blocks_directory . '*/*.php' );
		$plugin_blocks = glob( $this->plugin_blocks_directory . '*/*.php' );
		$blocks        = array_merge( $theme_blocks, $plugin_blocks );

		foreach ( $blocks as $block ) {
			$block_data = get_file_data(
				$block,
				array(
					'title'       => 'Title',
					'description' => 'Description',
					'category'    => 'Category',
					'icon'        => 'Icon',
					'keywords'    => 'Keywords',
					'post_types'  => 'Post Types',
					'multiple'    => 'Multiple',
					'active'      => 'Active'
				)
			);
			
			if ( 'true' === $block_data['active'] || true === $block_data['active'] ) {
				$block_settings = array(
					'name'            => sanitize_title( $block_data['title'] ),
					'title'           => $block_data['title'],
					'description'     => $block_data['description'],
					'render_template' => $block,
					'category'        => $block_data['category'],
					'icon'            => $block_data['icon'],
					'keywords'        => explode( ',', $block_data['keywords'] ),
				);

				acf_register_block_type( $block_settings );
			}
		}
	}

}
