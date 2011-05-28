<div id="content_wide">

	<?= $cart_progress ?>
	<div class="clear"></div>	
	
	<?php if ($contents): ?>

		<table cellspacing="0" cellpadding="0" border="0" id="cart_contents">
		<tr>
			<td class="cart_titles">Classes</td>
			<td class="cart_titles">Quantity</td>
			<td class="cart_titles">Price</td>
			<td class="cart_titles">Total</td>
		</tr>
		<?php foreach ($contents as $item): ?>
		<tr id="cart_item_<?= $item['rowid'] ?>" class="cart_item_row">
			<td class="cart_contents_title">
				<h4><a href="<?= base_url().'classes/'.$item['options']['title_url'] ?>"><?= $item['name'] ?></a></h4>
				<span class="cart_contents_details">
					Ages: <?= $item['options']['age_range']; ?> &nbsp;&nbsp; <?= display_product_date($item['options']['date_start'], '', '') ?>
				</span>
			</td>
			<td class="cart_contents_actions">
				<span id="quantity_<?= $item['rowid'] ?>" class="cart_item_quantity"><?= $item['qty'] ?></span>
				<a class="cart_button" href="<?= base_url().'api/cart/add/id/'.$item['rowid'] ?>">Add</a>
				<a class="cart_button" href="<?= base_url().'api/cart/remove/id/'.$item['rowid'] ?>">Remove</a>
			</td>
			<td class="cart_contents_price">$<span id="item_price_<?= $item['rowid'] ?>"><?= $this->cart->format_number($item['price']); ?></span></td>
			<td class="cart_contents_item_total">$<span id="item_subtotal_<?= $item['rowid'] ?>"><?= $this->cart->format_number($item['subtotal']); ?></span></td>
		</tr>
		<?php endforeach; ?>
		<tr class="total">
			<td colspan="3"><h4>Total</h4></td>
			<td><h4>$<span id="cart_total"><?= $this->cart->format_number($this->cart->total()); ?></span></h4></td>
		</tr>
		</table>
	
		<div id="cart_checkout_actions">
			<a class="submit_button btn_large left" href="<?= $previous_page ?>">Continue Shopping</a>
			<a class="submit_button btn_medium right" href="<?= base_url() ?>cart/registration">To Registration</a>	
			<a id="cart_button_empty" class="submit_button btn_small right" href="<?= base_url() ?>api/cart/destroy">Empty</a>		
			<div class="clear"></div>
		</div>			

		<div id="cart_contents_terms">

			<h3>Important information for all participants</h3>

			<p>Please read the CONFIRMATION & REFUND policy in the sidebar, along with the participant boundaries below. Check to see if you have ALL the classes you want and correct amount of attendees.</p>
			
			<h4>Challenges with Online Registration?</h4>
			<p>Call Molly Strand toll free at 1<strong>-<span class="tele">(866) 400-3652</span></strong> or <a href="<?= base_url() ?>contact">email her</a></p>
		
			<h4>Confirmation for your class</h4>
			<p>All applicants will receive a Confirmation letter or email within two weeks of TrackersNW receipt of your completed registration form.  If your workshop contains an overnight component a packing list will be sent with confirmation. Important: Please do not consider enrollment in a workshop official until you have received confirmation from TrackersNW. Please check your <strong>bulk mail folder</strong> to see if it has been redirected to there.</p>
			
			<h4>Youth programs</h4>
			<p><em>We keep it real with kids: </em>We help children to feel like that group of kids wandering country backyards 50 years ago: ecstatic, autonomous, tired, muddy, wet and happy from the woods and wild. We are acutely aware of full and real hazards of the out of doors after years of working in environmental education. We try to move away from the highly structured and limiting tolerances of conventional environmental education while keeping kids truly safe but not encapsulated from, or phobic of nature. We are deep patriots to the value of offering guided yet very free and transparent experiences for kids. We believe it is okay to be thirsty at times, cold at times, and wet at times. It builds empathy and care for the gifts of life. It fosters adventure and sincere accomplishment. We also believe it is critical to feel supported and cared for as they truly explore their passion and responsibility. And through a healthy life immersed in nature, they test the limits and great potential of the often untapped physical and emotional resiliency they possess.</p>
			
			<h4>Keeping everyone healthy</h4>
			<p>TrackersNW reserves the right to refuse service to anyone. We strive to meet the needs of all participants, building a healthy working, learning and creative environment for all involved, both staff and client. Very rarely, and almost never, this requires the dismissal of a youth or adult participant. If this occurs prior to the program we evaluate the circumstance. There will be no refunds if dismissal occurs during the program. We take the responsibility for the health of every team member seriously and set our standards high, addressing challenges as it affects the emotional and physical well being of the group and program team,  other paying clients continuing to derive value from the program and the emotional well being of our staff. Grounds for evaluation and possibly dismissal includes but is not limited to: dangerous activities, emotional distress beyond the scope of our instructors, racist, sexist and otherwise bigoted behavior, accusatory and aggressive unsolicited advise, expectations that participants or staff conform to another person's aggressively specific moral values and overwhelming, unspoken or indirect verbal, written or physically aggressive behavior. This is at the discretion of the instructor staff. We definitely appreciate well thought out and well versed feedback, both positive and negative, about how we can better meet each others needs in a functional way. We do not support censorship by any means.</p>
			
			<h4>Program Benchmarks</h4>
			<p>Program benchmarks are set as goals only. These are subject to change based on our team collaboration with participants, including youth. They are also subject to change for other circumstantial issues, including but not limited to weather, cancellation of contractors and other options arise that instructors believe are more thematically appropriate. We are an outdoor program. Many of our activities are strenuous.</p>
			
			<p>We are not responsible for you or your child's ability to participate for any activity for any program due to physical or emotional limits.</p>
			
			<h4>Refund Policy</h4>
			<p>
			- Local workshop registration is held to a 25% cancellation fee.<br />
			- If you cancel 30 days prior to program start, the total fee is refundable (minus 25% cancellation fee)<br />
			- If you cancel 14-30 days prior to program start, 50% of the program fee will be refunded.<br />
			- Cancellations made less than 14 days from program start date cannot be refunded.<br />
			- Registrations and fees are non-transferable.</p>
		</div>			

	<?php else: ?>
		
		<div id="cart_contents_empty">
			<h4>Your Cart Is Empty &nbsp;&nbsp;<a href="<?= base_url() ?>cart">Continue Shopping</a></h4>	
		</div>
		
	<?php endif; ?>			

