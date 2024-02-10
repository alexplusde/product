<?php

namespace alexplusde\product;

use rex_addon;
use rex_yform_manager_table_api;
use rex_file;
use rex_path;
use rex_media;
use rex_media_service;
use rex_config;
use rex_sql;

$addon = rex_addon::get('product');

/* Tablesets aktualisieren */
if (rex_addon::get('yform') && rex_addon::get('yform')->isAvailable()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(rex_path::addon(rex_addon::get('product')->getName(), 'install/rex_product_tableset.json')));
}

if (!rex_media::get('product_fallback_image.png')) {

    rex_file::copy(rex_path::addon('product', '/install/product_fallback_image.png'), rex_path::media('product_fallback_image.png'));
    $data = [];
    $data['title'] = 'Aktuelles - Fallback-Image';
    $data['category_id'] = 0;
    $data['file'] = [
        'name' => 'product_fallback_image.png',
        'path' => rex_path::media('product_fallback_image.png'),
    ];

    rex_media_service::addMedia($data, false);
}

/* URL-Profile installieren */
if (rex_addon::get('url') && rex_addon::get('url')->isAvailable()) {

    if (false === rex_config::get('product', 'url_profile', false)) {

        $rex_product_category = array_filter(rex_sql::factory()->getArray("SELECT * FROM rex_url_generator_profile WHERE `table_name` = '1_xxx_rex_product_category'"));
        if (!$rex_product_category) {
            $query = rex_file::get(rex_path::addon('product', 'install/rex_url_profile_product_category.sql'));
            rex_sql::factory()->setQuery($query);
        }
        $rex_product = array_filter(rex_sql::factory()->getArray("SELECT * FROM rex_url_generator_profile WHERE `table_name` = '1_xxx_rex_product'"));
        if (!$rex_product) {
            $query = rex_file::get(rex_path::addon('product', 'install/rex_url_profile_product.sql'));
            rex_sql::factory()->setQuery($query);
        }
        /* URL-Profile wurden bereits einmal installiert, daher nicht nochmals installieren und Entwickler-Einstellungen respektieren */
        rex_config::set('product', 'url_profile', true);
    }
}
