<?php

namespace alexplusde\product;

use rex_yform_manager_dataset;
use rex_yform_manager_collection;

/**
 * Class product_category
 *
 * @package product
 *
 * Diese Klasse repräsentiert eine Produktkategorie in der Anwendung.
 * Sie erbt von der rex_yform_manager_dataset Klasse und bietet Methoden zum Abrufen und Setzen von Kategorieinformationen.
 */
 class product_category extends rex_yform_manager_dataset {

    /**
     * @api
     * @return int|null
     *
     * Gibt die Priorität der Kategorie zurück.
     */
    public function getPrio() : ?int {
        return $this->getValue("prio");
    }

    /**
     * @api
     * @param int $value Der neue Wert für die Priorität der Kategorie.
     * @return self
     *
     * Setzt die Priorität der Kategorie.
     */
    public function setPrio(int $value) : self {
        $this->setValue("prio", $value);
        return $this;
    }

    /**
     * @api
     * @return string|null
     *
     * Gibt den Namen der Kategorie zurück.
     */
    public function getName() : ?string {
        return $this->getValue("name");
    }

    /**
     * @api
     * @param mixed $value Der neue Name der Kategorie.
     * @return self
     *
     * Setzt den Namen der Kategorie.
     */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /**
     * @api
     * @return rex_yform_manager_collection|null
     *
     * Gibt die Produkte der Kategorie zurück.
     */
    public function getProducts() : ?rex_yform_manager_collection {
        return $this->getRelatedCollection("product");
    }


    /**
     * Gibt die URL des Eintrags zurück.
     * Returns the URL of the entry.
     *
     * @param string $profile Das Profil, das für die URL-Erstellung verwendet wird. Standardmäßig 'product-category-id'. / The profile used for URL creation. Defaults to 'product-category-id'.
     * @return string Die URL des Eintrags oder ein leerer String, wenn keine URL gefunden wurde. / The URL of the entry or an empty string if no URL was found.
     *
     * Beispiel / Example:
     * $url = $product->getUrl('product-category-id');
     *
     * @api
     */
    public function getUrl(string $profile = 'product-category-id'): string
    {
        if ($url = rex_getUrl(null, null, [$profile => $this->getId()])) {
            return $url;
        }
        return '';
    }

}
