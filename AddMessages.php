<?php
# Alert the user that this is not a valid access point to MediaWiki if they
# try to access the special pages file directly.
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install this extension, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/AddMessages/AddMessages.php" );
EOT;
	exit( 1 );
}

$wgExtensionCredits['other'][] = array(
	'path' => __FILE__,
	'name' => 'AddMessages',
	'author' => 'Ike Hecht',
	'url' => 'https://www.mediawiki.org/wiki/Extension:AddMessages',
	'descriptionmsg' => 'addmessages-desc',
	'version' => '0.2',
);

$wgAutoloadClasses['AddMessages'] = __DIR__ . '/AddMessages.class.php';
$wgHooks['LocalisationCacheRecache'][] = 'AddMessages::onLocalisationCacheRecache';
$wgExtensionMessagesFiles['AddMessages'] = __DIR__ . '/AddMessages.i18n.php';
$wgMessagesDirs['AddMessages'] = __DIR__ . '/i18n';

// Array of message key and value pairs. Will overwrite existing messages.
// Set in LocalSettings.php
// Example: $wgAmMessages = array( 'toolbox' => 'My Toolbox' );
$wgAmMessages = array();
