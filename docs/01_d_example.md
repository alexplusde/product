# Beispiele

Wurde product mit dem URL-Addon installiert und entsprechend der [Anleitung](/redaxo/index.php?page=product/docs&mdfile=05_url) konfiguriert, kannst du dir eine Beispielvorlage für die Ausgabe im Template oder Module ausgeben lassen.

## Beispiel-Modulausgabe

Die Ausgabe erfolgt über Fragment-Dateien. Diese findest du im Ordner `fragments/product`. Die Fragmente können nach Belieben angepasst werden. Weitere Informationen zu Fragmenten findest du in der [Redaxo-Dokumentation](https://redaxo.org/doku/main/fragmente).

Voraussetzungen:

* Es gibt URL-Profile für Kategorien und Produkte
* Die URL-Profile verwenden denselben Artikel
* Die Fragmente sind auf Boostrap 5 ausgelegt

```php
<?php

use Url\Url;
$fragment = new rex_fragment();

if ($manager = Url::resolveCurrent()) {

    $profile = $manager->getProfile();
    $table = $profile->getTableName();
    $datasetId = $manager->getDatasetId();

    /* Produktdetailseite */
    if ($table === "rex_product") {
        $fragment->setVar('product', product::get($datasetId));
        echo $fragment->parse('product/product.php');
    } 
    
    /* Produktliste alle Produkte einer Kategorie */
    if($table === "rex_product_category") {
        $fragment->setVar('category', product_category::get($datasetId));
        echo $fragment->parse('product/category.php');
    }
    
} else {
    echo $fragment->parse('product/category-list.php');    
    /* Oder nur Produkte ohne Berücksichtigung der Kategorie(n) */
    // echo $fragment->parse('product/product-list.php');
}
```

## Fragmente und Ausgabe anpassen

Fragmente lassen sich auch überschreiben. Füge dazu bspw. im Ordner deines `Project`-Addons `src/addons/project/fragments/product/` eine Datei mit dem Namen des Fragments ein. Diese Datei wird dann anstelle des Original-Fragments verwendet.

Mehr Informationen über das `Project`-Addon findest du in der [Dokumentation](https://redaxo.org/doku/main/addons-list#project).
