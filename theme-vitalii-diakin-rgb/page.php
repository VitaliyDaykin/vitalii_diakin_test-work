<?php get_header(); ?>

<main class=" page">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>


		<?php endwhile; ?>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
