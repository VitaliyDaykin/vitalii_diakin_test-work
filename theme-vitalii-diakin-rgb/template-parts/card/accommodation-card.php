<a href="#" data-popup="#popup-accommodation" class="card-box__item card">
	<div class="card__images">
		<?php $img_id = get_field('image_acco');
		echo wp_get_attachment_image($img_id, 'card-image')
		?>
	</div>
	<div class="card__info">
		<div class="card__info-text">
			<h3><?php the_field('title_acco'); ?></h3>
			<p><?php the_field('description_acco'); ?></p>
		</div>
		<div class="card__info-icon">
			<?php $img_icon_id = get_field('image_icon_acco');
			echo wp_get_attachment_image($img_icon_id, 'card-icons')
			?>
		</div>
	</div>
</a>
