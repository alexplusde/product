<?php

rex_config::removeNamespace('product');

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::removeTable('rex_product_category');
    rex_yform_manager_table_api::removeTable('rex_product');
    rex_yform_manager_table_api::removeTable('rex_product_variant');
}
