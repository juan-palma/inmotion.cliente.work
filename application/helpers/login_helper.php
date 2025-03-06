<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * IDA Helper Login
 *
 */

// ------------------------------------------------------------------------

if ( ! function_exists('isLogged'))
{
	/**
	 * Is Logged
	 *
	 * Chek if user date is set in session an login ok redirecto tu panel else redirect to login again.
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isLogged(){
	    if( (isset($_SESSION['userID']) && $_SESSION['userID'] !== '') && (isset($_SESSION['finger']) && $_SESSION['finger'] !== '') ){
			redirect(base_url('admin/panel'));
		}
	}
}


if ( ! function_exists('isNoLogged'))
{
	/**
	 * Is Logged
	 *
	 * Chek if user date is set in session an login ok redirecto tu panel else redirect to login again.
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isNoLogged(){
	    if( (!isset($_SESSION['userID']) || $_SESSION['userID'] === '') || (!isset($_SESSION['finger']) || $_SESSION['finger'] === '') ){
			session_destroy();
			redirect(base_url('admin/login'));
		}
	}
}





// Funciones para validar el login del panel de leads
if ( ! function_exists('isLeadLogged'))
{
	/**
	 * Is Logged
	 *
	 * Chek if user date is set in session an login ok redirecto tu panel else redirect to login again.
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isLeadLogged(){
	    if( (isset($_SESSION['id_lead']) && $_SESSION['id_lead'] !== '') && (isset($_SESSION['lead_rfc']) && $_SESSION['lead_rfc'] !== '') ){
			redirect(base_url('public/carga_archivos'));
		}
	}
}


if ( ! function_exists('isLeadNoLogged'))
{
	/**
	 * Is Logged
	 *
	 * Chek if user date is set in session an login ok redirecto tu panel else redirect to login again.
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isLeadNoLogged(){
	    if( (!isset($_SESSION['id_lead']) || $_SESSION['id_lead'] === '') || (!isset($_SESSION['lead_rfc']) || $_SESSION['lead_rfc'] === '') ){
			session_destroy();
			redirect(base_url());
		}
	}
}


?>