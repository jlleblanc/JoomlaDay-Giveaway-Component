<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');

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
			$row->name = trim($giveaway);
			$row->store();
		}

		$this->setRedirect('index.php?option=com_giveaway&view=swaglist', 'Swag Imported');
	}
	
	function simulate() {
		$email = JRequest::getVar('simulateemail');
		$this->sendswagmail($email);
	}
	
	function sendemail() {
		$this->sendswagmail();		
	}
	
	function sendswagmail($winneremail = null) {
		$params = &JComponentHelper::getParams( 'com_giveaway' );
		$mainframe = JFactory::getApplication();
		
		$subject = $params->get('email_subject');
		$body = $params->get('email_message');
		$fromname = $params->get('email_fromname', $mainframe->getCfg('fromname'));
		$fronemail = $params->get('email_fromemail', $mainframe->getCfg('mailfrom'));
		
		$db = JFactory::getDBO();
		$qry = 'SELECT s.swag_id, s.name as swagname, a.attendee_id, a.name AS attendee_name, a.email 
		FROM #__giveaway_swag AS s
		LEFT JOIN #__giveaway_attendee AS a ON s.attendee_id=a.attendee_id
		';
		$db->setQuery($qry);
		$swagrows = $db->loadAssocList();
		
		echo '<table width="100%">';
		echo '<tr><th align="left">Attendee Name</th><th align="left">Attendee Email</th><th align="left">Swag</th><th align="left">Status</th></tr>';
		foreach ($swagrows as $swagrow) {
			$text = $body;
			$recipient = $winneremail ? $winneremail : $swagrow['email'];

			foreach ($swagrow as $k=>$v) {
				$text = str_replace('{'.$k.'}', $v, $text);
			}

			$done = JUtility::sendmail($fronemail, $fromname, $recipient, $subject, $text);
			$status = $done ? JText::_('Mail Sent') : JText::_('Mail not sent');
			echo '<tr><td>'.$swagrow['attendee_name'].'</td><td>'.$recipient.'</td>';
			echo '<td>'.$swagrow['swagname'].'</td><td>'.$status.'</td></tr>';
		}
		echo '</table>';
		
	}
	
	function randomassign() {
		$db = JFactory::getDBO();
		
		$qry = "SELECT COUNT(-1) FROM #__giveaway_swag";
		$swags = $db->setQuery($qry);
		$swag_count = $db->loadResult();
		
		if (!$swag_count) {
			$this->setRedirect('index.php?option=com_giveaway&view=swaglist', 'No Swags');
		}
		
		$qry = "SELECT attendee_id FROM #__giveaway_attendee LIMIT {$swag_count}";
		$db->setQuery($qry);
		$winners = $db->loadResultArray();
		
		$done = 0;
		$tmp_array = array();
		for ($i=0; $i<$swag_count; $i++) {
			
			// Populate tmp array if its empty
			// This is to ensure all attendees get at least 1 swag 
			if (!count($tmp_array)) {
				$tmp_array = $winners;
			}
			
			$key = array_rand($tmp_array);
			$winner = $tmp_array[$key];
			$qry = "UPDATE #__giveaway_swag SET attendee_id = {$winner} WHERE (attendee_id = 0 OR attendee_id IS NULL) LIMIT 1";
			$db->setQuery($qry);
			if ($db->query()) {
				$tmp_array[$key];
				$done++;
			}
		}
		
		$this->setRedirect('index.php?option=com_giveaway&view=swaglist', 'Swags randomly assigned to attendees');
		
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
