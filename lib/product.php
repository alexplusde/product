<?php

namespace alexplusde\product;

use rex_config;
use rex_yform_manager_dataset;
use rex_yform_manager_collection;
use rex_media;

/**
 * Produkte
 *
 * @package product
 *
 * Diese Klasse repräsentiert ein Produkt in der Anwendung.
 * Sie erbt von der rex_yform_manager_dataset Klasse und bietet Methoden zum Abrufen und Setzen von Produktinformationen.
 */
class product extends \rex_yform_manager_dataset
{

    /* Name */

    /**
     * @api
     * @return string|null
     *
     * Gibt den Namen des Produkts zurück.
     */
    public function getName() : ?string
    {
        return $this->getValue("name");
    }

    /**
     * @api
     * @param mixed $value Der neue Name des Produkts.
     * @return self
     *
     * Setzt den Namen des Produkts.
     */
    public function setName(mixed $value) : self
    {
        $this->setValue("name", $value);
        return $this;
    }

    /* Status */

    /**
     * @api
     * @return mixed
     *
     * Gibt den Status des Produkts zurück.
     */
    public function getStatus() : mixed
    {
        return $this->getValue("status");
    }

    /**
     * @api
     * @param mixed $param Der neue Status des Produkts.
     * @return self
     *
     * Setzt den Status des Produkts.
     */
    public function setStatus(mixed $param) : self
    {
        $this->setValue("status", $param);
        return $this;
    }

    /* Kategorien */

    /**
     * @api
     * @return rex_yform_manager_dataset|null
     *
     * Gibt die Kategorie des Produkts zurück.
     */
    public function getCategory() : ?rex_yform_manager_dataset
    {
        return $this->getRelatedDataset("category");
    }

    /* Bild */

    /**
     * @api
     * @param bool $asMedia Wenn true, wird das Bild als rex_media Objekt zurückgegeben.
     * @return mixed
     *
     * Gibt das Bild des Produkts zurück. Wenn $asMedia true ist, wird das Bild als rex_media Objekt zurückgegeben.
     */
    public function getImage(bool $asMedia = false) : mixed
    {
        $image = $this->getValue("image");
        $default_image = rex_config::get('product', 'default_thumbnail');
        if(!$image) {
            return $default_image;
        }
        if($asMedia) {
            $media = rex_media::get($image);
            if(!$media) {
                $media = rex_media::get($default_image);
                if(!$media) {
                    return null;
                }
            }
            return $media;
        }
        return $image;
    }

    /**
     * @api
     * @param string $filename Der Dateiname des Bildes.
     * @return self
     *
     * Setzt das Bild des Produkts. Wenn das Bild existiert, wird es gesetzt.
     */
    public function setImage(string $filename) : self
    {
        if(rex_media::get($filename)) {
            $this->getValue("image", $filename);
        }
        return $this;
    }

    /* Teaser */

    /**
     * @api
     * @param bool $asPlaintext Wenn true, wird der Teaser als reiner Text ohne HTML-Tags zurückgegeben.
     * @return string|null
     *
     * Gibt den Teaser des Produkts zurück. Wenn $asPlaintext true ist, wird der Teaser als reiner Text ohne HTML-Tags zurückgegeben.
     */
    public function getTeaser(bool $asPlaintext = false) : ?string
    {
        if($asPlaintext) {
            return strip_tags($this->getValue("teaser"));
        }
        return $this->getValue("teaser");
    }

    /**
     * @api
     * @param mixed $value Der neue Teaser des Produkts.
     * @return self
     *
     * Setzt den Teaser des Produkts.
     */
    public function setTeaser(mixed $value) : self
    {
        $this->setValue("teaser", $value);
        return $this;
    }
            
    /* Beschreibung */

