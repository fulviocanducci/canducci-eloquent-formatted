<?php

declare(strict_types = 1);

require 'db/bootstrap.php';
require 'models/People.php';

use Models\People;
use PHPUnit\Framework\TestCase;

class FormattedTest extends TestCase 
{
    public People $model;

    protected function setUp(): void
    {        
        $this->model = new People();
    }

    public function testPeopleCount(): void
    {
        $this->assertTrue(count($this->model->all()->toArray()) > 0);
    }

    public function testPeopleFormattedDate(): void
    {
        $model = $this->model->first();
        $d = date_create_from_format('d/m/Y', $model->formatted->birthday);
        $this->assertNotNull($d);
    }

    public function testPeopleFormattedDateTime(): void
    {
        $model = $this->model->first();
        $d = date_create_from_format('d/m/Y H:i:s', $model->formatted->birthday);
        $this->assertNotNull($d);
    }

    public function testPeopleFormattedCurrency(): void
    {
        $model = $this->model->first();
        $cost = str_replace('.', '', $model->formatted->cost);
        $cost = str_replace(',', '.', $cost);
        $this->assertTrue(is_numeric($cost));
    }

    public function testPeopleFormattedBoolean(): void
    {
        $model = $this->model->first();
        $active = $model->formatted->active;        
        $this->assertTrue($active === 'y' || $active === 'n');
    }
}