<?php
/**
 *  Initial pre-process
 */
function kuali_preprocess(&$variables, $hook) {
    $variables['is_software_page'] = FALSE;
}
/**
 *  Pre-process variables before any HTML load
 */
function kuali_preprocess_html(&$variables) {
	global $user;
/**
 *  Detect IE/IE9 and add conditional stylesheets
 */
 	drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE', '!IE' => FALSE), 'preprocess' => FALSE));
 	drupal_add_css(path_to_theme() . '/css/ie8.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 8', '!IE' => FALSE), 'preprocess' => FALSE));
/**
 *  Detect the home page and add a custom stylesheet
 */
 	if (drupal_is_front_page()) {
	 	drupal_add_css(path_to_theme() . '/css/home.css', 'theme','all');
	 	drupal_add_js(path_to_theme() . '/js/show_hide.js', 'file');	 	
	 	$head_title['name'] = '';
	}
/**
 *  CSS modifications to Drupal elements or administration theme(s)
 */
 	if ($variables['user']->uid != 0){
		drupal_add_css(path_to_theme() . '/css/system.css', 'theme','all');  
	}
/**
 *  Add HTML headers
 */
$headers['author'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'author',
    'content' => 'Kuali Foundation, info @ kuali.org'
  ));
drupal_add_html_head( $headers['author'], 'author' );

$headers['ie_compatibility'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'http-equiv' => 'X-UA-Compatible',
    'content' => 'IE=9; IE=8; IE=7;'
  ));
drupal_add_html_head( $headers['ie_compatibility'], 'ie_compatibility' );

$headers['itemprop_name'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'itemprop' => 'name',
    'content' => 'Kuali Foundation'
  ));
drupal_add_html_head( $headers['itemprop_name'], 'itemprop_name' );

$headers['itemprop_description'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'itemprop' => 'description',
    'content' => 'The Kuali Foundation produces quality, community source software for higher education, by higher education.'
  ));
drupal_add_html_head( $headers['itemprop_description'], 'itemprop_description' );

$headers['itemprop_image'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'itemprop' => 'image',
    'content' => path_to_theme() . '/images/fb-thumb.jpg'
  ));
drupal_add_html_head( $headers['itemprop_image'], 'itemprop_image' );

$headers['fb_page_id'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'property' => 'fb:page_id',
    'content' => '109440207855'
  ));
drupal_add_html_head( $headers['fb_page_id'], 'fb_page_id' );

$headers['twitter_card'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:card',
    'content' => 'summary'
  ));
drupal_add_html_head( $headers['twitter_card'], 'twitter_card' );

$headers['twitter_site'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'twitter:site',
    'content' => '@kauli'
  ));
drupal_add_html_head( $headers['twitter_site'], 'twitter_site' );

$headers['google_plus'] = array(
  '#tag' => 'link',
  '#attributes' => array(
    'rel' => 'publisher',
    'href' => 'https://plus.google.com/105587317739155693175'
  ));
drupal_add_html_head( $headers['google_plus'], 'google_plus' );

$headers['apple_touch_icon'] = array(
  '#tag' => 'link',
  '#attributes' => array(
    'rel' => 'apple-touch-icon-precomposed',
    'href' => base_path() . path_to_theme() . '/images/touch-icon.png'
  ));
drupal_add_html_head( $headers['apple_touch_icon'], 'apple_touch_icon' );

$headers['apple_touch_icon_72'] = array(
  '#tag' => 'link',
  '#attributes' => array(
    'rel' => 'apple-touch-icon-precomposed',
    'sizes' => '72x72',
    'href' => base_path() . path_to_theme() . '/images/touch-icon@72x72.png'
  ));
drupal_add_html_head( $headers['apple_touch_icon_72'], 'apple_touch_icon_72' );

$headers['apple_touch_icon_114'] = array(
  '#tag' => 'link',
  '#attributes' => array(
    'rel' => 'apple-touch-icon-precomposed',
    'sizes' => '114x114',
    'href' => base_path() . path_to_theme() . '/images/touch-icon@114x114.png'
  ));
drupal_add_html_head( $headers['apple_touch_icon_114'], 'apple_touch_icon_114' );

$headers['viewport'] = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'name' => 'viewport',
    'content' => 'width=device-width,initial-scale=1'
  ));
drupal_add_html_head( $headers['viewport'], 'viewport' );

}

/**
 *  Pre-process variables before PAGE load
 */
function kuali_preprocess_page(&$variables) {
	if (isset($variables['node']->type)) {
	// This code looks for any page--custom_content_type.tpl.php page
	$variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
	}
	//global $variables;
	if (arg(0) == 'node') {
		$variables['node_content'] =& $variables['page']['content']['system_main']['nodes'][arg(1)];
	}
	global $base_url, $default_mobile_metatags, $skip_link_text;
	$variables['base_url'] = $base_url;
	$variables['default_mobile_metatags'] = $default_mobile_metatags;
	$variables['skip_link_text'] = $skip_link_text;
	
	/**
	 * ASCERTAIN WHETHER TO USE SUBTHEME
	 */
	if (isset($variables['node'])){
		$field_uses_subtheme = field_get_items('node', $variables['node'], 'field_uses_subtheme');
		if ($field_uses_subtheme[0]['value'] == '1'){
			drupal_add_css(path_to_theme() . '/css/subtheme.css', array('group' => CSS_THEME, 'weight' => 999));
		}
	}
	
}
/**
 *  Pre-process variables before NODE load
 */
