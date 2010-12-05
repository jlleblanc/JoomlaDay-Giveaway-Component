<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<table id="swaglist">
	<thead>
		<tr>
			<th>attendee_id</th>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($this->swag as $row): ?>
		<?php $link = JRoute::_('index.php?option=com_giveaway&amp;view=swag&amp;id='. $row->swag_id); ?>
		<tr>
			<td><a href="<?php echo $link; ?>"><?php echo $row->attendee_id ?></a></td>
			<td><?php echo $row->name ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>