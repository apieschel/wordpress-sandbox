<?php
/**
 * Template part for displaying Question 3
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apieschel
 */

$number = rand(0,5);
$plural = _n_noop('We have %d apple.', 'We have %d apples.', 'test');

?>

<article>
	<h1 class="centered"><?php esc_html_e('Question 3', 'apieschel'); ?></h1>
	
	<h2>
		<?php esc_html_e('Prepare the following code for localization, as best and concise as you can. Use &#39;test&#39; as your translation domain:', 'apieschel'); ?>
	</h2>
	<div class="code">
		<code>
			<?php echo esc_html('<?php'); ?><br>
			<?php echo esc_html('$apples = rand(0,5);'); ?><br>
			<?php echo esc_html('echo "We have {$apples} apples!";'); ?><br>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Explanation', 'apieschel'); ?></h2>
	<p>
		<?php echo esc_html('The _n() function allows us to define the singular and plural forms of phrases, but the _n_noop() function will allow our code even more versatility, as it separates the plural and singular string forms from the function call, so if needed we could store these strings in one place in the application and execute the pluralization with translate_nooped_plural() somewhere else.'); ?>
	</p>
	
	<h2><?php esc_html_e('Answer', 'apieschel'); ?></h2>
	<div class="code">
		<code>
			<?php echo esc_html('<?php'); ?><br>
			<?php echo esc_html('$number = rand(0,5);'); ?><br>
			<?php echo esc_html('$plural = _n_noop(&#39;We have %d apple.&#39;, &#39;We have %d apples.&#39;, &#39;test&#39;);'); ?><br>
			<?php echo esc_html('printf( translate_nooped_plural( $plural, $number), $number );'); ?><br>
		</code>
	</div><!--.code-->
	
	<h2><?php esc_html_e('Code Execution', 'test'); ?></h2>
	<p><?php echo esc_html('Refresh the page to randomly assign a number of apples.'); ?></p>
	<p><?php printf( translate_nooped_plural( $plural, $number) , $number ); ?></p>

</article>