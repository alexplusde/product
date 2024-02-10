<?php

namespace alexplusde\product;

use rex_yform_manager_dataset;
use product;
use product_category;
use product_variant;

if(1 !== \rex_config::get('product', 'use_own_model')) {
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
}

\rex_extension::register('YFORM_DATA_LIST', static function ($ep) {
    /** @var \rex_list $list */
    $list = $ep->getSubject();

    if ('rex_product' == $ep->getParam('table')->getTableName()) {

        $list->setColumnFormat('id', 'custom', static function ($a) {
            $id = $a['value'];
            
            $_csrf_key = \rex_yform_manager_table::get('rex_product')->getCSRFKey();
            $token = \rex_csrf_token::factory($_csrf_key)->getUrlParams();

            $params = [];
            $params['table_name'] = 'rex_product';
            $params['rex_yform_manager_popup'] = '0';
            $params['_csrf_token'] = $token['_csrf_token'];
            $params['data_id'] = $a['list']->getValue('id');
            $params['func'] = 'edit';

            return '<a href="' . \rex_url::backendPage('product/product', $params) . '"><i class="fa fa-edit"></i> ' . $id . '</a>';
        });

        $list->setColumnFormat(
            'name',
            'custom', 

            static function ($a) {
                $_csrf_key = \rex_yform_manager_table::get('rex_product')->getCSRFKey();
                $token = \rex_csrf_token::factory($_csrf_key)->getUrlParams();

                $params = [];
                $params['table_name'] = 'rex_product';
                $params['rex_yform_manager_popup'] = '0';
                $params['_csrf_token'] = $token['_csrf_token'];
                $params['data_id'] = $a['list']->getValue('id');
                $params['func'] = 'edit';

                return '<a href="' . \rex_url::backendPage('product/product', $params) . '">' . $a['value'] . '</a>';
            },
        );
    }
    if ('rex_product_category' == $ep->getParam('table')->getTableName()) {

        $list->setColumnFormat('id', 'custom', static function ($a) {
            $id = $a['value'];
            
            $_csrf_key = \rex_yform_manager_table::get('rex_product_category')->getCSRFKey();
            $token = \rex_csrf_token::factory($_csrf_key)->getUrlParams();

            $params = [];
            $params['table_name'] = 'rex_product_category';
            $params['rex_yform_manager_popup'] = '0';
            $params['_csrf_token'] = $token['_csrf_token'];
            $params['data_id'] = $a['list']->getValue('id');
            $params['func'] = 'edit';

            return '<a href="' . \rex_url::backendPage('product/category', $params) . '"><i class="fa fa-edit"></i> ' . $id . '</a>';
        });

        $list->setColumnFormat(
            'name',
            'custom', 

            static function ($a) {
                $_csrf_key = \rex_yform_manager_table::get('rex_product_category')->getCSRFKey();
                $token = \rex_csrf_token::factory($_csrf_key)->getUrlParams();

                $params = [];
                $params['table_name'] = 'rex_product_category';
                $params['rex_yform_manager_popup'] = '0';
                $params['_csrf_token'] = $token['_csrf_token'];
                $params['data_id'] = $a['list']->getValue('id');
                $params['func'] = 'edit';

                return '<a href="' . \rex_url::backendPage('product/category', $params) . '">' . $a['value'] . '</a>';
            },
        );
    }
    if ('rex_product_variant' == $ep->getParam('table')->getTableName()) {
        $list->setColumnFormat('id', 'custom', static function ($a) {
            $id = $a['value'];
            
            $_csrf_key = \rex_yform_manager_table::get('rex_product_variant')->getCSRFKey();
            $token = \rex_csrf_token::factory($_csrf_key)->getUrlParams();

            $params = [];
            $params['table_name'] = 'rex_product_variant';
            $params['rex_yform_manager_popup'] = '0';
            $params['_csrf_token'] = $token['_csrf_token'];
            $params['data_id'] = $a['list']->getValue('id');
            $params['func'] = 'edit';

            return '<a href="' . \rex_url::backendPage('product/variant', $params) . '"><i class="fa fa-edit"></i> ' . $id . '</a>';
        });

        
        $list->setColumnFormat(
            'name',
            'custom', 

            static function ($a) {
                $_csrf_key = \rex_yform_manager_table::get('rex_product_variant')->getCSRFKey();
                $token = \rex_csrf_token::factory($_csrf_key)->getUrlParams();

                $params = [];
                $params['table_name'] = 'rex_product_variant';
                $params['rex_yform_manager_popup'] = '0';
                $params['_csrf_token'] = $token['_csrf_token'];
                $params['data_id'] = $a['list']->getValue('id');
                $params['func'] = 'edit';

                return '<a href="' . \rex_url::backendPage('product/variant', $params) . '">' . $a['value'] . '</a>';
            },
        );
    }
});
