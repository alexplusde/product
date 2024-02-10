<?php
/** @var rex_fragment $this */

/** @var product $product */
$product = $this->getVar('product');
?>

<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative h-100">
    <div class="col p-4 d-flex flex-column position-static">

        <!-- Categories -->
        <?php if ($product->getCategory()) : ?>
            <p class="d-inline-block mb-2 text-primary-emphasis">
                <?= htmlspecialchars($product->getCategory()->getName()) ?>
            </p>
        <?php endif ?>

        <!-- Title -->
        <?php if ('' !== $product->getName()) : ?>
            <h3 class="mb-0">
                <a href="<?= rex_getUrl('', '', ['product-id' => $product->getId()]) ?>" class="stretched-link"><?= $product->getName() ?></a>
            </h3>
        <?php endif ?>

    </div>

    <!-- Image -->
    <?php if ('' !== $product->getImage()) : ?>
    <?php
    $media = rex_media::get($product->getImage());
    $mediaUrl = rex_media_manager::getUrl('rex_media_medium', $product->getImage());
    ?>
        <?php if ($media) : ?>
            <div class="col-auto d-none d-lg-block">
                <img src="<?= $mediaUrl ?>" alt="<?= htmlspecialchars($media->getTitle()) ?>" class="h-100 object-fit-cover" width="200"/>
            </div>
        <?php endif ?>
    <?php endif ?>
</div>
