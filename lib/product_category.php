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

}
