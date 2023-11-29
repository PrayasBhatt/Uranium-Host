<?php

use WHMCS\ClientArea;
use WHMCS\Database\Capsule;

define('CLIENTAREA', true);

require __DIR__ . '/init.php';

$ca = new ClientArea();

$ca->setPageTitle('Left 4 Dead 2');

$ca->initPage();

if ($ca->isLoggedIn()) {

    $clientName = Capsule::table('tblclients')
        ->where('id', '=', $ca->getUserID())->pluck('firstname');
    $ca->assign('clientname', $clientName);

} else {
    $ca->assign('clientname', 'Random User');

}

$ca->setTemplate('left-4-dead-2');

$ca->output();

?>