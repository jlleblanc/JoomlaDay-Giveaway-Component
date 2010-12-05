<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

JToolBarHelper::title( 'Attendee' );

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
						Name
					</label>
				</td>
				<td>
					<input class="inputbox" type="text" name="name" size="60" value="<?php echo $this->row->name; ?>" />
				</td>
			</tr>
			
			<tr>
				<td width="110" class="key">
					<label for="title">
						Email
					</label>
				</td>
				<td>
					<input class="inputbox" type="text" name="email" size="60" value="<?php echo $this->row->email; ?>" />
				</td>
			</tr>
			
		</table>
		</fieldset>
	</div>
	
	<input type="hidden" name="controller" value="attendeelist" />
	<input type="hidden" name="attendee_id" value="<?php echo $this->row->attendee_id ?>" />
	<input type="hidden" name="option" value="com_giveaway" />
	<input type="hidden" name="task" value="" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>