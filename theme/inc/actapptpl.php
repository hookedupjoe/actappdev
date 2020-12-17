<?php
/*
Common access points for action app template stuff call in other places
*/

/* package: ActAppDev */

class ActAppTpl {
	private static $instance;
	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new ActAppTpl();
		}
		return self::$instance;
	}

	public static function get_mobile_nav_subs($key, $title, $tree){
		
		$ret = '<div appuse="cards" group="navtabs" item="menu-'.$key.'" class="hidden">
		<div class="ui inverted vertical menu top attached fluid">
		<a action="toggleNav" href="javascript:void(0)" class="item">
		<i class="close icon inverted"></i>
		Close
		</a>';

		$ret .= '<div action="selectMe" group="navtabs" item="menu-'.$key.'" class="ui message basic mar0">
			<i class="folder open outline icon "></i>
			'.$title.'
		</div>';
		
		foreach ( $tree as $key => $obj ) {
			$tmpTitle = $obj->title;			
			$tmpHasChildren = is_array($obj->children) && sizeof($obj->children) > 0;
			if( $tmpHasChildren ){
				$ret .= '<div action="selectMe" group="navtabs" item="menu-'.$key.'" class="ui dropdown item" tabindex="0">
				'.$tmpTitle.'<i class="dropdown icon"></i>
			</div>';
			$retsubs .= ''.self::get_mobile_nav_subs($key, $tmpTitle, $obj->children);
			} else {
				$tmpURL = $obj->url;
				$ret .= '<a href="'.$tmpURL.'" class="item">';
				$ret .= $tmpTitle;
				$ret .= '</a>';
			}
		}
		
		$ret .= '<a action="selectMe" group="navtabs" item="menu-top" href="javascript:void(0)" class="item">
		<i class="left arrow icon inverted"></i>
		Main Menu
		</a>';

		$ret .= '</div></div>';

		//   foreach ( $tree as $key => $obj ) {
		// 	$tmpTitle = $obj->title;			
		// 	$tmpHasChildren = is_array($obj->children) && sizeof($obj->children) > 0;
		// 	if( $tmpHasChildren ){
		// 		$ret .= '<div action="selectMe" group="navtabs" item="menu-'.$key.'" class="ui dropdown item" tabindex="0">
		// 		'.$tmpTitle.'<i class="dropdown icon"></i>
		// 	  </div>';
		// 	  $retsubs .= ''.self::get_mobile_nav_subs($key, $obj->children);
		// 	} else {
		// 		$tmpURL = $obj->url;
		// 		$ret .= '<a href="'.$tmpURL.'" class="item">';
		// 		$ret .= $tmpTitle;
		// 		$ret .= '</a>';
		// 	}
		// }
		return $ret;
	}
	
	public static function get_mobile_nav($tree){
		$retsubs = '';
		$ret = '<div appuse="cards" group="navtabs" item="menu-top">
		<div class="ui inverted vertical menu top attached fluid">
		  <a action="toggleNav" href="javascript:void(0)" class="item">
			<i class="close icon inverted"></i>
			Close
		  </a>';

		  foreach ( $tree as $key => $obj ) {
			$tmpTitle = $obj->title;			
			$tmpHasChildren = is_array($obj->children) && sizeof($obj->children) > 0;
			if( $tmpHasChildren ){
				$ret .= '<div action="selectMe" group="navtabs" item="menu-'.$key.'" class="ui dropdown item" tabindex="0">
				'.$tmpTitle.'<i class="dropdown icon"></i>
			  </div>';
			  $retsubs .= ''.self::get_mobile_nav_subs($key, $tmpTitle, $obj->children);
			} else {
				$tmpURL = $obj->url;
				$ret .= '<a href="'.$tmpURL.'" class="item">';
				$ret .= $tmpTitle;
				$ret .= '</a>';
			}
		}
		//   $ret .= '<a href="http://localhost/actappdev/" class="item ">
		  
		// 	Welcome
		//   </a>
		//   <a href="http://localhost/actappdev/more-about-us/" class="item ">
		   
		// 	More About Us
		//   </a>';
		  
		//   $ret .= '<div action="selectMe" group="navtabs" item="menu-1" class="ui dropdown item" tabindex="0">
		//   Area One<i class="dropdown icon"></i>
		// </div>
		// <div action="selectMe" group="navtabs" item="menu-2" class="ui dropdown item" tabindex="0">
		//   Area Two<i class="dropdown icon"></i>
		// </div>';

		$ret .= '</div></div>';
	
		$subs = '<div appuse="cards" group="navtabs" item="menu-1" class="hidden">
		<div class="ui inverted vertical menu top attached fluid">
		  <a action="toggleNav" href="javascript:void(0)" class="item">
			<i class="close icon inverted"></i>
			Close
		  </a>
		  <div action="selectMe" group="navtabs" item="menu-1" class="ui message basic mar0">
			  <i class="folder open outline icon "></i>
			  Area One
		  </div>
		  <a href="http://localhost/actappdev/area-one/area-one-section-one/" class="item ">
		  
			Area One – Section One
		  </a>
		  <a href="http://localhost/actappdev/area-one/area-one-section-two/" class="item ">
		  
			Area One – Section Two
		  </a>
		  <a href="http://localhost/actappdev/area-one/area-one-section-three/" class="item">
		  
			Area One – Section Three
		  </a>
		  <a action="selectMe" group="navtabs" item="menu-top" href="javascript:void(0)" class="item">
			<i class="left arrow icon inverted"></i>
			Main Menu
		  </a>
		</div>
	  </div>
	
	
	  <div appuse="cards" group="navtabs" item="menu-2" class="hidden">
		<div class="ui inverted vertical menu top attached fluid">
		  <a action="toggleNav" href="javascript:void(0)" class="item">
			<i class="close icon inverted"></i>
			Close
		  </a>
		  <div action="selectMe" group="navtabs" item="menu-2" class="ui message basic mar0">
			  <i class="folder open outline icon "></i>
			  Area Two
		  </div>
		  <a href="http://localhost/actappdev/area-two/area-two-section-one/" class="item ">
			Area Two – Section One
		  </a>
		  <a href="http://localhost/actappdev/area-two/area-two-section-two/" class="item ">
			Area Two – Section Two
		  </a>
		  <a action="selectMe" group="navtabs" item="menu-top" href="javascript:void(0)" class="item">
			<i class="left arrow icon inverted"></i>
			Main Menu
		  </a>
		</div>
	  </div>';
		// foreach ( $tree as $key => $obj ) {
		// 	$tmpTitle = $obj->title;			
		// 	$tmpHasChildren = is_array($obj->children) && sizeof($obj->children) > 0;
		// 	if( $tmpHasChildren ){
		// 		$ret .= '<div appcomp="dropdown" class="ui dropdown item nomobile">';
		// 		$ret .= $tmpTitle.'<i class="dropdown icon"></i>';
		// 		$ret .= ' <div class="menu">';
		// 		$ret .= ''.self::get_menu_nav($obj->children);
		// 		$ret .= ' </div>';
		// 		$ret .= '</div>';
		// 	} else {
		// 		$tmpURL = $obj->url;
		// 		$ret .= '<a href="'.$tmpURL.'" class="item nomobile">';
		// 		$ret .= $tmpTitle;
		// 		$ret .= '</a>';
		// 	}
		// }
		return $ret.$retsubs;
	}

	
	public static function get_mobile_nav_for_loc($theLocationName){
		$menuname = self::get_menu_for_location( $theLocationName );
		$tree = self::get_menu_tree( $menuname );
		return self::get_mobile_nav($tree);
	}
	public static function get_menu_nav_for_loc($theLocationName){
		$menuname = self::get_menu_for_location( $theLocationName );
		$tree = self::get_menu_tree( $menuname );
		return self::get_menu_nav($tree);
	}
	public static function get_menu_nav($tree){
		$ret = '';
		foreach ( $tree as $key => $obj ) {
			$tmpTitle = $obj->title;			
			$tmpHasChildren = is_array($obj->children) && sizeof($obj->children) > 0;
			if( $tmpHasChildren ){
				$ret .= '<div appcomp="dropdown" class="ui dropdown item nomobile">';
				$ret .= $tmpTitle.'<i class="dropdown icon"></i>';
				$ret .= ' <div class="menu">';
				$ret .= ''.self::get_menu_nav($obj->children);
				$ret .= ' </div>';
				$ret .= '</div>';
			} else {
				$tmpURL = $obj->url;
				$ret .= '<a href="'.$tmpURL.'" class="item nomobile">';
				$ret .= $tmpTitle;
				$ret .= '</a>';
			}
		}
		return $ret;
	}

	public static function get_menu_for_location( $theName ) {
		$locations = get_nav_menu_locations();
		$menu = wp_get_nav_menu_object( $locations[ $theName ] );	
		if( $menu != null ){
			return $menu->name;	
		}
		return false;		
	}

	public static function get_menu_tree( $theItemArrayOrName ) {
		if( is_string($theItemArrayOrName)){
			$nav_menu_items_array = wp_get_nav_menu_items( $theItemArrayOrName );
		} else {
			$nav_menu_items_array = $theItemArrayOrName;
		}

		// $nav_menu_items_array = $nav_menu_items_array_or_name;
		
		foreach ( $nav_menu_items_array as $key => $value ) {
			$value->children = array();
			$nav_menu_items_array[ $key ] = $value;
		}
		
		$nav_menu_levels = array();
		$index = 0;
		if ( ! empty( $nav_menu_items_array ) ) do {
			if ( $index == 0 ) {
				foreach ( $nav_menu_items_array as $key => $obj ) {
					if ( $obj->menu_item_parent == 0 ) {						
						$nav_menu_levels[ $index ][] = $obj;
						unset( $nav_menu_items_array[ $key ] );
					}
				}
			} else {
				foreach ( $nav_menu_items_array as $key => $obj ) {
					if ( in_array( $obj->menu_item_parent, $last_level_ids ) ) {
						$nav_menu_levels[ $index ][] = $obj;
						unset( $nav_menu_items_array[ $key ] );
					}
				}
			}
			$last_level_ids = wp_list_pluck( $nav_menu_levels[ $index ], 'db_id' );
			$index++;
		} while ( ! empty( $nav_menu_items_array ) );
	
		$nav_menu_levels_reverse = array_reverse( $nav_menu_levels );
	
		$nav_menu_tree_build = array();
		$index = 0;
		if ( ! empty( $nav_menu_levels_reverse ) ) do {
			if ( count( $nav_menu_levels_reverse ) == 1 ) {
				$nav_menu_tree_build = $nav_menu_levels_reverse;
			}
			$current_level = array_shift( $nav_menu_levels_reverse );
			if ( isset( $nav_menu_levels_reverse[ $index ] ) ) {
				$next_level = $nav_menu_levels_reverse[ $index ];
				foreach ( $next_level as $nkey => $nval ) {
					foreach ( $current_level as $ckey => $cval ) {
						if ( $nval->db_id == $cval->menu_item_parent ) {
							$nval->children[] = $cval;
						}
					}
				}
			}
		} while ( ! empty( $nav_menu_levels_reverse ) );
	
		$nav_menu_object_tree = $nav_menu_tree_build[ 0 ];
		return $nav_menu_object_tree;
	}

	/**
	 * Initialize ... usually run in 'init' add_action
	 */
	public static function init() {
		//self::do_something_on_startup();
	}
}

add_action( 'init', array( 'ActAppTpl', 'init' ) );
