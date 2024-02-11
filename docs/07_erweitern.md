# `Product` erweitern

## Eigenschaften hinzufügen

Kategorien, Produkte und Produkt-Varianten basieren auf YForm. Das bedeutet, dass die Eigenschaften von Produkten und Varianten über zusätzliche Felder erweitert werden können.

1. Auf `YForm` im Menü klicken und `Tabellen` wählen.
2. Bei den Tabellen `product_category`, `product` oder `product_variant` auf `Felder bearbeiten` klicken.
3. Ein neues Feld hinzufügen und speichern.

Anschließend lassen sich die neuen Felder in der Produktverwaltung verwenden und über die Klasse `product` ansprechen.

```php
$product = product::get($id);
echo $product->getValue('mein_neues_feld');
```

```php
$product = product::create();
$product->setValue('name', 'Mein Produkt');
$product->setValue('mein_neues_feld', 'Wert');
$product->save();
```

## Methoden hinzufügen

Über die Klassen `product_category`, `product` und `product_variant` sind Dataset-Modelle für den YForm-Manager definiert. Sie stellt Methoden zur Verfügung, um auf die Daten eines bestimmten Produkts zuzugreifen.

```php
public class my_product extends alexplusde\product\product
{
    public function getMyValue()
    {
        return $this->getValue('mein_neues_feld');
    }
}
```

Dazu muss die Klasse `my_product` die Klasse `product` erweitern. Anschließend kann die Methode `getMyValue` verwendet werden.

```php
$product = my_product::get($id);
echo $product->getMyValue();
```

## Klassen als Model-Klassen registrieren

Die Klasse `my_product` muss in der `boot.php` des Projekts registriert werden, um als Model-Klasse für Produkte verwendet zu werden. Außerdem muss die Einstellung `Eigene Model-Klasse verwenden?` in den Addon-Einstellungen aktiviert sein.

```php
if(1 === \rex_config::get('product', 'use_own_model')) {
    rex_yform_manager_dataset::setModelClass(
        'rex_product',
        my_product::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_product_category',
        my_product_category::class
    );

    rex_yform_manager_dataset::setModelClass(
        'rex_product_variant',
        my_product_variant::class
    );
}
```

> **Tipp:** Lerne mehr über YOrm und die Methoden für Querys, Datasets und Collections in der [YOrm Doku](https://github.com/yakamara/yform/blob/master/docs/04_yorm.md) und nutze das Addon [YForm Model Class Accelerator](https://github.com/alexplusde/ymca/), um Klassen automatisch anhand der YForm-Tabellendefinition zu generieren.
