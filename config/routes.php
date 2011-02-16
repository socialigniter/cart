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

/* Home */
$route['cart/home/create'] 				= 'home/basic';
$route['cart/home/manage'] 				= 'home/manage';
$route['cart/home/manage/(:num)'] 		= 'home/basic';

//$route['cart/(:any)/(:any)/(:any)']	= 'cart/view';
//$route['cart/(:any)/(:any)']			= 'cart/view';
//$route['cart/(:any)']					= 'cart/view';
