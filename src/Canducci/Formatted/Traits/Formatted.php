<?php namespace Canducci\Formatted\Traits;

use stdClass;

trait Formatted {

    protected $formattedName = 'formatted';
    protected $items = [];

    public function getFormattedAttribute()
    {
        $data = new stdClass;
        if (is_null($this->items) === false && is_array($this->items) && count($this->items) > 0) {
            foreach($this->items as $key => $item) {
                $data->$key = call_user_func_array([$this, sprintf('formatted%s', ucfirst($item[0]))], $item[1]);
            }
        }
        return $data;
    }
}

