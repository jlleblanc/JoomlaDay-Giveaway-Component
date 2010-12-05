<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

JToolBarHelper::title( 'Swag List' );

JToolBarHelper::deleteList();
JToolBarHelper::editList();
JToolBarHelper::addNew();

?>
<form action="index.php" method="post" name="adminForm">
	<table class="adminlist">
		<thead>
			<tr>
				<th width="20">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->swag ); ?>);" />
				</th>
				<th class="title">Attendee_id</th>
				<th>Name</th>
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
				<td><a href="<?php echo $link; ?>"><?php echo $row->attendee_id ?></a></td>
				<td><?php echo $row->name ?></td>
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