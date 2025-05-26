<?php

declare(strict_types=1);

namespace Atk4\GeoAdminAddress\Utils;

use Atk4\Ui\App;
use Atk4\Ui\Exception;
use Atk4\Ui\Js\JsChain;

/**
 * Load javascript files.
 */
class JsLoader
{
    /** @var string Javascript file location. */
    public static $cdn = '/https://cdn.jsdelivr.net/gh/apollo29/geo-admin-address';

    /** @var string Javascript file version. */
    public static $version = '2.2.2';

    /** @var bool */
    private static $isLoaded = false;
    protected static $apiUrl = '';

    public static function setGeoAdminApiUrl(string $url): void
    {
        self::$apiUrl = $url;
    }

    /**
     * Load Js file.
     * Allow bypassing default location.
     *
     * This js file add a mapService to the atk namespace. (atk.mapService)
     * and set appropriate maps api options.
     * Javascript integration can then use mapService for initialization.
     * ex: atk.mapService.loadGoogleApi().then((google) => {//initialize maps.})
     */
    public static function load(App $app, string $locationUrl = null): void
    {
        if (!self::$isLoaded) {
            if (!$locationUrl) {
                $cdn = self::$cdn;
                $version = self::$version;
                $locationUrl = "{$cdn}@{$version}/public/atk-geo-admin.min.js";
            }

            $app->requireJs($locationUrl);

            if (!self::$apiUrl) {
                throw new Exception('GEO Admin API Url not set.');
            }

            $app->layout->js(true, (new JsChain('atk.mapService'))->setMapLoader(array_merge([
                'apiUrl' => self::$apiUrl,
                'version' => self::$version
            ])));

            self::$isLoaded = true;
        }
    }
}