</div>
<div class="clear"></div>

<script type="text/javascript">
$(document).ready(function()
{	
	// Add / Remove Item
	$('.cart_button').live('click', function(eve)
	{
		eve.preventDefault();
		
		var api_url = $(this).attr('href');
		var item_action_id	= api_url.replace(base_url + 'api/cart/','');
		var	item_values		= item_action_id.split('/');
		var item_action		= item_values[0];
		var	item_id			= item_values[1];
		var item_quantity	= parseInt($('#quantity_' + item_id).html());
		var item_price		= parseFloat($('#item_price_' + item_id).html());
		var item_subtotal	= parseFloat($('#item_subtotal_' + item_id).html());
		var cart_total		= parseFloat($('#cart_total').html());
				
		if (item_action == 'add')
		{
			item_quantity = item_quantity + 1;
			api_url = api_url + '/quantity/' + item_quantity;
		}
		
		// Api Call
		$.get(api_url, function(result)
		{		
			if (result.status == 'success')
			{	
				// Update Screen Values							
				if (item_action == 'add')
				{
					item_subtotal = item_price + item_subtotal;
					cart_total	  = cart_total + item_price;

					$('#quantity_' + item_id).html(item_quantity);
					$('#item_subtotal_' + item_id).html(item_subtotal.toFixed(2));
					$('#cart_total').html(cart_total.toFixed(2));
				}
				else if (item_action == 'remove')
				{
					cart_total = cart_total - item_subtotal;					
					
					if (cart_total == 0)
					{
						hideEmptyCart();
					}
					else
					{
						$('#cart_item_' + item_id).fadeOut('slow');
						$('#cart_total').html(cart_total.toFixed(2));
					}
				}
			}
			else
			{
				alert('Oopps we were unable to ' + item_action +' that item!');
			}
		});
	});
	
	// Empty Cart
	$('#cart_button_empty').live('click', function(eve)
	{
		eve.preventDefault();
	
		var api_url = $(this).attr('href');
		
		console.log(api_url);

		$.get(api_url, function(result)
		{		
			$('html, body').animate({scrollTop:0});

			if (result.status == 'success')
			{				
				hideEmptyCart();
			}
			else
			{				
				$('#content_message').notify({scroll:true,status:result.status,message:result.message});			
			}
		});
	});
		
	// Hide Empty Cart	
	function hideEmptyCart()
	{		
		$('#cart_contents').fadeOut('normal');
		$('#cart_checkout_actions').fadeOut('normal');
		$('#cart_contents_terms').fadeOut('normal');				
		$('#content_wide').append('<div id="cart_contents_empty"><h4>Your Cart Is Empty &nbsp;&nbsp;<a href="' + base_url + '">Continue Shopping</a></h4></div>');
	}

});
</script>