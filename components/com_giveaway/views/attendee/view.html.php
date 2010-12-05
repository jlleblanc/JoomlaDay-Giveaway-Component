<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class GiveawayViewAttendee extends JView
{
	function display($tpl = null)
	{
		$id = JRequest::getInt('id', 0);
		
		$row =& JTable::getInstance('giveaway_attendee', 'Table');
		$row->load($id);
		
		$this->assignRef('row', $row);
		parent::display($tpl);
	}
}