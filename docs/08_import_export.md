# Import / Export von Daten

## Import / Export als CSV

Produkte basiert auf YForm, nutze die üblichen Import/Export-Funktionen als CSV.

## Import mit eigenem Import-Skript

Schreibe ein eigenes Import-Script mittels YOrm. Beispiel:

```php
$meine_daten = [
    ['name' => 'Produkt 1', 'status' => 1],
    ['name' => 'Produkt 2', 'status' => 1],
    ['name' => 'Produkt 3', 'status' => 1],
    ['name' => 'Produkt 4', 'status' => 1],
    ['name' => 'Produkt 5', 'status' => 1],
];

foreach($meine_daten as $data) {
    $product = product::create();
    $product->setValue('name', $data['name']);
    $product->setValue('status', $data['status']);
    $product->save();
}
```

## Export

Exportiere die Daten mittels YOrm. Beispiel:

```php
$products = product::query()->find(); // Alle Produkte

/* Als JSON ausgeben */
echo json_encode($products);
```

Weitere Beispiele und Anpassungen sowie die Nutzung von Joins und Filtern befinden sich in der [YOrm-Doku](https://github.com/yakamara/yform/blob/master/docs/04_yorm.md).
