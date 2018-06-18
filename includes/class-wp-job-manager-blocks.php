<?php
/**
 * Handles Job Manager's Gutenberg Blocks.
 *
 * @package wp-job-manager
 * @since 1.32.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * WP_Job_Manager_Blocks
 */
class WP_Job_Manager_Blocks {
	/**
	 * The static instance of the WP_Job_Manager_Blocks
	 *
	 * @var self
	 */
	private static $_instance = null;

	/**
	 * Singleton instance getter
	 *
	 * @return self
	 */
	public static function get_instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new WP_Job_Manager_Blocks();
		}

		return self::$_instance;
	}

	/**
	 * Instance constructor
	 */
	private function __construct() {
		add_action( 'init', array( $this, 'register_blocks' ) );
	}

	/**
	 * Register all Gutenblocks
	 */
	public function register_blocks() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		include_once( JOB_MANAGER_PLUGIN_DIR . '/includes/blocks/class-wp-job-manager-block-jobs-shortcode.php' );
		register_block_type(
			WP_Job_Manager_Block_Jobs_Shortcode::get_block_type()
		);
	}
}

WP_Job_Manager_Blocks::get_instance();
