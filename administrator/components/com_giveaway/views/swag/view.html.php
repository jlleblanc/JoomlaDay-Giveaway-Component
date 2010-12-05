<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class GiveawayViewSwag extends JView
{
	function display($tpl = null)
	{
		$cid = JRequest::getVar('cid', array(0), '', 'array');
		$id = (int) $cid[0];
		
		if (!$id) {
			$id = JRequest::getInt('id', 0);
		}
		
		$row =& JTable::getInstance('giveaway_swag', 'Table');
		$row->load($id);
		
		$this->assignRef('row', $row);
		
		parent::display($tpl);
	}
}