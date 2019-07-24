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
		$array = array(1, 3, 8, 12, 4, 2);
		echo "The largest value in the array is: "; ?><br><br> 
		<?php print_r(bitonicArrayMaximum($array)); ?> 
	
</div><br><br><br><br>

<?php get_footer(); 