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
			<?php echo esc_html('// file: uninstall.php'); ?><br>
			<?php echo esc_html('if( is_multisite() ) {'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;global $wpdb;'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$blogs = $wpdb->get_results("SELECT blog_id FROM'); ?><br>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Explanation', 'apieschel'); ?></h2>
	<p>
		<?php echo esc_html(''); ?>
	</p>
	
	<h2><?php esc_html_e('Answer', 'apieschel'); ?></h2>
	<div class="code">
		<code>
			
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Code Execution', 'test'); ?></h2>
	
	<?php
	
	?>
</article>