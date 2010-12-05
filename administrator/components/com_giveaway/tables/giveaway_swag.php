<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableGiveaway_swag extends JTable
{
	var $attendee_id = null;
	var $name = null;
	var $swag_id = null;
	
	function __construct(&$db)
	{
		parent::__construct('#__giveaway_swag', 'swag_id', $db);
	}
}