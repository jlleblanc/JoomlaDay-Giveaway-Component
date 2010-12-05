<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

class TableGiveaway_attendee extends JTable
{
	var $name = null;
	var $email = null;
	var $attendee_id = null;
	
	function __construct(&$db)
	{
		parent::__construct('#__giveaway_attendee', 'attendee_id', $db);
	}
}