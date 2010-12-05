<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class GiveawayModelSwaglist extends JModel
{
	private $swag;
	
	function getSwag()
	{
		if (!isset($this->swag))
		{
			$query = "SELECT s.name AS swag_name, s.swag_id, a.name AS attendee_name "
					."FROM #__giveaway_swag AS s "
					."LEFT JOIN #__giveaway_attendee AS a USING(attendee_id) ";
			$this->swag = $this->_getList($query);
		}
	
		return $this->swag;
	}
	
	function save($post)
	{
		$row =& JTable::getInstance('giveaway_swag', 'Table');
	
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