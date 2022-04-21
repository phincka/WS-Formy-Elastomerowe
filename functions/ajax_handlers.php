<?php
add_action('wp_ajax_nopriv_categoryFilter', 'categoryFilter');
add_action('wp_ajax_categoryFilter', 'categoryFilter');


function categoryFilter() {
	$location = $_POST['location'];
	
	$args = array(
		'post_type' => 'sales',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order'=>'asc',

		'tax_query' => array(
			array(
				'taxonomy' => 'sales-category',
				'terms' => $location,
				'field' => 'term_id',
			)
		)
	); 
	$query = new WP_Query($args);

	if ($query->have_posts()) :
	while ($query->have_posts()):
	$query->the_post(); 
	?>
		<article class="single_sale">
			<div class="single_sale__content">
				<h4 class="single_sale__content--title tit-40"><?php the_title(); ?></h4>
				<p class="txt-20"><?= get_field('s1_text') ?></p>
			</div>

			<div class="single_sale__gallery gallery">
				<?php
					$images = get_field('s1_gallery');
					$size = 'full';

					if($images): 
					foreach ($images as $image ):
				?>
					<a data-lbxp class="single_sale__gallery__single" href="<?= $image['url'] ?>" style="background-image: url('<?= $image['url'] ?>')"></a>
				<?php endforeach; endif; ?>
			</div>
		</article>
	<?php
	endwhile;
	wp_reset_postdata();
	endif; 
	
	die(1);
}
?>

