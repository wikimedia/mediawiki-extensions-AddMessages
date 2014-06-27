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
	 * @global array $wgamMessages
	 * @param $cache
	 * @param $code
	 * @param array $alldata
	 * @return boolean
	 */
	public static function onLocalisationCacheRecache( $cache, $code, &$alldata ) {
		global $wgamMessages;
		$alldata['messages'] = array_merge( $alldata['messages'], $wgamMessages );
		$alldata['deps'][] = new GlobalDependency( 'wgamMessages' );
		return true;
	}
}
