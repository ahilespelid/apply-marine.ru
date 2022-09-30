<?php
$output = "";
$pdo = $modx->getService('pdoTools');

$uri = $_SERVER['REQUEST_URI'];
if(substr($uri, 0, 1)) {
    $uri = mb_substr($uri, 1);
    $tmp = explode('/', $uri);
    if($path = $tmp[0]) {
        $tmp = $modx->getObject('localizatorLanguage', array('http_host:LIKE' => "%/{$path}/"));
        if($tmp) {
            $uri = str_replace("{$path}/", "", $uri);
        }
    }
}

$protocol = 'https://';
$languages = $modx->getIterator('localizatorLanguage', ['active' => 1]);
foreach($languages as $language) {
    if(mb_substr($language->http_host, -1) == '/') {
        $placeholders = array(
            'cultureKey'=>$language->key,
            'active'=>$language->key == $modx->localizator_key ? 'active' : '',
            'url'=>$protocol . $language->http_host . $uri,
        );
    } else {
        $placeholders = array(
            'cultureKey'=>$language->key,
            'active'=>$language->key == $modx->localizator_key ? 'active' : '',
            'url'=>$protocol . $language->http_host . '/' . $uri,
        );
    }
    $output .= $pdo->getChunk($tpl, $placeholders);
}

return $output;
return;
