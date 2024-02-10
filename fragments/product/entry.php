<?php
/** @var rex_fragment $this */

/** @var product $product */
$product = $this->getVar('product');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <article class="product">

                <!-- Headline -->
                <?php if ('' !== $product->getName()) : ?>
                    <h1 class="mb-2 fw-bold"><?= htmlspecialchars($product->getName()) ?></h1>
                <?php endif ?>

                <!-- product Image -->
                <?php if ('' !== $product->getImage()) : ?>
                    <?php
                    $media = rex_media::get($product->getImage());
                    ?>
                    <?php if ($media) : ?>
                        <div class="ratio ratio-16x9 mb-3 mt-4">
                            <img src="<?= $media->getUrl() ?>" alt="<?= htmlspecialchars($media->getTitle()) ?>" class="h-100 object-fit-cover" width="200"/>
                        </div>
                    <?php endif ?>
                <?php endif ?>


                <!-- product Content -->
                <?php if ($product->getDescription()) : ?>
                    <div class="mt-5">
                        <?= $product->getDescription() ?>
                    </div>
                <?php endif ?>

            </article>

        </div>
    </div>
</div>
