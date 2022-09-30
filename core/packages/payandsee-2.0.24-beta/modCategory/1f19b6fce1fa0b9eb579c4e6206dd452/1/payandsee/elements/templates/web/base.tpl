<!DOCTYPE html>
<html lang="en">

<head>
    {block 'head'}
        <meta charset="{'modx_charset'|option}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <base href="{'site_url'|option}"/>
        <title>{'!pdoTitle'|snippet} / {'site_name'|option}</title>
    {/block}

    {block 'head.script'}
        <link rel="stylesheet" href="/assets/components/themebootstrap/css/bootstrap.min.css" type="text/css"/>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    {/block}
</head>

<body>

{block 'navbar'}
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{'site_name'|option}</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    {'pdoMenu'|snippet:[
                    'startId'=>0,
                    'level'=>2,
                    'tplParentRow'=>'@INLINE <li class="{$classnames} dropdown">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown" {$attributes}>{$menutitle}<b class="caret"></b></a>
					    <ul class="dropdown-menu">{$wrapper}</ul></li>',
                    'tplOuter'=>'@INLINE {$wrapper}'
                    ]}
                </ul>
            </div>
        </div>
    </div>
{/block}

{block 'content'}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {$_modx->resource.content}
            </div>
        </div>
    </div>
{/block}

{block 'footer'}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-8">
                <p>
                    <small>
                        {filter|strip|replace:["\t"]:""}
                        {set $tmp = $_modx->getInfo('',false)}
                        {foreach ['queries', 'totalTime', 'queryTime', 'phpTime' ,'source', 'log_'] as $k}
                            {if $tmp[$k]}
                                {$k} : {$tmp[$k]}
                            {/if}
                        {/foreach}
                        {/filter}
                    </small>
                </p>
            </div>
            <div class="col-md-4">
                <p class="">&copy;2017 {'site_name'|option}</p>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    </div>
{/block}

{block 'footer.script'}
    <!-- footer-css -->
    <!-- footer-css -->

    <script src="{'assets_url'|option}components/themebootstrap/js/jquery.min.js"></script>

    <!-- footer-scripts -->
    <script src="{'assets_url'|option}components/themebootstrap/js/bootstrap.min.js"></script>
    <!-- footer-scripts -->
{/block}

</body>
</html>
