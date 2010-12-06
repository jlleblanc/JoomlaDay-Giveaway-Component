<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

JHTML::_('behavior.mootools');

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components/com_giveaway/views/swaglist/tmpl/default.css');
$document->addScript(JURI::base() . 'components/com_giveaway/views/swaglist/tmpl/default.js');

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
				<?php echo $row->attendee_name ?>
				<img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower($row->email)) ?>?r=g" />
			<?php else: ?>
				<span class="select_winner" rel="<?php echo $row->swag_id ?>">-select-</span></td>
			<?php endif ?>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>