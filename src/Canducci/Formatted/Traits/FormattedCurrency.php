<?php

trait FormattedCurrency {
    public function formattedCurrency($name, $decimals = 2, $decimals_separator = '.', $thousands_separator = ',') {
        if ($this->attributes[$name] && is_numeric($this->attributes[$name])) {
            return number_format($this->attributes[$name], $decimals, $decimals_separator, $thousands_separator);
        }
        return null;
    }
}