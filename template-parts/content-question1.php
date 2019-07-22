<?php
/**
 * Template part for displaying Question 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apieschel
 */

$my_option_name = '_wp_page_template';
$results = $wpdb->get_results(
     $wpdb->prepare("SELECT * FROM $wpdb->postmeta WHERE meta_key = %s", $my_option_name)
);

?>

<article>
	<h1 class="centered"><?php esc_html_e('Question 1', 'apieschel'); ?></h1>
	
	<h2><?php esc_html_e('How would you improve upon this code?', 'apieschel'); ?></h2>
	<div class="code">
		<code>
			<?php echo esc_html('global $wpdb;'); ?><br>
			<?php echo esc_html('$query = "SELECT * FROM $wpdb->postmeta WHERE meta_key = &#39;" . $my_option_name . "&#39;";'); ?><br>
			<?php echo esc_html('$results = $wpdb->get_results( $query );'); ?><br>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Explanation', 'apieschel'); ?></h2>
	<p>
		<?php echo esc_html('Since the query relies on assigning meta_key to a variable that should be a basic string type, and since we don\'t know the exact value of $my_option_name, which is possibly being retrieved from some type of user input, it is necessary to protect the query from SQL injection attacks. This can be achieved by using the $wpdb->prepare() function and inserting a %s (string) placeholder into the original query.'); ?>
	</p>
	
	<h2><?php esc_html_e('Answer', 'apieschel'); ?></h2>
	<div class="code">
		<code>
			<?php echo esc_html('$results = $wpdb->get_results&#40;'); ?><br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo esc_html('$wpdb->prepare&#40;"SELECT * FROM $wpdb->postmeta WHERE meta_key = %s", $my_option_name&#41;'); ?><br>
			<?php echo esc_html('	&#41;;'); ?>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Code Execution', 'test'); ?></h2>
	<p><?php esc_html_e('Echo an ordered list of all the page templates that are returned when the value $my_option_name is set to _wp_page_template:'); ?></p>
	
	<ol>
		<?php 
			for ($i = 0; $i <= count($results) - 1; $i++) { ?>
					<li><?php echo esc_html($results[$i]->meta_value); ?></li>
			<?php } 
		?>
	</ol>
	
	<p><?php esc_html_e('Print the array of objects returned by the query:'); ?></p>
	<?php print_r($results); ?>

</article>