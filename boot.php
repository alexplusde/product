<?php

namespace alexplusde\product;

use rex_yform_manager_dataset;

rex_yform_manager_dataset::setModelClass(
    'rex_product',
    product::class
);
rex_yform_manager_dataset::setModelClass(
    'rex_product_category',
    product_category::class
);

rex_yform_manager_dataset::setModelClass(
    'rex_product_variant',
    product_variant::class
);
