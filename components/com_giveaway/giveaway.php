<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

JTable::addIncludePath(JPATH_COMPONENT_ADMINISTRATOR . DS . 'tables');

require_once JPATH_COMPONENT . DS . 'controller.php';

$controller = new GiveawayController();
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();