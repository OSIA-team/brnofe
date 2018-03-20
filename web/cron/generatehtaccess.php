<?php
/**
 * Created by PhpStorm.
 * User: kkosu
 * Date: 19.03.2018
 * Time: 20:44
 */

$urlToIndex = str_replace("/cron/".basename($_SERVER['REQUEST_URI']), "/index.php", $_SERVER['PHP_SELF']);

$data = <<<EOF
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule !\.(css|js|icon|zip|rar|png|jpg|gif|pdf)$ $urlToIndex [L]
EOF;

if (file_put_contents('../.htaccess', $data)){
    echo "Success";
} else {
    echo "Error!";
}