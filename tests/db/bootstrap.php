<?php 

require "./vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule = new Capsule();

$capsuleConfig["driver"] = "sqlite";
$capsuleConfig["database"] = __DIR__ . "/db.sqlite";

/*
$capsuleConfig["host"] = "127.0.0.1"; //localhost or ip
$capsuleConfig["database"] = "homestead";
$capsuleConfig["username"] = "root";
$capsuleConfig["password"] = "senha";
*/

$capsule->addConnection($capsuleConfig);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();