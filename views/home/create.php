<form name="write" method="post" id="write" action="<?= base_url() ?>home/blog/write" enctype="multipart/form-data">

	<h3>Title</h3>
	<input type="text" name="title" placeholder="Post Title" value="<?= $title ?>" id="title" />
	<?= form_error('title', '<div class="error">*', '</div>'); ?>

	<h3>Price</h3>
	<input type="text" name="price" placeholder="$25.00" value="<?= $price ?>" id="price" />
	<?= form_error('title', '<div class="error">*', '</div>'); ?>
		
	<h3>Dsecription</h3>
	
	<?= $wysiwyg ?>
	
	<?= form_error('content', '<div class="error">*', '</div>'); ?>


	<h3>Details</h3>

	<?= $wysiwyg_details ?>
	
	<?= form_error('details', '<div class="error">*', '</div>'); ?>
    
    <h3>Category</h3>
    <select name="category_id">
    	<option value="">--select--</option>
    	<option value="add_category">Add Category</option>
	</select>

              
  	<h3>Region</h3> 
	<?= form_dropdown('regions', config_item('regions'), $region) ?>	                 

	
     <h3>Tags</h3>             
     <input name="tags" type="text" id="tags" size="75" placeholder="Blogging, Internet, Web Design" />
   
     
     <h3>Comments</h3>             
	 <select name="comments_allow">
	 	<option value="Y">Allow</option>
	    <option value="N">Don't Allow</option>
	    <option value="A">Require Approval</option>
	</select>
	<?= form_error('comments', '<div class="error">*', '</div>'); ?>

    <div class="clear"></div>
                 
    <p><input type="submit" name="publish" value="Publish" /> <input type="submit" name="save_draft" value="Save Draft" /></p>


</form>