<div id="popup-food" aria-hidden="true" class="popup">
	<div class="popup__wrapper">
		<div class="popup__content">
			<button data-close type="button" class="popup__close">X</button>
			<div class="popup__content-gallery">

				<?php if (have_rows('gallery_popup_food', 'options')) : ?>
					<!-- Оболочка слайдера -->
					<div class="popups-food__slider swiper">
						<!-- Двигающееся часть слайдера -->
						<div class="popups-food__wrapper swiper-wrapper">
							<!-- Слайд -->
							<?php while (have_rows('gallery_popup_food', 'options')) : the_row(); ?>
								<div class="popups-food__slide swiper-slide">
									<div class="popups-food__slide-image">
										<?php $imgPopupId = get_sub_field('image_full', 'options') ?>
										<?php echo wp_get_attachment_image($imgPopupId, 'card-popup-image') ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>

						<div class="popup-mini-slider-food swiper">
							<div class="popup-mini-slider-food__wrapper swiper-wrapper">
								<?php while (have_rows('gallery_popup_food', 'options')) : the_row(); ?>

									<div class="popup-mini-slider-food__slide swiper-slide">
										<div class="popup-mini-slider-food__image">
											<?php $imgPopupPreviewId = get_sub_field('image_preview', 'options') ?>
											<?php echo wp_get_attachment_image($imgPopupPreviewId, 'card-popup-image-preview') ?>
										</div>
									</div>

								<?php endwhile; ?>
							</div>
						</div>
					</div>

				<?php endif; ?>
			</div>
			<div class="popup__content-info info">

				<h2 class="info__title"><?php the_field('title_popup_food', 'options'); ?>
					<?php
					if ($suptitle_food = get_field('title_span_popup_food', 'options')) : ?>
						<span><?php echo $suptitle_food ?></span>
					<?php endif; ?>
				</h2>
				<div class="info__sabtitle">
					<?php if ($suptitle_food = get_field('suptitle_popup_food', 'options')) : ?>
						<?php echo $suptitle_food ?>
					<?php endif; ?></div>
				<?php the_field('description_popup_food', 'options'); ?>
			</div>
		</div>
	</div>
</div>
