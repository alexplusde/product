# Einstellungen

## Fallback-Bild

Bild, das angezeigt wird, wenn kein Bild für das Produkt oder die Produktvariante hinterlegt ist.

## Eigene Model-Klasse verwenden?

Standard: Nein. Wenn Ja, dann kann eine eigene Model-Klasse für Produkte und Produktvarianten verwendet werden.

Die Klasse müssen die Klassen `product_category`, `product` bzw. `product_variant` erweitern, siehe [Erweitern](07_erweitern.md) und bspw. in der eigenen `boot.php` des Projekts registriert werden.

## WYSIWYG-Editor

WYSIWYG-Editor festlegen, der für die Bearbeitung von Produktinformationen verwendet wird.

Beispiel für den CKE5-Editor in Deutsch mit dem Profil "default":

```html
class="form-control cke5-editor" data-lang="de" data-profile="default"
```
