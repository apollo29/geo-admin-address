<?php

declare(strict_types=1);

use Atk4\GeoAdminAddress\Form\Control\AddressLookup;
use Atk4\GeoAdminAddress\Utils\JsLoader;
use Atk4\GeoAdminAddress\Utils\Type;
use Atk4\Ui\Form;

// @var \Atk4\Ui\App $app
/** @var App $app */
require_once __DIR__ . "/init.app.php";

// Set Google developer key.
JsLoader::setGeoAdminApiUrl('https://api3.geo.admin.ch/rest/services/api/SearchServer');

$form = Form::addTo($app);
$form->addControl('map_search', [AddressLookup::class]);

$f_add = $form->addGroup('Label/Origin');
$f_add->addControl(Type::LABEL, ['width' => 'four']);
$f_add->addControl(Type::ORIGIN, ['width' => 'twelve']);

$f_lat_lng = $form->addGroup('Lat/Lng');
$f_lat_lng->addControl(Type::LAT, ['width' => 'eight']);
$f_lat_lng->addControl(Type::LNG, ['width' => 'eight']);
