# Produkte verwalten

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
