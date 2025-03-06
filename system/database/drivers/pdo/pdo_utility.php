<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PDO Utility Class
 *
 */
class CI_DB_pdo_utility extends CI_DB_utility {

	/**
	 * Export
	 *
	 * @param	array	$params	Preferences
	 * @return	mixed
	 */
	protected function _backup($params = array())
	{
		// Currently unsupported
		return $this->db->display_error('db_unsupported_feature');
	}

}
