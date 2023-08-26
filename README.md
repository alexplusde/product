# Produktverwaltung für REDAXO 5.15 & YForm 4.x

Mit diesem Addon können Produkte anhand von YForm und YOrm im Backend verwaltet und im Frontend ausgegeben werden. Auf Wunsch auch mehrsprachig.

## Features

* Vollständig mit **YForm** umgesetzt: Alle Features und Anpassungsmöglichkeiten von YForm verfügbar
* Einfach: Die Ausgabe erfolgt über [`rex_sql`](https://redaxo.org/doku/master/datenbank-queries) oder objektorientiert über [YOrm](https://github.com/yakamara/redaxo_yform_docs/blob/master/de_de/yorm.md)
* Flexibel: Kompatibel zum [URL2-Addon](https://github.com/tbaddade/redaxo_url)
* Sinnvoll: Nur ausgewählte **Rollen**/Redakteure haben Zugriff

> **Tipp:** Produktverwaltung arbeitet hervorragend zusammen mit den Addons [`yform_usability`](https://github.com/FriendsOfREDAXO/yform_usability/)

> **Steuere eigene Verbesserungen** dem [GitHub-Repository von product](https://github.com/alexplusde/product) bei. Oder **unterstütze dieses Addon:** Mit einer [Spende oder Beauftragung unterstützt du die Weiterentwicklung dieses AddOns](https://github.com/sponsors/alexplusde)

## Installation

Im REDAXO-Installer das Addon `product` herunterladen und installieren. Anschließend erscheint ein neuer Menüpunkt `Produkte` sichtbar.

## Nutzung im Frontend

### Die Klasse `product`

Typ `rex_yform_manager_dataset`. Greift auf die Tabelle `rex_product` zu.

#### Beispiel-Ausgabe eines Produkts

```php
dump(product::get(3)); // Produkt mit der id=3
```

```php
dump(product::get(3)->getCategory()); // Kategorie zum Produkt mit der id=3
```

### Die Klasse `product_category`

Typ `rex_yform_manager_dataset`. Greift auf die Tabelle `rex_product_category` zu.

#### Beispiel-Ausgabe einer Kategorie

```php
dump(product_category::get(3)); // Produkt-Kategorie mit der id=3
```

## Nutzung im Backend: Die Produktverwaltung

### Die Tabelle `rex_category`

In der Produkt-Tabelle werden einzelne Daten festgehalten. Nach der Installation von `product` stehen folgende Felder zur Verfügung:

| Typ      | Typname             | Name                | Bezeichnung       |
|----------|---------------------|---------------------|-------------------|
| value    | text                | name                | Name              |
| validate | empty               | name                |                   |
| value    | textarea            | description         | Beschreibung      |


### Die Tabelle `rex_product_category`

Die Tabelle Kategorien kann frei verändert werden, um Produkte zu gruppieren (bspw. nach Marken) oder zu Verschlagworten (als Tags).

| Typ      | Typname             | Name    | Bezeichnung |
|----------|---------------------|---------|-------------|
| value    | text                | name    | Titel       |
| validate | unique              | name    |             |
| validate | empty               | name    |             |
| value    | be_media            | image   | Bildmotiv   |
| value    | choice              | status  | Status      |
| value    | be_manager_relation | date_id | Produkte    |

## Import / Export

Produkte basiert auf YForm, nutze die üblichen Import/Export-Funktionen als CSV.

## Lizenz

MIT Lizenz, siehe [LICENSE.md](https://github.com/alexplusde/product/blob/master/LICENSE.md)  

## Autor

**Alexander Walther**  
http://www.alexplus.de  
https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits

product basiert auf: [YForm](https://github.com/yakamara/redaxo_yform)  
