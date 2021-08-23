<?php namespace Canducci\Formatted\Traits;

trait FormattedBoolean {
    public function formattedBoolean($name, $yes = 1, $no = 0) {
        if ($this->attributes[$name]) {
            if ($this->attributes[$name] === 1) {
                return $yes;
            } 
            return $no;
        }
        return null;
    }    
}