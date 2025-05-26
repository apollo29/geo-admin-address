<?php

/** @var Persistence $db */

use Atk4\Data\Persistence;
use Atk4\Ui\App;
use Atk4\Ui\Layout\Admin;

require_once __DIR__ . "/init.php";

$app = new App(["title" => "GEO Admin Address"]); // initialization of our app
$app->initLayout([Admin::class]);
$app->db = $db;
