<?php namespace Canducci\Formatted\Traits;

trait FormattedDatetime {
    public function formattedDatetime($name, $from = 'Y-m-d H:i:s', $to = 'd/m/Y H:i:s') {
        if (isset($this->attributes[$name])) {
            if ($d = date_create_from_format($from, $this->attributes[$name])) {
                return $d->format($to);
            }
        }
        return null;
    }
}