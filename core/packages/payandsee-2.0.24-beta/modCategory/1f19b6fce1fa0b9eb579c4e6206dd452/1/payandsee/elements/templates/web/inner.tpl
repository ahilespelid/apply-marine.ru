{extends 'template:Base'}

{block 'head.script'}
    {parent}
    {* подключаем QuickView для вызова формы покупки в модальном окне *}
    {'QuickView.initialize'|snippet:['bootstrapModalJsCss'=>0,'bootstrapDialogJsCss'=>1]}
{/block}

{block 'content'}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3>{'site_name'|option}</h3>

                {$_modx->resource.content}

                {'!pdoPage'|snippet:[
                'element' => 'pdoResources',
                'parents' => $_modx->resource.id == 2 ? 2 : $_modx->resource.id,
                'showHidden' => 0,
                'useWeblinkUrl' => 1,
                'sortby' => '{"menuindex":"asc"}',
                'tpl' => '@INLINE <p>{$idx}.
                    {set $access = $id|pasraccess:0:$id}
                    <a href="{$link}">{$pagetitle}</a> {if !$access} <sup>нужна подписка</sup>{/if}
                </p>',
                'tplPageWrapper' => '@INLINE <ul class="pagination">{$first}{$prev}{$pages}{$next}{$last}</ul>',
                ]}

                {'page.nav'|placeholder}
            </div>

            <div class="col-md-12">
                <h4>Подписки</h4>

                {var $tmp = $_modx->getChildIds($_modx->resource.id)}
                {var $tmp[] = $_modx->resource.id}

                {'!pdoPage'|snippet:[
                'element' => 'pas.content',
                'parents' => 0,
                'resources' => $tmp|join
                ]}

            </div>

        </div>
    </div>
{/block}
