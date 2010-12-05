<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class GiveawayModelAttendee extends JModel
{
	private $attendee;
	
	function getAttendee()
	{
		if (!isset($this->attendee))
		{
			$query = "SELECT name, email, attendee_id FROM #__giveaway_attendee";
			$this->attendee = $this->_getList($query);
		}
	
		return $this->attendee;
	}
	
}