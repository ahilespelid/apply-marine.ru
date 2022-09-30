<?php

$_lang['payandsee_prop_context'] = 'Ограничение выборки по контексту ресурсов.';
$_lang['payandsee_prop_limit'] = 'Лимит выборки результатов';
$_lang['payandsee_prop_offset'] = 'Пропуск результатов с начала выборки';
$_lang['payandsee_prop_depth'] = 'Глубина поиска товаров от каждого родителя.';
$_lang['payandsee_prop_sortby'] = 'Сортировка выборки.';
$_lang['payandsee_prop_sortdir'] = 'Направление сортировки';
$_lang['payandsee_prop_where'] = 'Дополнительные параметры выборки, закодированные в JSON.';
$_lang['payandsee_prop_select'] = 'Список полей для выборки, через запятую. Можно указывать JSON строку с массивом, например {"modResource":"id,pagetitle,content"}.';
$_lang['payandsee_prop_tpl'] = 'Чанк оформления для каждого результата';
$_lang['payandsee_prop_showLog'] = 'Показывать дополнительную информацию о работе сниппета. Только для авторизованных в контексте "mgr".';
$_lang['payandsee_prop_parents'] = 'Список категорий, через запятую, для поиска результатов. По умолчанию выборка ограничена текущим родителем. Если поставить 0 - выборка не ограничивается.';
$_lang['payandsee_prop_resources'] = 'Список товаров, через запятую, для вывода в результатах. Если id товара начинается с минуса, этот товар исключается из выборки.';
$_lang['payandsee_prop_where'] = 'Строка, закодированная в JSON, с дополнительными условиями выборки.';
$_lang['payandsee_prop_includeContent'] = 'Выбирать поле "content" у товаров.';
$_lang['payandsee_prop_includeTVs'] = 'Список ТВ параметров для выборки, через запятую. Например: "action,time" дадут плейсхолдеры [[+action]] и [[+time]].';
$_lang['payandsee_prop_includeThumbs'] = 'Список размеров превьюшек для выборки, через запятую. Например: "120x90,360x240" дадут плейслолдеры [[+120x90]] и [[+360x240]]. Картинки должны быть заранее сгенерированы в галерее товара.';
$_lang['payandsee_prop_class'] = 'Имя класса для выборки.';
$_lang['payandsee_prop_tvPrefix'] = 'Префикс для ТВ плейсхолдеров, например "tv.". По умолчанию параметр пуст.';
$_lang['payandsee_prop_returnIds'] = 'Возвращать строку с id товаров, вместо оформленных чанков.';
$_lang['payandsee_prop_showUnpublished'] = 'Показывать неопубликованные товары.';
$_lang['payandsee_prop_showDeleted'] = 'Показывать удалённые товары.';
$_lang['payandsee_prop_showHidden'] = 'Показывать товары, скрытые в меню.';
$_lang['payandsee_prop_showEmptyRate'] = 'Показывать контент с нулевой ценой.';
$_lang['payandsee_prop_sortbyOptions'] = 'Указывает по каким опциям и как сортировать среди перечисленного в &sortby. Передаются строкой, например, "optionkey:integer,optionkey2:datetime"';
$_lang['payandsee_prop_userFields'] = 'Ассоциативный массив соответствия полей заказа полям профиля пользователя в формате "поле заказа" => "поле профиля".';
$_lang['payandsee_prop_freshenFields'] = 'Список обновляемых полей. Применяется для полей-чекбоксов.';

$_lang['payandsee_prop_status'] = 'Список статусов, через запятую.';
$_lang['payandsee_prop_content'] = 'Идентификатор контента для выборки.';
$_lang['payandsee_prop_client'] = 'Идентификатор клиента для выборки.';
$_lang['payandsee_prop_sortRates'] = 'Сортировка тарифов. Строка, закодированная в JSON';
$_lang['payandsee_prop_processRates'] = 'Обработывать тарифы.';
$_lang['payandsee_prop_showOverdue'] = 'Показывать законченные подписки.';


$_lang['payandsee_prop_jGrowlJsCss'] = 'Подключить файлы jGrowl.';
$_lang['payandsee_prop_jGrowlJs'] = 'Файл с jGrowl.js для подключения на фронте.';
$_lang['payandsee_prop_jGrowlCss'] = 'Файл с jGrowl.css для подключения на фронте.';