function kuali_preprocess_node(&$variables) {
	/**
     *  Add the "slideshow" CSS to the top section pages --
     * identified by node->nid
     */
	if ($variables['node']->nid == '2' || $variables['node']->nid == '3' || $variables['node']->nid == '4'){
		drupal_add_css(path_to_theme() . '/css/slideshow.css', 'theme','all'); 
	}
	/**
     *  Redirect users away from the node pages
     * of auxiliary content
     */
     if ($variables['user']->uid == 0 && (
     		$variables['node']->type == 'banner_home'	||
     		$variables['node']->type == 'banner_tier_2'	||
     		$variables['node']->type == 'button_home'	||
     		$variables['node']->type == 'button_tier_2'	||
     		$variables['node']->type == 'subtheme'
     	)){
     	if (!empty($variables['field_destination_url']['0']['value'])){
     		// Pop off the preceding "/" if it exists
     		if (substr($variables['field_destination_url']['0']['value'],0,1) == '/'){
	     		drupal_goto(substr($variables['field_destination_url']['0']['value'], 1),array(),301);
     		} else{
     		drupal_goto($variables['field_destination_url']['0']['value'],array(),301);
     		}
     	}
     }
    /**
     *  Add the "field_description" to the HTML header
     */
     if (!empty($variables['field_description']['und']['0']['value'])){
	     $headers['page_description'] = array(
		  '#tag' => 'meta',
		  '#attributes' => array(
		    'name' => 'description',
		    'content' => $variables['field_description']['und']['0']['value']
		  ));
		  drupal_add_html_head($headers['page_description'], 'page_description' );
	 }
	  
}
	/**
     * Determine whether the current node is a software or site page.
     * We'll use this to print the node title, or the software name
     * from the taxonomy.
     */
/*
	function kuali_is_software_page(&$variables){
		if ((!empty($node->field_software['und'][0]['taxonomy_term']->name)) && $variables['page']['content']['field_page_type']['und'][0]['taxonomy_term']->name == 'Software sub-page'){
			return FALSE;
		} else{ return TRUE; }
	}
*/

/**
 * BREADCRUMB MODIFICATIONS
 *  1. Print the breadcrumb as a list, rather than 
 *     links with spaces, and
 *  2. Add page title to end of breadcrumb, but not as a link
 */
function kuali_breadcrumb($variables) {
   if (count($variables['breadcrumb']) > 0) {
   	if ($variables['node'] == 'job'){
	   	$crumbs = '<ul class="breadcrumbs">';
		$crumbs .= '<li class="breadcrumb-first"><a href="/">Kuali Home</a></li>';
		$crumbs .= '<li class="breadcrumb"><a href="/community">Community</a></li>';
		$crumbs .= '<li class="breadcrumb"><a href="/community/news">News</a></li>';
		return $crumbs;
   	} else{
		     $crumbs = '<ul class="breadcrumbs">';
		     $a=1;
		     foreach($variables['breadcrumb'] as $value) {
		         if ($value == '<a href="/">Home</a>') { $value ='<a href="/">Kuali Home</a>'; }
		         if ($a!= sizeof($variables['breadcrumb'])){
		          $crumbs .= '<li class="breadcrumb-'.$a.'">'. $value .'</li>'; 
		          $a++;
		         }
		         else {
		         		if ($a == 1){
			         		$crumbs .= '<li class="breadcrumb first">'.$value.'</li>';
		         		} else{
		             $crumbs .= '<li class="breadcrumb-last">'.$value.'</li>';
		             }
		         }
		     }
		     $crumbs .= '<li class="breadcrumb-last-title">'.drupal_get_title().'</li></ul>';
		   return $crumbs;   
   }
   }
   else {
     return NULL;
   }
 }
/**
 *  Add the "nolink" feature
 */
function kuali_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  if (strpos( $element['#href'], 'nolink')) {
    $output = '<a href="#" class="nolink">' . $element['#title'] . '</a>';
  } else {
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}
/**
 * Modify the default Drupal search field
 */
function kuali_form_alter(&$form, &$form_state, $form_id) {
	$form['actions']['submit']['#value'] = t('Go'); // Change the text on the submit button
	$form['search_block_form']['#attributes']['value'] = "Search Kuali";
	$form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search Kuali';}";
	$form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search Kuali') {this.value = '';}";
	$form['search_block_form']['#attributes']['class'][] = "textfield";
	$form['actions']['submit']['#attributes']['class'][] = "btn alt search";
}

function kuali_print_home_spotlight_img($img_type_toggle, $img_content_img, $img_content_youtube, $link_url){
	if (!empty($link_url)){
		print '<a href="'.$link_url.'">';
	}
	switch ($img_type_toggle){
		case 'img':
			print render ($img_content);
		break;	
		case 'youtube':
		
		break;
	}
	if (!empty($link_url)){
		print '</a>';
	}
}