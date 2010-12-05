<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class GiveawayViewAttendeelist extends JView
{
	function display($tpl = null)
	{
		$attendee = $this->get('attendee');
		$this->assignRef('attendee', $attendee);
		parent::display($tpl);
	}
}