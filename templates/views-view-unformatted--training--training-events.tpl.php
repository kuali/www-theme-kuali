<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<script type="text/javascript" src="/sites/all/themes/kuali/js/jquery.collapsible.js"></script>
<script type="text/javascript" src="/sites/all/themes/kuali/js/toggleVisible.js"></script>
<div class="spacer"></div>
<table class="table training-outer">
<thead>
<tr>
 <th>Sessions</th>
 <th>Course</th>
 <th>Category</th>
 <th>Company</th>
 <th>Project</th>
</tr>
</thead>
<tbody>
<?php foreach ($rows as $id => $row): ?>
<tr <?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
<?php print $row; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>