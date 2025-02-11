<!-- 
to have your options page look like the rest of the WP options pages,
use the following 3 lines as is, but change the text inside the h2 tag.
-->
<div class="wrap">
	<h2>Place here the code from Nuvemtech</h2>
	</div>

<!--
The form tag and wp_nonce_field lines should stay exactly as is.
-->
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<!-- 
The form-table class is also a WP standard. Use it to have your pages formatted
like the rest of the WP options pages.
-->
<table class="form-table">

<tr valign="top">
<th scope="row">Code:</th>

<!--
1. The names of your input fields will be how your values are stored in the WP database.
2. Make sure the option values are unique.
3. Use the get_option() function to pre-fill your form on subsequent visits.
-->
<td><img src="http://www.nuvemtech.com/images/money2.jpg" width="200"><textarea rows="10" cols="60" name="nuvem_code"><?php echo get_option('nuvem_code'); ?></textarea></td>
</tr>
</table>

<!-- 
the hidden "action" tag is required as is.
-->
<input type="hidden" name="action" value="update" />

<!--
The "page_options" tag is required and the value should be a comma separated list of
ALL custom field names being updated in your form.
-->
<input type="hidden" name="page_options" value="nuvem_code" />

<!--
Using the following submit button as-is will ensure it looks like all other WP
options pages. Notice the _e('Save Changes') portion. This is how WP handles
sites in different languages. 
-->
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
