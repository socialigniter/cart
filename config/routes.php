<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:		Social Igniter : Cart Module : Routes
* Author: 	Brennan Novak
* 		  	contact@social-igniter.com
*
* Project:	http://social-igniter.com/
* Source: 	http://github.com/socialigniter/cart
*
* Standard installed routes for Cart Module. 
*
* All routes must route to the controller 'cart' the 1st URI segment can be something
* more custom like 'classes' or 'products'
*/

$route['cart'] 							= 'cart';
$route['cart/settings']					= 'cart/settings/index';
//$route['cart/(:any)/(:any)/(:any)']		= 'cart/view';
//$route['cart/(:any)/(:any)']			= 'cart/view';
//$route['cart/(:any)']					= 'cart/view';

//$route['classes'] 						= 'cart';