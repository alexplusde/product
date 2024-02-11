# Klasse `product_variant`

Diese Klasse erweitert `rex_yform_manager_dataset` und stellt Methoden zur Verfügung, um Varianten zu bestimmten Produkten zu hinterlegen, z.B. Farbe, Größe, Füllmenge o.ä.

> Es werden nachfolgend zur die durch dieses Addon ergänzte Methoden beschrieben. Lerne mehr über YOrm und den Methoden für Querys, Datasets und Collections in der [YOrm Doku](https://github.com/yakamara/yform/blob/master/docs/04_yorm.md)

## Beispiele

### Produktvarianten eines Produkts abfragen

```php
$product = product::get(1);
$variants = $product->getVariants(); // Gibt alle Produktvarianten des Produkts zurück.

foreach ($variants as $variant) {
    echo $variant->getName();
}
```

### Produktvariante erstellen

```php
$variant = product_variant::create();
$variant->setName("Neue Variante");
$variant->setProduct(1); // Produkt-ID
$variant->save();
```

## Methoden

### `getName()`

Gibt den (abweichenden) Namen der Produktvariante zurück.

```php
$category = product_category::get(1);
echo $category->getName();
```

### `setName()`

Setzt einen (abweichenden) Namen der Produktvariante.

```php
$category = product_category::create();
$category->setName("Neuer Name");
$category->save();
```

### `getProduct()`

Gibt das zugehörige Produkt der Variante zurück.

```php
$variant = product_variant::get(1);
$product = $variant->getProduct(); // Gibt das zugehörige Produkt zurück.
```

### `getImage()`

Gibt das Bild der Variante zurück. Wenn `$asMedia` true ist, wird das Bild als `rex_media` Objekt zurückgegeben.

```php
$variant = product_variant::get(1);
$image = $variant->getImage(); // Gibt den Bildpfad zurück.
$imageAsMedia = $variant->getImage(true); // Gibt das Bild als rex_media Objekt zurück.
```

### `setImage()`

Setzt das Bild der Variante.

```php
$variant = product_variant::create();
$variant->setImage("Bildpfad");
$variant->save();
```

### `getStatus()`

Gibt den Status der Produktvariante zurück.

```php
$variant = product_variant::get(1);
$status = $variant->getStatus(); // Gibt den Status der Produktvariante zurück.
```

### `setStatus()`

Setzt den Status der Produktvariante.

```php
$variant = product_variant::create();
$variant->setStatus("Neuer Status");
$variant->save();
```

### `getPrio()`

Gibt die Priorität der Produktvariante zurück.

```php
$variant = product_variant::get(1);
$prio = $variant->getPrio(); // Gibt die Priorität der Produktvariante zurück.
```

### `setPrio()`

Setzt die Priorität der Produktvariante.

```php
$variant = product_variant::create();
$variant->setPrio(1);
$variant->save();
```
