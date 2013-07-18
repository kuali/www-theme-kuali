<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<table class="table training-outer">
<thead>
<tr>
<th>Date</th>
<th>Confirmed/Tentative</th>
<th>Format</th>
<th>Register</th>
<?php if ($variables['user']->uid != 0){
 print '<th>Edit</th>';
}
?>
</tr>
</thead>
<tbody>
<?php foreach ($rows as $id => $row): ?>
<tr>
    <?php print $row; ?>
</tr>
<?php endforeach; ?>
</tbody>
</table>