# Canducci Eloquent Formatted

[![Downloads](https://img.shields.io/packagist/dt/canducci/eloquent-formatted.svg?style=plastic)](https://packagist.org/packages/canducci/eloquent-formatted)
[![License](https://img.shields.io/packagist/l/canducci/eloquent-formatted.svg?style=plastic)](https://packagist.org/packages/canducci/eloquent-formatted)
[![Version](https://img.shields.io/packagist/v/canducci/eloquent-formatted?style=plastic)](https://packagist.org/packages/canducci/eloquent-formatted)
[![PHP Composer](https://github.com/fulviocanducci/canducci-eloquent-formatted/actions/workflows/php.yml/badge.svg?style=for-the-badge)](https://github.com/fulviocanducci/canducci-eloquent-formatted/actions/workflows/php.yml)

## Installation

```sh
composer require canducci/eloquent-formatted
```

## Configuration

Configure in Model:

#### Trait

```php
use Formatted, FormattedDate, FormattedCurrency, FormattedBoolean;
```

#### Implementation method 

```php
protected function setFormattedItems(): void 
{
    $this->addFormattedItem('birthday', ['date', ['birthday', 'Y-m-d', 'd/m/Y']]);
    $this->addFormattedItem('cost', ['currency', ['cost', 2, ',', '.']]);
    $this->addFormattedItem('active', ['boolean', ['active', 'y', 'n']]);
}
```
#### Append

```php
protected $appends = [
    'formatted'
];
```

#### Code Full

```php
<?php namespace Models;

use Canducci\Formatted\Traits\Formatted;
use Canducci\Formatted\Traits\FormattedBoolean;
use Canducci\Formatted\Traits\FormattedCurrency;
use Canducci\Formatted\Traits\FormattedDate;
use Canducci\Formatted\Traits\FormattedDatetime;
use Illuminate\Database\Eloquent\Model as Eloquent;

class People extends Eloquent
{
    use Formatted, FormattedDate, FormattedCurrency, FormattedBoolean, FormattedDatetime;

    protected $table = 'peoples';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 
        'cost', 
        'birthday',
        'active'
    ];

    protected $dates = [
        'created_at', 
        'updated_at'
    ];

    protected $appends = [
        'formatted'
    ];

    protected function setFormattedItems(): void 
    {
        $this->addFormattedItem('birthday', ['date', ['birthday', 'Y-m-d', 'd/m/Y']]);
        $this->addFormattedItem('created_at', ['dateTime', ['created_at']]);
        $this->addFormattedItem('updated_at', ['datetime', ['updated_at']]);
        $this->addFormattedItem('cost', ['currency', ['cost', 2, ',', '.']]);
        $this->addFormattedItem('active', ['boolean', ['active', 'y', 'n']]);

    }
}
```

#### Result

```php
array(8) {
  ["id"]=>
  int(1)
  ["name"]=>
  string(6) "Test 1"
  ["cost"]=>
  string(4) "1000"
  ["birthday"]=>
  string(10) "1999-01-01"
  ["active"]=>
  string(1) "1"
  ["updated_at"]=>
  string(27) "2021-08-23T22:32:57.000000Z"
  ["created_at"]=>
  string(27) "2021-08-23T22:32:57.000000Z"
  ["formatted"]=>
  object(stdClass)#25 (3) {
    ["birthday"]=>
    string(10) "01/01/1999"
    ["cost"]=>
    string(8) "1.000,00"
    ["active"]=>
    string(1) "n"
  }
}
```
