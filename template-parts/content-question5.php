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
	<h1 class="centered"><?php esc_html_e('Question 5', 'apieschel'); ?></h1>
	
	<h2>
		<?php esc_html_e('Can you think of a scenario where code such as this would be an anti-pattern?', 'apieschel'); ?>
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
		<?php echo esc_html(''); ?>
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