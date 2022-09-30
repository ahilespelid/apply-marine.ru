<?php  return array (
  'resourceClass' => 'modDocument',
  'resource' => 
  array (
    'id' => 12,
    'type' => 'document',
    'contentType' => 'text/html',
    'pagetitle' => 'Новости',
    'longtitle' => 'Новости',
    'description' => 'Новости',
    'alias' => 'novosti',
    'alias_visible' => 1,
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 1,
    'introtext' => 'Новости',
    'content' => '',
    'richtext' => 0,
    'template' => 10,
    'menuindex' => 10,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1513157397,
    'editedby' => 1,
    'editedon' => 1661670176,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1513157340,
    'publishedby' => 1,
    'menutitle' => 'Новости',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 0,
    'class_key' => 'modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => 'novosti.html',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => '{"autoredirector":{"old_uri":"novosti.html"},"ms2gallery":{"media_source":"4"}}',
    'meta-description' => '[[*introtext]]',
    'meta-keywords' => '[[*meta-title]]',
    'meta-title' => '[[*pagetitle]]',
    'nocopy' => ' oncopy="return false"',
    'tvimage' => 
    array (
      0 => 'tvimage',
      1 => '',
      2 => 'default',
      3 => NULL,
      4 => 'image',
    ),
    'meta-noindex' => '<meta name="robots" content="all"/>',
    'seotitle' => 'Новости',
    'keywords' => 'Новости',
    'localizator_content' => 'Новости',
    '_content' => '<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <!-- meta -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Новости | [[!++my_metaTail]]</title>
	<meta name="description" content="Новости" />
	<meta name="keywords" content="Новости" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	[[!++my_metategs]]
	<meta name="robots" content="all"/>
	<base href="[[!++site_url]]">
	
	<meta property="og:title" content="Новости">
    <meta property="og:description" content="Новости">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://test.apply-marine.ru/novosti">
    <meta property="og:image" content="https://test.apply-marine.ru/templates/img/logotype.jpg">
    <meta property="og:site_name" content="Applay Marine">
    <meta property="og:locale" content="UTF-8">
        
    

	<!-- icons -->
	<link rel="icon" href="/template/img/fvc/ico-200x200.png" type="image/png" />
	<link rel="apple-touch-icon" href="/template/img/fvc/apple-touch-icon.png" type="image/png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/template/img/fvc/apple-touch-icon-ipad.png" type="image/png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/template/img/fvc/apple-touch-icon-iphone4.png" type="image/png" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />



    
 

	
	[[!MinifyX?
        &minifyCss=`1`
        &minifyJs=`1`
        &cacheFolder=`/template/min/`
        &cssSources=`
            /template/css/main.min.css
            ,/template/css/jquery.fancybox.css
            ,/template/css/slick.css
            ,/template/less/custom.less
        `
        &jsSources=`
            /template/js/slick.js
            ,/template/js/main.js
            ,/template/js/resume.js
        `
    ]]
	    
	<!-- styles -->
	[[+MinifyX.css]]
	<link rel="stylesheet" href="/template/css/all.min.css" type="text/css" />
	
    

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=ru" async defer></script>
 </head>

 <body  oncopy="return false">

	 <div class="main-bg"></div>

	<!-- Шапка сайта -->
 <header id="header">

 	<!-- Основные данные организации (микроразметка) -->
	<div itemscope="" itemtype="http://schema.org/Organization" class="d-none">
		<span itemprop="name">Applay Marine</span>

		<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
			<span itemprop="streetAddress">[[!++my_address]]</span>
			<span itemprop="addressLocality">[[!++my_city]]</span>
		</div>

		<span itemprop="telephone">[[!++my_phones]]</span>,
		<span itemprop="email">[[!++my_email]]</span>
	</div>
	<!-- /Основные данные организации (микроразметка) -->

	<div class="top-header-block">
		<div class="container max-width padding-right border-bottom-color">
			<div class="row">

				<div class="logo-block col-5 col-md-3 col-lg-2 col-xl-1">
					<!-- Логотип -->
					<div class="logotype-block text-md-center" itemscope itemtype="http://schema.org/Organization">
						<a itemprop="url" href="https://test.apply-marine.ru/" title="Applay Marine" >
							<img itemprop="logo" src="/template/img/logotype.png" title="Applay Marine" title="Applay Marine"/><br>
						</a>
					</div>
					<!-- /Логотип -->
				</div>
				
                <!-- Список основного меню -->
<nav id="main-menu" class="col-1 col-md-5 col-lg-6 col-xl-8">
	<div class="container border-bottom-color">
		<div class="bg-menu toggle-menu"></div>
		<div class="menu-block d-lg-flex justify-content-between">
			<div class="menu-container">
				<div class="main-menu__close toggle-menu d-lg-none"><i class="fas fa-times"></i></div>


[[!pdoPage?
    &parents=`0`
    &element=`Localizator`
    &snippet=`pdoMenu`
    &level=`1`
    &tpl=`@INLINE <li[[+classes]] itemprop="name"><a href="[[+link]]" [[+attributes]] itemprop="url">[[+menutitle]]</a>[[+wrapper]]</li>`
    &tplOuter=`@INLINE <ul[[+classes]] itemscope itemtype="http://www.schema.org/SiteNavigationElement">[[+wrapper]]</ul>`
    &outerClass=`main-menu__list`
    &where=`{ "template:IN" :[1,2,3,5,10]}`
]]


			</div>
		</div>
	</div>
</nav>
<!-- /Список основного меню -->
                
				<!-- Языки -->
				<div class="private-office-block col-1 col-md-1 col-xl-1 align-self-center">
                    <div class="langs">
                        {$_modx->runSnippet(\'!getLanguages\', [\'tpl\' => \'section-langs-2_2\',])}
                        
 
                        <a class="btn btn-sm" href="registracziya-kompanii.html" role="button" style="padding: 3px 10px;background: #ff5400;">Регистрация&nbsp;компании</a>
                        <a class="btn btn-sm mt-1" href="moyo-rezyume1.html" role="button" style="padding: 3px 10px;background: #ff5400;">Регистрация&nbsp;моряка</a>
                        
                    </div>
				</div>


				<!-- Личный кабинет -->
				<div class="private-office-block col-5 col-md-3 col-xl-2">
					<div class="private-office-block__content text-right">
 

                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 3px 10px;">
                            <i class="fas fa-user-circle"></i> Кабинет
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                              [[!+modx.user.username:is=`(anonymous)`:then=`<a href="avtorizacziya.html" class="dropdown-item" title="Личный кабинет" style="margin: 0;">Регистрация / Вход</a>`:else=`<a class="dropdown-item" href="lichnyij-kabinet.html" title="Профиль [[!+modx.user.username]]" style="margin: 0;">[[!+modx.user.username]]</a>`]]
                            <a class="dropdown-item" href="#" style="margin: 0;">профиль</a>
                            <a class="dropdown-item" href="#" style="margin: 0;">меню 1</a>
                            <a class="dropdown-item" href="#" style="margin: 0;">меню 2</a>
                          </div>
                        </div>

					    
						
	
					</div>
				</div>
				<!-- /Личный кабинет -->

			</div>
		</div>

	</div>

	
	
	<div class="fixed-mobile-block">
	    <ul class="d-flex justify-content-between d-lg-none">
	        <li><a href="#main-menu" class="scrollto"><img src="/upload/images/menu-ico-0.png" alt=""><span>Наверх</span></a></li>
	        <li><a href="uslugi.html"><img src="/upload/images/menu-ico-1.png" alt="Услуги"><span>Услуги</span></a></a></li>
	        <li><a href="novosti.html"><img src="/upload/images/menu-ico-2.png" alt="Новости"><span>Новости</span></a></a></li>
	        <li><a href="poisk.html"><img src="/upload/images/menu-ico-3.png" alt="Поиск"><span>Поиск</span></a></a></li>
	        <li><a href="avtorizacziya.html"><img src="/upload/images/menu-ico-4.png" alt="Войти"><span>Войти</span></a></a></li>
	    </ul>
	</div>

 </header>
 	<!-- /Шапка сайта -->

 	<!-- Основной контент сайта -->
 	<div id="content-block">

		<div class="main-content">
		    

<div class="breadcrumbs-conteiner">
    {\'Localizator\' | snippet : [
        \'snippet\' => \'pdoCrumbs\',
        \'showHome\' => 1,
        \'tplHome\' => \'@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>\',
        \'tpl\' => \'@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>\',
        \'tplCurrent\' => \'@INLINE <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">[[+menutitle]]</span><meta itemprop="position" content="[[+idx]]" /><meta itemprop="item" content="[[+link]]" /></li>\',
        \'tplWrapper\' => \'@INLINE <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">[[+output]]</ul>\',
        \'outputSeparator\' => \'&nbsp;-&nbsp;\'
    ]}
</div>

		    
		    <!-- Блок слайдера -->
            [[!ms2Gallery?
                &tplRow=`tpl.news-slider.row`
                &tplOuter=`tpl.news-slider.outer`
                &tplEmpty=`tpl.gallery.empty`
                &frontend_css=`0`
                &frontend_js=`0`
            ]]
            <!-- /Блок слайдера -->
		    
			<div class="container">
			    
			    <div class="news-list-top padding-top">
    <div class="row rows">
        [[!pdoPage?
            &element=`Localizator`
            &parents=`12`
            &depth=`0`
            &sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`
            &tpl=`tpl.news-top.item`
            &ajaxMode=`default`
            &limit=`10`
        ]]
    </div>
</div>

				<!-- Каталог услуг -->
				<div class="padding-bottom padding-top">
					<h1 class="padding-bottom">Новости</h1>
					    
				    <div id="pdopage" class="news-list catalog-news">
    [[!+page.nav:is=`<ul></ul>`:then=``:else=`[[!+page.nav]]`]]
    <div class="row rows">
        [[!pdoPage?
            &element=`Localizator`
            &parents=`12`
            &depth=`0`
            &sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`
            &tpl=`tpl.news.item`
            &includeTVs=`tvimage`
            &tvPrefix=`tv.`
            &prepareTVs=`0`
            &ajaxMode=`default`
            &limit=`10`
        ]]
    </div>
    [[!+page.nav:is=`<ul></ul>`:then=``:else=`[[!+page.nav]]`]]
</div>
				    
				    {$_modx->resource.localizator_content}
					
				</div>
				<!-- /Каталог услуг -->
				
				

			</div>

		</div>
		
		<!-- Блок с формой -->
			<div class="form-container black-bg padding-bottom padding-top [[!+modx.user.username:ne=`(anonymous)`:then=`d-none`:else=``]]">

				<div class="container">
					<div class="row">

						<div class="col-12 col-sm-6 col-lg-6 col-xl-8 form-block__description padding-bottom">
							<h2 class="h1-size border-bottom">Регистрируйтесь и получайте больше возможностей!</h2>
							<p>Вы можете быть в курсе последних новостей! Общаться и делиться своим опытом на форуме! Будете получать обратную связь от работодателей!</p>
						</div>

						<div class="col-12 col-sm-6 col-lg-6 col-xl-4 form-block__form">

							<div class="form-block__form-content">
								[[!officeAuth?
                                    &groups=`Users`
                                ]]
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- Блок с формой -->
		
 	</div>
 	<!-- Основной контент сайта -->

 	

<!-- Подвал сайта -->
 <footer class="padding-top padding-bottom">
	<div class="container">
		<div class="row">

			<div class="footer-block col-12 col-sm-4">
				<img src="/template/img/logotype-white.png" alt="">
			</div>
			<div class="footer-block footer-menu col-12 col-sm-8">
                [[!pdoPage?
                    &element=`Localizator`
                    &snippet=`pdoMenu`
                    &parents=`0`
                    &resources=`-17`
                    &level=`1`
                    &tpl=`@INLINE <li><a href="[[+link]]">[[+menutitle]]</a></li>`
                    &tplOuter=`@INLINE <ul>[[+wrapper]]</ul>`
                ]]
				<a href="#main-menu" class="scrollto">Наверх <i class="fas fa-caret-up"></i></a>
			</div>
			<div class="footer-block col-12 col-sm-7">
				<p>© apply-marine.ru, [[!+nowdate:default=`now`:strtotime:date=`%Y`]] <br>
				ООО "АППЛАЙ-МАРИН"<br> ИНН 2315222071, ОГРН 1212300049873</p>
			</div>
			<div class="footer-block col-12 col-sm-5 text-lg-right">
				<i class="fas fa-phone-alt"></i> [[!phoneGeneratorLinks? &tvparam=`[[!++my_phones]]` &outerPhone=`1` &brOn=``]]
				[[!socialLinks? &links=`facebook,ok,instagram` &colored=`0` &phone=``]]
			</div>
			<div class="footer-block footer-menu col-12 text-center">
				<ul class="">
					<li><a href="usloviya-peredachi-informaczii.html">Согласие на обработку данных</a></li>
					<li><a href="">Служба поддержки</a></li>
					<li><a href="">Политика конфиденциальности</a></li>
				</ul>
				[[!++my_metrics]]
			</div>
			<div class="footer-block col-12">
				<div class="create-block">
					<div class="creator">
						<span>Created in</span>
						<a href="https://www.smartline93.ru" class="logo"><img src="/upload/images/smart-logo.png" alt=""></a>
						<a class="creator-link" href="https://www.smartline93.ru" >www.smartline93.ru</a>
					</div>
				</div>
			</div>

		</div>
	</div>
 </footer>
<!-- /Подвал сайта -->
 	
 	<!-- Подключаемые скрипты -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<script src="/template/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/vendor/jquery.fancybox.min.js"></script>



<script src="/template/js/bootstrap/dropdown.js"></script>
    
    
[[!++my_scripts]]
<script src="/template/js/wow.min.js"></script>
[[+MinifyX.javascript]]



<script>
    new WOW().init();
</script>
    
<!-- [^t^], [^q^], [^qt^] -->

 </body>
 </html>',
    '_isForward' => false,
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '.html',
    'headers' => NULL,
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'elementCache' => 
  array (
    '[[$HEAD]]' => '<head>
    <!-- meta -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Новости | [[!++my_metaTail]]</title>
	<meta name="description" content="Новости" />
	<meta name="keywords" content="Новости" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	[[!++my_metategs]]
	<meta name="robots" content="all"/>
	<base href="[[!++site_url]]">
	
	<meta property="og:title" content="Новости">
    <meta property="og:description" content="Новости">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://test.apply-marine.ru/novosti">
    <meta property="og:image" content="https://test.apply-marine.ru/templates/img/logotype.jpg">
    <meta property="og:site_name" content="Applay Marine">
    <meta property="og:locale" content="UTF-8">
        
    

	<!-- icons -->
	<link rel="icon" href="/template/img/fvc/ico-200x200.png" type="image/png" />
	<link rel="apple-touch-icon" href="/template/img/fvc/apple-touch-icon.png" type="image/png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/template/img/fvc/apple-touch-icon-ipad.png" type="image/png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/template/img/fvc/apple-touch-icon-iphone4.png" type="image/png" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />



    
 

	
	[[!MinifyX?
        &minifyCss=`1`
        &minifyJs=`1`
        &cacheFolder=`/template/min/`
        &cssSources=`
            /template/css/main.min.css
            ,/template/css/jquery.fancybox.css
            ,/template/css/slick.css
            ,/template/less/custom.less
        `
        &jsSources=`
            /template/js/slick.js
            ,/template/js/main.js
            ,/template/js/resume.js
        `
    ]]
	    
	<!-- styles -->
	[[+MinifyX.css]]
	<link rel="stylesheet" href="/template/css/all.min.css" type="text/css" />
	
    

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=ru" async defer></script>
 </head>',
    '[[$MAIN-MENU]]' => '<!-- Список основного меню -->
<nav id="main-menu" class="col-1 col-md-5 col-lg-6 col-xl-8">
	<div class="container border-bottom-color">
		<div class="bg-menu toggle-menu"></div>
		<div class="menu-block d-lg-flex justify-content-between">
			<div class="menu-container">
				<div class="main-menu__close toggle-menu d-lg-none"><i class="fas fa-times"></i></div>


[[!pdoPage?
    &parents=`0`
    &element=`Localizator`
    &snippet=`pdoMenu`
    &level=`1`
    &tpl=`@INLINE <li[[+classes]] itemprop="name"><a href="[[+link]]" [[+attributes]] itemprop="url">[[+menutitle]]</a>[[+wrapper]]</li>`
    &tplOuter=`@INLINE <ul[[+classes]] itemscope itemtype="http://www.schema.org/SiteNavigationElement">[[+wrapper]]</ul>`
    &outerClass=`main-menu__list`
    &where=`{ "template:IN" :[1,2,3,5,10]}`
]]


			</div>
		</div>
	</div>
</nav>
<!-- /Список основного меню -->',
    '[[$SLIDER]]' => '<!-- Блок слайдера -->
<div class="slider-block">
	<div class="slider main-slider">
	    [[!BannerY? &position=`1` &tpl=`tpl.main-slider.row` &sortby=`idx`]]
	</div>
</div>
<!-- /Блок слайдера -->',
    '[[$HEADER]]' => '<!-- Шапка сайта -->
 <header id="header">

 	<!-- Основные данные организации (микроразметка) -->
	<div itemscope="" itemtype="http://schema.org/Organization" class="d-none">
		<span itemprop="name">Applay Marine</span>

		<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
			<span itemprop="streetAddress">[[!++my_address]]</span>
			<span itemprop="addressLocality">[[!++my_city]]</span>
		</div>

		<span itemprop="telephone">[[!++my_phones]]</span>,
		<span itemprop="email">[[!++my_email]]</span>
	</div>
	<!-- /Основные данные организации (микроразметка) -->

	<div class="top-header-block">
		<div class="container max-width padding-right border-bottom-color">
			<div class="row">

				<div class="logo-block col-5 col-md-3 col-lg-2 col-xl-1">
					<!-- Логотип -->
					<div class="logotype-block text-md-center" itemscope itemtype="http://schema.org/Organization">
						<a itemprop="url" href="https://test.apply-marine.ru/" title="Applay Marine" >
							<img itemprop="logo" src="/template/img/logotype.png" title="Applay Marine" title="Applay Marine"/><br>
						</a>
					</div>
					<!-- /Логотип -->
				</div>
				
                <!-- Список основного меню -->
<nav id="main-menu" class="col-1 col-md-5 col-lg-6 col-xl-8">
	<div class="container border-bottom-color">
		<div class="bg-menu toggle-menu"></div>
		<div class="menu-block d-lg-flex justify-content-between">
			<div class="menu-container">
				<div class="main-menu__close toggle-menu d-lg-none"><i class="fas fa-times"></i></div>


[[!pdoPage?
    &parents=`0`
    &element=`Localizator`
    &snippet=`pdoMenu`
    &level=`1`
    &tpl=`@INLINE <li[[+classes]] itemprop="name"><a href="[[+link]]" [[+attributes]] itemprop="url">[[+menutitle]]</a>[[+wrapper]]</li>`
    &tplOuter=`@INLINE <ul[[+classes]] itemscope itemtype="http://www.schema.org/SiteNavigationElement">[[+wrapper]]</ul>`
    &outerClass=`main-menu__list`
    &where=`{ "template:IN" :[1,2,3,5,10]}`
]]


			</div>
		</div>
	</div>
</nav>
<!-- /Список основного меню -->
                
				<!-- Языки -->
				<div class="private-office-block col-1 col-md-1 col-xl-1 align-self-center">
                    <div class="langs">
                        {$_modx->runSnippet(\'!getLanguages\', [\'tpl\' => \'section-langs-2_2\',])}
                        
 
                        <a class="btn btn-sm" href="registracziya-kompanii.html" role="button" style="padding: 3px 10px;background: #ff5400;">Регистрация&nbsp;компании</a>
                        <a class="btn btn-sm mt-1" href="moyo-rezyume1.html" role="button" style="padding: 3px 10px;background: #ff5400;">Регистрация&nbsp;моряка</a>
                        
                    </div>
				</div>


				<!-- Личный кабинет -->
				<div class="private-office-block col-5 col-md-3 col-xl-2">
					<div class="private-office-block__content text-right">
 

                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 3px 10px;">
                            <i class="fas fa-user-circle"></i> Кабинет
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                              [[!+modx.user.username:is=`(anonymous)`:then=`<a href="avtorizacziya.html" class="dropdown-item" title="Личный кабинет" style="margin: 0;">Регистрация / Вход</a>`:else=`<a class="dropdown-item" href="lichnyij-kabinet.html" title="Профиль [[!+modx.user.username]]" style="margin: 0;">[[!+modx.user.username]]</a>`]]
                            <a class="dropdown-item" href="#" style="margin: 0;">профиль</a>
                            <a class="dropdown-item" href="#" style="margin: 0;">меню 1</a>
                            <a class="dropdown-item" href="#" style="margin: 0;">меню 2</a>
                          </div>
                        </div>

					    
						
	
					</div>
				</div>
				<!-- /Личный кабинет -->

			</div>
		</div>

	</div>

	
	
	<div class="fixed-mobile-block">
	    <ul class="d-flex justify-content-between d-lg-none">
	        <li><a href="#main-menu" class="scrollto"><img src="/upload/images/menu-ico-0.png" alt=""><span>Наверх</span></a></li>
	        <li><a href="uslugi.html"><img src="/upload/images/menu-ico-1.png" alt="Услуги"><span>Услуги</span></a></a></li>
	        <li><a href="novosti.html"><img src="/upload/images/menu-ico-2.png" alt="Новости"><span>Новости</span></a></a></li>
	        <li><a href="poisk.html"><img src="/upload/images/menu-ico-3.png" alt="Поиск"><span>Поиск</span></a></a></li>
	        <li><a href="avtorizacziya.html"><img src="/upload/images/menu-ico-4.png" alt="Войти"><span>Войти</span></a></a></li>
	    </ul>
	</div>

 </header>
 	<!-- /Шапка сайта -->',
    '[[$BREADCRUMBS]]' => '

<div class="breadcrumbs-conteiner">
    {\'Localizator\' | snippet : [
        \'snippet\' => \'pdoCrumbs\',
        \'showHome\' => 1,
        \'tplHome\' => \'@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>\',
        \'tpl\' => \'@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>\',
        \'tplCurrent\' => \'@INLINE <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">[[+menutitle]]</span><meta itemprop="position" content="[[+idx]]" /><meta itemprop="item" content="[[+link]]" /></li>\',
        \'tplWrapper\' => \'@INLINE <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">[[+output]]</ul>\',
        \'outputSeparator\' => \'&nbsp;-&nbsp;\'
    ]}
</div>
',
    '[[$NEWS.top]]' => '<div class="news-list-top padding-top">
    <div class="row rows">
        [[!pdoPage?
            &element=`Localizator`
            &parents=`12`
            &depth=`0`
            &sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`
            &tpl=`tpl.news-top.item`
            &ajaxMode=`default`
            &limit=`10`
        ]]
    </div>
</div>',
    '[[$NEWS.page]]' => '<div id="pdopage" class="news-list catalog-news">
    [[!+page.nav:is=`<ul></ul>`:then=``:else=`[[!+page.nav]]`]]
    <div class="row rows">
        [[!pdoPage?
            &element=`Localizator`
            &parents=`12`
            &depth=`0`
            &sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`
            &tpl=`tpl.news.item`
            &includeTVs=`tvimage`
            &tvPrefix=`tv.`
            &prepareTVs=`0`
            &ajaxMode=`default`
            &limit=`10`
        ]]
    </div>
    [[!+page.nav:is=`<ul></ul>`:then=``:else=`[[!+page.nav]]`]]
</div>',
    '[[$AUTHORISATION]]' => '<!-- Блок с формой -->
			<div class="form-container black-bg padding-bottom padding-top [[!+modx.user.username:ne=`(anonymous)`:then=`d-none`:else=``]]">

				<div class="container">
					<div class="row">

						<div class="col-12 col-sm-6 col-lg-6 col-xl-8 form-block__description padding-bottom">
							<h2 class="h1-size border-bottom">Регистрируйтесь и получайте больше возможностей!</h2>
							<p>Вы можете быть в курсе последних новостей! Общаться и делиться своим опытом на форуме! Будете получать обратную связь от работодателей!</p>
						</div>

						<div class="col-12 col-sm-6 col-lg-6 col-xl-4 form-block__form">

							<div class="form-block__form-content">
								[[!officeAuth?
                                    &groups=`Users`
                                ]]
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- Блок с формой -->',
    '[[$FOOTER]]' => '

<!-- Подвал сайта -->
 <footer class="padding-top padding-bottom">
	<div class="container">
		<div class="row">

			<div class="footer-block col-12 col-sm-4">
				<img src="/template/img/logotype-white.png" alt="">
			</div>
			<div class="footer-block footer-menu col-12 col-sm-8">
                [[!pdoPage?
                    &element=`Localizator`
                    &snippet=`pdoMenu`
                    &parents=`0`
                    &resources=`-17`
                    &level=`1`
                    &tpl=`@INLINE <li><a href="[[+link]]">[[+menutitle]]</a></li>`
                    &tplOuter=`@INLINE <ul>[[+wrapper]]</ul>`
                ]]
				<a href="#main-menu" class="scrollto">Наверх <i class="fas fa-caret-up"></i></a>
			</div>
			<div class="footer-block col-12 col-sm-7">
				<p>© apply-marine.ru, [[!+nowdate:default=`now`:strtotime:date=`%Y`]] <br>
				ООО "АППЛАЙ-МАРИН"<br> ИНН 2315222071, ОГРН 1212300049873</p>
			</div>
			<div class="footer-block col-12 col-sm-5 text-lg-right">
				<i class="fas fa-phone-alt"></i> [[!phoneGeneratorLinks? &tvparam=`[[!++my_phones]]` &outerPhone=`1` &brOn=``]]
				[[!socialLinks? &links=`facebook,ok,instagram` &colored=`0` &phone=``]]
			</div>
			<div class="footer-block footer-menu col-12 text-center">
				<ul class="">
					<li><a href="usloviya-peredachi-informaczii.html">Согласие на обработку данных</a></li>
					<li><a href="">Служба поддержки</a></li>
					<li><a href="">Политика конфиденциальности</a></li>
				</ul>
				[[!++my_metrics]]
			</div>
			<div class="footer-block col-12">
				<div class="create-block">
					<div class="creator">
						<span>Created in</span>
						<a href="https://www.smartline93.ru" class="logo"><img src="/upload/images/smart-logo.png" alt=""></a>
						<a class="creator-link" href="https://www.smartline93.ru" >www.smartline93.ru</a>
					</div>
				</div>
			</div>

		</div>
	</div>
 </footer>
<!-- /Подвал сайта -->',
    '[[$SCRIPTS]]' => '<!-- Подключаемые скрипты -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<script src="/template/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/vendor/jquery.fancybox.min.js"></script>



<script src="/template/js/bootstrap/dropdown.js"></script>
    
    
[[!++my_scripts]]
<script src="/template/js/wow.min.js"></script>
[[+MinifyX.javascript]]



<script>
    new WOW().init();
</script>
    
<!-- [^t^], [^q^], [^qt^] -->',
    '[[Localizator?snippet=`pdoCrumbs`&class=`modResource`&localizator_key=``&showHome=`1`&tplHome=`@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>`&tpl=`@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>`&tplCurrent=`@INLINE <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">[[+menutitle]]</span><meta itemprop="position" content="[[+idx]]" /><meta itemprop="item" content="[[+link]]" /></li>`&tplWrapper=`@INLINE <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">[[+output]]</ul>`&outputSeparator=`&nbsp;-&nbsp;`]]' => '<ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList"><li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="/" itemprop="item"><span itemprop="name">Главная</span></a><meta itemprop="position" content="1" /></li>&nbsp;-&nbsp;<li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">Новости</span><meta itemprop="position" content="2" /><meta itemprop="item" content="novosti.html" /></li></ul>',
    '[[Localizator?snippet=`pdoMenu`&class=`modResource`&localizator_key=``&plPrefix=``&limit=`10`&maxLimit=`100`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`page.total`&pageLimit=`5`&element=`Localizator`&pageNavVar=`page.nav`&pageCountVar=`pageCount`&pageLinkScheme=``&tplPage=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>`&tplPageWrapper=`@INLINE <ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul>`&tplPageActive=`@INLINE <li class="page-item active"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>`&tplPageFirst=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_first]]</a></li>`&tplPageLast=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_last]]</a></li>`&tplPagePrev=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&laquo;</a></li>`&tplPageNext=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&raquo;</a></li>`&tplPageSkip=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">...</a></li>`&tplPageFirstEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_first]]</a></li>`&tplPageLastEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_last]]</a></li>`&tplPagePrevEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>`&tplPageNextEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>`&cache=``&cacheTime=`3600`&cacheAnonymous=``&toPlaceholder=``&ajax=``&ajaxMode=``&ajaxElemWrapper=`#pdopage`&ajaxElemRows=`#pdopage .rows`&ajaxElemPagination=`#pdopage .pagination`&ajaxElemLink=`#pdopage .pagination a`&ajaxElemMore=`#pdopage .btn-more`&ajaxTplMore=`@INLINE <button class="btn btn-primary btn-more">[[%pdopage_more]]</button>`&ajaxHistory=``&setMeta=`1`&strictMode=`1`&parents=`0`&level=`1`&tpl=`@INLINE <li[[+classes]] itemprop="name"><a href="[[+link]]" [[+attributes]] itemprop="url">[[+menutitle]]</a>[[+wrapper]]</li>`&tplOuter=`@INLINE <ul[[+classes]] itemscope itemtype="http://www.schema.org/SiteNavigationElement">[[+wrapper]]</ul>`&outerClass=`main-menu__list`&where=`{ "template:IN" :[1,2,3,5,10]}`&request=`62c9782eb045cee0d4e5791a5164c241`&setTotal=`1`]]' => '<ul class="main-menu__list" itemscope itemtype="http://www.schema.org/SiteNavigationElement"><li class="first" itemprop="name"><a href="vakansii.html"  itemprop="url">Вакансии</a></li><li itemprop="name"><a href="rezyume.html"  itemprop="url">Резюме</a></li><li itemprop="name"><a href="uslugi.html"  itemprop="url">Морякам</a></li><li itemprop="name"><a href="uslugi-dlya-kompanii.html"  itemprop="url">Компаниям</a></li><li itemprop="name"><a href="turyi.html"  itemprop="url">Туры</a></li><li itemprop="name"><a href="konferenczii.html"  itemprop="url">Конференции</a></li><li class="active" itemprop="name"><a href="novosti.html"  itemprop="url">Новости</a></li><li class="last" itemprop="name"><a href="kontaktyi.html"  itemprop="url">Контакты</a></li></ul>',
    '[[Localizator?snippet=`pdoResources`&class=`modResource`&localizator_key=``&plPrefix=``&limit=`10`&maxLimit=`100`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`page.total`&pageLimit=`5`&element=`Localizator`&pageNavVar=`page.nav`&pageCountVar=`pageCount`&pageLinkScheme=``&tplPage=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>`&tplPageWrapper=`@INLINE <ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul>`&tplPageActive=`@INLINE <li class="page-item active"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>`&tplPageFirst=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_first]]</a></li>`&tplPageLast=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_last]]</a></li>`&tplPagePrev=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&laquo;</a></li>`&tplPageNext=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&raquo;</a></li>`&tplPageSkip=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">...</a></li>`&tplPageFirstEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_first]]</a></li>`&tplPageLastEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_last]]</a></li>`&tplPagePrevEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>`&tplPageNextEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>`&cache=``&cacheTime=`3600`&cacheAnonymous=``&toPlaceholder=``&ajax=`1`&ajaxMode=`default`&ajaxElemWrapper=`#pdopage`&ajaxElemRows=`#pdopage .rows`&ajaxElemPagination=`#pdopage .pagination`&ajaxElemLink=`#pdopage .pagination a`&ajaxElemMore=`#pdopage .btn-more`&ajaxTplMore=`@INLINE <button class="btn btn-primary btn-more">[[%pdopage_more]]</button>`&ajaxHistory=``&setMeta=`1`&strictMode=`1`&parents=`12`&depth=`0`&sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`&tpl=`tpl.news-top.item`&request=`0eb5c885e83b0a0459084824d5df7555`&setTotal=`1`]]' => '<div class="news-list__item col-12 col-md-6 col-lg-3">
	<div class="news-list__item-content">
		<div class="row">
			<div class="news-list__text col-12">
				<div class="news-list__text-area padding-bottom-small">
					<a href="xoroshaya-novost-dlya-sudovyix-mexanikov-i-elektromexanikov.html" title="Сертификат DP Maintenance">Сертификат DP Maintenance</a>
				</div>
				
				<div class="news-base-data news-element">
	                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.99967 1.33331C4.32367 1.33331 1.33301 4.32398 1.33301 7.99998C1.33301 11.676 4.32367 14.6666 7.99967 14.6666C11.6757 14.6666 14.6663 11.676 14.6663 7.99998C14.6663 4.32398 11.6757 1.33331 7.99967 1.33331ZM7.99967 13.3333C5.05901 13.3333 2.66634 10.9406 2.66634 7.99998C2.66634 5.05931 5.05901 2.66665 7.99967 2.66665C10.9403 2.66665 13.333 5.05931 13.333 7.99998C13.333 10.9406 10.9403 13.3333 7.99967 13.3333Z" fill="#BDBDBD"/>
                        <path d="M8.66634 4.66669H7.33301V8.27602L9.52834 10.4714L10.471 9.52869L8.66634 7.72402V4.66669Z" fill="#BDBDBD"/>
                    </svg>
                    <span>09:32 01.11.2021</span>
                    
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.60206 8C2.64661 8.0764 2.69971 8.1642 2.7614 8.261C2.99508 8.62771 3.34734 9.11624 3.81944 9.60264C4.76622 10.5781 6.14694 11.5 8 11.5C9.85306 11.5 11.2338 10.5781 12.1806 9.60264C12.6527 9.11624 13.0049 8.62771 13.2386 8.261C13.3003 8.1642 13.3534 8.0764 13.3979 8C13.3534 7.9236 13.3003 7.8358 13.2386 7.739C13.0049 7.37229 12.6527 6.88376 12.1806 6.39736C11.2338 5.42188 9.85306 4.5 8 4.5C6.14694 4.5 4.76622 5.42188 3.81944 6.39736C3.34734 6.88376 2.99508 7.37229 2.7614 7.739C2.69971 7.8358 2.64661 7.9236 2.60206 8ZM14.25 8C14.9286 7.68065 14.9285 7.68036 14.9283 7.68006L14.9272 7.6777L14.9251 7.67318L14.9185 7.65958C14.9131 7.64852 14.9057 7.63349 14.8963 7.61476C14.8774 7.57732 14.8504 7.52502 14.8151 7.45999C14.7447 7.33004 14.6411 7.14863 14.5036 6.93288C14.2295 6.50271 13.8161 5.92874 13.2569 5.35264C12.1412 4.20312 10.3969 3 8 3C5.60306 3 3.85878 4.20312 2.74306 5.35264C2.18391 5.92874 1.77055 6.50271 1.49642 6.93288C1.35893 7.14863 1.2553 7.33004 1.18487 7.45999C1.14962 7.52502 1.1226 7.57732 1.10373 7.61476C1.09429 7.63349 1.08689 7.64852 1.0815 7.65958L1.07493 7.67318L1.07278 7.6777L1.07199 7.67937C1.07185 7.67967 1.07139 7.68065 1.75 8L1.07139 7.68065C0.976205 7.88291 0.976205 8.11709 1.07139 8.31935L1.75 8C1.07139 8.31935 1.07124 8.31904 1.07139 8.31935L1.07199 8.32063L1.07278 8.3223L1.07493 8.32682L1.0815 8.34042C1.08689 8.35148 1.09429 8.36651 1.10373 8.38524C1.1226 8.42268 1.14962 8.47498 1.18487 8.54001C1.2553 8.66996 1.35893 8.85137 1.49642 9.06712C1.77055 9.49729 2.18391 10.0713 2.74306 10.6474C3.85878 11.7969 5.60306 13 8 13C10.3969 13 12.1412 11.7969 13.2569 10.6474C13.8161 10.0713 14.2295 9.49729 14.5036 9.06712C14.6411 8.85137 14.7447 8.66996 14.8151 8.54001C14.8504 8.47498 14.8774 8.42268 14.8963 8.38524C14.9057 8.36651 14.9131 8.35148 14.9185 8.34042L14.9251 8.32682L14.9272 8.3223L14.928 8.32063C14.9282 8.32033 14.9286 8.31935 14.25 8ZM14.25 8L14.9286 8.31935C15.0238 8.11709 15.0235 7.88232 14.9283 7.68006L14.25 8ZM2.428 7.67934C2.42789 7.67913 2.42786 7.67906 2.428 7.67934ZM2.42795 8.32076C2.42781 8.32104 2.42785 8.32097 2.42795 8.32076Z" fill="#BDBDBD"/>
                        <path d="M8 9.5C8.82843 9.5 9.5 8.82843 9.5 8C9.5 7.17157 8.82843 6.5 8 6.5C7.17157 6.5 6.5 7.17157 6.5 8C6.5 8.82843 7.17157 9.5 8 9.5Z" fill="#BDBDBD"/>
                    </svg>
                    <span>123</span>
                    
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.333 1.33331H2.66634C1.93101 1.33331 1.33301 1.93131 1.33301 2.66665V14.6666L4.88834 12H13.333C14.0683 12 14.6663 11.402 14.6663 10.6666V2.66665C14.6663 1.93131 14.0683 1.33331 13.333 1.33331ZM13.333 10.6666H4.44434L2.66634 12V2.66665H13.333V10.6666Z" fill="#BDBDBD"/>
                    </svg>
                    <span>345</span>
                    
                    
	            </div>
				
				<a href="xoroshaya-novost-dlya-sudovyix-mexanikov-i-elektromexanikov.html" class="">Читать далее <i class="fas fa-arrow-right"></i></a>
			</div>
		</div>
	</div>
</div>',
    '[[Localizator?snippet=`pdoResources`&class=`modResource`&localizator_key=``&plPrefix=``&limit=`10`&maxLimit=`100`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`page.total`&pageLimit=`5`&element=`Localizator`&pageNavVar=`page.nav`&pageCountVar=`pageCount`&pageLinkScheme=``&tplPage=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>`&tplPageWrapper=`@INLINE <ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul>`&tplPageActive=`@INLINE <li class="page-item active"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>`&tplPageFirst=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_first]]</a></li>`&tplPageLast=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_last]]</a></li>`&tplPagePrev=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&laquo;</a></li>`&tplPageNext=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&raquo;</a></li>`&tplPageSkip=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">...</a></li>`&tplPageFirstEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_first]]</a></li>`&tplPageLastEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_last]]</a></li>`&tplPagePrevEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>`&tplPageNextEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>`&cache=``&cacheTime=`3600`&cacheAnonymous=``&toPlaceholder=``&ajax=`1`&ajaxMode=`default`&ajaxElemWrapper=`#pdopage`&ajaxElemRows=`#pdopage .rows`&ajaxElemPagination=`#pdopage .pagination`&ajaxElemLink=`#pdopage .pagination a`&ajaxElemMore=`#pdopage .btn-more`&ajaxTplMore=`@INLINE <button class="btn btn-primary btn-more">[[%pdopage_more]]</button>`&ajaxHistory=``&setMeta=`1`&strictMode=`1`&parents=`12`&depth=`0`&sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`&tpl=`tpl.news.item`&includeTVs=`tvimage`&tvPrefix=`tv.`&prepareTVs=`0`&request=`87831964f7fa1a612ba54e7a6db7d4cd`&setTotal=`1`]]' => '<div class="news-list__item col-12">
	<div class="news-list__item-content">
		<div class="row">
			<div class="news-list__img col-12 col-sm-4 col-md-3 col-lg-2">
				<a href="xoroshaya-novost-dlya-sudovyix-mexanikov-i-elektromexanikov.html" class="item-img" title="Сертификат DP Maintenance">
                    <img src="/assets/cache_image/upload/images/news/novost-01_200x200_d52.jpg" title="Сертификат DP Maintenance" al="Сертификат DP Maintenance">
                </a>
			</div>
			<div class="news-list__text col-12 col-sm-8 col-md-9 col-lg-10">
			    
				<div class="news-list__text-area padding-bottom-small">
					<h4 class="border-bottom">Сертификат DP Maintenance</h4>
					<p>Хорошая новость для судовых механиков и электромехаников. Теперь обучение по курсу DP MAINTENANCE можно пройти не только в Макаровке или в УТЦ Навис в Санкт-Петербурге, но и в Москве, в УТЦ Морспасслужбы. Курсы проводятся с сентября 2021. Пока только для механиков и электромехаников.</p>
				</div>
				
				<div class="news-base-data news-element">
	                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.99967 1.33331C4.32367 1.33331 1.33301 4.32398 1.33301 7.99998C1.33301 11.676 4.32367 14.6666 7.99967 14.6666C11.6757 14.6666 14.6663 11.676 14.6663 7.99998C14.6663 4.32398 11.6757 1.33331 7.99967 1.33331ZM7.99967 13.3333C5.05901 13.3333 2.66634 10.9406 2.66634 7.99998C2.66634 5.05931 5.05901 2.66665 7.99967 2.66665C10.9403 2.66665 13.333 5.05931 13.333 7.99998C13.333 10.9406 10.9403 13.3333 7.99967 13.3333Z" fill="#BDBDBD"/>
                        <path d="M8.66634 4.66669H7.33301V8.27602L9.52834 10.4714L10.471 9.52869L8.66634 7.72402V4.66669Z" fill="#BDBDBD"/>
                    </svg>
                    <span>09:32 01.11.2021</span>
                    
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.60206 8C2.64661 8.0764 2.69971 8.1642 2.7614 8.261C2.99508 8.62771 3.34734 9.11624 3.81944 9.60264C4.76622 10.5781 6.14694 11.5 8 11.5C9.85306 11.5 11.2338 10.5781 12.1806 9.60264C12.6527 9.11624 13.0049 8.62771 13.2386 8.261C13.3003 8.1642 13.3534 8.0764 13.3979 8C13.3534 7.9236 13.3003 7.8358 13.2386 7.739C13.0049 7.37229 12.6527 6.88376 12.1806 6.39736C11.2338 5.42188 9.85306 4.5 8 4.5C6.14694 4.5 4.76622 5.42188 3.81944 6.39736C3.34734 6.88376 2.99508 7.37229 2.7614 7.739C2.69971 7.8358 2.64661 7.9236 2.60206 8ZM14.25 8C14.9286 7.68065 14.9285 7.68036 14.9283 7.68006L14.9272 7.6777L14.9251 7.67318L14.9185 7.65958C14.9131 7.64852 14.9057 7.63349 14.8963 7.61476C14.8774 7.57732 14.8504 7.52502 14.8151 7.45999C14.7447 7.33004 14.6411 7.14863 14.5036 6.93288C14.2295 6.50271 13.8161 5.92874 13.2569 5.35264C12.1412 4.20312 10.3969 3 8 3C5.60306 3 3.85878 4.20312 2.74306 5.35264C2.18391 5.92874 1.77055 6.50271 1.49642 6.93288C1.35893 7.14863 1.2553 7.33004 1.18487 7.45999C1.14962 7.52502 1.1226 7.57732 1.10373 7.61476C1.09429 7.63349 1.08689 7.64852 1.0815 7.65958L1.07493 7.67318L1.07278 7.6777L1.07199 7.67937C1.07185 7.67967 1.07139 7.68065 1.75 8L1.07139 7.68065C0.976205 7.88291 0.976205 8.11709 1.07139 8.31935L1.75 8C1.07139 8.31935 1.07124 8.31904 1.07139 8.31935L1.07199 8.32063L1.07278 8.3223L1.07493 8.32682L1.0815 8.34042C1.08689 8.35148 1.09429 8.36651 1.10373 8.38524C1.1226 8.42268 1.14962 8.47498 1.18487 8.54001C1.2553 8.66996 1.35893 8.85137 1.49642 9.06712C1.77055 9.49729 2.18391 10.0713 2.74306 10.6474C3.85878 11.7969 5.60306 13 8 13C10.3969 13 12.1412 11.7969 13.2569 10.6474C13.8161 10.0713 14.2295 9.49729 14.5036 9.06712C14.6411 8.85137 14.7447 8.66996 14.8151 8.54001C14.8504 8.47498 14.8774 8.42268 14.8963 8.38524C14.9057 8.36651 14.9131 8.35148 14.9185 8.34042L14.9251 8.32682L14.9272 8.3223L14.928 8.32063C14.9282 8.32033 14.9286 8.31935 14.25 8ZM14.25 8L14.9286 8.31935C15.0238 8.11709 15.0235 7.88232 14.9283 7.68006L14.25 8ZM2.428 7.67934C2.42789 7.67913 2.42786 7.67906 2.428 7.67934ZM2.42795 8.32076C2.42781 8.32104 2.42785 8.32097 2.42795 8.32076Z" fill="#BDBDBD"/>
                        <path d="M8 9.5C8.82843 9.5 9.5 8.82843 9.5 8C9.5 7.17157 8.82843 6.5 8 6.5C7.17157 6.5 6.5 7.17157 6.5 8C6.5 8.82843 7.17157 9.5 8 9.5Z" fill="#BDBDBD"/>
                    </svg>
                    <span>123</span>
                    
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.333 1.33331H2.66634C1.93101 1.33331 1.33301 1.93131 1.33301 2.66665V14.6666L4.88834 12H13.333C14.0683 12 14.6663 11.402 14.6663 10.6666V2.66665C14.6663 1.93131 14.0683 1.33331 13.333 1.33331ZM13.333 10.6666H4.44434L2.66634 12V2.66665H13.333V10.6666Z" fill="#BDBDBD"/>
                    </svg>
                    <span>345</span>
                    
                    <a href="xoroshaya-novost-dlya-sudovyix-mexanikov-i-elektromexanikov.html" class="btn gray-btn">Читать далее <i class="fas fa-arrow-right"></i></a>
	            </div>
				
				
			</div>
		</div>
	</div>
</div>',
    '[[Localizator?snippet=`pdoMenu`&class=`modResource`&localizator_key=``&plPrefix=``&limit=`10`&maxLimit=`100`&offset=`0`&page=`1`&pageVarKey=`page`&totalVar=`page.total`&pageLimit=`5`&element=`Localizator`&pageNavVar=`page.nav`&pageCountVar=`pageCount`&pageLinkScheme=``&tplPage=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>`&tplPageWrapper=`@INLINE <ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul>`&tplPageActive=`@INLINE <li class="page-item active"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>`&tplPageFirst=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_first]]</a></li>`&tplPageLast=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_last]]</a></li>`&tplPagePrev=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&laquo;</a></li>`&tplPageNext=`@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&raquo;</a></li>`&tplPageSkip=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">...</a></li>`&tplPageFirstEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_first]]</a></li>`&tplPageLastEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_last]]</a></li>`&tplPagePrevEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>`&tplPageNextEmpty=`@INLINE <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>`&cache=``&cacheTime=`3600`&cacheAnonymous=``&toPlaceholder=``&ajax=``&ajaxMode=``&ajaxElemWrapper=`#pdopage`&ajaxElemRows=`#pdopage .rows`&ajaxElemPagination=`#pdopage .pagination`&ajaxElemLink=`#pdopage .pagination a`&ajaxElemMore=`#pdopage .btn-more`&ajaxTplMore=`@INLINE <button class="btn btn-primary btn-more">[[%pdopage_more]]</button>`&ajaxHistory=``&setMeta=`1`&strictMode=`1`&parents=`0`&resources=`-17`&level=`1`&tpl=`@INLINE <li><a href="[[+link]]">[[+menutitle]]</a></li>`&tplOuter=`@INLINE <ul>[[+wrapper]]</ul>`&request=`f5cca9d3bdea56c10e9f7d033b9462fb`&setTotal=`1`]]' => '<ul><li><a href="vakansii.html">Вакансии</a></li><li><a href="rezyume.html">Резюме</a></li><li><a href="uslugi.html">Морякам</a></li><li><a href="uslugi-dlya-kompanii.html">Компаниям</a></li><li><a href="turyi.html">Туры</a></li><li><a href="konferenczii.html">Конференции</a></li><li><a href="novosti.html">Новости</a></li></ul>',
  ),
  'sourceCache' => 
  array (
    'modChunk' => 
    array (
      'HEAD' => 
      array (
        'fields' => 
        array (
          'id' => 15,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'HEAD',
          'description' => 'Блок в котором размещаются стили, мета данные и т.д',
          'editor_type' => 0,
          'category' => 26,
          'cache_type' => 0,
          'snippet' => '<head>
    <!-- meta -->
	<meta charset="[[++modx_charset]]">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>[[*meta-title]] | [[!++my_metaTail]]</title>
	<meta name="description" content="[[*meta-description]]" />
	<meta name="keywords" content="[[*meta-keywords]]" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	[[!++my_metategs]]
	[[*meta-noindex]]
	<base href="[[!++site_url]]">
	
	<meta property="og:title" content="[[*meta-title]]">
    <meta property="og:description" content="[[*meta-description]]">
    <meta property="og:type" content="website">
    <meta property="og:url" content="[[++site_url]][[*alias]]">
    <meta property="og:image" content="[[++site_url]][[*tvimage:is=`/upload/images/none.jpg`:then=`templates/img/logotype.jpg`:else=`[[*tvimage]]`:default=`templates/img/logotype.jpg`]]">
    <meta property="og:site_name" content="[[++site_name]]">
    <meta property="og:locale" content="[[++modx_charset]]">
        
    [[- Внимание!!!! Менеджеры, добавляйте свои метатеги в КОНФИГУРАЦИИ САЙТА: Верхнее меню -> Пакеты -> Конфигурация! ]]

	<!-- icons -->
	<link rel="icon" href="/template/img/fvc/ico-200x200.png" type="image/png" />
	<link rel="apple-touch-icon" href="/template/img/fvc/apple-touch-icon.png" type="image/png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/template/img/fvc/apple-touch-icon-ipad.png" type="image/png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/template/img/fvc/apple-touch-icon-iphone4.png" type="image/png" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />



    
 

	
	[[!MinifyX?
        &minifyCss=`1`
        &minifyJs=`1`
        &cacheFolder=`/template/min/`
        &cssSources=`
            /template/css/main.min.css
            ,/template/css/jquery.fancybox.css
            ,/template/css/slick.css
            ,/template/less/custom.less
        `
        &jsSources=`
            /template/js/slick.js
            ,/template/js/main.js
            ,/template/js/resume.js
        `
    ]]
	    
	<!-- styles -->
	[[+MinifyX.css]]
	<link rel="stylesheet" href="/template/css/all.min.css" type="text/css" />
	
    [[*template:is=`9`:then=`<link rel="stylesheet" href="/assets/components/minishop2/css/web/lib/jquery.jgrowl.min.css">`:else=``]]

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=[[++cultureKey]]" async defer></script>
 </head>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<head>
    <!-- meta -->
	<meta charset="[[++modx_charset]]">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>[[*meta-title]] | [[!++my_metaTail]]</title>
	<meta name="description" content="[[*meta-description]]" />
	<meta name="keywords" content="[[*meta-keywords]]" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	[[!++my_metategs]]
	[[*meta-noindex]]
	<base href="[[!++site_url]]">
	
	<meta property="og:title" content="[[*meta-title]]">
    <meta property="og:description" content="[[*meta-description]]">
    <meta property="og:type" content="website">
    <meta property="og:url" content="[[++site_url]][[*alias]]">
    <meta property="og:image" content="[[++site_url]][[*tvimage:is=`/upload/images/none.jpg`:then=`templates/img/logotype.jpg`:else=`[[*tvimage]]`:default=`templates/img/logotype.jpg`]]">
    <meta property="og:site_name" content="[[++site_name]]">
    <meta property="og:locale" content="[[++modx_charset]]">
        
    [[- Внимание!!!! Менеджеры, добавляйте свои метатеги в КОНФИГУРАЦИИ САЙТА: Верхнее меню -> Пакеты -> Конфигурация! ]]

	<!-- icons -->
	<link rel="icon" href="/template/img/fvc/ico-200x200.png" type="image/png" />
	<link rel="apple-touch-icon" href="/template/img/fvc/apple-touch-icon.png" type="image/png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/template/img/fvc/apple-touch-icon-ipad.png" type="image/png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/template/img/fvc/apple-touch-icon-iphone4.png" type="image/png" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />



    
 

	
	[[!MinifyX?
        &minifyCss=`1`
        &minifyJs=`1`
        &cacheFolder=`/template/min/`
        &cssSources=`
            /template/css/main.min.css
            ,/template/css/jquery.fancybox.css
            ,/template/css/slick.css
            ,/template/less/custom.less
        `
        &jsSources=`
            /template/js/slick.js
            ,/template/js/main.js
            ,/template/js/resume.js
        `
    ]]
	    
	<!-- styles -->
	[[+MinifyX.css]]
	<link rel="stylesheet" href="/template/css/all.min.css" type="text/css" />
	
    [[*template:is=`9`:then=`<link rel="stylesheet" href="/assets/components/minishop2/css/web/lib/jquery.jgrowl.min.css">`:else=``]]

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCaptchaCallback&render=explicit&hl=[[++cultureKey]]" async defer></script>
 </head>',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'HEADER' => 
      array (
        'fields' => 
        array (
          'id' => 16,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'HEADER',
          'description' => 'Шапка сайта',
          'editor_type' => 0,
          'category' => 26,
          'cache_type' => 0,
          'snippet' => '<!-- Шапка сайта -->
 <header id="header">

 	<!-- Основные данные организации (микроразметка) -->
	<div itemscope="" itemtype="http://schema.org/Organization" class="d-none">
		<span itemprop="name">[[++site_name]]</span>

		<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
			<span itemprop="streetAddress">[[!++my_address]]</span>
			<span itemprop="addressLocality">[[!++my_city]]</span>
		</div>

		<span itemprop="telephone">[[!++my_phones]]</span>,
		<span itemprop="email">[[!++my_email]]</span>
	</div>
	<!-- /Основные данные организации (микроразметка) -->

	<div class="top-header-block">
		<div class="container max-width padding-right border-bottom-color">
			<div class="row">

				<div class="logo-block col-5 col-md-3 col-lg-2 col-xl-1">
					<!-- Логотип -->
					<div class="logotype-block text-md-center" itemscope itemtype="http://schema.org/Organization">
						<a itemprop="url" href="[[++site_url]]" title="[[++site_name]]" >
							<img itemprop="logo" src="/template/img/logotype.png" title="[[++site_name]]" title="[[++site_name]]"/><br>
						</a>
					</div>
					<!-- /Логотип -->
				</div>
				
                [[$MAIN-MENU]]
                
				<!-- Языки -->
				<div class="private-office-block col-1 col-md-1 col-xl-1 align-self-center">
                    <div class="langs">
                        {$_modx->runSnippet(\'!getLanguages\', [\'tpl\' => \'section-langs-2_2\',])}
                        
 
                        <a class="btn btn-sm" href="[[~55]]" role="button" style="padding: 3px 10px;background: #ff5400;">Регистрация&nbsp;компании</a>
                        <a class="btn btn-sm mt-1" href="[[~53]]" role="button" style="padding: 3px 10px;background: #ff5400;">Регистрация&nbsp;моряка</a>
                        
                    </div>
				</div>


				<!-- Личный кабинет -->
				<div class="private-office-block col-5 col-md-3 col-xl-2">
					<div class="private-office-block__content text-right">
 

                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 3px 10px;">
                            <i class="fas fa-user-circle"></i> Кабинет
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                              [[!+modx.user.username:is=`(anonymous)`:then=`<a href="[[~42]]" class="dropdown-item" title="Личный кабинет" style="margin: 0;">Регистрация / Вход</a>`:else=`<a class="dropdown-item" href="[[~39]]" title="Профиль [[!+modx.user.username]]" style="margin: 0;">[[!+modx.user.username]]</a>`]]
                            <a class="dropdown-item" href="#" style="margin: 0;">профиль</a>
                            <a class="dropdown-item" href="#" style="margin: 0;">меню 1</a>
                            <a class="dropdown-item" href="#" style="margin: 0;">меню 2</a>
                          </div>
                        </div>

					    
						[[-<a href="" class="private-office-block__registration">Регистрация</a>
						<a href="" class="private-office-block__link">Войти</a>]]
	
					</div>
				</div>
				<!-- /Личный кабинет -->

			</div>
		</div>

	</div>

	[[*template:is=`5`:then=`[[$SLIDER]]`:else=``]]
	
	<div class="fixed-mobile-block">
	    <ul class="d-flex justify-content-between d-lg-none">
	        <li><a href="#main-menu" class="scrollto"><img src="/upload/images/menu-ico-0.png" alt=""><span>Наверх</span></a></li>
	        <li><a href="[[~9]]"><img src="/upload/images/menu-ico-1.png" alt="Услуги"><span>Услуги</span></a></a></li>
	        <li><a href="[[~12]]"><img src="/upload/images/menu-ico-2.png" alt="Новости"><span>Новости</span></a></a></li>
	        <li><a href="[[~7]]"><img src="/upload/images/menu-ico-3.png" alt="Поиск"><span>Поиск</span></a></a></li>
	        <li><a href="[[~42]]"><img src="/upload/images/menu-ico-4.png" alt="Войти"><span>Войти</span></a></a></li>
	    </ul>
	</div>

 </header>
 	<!-- /Шапка сайта -->',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<!-- Шапка сайта -->
 <header id="header">

 	<!-- Основные данные организации (микроразметка) -->
	<div itemscope="" itemtype="http://schema.org/Organization" class="d-none">
		<span itemprop="name">[[++site_name]]</span>

		<div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
			<span itemprop="streetAddress">[[!++my_address]]</span>
			<span itemprop="addressLocality">[[!++my_city]]</span>
		</div>

		<span itemprop="telephone">[[!++my_phones]]</span>,
		<span itemprop="email">[[!++my_email]]</span>
	</div>
	<!-- /Основные данные организации (микроразметка) -->

	<div class="top-header-block">
		<div class="container max-width padding-right border-bottom-color">
			<div class="row">

				<div class="logo-block col-5 col-md-3 col-lg-2 col-xl-1">
					<!-- Логотип -->
					<div class="logotype-block text-md-center" itemscope itemtype="http://schema.org/Organization">
						<a itemprop="url" href="[[++site_url]]" title="[[++site_name]]" >
							<img itemprop="logo" src="/template/img/logotype.png" title="[[++site_name]]" title="[[++site_name]]"/><br>
						</a>
					</div>
					<!-- /Логотип -->
				</div>
				
                [[$MAIN-MENU]]
                
				<!-- Языки -->
				<div class="private-office-block col-1 col-md-1 col-xl-1 align-self-center">
                    <div class="langs">
                        {$_modx->runSnippet(\'!getLanguages\', [\'tpl\' => \'section-langs-2_2\',])}
                        
 
                        <a class="btn btn-sm" href="[[~55]]" role="button" style="padding: 3px 10px;background: #ff5400;">Регистрация&nbsp;компании</a>
                        <a class="btn btn-sm mt-1" href="[[~53]]" role="button" style="padding: 3px 10px;background: #ff5400;">Регистрация&nbsp;моряка</a>
                        
                    </div>
				</div>


				<!-- Личный кабинет -->
				<div class="private-office-block col-5 col-md-3 col-xl-2">
					<div class="private-office-block__content text-right">
 

                        <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 3px 10px;">
                            <i class="fas fa-user-circle"></i> Кабинет
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                              [[!+modx.user.username:is=`(anonymous)`:then=`<a href="[[~42]]" class="dropdown-item" title="Личный кабинет" style="margin: 0;">Регистрация / Вход</a>`:else=`<a class="dropdown-item" href="[[~39]]" title="Профиль [[!+modx.user.username]]" style="margin: 0;">[[!+modx.user.username]]</a>`]]
                            <a class="dropdown-item" href="#" style="margin: 0;">профиль</a>
                            <a class="dropdown-item" href="#" style="margin: 0;">меню 1</a>
                            <a class="dropdown-item" href="#" style="margin: 0;">меню 2</a>
                          </div>
                        </div>

					    
						[[-<a href="" class="private-office-block__registration">Регистрация</a>
						<a href="" class="private-office-block__link">Войти</a>]]
	
					</div>
				</div>
				<!-- /Личный кабинет -->

			</div>
		</div>

	</div>

	[[*template:is=`5`:then=`[[$SLIDER]]`:else=``]]
	
	<div class="fixed-mobile-block">
	    <ul class="d-flex justify-content-between d-lg-none">
	        <li><a href="#main-menu" class="scrollto"><img src="/upload/images/menu-ico-0.png" alt=""><span>Наверх</span></a></li>
	        <li><a href="[[~9]]"><img src="/upload/images/menu-ico-1.png" alt="Услуги"><span>Услуги</span></a></a></li>
	        <li><a href="[[~12]]"><img src="/upload/images/menu-ico-2.png" alt="Новости"><span>Новости</span></a></a></li>
	        <li><a href="[[~7]]"><img src="/upload/images/menu-ico-3.png" alt="Поиск"><span>Поиск</span></a></a></li>
	        <li><a href="[[~42]]"><img src="/upload/images/menu-ico-4.png" alt="Войти"><span>Войти</span></a></a></li>
	    </ul>
	</div>

 </header>
 	<!-- /Шапка сайта -->',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'MAIN-MENU' => 
      array (
        'fields' => 
        array (
          'id' => 37,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'MAIN-MENU',
          'description' => 'Основное меню на сайте',
          'editor_type' => 0,
          'category' => 31,
          'cache_type' => 0,
          'snippet' => '<!-- Список основного меню -->
<nav id="main-menu" class="col-1 col-md-5 col-lg-6 col-xl-8">
	<div class="container border-bottom-color">
		<div class="bg-menu toggle-menu"></div>
		<div class="menu-block d-lg-flex justify-content-between">
			<div class="menu-container">
				<div class="main-menu__close toggle-menu d-lg-none"><i class="fas fa-times"></i></div>


[[!pdoPage?
    &parents=`0`
    &element=`Localizator`
    &snippet=`pdoMenu`
    &level=`1`
    &tpl=`@INLINE <li[[+classes]] itemprop="name"><a href="[[+link]]" [[+attributes]] itemprop="url">[[+menutitle]]</a>[[+wrapper]]</li>`
    &tplOuter=`@INLINE <ul[[+classes]] itemscope itemtype="http://www.schema.org/SiteNavigationElement">[[+wrapper]]</ul>`
    &outerClass=`main-menu__list`
    &where=`{ "template:IN" :[1,2,3,5,10]}`
]]


			</div>
		</div>
	</div>
</nav>
<!-- /Список основного меню -->',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<!-- Список основного меню -->
<nav id="main-menu" class="col-1 col-md-5 col-lg-6 col-xl-8">
	<div class="container border-bottom-color">
		<div class="bg-menu toggle-menu"></div>
		<div class="menu-block d-lg-flex justify-content-between">
			<div class="menu-container">
				<div class="main-menu__close toggle-menu d-lg-none"><i class="fas fa-times"></i></div>


[[!pdoPage?
    &parents=`0`
    &element=`Localizator`
    &snippet=`pdoMenu`
    &level=`1`
    &tpl=`@INLINE <li[[+classes]] itemprop="name"><a href="[[+link]]" [[+attributes]] itemprop="url">[[+menutitle]]</a>[[+wrapper]]</li>`
    &tplOuter=`@INLINE <ul[[+classes]] itemscope itemtype="http://www.schema.org/SiteNavigationElement">[[+wrapper]]</ul>`
    &outerClass=`main-menu__list`
    &where=`{ "template:IN" :[1,2,3,5,10]}`
]]


			</div>
		</div>
	</div>
</nav>
<!-- /Список основного меню -->',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'SLIDER' => 
      array (
        'fields' => 
        array (
          'id' => 38,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'SLIDER',
          'description' => 'Слайдер на титульной странице',
          'editor_type' => 0,
          'category' => 26,
          'cache_type' => 0,
          'snippet' => '<!-- Блок слайдера -->
<div class="slider-block">
	<div class="slider main-slider">
	    [[!BannerY? &position=`1` &tpl=`tpl.main-slider.row` &sortby=`idx`]]
	</div>
</div>
<!-- /Блок слайдера -->',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<!-- Блок слайдера -->
<div class="slider-block">
	<div class="slider main-slider">
	    [[!BannerY? &position=`1` &tpl=`tpl.main-slider.row` &sortby=`idx`]]
	</div>
</div>
<!-- /Блок слайдера -->',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'BREADCRUMBS' => 
      array (
        'fields' => 
        array (
          'id' => 45,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'BREADCRUMBS',
          'description' => 'Навигация "Хлебные крошки"',
          'editor_type' => 0,
          'category' => 26,
          'cache_type' => 0,
          'snippet' => '[[-!breadcrumbs? &homeCrumbTitle=`<i class="fa fa-home" aria-hidden="true"></i>` &crumbSeparator=`-`]]

<div class="breadcrumbs-conteiner">
    {\'Localizator\' | snippet : [
        \'snippet\' => \'pdoCrumbs\',
        \'showHome\' => 1,
        \'tplHome\' => \'@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>\',
        \'tpl\' => \'@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>\',
        \'tplCurrent\' => \'@INLINE <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">[[+menutitle]]</span><meta itemprop="position" content="[[+idx]]" /><meta itemprop="item" content="[[+link]]" /></li>\',
        \'tplWrapper\' => \'@INLINE <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">[[+output]]</ul>\',
        \'outputSeparator\' => \'&nbsp;-&nbsp;\'
    ]}
</div>
',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '[[-!breadcrumbs? &homeCrumbTitle=`<i class="fa fa-home" aria-hidden="true"></i>` &crumbSeparator=`-`]]

<div class="breadcrumbs-conteiner">
    {\'Localizator\' | snippet : [
        \'snippet\' => \'pdoCrumbs\',
        \'showHome\' => 1,
        \'tplHome\' => \'@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>\',
        \'tpl\' => \'@INLINE <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="[[+link]]" itemprop="item"><span itemprop="name">[[+menutitle]]</span></a><meta itemprop="position" content="[[+idx]]" /></li>\',
        \'tplCurrent\' => \'@INLINE <li class="active" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">[[+menutitle]]</span><meta itemprop="position" content="[[+idx]]" /><meta itemprop="item" content="[[+link]]" /></li>\',
        \'tplWrapper\' => \'@INLINE <ul class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">[[+output]]</ul>\',
        \'outputSeparator\' => \'&nbsp;-&nbsp;\'
    ]}
</div>
',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'NEWS.top' => 
      array (
        'fields' => 
        array (
          'id' => 116,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'NEWS.top',
          'description' => '',
          'editor_type' => 0,
          'category' => 26,
          'cache_type' => 0,
          'snippet' => '<div class="news-list-top padding-top">
    <div class="row rows">
        [[!pdoPage?
            &element=`Localizator`
            &parents=`12`
            &depth=`0`
            &sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`
            &tpl=`tpl.news-top.item`
            &ajaxMode=`default`
            &limit=`10`
        ]]
    </div>
</div>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<div class="news-list-top padding-top">
    <div class="row rows">
        [[!pdoPage?
            &element=`Localizator`
            &parents=`12`
            &depth=`0`
            &sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`
            &tpl=`tpl.news-top.item`
            &ajaxMode=`default`
            &limit=`10`
        ]]
    </div>
</div>',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
        ),
      ),
      'NEWS.page' => 
      array (
        'fields' => 
        array (
          'id' => 23,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'NEWS.page',
          'description' => '',
          'editor_type' => 0,
          'category' => 26,
          'cache_type' => 0,
          'snippet' => '<div id="pdopage" class="news-list catalog-news">
    [[!+page.nav:is=`<ul></ul>`:then=``:else=`[[!+page.nav]]`]]
    <div class="row rows">
        [[!pdoPage?
            &element=`Localizator`
            &parents=`12`
            &depth=`0`
            &sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`
            &tpl=`tpl.news.item`
            &includeTVs=`tvimage`
            &tvPrefix=`tv.`
            &prepareTVs=`0`
            &ajaxMode=`default`
            &limit=`10`
        ]]
    </div>
    [[!+page.nav:is=`<ul></ul>`:then=``:else=`[[!+page.nav]]`]]
</div>',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<div id="pdopage" class="news-list catalog-news">
    [[!+page.nav:is=`<ul></ul>`:then=``:else=`[[!+page.nav]]`]]
    <div class="row rows">
        [[!pdoPage?
            &element=`Localizator`
            &parents=`12`
            &depth=`0`
            &sortby=`{ "publishedon":"DESC","longtitle":"ASC" }`
            &tpl=`tpl.news.item`
            &includeTVs=`tvimage`
            &tvPrefix=`tv.`
            &prepareTVs=`0`
            &ajaxMode=`default`
            &limit=`10`
        ]]
    </div>
    [[!+page.nav:is=`<ul></ul>`:then=``:else=`[[!+page.nav]]`]]
</div>',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'AUTHORISATION' => 
      array (
        'fields' => 
        array (
          'id' => 79,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'AUTHORISATION',
          'description' => 'Блок авторизации на странице',
          'editor_type' => 0,
          'category' => 27,
          'cache_type' => 0,
          'snippet' => '<!-- Блок с формой -->
			<div class="form-container black-bg padding-bottom padding-top [[!+modx.user.username:ne=`(anonymous)`:then=`d-none`:else=``]]">

				<div class="container">
					<div class="row">

						<div class="col-12 col-sm-6 col-lg-6 col-xl-8 form-block__description padding-bottom">
							<h2 class="h1-size border-bottom">Регистрируйтесь и получайте больше возможностей!</h2>
							<p>Вы можете быть в курсе последних новостей! Общаться и делиться своим опытом на форуме! Будете получать обратную связь от работодателей!</p>
						</div>

						<div class="col-12 col-sm-6 col-lg-6 col-xl-4 form-block__form">

							<div class="form-block__form-content">
								[[!officeAuth?
                                    &groups=`Users`
                                ]]
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- Блок с формой -->',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<!-- Блок с формой -->
			<div class="form-container black-bg padding-bottom padding-top [[!+modx.user.username:ne=`(anonymous)`:then=`d-none`:else=``]]">

				<div class="container">
					<div class="row">

						<div class="col-12 col-sm-6 col-lg-6 col-xl-8 form-block__description padding-bottom">
							<h2 class="h1-size border-bottom">Регистрируйтесь и получайте больше возможностей!</h2>
							<p>Вы можете быть в курсе последних новостей! Общаться и делиться своим опытом на форуме! Будете получать обратную связь от работодателей!</p>
						</div>

						<div class="col-12 col-sm-6 col-lg-6 col-xl-4 form-block__form">

							<div class="form-block__form-content">
								[[!officeAuth?
                                    &groups=`Users`
                                ]]
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- Блок с формой -->',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
        ),
      ),
      'FOOTER' => 
      array (
        'fields' => 
        array (
          'id' => 32,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'FOOTER',
          'description' => 'Подвал сайта',
          'editor_type' => 0,
          'category' => 26,
          'cache_type' => 0,
          'snippet' => '[[- Внимание!!!! Менеджеры, добавляйте свои скрипты и метрики в КОНФИГУРАЦИИ САЙТА: Верхнее меню -> Пакеты -> Конфигурация! ]]

<!-- Подвал сайта -->
 <footer class="padding-top padding-bottom">
	<div class="container">
		<div class="row">

			<div class="footer-block col-12 col-sm-4">
				<img src="/template/img/logotype-white.png" alt="">
			</div>
			<div class="footer-block footer-menu col-12 col-sm-8">
                [[!pdoPage?
                    &element=`Localizator`
                    &snippet=`pdoMenu`
                    &parents=`0`
                    &resources=`-17`
                    &level=`1`
                    &tpl=`@INLINE <li><a href="[[+link]]">[[+menutitle]]</a></li>`
                    &tplOuter=`@INLINE <ul>[[+wrapper]]</ul>`
                ]]
				<a href="#main-menu" class="scrollto">[[%topofpage]] <i class="fas fa-caret-up"></i></a>
			</div>
			<div class="footer-block col-12 col-sm-7">
				<p>© apply-marine.ru, [[!+nowdate:default=`now`:strtotime:date=`%Y`]] <br>
				ООО "АППЛАЙ-МАРИН"<br> ИНН 2315222071, ОГРН 1212300049873</p>
			</div>
			<div class="footer-block col-12 col-sm-5 text-lg-right">
				<i class="fas fa-phone-alt"></i> [[!phoneGeneratorLinks? &tvparam=`[[!++my_phones]]` &outerPhone=`1` &brOn=``]]
				[[!socialLinks? &links=`facebook,ok,instagram` &colored=`0` &phone=``]]
			</div>
			<div class="footer-block footer-menu col-12 text-center">
				<ul class="">
					<li><a href="[[~8]]">Согласие на обработку данных</a></li>
					<li><a href="">Служба поддержки</a></li>
					<li><a href="">Политика конфиденциальности</a></li>
				</ul>
				[[!++my_metrics]]
			</div>
			<div class="footer-block col-12">
				<div class="create-block">
					<div class="creator">
						<span>Created in</span>
						<a href="https://www.smartline93.ru" class="logo"><img src="/upload/images/smart-logo.png" alt=""></a>
						<a class="creator-link" href="https://www.smartline93.ru" >www.smartline93.ru</a>
					</div>
				</div>
			</div>

		</div>
	</div>
 </footer>
<!-- /Подвал сайта -->',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '[[- Внимание!!!! Менеджеры, добавляйте свои скрипты и метрики в КОНФИГУРАЦИИ САЙТА: Верхнее меню -> Пакеты -> Конфигурация! ]]

<!-- Подвал сайта -->
 <footer class="padding-top padding-bottom">
	<div class="container">
		<div class="row">

			<div class="footer-block col-12 col-sm-4">
				<img src="/template/img/logotype-white.png" alt="">
			</div>
			<div class="footer-block footer-menu col-12 col-sm-8">
                [[!pdoPage?
                    &element=`Localizator`
                    &snippet=`pdoMenu`
                    &parents=`0`
                    &resources=`-17`
                    &level=`1`
                    &tpl=`@INLINE <li><a href="[[+link]]">[[+menutitle]]</a></li>`
                    &tplOuter=`@INLINE <ul>[[+wrapper]]</ul>`
                ]]
				<a href="#main-menu" class="scrollto">[[%topofpage]] <i class="fas fa-caret-up"></i></a>
			</div>
			<div class="footer-block col-12 col-sm-7">
				<p>© apply-marine.ru, [[!+nowdate:default=`now`:strtotime:date=`%Y`]] <br>
				ООО "АППЛАЙ-МАРИН"<br> ИНН 2315222071, ОГРН 1212300049873</p>
			</div>
			<div class="footer-block col-12 col-sm-5 text-lg-right">
				<i class="fas fa-phone-alt"></i> [[!phoneGeneratorLinks? &tvparam=`[[!++my_phones]]` &outerPhone=`1` &brOn=``]]
				[[!socialLinks? &links=`facebook,ok,instagram` &colored=`0` &phone=``]]
			</div>
			<div class="footer-block footer-menu col-12 text-center">
				<ul class="">
					<li><a href="[[~8]]">Согласие на обработку данных</a></li>
					<li><a href="">Служба поддержки</a></li>
					<li><a href="">Политика конфиденциальности</a></li>
				</ul>
				[[!++my_metrics]]
			</div>
			<div class="footer-block col-12">
				<div class="create-block">
					<div class="creator">
						<span>Created in</span>
						<a href="https://www.smartline93.ru" class="logo"><img src="/upload/images/smart-logo.png" alt=""></a>
						<a class="creator-link" href="https://www.smartline93.ru" >www.smartline93.ru</a>
					</div>
				</div>
			</div>

		</div>
	</div>
 </footer>
<!-- /Подвал сайта -->',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'SCRIPTS' => 
      array (
        'fields' => 
        array (
          'id' => 21,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'SCRIPTS',
          'description' => 'Основные скрипты сайта',
          'editor_type' => 0,
          'category' => 26,
          'cache_type' => 0,
          'snippet' => '<!-- Подключаемые скрипты -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<script src="/template/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/vendor/jquery.fancybox.min.js"></script>



<script src="/template/js/bootstrap/dropdown.js"></script>
    
    
[[!++my_scripts]]
<script src="/template/js/wow.min.js"></script>
[[+MinifyX.javascript]]

[[*template:is=`9`:then=`<script src="/assets/components/minishop2/js/web/lib/jquery.jgrowl.min.js"></script>`:else=``]]

<script>
    new WOW().init();
</script>
    
<!-- [^t^], [^q^], [^qt^] -->',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '<!-- Подключаемые скрипты -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<script src="/template/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/vendor/jquery.fancybox.min.js"></script>



<script src="/template/js/bootstrap/dropdown.js"></script>
    
    
[[!++my_scripts]]
<script src="/template/js/wow.min.js"></script>
[[+MinifyX.javascript]]

[[*template:is=`9`:then=`<script src="/assets/components/minishop2/js/web/lib/jquery.jgrowl.min.js"></script>`:else=``]]

<script>
    new WOW().init();
</script>
    
<!-- [^t^], [^q^], [^qt^] -->',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
    ),
    'modSnippet' => 
    array (
      'MinifyX' => 
      array (
        'fields' => 
        array (
          'id' => 32,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'MinifyX',
          'description' => 'MinifyX is a snippet which allows you to combine and minify JS and CSS files',
          'editor_type' => 0,
          'category' => 13,
          'cache_type' => 0,
          'snippet' => '/**
 * @var array $scriptProperties
 * @var MinifyX $MinifyX
 */
if (isset($modx->minifyx) && $modx->minifyx instanceof MinifyX) {
    $MinifyX = $modx->minifyx;
    $MinifyX->reset($scriptProperties);
} else {
    $MinifyX = $modx->getService(\'minifyx\', \'MinifyX\', MODX_CORE_PATH . \'components/minifyx/model/minifyx/\', $scriptProperties);
}

return $MinifyX->run();',
          'locked' => false,
          'properties' => 
          array (
            'jsSources' => 
            array (
              'name' => 'jsSources',
              'desc' => 'minifyx_prop_jsSources',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Список JS файлов для обработки. Можно указывать *.js и *.coffee.',
              'area_trans' => '',
            ),
            'cssSources' => 
            array (
              'name' => 'cssSources',
              'desc' => 'minifyx_prop_cssSources',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Список CSS файлов для обработки. Можно указывать *.css, *.less и *.scss.',
              'area_trans' => '',
            ),
            'minifyJs' => 
            array (
              'name' => 'minifyJs',
              'desc' => 'minifyx_prop_minifyJs',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Включить минификацию JS?',
              'area_trans' => '',
            ),
            'minifyCss' => 
            array (
              'name' => 'minifyCss',
              'desc' => 'minifyx_prop_minifyCss',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Включить минификацию CSS?',
              'area_trans' => '',
            ),
            'jsFilename' => 
            array (
              'name' => 'jsFilename',
              'desc' => 'minifyx_prop_jsFilename',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'scripts',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Базовое имя готового JS файла.',
              'area_trans' => '',
            ),
            'cssFilename' => 
            array (
              'name' => 'cssFilename',
              'desc' => 'minifyx_prop_cssFilename',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'styles',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Базовое имя готового CSS файла.',
              'area_trans' => '',
            ),
            'registerJs' => 
            array (
              'name' => 'registerJs',
              'desc' => 'minifyx_prop_registerJs',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'value' => 'placeholder',
                  'text' => 'Placeholder',
                  'name' => 'Placeholder',
                ),
                1 => 
                array (
                  'value' => 'startup',
                  'text' => 'Startup script',
                  'name' => 'Startup script',
                ),
                2 => 
                array (
                  'value' => 'default',
                  'text' => 'Default',
                  'name' => 'Default',
                ),
                3 => 
                array (
                  'value' => 'print',
                  'text' => 'Print',
                  'name' => 'Print',
                ),
              ),
              'value' => 'placeholder',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Подключение javascript: можно сохранить в плейсхолдер (placeholder), вызвать в теге "head" (startup), разместить перед закрывающим "body" (default) или вывести немедленно (print).',
              'area_trans' => '',
            ),
            'jsPlaceholder' => 
            array (
              'name' => 'jsPlaceholder',
              'desc' => 'minifyx_prop_jsPlaceholder',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'MinifyX.javascript',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Имя плейсхолдера javascript. Используется, если &registerJs=`placeholder`',
              'area_trans' => '',
            ),
            'registerCss' => 
            array (
              'name' => 'registerCss',
              'desc' => 'minifyx_prop_registerCss',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'value' => 'placeholder',
                  'text' => 'Placeholder',
                  'name' => 'Placeholder',
                ),
                1 => 
                array (
                  'value' => 'default',
                  'text' => 'Default',
                  'name' => 'Default',
                ),
                2 => 
                array (
                  'value' => 'print',
                  'text' => 'Print',
                  'name' => 'Print',
                ),
              ),
              'value' => 'placeholder',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Подключение сss: можно сохранить в плейсхолдер (placeholder), вызвать в теге "head" (default) или вывести немедленно (print).',
              'area_trans' => '',
            ),
            'cssPlaceholder' => 
            array (
              'name' => 'cssPlaceholder',
              'desc' => 'minifyx_prop_cssPlaceholder',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'MinifyX.css',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Имя плейсхолдера css. Используется,если &registerCss=`placeholder`',
              'area_trans' => '',
            ),
            'jsGroups' => 
            array (
              'name' => 'jsGroups',
              'desc' => 'minifyx_prop_jsGroups',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Названия групп скриптов (через запятую).',
              'area_trans' => '',
            ),
            'cssGroups' => 
            array (
              'name' => 'cssGroups',
              'desc' => 'minifyx_prop_cssGroups',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Названия групп стилей (через запятую).',
              'area_trans' => '',
            ),
            'preHooks' => 
            array (
              'name' => 'preHooks',
              'desc' => 'minifyx_prop_preHooks',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Список хуков через запятую для предварительной обработки. Хуки могут быть сниппетами или файлами.',
              'area_trans' => '',
            ),
            'hooks' => 
            array (
              'name' => 'hooks',
              'desc' => 'minifyx_prop_hooks',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Список хуков через запятую для обработки полученного результата. Хуки могут быть сниппетами или файлами.',
              'area_trans' => '',
            ),
            'cssTpl' => 
            array (
              'name' => 'cssTpl',
              'desc' => 'minifyx_prop_cssTpl',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '<link rel="stylesheet" href="[[+file]]" type="text/css" />',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Шаблон для файла стилей. Должен быть указан плейсхолдер [[+file]].',
              'area_trans' => '',
            ),
            'jsTpl' => 
            array (
              'name' => 'jsTpl',
              'desc' => 'minifyx_prop_jsTpl',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '<script src="[[+file]]"></script>',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Шаблон для файла скриптов. Должен быть указан плейсхолдер [[+file]].',
              'area_trans' => '',
            ),
            'forceUpdate' => 
            array (
              'name' => 'forceUpdate',
              'desc' => 'minifyx_prop_forceUpdate',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Отключить проверку изменения файлов и перезаписывать новые скрипты и стили каждый раз.',
              'area_trans' => '',
            ),
            'version' => 
            array (
              'name' => 'version',
              'desc' => 'minifyx_prop_version',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'minifyx:properties',
              'area' => '',
              'desc_trans' => 'Версия файла. Добавляется к линку. Укажите любое значение, или \'\' для отключения, \'auto\' для генерирования хэша.',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => 'core/components/minifyx/elements/snippets/snippet.minifyx.php',
          'content' => '/**
 * @var array $scriptProperties
 * @var MinifyX $MinifyX
 */
if (isset($modx->minifyx) && $modx->minifyx instanceof MinifyX) {
    $MinifyX = $modx->minifyx;
    $MinifyX->reset($scriptProperties);
} else {
    $MinifyX = $modx->getService(\'minifyx\', \'MinifyX\', MODX_CORE_PATH . \'components/minifyx/model/minifyx/\', $scriptProperties);
}

return $MinifyX->run();',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'pdoPage' => 
      array (
        'fields' => 
        array (
          'id' => 39,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'pdoPage',
          'description' => '',
          'editor_type' => 0,
          'category' => 14,
          'cache_type' => 0,
          'snippet' => '/** @var array $scriptProperties */
/** @var modX $modx */
// Default variables
if (empty($pageVarKey)) {
    $pageVarKey = \'page\';
}
if (empty($pageNavVar)) {
    $pageNavVar = \'page.nav\';
}
if (empty($pageCountVar)) {
    $pageCountVar = \'pageCount\';
}
if (empty($totalVar)) {
    $totalVar = \'total\';
}
if (empty($page)) {
    $page = 1;
}
if (empty($pageLimit)) {
    $pageLimit = 5;
} else {
    $pageLimit = (integer)$pageLimit;
}
if (!isset($plPrefix)) {
    $plPrefix = \'\';
}
if (!empty($scriptProperties[\'ajaxMode\'])) {
    $scriptProperties[\'ajax\'] = 1;
}

// Convert parameters from getPage if exists
if (!empty($namespace)) {
    $plPrefix = $namespace;
}
if (!empty($pageNavTpl)) {
    $scriptProperties[\'tplPage\'] = $pageNavTpl;
}
if (!empty($pageNavOuterTpl)) {
    $scriptProperties[\'tplPageWrapper\'] = $pageNavOuterTpl;
}
if (!empty($pageActiveTpl)) {
    $scriptProperties[\'tplPageActive\'] = $pageActiveTpl;
}
if (!empty($pageFirstTpl)) {
    $scriptProperties[\'tplPageFirst\'] = $pageFirstTpl;
}
if (!empty($pagePrevTpl)) {
    $scriptProperties[\'tplPagePrev\'] = $pagePrevTpl;
}
if (!empty($pageNextTpl)) {
    $scriptProperties[\'tplPageNext\'] = $pageNextTpl;
}
if (!empty($pageLastTpl)) {
    $scriptProperties[\'tplPageLast\'] = $pageLastTpl;
}
if (!empty($pageSkipTpl)) {
    $scriptProperties[\'tplPageSkip\'] = $pageSkipTpl;
}
if (!empty($pageNavScheme)) {
    $scriptProperties[\'scheme\'] = $pageNavScheme;
}
if (!empty($cache_expires)) {
    $scriptProperties[\'cacheTime\'] = $cache_expires;
}
//---
$strictMode = !empty($strictMode);

$isAjax = !empty($scriptProperties[\'ajax\']) && !empty($_SERVER[\'HTTP_X_REQUESTED_WITH\']) && $_SERVER[\'HTTP_X_REQUESTED_WITH\'] == \'XMLHttpRequest\';
if ($isAjax && !isset($_REQUEST[$pageVarKey])) {
    return;
}

/** @var pdoPage $pdoPage */
$fqn = $modx->getOption(\'pdoPage.class\', null, \'pdotools.pdopage\', true);
$path = $modx->getOption(\'pdopage_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
if ($pdoClass = $modx->loadClass($fqn, $path, false, true)) {
    $pdoPage = new $pdoClass($modx, $scriptProperties);
} else {
    return false;
}
$pdoPage->pdoTools->addTime(\'pdoTools loaded\');

// Script and styles
if (!$isAjax && !empty($scriptProperties[\'ajaxMode\'])) {
    $pdoPage->loadJsCss();
}
// Removing of default scripts and styles so they do not overwrote nested snippet parameters
if ($snippet = $modx->getObject(\'modSnippet\', [\'name\' => \'pdoPage\'])) {
    $properties = $snippet->get(\'properties\');
    if ($scriptProperties[\'frontend_js\'] == $properties[\'frontend_js\'][\'value\']) {
        unset($scriptProperties[\'frontend_js\']);
    }
    if ($scriptProperties[\'frontend_css\'] == $properties[\'frontend_css\'][\'value\']) {
        unset($scriptProperties[\'frontend_css\']);
    }
}

// Page
if (isset($_REQUEST[$pageVarKey]) && $strictMode && (!is_numeric($_REQUEST[$pageVarKey]) || ($_REQUEST[$pageVarKey] <= 1 && !$isAjax))) {
    return $pdoPage->redirectToFirst($isAjax);
} elseif (!empty($_REQUEST[$pageVarKey])) {
    $page = (integer)$_REQUEST[$pageVarKey];
}
$scriptProperties[\'page\'] = $page;
$scriptProperties[\'request\'] = $_REQUEST;
$scriptProperties[\'setTotal\'] = true;

// Limit
if (isset($_REQUEST[\'limit\'])) {
    if (is_numeric($_REQUEST[\'limit\']) && abs($_REQUEST[\'limit\']) > 0) {
        $scriptProperties[\'limit\'] = abs($_REQUEST[\'limit\']);
    } elseif ($strictMode) {
        unset($_GET[\'limit\']);

        return $pdoPage->redirectToFirst($isAjax);
    }
}
if (!empty($maxLimit) && !empty($scriptProperties[\'limit\']) && $scriptProperties[\'limit\'] > $maxLimit) {
    $scriptProperties[\'limit\'] = $maxLimit;
}

// Offset
$offset = !empty($scriptProperties[\'offset\']) && $scriptProperties[\'offset\'] > 0
    ? (int)$scriptProperties[\'offset\']
    : 0;
$scriptProperties[\'offset\'] = $page > 1
    ? $scriptProperties[\'limit\'] * ($page - 1) + $offset
    : $offset;
if (!empty($scriptProperties[\'offset\']) && empty($scriptProperties[\'limit\'])) {
    $scriptProperties[\'limit\'] = 10000000;
}

$cache = !empty($cache) || (!$modx->user->id && !empty($cacheAnonymous));
$url = $pdoPage->getBaseUrl();
$output = $pagination = $total = $pageCount = \'\';

$data = $cache
    ? $pdoPage->pdoTools->getCache($scriptProperties)
    : [];

if (empty($data)) {
    $output = $pdoPage->pdoTools->runSnippet($scriptProperties[\'element\'], $scriptProperties);
    if ($output === false) {
        return \'\';
    } elseif (!empty($toPlaceholder)) {
        $output = $modx->getPlaceholder($toPlaceholder);
    }

    // Pagination
    $total = (int)$modx->getPlaceholder($totalVar);
    $pageCount = !empty($scriptProperties[\'limit\']) && $total > $offset
        ? ceil(($total - $offset) / $scriptProperties[\'limit\'])
        : 0;

    // Redirect to start if somebody specified incorrect page
    if ($page > 1 && $page > $pageCount && $strictMode) {
        return $pdoPage->redirectToFirst($isAjax);
    }
    if (!empty($pageCount) && $pageCount > 1) {
        $pagination = [
            \'first\' => $page > 1 && !empty($tplPageFirst)
                ? $pdoPage->makePageLink($url, 1, $tplPageFirst)
                : \'\',
            \'prev\' => $page > 1 && !empty($tplPagePrev)
                ? $pdoPage->makePageLink($url, $page - 1, $tplPagePrev)
                : \'\',
            \'pages\' => $pageLimit >= 7 && empty($disableModernPagination)
                ? $pdoPage->buildModernPagination($page, $pageCount, $url)
                : $pdoPage->buildClassicPagination($page, $pageCount, $url),
            \'next\' => $page < $pageCount && !empty($tplPageNext)
                ? $pdoPage->makePageLink($url, $page + 1, $tplPageNext)
                : \'\',
            \'last\' => $page < $pageCount && !empty($tplPageLast)
                ? $pdoPage->makePageLink($url, $pageCount, $tplPageLast)
                : \'\',
        ];

        if (!empty($pageCount)) {
            foreach ([\'first\', \'prev\', \'next\', \'last\'] as $v) {
                $tpl = \'tplPage\' . ucfirst($v) . \'Empty\';
                if (!empty(${$tpl}) && empty($pagination[$v])) {
                    $pagination[$v] = $pdoPage->pdoTools->getChunk(${$tpl});
                }
            }
        }
    } else {
        $pagination = [
            \'first\' => \'\',
            \'prev\' => \'\',
            \'pages\' => \'\',
            \'next\' => \'\',
            \'last\' => \'\'
        ];
    }

    $data = [
        \'output\' => $output,
        $pageVarKey => $page,
        $pageCountVar => $pageCount,
        $pageNavVar => !empty($tplPageWrapper)
            ? $pdoPage->pdoTools->getChunk($tplPageWrapper, $pagination)
            : $pdoPage->pdoTools->parseChunk(\'\', $pagination),
        $totalVar => $total,
    ];
    if ($cache) {
        $pdoPage->pdoTools->setCache($data, $scriptProperties);
    }
}

if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
    $data[\'output\'] .= \'<pre class="pdoPageLog">\' . print_r($pdoPage->pdoTools->getTime(), 1) . \'</pre>\';
}

if ($isAjax) {
    if ($pageNavVar != \'pagination\') {
        $data[\'pagination\'] = $data[$pageNavVar];
        unset($data[$pageNavVar]);
    }
    if ($pageCountVar != \'pages\') {
        $data[\'pages\'] = (int)$data[$pageCountVar];
        unset($data[$pageCountVar]);
    }
    if ($pageVarKey != \'page\') {
        $data[\'page\'] = (int)$data[$pageVarKey];
        unset($data[$pageVarKey]);
    }
    if ($totalVar != \'total\') {
        $data[\'total\'] = (int)$data[$totalVar];
        unset($data[$totalVar]);
    }

    $maxIterations = (integer)$modx->getOption(\'parser_max_iterations\', null, 10);
    $modx->getParser()->processElementTags(\'\', $data[\'output\'], false, false, \'[[\', \']]\', [], $maxIterations);
    $modx->getParser()->processElementTags(\'\', $data[\'output\'], true, true, \'[[\', \']]\', [], $maxIterations);

    @session_write_close();
    exit(json_encode($data));
} else {
    if (!empty($setMeta)) {
        $charset = $modx->getOption(\'modx_charset\', null, \'UTF-8\');
        $canurl = $pdoPage->pdoTools->config[\'scheme\'] !== \'full\'
            ? rtrim($modx->getOption(\'site_url\'), \'/\') . \'/\' . ltrim($url, \'/\')
            : $url;
        $modx->regClientStartupHTMLBlock(\'<link rel="canonical" href="\' . htmlentities($canurl, ENT_QUOTES, $charset) . \'"/>\');
        if ($data[$pageVarKey] > 1) {
            $prevUrl = $pdoPage->makePageLink($canurl, $data[$pageVarKey] - 1);
            $modx->regClientStartupHTMLBlock(
                \'<link rel="prev" href="\' . htmlentities($prevUrl, ENT_QUOTES, $charset) . \'"/>\'
            );
        }
        if ($data[$pageVarKey] < $data[$pageCountVar]) {
            $nextUrl = $pdoPage->makePageLink($canurl, $data[$pageVarKey] + 1);
            $modx->regClientStartupHTMLBlock(
                \'<link rel="next" href="\' . htmlentities($nextUrl, ENT_QUOTES, $charset) . \'"/>\'
            );
        }
    }

    $modx->setPlaceholders($data, $plPrefix);
    if (!empty($toPlaceholder)) {
        $modx->setPlaceholder($toPlaceholder, $data[\'output\']);
    } else {
        return $data[\'output\'];
    }
}',
          'locked' => false,
          'properties' => 
          array (
            'plPrefix' => 
            array (
              'name' => 'plPrefix',
              'desc' => 'pdotools_prop_plPrefix',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Префикс для выставляемых плейсхолдеров, по умолчанию "wf.".',
              'area_trans' => '',
            ),
            'limit' => 
            array (
              'name' => 'limit',
              'desc' => 'pdotools_prop_limit',
              'type' => 'numberfield',
              'options' => 
              array (
              ),
              'value' => 10,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Ограничение количества результатов выборки. Можно использовать "0".',
              'area_trans' => '',
            ),
            'maxLimit' => 
            array (
              'name' => 'maxLimit',
              'desc' => 'pdotools_prop_maxLimit',
              'type' => 'numberfield',
              'options' => 
              array (
              ),
              'value' => 100,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Максимально возможный лимит выборки. Перекрывает лимит, указанный пользователем через url.',
              'area_trans' => '',
            ),
            'offset' => 
            array (
              'name' => 'offset',
              'desc' => 'pdotools_prop_offset',
              'type' => 'numberfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Пропуск результатов от начала.',
              'area_trans' => '',
            ),
            'page' => 
            array (
              'name' => 'page',
              'desc' => 'pdotools_prop_page',
              'type' => 'numberfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Номер страницы для вывода. Перекрывается номером, указанным пользователем через url.',
              'area_trans' => '',
            ),
            'pageVarKey' => 
            array (
              'name' => 'pageVarKey',
              'desc' => 'pdotools_prop_pageVarKey',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'page',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Имя переменной для поиска номера страницы в url.',
              'area_trans' => '',
            ),
            'totalVar' => 
            array (
              'name' => 'totalVar',
              'desc' => 'pdotools_prop_totalVar',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'page.total',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Имя плейсхолдера для сохранения общего количества результатов.',
              'area_trans' => '',
            ),
            'pageLimit' => 
            array (
              'name' => 'pageLimit',
              'desc' => 'pdotools_prop_pageLimit',
              'type' => 'numberfield',
              'options' => 
              array (
              ),
              'value' => 5,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Количество ссылок на страницы. Если больше или равно 7 - включается продвинутый режим отображения.',
              'area_trans' => '',
            ),
            'element' => 
            array (
              'name' => 'element',
              'desc' => 'pdotools_prop_element',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'pdoResources',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Имя сниппета для запуска.',
              'area_trans' => '',
            ),
            'pageNavVar' => 
            array (
              'name' => 'pageNavVar',
              'desc' => 'pdotools_prop_pageNavVar',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'page.nav',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Имя плейсхолдера для вывода пагинации.',
              'area_trans' => '',
            ),
            'pageCountVar' => 
            array (
              'name' => 'pageCountVar',
              'desc' => 'pdotools_prop_pageCountVar',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'pageCount',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Имя плейсхолдера для вывода количества страниц.',
              'area_trans' => '',
            ),
            'pageLinkScheme' => 
            array (
              'name' => 'pageLinkScheme',
              'desc' => 'pdotools_prop_pageLinkScheme',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Схема генерации ссылки на страницу. Можно использовать плейсхолдеры [[+pageVarKey]] и [[+page]]',
              'area_trans' => '',
            ),
            'tplPage' => 
            array (
              'name' => 'tplPage',
              'desc' => 'pdotools_prop_tplPage',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления обычной ссылки на страницу.',
              'area_trans' => '',
            ),
            'tplPageWrapper' => 
            array (
              'name' => 'tplPageWrapper',
              'desc' => 'pdotools_prop_tplPageWrapper',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления всего блока пагинации, содержит плейсхолдеры страниц.',
              'area_trans' => '',
            ),
            'tplPageActive' => 
            array (
              'name' => 'tplPageActive',
              'desc' => 'pdotools_prop_tplPageActive',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item active"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления ссылки на текущую страницу.',
              'area_trans' => '',
            ),
            'tplPageFirst' => 
            array (
              'name' => 'tplPageFirst',
              'desc' => 'pdotools_prop_tplPageFirst',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_first]]</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления ссылки на первую страницу.',
              'area_trans' => '',
            ),
            'tplPageLast' => 
            array (
              'name' => 'tplPageLast',
              'desc' => 'pdotools_prop_tplPageLast',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_last]]</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления ссылки на последнюю страницу.',
              'area_trans' => '',
            ),
            'tplPagePrev' => 
            array (
              'name' => 'tplPagePrev',
              'desc' => 'pdotools_prop_tplPagePrev',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&laquo;</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления ссылки на предыдущую страницу.',
              'area_trans' => '',
            ),
            'tplPageNext' => 
            array (
              'name' => 'tplPageNext',
              'desc' => 'pdotools_prop_tplPageNext',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&raquo;</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления ссылки на следующую страницу.',
              'area_trans' => '',
            ),
            'tplPageSkip' => 
            array (
              'name' => 'tplPageSkip',
              'desc' => 'pdotools_prop_tplPageSkip',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item disabled"><a class="page-link" href="#">...</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления пропущенных страниц при продвинутом режиме отображения (&pageLimit >= 7).',
              'area_trans' => '',
            ),
            'tplPageFirstEmpty' => 
            array (
              'name' => 'tplPageFirstEmpty',
              'desc' => 'pdotools_prop_tplPageFirstEmpty',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_first]]</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк, выводящийся при отсутствии ссылки на первую страницу.',
              'area_trans' => '',
            ),
            'tplPageLastEmpty' => 
            array (
              'name' => 'tplPageLastEmpty',
              'desc' => 'pdotools_prop_tplPageLastEmpty',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item disabled"><a class="page-link" href="#">[[%pdopage_last]]</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк, выводящийся при отсутствии ссылки на последнюю страницу.',
              'area_trans' => '',
            ),
            'tplPagePrevEmpty' => 
            array (
              'name' => 'tplPagePrevEmpty',
              'desc' => 'pdotools_prop_tplPagePrevEmpty',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк, выводящийся при отсутствии ссылки на предыдущую страницу.',
              'area_trans' => '',
            ),
            'tplPageNextEmpty' => 
            array (
              'name' => 'tplPageNextEmpty',
              'desc' => 'pdotools_prop_tplPageNextEmpty',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Чанк, выводящийся при отсутствии ссылки на следующую страницу.',
              'area_trans' => '',
            ),
            'cache' => 
            array (
              'name' => 'cache',
              'desc' => 'pdotools_prop_cache',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Кэширование результатов работы сниппета.',
              'area_trans' => '',
            ),
            'cacheTime' => 
            array (
              'name' => 'cacheTime',
              'desc' => 'pdotools_prop_cacheTime',
              'type' => 'numberfield',
              'options' => 
              array (
              ),
              'value' => 3600,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Время актуальности кэша в секундах.',
              'area_trans' => '',
            ),
            'cacheAnonymous' => 
            array (
              'name' => 'cacheAnonymous',
              'desc' => 'pdotools_prop_cacheAnonymous',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Включить кэширование только для неавторизованных посетителей.',
              'area_trans' => '',
            ),
            'toPlaceholder' => 
            array (
              'name' => 'toPlaceholder',
              'desc' => 'pdotools_prop_toPlaceholder',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Если не пусто, сниппет сохранит все данные в плейсхолдер с этим именем, вместо вывода не экран.',
              'area_trans' => '',
            ),
            'ajax' => 
            array (
              'name' => 'ajax',
              'desc' => 'pdotools_prop_ajax',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Включить поддержку ajax запросов.',
              'area_trans' => '',
            ),
            'ajaxMode' => 
            array (
              'name' => 'ajaxMode',
              'desc' => 'pdotools_prop_ajaxMode',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'text' => 'None',
                  'value' => '',
                  'name' => 'None',
                ),
                1 => 
                array (
                  'text' => 'Default',
                  'value' => 'default',
                  'name' => 'Default',
                ),
                2 => 
                array (
                  'text' => 'Scroll',
                  'value' => 'scroll',
                  'name' => 'Scroll',
                ),
                3 => 
                array (
                  'text' => 'Button',
                  'value' => 'button',
                  'name' => 'Button',
                ),
              ),
              'value' => '',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Ajax пагинация "из коробки". Доступны 3 режима: "default", "button" и "scroll".',
              'area_trans' => '',
            ),
            'ajaxElemWrapper' => 
            array (
              'name' => 'ajaxElemWrapper',
              'desc' => 'pdotools_prop_ajaxElemWrapper',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '#pdopage',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'jQuery селектор элемента-обёртки с результатами и пагинацией.',
              'area_trans' => '',
            ),
            'ajaxElemRows' => 
            array (
              'name' => 'ajaxElemRows',
              'desc' => 'pdotools_prop_ajaxElemRows',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '#pdopage .rows',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'jQuery селектор элемента с результатами.',
              'area_trans' => '',
            ),
            'ajaxElemPagination' => 
            array (
              'name' => 'ajaxElemPagination',
              'desc' => 'pdotools_prop_ajaxElemPagination',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '#pdopage .pagination',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'jQuery селектор элемента с пагинацией.',
              'area_trans' => '',
            ),
            'ajaxElemLink' => 
            array (
              'name' => 'ajaxElemLink',
              'desc' => 'pdotools_prop_ajaxElemLink',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '#pdopage .pagination a',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'jQuery селектор ссылки на страницу.',
              'area_trans' => '',
            ),
            'ajaxElemMore' => 
            array (
              'name' => 'ajaxElemMore',
              'desc' => 'pdotools_prop_ajaxElemMore',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '#pdopage .btn-more',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'jQuery селектор кнопки загрузки результатов при ajaxMode = button.',
              'area_trans' => '',
            ),
            'ajaxTplMore' => 
            array (
              'name' => 'ajaxTplMore',
              'desc' => 'pdotools_prop_ajaxTplMore',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '@INLINE <button class="btn btn-primary btn-more">[[%pdopage_more]]</button>',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Шаблон кнопки для загрузки новых результатов при ajaxMode = button. Должен включать селектор, указанный в "ajaxElemMore".',
              'area_trans' => '',
            ),
            'ajaxHistory' => 
            array (
              'name' => 'ajaxHistory',
              'desc' => 'pdotools_prop_ajaxHistory',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'text' => 'Auto',
                  'value' => '',
                  'name' => 'Auto',
                ),
                1 => 
                array (
                  'text' => 'Enabled',
                  'value' => 1,
                  'name' => 'Enabled',
                ),
                2 => 
                array (
                  'text' => 'Disabled',
                  'value' => 0,
                  'name' => 'Disabled',
                ),
              ),
              'value' => '',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Сохранять номер страницы в url при работе в режиме ajax.',
              'area_trans' => '',
            ),
            'frontend_js' => 
            array (
              'name' => 'frontend_js',
              'desc' => 'pdotools_prop_frontend_js',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '[[+assetsUrl]]js/pdopage.min.js',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Ссылка на javascript для подключения сниппетом.',
              'area_trans' => '',
            ),
            'frontend_css' => 
            array (
              'name' => 'frontend_css',
              'desc' => 'pdotools_prop_frontend_css',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '[[+assetsUrl]]css/pdopage.min.css',
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Ссылка на css стили оформления для подключения сниппетом.',
              'area_trans' => '',
            ),
            'setMeta' => 
            array (
              'name' => 'setMeta',
              'desc' => 'pdotools_prop_setMeta',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => true,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Регистрация мета-тегов со ссылками на предыдущую и следующую страницу.',
              'area_trans' => '',
            ),
            'strictMode' => 
            array (
              'name' => 'strictMode',
              'desc' => 'pdotools_prop_strictMode',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => true,
              'lexicon' => 'pdotools:properties',
              'area' => '',
              'desc_trans' => 'Строгий режим работы. pdoPage делает редиректы при загрузке несуществующих страниц.',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => 'core/components/pdotools/elements/snippets/snippet.pdopage.php',
          'content' => '/** @var array $scriptProperties */
/** @var modX $modx */
// Default variables
if (empty($pageVarKey)) {
    $pageVarKey = \'page\';
}
if (empty($pageNavVar)) {
    $pageNavVar = \'page.nav\';
}
if (empty($pageCountVar)) {
    $pageCountVar = \'pageCount\';
}
if (empty($totalVar)) {
    $totalVar = \'total\';
}
if (empty($page)) {
    $page = 1;
}
if (empty($pageLimit)) {
    $pageLimit = 5;
} else {
    $pageLimit = (integer)$pageLimit;
}
if (!isset($plPrefix)) {
    $plPrefix = \'\';
}
if (!empty($scriptProperties[\'ajaxMode\'])) {
    $scriptProperties[\'ajax\'] = 1;
}

// Convert parameters from getPage if exists
if (!empty($namespace)) {
    $plPrefix = $namespace;
}
if (!empty($pageNavTpl)) {
    $scriptProperties[\'tplPage\'] = $pageNavTpl;
}
if (!empty($pageNavOuterTpl)) {
    $scriptProperties[\'tplPageWrapper\'] = $pageNavOuterTpl;
}
if (!empty($pageActiveTpl)) {
    $scriptProperties[\'tplPageActive\'] = $pageActiveTpl;
}
if (!empty($pageFirstTpl)) {
    $scriptProperties[\'tplPageFirst\'] = $pageFirstTpl;
}
if (!empty($pagePrevTpl)) {
    $scriptProperties[\'tplPagePrev\'] = $pagePrevTpl;
}
if (!empty($pageNextTpl)) {
    $scriptProperties[\'tplPageNext\'] = $pageNextTpl;
}
if (!empty($pageLastTpl)) {
    $scriptProperties[\'tplPageLast\'] = $pageLastTpl;
}
if (!empty($pageSkipTpl)) {
    $scriptProperties[\'tplPageSkip\'] = $pageSkipTpl;
}
if (!empty($pageNavScheme)) {
    $scriptProperties[\'scheme\'] = $pageNavScheme;
}
if (!empty($cache_expires)) {
    $scriptProperties[\'cacheTime\'] = $cache_expires;
}
//---
$strictMode = !empty($strictMode);

$isAjax = !empty($scriptProperties[\'ajax\']) && !empty($_SERVER[\'HTTP_X_REQUESTED_WITH\']) && $_SERVER[\'HTTP_X_REQUESTED_WITH\'] == \'XMLHttpRequest\';
if ($isAjax && !isset($_REQUEST[$pageVarKey])) {
    return;
}

/** @var pdoPage $pdoPage */
$fqn = $modx->getOption(\'pdoPage.class\', null, \'pdotools.pdopage\', true);
$path = $modx->getOption(\'pdopage_class_path\', null, MODX_CORE_PATH . \'components/pdotools/model/\', true);
if ($pdoClass = $modx->loadClass($fqn, $path, false, true)) {
    $pdoPage = new $pdoClass($modx, $scriptProperties);
} else {
    return false;
}
$pdoPage->pdoTools->addTime(\'pdoTools loaded\');

// Script and styles
if (!$isAjax && !empty($scriptProperties[\'ajaxMode\'])) {
    $pdoPage->loadJsCss();
}
// Removing of default scripts and styles so they do not overwrote nested snippet parameters
if ($snippet = $modx->getObject(\'modSnippet\', [\'name\' => \'pdoPage\'])) {
    $properties = $snippet->get(\'properties\');
    if ($scriptProperties[\'frontend_js\'] == $properties[\'frontend_js\'][\'value\']) {
        unset($scriptProperties[\'frontend_js\']);
    }
    if ($scriptProperties[\'frontend_css\'] == $properties[\'frontend_css\'][\'value\']) {
        unset($scriptProperties[\'frontend_css\']);
    }
}

// Page
if (isset($_REQUEST[$pageVarKey]) && $strictMode && (!is_numeric($_REQUEST[$pageVarKey]) || ($_REQUEST[$pageVarKey] <= 1 && !$isAjax))) {
    return $pdoPage->redirectToFirst($isAjax);
} elseif (!empty($_REQUEST[$pageVarKey])) {
    $page = (integer)$_REQUEST[$pageVarKey];
}
$scriptProperties[\'page\'] = $page;
$scriptProperties[\'request\'] = $_REQUEST;
$scriptProperties[\'setTotal\'] = true;

// Limit
if (isset($_REQUEST[\'limit\'])) {
    if (is_numeric($_REQUEST[\'limit\']) && abs($_REQUEST[\'limit\']) > 0) {
        $scriptProperties[\'limit\'] = abs($_REQUEST[\'limit\']);
    } elseif ($strictMode) {
        unset($_GET[\'limit\']);

        return $pdoPage->redirectToFirst($isAjax);
    }
}
if (!empty($maxLimit) && !empty($scriptProperties[\'limit\']) && $scriptProperties[\'limit\'] > $maxLimit) {
    $scriptProperties[\'limit\'] = $maxLimit;
}

// Offset
$offset = !empty($scriptProperties[\'offset\']) && $scriptProperties[\'offset\'] > 0
    ? (int)$scriptProperties[\'offset\']
    : 0;
$scriptProperties[\'offset\'] = $page > 1
    ? $scriptProperties[\'limit\'] * ($page - 1) + $offset
    : $offset;
if (!empty($scriptProperties[\'offset\']) && empty($scriptProperties[\'limit\'])) {
    $scriptProperties[\'limit\'] = 10000000;
}

$cache = !empty($cache) || (!$modx->user->id && !empty($cacheAnonymous));
$url = $pdoPage->getBaseUrl();
$output = $pagination = $total = $pageCount = \'\';

$data = $cache
    ? $pdoPage->pdoTools->getCache($scriptProperties)
    : [];

if (empty($data)) {
    $output = $pdoPage->pdoTools->runSnippet($scriptProperties[\'element\'], $scriptProperties);
    if ($output === false) {
        return \'\';
    } elseif (!empty($toPlaceholder)) {
        $output = $modx->getPlaceholder($toPlaceholder);
    }

    // Pagination
    $total = (int)$modx->getPlaceholder($totalVar);
    $pageCount = !empty($scriptProperties[\'limit\']) && $total > $offset
        ? ceil(($total - $offset) / $scriptProperties[\'limit\'])
        : 0;

    // Redirect to start if somebody specified incorrect page
    if ($page > 1 && $page > $pageCount && $strictMode) {
        return $pdoPage->redirectToFirst($isAjax);
    }
    if (!empty($pageCount) && $pageCount > 1) {
        $pagination = [
            \'first\' => $page > 1 && !empty($tplPageFirst)
                ? $pdoPage->makePageLink($url, 1, $tplPageFirst)
                : \'\',
            \'prev\' => $page > 1 && !empty($tplPagePrev)
                ? $pdoPage->makePageLink($url, $page - 1, $tplPagePrev)
                : \'\',
            \'pages\' => $pageLimit >= 7 && empty($disableModernPagination)
                ? $pdoPage->buildModernPagination($page, $pageCount, $url)
                : $pdoPage->buildClassicPagination($page, $pageCount, $url),
            \'next\' => $page < $pageCount && !empty($tplPageNext)
                ? $pdoPage->makePageLink($url, $page + 1, $tplPageNext)
                : \'\',
            \'last\' => $page < $pageCount && !empty($tplPageLast)
                ? $pdoPage->makePageLink($url, $pageCount, $tplPageLast)
                : \'\',
        ];

        if (!empty($pageCount)) {
            foreach ([\'first\', \'prev\', \'next\', \'last\'] as $v) {
                $tpl = \'tplPage\' . ucfirst($v) . \'Empty\';
                if (!empty(${$tpl}) && empty($pagination[$v])) {
                    $pagination[$v] = $pdoPage->pdoTools->getChunk(${$tpl});
                }
            }
        }
    } else {
        $pagination = [
            \'first\' => \'\',
            \'prev\' => \'\',
            \'pages\' => \'\',
            \'next\' => \'\',
            \'last\' => \'\'
        ];
    }

    $data = [
        \'output\' => $output,
        $pageVarKey => $page,
        $pageCountVar => $pageCount,
        $pageNavVar => !empty($tplPageWrapper)
            ? $pdoPage->pdoTools->getChunk($tplPageWrapper, $pagination)
            : $pdoPage->pdoTools->parseChunk(\'\', $pagination),
        $totalVar => $total,
    ];
    if ($cache) {
        $pdoPage->pdoTools->setCache($data, $scriptProperties);
    }
}

if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
    $data[\'output\'] .= \'<pre class="pdoPageLog">\' . print_r($pdoPage->pdoTools->getTime(), 1) . \'</pre>\';
}

if ($isAjax) {
    if ($pageNavVar != \'pagination\') {
        $data[\'pagination\'] = $data[$pageNavVar];
        unset($data[$pageNavVar]);
    }
    if ($pageCountVar != \'pages\') {
        $data[\'pages\'] = (int)$data[$pageCountVar];
        unset($data[$pageCountVar]);
    }
    if ($pageVarKey != \'page\') {
        $data[\'page\'] = (int)$data[$pageVarKey];
        unset($data[$pageVarKey]);
    }
    if ($totalVar != \'total\') {
        $data[\'total\'] = (int)$data[$totalVar];
        unset($data[$totalVar]);
    }

    $maxIterations = (integer)$modx->getOption(\'parser_max_iterations\', null, 10);
    $modx->getParser()->processElementTags(\'\', $data[\'output\'], false, false, \'[[\', \']]\', [], $maxIterations);
    $modx->getParser()->processElementTags(\'\', $data[\'output\'], true, true, \'[[\', \']]\', [], $maxIterations);

    @session_write_close();
    exit(json_encode($data));
} else {
    if (!empty($setMeta)) {
        $charset = $modx->getOption(\'modx_charset\', null, \'UTF-8\');
        $canurl = $pdoPage->pdoTools->config[\'scheme\'] !== \'full\'
            ? rtrim($modx->getOption(\'site_url\'), \'/\') . \'/\' . ltrim($url, \'/\')
            : $url;
        $modx->regClientStartupHTMLBlock(\'<link rel="canonical" href="\' . htmlentities($canurl, ENT_QUOTES, $charset) . \'"/>\');
        if ($data[$pageVarKey] > 1) {
            $prevUrl = $pdoPage->makePageLink($canurl, $data[$pageVarKey] - 1);
            $modx->regClientStartupHTMLBlock(
                \'<link rel="prev" href="\' . htmlentities($prevUrl, ENT_QUOTES, $charset) . \'"/>\'
            );
        }
        if ($data[$pageVarKey] < $data[$pageCountVar]) {
            $nextUrl = $pdoPage->makePageLink($canurl, $data[$pageVarKey] + 1);
            $modx->regClientStartupHTMLBlock(
                \'<link rel="next" href="\' . htmlentities($nextUrl, ENT_QUOTES, $charset) . \'"/>\'
            );
        }
    }

    $modx->setPlaceholders($data, $plPrefix);
    if (!empty($toPlaceholder)) {
        $modx->setPlaceholder($toPlaceholder, $data[\'output\']);
    } else {
        return $data[\'output\'];
    }
}',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'ms2Gallery' => 
      array (
        'fields' => 
        array (
          'id' => 47,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'ms2Gallery',
          'description' => '',
          'editor_type' => 0,
          'category' => 22,
          'cache_type' => 0,
          'snippet' => '/* @var array $scriptProperties */
/* @var ms2Gallery $ms2Gallery */
$ms2Gallery = $modx->getService(\'ms2gallery\', \'ms2Gallery\', MODX_CORE_PATH . \'components/ms2gallery/model/ms2gallery/\');
/* @var pdoFetch $pdoFetch */
if (!$modx->loadClass(\'pdofetch\', MODX_CORE_PATH . \'components/pdotools/model/pdotools/\', false, true)) {
	return false;
}
$pdoFetch = new pdoFetch($modx, $scriptProperties);

$extensionsDir = $modx->getOption(\'extensionsDir\', $scriptProperties, \'components/ms2gallery/img/mgr/extensions/\', true);

// Register styles and scripts on frontend
$config = $ms2Gallery->makePlaceholders($ms2Gallery->config);
$css = $modx->getOption(\'frontend_css\', $scriptProperties, \'frontend_css\');
if (!empty($css) && preg_match(\'/\\.css/i\', $css)) {
	$modx->regClientCSS(str_replace($config[\'pl\'], $config[\'vl\'], $css));
}
$js = $modx->getOption(\'frontend_js\', $scriptProperties, \'frontend_js\');
if (!empty($js) && preg_match(\'/\\.js/i\', $js)) {
	$modx->regClientScript(str_replace($config[\'pl\'], $config[\'vl\'], $js));
}
if (empty($outputSeparator)) {
	$outputSeparator = "\\n";
}
if (empty($tagsSeparator)) {
	$tagsSeparator = \',\';
}

$where = array(
	\'File.parent\' => 0,
);

// Define where parameters
if ($scriptProperties[\'parents\'] == \'\' && empty($scriptProperties[\'resources\'])) {
	$resources = !empty($resource)
		? $resource
		: $modx->resource->get(\'id\');
	$scriptProperties[\'resources\'] = $resources;
}

if (!empty($filetype)) {
	$where[\'File.type:IN\'] = array_map(\'trim\', explode(\',\', $filetype));
}

if (empty($showInactive)) {
	$where[\'File.active\'] = 1;
}

$innerJoin = array(
	\'File\' => array(
		\'class\' => \'msResourceFile\',
		\'on\' => \'File.resource_id = modResource.id\',
	)
);
if (!empty($tagsVar) && isset($_REQUEST[$tagsVar])) {
	$tags = $modx->stripTags($_REQUEST[$tagsVar]);
}
if (!empty($tags)) {
	$tags = array_map(\'trim\', explode(\',\', str_replace(\'"\', \'\', $tags)));
	$tags = implode(\'","\', $tags);
	$innerJoin[\'Tag\'] = array(
		\'class\' => \'msResourceFileTag\',
		\'on\' => \'Tag.file_id = File.id AND Tag.tag IN ("\' . $tags . \'")\',
	);
}

$select = array(
	\'File\' => \'*\'
);

// Set default sort by File table
if (!empty($sortby)) {
	$sortby = array_map(\'trim\', explode(\',\', $sortby));
	foreach ($sortby as &$value) {
		if (strpos($value, \'.\') === false && strpos($value, \'(\') === false) {
			$value = \'File.\' . $value;
		}
	}
	$scriptProperties[\'sortby\'] = implode(\', \', $sortby);
}

// processing additional query params
foreach (array(\'where\', \'innerJoin\', \'select\') as $v) {
	if (!empty($scriptProperties[$v])) {
		$tmp = $modx->fromJSON($scriptProperties[$v]);
		if (is_array($tmp)) {
			$$v = array_merge($$v, $tmp);
		}
	}
	unset($scriptProperties[$v]);
}

if (empty($limit) && !empty($offset)) {
	$scriptProperties[\'limit\'] = 10000;
}

// Default parameters
$default = array(
	\'class\' => \'modResource\',
	\'innerJoin\' => $innerJoin,
	\'where\' => $modx->toJSON($where),
	\'select\' => $select,
	\'limit\' => 10,
	\'sortby\' => \'rank\',
	\'sortdir\' => \'ASC\',
	\'fastMode\' => false,
	\'groupby\' => \'File.id\',
	\'return\' => \'data\',
	\'nestedChunkPrefix\' => \'ms2gallery_\',
);

// Merge all properties and run!
$scriptProperties[\'tpl\'] = !empty($tplRow) ? $tplRow : \'\';
$pdoFetch->setConfig(array_merge($default, $scriptProperties));
$rows = $pdoFetch->run();

if (!empty($rows)) {
	$tmp = current($rows);
	$resolution = array();
	if ($mediaSource = $modx->getObject(\'sources.modMediaSource\', $tmp[\'source\'])) {
		$properties = $mediaSource->getProperties();
		if (isset($properties[\'thumbnails\'][\'value\'])) {
			$fileTypes = $modx->fromJSON($properties[\'thumbnails\'][\'value\']);
			foreach ($fileTypes as $v) {
				$resolution[] = $v[\'w\'] . \'x\' . $v[\'h\'];
			}
		}
	}
}

// Processing rows
$output = null;
$images = array();
foreach ($rows as $k => $row) {
	$row[\'idx\'] = $pdoFetch->idx++;
	$row[\'tags\'] = \'\';

	if (isset($row[\'type\']) && $row[\'type\'] == \'image\') {
		$q = $modx->newQuery(\'msResourceFile\', array(\'parent\' => $row[\'id\']));
		$q->select(\'url\');
		$tstart = microtime(true);
		if ($q->prepare() && $q->stmt->execute()) {
			$modx->queryTime += microtime(true) - $tstart;
			$modx->executedQueries++;
			while ($tmp = $q->stmt->fetchColumn()) {
				if (preg_match(\'/((?:\\d{1,4}|)x(?:\\d{1,4}|))/\', $tmp, $size)) {
					$row[$size[0]] = $tmp;
				}
			}
		}
	}
	elseif (!empty($row[\'type\'])) {
		$row[\'thumbnail\'] = file_exists(MODX_ASSETS_PATH . $extensionsDir . $row[\'type\'] . \'.png\')
			? MODX_ASSETS_URL . $extensionsDir . $row[\'type\'] . \'.png\'
			: MODX_ASSETS_URL . $extensionsDir . \'other.png\';
		foreach ($resolution as $v) {
			$row[$v] = $row[\'thumbnail\'];
		}
	}

	if (!empty($getTags)) {
		$q = $modx->newQuery(\'msResourceFileTag\', array(\'file_id\' => $row[\'id\']));
		$q->select(\'tag\');
		$tstart = microtime(true);
		if ($q->prepare() && $q->stmt->execute()) {
			$modx->queryTime += microtime(true) - $tstart;
			$modx->executedQueries++;
			$row[\'tags\'] = implode($tagsSeparator, $q->stmt->fetchAll(PDO::FETCH_COLUMN));
		}
	}

	$images[] = $row;
}
$pdoFetch->addTime(!empty($getTags) ? \'Thumbnails and tags was retrieved\' : \'Thumbnails was retrieved\');

// Processing chunks
$output = array();
foreach ($images as $row) {
	$tpl = $pdoFetch->defineChunk($row);

	$output[] = empty($tpl)
		? \'<pre>\' . $pdoFetch->getChunk(\'\', $row) . \'</pre>\'
		: $pdoFetch->getChunk($tpl, $row, $pdoFetch->config[\'fastMode\']);
}
$pdoFetch->addTime(\'Rows was templated\');

// Return output
$log = \'\';
if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
	$log .= \'<pre class="ms2GalleryLog">\' . print_r($pdoFetch->getTime(), 1) . \'</pre>\';
}

if (!empty($toSeparatePlaceholders)) {
	$output[\'log\'] = $log;
	$modx->setPlaceholders($output, $toSeparatePlaceholders);
}
else {
	if (count($output) === 1 && !empty($tplSingle)) {
		$output = $pdoFetch->getChunk($tplSingle, array_shift($images));
	}
	else {
		$output = implode($outputSeparator, $output);

		if (!empty($output)) {
			$arr = array_shift($images);
			$arr[\'rows\'] = $output;
			if (!empty($tplOuter)) {
				$output = $pdoFetch->getChunk($tplOuter, $arr);
			}
		}
		else {
			$output = !empty($tplEmpty)
				? $pdoFetch->getChunk($tplEmpty)
				: \'\';
		}
	}

	$output .= $log;
	if (!empty($toPlaceholder)) {
		$modx->setPlaceholder($toPlaceholder, $output);
	}
	else {
		return $output;
	}
}',
          'locked' => false,
          'properties' => 
          array (
            'parents' => 
            array (
              'name' => 'parents',
              'desc' => 'ms2gallery_prop_parents',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Список категорий, через запятую, для поиска результатов. По умолчанию выборка ограничена текущим родителем. Если поставить 0 - выборка не ограничивается.',
              'area_trans' => '',
            ),
            'resources' => 
            array (
              'name' => 'resources',
              'desc' => 'ms2gallery_prop_resources',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Список ресурсов, через запятую, для вывода в результатах. Если id товара начинается с минуса, этот товар исключается из выборки.',
              'area_trans' => '',
            ),
            'showLog' => 
            array (
              'name' => 'showLog',
              'desc' => 'ms2gallery_prop_showLog',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Показывать дополнительную информацию о работе сниппета. Только для авторизованных в контекте "mgr".',
              'area_trans' => '',
            ),
            'toPlaceholder' => 
            array (
              'name' => 'toPlaceholder',
              'desc' => 'ms2gallery_prop_toPlaceholder',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Если не пусто, сниппет сохранит все данные в плейсхолдер с этим именем, вместо вывода не экран.',
              'area_trans' => '',
            ),
            'tplRow' => 
            array (
              'name' => 'tplRow',
              'desc' => 'ms2gallery_prop_tplRow',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.ms2Gallery.row',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Чанк оформления одного элемента выборки.',
              'area_trans' => '',
            ),
            'tplOuter' => 
            array (
              'name' => 'tplOuter',
              'desc' => 'ms2gallery_prop_tplOuter',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.ms2Gallery.outer',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Обёртка для вывода результатов работы сниппета.',
              'area_trans' => '',
            ),
            'tplEmpty' => 
            array (
              'name' => 'tplEmpty',
              'desc' => 'ms2gallery_prop_tplEmpty',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.ms2Gallery.empty',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Чанк, который выводится при отсутствии результатов.',
              'area_trans' => '',
            ),
            'tplSingle' => 
            array (
              'name' => 'tplSingle',
              'desc' => 'ms2gallery_prop_tplSingle',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Чанк, который используется если получен всего один файл.',
              'area_trans' => '',
            ),
            'limit' => 
            array (
              'name' => 'limit',
              'desc' => 'ms2gallery_prop_limit',
              'type' => 'numberfield',
              'options' => 
              array (
              ),
              'value' => 0,
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Лимит выборки результатов',
              'area_trans' => '',
            ),
            'offset' => 
            array (
              'name' => 'offset',
              'desc' => 'ms2gallery_prop_offset',
              'type' => 'numberfield',
              'options' => 
              array (
              ),
              'value' => 0,
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Пропуск результатов с начала выборки',
              'area_trans' => '',
            ),
            'where' => 
            array (
              'name' => 'where',
              'desc' => 'ms2gallery_prop_where',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Строка, закодированная в JSON, с дополнительными условиями выборки. Для фильтрации по файлам нужно использовать псевдоним таблицы "File". Например &where=`{"File.name:LIKE":"%img%"}`.',
              'area_trans' => '',
            ),
            'filetype' => 
            array (
              'name' => 'filetype',
              'desc' => 'ms2gallery_prop_filetype',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Тип файлов для выборки. Можно использовать "image" для указания картинок и расширения для остальных файлов. Например: "image,pdf,xls,doc".',
              'area_trans' => '',
            ),
            'showInactive' => 
            array (
              'name' => 'showInactive',
              'desc' => 'ms2gallery_prop_showInactive',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Показывать неактивные файлы.',
              'area_trans' => '',
            ),
            'sortby' => 
            array (
              'name' => 'sortby',
              'desc' => 'ms2gallery_prop_sortby',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'rank',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Сортировка выборки.',
              'area_trans' => '',
            ),
            'sortdir' => 
            array (
              'name' => 'sortdir',
              'desc' => 'ms2gallery_prop_sortdir',
              'type' => 'list',
              'options' => 
              array (
                0 => 
                array (
                  'text' => 'ASC',
                  'value' => 'ASC',
                  'name' => 'ASC',
                ),
                1 => 
                array (
                  'text' => 'DESC',
                  'value' => 'DESC',
                  'name' => 'DESC',
                ),
              ),
              'value' => 'ASC',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Направление сортировки',
              'area_trans' => '',
            ),
            'frontend_css' => 
            array (
              'name' => 'frontend_css',
              'desc' => 'ms2gallery_prop_frontend_css',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '[[+cssUrl]]web/default.css',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Если вы хотите использовать собственные стили - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
              'area_trans' => '',
            ),
            'frontend_js' => 
            array (
              'name' => 'frontend_js',
              'desc' => 'ms2gallery_prop_frontend_js',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '[[+jsUrl]]web/default.js',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Если вы хотите использовать собственные скрипты - укажите путь к ним здесь, или очистите параметр и загрузите их вручную через шаблон сайта.',
              'area_trans' => '',
            ),
            'tags' => 
            array (
              'name' => 'tags',
              'desc' => 'ms2gallery_prop_tags',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Список тегов, разделённых запятыми, для вывода файлов.',
              'area_trans' => '',
            ),
            'tagsVar' => 
            array (
              'name' => 'tagsVar',
              'desc' => 'ms2gallery_prop_tagsVar',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Если этот параметр не пуст, то сниппет будет принимать из значение "tags" в $_REQUEST[указанноеимя]. Например, если вы укажите здесь "tag", то сниппет будет выводить только файлы, подходящие в $_REQUEST["tag"].',
              'area_trans' => '',
            ),
            'getTags' => 
            array (
              'name' => 'getTags',
              'desc' => 'ms2gallery_prop_getTags',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => false,
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Сделать дополнительные запросы, чтобы получить строку с тегами файла?',
              'area_trans' => '',
            ),
            'tagsSeparator' => 
            array (
              'name' => 'tagsSeparator',
              'desc' => 'ms2gallery_prop_tagsSeparator',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => ',',
              'lexicon' => 'ms2gallery:properties',
              'area' => '',
              'desc_trans' => 'Если вы включили получение тегов файлов при выводе, они будут разделены через строку, указанную в этом параметре.',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => 'core/components/ms2gallery/elements/snippets/snippet.ms2gallery.php',
          'content' => '/* @var array $scriptProperties */
/* @var ms2Gallery $ms2Gallery */
$ms2Gallery = $modx->getService(\'ms2gallery\', \'ms2Gallery\', MODX_CORE_PATH . \'components/ms2gallery/model/ms2gallery/\');
/* @var pdoFetch $pdoFetch */
if (!$modx->loadClass(\'pdofetch\', MODX_CORE_PATH . \'components/pdotools/model/pdotools/\', false, true)) {
	return false;
}
$pdoFetch = new pdoFetch($modx, $scriptProperties);

$extensionsDir = $modx->getOption(\'extensionsDir\', $scriptProperties, \'components/ms2gallery/img/mgr/extensions/\', true);

// Register styles and scripts on frontend
$config = $ms2Gallery->makePlaceholders($ms2Gallery->config);
$css = $modx->getOption(\'frontend_css\', $scriptProperties, \'frontend_css\');
if (!empty($css) && preg_match(\'/\\.css/i\', $css)) {
	$modx->regClientCSS(str_replace($config[\'pl\'], $config[\'vl\'], $css));
}
$js = $modx->getOption(\'frontend_js\', $scriptProperties, \'frontend_js\');
if (!empty($js) && preg_match(\'/\\.js/i\', $js)) {
	$modx->regClientScript(str_replace($config[\'pl\'], $config[\'vl\'], $js));
}
if (empty($outputSeparator)) {
	$outputSeparator = "\\n";
}
if (empty($tagsSeparator)) {
	$tagsSeparator = \',\';
}

$where = array(
	\'File.parent\' => 0,
);

// Define where parameters
if ($scriptProperties[\'parents\'] == \'\' && empty($scriptProperties[\'resources\'])) {
	$resources = !empty($resource)
		? $resource
		: $modx->resource->get(\'id\');
	$scriptProperties[\'resources\'] = $resources;
}

if (!empty($filetype)) {
	$where[\'File.type:IN\'] = array_map(\'trim\', explode(\',\', $filetype));
}

if (empty($showInactive)) {
	$where[\'File.active\'] = 1;
}

$innerJoin = array(
	\'File\' => array(
		\'class\' => \'msResourceFile\',
		\'on\' => \'File.resource_id = modResource.id\',
	)
);
if (!empty($tagsVar) && isset($_REQUEST[$tagsVar])) {
	$tags = $modx->stripTags($_REQUEST[$tagsVar]);
}
if (!empty($tags)) {
	$tags = array_map(\'trim\', explode(\',\', str_replace(\'"\', \'\', $tags)));
	$tags = implode(\'","\', $tags);
	$innerJoin[\'Tag\'] = array(
		\'class\' => \'msResourceFileTag\',
		\'on\' => \'Tag.file_id = File.id AND Tag.tag IN ("\' . $tags . \'")\',
	);
}

$select = array(
	\'File\' => \'*\'
);

// Set default sort by File table
if (!empty($sortby)) {
	$sortby = array_map(\'trim\', explode(\',\', $sortby));
	foreach ($sortby as &$value) {
		if (strpos($value, \'.\') === false && strpos($value, \'(\') === false) {
			$value = \'File.\' . $value;
		}
	}
	$scriptProperties[\'sortby\'] = implode(\', \', $sortby);
}

// processing additional query params
foreach (array(\'where\', \'innerJoin\', \'select\') as $v) {
	if (!empty($scriptProperties[$v])) {
		$tmp = $modx->fromJSON($scriptProperties[$v]);
		if (is_array($tmp)) {
			$$v = array_merge($$v, $tmp);
		}
	}
	unset($scriptProperties[$v]);
}

if (empty($limit) && !empty($offset)) {
	$scriptProperties[\'limit\'] = 10000;
}

// Default parameters
$default = array(
	\'class\' => \'modResource\',
	\'innerJoin\' => $innerJoin,
	\'where\' => $modx->toJSON($where),
	\'select\' => $select,
	\'limit\' => 10,
	\'sortby\' => \'rank\',
	\'sortdir\' => \'ASC\',
	\'fastMode\' => false,
	\'groupby\' => \'File.id\',
	\'return\' => \'data\',
	\'nestedChunkPrefix\' => \'ms2gallery_\',
);

// Merge all properties and run!
$scriptProperties[\'tpl\'] = !empty($tplRow) ? $tplRow : \'\';
$pdoFetch->setConfig(array_merge($default, $scriptProperties));
$rows = $pdoFetch->run();

if (!empty($rows)) {
	$tmp = current($rows);
	$resolution = array();
	if ($mediaSource = $modx->getObject(\'sources.modMediaSource\', $tmp[\'source\'])) {
		$properties = $mediaSource->getProperties();
		if (isset($properties[\'thumbnails\'][\'value\'])) {
			$fileTypes = $modx->fromJSON($properties[\'thumbnails\'][\'value\']);
			foreach ($fileTypes as $v) {
				$resolution[] = $v[\'w\'] . \'x\' . $v[\'h\'];
			}
		}
	}
}

// Processing rows
$output = null;
$images = array();
foreach ($rows as $k => $row) {
	$row[\'idx\'] = $pdoFetch->idx++;
	$row[\'tags\'] = \'\';

	if (isset($row[\'type\']) && $row[\'type\'] == \'image\') {
		$q = $modx->newQuery(\'msResourceFile\', array(\'parent\' => $row[\'id\']));
		$q->select(\'url\');
		$tstart = microtime(true);
		if ($q->prepare() && $q->stmt->execute()) {
			$modx->queryTime += microtime(true) - $tstart;
			$modx->executedQueries++;
			while ($tmp = $q->stmt->fetchColumn()) {
				if (preg_match(\'/((?:\\d{1,4}|)x(?:\\d{1,4}|))/\', $tmp, $size)) {
					$row[$size[0]] = $tmp;
				}
			}
		}
	}
	elseif (!empty($row[\'type\'])) {
		$row[\'thumbnail\'] = file_exists(MODX_ASSETS_PATH . $extensionsDir . $row[\'type\'] . \'.png\')
			? MODX_ASSETS_URL . $extensionsDir . $row[\'type\'] . \'.png\'
			: MODX_ASSETS_URL . $extensionsDir . \'other.png\';
		foreach ($resolution as $v) {
			$row[$v] = $row[\'thumbnail\'];
		}
	}

	if (!empty($getTags)) {
		$q = $modx->newQuery(\'msResourceFileTag\', array(\'file_id\' => $row[\'id\']));
		$q->select(\'tag\');
		$tstart = microtime(true);
		if ($q->prepare() && $q->stmt->execute()) {
			$modx->queryTime += microtime(true) - $tstart;
			$modx->executedQueries++;
			$row[\'tags\'] = implode($tagsSeparator, $q->stmt->fetchAll(PDO::FETCH_COLUMN));
		}
	}

	$images[] = $row;
}
$pdoFetch->addTime(!empty($getTags) ? \'Thumbnails and tags was retrieved\' : \'Thumbnails was retrieved\');

// Processing chunks
$output = array();
foreach ($images as $row) {
	$tpl = $pdoFetch->defineChunk($row);

	$output[] = empty($tpl)
		? \'<pre>\' . $pdoFetch->getChunk(\'\', $row) . \'</pre>\'
		: $pdoFetch->getChunk($tpl, $row, $pdoFetch->config[\'fastMode\']);
}
$pdoFetch->addTime(\'Rows was templated\');

// Return output
$log = \'\';
if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
	$log .= \'<pre class="ms2GalleryLog">\' . print_r($pdoFetch->getTime(), 1) . \'</pre>\';
}

if (!empty($toSeparatePlaceholders)) {
	$output[\'log\'] = $log;
	$modx->setPlaceholders($output, $toSeparatePlaceholders);
}
else {
	if (count($output) === 1 && !empty($tplSingle)) {
		$output = $pdoFetch->getChunk($tplSingle, array_shift($images));
	}
	else {
		$output = implode($outputSeparator, $output);

		if (!empty($output)) {
			$arr = array_shift($images);
			$arr[\'rows\'] = $output;
			if (!empty($tplOuter)) {
				$output = $pdoFetch->getChunk($tplOuter, $arr);
			}
		}
		else {
			$output = !empty($tplEmpty)
				? $pdoFetch->getChunk($tplEmpty)
				: \'\';
		}
	}

	$output .= $log;
	if (!empty($toPlaceholder)) {
		$modx->setPlaceholder($toPlaceholder, $output);
	}
	else {
		return $output;
	}
}',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'phpthumbon' => 
      array (
        'fields' => 
        array (
          'id' => 43,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'phpthumbon',
          'description' => 'Создание превьюх картинок',
          'editor_type' => 0,
          'category' => 0,
          'cache_type' => 0,
          'snippet' => '/**
 * phpThumbOn
 * Создание превьюх картинок
 *
 * Copyright 2013 by Agel_Nash <Agel_Nash@xaker.ru>
 *
 * @category images
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 */

if(empty($modx) || !($modx instanceof modX)) return \'\';

$componentPath = (string)$modx->getOption(\'phpthumbon.core_path\', null, $modx->getOption(\'core_path\').\'components/phpthumbon/\');

if(!isset($modx->phpThumbOn)){
    $modx->phpThumbOn = $modx->getService("phpthumbon","phpThumbOn",$componentPath.\'model/phpthumbon/\', $scriptProperties);
}

if(!($flag = ($modx->phpThumbOn instanceof phpThumbOn))){
    $modx->phpThumbOn = null;
}
return $flag ? $modx->phpThumbOn->run($scriptProperties) : $modx->getOption(\'phpthumbon.noimage\', $scriptProperties);',
          'locked' => false,
          'properties' => 
          array (
            'input' => 
            array (
              'name' => 'input',
              'desc' => 'phpthumbon.input',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'phpthumbon:properties',
              'area' => '',
              'desc_trans' => 'Путь к картинке',
              'area_trans' => '',
            ),
            'options' => 
            array (
              'name' => 'options',
              'desc' => 'phpthumbon.folder',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'phpthumbon:properties',
              'area' => '',
              'desc_trans' => 'phpthumbon.folder',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '/**
 * phpThumbOn
 * Создание превьюх картинок
 *
 * Copyright 2013 by Agel_Nash <Agel_Nash@xaker.ru>
 *
 * @category images
 * @license GNU General Public License (GPL), http://www.gnu.org/copyleft/gpl.html
 * @author Agel_Nash <Agel_Nash@xaker.ru>
 */

if(empty($modx) || !($modx instanceof modX)) return \'\';

$componentPath = (string)$modx->getOption(\'phpthumbon.core_path\', null, $modx->getOption(\'core_path\').\'components/phpthumbon/\');

if(!isset($modx->phpThumbOn)){
    $modx->phpThumbOn = $modx->getService("phpthumbon","phpThumbOn",$componentPath.\'model/phpthumbon/\', $scriptProperties);
}

if(!($flag = ($modx->phpThumbOn instanceof phpThumbOn))){
    $modx->phpThumbOn = null;
}
return $flag ? $modx->phpThumbOn->run($scriptProperties) : $modx->getOption(\'phpthumbon.noimage\', $scriptProperties);',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
        ),
      ),
      'officeAuth' => 
      array (
        'fields' => 
        array (
          'id' => 86,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'officeAuth',
          'description' => '',
          'editor_type' => 0,
          'category' => 45,
          'cache_type' => 0,
          'snippet' => '/** @var array $scriptProperties */
$scriptProperties[\'action\'] = \'Auth\';

/** @var modSnippet $snippet */
if ($snippet = $modx->getObject(\'modSnippet\', array(\'name\' => \'Office\'))) {
    $snippet->_cacheable = false;
    $snippet->_processed = false;

    return $snippet->process($scriptProperties);
}',
          'locked' => false,
          'properties' => 
          array (
            'tplLogin' => 
            array (
              'name' => 'tplLogin',
              'desc' => 'office_prop_tplLogin',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.Office.auth.login',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Этот чанк будет показан анонимному пользователю, то есть любому гостю.',
              'area_trans' => '',
            ),
            'tplLogout' => 
            array (
              'name' => 'tplLogout',
              'desc' => 'office_prop_tplLogout',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.Office.auth.logout',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Этот чанк будет показан авторизованному пользователю.',
              'area_trans' => '',
            ),
            'tplActivate' => 
            array (
              'name' => 'tplActivate',
              'desc' => 'office_prop_tplActivate',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.Office.auth.activate',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Чанк для оформления письма активации.',
              'area_trans' => '',
            ),
            'tplRegister' => 
            array (
              'name' => 'tplRegister',
              'desc' => 'office_prop_tplRegister',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.Office.auth.register',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Чанк для оформления письма регистрации.',
              'area_trans' => '',
            ),
            'linkTTL' => 
            array (
              'name' => 'linkTTL',
              'desc' => 'office_prop_linkTTL',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 600,
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Время жизни ссылки активации профиля.',
              'area_trans' => '',
            ),
            'groups' => 
            array (
              'name' => 'groups',
              'desc' => 'office_prop_groups',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Список групп для регистрации пользователя, через запятую. Можно указывать роль юзера в группе через двоеточие. Например, &groups=`Users:1` добавит юзера в группу "Users" с ролью "member".',
              'area_trans' => '',
            ),
            'rememberme' => 
            array (
              'name' => 'rememberme',
              'desc' => 'office_prop_rememberme',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => true,
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Запомниает пользователя на долгое время. По умолчанию - включено.',
              'area_trans' => '',
            ),
            'loginContext' => 
            array (
              'name' => 'loginContext',
              'desc' => 'office_prop_loginContext',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Основной контекст для авторизации. По умолчанию - текущий.',
              'area_trans' => '',
            ),
            'addContexts' => 
            array (
              'name' => 'addContexts',
              'desc' => 'office_prop_addContexts',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Дополнительные контексты, через запятую. Например, &addContexts=`web,ru,en`',
              'area_trans' => '',
            ),
            'loginResourceId' => 
            array (
              'name' => 'loginResourceId',
              'desc' => 'office_prop_loginResourceId',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 0,
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Идентификатор ресурса, на который отправлять юзера после авторизации. По умолчанию, это 0 - обновляет текущую страницу.',
              'area_trans' => '',
            ),
            'logoutResourceId' => 
            array (
              'name' => 'logoutResourceId',
              'desc' => 'office_prop_logoutResourceId',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 0,
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Идентификатор ресурса, на который отправлять юзера после завершения сессии. По умолчанию, это 0 - обновляет текущую страницу.',
              'area_trans' => '',
            ),
            'HybridAuth' => 
            array (
              'name' => 'HybridAuth',
              'desc' => 'office_prop_HybridAuth',
              'type' => 'combo-boolean',
              'options' => 
              array (
              ),
              'value' => true,
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Включить интеграцию с HybridAuth, если он установлен.',
              'area_trans' => '',
            ),
            'providers' => 
            array (
              'name' => 'providers',
              'desc' => 'office_prop_providers',
              'type' => '',
              'options' => 
              array (
              ),
              'value' => '',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Список провайдеров авторизации HybridAuth, через запятую. Все доступные провайдеры находятся тут {core_path}components/hybridauth/model/hybridauth/lib/Providers/. Например, &providers=`Google,Twitter,Facebook`.',
              'area_trans' => '',
            ),
            'providerTpl' => 
            array (
              'name' => 'providerTpl',
              'desc' => 'office_prop_providerTpl',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.HybridAuth.provider',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Чанк для вывода ссылки на авторизацию или привязку сервиса HybridAuth к учетной записи.',
              'area_trans' => '',
            ),
            'activeProviderTpl' => 
            array (
              'name' => 'activeProviderTpl',
              'desc' => 'office_prop_activeProviderTpl',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'tpl.HybridAuth.provider.active',
              'lexicon' => 'office:properties',
              'area' => '',
              'desc_trans' => 'Чанк для вывода иконки привязанного сервиса HybridAuth.',
              'area_trans' => '',
            ),
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => 'core/components/office/elements/snippets/snippet.office.auth.php',
          'content' => '/** @var array $scriptProperties */
$scriptProperties[\'action\'] = \'Auth\';

/** @var modSnippet $snippet */
if ($snippet = $modx->getObject(\'modSnippet\', array(\'name\' => \'Office\'))) {
    $snippet->_cacheable = false;
    $snippet->_processed = false;

    return $snippet->process($scriptProperties);
}',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'phoneGeneratorLinks' => 
      array (
        'fields' => 
        array (
          'id' => 60,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'phoneGeneratorLinks',
          'description' => 'Сниппет генерирующий ссылку для звонка с сайта

пример: [[!phoneGeneratorLinks? &tvparam=`[[!++my_phones]]` &outerPhone=``]]',
          'editor_type' => 0,
          'category' => 43,
          'cache_type' => 0,
          'snippet' => '/*========== Сниппет для генерации ссылок для звонка с сайта =========
пример: [[!phoneGeneratorLinks? &tvparam=`[[!++my_phones]]` &outerPhone=`` &brOn=``]]

&tvparam    - здесь указывается плейсхолер TV-поля с перечнем телефонов, или можно вписать телефоны через ";".
&outerPhone - параметр через который можно указать какой телефон вывести, указывается порядковый номер в перечне номеров.
              Например, написать "2". Можно указать как одну цифру, так и несколько значений через запятую.
              Если поле пустое, то выводятся все номера телефонов
&brOn       - укажите необходим ли перевод на новую строку. Доступные значения 0/1
===================================================================== */

// преобразуем строку с телефонами в массив
$massPhone = explode(";",$tvparam);
$count = count($massPhone);
// преобразуем строку с номерами в массив
$outerPhoneMass = explode(",",$outerPhone);
// проверяем существование функции, длвставки её на странице
if (!function_exists(\'getLinkPhone\')) {
    // создаём функцию для создания ссылки
    function getLinkPhone($phone){
        // убераем все символы из строки кроме цифр и пробелов
        $phoneLink = preg_replace(\'/[^0-9 ,]/\', \'\', $phone);
        // убераем все пробелы
        $phoneLink = str_replace(" ","",$phoneLink);
        // получаем первую цифру телефона
        $rest = substr($phoneLink, 0, -10);
        // если это 7, то добавляем +
        if ($rest == 7) {
            $phoneLink = "+$phoneLink";
        }
        // возвращаем ссылку с телефоном
        return \'<a href="tel:\'.$phoneLink.\'" class="phone" title="Позвонить по номеру \'.$phoneLink.\'">\'.$phone.\'</a>\';
    }
}
// перебераем список телефонов
foreach($massPhone as $key => $phone){
    // сравниваем порядковый номер элемента массива с указанными пользователем номерами или проверяем отсутствует ли порядковый номер указанный пользователем
    if((in_array($key + 1,$outerPhoneMass) && $outerPhone != "") || $outerPhone == "") {
        // если условие удовлетваряет требованию, то выводим результат на страницу
        echo getLinkPhone($phone);
        if(($count-1 != $key) && $brOn) echo "<br />";
    }
}',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '/*========== Сниппет для генерации ссылок для звонка с сайта =========
пример: [[!phoneGeneratorLinks? &tvparam=`[[!++my_phones]]` &outerPhone=`` &brOn=``]]

&tvparam    - здесь указывается плейсхолер TV-поля с перечнем телефонов, или можно вписать телефоны через ";".
&outerPhone - параметр через который можно указать какой телефон вывести, указывается порядковый номер в перечне номеров.
              Например, написать "2". Можно указать как одну цифру, так и несколько значений через запятую.
              Если поле пустое, то выводятся все номера телефонов
&brOn       - укажите необходим ли перевод на новую строку. Доступные значения 0/1
===================================================================== */

// преобразуем строку с телефонами в массив
$massPhone = explode(";",$tvparam);
$count = count($massPhone);
// преобразуем строку с номерами в массив
$outerPhoneMass = explode(",",$outerPhone);
// проверяем существование функции, длвставки её на странице
if (!function_exists(\'getLinkPhone\')) {
    // создаём функцию для создания ссылки
    function getLinkPhone($phone){
        // убераем все символы из строки кроме цифр и пробелов
        $phoneLink = preg_replace(\'/[^0-9 ,]/\', \'\', $phone);
        // убераем все пробелы
        $phoneLink = str_replace(" ","",$phoneLink);
        // получаем первую цифру телефона
        $rest = substr($phoneLink, 0, -10);
        // если это 7, то добавляем +
        if ($rest == 7) {
            $phoneLink = "+$phoneLink";
        }
        // возвращаем ссылку с телефоном
        return \'<a href="tel:\'.$phoneLink.\'" class="phone" title="Позвонить по номеру \'.$phoneLink.\'">\'.$phone.\'</a>\';
    }
}
// перебераем список телефонов
foreach($massPhone as $key => $phone){
    // сравниваем порядковый номер элемента массива с указанными пользователем номерами или проверяем отсутствует ли порядковый номер указанный пользователем
    if((in_array($key + 1,$outerPhoneMass) && $outerPhone != "") || $outerPhone == "") {
        // если условие удовлетваряет требованию, то выводим результат на страницу
        echo getLinkPhone($phone);
        if(($count-1 != $key) && $brOn) echo "<br />";
    }
}',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
      'socialLinks' => 
      array (
        'fields' => 
        array (
          'id' => 71,
          'source' => 1,
          'property_preprocess' => false,
          'name' => 'socialLinks',
          'description' => 'Сниппет для вывода социальных ссылок',
          'editor_type' => 0,
          'category' => 43,
          'cache_type' => 0,
          'snippet' => '/* ===================================================
Сниппет для вывода социальных ссылок

пример использования: [[!socialLinks? &links=`phone,vk,facebook,ok,instagram,whatsapp,telegram` &colored=`1` &phone=``]]

используемые параметры:
&links - перечень необходимых ссылок для данного вывода (они будут выведены только если ссылка/телефон для данного поля указана)
&colored - укажите 0 или 1. Если указана 1, у блока появится класс "color-ico"
&phone - указать номер телефона, необходим если в перечне иконок указан параметр phone и необходимо вывести конкретное значение. Если не указан, то берётся первый номер телефона из конфигураций

===================================================== */
// если выставлен параметр цвета в 1, то присваиваем переменной название класса
$colored = ($colored)? "color-ico" : "";
// разбиваем строку на массив
$links = explode(",",$links);
// если полученный массив не пустой и его первое значение не равно пустому значению
if(count($links)>0 && $links[0] != "") {
    // формируем строку с открытым контейнеров
    $content = \'<!-- SOCIAL LINKS --><div class="social-links header-links \'.$colored.\'">\';
    // перебераем список элементов которые необходимо вывести
    foreach ($links as $element) {
        // подгружаем соответственный параметр из конфигурации
        if($element != "phone") {
            $value = $modx->getOption("my_link_".$element);
            $key = "b";
        } else {
            if(!$phone){
                $phones = $modx->getOption("my_".$element."s");
                // преобразуем строку с телефонами в массив
                $phone = explode(";",$phones)[0];
            }
            
            // убераем все символы из строки кроме цифр и пробелов
            $phoneLink = preg_replace(\'/[^0-9 ,]/\', \'\', $phone);
            // убераем все пробелы
            $phoneLink = str_replace(" ","",$phoneLink);
            // получаем первую цифру телефона
            $rest = substr($phoneLink, 0, -10);
            // если это 7, то добавляем +
            if ($rest == 7) {
                $phoneLink = "+$phoneLink";
            }
            // присваиваем значение переменной value
            $value = $phoneLink;
            $key = "s";
        }
        $elementIco = $element;
        // если значение существует
        if($value){
            // проверяем нужно ли поменять иконку или преобразовать ссылку
            switch($element){
                case "phone": // если это facebook то преобразуем название для иконки
                    $value = "tel:".$value;
                break;
                case "facebook": // если это facebook то преобразуем название для иконки
                    $elementIco = "facebook-f";
                break;
                case "ok": // если это ok то преобразуем название для иконки
                    $elementIco = "odnoklassniki";
                break;
                case "telegram": // если это telegram то преобразуем название для иконки и формируем ссылку
                    $elementIco = "telegram-plane";
                    $value = "https://t.me/".$value;
                break;
                case "whatsapp": // если это whatsapp то преобразуем ссылку для вставки
                    $value = "https://api.whatsapp.com/send?phone=".$value;
                break;
            }
            // формируем строку для вывода для указанного параметра
            $content .= \'<a href="\'.$value.\'" title="Перейти в \'.$element.\'" target="_blank"><i class="fa\'.$key.\' fa-\'.$elementIco.\' ico-block" aria-hidden="true"></i></a>\';
        }
    }
    // закрываем контейнер
    $content .= \'</div><!-- /SOCIAL LINKS -->\';
    // возвращаем полученный результат
    return $content;
    
}',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => '/* ===================================================
Сниппет для вывода социальных ссылок

пример использования: [[!socialLinks? &links=`phone,vk,facebook,ok,instagram,whatsapp,telegram` &colored=`1` &phone=``]]

используемые параметры:
&links - перечень необходимых ссылок для данного вывода (они будут выведены только если ссылка/телефон для данного поля указана)
&colored - укажите 0 или 1. Если указана 1, у блока появится класс "color-ico"
&phone - указать номер телефона, необходим если в перечне иконок указан параметр phone и необходимо вывести конкретное значение. Если не указан, то берётся первый номер телефона из конфигураций

===================================================== */
// если выставлен параметр цвета в 1, то присваиваем переменной название класса
$colored = ($colored)? "color-ico" : "";
// разбиваем строку на массив
$links = explode(",",$links);
// если полученный массив не пустой и его первое значение не равно пустому значению
if(count($links)>0 && $links[0] != "") {
    // формируем строку с открытым контейнеров
    $content = \'<!-- SOCIAL LINKS --><div class="social-links header-links \'.$colored.\'">\';
    // перебераем список элементов которые необходимо вывести
    foreach ($links as $element) {
        // подгружаем соответственный параметр из конфигурации
        if($element != "phone") {
            $value = $modx->getOption("my_link_".$element);
            $key = "b";
        } else {
            if(!$phone){
                $phones = $modx->getOption("my_".$element."s");
                // преобразуем строку с телефонами в массив
                $phone = explode(";",$phones)[0];
            }
            
            // убераем все символы из строки кроме цифр и пробелов
            $phoneLink = preg_replace(\'/[^0-9 ,]/\', \'\', $phone);
            // убераем все пробелы
            $phoneLink = str_replace(" ","",$phoneLink);
            // получаем первую цифру телефона
            $rest = substr($phoneLink, 0, -10);
            // если это 7, то добавляем +
            if ($rest == 7) {
                $phoneLink = "+$phoneLink";
            }
            // присваиваем значение переменной value
            $value = $phoneLink;
            $key = "s";
        }
        $elementIco = $element;
        // если значение существует
        if($value){
            // проверяем нужно ли поменять иконку или преобразовать ссылку
            switch($element){
                case "phone": // если это facebook то преобразуем название для иконки
                    $value = "tel:".$value;
                break;
                case "facebook": // если это facebook то преобразуем название для иконки
                    $elementIco = "facebook-f";
                break;
                case "ok": // если это ok то преобразуем название для иконки
                    $elementIco = "odnoklassniki";
                break;
                case "telegram": // если это telegram то преобразуем название для иконки и формируем ссылку
                    $elementIco = "telegram-plane";
                    $value = "https://t.me/".$value;
                break;
                case "whatsapp": // если это whatsapp то преобразуем ссылку для вставки
                    $value = "https://api.whatsapp.com/send?phone=".$value;
                break;
            }
            // формируем строку для вывода для указанного параметра
            $content .= \'<a href="\'.$value.\'" title="Перейти в \'.$element.\'" target="_blank"><i class="fa\'.$key.\' fa-\'.$elementIco.\' ico-block" aria-hidden="true"></i></a>\';
        }
    }
    // закрываем контейнер
    $content .= \'</div><!-- /SOCIAL LINKS -->\';
    // возвращаем полученный результат
    return $content;
    
}',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
    ),
    'modTemplateVar' => 
    array (
      'tvimage' => 
      array (
        'fields' => 
        array (
          'id' => 5,
          'source' => 1,
          'property_preprocess' => false,
          'type' => 'image',
          'name' => 'tvimage',
          'caption' => 'Картинка',
          'description' => 'Здесь указывается картинка, которая будет отображаться в каталоге',
          'editor_type' => 0,
          'category' => 27,
          'locked' => false,
          'elements' => '',
          'rank' => 0,
          'display' => 'default',
          'default_text' => '',
          'properties' => 
          array (
          ),
          'input_properties' => 
          array (
            'allowBlank' => 'true',
          ),
          'output_properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'localizator_enabled' => false,
          'content' => '',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
          'id' => 1,
          'name' => 'Filesystem',
          'description' => '',
          'class_key' => 'sources.modFileMediaSource',
          'properties' => 
          array (
            'basePath' => 
            array (
              'name' => 'basePath',
              'desc' => 'prop_file.basePath_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
            'baseUrl' => 
            array (
              'name' => 'baseUrl',
              'desc' => 'prop_file.baseUrl_desc',
              'type' => 'textfield',
              'options' => 
              array (
              ),
              'value' => 'upload/',
              'lexicon' => 'core:source',
            ),
          ),
          'is_stream' => true,
        ),
      ),
    ),
  ),
);