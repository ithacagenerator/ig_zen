<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
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
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
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
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>
<header id="header" role="banner">
<div class="container home">
  <div class="row">
    <div class="span4">
        <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
      </div>
    <div class="span8 pull-right ig-nav text-right">
      <ul class="nav nav-pills">
        <?php if ($main_menu): ?>
          <nav id="main-menu" role="navigation">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see http://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>
      </ul>
    </div>
  </div>
    <?php endif; ?>
</div>

<div class="container">
  <div class="row">
    <div class="span12">
      <?php print render($page['header']); ?>
    </div>
  </div>
</div>
</header>


 
      <a id="main-content"></a>

      <?php print render($title_prefix); ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>

  <div class="container">
    <div class="row">
      <div class="span10">
        <div class="hero">
        <div id="my-slideshow" class="mobile-hide" > 
          <?php print render($page['highlighted']); ?> 
        </div>
      </div>
      </div>
      <div class="span2">
        <div class="well">
          <?php print render($page['clubs']); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">

      <div class="span6">
        <div class="well">
          <?php print render($page['front_col1']); ?>
        </div>
      </div>

      <div class="span4">
        <?php print render($page['front_col2']); ?>
      </div>
  
      <div class="span2">
        <?php print render($page['front_col3']); ?>
      </div>

    </div>
  </div>


      <?php print render($page['navigation']); ?>



  <?php print render($page['footer']); ?>

      <script>
        jQuery(document).ready(function($) {

          $('#my-slideshow').bjqs({
            // width and height need to be provided to enforce consistency
// if responsive is set to true, these values act as maximum dimensions
width : 1800,
height : 400,

// animation values
animtype : 'fade', // accepts 'fade' or 'slide'
animduration : 450, // how fast the animation are
animspeed : 4000, // the delay between each slide
automatic : true, // automatic

// control and marker configuration
showcontrols : false, // show next and prev controls
centercontrols : false, // center controls verically
nexttext : 'Next', // Text for 'next' button (can use HTML)
prevtext : 'Prev', // Text for 'previous' button (can use HTML)
showmarkers : false, // Show individual slide markers
centermarkers : false, // Center markers horizontally

// interaction values
keyboardnav : false, // enable keyboard navigation
hoverpause : false, // pause the slider on hover

// presentational options
usecaptions : false, // show captions for images using the image title tag
randomstart : true, // start slider at random slide
responsive : true // enable responsive capabilities (beta)
          });

        });
      </script>
<?php print render($page['bottom']); ?>
