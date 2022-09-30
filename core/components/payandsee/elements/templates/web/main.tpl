{extends 'template:Base'}

{block 'content'}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>{'site_name'|option}</h3>

                {$_modx->resource.content}

                {'!pdoPage'|snippet:[
                'element' => 'pdoResources',
                'parents' => 0,
                'useWeblinkUrl' => 1,
                'tpl' => '@INLINE <p>{$idx}. <a href="{$link}">{$pagetitle}</a></p>',
                'tplPageWrapper' => '@INLINE <ul class="pagination">{$first}{$prev}{$pages}{$next}{$last}</ul>',
                ]}

                {'page.nav'|placeholder}
            </div>
        </div>
    </div>
{/block}