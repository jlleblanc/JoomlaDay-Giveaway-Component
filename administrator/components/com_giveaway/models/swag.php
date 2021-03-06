<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class GiveawayModelSwag extends JModel
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