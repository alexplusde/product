# Produktverwaltung für REDAXO 5.x & YForm 4.x

Mit diesem Addon können Produkte anhand von YForm und YOrm im Backend verwaltet und im Frontend ausgegeben werden.

## Features

* Vollständig mit **YForm** umgesetzt: Alle Features und Anpassungsmöglichkeiten von YForm verfügbar
* Einfach: Die Ausgabe erfolgt über [`rex_sql`](https://redaxo.org/doku/master/datenbank-queries) oder objektorientiert über [YOrm](https://github.com/yakamara/redaxo_yform_docs/blob/master/de_de/yorm.md)
* Flexibel: Kompatibel zum [URL-Addon](https://github.com/tbaddade/redaxo_url) und zu [Sprog](https://github.com/tbaddade/redaxo_sprog)
* Sinnvoll: Nur ausgewählte **Rollen** und Redakteure haben Zugriff

> **Steuere eigene Verbesserungen** dem [GitHub-Repository von product](https://github.com/alexplusde/product) bei. Oder **unterstütze dieses Addon:** Mit einer [Beauftragung unterstützt du die Weiterentwicklung dieses AddOns](https://github.com/sponsors/alexplusde)

## Anforderungen

* REDAXO 5.x
* PHP 7.2 oder höher
* YForm
* YForm Fields
* URL

## Installation

Im REDAXO-Installer das Addon `product` herunterladen und installieren. Anschließend erscheint ein neuer Menüpunkt `Produkte` sichtbar.

Im Installationsprozess

* werden YForm-Tabellen `product`, `product_category` und `product_variant` importiert,
* sowie passende YForm Model-Klassen für `product`, `product_category` und `product_variant` registriert,
* werden URL-Profile hinzugefügt (nur wenn das URL-Addon installiert ist),
* wird ein Fallback-Bild in den Medienpool importiert,
* wird der Standard-Editor für die Produktbeschreibung festgelegt (redactor).

## Code-Beispiele für die Modulausgabe

```php
$products = product::query()->find(); // Alle Produkte

foreach($products as $product) {
    
    if($product->getStatus() < 1) {
        continue;
    }
    
    /* Kategorie */
    $category = $product->getCategory();
    echo $category->getName();
    // echo $category->getValue('dein-feld');

    echo $product->getName();
    echo $product->getStatus();
    echo $product->getImage();
    echo $product->getTeaser();
    echo $product->getDescription();
    echo $product->isNew();
    echo $product->getUrl();
    // echo $product->getValue('dein-feld');

    /* Varianten */
    $variants = $product->getVariants();
    foreach($variants as $variant) {
        if($variant->getStatus() < 1) {
            continue;
        }
        echo $variant->getName();
        echo $variant->getImage();
        // echo $variant->getValue('dein-feld');

    }
}

dump(product_category::get(3)); // Kategorie mit der id=3
dump(product::get(3)); // Produkt mit der id=3
dump(product_variant::get(3)); // Variante mit der id=3
```

Um zu filtern oder zu sortieren, nutze die YOrm-spezifischen Query-Methoden:

```php
$products_online = product::query()->where('status', 1)->order('name')->find(); // Alle Produkte, die online sind, sortiert nach Name
```

Weitere Beispiele befinden sich in der Doku.

## Nutzung im Backend: Die Produkteverwaltung

Der Menüpunkt `📦 Produkte` ist im Hauptmenü zwischen `Struktur` und `Medienpool`.

## Import / Export

Produkte basiert auf YForm, nutze die üblichen Import/Export-Funktionen als CSV - oder schreibe ein eigenes Import-Script mit YOrm.

## Lizenz

MIT Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/product/blob/master/LICENSE.md)  

## Autor

**Alexander Walther**  
<http://www.alexplus.de>  
<https://github.com/alexplusde>  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits

`product` basiert auf: [YForm](https://github.com/yakamara/redaxo_yform)
