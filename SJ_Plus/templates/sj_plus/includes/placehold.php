<?php
/*
 * ------------------------------------------------------------------------
 * Copyright (C) 2009 - 2013 The YouTech JSC. All Rights Reserved.
 * @license - GNU/GPL, http://www.gnu.org/licenses/gpl.html
 * Author: The YouTech JSC
 * Websites: http://www.smartaddons.com - http://www.cmsportal.net
 * ------------------------------------------------------------------------
*/
// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );
global $is_placehold;
global $placehold_size;
// Array param for cookie

$placehold_size = array (
	'listing' => '510x300',
	'article' => '650x400',
	'related_items'=>'70x70',
	'slideshow' => '1150x450',
	'latest_news' => '270x270',
	'popular' => '70x70',
	'featured_posts' => '230x230',
	'hot_stories' => '270x320',
	'video_box' => '270x155'

);

$is_placehold = 1;

if (!function_exists ('yt_placehold') ) {
	function yt_placehold ($size = '100x100',$icon='0xe942', $alt = '', $title = '' ) {
		return '<img src="http://placehold.it/'.$size.'" alt = "'. $alt .'" title = "'. $title .'"/>';
		//return '<img src="http://placehold.net/'.$size.'" alt = "'. $alt .'" title = "'. $title .'"/>';
		
		
	}
}
?>