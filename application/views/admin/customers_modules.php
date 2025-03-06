<?php
defined('BASEPATH') OR exit('No direct script access allowed');



/**
 * Custom Load File CSV:
 * Preferencias para la funcion que va a abrir y recorrer el archivo CSV
 */
// ------------------------------------------------------------------------
$customLoadCSV = (object)[];
$customLoadCSV->upload_path = "";
$customLoadCSV->file_name = "file_gam_csv_";
$customLoadCSV->dateName = true;
$customLoadCSV->allowed_types = 'csv|txt';
$customLoadCSV->max_size = 2048;
$customLoadCSV->overwrite = false;

/**
 * Custom Read File CSV:
 * Preferencias para la funcion que va a abrir y recorrer el archivo CSV
 * breakCaracter: caracter que divide cada valor de tu linea del archivo.
 */
// ------------------------------------------------------------------------
$customReadCSV = (object)[];
$customReadCSV->breakCaracter = "\t";
$customReadCSV->expMatch = '';










/**
 * Custom Load File Documents:
 * Preferencias para la funcion que va a cargar los documentos del cliente
 */
// ------------------------------------------------------------------------
$customLoadFiles = (object)[];
$customLoadFiles->upload_path = "";
$customLoadFiles->file_name = "";
$customLoadFiles->dateName = true;
$customLoadFiles->allowed_types = 'png|jpg|jpeg|pdf';
$customLoadFiles->max_size = 2048;
$customLoadFiles->overwrite = true;










/**
 * Custom Modules:
 * Seccion donde se personaliza el nombre y el icono de cada modulo o sub-modulo que el usuario tiene accinado en la consulta de base de datos.
 */
// ------------------------------------------------------------------------
$customModuleIcon = [];

$customModuleIcon['general'] = (object)[];
$customModuleIcon['general']->label = "Genral";
$customModuleIcon['general']->icono = "fas fa-window-maximize";

$customModuleIcon['home'] = (object)[];
$customModuleIcon['home']->label = "Home";
$customModuleIcon['home']->icono = "fa fa-home";

$customModuleIcon['portafolios'] = (object)[];
$customModuleIcon['portafolios']->label = "Portafolios";
$customModuleIcon['portafolios']->icono = "fas fa-suitcase";

$customModuleIcon['servicios'] = (object)[];
$customModuleIcon['servicios']->label = "Servicios";
$customModuleIcon['servicios']->icono = "fas fa-briefcase";

$customModuleIcon['vacantes'] = (object)[];
$customModuleIcon['vacantes']->label = "Vacantes";
$customModuleIcon['vacantes']->icono = "fas fa-newspaper";

?>