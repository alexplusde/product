<?php

/* Tablesets aktualisieren */
$addon = rex_addon::get('product');
rex_yform_manager_table_api::importTablesets(rex_file::get(rex_path::addon($addon->getName(), 'install/rex_product_tableset.json')));
