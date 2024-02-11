<?php
// Dieses Fragment nicht im Addon selbst bearbeiten, sondern kopieren und im eigenen Projekt anpassen.
/** @var rex_fragment $this */

/** @var product $product */
$product = $this->getVar('product');
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<article class="product">

				<!-- Headline -->
				<h1 class="mt-5 mb-2 fw-bold">
					<?= htmlspecialchars($product->getName()) ?>
				</h1>

				<!-- product Image -->
				<?php
                $media = $product->getImage(true);
?>
				<?php if ($media) : ?>
				<div class="ratio ratio-16x9 mb-3 mt-4">
					<img src="<?= $media->getUrl() ?>"
						alt="<?= htmlspecialchars($media->getTitle()) ?>"
						class="h-100 object-fit-cover" width="200" />
				</div>
				<?php endif ?>


				<!-- product Content -->
				<div class="mt-5">
					<?= $product->getDescription() ?>
				</div>

			</article>

		</div>
	</div>
</div>
