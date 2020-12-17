<?php
/**
 * Last Update
 *
 * @package     last-update
 * @author      Łukasz Garczewski
 * @copyright   2020 Łukasz Garczewski
 * @license     GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Last Update
 * Plugin URI:
 * Description:
 * Version: 0.1
 * Author: Łukasz Garczewski
 * Author URI:
 * Text Domain: last-update
 * Domain Path: /languages
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 */

add_filter( 'the_content', 'lu_substitute_tag', 1 );
function lu_substitute_tag( string $content ) {
  //@TODO: convert this into an option or parameter
  $format = 'F j Y';

  $last_mod_date_txt = get_the_modified_date( $format );
  $last_mod_date_attr = get_the_modified_date( 'c' );

  $tag = "<time datetime='{$last_mod_date_attr}'>{$last_mod_date_txt}</time>";

  //@TODO: convert this to a shortcode
  $content = str_replace( '[last_modified]', $tag, $content );

  return $content;
}
