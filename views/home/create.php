<div id="content_wide_content">

	<h2>Basics</h2>
	
	<form name="create" method="post" id="classes_basic" action="<?= $form_url ?>" enctype="multipart/form-data">
		
		<h3>Title</h3>
		<p><input type="text" name="title" value="<?= $title ?>" id="title" class="input_full" /></p>

		<h3>Dsecription</h3>
		<p><?= $wysiwyg ?></p>
	
		<h3>Excerpt</h3>
		<p><textarea id="excerpt" name="excerpt" class="textarea_full" rows="4"><?= $excerpt ?></textarea></p>
		    
	    <h3>Category</h3>
	    <select name="category_id">
	    	<option value="">--select--</option>
	    	<option value="add_category">Add Category</option>
		</select>
		
	     <h3>Tags</h3>             
	     <p><input name="tags" type="text" id="tags" size="75" placeholder="Blogging, Internet, Web Design" /></p>
	   
	     
	     <h3>Comments</h3>             
		 <p><select name="comments_allow">
		 	<option value="Y">Allow</option>
		    <option value="N">Don't Allow</option>
		    <option value="A">Require Approval</option>
		</select></p>
	
		<h3>Access</h3>
		<p><?= form_dropdown('access', config_item('access'), $access) ?></p>
			                 
		<input type="submit" name="publish" value="Continue" />
		
	</form>
	
</div>


<div id="content_wide_toolbar">
	<?= $toolbar_steps ?>
	<?= $content_publisher ?>
</div>
<div class="clear"></div>

<script type="text/javascript">
$(document).ready(function()
{
	doPlaceholder('#title', "How to Grow a Garden");
	doPlaceholder('#excerpt', "Ever wanted to grow your own fruits and vegetables?");
	doPlaceholder('#tags', "Gardening, Fruit, Vegetables");
	$('#title').slugify({url:base_url+current_module+'/',slug:'#title_slug',name:'title_url', slugValue:'<?= $title_url ?>'});

	// Write Article
	$("#classes_basic").bind("submit", function(eve)
	{
		eve.preventDefault();
		var valid_title		= isFieldValid('#title', "How to Grow a Garden", 'You need a class title');
		var valid_excerpt	= isFieldValid('#excerpt', "Ever wanted to grow your own fruits and vegetables?", 'You need an excerpt description');

		// Validation	
		if (valid_title == true && valid_excerpt == true)
		{
			// Strip Empty Fields
			cleanFieldEmpty('#tags', "Gardening, Fruit, Vegetables");		
			
			var class_data = $('#classes_basic').serializeArray();
			class_data.push({'name':'source','value':'website'});

			$(this).oauthAjax(
			{
				oauth 		: user_data,
				url			: $(this).attr('ACTION'),
				type		: 'POST',
				dataType	: 'json',
				data		: class_data,
		  		success		: function(result)
		  		{		  					  			  			
					if (result.status == 'success')
					{
						window.location.href = base_url + 'home/classes/media/' + result.data.content_id;			 	
				 	}
				 	else
				 	{
					 	$('#content_message').html(result.message).addClass('message_alert').show('normal');
					 	$('#content_message').oneTime(3000, function(){$('#content_message').hide('fast')});			
				 	}	
			 	}
			});
		}
		else
		{
			eve.preventDefault();
		}		
	});	
	
	// Add Category
	$('[name=category_id]').change(function()
	{	
		if($(this).val() == 'add_category')
		{
			$('[name=category_id]').find('option:first').attr('selected','selected');
			$.uniform.update('[name=category_id]');

			$.categoryEditor(
			{
				url_api		: base_url + 'api/categories/view/module/cart',
				url_pre		: base_url + 'cart/',
				url_sub		: base_url + 'api/categories/create',				
				module		: 'cart',
				type		: 'category',
				title		: 'Add Cart Category',
				slug_value	: '',
				details		: $('[name=region]').val(),
				trigger		: $('.content [name=category_id]')
			});			
		}
	});
});
</script>