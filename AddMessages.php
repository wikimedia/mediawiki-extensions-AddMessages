<?php

/**
 * Allows admins to add or replace default messages using a global variable
 *
 * @author Ike Hecht
 */
class AddMessages {

	/**
	 * Hook to replace default messages with customized user messages
	 * or add a new message
	 *
	 * @param LocalisationCache $cache
	 * @param string $code
	 * @param array &$alldata
	 */
	public static function onLocalisationCacheRecache( $cache, $code, &$alldata ) {
		global $wgAmMessages;
		$alldata['messages'] = array_merge( $alldata['messages'], $wgAmMessages );
		$alldata['deps'][] = new GlobalDependency( 'wgAmMessages' );
	}
}
