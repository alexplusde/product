<?php

class product_category extends \rex_yform_manager_dataset
{
    
    /** @api */
    public function getPrio() : mixed
    {
        return $this->getValue("prio");
    }
            
    /** @api */
    public function getName() : ?string
    {
        return $this->getValue("name");
    }
            
    /** @api */
    public function getProducts() : ?rex_yform_manager_collection
    {
        return $this->getRelatedCollection("product");
    }

}
