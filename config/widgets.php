<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:		Social Igniter : Cart : Widgets
* Author: 	Brennan Novak
* 		  	contact@social-igniter.com
*         	@brennannovak
*
* Project:	http://social-igniter.com
* Source: 	http://github.com/socialigniter/cart
*          
* Description: Widgets for the Cart App for Social Igniter
*/

$config['cart_widgets'][] = array(
	'regions'	=> array('wide'),
	'widget'	=> array(
		'module'	=> 'cart',
		'name'		=> 'Quad Categories',
		'method'	=> 'run',
		'path'		=> 'widgets_quad_categories',
		'multiple'	=> 'FALSE',
		'order'		=> '1',
		'content'	=> ''		
	)
);