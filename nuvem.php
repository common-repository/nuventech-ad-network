<?php
/**
 * @package NuvemTech
 * @version 1.0
 */
/*
Plugin Name: NuvemTechnologies Ad Server
Plugin URI: http://wordpress.org/extend/plugins/hello-dolly/
Description: Start making money with your website.
Author: Joao Vianna
Version: 1.0
Author URI: http://www.jornal.us/user.php?user=48
*/

function nuvem_display_ad($thecontent)
{
$func=get_option('nuvem_code'); 
$thecontent=$func."<br>".$thecontent;

return($thecontent);
}
add_filter("the_content","nuvem_display_ad");




////////////////////////////////////////////////////
/*
Now to work on the admin side of things
*/
////////////////////////////////////////////////////


/*
Tell WP we want to run a function when the admin page loads
add_action('hook name', 'function name');
*/

add_action('admin_menu', 'daa_menu');

function daa_menu()
{
	/*
	Tell WP we want to create an options page for our plugin
	add_options_page('page title', 'menu title', user access level, 'file', 'function name');
	*/
	
	add_options_page('Display Nuvem Technologies Ad Options', 'NuvemTech Ads', 8, __FILE__, 'daa_options_page');
}

/*
This function is used to build the options page.
You could write out the HTML directly in this page, or, as I chose to do, include the HTML form from a separate page.
*/

function daa_options_page()
{
	/*
	if I wanted, I could put all the HTML code right here to create the options page like this:
	echo '<div class="wrap">';
	echo '<h2>Display Author Avatar Options</h2>';
	echo '</div>';
	etc...
	
	I prefer to include the page from a separate file.
	*/
	
	include ('nuvem1.php');
}


////////////////////////////////////////////////////
/*
Next we'll create a shortcode option
*/
////////////////////////////////////////////////////


// this is our shortcode function that will be called if the shortcode is found in a page or post

function daa_shortcode($att) {

	// extract any variables that were passed in with the shortcode.
	extract(shortcode_atts(array(
		'author' => '',
	), $att));

	// a simple switch statement for handling different options based on what's passed in
	switch ($author) {
		case "john":
			$daa_block = "<div style='width:100%; border:2px solid #000; background-color: #eee;'>This post was written by <strong>John Hawkins</strong><br />
			You can find John blogging at <a href='http://johnhawkinsunrated.com/'>JohnHawkinsUnrated.com</a><br />
			Twitter: <a href='http://twitter.com/vegasgeek'>@VegasGeek</a></div>";
		break;
	
			case "matt":
			$daa_block = "<div style='width:100%; border: 2px solid #000; background-color: #eee;'>This post was written by <strong>Matt Mullenweg</strong><br />
			You can find Matt blogging at <a href='http://ma.tt/'>Ma.tt</a><br />
			Twitter: <a href='http://twitter.com/photomatt'>@PhotoMatt</a></div>";
		break;
	
		default:
			$daa_block = "";
		break;
	}

	// return the block of code to be displayed in place of the shortcode
	return $daa_block;
	
}

	/*
	tell WP we've created a shortcade
	add_shortcode('short code', 'function name');
	*/
	
	add_shortcode('daa_block', 'daa_shortcode');

?>
