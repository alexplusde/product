# Kombination mit URL-Profilen

Für Kategorien und Produkte können passende URL-Profile angelegt werden, sodass die Generierung von Kategorie- oder Produktdetailseiten automatisiert werden.

In diesem Beispiel wird ein Profil mit dem Schlüssel `product-id` vorausgesetzt. Nutze folgenden Code in der Template- oder Modulausgabe.

```php
use Url\Url;

$manager = Url::resolveCurrent();

if ($manager) {
    $product = product::get($manager->getDatasetId());
    if ($product) {
        // Detailseite des Produkts
        dump($movie);
    }
} else {
    $products = product::query()->find();
    if (count($products_all)) {
        // Übersichtsseite aller Produkte
        foreach ($products as $product) {
            if($product->getStatus() < 1) {
                continue;
            }
            echo '<a href="' . rex_getUrl('', '', ['product-id' => $product->getId()]) . '">' . $product->getName() . '</a>';
        }
    }
}
