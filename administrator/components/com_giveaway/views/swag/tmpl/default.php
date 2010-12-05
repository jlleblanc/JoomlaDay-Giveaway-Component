<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

JToolBarHelper::title( 'Swag' );

JToolBarHelper::cancel();
JToolBarHelper::save();

?>
<form action="index.php" method="post" name="adminForm">
	<div class="col width-45">
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'Details' ); ?></legend>
		<table class="admintable">
			<tr>
				<td width="110" class="key">
					<label for="title">
						Attendee_id
					</label>
				</td>
				<td>
					<input class="inputbox" type="text" name="attendee_id" size="60" value="<?php echo $this->row->attendee_id; ?>" />
				</td>
			</tr>
			
			<tr>
				<td width="110" class="key">
					<label for="title">
						Name
					</label>
				</td>
				<td>
					<input class="inputbox" type="text" name="name" size="60" value="<?php echo $this->row->name; ?>" />
				</td>
			</tr>
			
		</table>
		</fieldset>
	</div>
	
	<input type="hidden" name="controller" value="swaglist" />
	<input type="hidden" name="swag_id" value="<?php echo $this->row->swag_id ?>" />
	<input type="hidden" name="option" value="com_giveaway" />
	<input type="hidden" name="task" value="" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>