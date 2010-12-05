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
			$query = "SELECT attendee_id, name, swag_id FROM #__giveaway_swag";
			$this->swag = $this->_getList($query);
		}
	
		return $this->swag;
	}
	
}