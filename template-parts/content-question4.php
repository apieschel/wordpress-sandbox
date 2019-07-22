<?php
/**
 * Template part for displaying Question 3
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apieschel
 */

?>

<article>
	<h1 class="centered"><?php esc_html_e('Question 4', 'apieschel'); ?></h1>
	
	<h2>
		<?php esc_html_e('Tell us what we\'re doing in this code, and how can it be improved?', 'apieschel'); ?>
	</h2>
	<div class="code">
		<code>
			<?php echo esc_html('<?php'); ?><br>
			<?php echo esc_html('// Assume user privileges and nonce are correctly checked'); ?><br>
			<?php echo esc_html('$options = array();'); ?><br>
			<?php echo esc_html('$options[&#39;option1&#39;] = isset($_POST[&#39;option1&#39;]) ? $_POST[&#39;option1&#39;] : ";'); ?><br>
			<?php echo esc_html('update_option(&#39;my_option_key&#39;, $options);'); ?><br>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Explanation', 'apieschel'); ?></h2>
	<p>
		<?php echo esc_html('The code is attempting to set the "option1" key in the $options array to the POST data that the user has inputed if it exists, and if it does not exist, then it wants to set "option1" to an empty string. Next, it wants to update, or add, the option "my_option_key" to the database, inside an array of presumably other POST data. However, as is, there is no closing quotation mark after the conclusion of the conditional statement, so the code would produce a syntax error. First, we should add an additional quotation mark at the end of that line to set $options["option1"] to an empty string if no option1 has been set in the POST data. In addition, the add_option() function would make our code more flexible. For example, if you did NOT want this new option to be autoloaded by WordPress, then you would have to use the add_option() function and set the $autoload parameter to "no". We could even combine the two functions: Use the update_option() function if the option already exists, and use the add_option() function if it does not exist. Furthermore, if we try to update an option that is already cached, it is possible the update could fail and return false. Just to be safe, we should clear the options cache with wp_cache_delete() before attempting to update the database. Finally, we will assume the input is a generic text string and thus sanitize the POST data using santize_text_field(), and since Wordpress adds a slash before all quotation marks contained in input superglobals, we will use the wp_unslash() function to remove those slashes, just in case the input contains any quotation marks, before adding the value to the database.'); ?>
	</p>
	
	<h2><?php esc_html_e('Answer', 'apieschel'); ?></h2>
	<div class="code">
		<code>
			<?php echo esc_html('<?php'); ?><br>
			<?php echo esc_html('// Assume user privileges and nonce are correctly checked'); ?><br>
			<?php echo esc_html('$options = array();'); ?><br>
			<?php echo esc_html('$options[&#39;option1&#39;] = isset($_POST[&#39;option1&#39;]) ? sanitize_text_field( wp_unslash( $_POST[&#39;option1&#39;] ) ) : "";'); ?><br><br>
			<?php echo esc_html('wp_cache_delete ( &#39;alloptions&#39;, &#39;options&#39; );'); ?><br><br>
			<?php echo esc_html('if( get_option(&#39;my_option_key&#39;) !== false ) {'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;update_option(&#39;my_option_key&#39;, $options);'); ?><br>
			<?php echo esc_html('} else {'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;add_option(&#39;my_option_key&#39;, $options, null, &#39;no&#39;);'); ?><br>
			<?php echo esc_html('}'); ?><br>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Code Execution', 'test'); ?></h2>
	
	<?php
		$options = array();
		$options['option1'] = isset($_POST['option1']) ? sanitize_text_field( wp_unslash($_POST['option1']) ) : "";
	
		wp_cache_delete ( 'alloptions', 'options' );

		if( get_option('my_option_key') !== false ) {
			update_option('my_option_key', $options);
			esc_html_e('This option does indeed already exist, and we have updated it. ', 'test');
		} else {
			esc_html_e('The option doesn\'t exist, so we\'ll add it, and tell Wordpress not to autoload it. ', 'test');
			add_option('my_option_key', $options, null, 'no');
		}
		
		esc_html_e('Here is the options array that was added to the database: ', 'test');
		print_r($options); 
	?>
</article>