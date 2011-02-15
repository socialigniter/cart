<?php
/* For Public & Dashboard */
function product_link($path, $title_url, $var_1, $var_2)
{	
	return base_url().$path.'/'.$var_1.'/'.$var_2.'/'.$title_url;
}

function product_category($category, $blog_path, $category_array, $category_id)
{
	if ($category == 'no')
	{
		return FALSE;
	}

	if (!$category_id)
	{
		return 'Uncategorized';	
	}

	foreach ($category_array as $category)
	{
		if ($category->category_id == $category_id)
		{
			$category_url = base_url().$blog_path.'categories/'.$category->category_url;
		
			return '<a href="'.$category_url.'">'.$category->category.'</a>';
		}
	}
}

function product_category_from_array($categories, $product_id)
{
	$result = NULL;

	foreach ($categories as $category)
	{
		if ($category->category_id == $product_id)
		{
			$result = $category->category_url;
			break;
		}
	}
	
	return $result;
}

function product_content($abbreviate, $length, $content, $link)
{
	$content_clean	= strip_tags($content, '');
	$content_length = strlen($content_clean);

	if (($abbreviate == 'yes') && ($content_length >= $length))
	{
		$content = character_limiter($content_clean, $length) . '<div class="content_read_more"><a href="'.$link.'">read more</a></div>';
	}
	
	return $content;
}


function product_address($location, $format)
{
	if ($format == 'LINE')
	{
		$location = $location->address.', '.$location->city.', '.$location->state.', '.$location->zip;
	}
	
	return $location;
}


function product_price($class)
{
	$now_date = unix_to_mysql(now());	
	
	if (($class->special_id > 1) && ($class->date_expires.' 00:00:00' > $now_date))
	{	
		$price = $class->price - $class->discount;
	}
	else
	{
		$price = $class->price;
	}

	return $price;
}


function product_special($class)
{
	$now_date = unix_to_mysql(now());	

	if (($class->special_id > 1) && ($class->date_expires.' 00:00:00' > $now_date))
	{
		$discount_date	= mdate('%M %j%S, %Y', mysql_to_unix($class->date_expires));
		$special = '<span class="product_special">'.$class->special.', $'.$class->price.' after '.$discount_date.'</span>';
	}
	else
	{
		$special = '';
	}
	
	return $special;
}


////////////////////////////////////
// MOVE TO EVENTS
function display_map_link($location)
{
	$array		= (array) $location;
	$allowed	= array('name','address','city','state','zip');
	$query		= '';

	foreach ($array as $key => $value)
	{
		if (in_array($key, $allowed))
		{
			$query .= urlencode($value).',';
		}
	}

	$result = 'http://maps.google.com/maps?q='.$query;

	return $result;
}
