<div class="pas-content row">
    <form method="get" action="{$action}" class="quickview"
          data-formsubmit
          data-data-action="snippet"
          data-data-element="!pas.order"
          data-data-id="{$content_resource}"
          data-quickview-sethash="true"
          data-hash-content="{$content_id}"
          data-dialog-title=""
          data-dialog-size="size-wide"
    >
        <input type="hidden" name="content" value="{$content_id}">

        <div class="col-md-12">
            <h4><a href="{$id | url}">{$content_name}</a></h4>
            {if $content_description}
                <p>
                    <small>{$content_description}</small>
                </p>
            {/if}
        </div>

        <div class="col-md-6 form-group">
            <div class="row">
                {'pas.rate'|chunk:['rates'=>$rates]}
            </div>
        </div>

        <div class="col-md-6 form-group">
            <div class="row">
                <div class="col-md-3 form-group">
                    <button class="btn btn-default btn-block" type="submit">
                        <i class="glyphicon glyphicon-barcode"></i> {'payandsee_action_buy' | lexicon}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


