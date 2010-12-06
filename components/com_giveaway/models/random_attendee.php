<?php
defined( '_JEXEC' ) or die;

jimport('joomla.application.component.model');

class GiveawayModelRandom_attendee extends JModel
{
	private $random;

	public function getRandom()
	{
		if (!isset($this->random))
		{
			$query = "SELECT a.* FROM #__giveaway_attendee AS a "
					."LEFT JOIN #__giveaway_swag USING (attendee_id) "
					."WHERE swag_id IS NULL ORDER BY rand()";

			$rows = $this->_getList($query);

			if (count($rows)) {
				$this->random = $rows[0];
			} else {
				$this->random = false;
			}
		}

		return $this->random;
	}

	/**
	 * Poor choice of terminology, because this is a quick and dirty way of
	 * doing it.
	 *
	 * @return void
	 * @author Joseph LeBlanc
	 */
	public function getMarkRandom()
	{
		$swag_id = JRequest::getInt('swag_id', 0);

		$random = $this->getRandom();

		$query = "UPDATE #__giveaway_swag SET attendee_id = '{$random->attendee_id}' "
				."WHERE swag_id = '{$swag_id}'";

		$database = JFactory::getDBO();
		$database->setQuery($query);
		$database->query();
	}
}