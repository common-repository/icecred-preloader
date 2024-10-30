<?php

/*
Plugin Name: iceCred Preloader
Plugin URI: https://www.icecred.com/product/view?id=1
Description: A fullscreen wordpress preloader. It is great, lightweight and easy to use.
Version: 1.0.1
Author: iceCred
Author URI: http://icecred.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This program. If not, see https://www.gnu.org/licenses/gpl-2.0.html.

*/

if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

include('frontend.php');
include('settings.php');
