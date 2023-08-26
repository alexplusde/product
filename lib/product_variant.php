<?php

class product_variant extends \rex_yform_manager_dataset
{
    
    /** @api */
    public function getProduct() : ?rex_yform_manager_dataset
    {
        return $this->getRelatedDataset("product_id");
    }
            
    /** @api */
    public function getImage() : ?string
    {
        return $this->getValue("image");
    }
            
    /** @api */
    public function getName() : ?string
    {
        return $this->getValue("name");
    }
            
    /** @api */
    public function getStatus() : ?string
    {
        return $this->getValue("status");
    }
            
    /** @api */
    public function getPrio() : mixed
    {
        return $this->getValue("prio");
    }

}
