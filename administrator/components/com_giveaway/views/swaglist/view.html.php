<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class GiveawayViewSwaglist extends JView
{
	function display($tpl = null)
	{
		$swag = $this->get('swag');
		$this->assignRef('swag', $swag);
		parent::display($tpl);
	}
}