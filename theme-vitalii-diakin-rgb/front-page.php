<?php get_header(); ?>

<main class="page">
	<section class="card-box">
		<div class="card-box__container items-wrapper">


			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>

					<?php get_template_part('template-parts\card\program-card'); ?>
					<?php get_template_part('template-parts\card\entertainment-card'); ?>
					<?php get_template_part('template-parts\card\location-card'); ?>
					<?php get_template_part('template-parts\card\food-card'); ?>
					<?php get_template_part('template-parts\card\accommodation-card'); ?>
					<?php get_template_part('template-parts\card\safety-card'); ?>



				<?php endwhile; ?>
			<?php endif; ?>






		</div>
	</section>
</main>

<?php get_footer(); ?>
