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