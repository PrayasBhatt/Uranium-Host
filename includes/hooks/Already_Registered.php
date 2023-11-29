<?php

// Delete Already Registered

use WHMCS\View\Menu\Item as MenuItem;

add_hook('ClientAreaPrimarySidebar', 1, function (MenuItem $primarySidebar) {
   	if (!is_null($primarySidebar->getChild('Already Registered'))) {
        $primarySidebar->removeChild('Already Registered');
   	}
});

add_hook('ClientAreaSecondarySidebar', 1, function (MenuItem $secondarySidebar)
{
   	if (!is_null($secondarySidebar->getChild('Why Security Questions'))) {
        $secondarySidebar->removeChild('Why Security Questions');
   	}
});