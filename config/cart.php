<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:		Social Igniter : Cart : Config
* Author: 	Brennan Novak
* 		  	contact@social-igniter.com
*         	@brennannovak
*
* Project:	http://social-igniter.com
* Source: 	http://github.com/socialigniter/cart
*          
* Description: Config for Cart App for Social Igniter
*/

$config['cart_path'] 			= 'cart/';
$config['cart_create_stages']	= array(
	1 => 'create',
	2 => 'manage',
	3 => 'media',
	4 => 'details',
);

$config['url_style_products'] 	= array(
	'sub'		=> 'product-category / sub-category / your-product-name',
	'category'	=> 'product-category / your-product-name',
	'product'	=> 'your-product-name',
	'number'	=> '2896'
);