<?php
/**
 * Demonstrate use with Crud.
 * JsLoader::load() is need for AddressLookup to work in ModalExecutor.
 */
declare(strict_types=1);

/** @var \Atk4\Ui\App $app */
/** @var App $app */
require_once __DIR__ . "/init.app.php";

use Atk4\GeoAdminAddress\Model\Address;
use Atk4\GeoAdminAddress\Utils\JsLoader;
use Atk4\Ui\Crud;

// Set Google developer key.
JsLoader::setGoogleApiKey('');
// Load map api.
JsLoader::load($app);

Crud::addTo($app)->setModel(new Address($app->db, ['table' => 'address']));
