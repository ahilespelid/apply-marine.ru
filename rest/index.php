<?php
// Здесь типовые вещи, без изменений
// Подключаем MODX
require_once dirname(dirname(__FILE__)) . '/config.core.php';
require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error', 'error.modError', '', '');


// Изменения получаем лишь в этом блоке кода
// Подготовим  некоторую базовую конфигурацию и загрузим свой собственный класс restService
// Мы всего навсего изменили второй параметр, указали имя свежесозданного класса, и третий параметр - путь к классу

/** @var modRestService $rest */
$rest = $modx->getService('rest', 'restService', MODX_CORE_PATH . 'components/rest/model/', array(
    // Путь к контроллерм позже тоже поменяем, пока не трогам
    'basePath' => dirname(__FILE__) . '/Controllers/',
    'controllerClassSeparator' => '',
    // Префикс для контроллеров также для разнообразия позже поменяем. 
    'controllerClassPrefix' => 'MyController',
    'xmlRootNode' => 'response',
));


//Далее тоже только старые методы без изменений

// обрабатывем запрос и возвроащаем ответ
/** @var modRestService $rest */
$rest->prepare();
// Проверяем, что пользователю предоставлены необходимые права доступа;
// Бьем по рукам и Возвращаем пользователю ошибку 401 ежели чего
if (!$rest->checkPermissions()) {
    $rest->sendUnauthorized(true);
}

$rest->process();