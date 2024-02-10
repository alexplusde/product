# Produktverwaltung für REDAXO 5.x & YForm 4.x

Mit diesem Addon können Produkte anhand von YForm und YOrm im Backend verwaltet und im Frontend ausgegeben werden. Auf Wunsch auch mehrsprachig.

## Features

* Vollständig mit **YForm** umgesetzt: Alle Features und Anpassungsmöglichkeiten von YForm verfügbar
* Einfach: Die Ausgabe erfolgt über [`rex_sql`](https://redaxo.org/doku/master/datenbank-queries) oder objektorientiert über [YOrm](https://github.com/yakamara/redaxo_yform_docs/blob/master/de_de/yorm.md)
* Flexibel: Kompatibel zum [URL2-Addon](https://github.com/tbaddade/redaxo_url) und zu [Sprog](https://github.com/tbaddade/redaxo_sprog)
* Sinnvoll: Nur ausgewählte **Rollen**/Redakteure haben Zugriff

> **Steuere eigene Verbesserungen** dem [GitHub-Repository von product](https://github.com/alexplusde/product) bei. Oder **unterstütze dieses Addon:** Mit einer [Beauftragung unterstützt du die Weiterentwicklung dieses AddOns](https://github.com/sponsors/alexplusde)

## Installation

Im REDAXO-Installer das Addon `product` herunterladen und installieren. Anschließend erscheint ein neuer Menüpunkt `Produkte` sichtbar.

## Nutzung im Frontend

### Die Klasse `product`

Typ `rex_yform_manager_dataset`. Greift auf die Tabelle `rex_product` zu.

#### Code-Beispiele für die Modulausgabe

```php
$products_all = product::query()->find(); // Alle Produkte

foreach($products as $product) {
    
    if($product->getStatus() < 1) {
        continue;
    }
    
    $category = $product->getCategory();
    $variants = $product->getVariants();

    echo $product->getName();
    echo $product->getStatus();
    echo $product->getImage();
    echo $product->getImage();
    echo $product->getTeaser();
    echo $product->getDescription();
    echo $product->isNew();
    // echo $product->getValue('dein-feld');

    echo $category->getName();
    // echo $category->getValue('dein-feld');

    foreach($variants as $variant) {
        echo $variant->getName();
        echo $variant->getImage();
        echo $variant->getStatus();
        // echo $variant->getValue('dein-feld');

    }
}

dump(product_category::get(3)); // Kategorie mit der id=3
dump(product::get(3)); // Produkt mit der id=3
dump(product_variant::get(3)); // Variante mit der id=3
```

Um zu filtern oder zu sortieren, nutze die YOrm-spezifischen Query-Methoden:

```php
$products_online = product::query()->where('status', 1)->order('name')->find(); // Alle Produkte
```

## Nutzung im Backend: Die Produkteverwaltung

Der Menüpunkt `📦 Produkte` ist im Hauptmenü zwischen `Struktur` und `Medienpool`.

### Die Tabelle `rex_product_category`

In der Kategorien-Tabelle werden einzelne Kategorien erstellt. Erweitere das Formular im Backend um eigene Felder über den YForm Table Manager, z.B. Icons, Bilder, zusätzliche Beschreibungen, etc.

### Die Tabelle `rex_product`

In der Produkte-Tabelle werden einzelne Produkte festgehalten. Erweitere das Formular im Backend um eigene Felder über den YForm Table Manager.

### Die Tabelle `rex_product_variant`

In der Varianten-Tabelle können einzelne Varianten von Produkten erstellt werden. Erweitere das Formular im Backend um eigene Felder über den YForm Table Manager, z.B. eigene Artikelnummern und varianten-spezifische Eigenschaften wie bspw. Farben, Verfügbarkeit,...

## Kombination mit URL-Profilen

Für Kategorien und Produkte können passende URL-Profile angelegt werden, sodass die Generierung von Kategorie- oder Produktdetailseiten automatisiert werden.

Wenn das URL-Addon installiert und aktiviert ist, wird bei der Installation des Addons `product` automatisch ein URL-Profil `product-id` und ein URL-Profil `product-category-id` angelegt. Dieses Profil wird für die Generierung von Produktdetailseiten verwendet.

In diesem Beispiel wird ein Profil mit dem Schlüssel `product-id` vorausgesetzt. Nutze folgenden Code in der Template- oder Modulausgabe.

```php
use Url\Url;

$manager = Url::resolveCurrent();

if ($manager) {
    $product = product::get($manager->getDatasetId());
    if ($product) {
        // Detailseite des Produkts
        dump($product);
    }
} else {
    $products = product::query()->find();
    if (count($products)) {
        // Übersichtsseite aller Produkte
        foreach ($products as $product) {
            if($product->getStatus() < 1) {
                continue;
            }
            echo '<a href="' . $product->getUrl() . '">' . $product->getName() . '</a>';
        }
    }
}
```

## Import / Export

Produkte basiert auf YForm, nutze die üblichen Import/Export-Funktionen als CSV.

## Lizenz

MIT Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/product/blob/master/LICENSE.md)  

## Autor

**Alexander Walther**  
<http://www.alexplus.de>  
<https://github.com/alexplusde>  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits

product basiert auf: [YForm](https://github.com/yakamara/redaxo_yform)  
