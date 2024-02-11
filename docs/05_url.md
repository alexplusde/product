# Kombination mit URL-Profilen

Für Kategorien und Produkte können passende URL-Profile angelegt werden, sodass die Generierung von Kategorie- oder Produktdetailseiten automatisiert werden.

Wenn das URL-Addon installiert und aktiviert ist, wird bei der Installation des Addons `product` automatisch ein URL-Profil `product-id` und ein URL-Profil `product-category-id` angelegt.

Die URL-Profile können in den Addon-Einstellungen unter `URL` bearbeitet werden und nach eigenen Vorstellungen und Anforderungen angepasst werden.

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
    if (count($products_all)) {
        // Übersichtsseite aller Produkte
        foreach ($products as $product) {
            if($product->getStatus() < 1) {
                continue;
            }
            // Detailseite des Produkts
            // Alternativ: `$product->getUrl()` verwenden, wenn `product-id` als URL-Profil verwendet wird
            echo '<a href="' . rex_getUrl('', '', ['product-id' => $product->getId()]) . '">' . $product->getName() . '</a>';
        }
    }
}
