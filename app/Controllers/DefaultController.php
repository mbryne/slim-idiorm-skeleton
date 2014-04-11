<?php
	
$app->get('/', function() use ($app) {
 
 	return $app->render('default/index.php', array( 
		'name' => 'World!'
	));
 
});