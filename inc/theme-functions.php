<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package hivemind
 */


/**
 * Header and Footer scripts
 */
function hivemind_admin_menu_option()
{
	add_menu_page('Header & Footer Scripts', 'Site scripts', 'manage_options', 'hivemind-admin-menu', 'hivemind_scripts_page', '', 200);
}
add_action('admin_menu', 'hivemind_admin_menu_option');

function hivemind_scripts_page()
{	

	if(array_key_exists('submit_scripts_update', $_POST))
	{
		update_option('hivemind_header_scripts',$_POST['header_scripts']);
		update_option('hivemind_footer_scripts',$_POST['footer_scripts']);

		?>
		<div id="setting-error-settings-updates" class="updated settings-error notice is-dismissible"><strong>Settings have been saved.</strong></div>
		<?php
	}

	$header_scripts = get_option('hivemind_header_scripts', 'Empty..');
	$footer_scripts = get_option('hivemind_footer_scripts', 'Empty..');

	 ?>
	 <div class="wrap">
	 	<h2>Update Scripts</h2>
	 	<form method="post" actions="">
		 	<label for="header_scripts">Header Scripts</label>
		 	<textarea name ="header_scripts" class="large-text"><?php print $header_scripts; ?></textarea>

		 	<label for="footer_scripts">Footer Scripts</label>
		 	<textarea name ="footer_scripts" class="large-text"><?php print $footer_scripts; ?></textarea>

		 	<input type="submit" name="submit_scripts_update" class="button-primary" value="Update Scripts">
		</form>
	 </div>
	 <?php
}

function hivemind_display_header_scripts()
{
	$header_scripts = get_option('hivemind_header_scripts', 'Empty..');
	print $header_scripts;
}
add_action('wp_head', 'hivemind_display_header_scripts');

function hivemind_display_footer_scripts()
{
	$footer_scripts = get_option('hivemind_footer_scripts', 'Empty..');
	print $footer_scripts;
}
add_action('wp_foot','hivemind_display_footer_scripts');

?>