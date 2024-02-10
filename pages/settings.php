<?php

echo rex_view::title(rex_i18n::msg('product'));

$addon = rex_addon::get('product');

$form = rex_config_form::factory($addon->getName());

$field = $form->addMediaField('default_thumbnail');
$field->setPreview(1);
$field->setTypes('jpg,gif,png');
$field->setLabel('Vorschau-Bild');

/* Select-Auswahl, ob eigene Model Class verwendet werden soll */
$field = $form->addSelectField('use_own_model');
$field->setLabel('Eigene Model-Klasse verwenden?');
$select = $field->getSelect();
$select->addOption('Ja', 1);
$select->addOption('Nein', 0);

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('product_settings'), false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
