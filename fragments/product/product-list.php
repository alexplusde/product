<?php
// Dieses Fragment nicht im Addon selbst bearbeiten, sondern kopieren und im eigenen Projekt anpassen.
/** @var rex_fragment $this */

$products = product::query()->where('status', '1', '>=')->find();
?>
<section class="container">
	<div class="row mt-5">
		<?php foreach ($products as $product) {
		    /** @var product $product */
		    ?>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="card">
				<a href="<?=  $product->getUrl() ?>">
					<?php if ($product->getImage(true)) { ?>
					<img src="<?= $product->getImage(true)->getUrl(); ?>"
						class="card-img-top">
					<?php } ?>
				</a>
				<div class="card-body">
					<a href="<?=  $product->getUrl(); ?>"
						class="card-title"><?= $product->getName() ?></a>
					<?php foreach ($product->getVariants() as $variant) {
					    /** @var product_variant $variant */ ?>
					<a href="<?= $product->getUrl() ?>?variant=<?= $variant->getId() ?>"
						class="card-link"><?= $variant->getName() ?></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</section>
