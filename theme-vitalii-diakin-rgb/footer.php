</div>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part('template-parts/popup-card/popup-program'); ?>
		<?php get_template_part('template-parts/popup-card/popup-entertainment'); ?>
		<?php get_template_part('template-parts/popup-card/popup-location'); ?>
		<?php get_template_part('template-parts/popup-card/popup-food'); ?>
		<?php get_template_part('template-parts/popup-card/popup-accommodation'); ?>
		<?php get_template_part('template-parts/popup-card/popup-safety'); ?>



	<?php endwhile; ?>
<?php endif; ?>


<?php wp_footer(); ?>

</body>

</html>
