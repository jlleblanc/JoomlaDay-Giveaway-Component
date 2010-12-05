<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');

class GiveawayControllerSwaglist extends JController
{	
	public function add()
	{
		JRequest::setVar('view', 'swag');
		$this->display();
	}
	
	public function edit()
	{
		JRequest::setVar('view', 'swag');
		$this->display();
	}
	
	public function save()
	{
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		$post = JRequest::get( 'post' );
	
		$model = $this->getModel('swaglist');
		$model->save($post);
	
		$this->setRedirect( 'index.php?option=com_giveaway&controller=swaglist', 'Swag Saved' );
	}
	
	public function remove()
	{
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		$cid = JRequest::getVar('cid', array(0));
		JArrayHelper::toInteger( $cid );
		$row =& JTable::getInstance('giveaway_swag', 'Table');
	
		foreach ($cid as $id) {
			if (!$row->delete($id)) {
				return JError::raiseWarning( 500, $row->getError() );
			}
		}
	
		// Some pluralization, you may need to change this for your purposes
		$s = '';
	
		if (count($cid) > 1) {
			$s = 's';
		}
	
		$this->setRedirect( 'index.php?option=com_giveaway&controller=swaglist', "Swag{$s} Deleted" );
	}

	public function import()
	{
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$giveaways = JRequest::getString('giveaways', '');
		$giveaways = explode("\n", $giveaways);

		foreach ($giveaways as $giveaway) {
			$row = JTable::getInstance('giveaway_swag', 'Table');
			$row->name = $giveaway;
			$row->store();
		}

		$this->setRedirect('index.php?option=com_giveaway&view=swaglist', 'Swag Imported');
	}
	
	function display()
	{
		$view = JRequest::getVar('view', '');
		
		if ($view == '') {
			JRequest::setVar('view', 'swaglist');
		}
		
		parent::display();
	}
}
