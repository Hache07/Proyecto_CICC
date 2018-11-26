<?php

require __DIR__  . '/paypal/vendor/autoload.php';

define('URL_SITIO', 'http://localhost/proyecto_cicc/');
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AYJ2kSQL4PBSI77iXOcCyHsaE_2sSHLt_RE2k80RKOIjzpaIUYO-Y9xKBJhMYiIadq13_XC1GNIpDoYI',  // ClientID
        'EFcQ_N3Yo8tsGB3DeVYCKEFkNDXX5_ZQYYaFGUaGjNL6aaATbsd9Vyd0yrRtve8jJM8mWP4NXrWu1aqv'   // ClientSecret
    )
);