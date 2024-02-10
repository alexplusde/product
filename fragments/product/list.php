<?php
/** @var rex_fragment $this */

/** @var rex_pager $pager */
$pager = $this->getVar('pager');

/** @var rex_yform_manager_collection $products */
$products = $this->getVar('products');
?>

<!-- Entry list -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-3">
        <?php foreach ($products as $product) : ?>
            <div class="col">
                <?php
                $fragment = new rex_fragment();
                $fragment->setVar('product', $product);
                echo $fragment->parse('product/list-entry.php');
                ?>
            </div>
        <?php endforeach ?>
    </div>
</div>

<!-- Pagination -->
<?php
$fragment = new rex_fragment();
$fragment->setVar('pager', $pager);
echo $fragment->parse('product/pagination.php');
?>
