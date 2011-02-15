<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:		Social Igniter : Cart Module : Config
* Author: 	Brennan Novak
* 		  	contact@social-igniter.com
*         	@brennannovak
*          
* Created by Brennan Novak
*
* Project:	http://social-igniter.com
* Source: 	http://github.com/social-igniter/blog
*          
* Created: 06-10-2010 
*
* Description: basic blog and admin functionality module for Social Igniter
*/

// Cart Path - should match the 1st URI segment specified in routes.php
$config['cart_path'] = 'cart/';

$config['url_style_products'] = array(
	'sub'		=> 'product-category / sub-category / your-product-name',
	'category'	=> 'product-category / your-product-name',
	'product'	=> 'your-product-name',
	'number'	=> '2896'
);