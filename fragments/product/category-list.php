<section class="container">
	<?php
    $categories = product_category::query()->orderBy('prio')->find();

	foreach ($categories as $category) {
	    /* @var $category product_category */
	    if (count($category->getProducts()) > 0) {
	        ?>
	<div class="row">
		<div class="col-12">
			<h2><?= $category->getName(); ?></h2>
		</div>
	</div>
	<div class="row">
		<?php foreach ($category->getProducts() as $product) {
		    /** @var product $product */ ?>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="card">
				<a href="<?=  $product->getUrl() ?>">
					<?php if ($product->getImage()) { ?>
					<img src="<?= rex_media::get($product->getImage())->getUrl(); ?>"
						class="card-img-top">
					<?php } ?>
				</a>
				<div class="card-body">
					<a href="<?=  $product->getUrl(); ?>"
						class="card-title"><?= $product->getName() ?></a>
					<?php foreach ($product->getVariants() as $variant) { ?>
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
