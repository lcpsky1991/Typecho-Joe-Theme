<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("THEME_URL", str_replace('//usr', '/usr', str_replace(Helper::options()->siteUrl, Helper::options()->rootUrl . '/', Helper::options()->themeUrl)));
$theurl = THEME_URL . '/';
$str1 = explode('/themes/', $theurl);
$str2 = explode('/', $str1[1]);
define("thename", $str2[0]);
if (!empty(Helper::options()->CDNURL)) {
    $theurl = Helper::options()->CDNURL;
}
define("theurl", $theurl);
if (Helper::options()->rewrite == 0) {
    $authorurl = Helper::options()->rootUrl . '/index.php/author/';
} else {
    $authorurl = Helper::options()->rootUrl . '/author/';
}
define("authorurl", $authorurl);
