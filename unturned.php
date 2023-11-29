<?php

use WHMCS\ClientArea;
use WHMCS\Database\Capsule;

define('CLIENTAREA', true);

require __DIR__ . '/init.php';

$ca = new ClientArea();

$ca->setPageTitle('Unturned');

$ca->initPage();

if ($ca->isLoggedIn()) {

    $clientName = Capsule::table('tblclients')
        ->where('id', '=', $ca->getUserID())->pluck('firstname');
    $ca->assign('clientname', $clientName);

} else {
    $ca->assign('clientname', 'Random User');

}

$ca->setTemplate('unturned');

$ca->output();

?>