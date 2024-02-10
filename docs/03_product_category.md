# Klasse `product_category`

Diese Klasse erweitert `rex_yform_manager_dataset` und stellt Methoden zur Verfügung, um auf die Daten einer bestimmten Mitarbeiterkategorie zuzugreifen.

> Es werden nachfolgend zur die durch dieses Addon ergänzte Methoden beschrieben. Lerne mehr über YOrm und den Methoden für Querys, Datasets und Collections in der [YOrm Doku](https://github.com/yakamara/yform/blob/master/docs/04_yorm.md)

## Beispielsausgabe

`Product` kommt mit einem mitgelieferten Standard-Fragment, das die Kategorien auflistet. Dieses Fragment kann in einem Modul oder einer Template-Ausgabe verwendet werden.

```php
$fragment = new rex_fragment();
echo $fragment->parse('product/category-list.php');
```

## Methoden

### `getName()`

Gibt den Namen der Mitarbeiterkategorie zurück.

```php
$category = product_category::get(1);
echo $category->getName(); // Gibt den Namen der Kategorie aus.
```

### `setName()`

Setzt den Namen der Mitarbeiterkategorie.

```php
$category = product_category::create();
$category->setName("Neuer Name");
$category->save();
```

### `getPrio()`

Gibt die Reihenfolge der Produktkategorie zurück.

```php
$category = product_category::get(1);
echo $category->getPrio(); // Gibt die Reihenfolge der Kategorie aus.
```

### `setPrio()`

Setzt die Reihenfolge der Produktkategorie.

```php
$category = product_category::create();
$category->setPrio(1);
$category->save();
```

### `getProducts()`

Gibt die Produkte der Produktkategorie zurück. Diese Methode gibt eine `rex_yform_manager_collection` zurück, die die Produkte der Kategorie enthält.

```php
$category = product_category::get(1);
$products = $category->getProducts(); // Gibt eine Collection von Produkten zurück.
foreach ($products as $product) {
    echo $product->getName();
}
```
