<?php


// Redirect to Home Page

function logout_redirect($vars) {
	header( 'Location: index.php' ) ;
}

add_hook("ClientLogout",1,"logout_redirect","");


// Announcements Meta Description

add_hook('ClientAreaHeadOutput', 1, function($vars)
{
    if ($vars['templatefile'] == 'viewannouncement') {
    return <<<HTML
	<meta name="description" content="{$vars['summary']}">
	HTML;}
});

?>