<?php

namespace Custom\Plugins\CustomSystemEmails\Frontend
{
	use Custom\Plugins\CustomSystemEmails\Helpers\Helpers;

	/**
		* A general purpose class to help load frontend resources like css
		* and javascript.
		* Class Assets
		* @package Custom\Plugins\CustomSystemEmails\Frontend
		*/
	class Assets
	{
		function init()
		{
			add_action('wp_head', array($this,'load_css'),1);
			add_action('wp_enqueue_scripts', array($this,'load_js'));
		}
		/**
			* =============================================================================
			* ALL CUSTOM  CSS
			* =============================================================================
			*/
		function load_css()
		{
//		Example:
//		wp_enqueue_style( 'edgarsaavedra-wp-custom-plugin-example-css', Helpers::getPluginUrl() . '/assets/dist/style.css', array(), false, 'all' );
		}
		/**
			* =============================================================================
			* ALL CUSTOM  JS
			* =============================================================================
			*/
		function load_js()
		{
//		Example:
//		wp_enqueue_script( 'edgarsaavedra-wp-custom-plugin-example-js', Helpers::getPluginUrl() .'/assets/dist/scripts.js', array('jquery'), '', true );
		}
	}
}