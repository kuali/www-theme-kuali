<?php
/**
 * The Kuali theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see bartik_process_page()
 * @see html.tpl.php
 */
?>
<?php require_once('header.inc'); ?>
<div id="content-outer-wrapper">
    <div id="shadow-bottom">
        <div id="content-inner-wrapper">
	        <?php if ($breadcrumb): ?>
            <div id="breadcrumb">
            	<?php print $breadcrumb; ?>
            	<div id="tabs_wrapper">
	            	<?php print render($tabs); ?>
	            </div>
            </div>
            <div id="breadcrumb-spacer"></div>
            <?php endif; ?>
            <?php if ($title): ?>
            <div id="title-block" class="rice">
            <h1>News</h1>
            <div id="title-bar-bg"></div>
            </div>
            <?php endif; ?>

            <?php if ($page['sidebar_left']): ?>
            <nav id="left-subnav">
            <?php print render($page['sidebar_left']); ?>
			<div id="left-subnav-lower"></div>
            </nav>
        <?php endif; ?>
            <div id="content-block" class="<?php if ($page['sidebar_left']) { print 'left-subnav '; } if ($page['sidebar_right']) { print 'right-rail-present-outer'; } ?>">
                <article id="content"<?php if ($page['sidebar_right']){ print ' class="right-rail-present-inner"'; } ?>>
	            <?php	            	
	            	print render($page['content']);
	            ?>
	            <?php
	            if ($page['sidebar_right']){
	            ?>
	            </article>
	            <div id="right-rail">
		        <div class="right-rail-content">
			    <?php
			    print render($page['sidebar_right']);
			    ?>
			    </div>
			    </div>
			    <?php } ?>	            
            </div>
            <div class="clear"></div>
                    </div>
        <div class="clear"></div>
    </div>
</div>
<?php
/* Added to fix the bottom white space.
 * Re-evaluate if it breaks other things
 */
 echo '</div>';
?>
<?php require_once('footer.inc'); ?>