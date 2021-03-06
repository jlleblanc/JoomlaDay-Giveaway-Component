<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

JToolBarHelper::title( 'Swag List' );

JToolBarHelper::deleteList();
JToolBarHelper::editList();
JToolBarHelper::addNew();

$document = JFactory::getDocument();
$document->addScript(JURI::base() . 'components/com_giveaway/views/swaglist/tmpl/default.js');
$document->addStyleSheet(JURI::base() . 'components/com_giveaway/views/swaglist/tmpl/default.css');


?>
<p><a href="index.php?option=com_giveaway&amp;view=swaglist&amp;format=raw">Download CSV</a></p>
<form action="index.php" method="post" name="adminForm">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="20">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->swag ); ?>);" />
				</th>
				<th class="title">Giveaway Item</th>
				<th>Winner</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
			$k = 0;
			for ($i=0, $n=count( $this->swag ); $i < $n; $i++)
			{
				$row = &$this->swag[$i];

				$link = 'index.php?option=com_giveaway&amp;view=swag&amp;cid[]='. $row->swag_id;
				$checkbox = JHTML::_('grid.id', $i, $row->swag_id );
			?>
			<tr class="<?php echo "row{$k}"; ?>">
				<td>
					<?php echo $checkbox; ?>
				</td>
				<td><a href="<?php echo $link; ?>"><?php echo $row->swag_name ?></a></td>
				<td>
				<?php if ($row->attendee_name): ?>
					<img src="http://www.gravatar.com/avatar/<?php echo md5(strtolower($row->email)) ?>?r=g" />
					<p><?php echo $row->attendee_name ?></p>
				<?php else: ?>
					<span class="select_winner" rel="<?php echo $row->swag_id ?>">-select-</span>
				<?php endif ?>
				</td>
			</tr>
			<?php
				$k = 1 - $k;
			}
			?>
		</tbody>
	</table>
	
	<input type="hidden" name="controller" value="swaglist" />
	<input type="hidden" name="option" value="com_giveaway" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
<p>&nbsp;</p>
<form action="index.php" method="post" accept-charset="utf-8">
	<fieldset id="import_attendees" class="adminform">
		<legend>Import Giveaways</legend>

		<p><strong>Instructions:</strong> List the names of each item. For multiple instance of the same item, list the item multiple times</p>

		<textarea name="giveaways" rows="15" cols="80"></textarea>

		<p><input type="submit" value="Import"></p>
		<input type="hidden" name="controller" value="swaglist" />
		<input type="hidden" name="option" value="com_giveaway" />
		<input type="hidden" name="task" value="import" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</fieldset>
	
</form>