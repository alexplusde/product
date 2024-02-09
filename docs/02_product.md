# Klasse: `product`

Die Klasse product ist ein Dataset für den YForm Manager in REDAXO. Sie stellt Methoden zur Verfügung, um auf die Daten eines bestimmten Produkts zuzugreifen.

> Es werden nachfolgend zur die durch dieses Addon ergänzte Methoden beschrieben. Lerne mehr über YOrm und den Methoden für Querys, Datasets und Collections in der [YOrm Doku](https://github.com/yakamara/yform/blob/master/docs/04_yorm.md)

```php
$product = product::get($id);

// Angaben zum Produkt, bspw. für eine Produktübersicht-Seite
echo $product->getName();
```

## Methoden

### `getName()`

Gibt den Namen des Produkts zurück.

### `setName(mixed $value)`

Setzt den Namen des Produkts.

```php
$product = product::get($id);
$product->setName("Neuer Produktname");
$product->save();
```

### `getStatus()`

Gibt den Status des Produkts zurück.

```php
$product = product::get($id);
$status = $product->getStatus();
```

### `setStatus(mixed $param)`

Setzt den Status des Produkts.

```php
$product = product::get($id);
$product->setStatus("1");
$product->save();
```

### `getCategory()`

Gibt die Kategorie des Produkts zurück.

```php
$product = product::get($id);
$category = $product->getCategory();
```

### `getImage(bool $asMedia = false)`

Gibt das Bild des Produkts zurück. Wenn `$asMedia` true ist, wird das Bild als `rex_media` Objekt zurückgegeben.

```php
$product = product::get($id);
$image = $product->getImage();
$imageAsMedia = $product->getImage(true);
```

### `setImage(string $filename)`

Setzt das Bild des Produkts. Wenn das Bild existiert, wird es gesetzt.

```php
$product = product::get($id);
$product->setImage("Bildpfad");
$product->save();
```

### `getTeaser(bool $asPlaintext = false)`

Gibt den Teaser des Produkts zurück. Wenn `$asPlaintext` true ist, wird der Teaser als reiner Text ohne HTML-Tags zurückgegeben.

```php
$product = product::get($id);
$teaser = $product->getTeaser();
$teaserAsPlaintext = $product->getTeaser(true);
```

### `setTeaser(mixed $value)`

Setzt den Teaser des Produkts.

```php
$product = product::get($id);
$product->setTeaser("Neuer Teaser");
$product->save();
```

### `getDescription(bool $asPlaintext = false)`

Gibt die Beschreibung des Produkts zurück. Wenn `$asPlaintext` true ist, wird die Beschreibung als reiner Text ohne HTML-Tags zurückgegeben.

```php
$product = product::get($id);
$description = $product->getDescription();
$descriptionAsPlaintext = $product->getDescription(true);
```

### `setDescription(mixed $value)`

Setzt die Beschreibung des Produkts.

```php
$product = product::get($id);
$product->setDescription("Neue Beschreibung");
$product->save();
```

### `getIsNew(bool $asBool = false)`

Gibt zurück, ob das Produkt neu ist. Wenn `$asBool` true ist, wird der Wert als bool zurückgegeben.

```php
$product = product::get($id);
$isNew = $product->getIsNew();
$isNewAsBool = $product->getIsNew(true);
```

### `setIsNew(int $value = 1)`

Setzt, ob das Produkt neu ist.

```php
$product = product::get($id);
$product->setIsNew(1);
$product->save();
```

### `getPrio()`

Gibt die Reihenfolge des Produkts zurück.

```php
$product = product::get($id);
$prio = $product->getPrio();
```

### `setPrio(int $value)`

Setzt die Reihenfolge des Produkts.

```php
$product = product::get($id);
$product->setPrio(1);
$product->save();
```

### `getVariantIds()`

Gibt die IDs der Varianten des Produkts zurück.

```php
$product = product::get($id);
$variantIds = $product->getVariantIds();
```

### `getUpdatedate()`

Gibt das Datum der letzten Änderung des Produkts zurück.

```php
$product = product::get($id);
$updatedate = $product->getUpdatedate();
```

### `setUpdatedate(string $value)`

Setzt das Datum der letzten Änderung des Produkts.

```php
$product = product::get($id);
$product->setUpdatedate("2022-01-01");
$product->save();
```

### `getCreatedate()`

Gibt das Erstellungsdatum des Produkts zurück.

```php
$product = product::get($id);
$createdate = $product->getCreatedate();
```

### `setCreatedate(string $value)`

Setzt das Erstellungsdatum des Produkts.

```php
$product = product::get($id);
$product->setCreatedate("2022-01-01");
$product->save();
```
