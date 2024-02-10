<?php

namespace alexplusde\product;

use rex_yform_manager_dataset;
use product;
use product_category;
use product_variant;

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

\rex_extension::register('YFORM_DATA_LIST', static function ($ep) {

    /* Wenn TableName mit 'rex_product' beginnt, dann */
    if(strpos($ep->getParam('table')->getTableName(), 'rex_product') === 0) {
        $list = $ep->getSubject();

        $list->setColumnFormat('id', 'custom', static function ($a) {
            $id = $a['value'];
            return '<a href="' . \rex_url::backendPage('product/product_category', ['func' => 'edit', 'data_id' => $id]) . '"><i class="fa fa-edit"></i> ' . $id . '</a>';
        });
    }


    if ('rex_product' == $ep->getParam('table')->getTableName()) {
        $list = $ep->getSubject();

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
        /** @var \rex_list $list */

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

                return '<a href="' . \rex_url::backendPage('product/product_category', $params) . '">' . $a['value'] . '</a>';
            },
        );
    }
    if ('rex_product_variant' == $ep->getParam('table')->getTableName()) {
        $list = $ep->getSubject();

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

                return '<a href="' . \rex_url::backendPage('product/product_variant', $params) . '">' . $a['value'] . '</a>';
            },
        );
    }
});
