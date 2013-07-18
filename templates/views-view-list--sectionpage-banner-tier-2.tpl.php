<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
  <?php print str_replace ('<ul class="slideshow">', '<ul id="slideshow">', $list_type_prefix); ?>
    <?php foreach ($rows as $id => $row): ?>
      <li><?php print $row; ?></li>
    <?php endforeach; ?>
