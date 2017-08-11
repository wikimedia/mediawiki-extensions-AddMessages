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
	 * @global array $wgAmMessages
	 * @param $cache
	 * @param $code
	 * @param array $alldata
	 * @return bool
	 */
	public static function onLocalisationCacheRecache( $cache, $code, &$alldata ) {
		global $wgAmMessages;
		$alldata['messages'] = array_merge( $alldata['messages'], $wgAmMessages );
		$alldata['deps'][] = new GlobalDependency( 'wgAmMessages' );

		return true;
	}
}
