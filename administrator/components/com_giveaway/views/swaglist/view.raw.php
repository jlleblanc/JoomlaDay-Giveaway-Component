<?php
defined( '_JEXEC' ) or die;

jimport( 'joomla.application.component.view');

class GiveawayViewSwaglist extends JView
{
	public function display($tpl = null)
	{
		$swag = $this->get('swag');

		$text_rows = array('Item Name,Attendee Name,Attendee Email');
		foreach ($swag as $row) {
			$text_rows[] = $row->swag_name . ',' . $row->attendee_name . ',' . $row->email;
		}

		header("Cache-Control: no-cache");
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="swag.csv"');

		echo implode("\n", $text_rows);
		exit;
	}
}
