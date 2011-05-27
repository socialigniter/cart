<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Cart : Install
* Author: 		Brennan Novak
* 		  		contact@social-igniter.com
*         		@brennannovak
*          
* Created: 		Brennan Novak
*
* Project:		http://social-igniter.com/
* Source: 		http://github.com/socialigniter/cart
*
* Description: 	Install values for Cart App for Social Igniter 
*/
/* Settings */
$config['cart_settings']['widgets'] 				= 'TRUE';
$config['cart_settings']['categories'] 				= 'TRUE';
$config['cart_settings']['enabled']					= 'TRUE';
$config['cart_settings']['create_permission']		= '3';
$config['cart_settings']['publish_permission']		= '2';
$config['cart_settings']['manage_permission']		= '2';
$config['cart_settings']['ratings_allow']			= 'no';
$config['cart_settings']['tags_display']			= 'no';
$config['cart_settings']['url_style']				= 'category';
$config['cart_settings']['categories_display']		= 'yes';
$config['cart_settings']['abbreviate_description']	= 'no';
$config['cart_settings']['abbreviate_length'] 		= '100';
$config['cart_settings']['products_per_page'] 		= '5';
$config['cart_settings']['comments_per_page'] 		= '5';
$config['cart_settings']['comments_allow'] 			= 'no';