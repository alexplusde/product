<?php

class product extends \rex_yform_manager_dataset
{
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
    public function getCategory() : ?rex_yform_manager_dataset
    {
        return $this->getRelatedDataset("category");
    }
                
    /** @api */
    public function getImage() : ?string
    {
        return $this->getValue("image");
    }
                
    /** @api */
    public function getTeaser() : ?string
    {
        return $this->getValue("teaser");
    }
                
    /** @api */
    public function getDescription() : ?string
    {
        return $this->getValue("description");
    }
                
    /** @api */
    public function getIsNew() : ?bool
    {
        return $this->getValue("is_new");
    }
                
    /** @api */
    public function getPrio() : mixed
    {
        return $this->getValue("prio");
    }
                
    /** @api */
    public function getVariants() : ?rex_yform_manager_dataset
    {
        return $this->getRelatedDataset("variant_ids");
    }
                
    /** @api */
    public function getUpdateDate() : ?string
    {
        return $this->getValue("updatedate");
    }
                
    /** @api */
    public function getCreateDate() : ?string
    {
        return $this->getValue("createdate");
    }
}
