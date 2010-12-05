<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<table id="attendeelist">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($this->attendee as $row): ?>
		<?php $link = JRoute::_('index.php?option=com_giveaway&amp;view=attendee&amp;id='. $row->attendee_id); ?>
		<tr>
			<td><a href="<?php echo $link; ?>"><?php echo $row->name ?></a></td>
			<td><?php echo $row->email ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>