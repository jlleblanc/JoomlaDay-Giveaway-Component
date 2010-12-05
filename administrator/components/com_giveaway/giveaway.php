<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

JTable::addIncludePath( JPATH_COMPONENT . DS . 'tables' );

$controller = JRequest::getCmd('controller', '');

switch ($controller) {
	case 'attendeelist':
		$controllerName = 'attendeelist';
		break;
		
	case 'swaglist':
		$controllerName = 'swaglist';
		break;
		
	default:
		$controllerName = 'attendeelist';
		break;
}

include JPATH_COMPONENT . DS . 'controllers' . DS . $controllerName . '.php';

$controllerName = "GiveawayController{$controllerName}";

$controller = new $controllerName();
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();