<?php

/**
 * This file is part of the GeocoderLaravel library.
 *
 * (c) Antoine Corcy <contact@sbin.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    // Providers get called in the chain order given here.
    // The first one to return a result will be used.
    'providers' => [
        'Geocoder\Provider\GoogleMapsProvider'    => ['en-US', 'New York', true, 'AIzaSyBAt1mZsRyxtAb9ekQeeXjV_1pqPATe0hg'],
        'Geocoder\Provider\BingMapsProvider'      => ['AgVHaT4WqtJwU-BqNLJUouxV7eY9CmnK6HRoppt0eryEM-ZBO-x3kDtA6TucwbDr'],
        'Geocoder\Provider\MapQuestProvider'      => ['Fmjtd%7Cluu82qu22q%2C2a%3Do5-94tsg6'],
        'Geocoder\Provider\OpenCageProvider'      => ['5c6e0a176c574400376cec25f10277a0'],
        'Geocoder\Provider\OpenStreetMapProvider' => ['en-US'],
        'Geocoder\Provider\ArcGISOnlineProvider'  => null,
        'Geocoder\Provider\FreeGeoIpProvider'     => null,
    ],
    'adapter'   => 'Geocoder\HttpAdapter\CurlHttpAdapter',
];
