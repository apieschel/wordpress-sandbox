<?php get_header();

// Template Name: Home

?>

<div style="width:80%; margin: 0 auto;">

	<?php get_template_part( 'template-parts/content', 'question1' ); ?>
	<br><br><br><hr><br>
	<?php get_template_part( 'template-parts/content', 'question2' ); ?>
	<br><br><br><hr><br>
	<?php get_template_part( 'template-parts/content', 'question3' ); ?>
	<br><br><br><hr><br>
	<?php get_template_part( 'template-parts/content', 'question4' ); ?>
	<br><br><br><hr><br>
	<?php get_template_part( 'template-parts/content', 'algorithms' ); ?>
	
	<?php 
		$val = 30;
		echo "All of the primes less than or equal to " . $val . " are: "; ?><br><br> 
		<?php print_r(Eratosthenes2($val)); ?> 
	
</div><br><br><br><br>

<?php get_footer(); 