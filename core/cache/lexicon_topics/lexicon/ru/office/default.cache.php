<?php  return array (
  'area_office_main' => 'Основные',
  'area_office_auth' => 'Авторизация',
  'area_office_profile' => 'Профиль',
  'area_office_ms2' => 'miniShop2',
  'setting_office_frontend_css' => 'Основные стили кабинета',
  'setting_office_frontend_css_desc' => 'Путь к файлу с основными стилями кабинета. Если вы хотите использовать собственные стили - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_office_extjs_css' => 'Кастомные стили ExtJS',
  'setting_office_extjs_css_desc' => 'Вы можете указать путь к собственным стилям для оформления личного кабинета при использовании ExtJS в контроллере.',
  'setting_office_frontend_js' => 'Основной скрипт кабинета',
  'setting_office_frontend_js_desc' => 'Путь к файлу с основными скриптами кабинета. Если вы хотите использовать собственные скрипты - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_office_sanitize_pcre' => 'Правило очистки данных',
  'setting_office_sanitize_pcre_desc' => 'Регулярное выражение, указывающее, что будет вырезано при сохранении данных профиля.',
  'setting_office_controllers_paths' => 'Пути к контроллерам',
  'setting_office_controllers_paths_desc' => 'JSON строка, содержащая массив, где ключи это названия контроллеров, а значения - пути к ним. Например: {"extra":"[[++core_path]]components/extra/controllers/office/"}. Office будет бытаться загрузить "extra/spmeaction" по этому пути в первую очередь.',
  'setting_office_auth_frontend_css' => 'Стили контроллера Auth',
  'setting_office_auth_frontend_css_desc' => 'Путь к файлу со стилями контроллера Auth. Если вы хотите использовать собственные стили - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_office_auth_frontend_js' => 'Скрипт контроллера Auth',
  'setting_office_auth_frontend_js_desc' => 'Путь к файлу со скриптами контроллера Auth. Если вы хотите использовать собственные скрипты - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_office_profile_frontend_css' => 'Стили контроллера Profile',
  'setting_office_profile_frontend_css_desc' => 'Путь к файлу со стилями контроллера Profile. Если вы хотите использовать собственные стили - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_office_profile_frontend_js' => 'Скрипт контроллера Profile',
  'setting_office_profile_frontend_js_desc' => 'Путь к файлу со скриптами контроллера Profile. Если вы хотите использовать собственные скрипты - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_office_profile_force_email_as_username' => 'Email как имя пользователя',
  'setting_office_profile_force_email_as_username_desc' => 'Эта опция копирует email пользователя в username при каждой загрузке страницы, чтобы они всегда были одинаковыми.',
  'setting_office_ms2_frontend_css' => 'Стили контроллера miniShop2',
  'setting_office_ms2_frontend_css_desc' => 'Путь к файлу со стилями контроллера miniShop2. Если вы хотите использовать собственные стили - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_office_ms2_frontend_js' => 'Скрипт контроллера miniShop2',
  'setting_office_ms2_frontend_js_desc' => 'Путь к файлу со скриптами контроллера miniShop2. Если вы хотите использовать собственные скрипты - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
  'setting_office_sms_provider' => 'Провайдер SMS',
  'setting_office_sms_provider_desc' => 'По умолчанию доступны провайдеры: SmsRu и ByteHand',
  'setting_office_sms_id' => 'Логин клиента',
  'setting_office_sms_id_desc' => 'Уникальный логин для авторизации у провайдера. Для SmsRu это "api_id", а у ByteHand просто "id".',
  'setting_office_sms_key' => 'Ключ клиента',
  'setting_office_sms_key_desc' => 'Ключ для авторизации у провайдера. По умолчанию используется только у ByteHand.',
  'setting_office_sms_from' => 'Отправитель SMS',
  'setting_office_sms_from_desc' => 'Имя, от которого отправляется SMS. Как правило, перед использованием, его <strong>необходимо согласовать с провайдером</strong>.',
  'setting_office_check_csrf' => 'Проверка CSRF токена',
  'setting_office_check_csrf_desc' => 'Включите для защиты от автоматических регистраций.',
  'setting_office_auth_mode' => 'Режим авторизации',
  'setting_office_auth_mode_desc' => 'Вы можете выбрать режим авторизации: email или phone.',
  'setting_office_auth_activation' => 'Активация пользователя',
  'setting_office_auth_activation_desc' => 'Нужно ли требовать активацию пользователя через ссылку в email или код из смс',
  'setting_office_auth_page_id' => 'Id страницы авторизации',
  'setting_office_auth_page_id_desc' => 'Id страницы сайта, на которой вызывается контроллер Auth. Эта настройка заполняется автоматически, при первом вызове контроллера.',
  'setting_office_profile_page_id' => 'Id страницы профиля',
  'setting_office_profile_page_id_desc' => 'Id страницы сайта, на которой вызывается контроллер Profile. Эта настройка заполняется автоматически, при первом вызове контроллера.',
  'setting_office_profile_required_fields' => 'Обязательные поля профиля',
  'setting_office_profile_required_fields_desc' => 'Укажите обязательные поля профиля пользователя. Пользователь будет постоянно отправляться на редактирование профиля, пока не заполнит эти поля.',
  'setting_office_ms2_date_format' => 'Формат даты',
  'setting_office_ms2_date_format_desc' => 'Укажите формат дат, используя синтаксис php функции strftime(). Например, "%d.%m.%y %H:%M".',
  'setting_office_ms2_order_grid_fields' => 'Поля таблицы заказов',
  'setting_office_ms2_order_grid_fields_desc' => 'Список полей, которые будут показаны в таблице заказов. Доступны: "createdon,updatedon,num,cost,cart_cost,delivery_cost,weight,status,delivery,payment,customer,receiver".',
  'setting_office_ms2_order_form_fields' => 'Основные поля заказа',
  'setting_office_ms2_order_form_fields_desc' => 'Список полей заказа, которые будут показаны на первой вкладке карточки заказа. Доступны: "weight,createdon,updatedon,cart_cost,delivery_cost,status,delivery,payment".',
  'setting_office_ms2_order_address_fields' => 'Поля адреса доставки',
  'setting_office_ms2_order_address_fields_desc' => 'Список полей доставки, которые будут показаны на третьей вкладке карточки заказа. Доступны: "receiver,phone,index,country,region,metro,building,city,street,room". Если параметр пуст, вкладка будет скрыта.',
  'setting_office_ms2_order_product_fields' => 'Поля таблицы покупок',
  'setting_office_ms2_order_product_fields_desc' => 'Список полей таблицы заказанных товаров. Доступны: "count,price,weight,cost,options". Поля товара указываются с префиксом "product_", например "product_pagetitle,product_article". Дополнительно можно указывать значения из поля options с префиксом "option_", например: "option_color,option_size".',
  'office' => 'Личный кабинет',
  'office_message_close_all' => 'закрыть все',
  'office_err_action_nf' => 'Не могу найти указанное действие',
  'office_err_auth' => 'Требуется авторизация',
  'office_err_mgr_auth' => 'Вы авторизованы в админке, но не в текущем контексте. Пожалуйста, выйдите из админки или авторизуйтесь в текущем контексте.',
  'office_auth_as_user' => 'Авторизоваться',
  'office_err_csrf' => 'Ошибка проверки CSRF токена, возможно он уже устарел. Попробуйте перезагрузить страницу.',
);