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
}