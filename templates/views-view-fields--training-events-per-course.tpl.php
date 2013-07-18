<?php foreach ($fields as $id => $field): ?>
<td class="inner <?php print $id; ?>">
  <?php print $field->content; ?>
</td>
<?php endforeach; ?>