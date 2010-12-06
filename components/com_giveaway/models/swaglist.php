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
			$query = "SELECT s.name, s.swag_id, a.name AS attendee_name, a.email "
					."FROM #__giveaway_swag AS s "
					."LEFT JOIN #__giveaway_attendee AS a USING(attendee_id) ";
			$this->swag = $this->_getList($query);
		}
	
		return $this->swag;
	}
	
}