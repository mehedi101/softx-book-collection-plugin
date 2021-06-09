<?php
/**
 * Plugin Name: SoftX Book Collection
 * Plugin URI: https://softxltd.com 
 * Description: A book collection toolkit that help you organize and sell books online.
 * Version: 1.0.0
 * Author: Mehedi Hasan
 * Author URI: https://mehedihasn.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: book-collection
 * Domain Path: /i18n/languages/
 * Requires at least: 5.7
 * Requires PHP: 7.3
 */

defined('ABSPATH') || exit ;



/**
 * Final Book Collection Class
 * 
 */
final class Softx_Book_Collection{ 

    
    public $version='1.0.0';
    
    private static $instance = null;

    private $min_php = '7.3';

    private $container=[];


    /**
     * initiate the plugin dependencies
     */
    private function __construct()
    {
        $this->define_constant();
        register_activation_hook( __FILE__, [$this, 'activate'] );
        register_deactivation_hook( __FILE__, [$this, 'deactivate'] );

        
    }


   public static function init()
   {
       if( null === self::$instance ){ 
           self::$instance = new self();
       }
       return self::$instance;

   }

   /**
    * difining constants
    *
    * @return void
    */  
    public function define_constant()
    {
        $this->define('SBC_VERSION', $this->version);
        $this->define('SBC_FILE', $this->version);
        $this->define('SBC_FILE', __FILE__);
        $this->define('SBC_DIR', __DIR__);
        /**
         * create includes and assets folder
         * includes folder is the class file container
         * assest folder is the css, js and javascript files container 
         */
        $this->define('SBC_INC_DIR', SBC_DIR.'/includes');
        $this->define('SBC_ASSETS', plugins_url( 'assets', __FILE__ ) );

    }

    /**
     * Check the constants is already defined or not
     * if not, define constant
     *
     * @param string $name
     * @param string $value
     * @return void
     */ 
    private function define( $name, $value)
    {
        if( ! defined($name)){ 
            define($name, $value); 
        }
    }

    public function activate()
    {
        
    }

    public function deactivate()
    {
        
    }


}

function book(){ 

    return Softx_Book_Collection::init();
}

// kick off the plugin 
book();