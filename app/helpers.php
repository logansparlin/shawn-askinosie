<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    if (!is_admin() && remove_action('wp_head', 'wp_enqueue_scripts', 1)) {
        wp_enqueue_scripts();
    }

    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

 /**
  *  WpApiFeaturedImage
  *
  *  Adds featured images to the products endpoint
  *  using register_rest_field hook.
  *
  *  @version   1.0
  *  @author    stephen scaff
  */

  class WpApiFeaturedImage {

    /**
     * The endpoints we want to target
     */
    public $target_endpoints = '';
 
    /**
     * Constructor
     * @uses rest_api_init
     */
    function __construct() {
      $this->target_endpoints = array('product', 'post');
      add_action( 'rest_api_init', array( $this, 'add_image' ));
    }
 
 
    /**
     * Add Images to json api
     */
    function add_image() {
 
      /**
       * Add 'featured_image'
       */
      register_rest_field( $this->target_endpoints, 'featured_image',
         array(
           'get_callback'    => array( $this, 'get_image_url_full'),
           'update_callback' => null,
           'schema'          => null,
         )
       );
 
       /**
        * Add 'featured_image_thumbnail'
        */
       register_rest_field( $this->target_endpoints, 'featured_image_thumbnail',
          array(
            'get_callback'    => array( $this, 'get_image_url_thumb'),
            'update_callback' => null,
            'schema'          => null,
          )
        );
     }
 
   /**
    * Get Image: Thumb
    */
   function get_image_url_thumb(){
     $url = $this->get_image('thumbnail');
     return $url;
   }
 
   /**
    * Get Image: Full
    */
   function get_image_url_full(){
     $url = $this->get_image('full');
     return $url;
   }
 
   /**
    * Get Image Helpers
    */
   function get_image($size) {
     $id = get_the_ID();
 
     if ( has_post_thumbnail( $id ) ){
         $img_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );
         $url = $img_arr[0];
         return $url;
     } else {
         return false;
     }
   }
 }
 
 new WpApiFeaturedImage;
