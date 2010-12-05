<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class GiveawayController extends JController
{	
	
	function display()
	{
		$view = JRequest::getVar('view', '');
		
		if ($view == '') {
			JRequest::setVar('view', 'attendeelist');
		}
		
		parent::display();
	}
}
