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
  $format = 'F j, Y';

  $last_mod_date = get_the_modified_date( $format );

  $content = str_replace( '[last_modified]', $last_mod_date, $content );

  return $content;
}
