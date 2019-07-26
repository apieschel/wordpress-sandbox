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
			<?php echo esc_html('//file: uninstall.php'); ?><br>
			<?php echo esc_html('if(is_multisite()){'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;global $wpdb;'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$blogs = $wpdb->get_results("SELECT blog_id FROM'); ?><br>
			<?php echo esc_html('{$wpdb->blogs}", ARRAY_A);'); ?><br><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(!empty($blogs)){'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foreach($blogs as $blog){'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;switch_to_blog($blog["blogid"]);'); ?>
			<br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;delete_option(&#39;option_name&#39;);'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}'); ?><br>
			<?php echo esc_html('}else{'); ?><br>
			<?php echo esc_html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;delete_option(&#39;option_name&#39;);'); ?><br>
			<?php echo esc_html('}'); ?><br>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Explanation', 'apieschel'); ?></h2>
	<p>
		<?php echo esc_html('An anti-pattern is a common solution to a problem that is nonetheless ineffective and counterproductive. The switch_to_blog() function does not switch autoload options, plugins, or the object cache. Therefore, if any options are autoloaded, they might not be properly deleted. According to this WordPress tracking issue (https://core.trac.wordpress.org/ticket/14992), when you use switch_to_blog with an Object caching plugin installed you get incorrect links from home_url and therefore also get_permalink. In addition, in a multisite install, looping through all blogs to delete options can be very resource intensive (https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/). A shorter, more readable, and less resource intensive version of this code would simply accompany each instance of delete_option("option_name") with a call of delete_site_option("option_name"), which removes an option by name from the current network.'); ?>
	</p>
	
	<h2><?php esc_html_e('Answer', 'apieschel'); ?></h2>
	<div class="code">
		<code>
			<?php echo esc_html('<?php'); ?><br>
			<?php echo esc_html('//file: uninstall.php'); ?><br>
			<?php echo esc_html('delete_option(&#39;option_name&#39;);'); ?><br>
			<?php echo esc_html('delete_site_option(&#39;option_name&#39;);'); ?><br>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Code Execution', 'test'); ?></h2>
	
	<?php
	
	global $wpdb;
	$blogs = $wpdb;
	var_dump($blogs);
	
	?>
</article>