<?php
/**
 * Template part for displaying Question 2
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apieschel
 */

	$your_name = isset($_POST['option1']) ? sanitize_text_field( wp_unslash( $_POST['option1'] ) ) : '';
	
	if ( $your_name !== '' ) :
		$message = sprintf( esc_html__('Hello, %s.', 'apieschel'), $your_name );
	else: 
		$message = '';
	endif;

?>

<article>
	<h1 class="centered"><?php esc_html_e('Question 2', 'apieschel'); ?></h1>
	
	<h2><?php esc_html_e('Now take a go at improving this code, reckon you can figure it out?', 'apieschel'); ?></h2>
	<div class="code">
		<code>
			&lt;!-- <?php esc_html_e('Assume $your_name holds the previously submitted answer (if any), or empty string', 'test'); ?> --&gt;<br><br>
			&lt;<?php echo esc_html('label'); ?>&gt;<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;<?php echo esc_html('span'); ?>&gt;
					&lt;<?php echo esc_html("?php _e('Your name', 'apieschel'); ?"); ?>
				&lt;<?php echo esc_html('/span'); ?>&gt;<br>
				
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;<?php echo esc_html('input type="text" name="your_name" value="<?php echo $your_name; ?>" /');?>&gt;<br>
			&lt;<?php echo esc_html('/label'); ?>&gt;
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Explanation', 'apieschel'); ?></h2>
	<p>
		<?php echo esc_html('There is a typo at the end of the php tag within the first span. It is missing the 
		closing arrow “>” after the question mark. We could also use the esc_attr() function on $your_name, which is assigned to the “value” attribute, for improved security. In addition, we might as well use esc_html_e() on the string within the span, in case for instance a translator decides to insert some wayward HTML tags.'); ?>
	</p>
	
	<h2><?php esc_html_e('Answer', 'apieschel'); ?></h2>
	<div class="code">
		<code>
			&lt;<?php echo esc_html('label'); ?>&gt;<br>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;<?php echo esc_html('span'); ?>&gt;
					&lt;<?php echo esc_html("?php esc_html_e('Your name', 'test'); ?"); ?>&gt;
				&lt;<?php echo esc_html('/span'); ?>&gt;<br>
				
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;<?php echo esc_html('input type="text" name="your_name" value="<?php echo esc_attr($your_name); ?>" /');?>&gt;<br>
			&lt;<?php echo esc_html('/label'); ?>&gt;
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Code Execution', 'test'); ?></h2>
	
	<p><?php esc_html_e('Submit your name to echo a personalized greeting:'); ?></p>
	<form method="post" action="/">
		<label>
			<span><?php esc_html_e('Your name', 'test'); ?></span>
			<input type="text" name="option1" value="<?php echo esc_attr($your_name); ?>" />
			<input type="submit">
		</label>
	</form>

	<?php if(isset($_POST['option1'])) : ?>	
		<p><?php esc_html_e($message); ?></p>
	<?php endif; ?>
</article>