    /**
     * @api
     * @param bool $asPlaintext Wenn true, wird die Beschreibung als reiner Text ohne HTML-Tags zurückgegeben.
     * @return string|null
     *
     * Gibt die Beschreibung des Produkts zurück. Wenn $asPlaintext true ist, wird die Beschreibung als reiner Text ohne HTML-Tags zurückgegeben.
     */
    public function getDescription(bool $asPlaintext = false) : ?string
    {
        if($asPlaintext) {
            return strip_tags($this->getValue("description"));
        }
        return $this->getValue("description");
    }

    /**
     * @api
     * @param mixed $value Die neue Beschreibung des Produkts.
     * @return self
     *
     * Setzt die Beschreibung des Produkts.
     */
    public function setDescription(mixed $value) : self
    {
        $this->setValue("description", $value);
        return $this;
    }

    /* Neu */

    /**
     * @api
     * @param bool $asBool Wenn true, wird der Wert als bool zurückgegeben.
     * @return mixed
     *
     * Gibt zurück, ob das Produkt neu ist. Wenn $asBool true ist, wird der Wert als bool zurückgegeben.
     */
    public function getIsNew(bool $asBool = false) : mixed
    {
        if($asBool) {
            return (bool) $this->getValue("is_new");
        }
        return $this->getValue("is_new");
    }

    /**
     * @api
     * @param int $value Der neue Wert für "is_new". Standardmäßig ist der Wert 1.
     * @return self
     *
     * Setzt, ob das Produkt neu ist.
     */
    public function setIsNew(int $value = 1) : self
    {
        $this->setValue("is_new", $value);
        return $this;
    }

    /* Reihenfolge */

    /**
     * @api
     * @return int|null
     *
     * Gibt die Reihenfolge des Produkts zurück.
     */
    public function getPrio() : ?int
    {
        return $this->getValue("prio");
    }

    /**
     * @api
     * @param int $value Der neue Wert für die Reihenfolge des Produkts.
     * @return self
     *
     * Setzt die Reihenfolge des Produkts.
     */
    public function setPrio(int $value) : self
    {
        $this->setValue("prio", $value);
        return $this;
    }

    /* Varianten */

    /**
     * @api
     * @return rex_yform_manager_collection|null
     *
     * Gibt die IDs der Varianten des Produkts zurück.
     */
    public function getVariants() : ?rex_yform_manager_collection
    {
        return $this->getRelatedCollection("variant_ids");
    }

    /* Geändert am... */

    /**
     * @api
     * @return string|null
     *
     * Gibt das Datum der letzten Änderung des Produkts zurück.
     */
    public function getUpdatedate() : ?string
    {
        return $this->getValue("updatedate");
    }

    /**
     * @api
     * @param string $value Das neue Datum der letzten Änderung des Produkts.
     * @return self
     *
     * Setzt das Datum der letzten Änderung des Produkts.
     */
    public function setUpdatedate(string $value) : self
    {
        $this->setValue("updatedate", $value);
        return $this;
    }

    /* Erstellt am... */

    /**
     * @api
     * @return string|null
     *
     * Gibt das Erstellungsdatum des Produkts zurück.
     */
    public function getCreatedate() : ?string
    {
        return $this->getValue("createdate");
    }

    /**
     * @api
     * @param string $value Das neue Erstellungsdatum des Produkts.
     * @return self
     *
     * Setzt das Erstellungsdatum des Produkts.
     */
    public function setCreatedate(string $value) : self
    {
        $this->setValue("createdate", $value);
        return $this;
    }
    /**
     * Gibt die URL des Eintrags zurück.
     * Returns the URL of the entry.
     *
     * @param string $profile Das Profil, das für die URL-Erstellung verwendet wird. Standardmäßig 'product-id'. / The profile used for URL creation. Defaults to 'product-id'.
     * @return string Die URL des Eintrags oder ein leerer String, wenn keine URL gefunden wurde. / The URL of the entry or an empty string if no URL was found.
     *
     * Beispiel / Example:
     * $url = $product->getUrl('product-id');
     *
     * @api
     */
    public function getUrl(string $profile = 'product-id'): string
    {
        if ($url = rex_getUrl(null, null, [$profile => $this->getId()])) {
            return $url;
        }
        return '';
    }

}
