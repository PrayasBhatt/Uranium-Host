<?php

// Display Client's Credit Balance in Client Area

use WHMCS\View\Menu\Item as MenuItem;
use Illuminate\Database\Capsule\Manager as Capsule;

# Add Balance To Sidebar
add_hook('ClientAreaPrimarySidebar', 1, function(MenuItem $primarySidebar){

    $filename = basename($_SERVER['REQUEST_URI'], ".php");
    
    $parseFile = explode('.', $filename);
    
    $client = Menu::context("client");
    
    $clientid = intval($client->id);
    
    if ($parseFile['0']!=='clientarea' || $clientid===0){
        return;
    }

    $primarySidebar->addChild('Client-Balance', array(
        'label' => "Available Credit",
        'uri' => '#',
        'order' => '1',
        'icon' => 'fa-coin'
    ));
    
    # Get Currency
    $getCurrency = Capsule::table('tblcurrencies')->where('id', $client->currency)->get();
    
    # Retrieve the panel we just created.
    $balancePanel = $primarySidebar->getChild('Client-Balance');
    
    // Move the panel to the end of the sorting order so it's always displayed
    // as the last panel in the sidebar.
    $balancePanel->moveToBack();
    $balancePanel->setOrder(0);
    
    # Add Balance.
    $balancePanel->addChild('balance-amount', array(
        'uri' => 'clientarea.php?action=addfunds',
        'label' => '<h4 style="text-align:center;">'.$getCurrency['0']->prefix.$client->credit.' '. $getCurrency['0']->suffix.'</h4>',
        'order' => 1
    ));

});

?>