<?php

namespace alexplusde\product;

use rex_yform_manager_dataset;
use rex_media;

/**
 * Class product_variant
 *
 * @package alexplusde\product
 *
 * Diese Klasse repräsentiert eine Produktvariante in der Anwendung.
 * Sie erbt von der rex_yform_manager_dataset Klasse und bietet Methoden zum Abrufen und Setzen von Varianteninformationen.
 */
class product_variant extends rex_yform_manager_dataset {

    /**
     * @api
     * @return rex_yform_manager_dataset|null
     *
     * Gibt das zugehörige Produkt der Variante zurück.
     */
    public function getProduct() : ?rex_yform_manager_dataset {
        return $this->getRelatedDataset("product_id");
    }

    /**
     * @api
     * @param bool $asMedia Wenn true, wird das Bild als rex_media Objekt zurückgegeben.
     * @return string|null
     *
     * Gibt das Bild der Variante zurück. Wenn $asMedia true ist, wird das Bild als rex_media Objekt zurückgegeben.
     */
    public function getImage(bool $asMedia = false) : ?string {
        if($asMedia) {
            return rex_media::get($this->getValue("image"));
        }
        return $this->getValue("image");
    }

    /**
     * @api
     * @param string $filename Der Dateiname des neuen Bildes.
     * @return self
     *
     * Setzt das Bild der Variante.
     */
    public function setImage(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->getValue("image", $filename);
        }
        return $this;
    }

    /**
     * @api
     * @return string|null
     *
     * Gibt den Namen der Variante zurück.
     */
    public function getName() : ?string {
        return $this->getValue("name");
    }

    /**
     * @api
     * @param mixed $value Der neue Name der Variante.
     * @return self
     *
     * Setzt den Namen der Variante.
     */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }
/* Status */

/**
 * @api
 * @return mixed
 *
 * Gibt den Status der Produktvariante zurück.
 */
public function getStatus() : mixed {
    return $this->getValue("status");
}

/**
 * @api
 * @param mixed $param Der neue Status der Produktvariante.
 * @return self
 *
 * Setzt den Status der Produktvariante.
 */
public function setStatus(mixed $param) : self {
    $this->setValue("status", $param);
    return $this;
}

/* Reihenfolge */

/**
 * @api
 * @return int|null
 *
 * Gibt die Priorität der Produktvariante zurück.
 */
public function getPrio() : ?int {
    return $this->getValue("prio");
}

/**
 * @api
 * @param int $value Der neue Wert für die Priorität der Produktvariante.
 * @return self
 *
 * Setzt die Priorität der Produktvariante.
 */
public function setPrio(int $value) : self {
    $this->setValue("prio", $value);
    return $this;
}

}
