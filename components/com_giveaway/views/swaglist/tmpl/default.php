<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_giveaway/views/swaglist/tmpl/default.css');

?>
<table id="swaglist">
	<thead>
		<tr>
			<th>Item</th>
			<th>Winner</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($this->swag as $row): ?>
		<tr>
			<td><?php echo $row->name ?></td>
			<td><?php if ($row->attendee_name): ?>
				<img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower($row->email)) ?>?r=g" />
				<p><?php echo $row->attendee_name ?></p>
			<?php endif ?>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>