<?php namespace Canducci\Formatted\Traits;

use Exception;
use stdClass;

trait Formatted {

    protected $formattedItems = [];

    abstract protected function setFormattedItems(): void;
    
    protected function addFormattedItem(string $key, array $configuration): void
    {
        if (!in_array($key, $this->formattedItems)) {
            $this->formattedItems[$key] = $configuration;
        } else {
            throw new Exception("Error: repeated key");
        }
    }
    
    public function getFormattedAttribute()
    {
        $this->setFormattedItems();
        $data = new stdClass;        
        if (is_null($this->formattedItems) === false && is_array($this->formattedItems) && count($this->formattedItems) > 0) {
            foreach($this->formattedItems as $key => $item) {
                $data->$key = call_user_func_array([$this, sprintf('formatted%s', ucfirst($item[0]))], $item[1]);
            }
        }
        return $data;
    }
}

