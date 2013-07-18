 <th rowspan="auto"><img id="section_<?php print $row->nid; ?>_btn" src="/sites/all/themes/kuali/images/tinybutton-show.gif" alt="Show" onclick='javascript:toggleVisible("section_<?php print $row->nid; ?>","section_<?php print $row->nid; ?>_btn")' /></th>
 <td><?php print $fields['title']->content; ?></td>
 <td><?php print $fields['field_category_event']->content; ?></td>
 <td><?php print $fields['field_organization']->content; ?></td>
 <td><?php print $fields['field_software']->content; ?></td>
</tr>
<tr id="section_<?php print $row->nid; ?>" style="display: none;" class="view-row">
 <td> </td>
 <td colspan="4" class="nomargin nopadding">
   <?php
   if (!strpos($fields['view']->content,"There are no current sessions scheduled for this event.")){
   ?>
   <table class="table training-inner" <?php print $field->wrapper_prefix; ?>>
			<thead>
				<tr>
					<th>Date</th>
					<th>Confirmed/Tentative</th>
					<th>Format</th>
					<th>Register</th>
				</tr>
			</thead>
			<tbody class="inner-content">
				<?php print ($fields['view']->content); ?>
			</tbody>
		</table>
	<?php } else{
		print '<em>There are no current sessions scheduled for this event.</em>';
	} ?>
	</td>