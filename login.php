<?php
$fb = new Facebook\Facebook([
  'app_id' => '712028078937891', // Replace {app-id} with your app id
  'app_secret' => 'e885340c8b4d5dadc7cd86de17c6a3e7',
  'default_graph_version' => 'v2.7',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';