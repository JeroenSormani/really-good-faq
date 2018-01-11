<?php
/**
 * Plugin Name: 	Really Good FAQ
 * Plugin URI:
 * Description:     
 * Version: 		1.0.0
 * Author:
 * Author URI:
 * Text Domain: 	really-good-faq
 */

/**
 * This plugin was build with the help of WP Plugin Generator.
 * https://wpplugingenerator.com
 *
 * WP Plugin Generator is build by Jeroen Sormani (http://jeroensormani.com)
 */

/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */


if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


define( 'REALLY GOOD FAQ_FILE', __FILE__ );
require 'really-good-faq.php';
