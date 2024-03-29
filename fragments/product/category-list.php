<?php
// Dieses Fragment nicht im Addon selbst bearbeiten, sondern kopieren und im eigenen Projekt anpassen.
/** @var rex_fragment $this */

$categories = product_category::query()->orderBy('prio')->find();
?>
<section class="container">
	<?php

    foreach ($categories as $category) {
        /* @var $category product_category */
        if (count($category->getProducts()) > 0) {
            ?>
	<div class="row">
		<div class="col-12">
			<h2 class="mt-5 mb-2 fw-bold">
				<a href="<?= $category->getUrl(); ?>">
					<?= $category->getName(); ?>
				</a>
			</h2>
		</div>
	</div>
	<div class="row">
		<?php foreach ($category->getProducts() as $product) {
		    /** @var product $product */
            
		    if($product->getStatus() < 1) {
		        continue;
		    }

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
					<br />
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
	<?php
        }
    }
?>
</section>
