<?php namespace Canducci\Formatted\Traits;

trait FormattedDate {
    public function formattedDate($name, $from = 'Y-m-d', $to = 'd/m/Y') {
        if (isset($this->attributes[$name])) {
            if ($d = date_create_from_format($from, $this->attributes[$name])) {
                return $d->format($to);
            }
        }
        return null;
    }
}