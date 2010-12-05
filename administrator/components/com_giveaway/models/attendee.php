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
	
	function save($post)
	{
		$row =& JTable::getInstance('giveaway_attendee', 'Table');
	
		if (!$row->bind( $post )) {
			return JError::raiseWarning( 500, $row->getError() );
		}
	
		if (!$row->check()) {
			return JError::raiseWarning( 500, $row->getError() );
		}
	
		if (!$row->store()) {
			return JError::raiseWarning( 500, $row->getError() );
		}
	
		return true;
	}
}