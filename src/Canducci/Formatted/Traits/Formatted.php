<?php namespace Canducci\Formatted\Traits;

use stdClass;

trait Formatted {

    protected $formattedName = 'formatted';
    protected $formattedItems = [];

    public function getFormattedAttribute()
    {
        $data = new stdClass;        
        if (is_null($this->formattedItems) === false && is_array($this->formattedItems) && count($this->formattedItems) > 0) {
            foreach($this->formattedItems as $key => $item) {
                $data->$key = call_user_func_array([$this, sprintf('formatted%s', ucfirst($item[0]))], $item[1]);
            }
        }
        return $data;
    }
}

