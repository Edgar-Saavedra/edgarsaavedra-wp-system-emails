<?php
/*
Plugin Name: Custom - WP System Emails
Plugin URI: https://github.com/Edgar-Saavedra/edgarsaavedra-wp-system-emails
Description: A plugin showing the customization of amdin emails sent from wordpress site.
Version: 1.0
Author: Edgar-Saavedra
Text Domain: edgarsaavedra-wp-system-emails
Domain Path: /languages/

	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

global $CustomSystemEmailsPlugin;
$CustomSystemEmailsPlugin = dirname(plugin_basename(__FILE__));
global $WPCustomPlugins;
$WPCustomPlugins[$CustomSystemEmailsPlugin] = array(
 "version" => '0.1',
 "plugin_path" => plugin_dir_path(__FILE__),
 "plugin_dirname" => $CustomSystemEmailsPlugin,
 "plugin_url" => plugin_dir_url(__FILE__)
);

// don't load directly
if (!defined('ABSPATH')) {
    die('You shouldnt be here');
}


register_activation_hook(__FILE__, function(){
//    An example dependency, in this case visual composer
//    if (!is_plugin_active('js_composer/js_composer.php')) {
//        wp_die('Please activate Visual Composer, and try again!');
//    }
});

if (!function_exists('custom_system_emails_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function custom_system_emails_text_domain() {
        global $CustomSystemEmailsPlugin;
        global $WPCustomPlugins;
        load_plugin_textdomain($CustomSystemEmailsPlugin, FALSE, $WPCustomPlugins[$CustomSystemEmailsPlugin]['plugin_path'] . '/languages');
    }

    add_action('plugins_loaded', __NAMESPACE__ . '\\custom_system_emails_text_domain');
}

//autloaded folder
$assets = dirname(__FILE__).'/src/';


//our autoloader
require(dirname(__FILE__).'/ClassAutoLoader.php');
$loader = \ClassAutoloader::getLoader();

//set and register our namespace
$loader->setPsr4('Custom\\Plugins\\CustomSystemEmails\\', $assets);
$loader->register();

//load our plugin data
$plugin = new \Custom\Plugins\CustomSystemEmails\Load();

// Activation Hook
register_activation_hook(
    __FILE__,
    [$plugin, 'activate']
);

// Deactivation Hook
register_deactivation_hook(
    __FILE__,
    [$plugin, 'deactivate']
);