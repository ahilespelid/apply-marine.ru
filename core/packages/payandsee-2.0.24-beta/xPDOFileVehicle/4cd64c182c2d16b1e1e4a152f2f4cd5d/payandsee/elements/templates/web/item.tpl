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
                <h3>{$_modx->resource.longtitle?:$_modx->resource.pagetitle}</h3>

                {* далее можно использовать для проверки доступа переменную $access *}
                {set $access = $_modx->resource.id|pasraccess:0}

                {if !$access}
                    <p class="bg-danger">нужна подписка</p>
                {else}
                    <p class="bg-success">подписка активна</p>
                {/if}

                {$_modx->resource.content|pasraccess:('pas.content'|snippet:['resource'=>''])}

            </div>
        </div>
    </div>
{/block}
