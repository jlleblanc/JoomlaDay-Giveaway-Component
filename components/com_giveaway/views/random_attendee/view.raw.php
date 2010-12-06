<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class GiveawayViewRandom_attendee extends JView
{
	public function display($tpl = null)
	{
		$random = $this->get('random');
		$this->assign('random', $random);

		$this->get('MarkRandom');

		parent::display($tpl);
	}
}