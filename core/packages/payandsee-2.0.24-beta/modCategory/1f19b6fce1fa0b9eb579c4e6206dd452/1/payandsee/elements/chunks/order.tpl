<div class="pas-order row">
    <form method="post" class="pas-form">
        <input type="hidden" name="content" id="content_{$content_id}" value="{$content_id}">
        <input type="hidden" name="delivery" id="delivery_{$form.delivery}" value="{$form.delivery}">

        <div class="col-md-12">
            <h4><a href="{$id | url}">{$content_name}</a></h4>
            {if $content_description}
                <p>
                    <small>{$content_description}</small>
                </p>
            {/if}
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 form-group">
                    <div class="row">
                        {'pas.rate'|chunk:['rates'=>$rates,'order'=>$order]}
                    </div>

                    <div class="row input-parent">
                        <label class="form-control-static control-label col-md-4">
                            {'payandsee_payment' | lexicon}:
                        </label>
                        <div class="form-group col-md-8">
                            <select name="payment" class="form-control">
                                {foreach $payments as $row}
                                    {set $checked = $row.id == $order.payment ? 'checked' : ''}
                                    <option value="{$row.id}" id="payment_{$row.id}"
                                            title="{$row.description}" {$checked ? 'selected' : ''}>
                                        {$row.name}
                                    </option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 form-group">
                    {foreach ['email','phone'] as $field}
                        <div class="row input-parent">
                            <label class="form-control-static control-label col-md-4" for="{$field}">
                                {('payandsee_' ~ $field) | lexicon}<span class="required-star">*</span>:
                            </label>
                            <div class="form-group col-md-8">
                                <input type="text" id="{$field}"
                                       placeholder="{('payandsee_' ~ $field) | lexicon}"
                                       name="{$field}" value="{$form[$field]}"
                                       class="form-control{($field in list $errors) ? ' error' : ''}">
                            </div>
                        </div>
                    {/foreach}

                    <!-- add "msDiscount"-->
                    {if 0}
                        {set $field = 'coupon_code'}
                        <div class="row input-parent">
                            <label class="form-control-static control-label col-md-4" for="{$field}">
                                {('payandsee_' ~ $field) | lexicon}:
                            </label>
                            <div class="form-group col-md-8">
                                <input type="text" id="{$field}"
                                       placeholder="XXXXX-XXXX-XXXX-XXXX"
                                       name="{$field}" value="{$order[$field]}"
                                       class="form-control{($field in list $errors) ? ' error' : ''}">
                            </div>
                        </div>
                    {/if}

                    <!-- add "msPromoCode"-->
                    {if 0}
                        {set $field = 'mspromo_code'}
                        <div class="row input-parent">
                            <label class="form-control-static control-label col-md-4" for="{$field}">
                                {('payandsee_' ~ $field) | lexicon}:
                            </label>
                            <div class="form-group col-md-8">
                                <input type="text" id="{$field}"
                                       placeholder="XXXXX-XXXX-XXXX"
                                       name="{$field}" value="{$order[$field]}"
                                       class="form-control{($field in list $errors) ? ' error' : ''}">
                            </div>
                        </div>
                    {/if}


                    {set $field = 'comment'}
                    <div class="row input-parent">
                        <label class="form-control-static control-label col-md-4" for="{$field}">
                            {('payandsee_' ~ $field) | lexicon}:
                        </label>
                        <div class="form-group col-md-8">
                            <textarea name="{$field}" id="{$field}" placeholder="{('payandsee_' ~ $field) | lexicon}"
                                      class="form-control{($field in list $errors) ? ' error' : ''}">{$form[$field]}</textarea>
                        </div>
                    </div>

                    {set $field = 'agree'}
                    <div class="row input-parent">
                        <label class="form-control-static control-label col-md-4" for="{$field}">
                            {('payandsee_' ~ $field) | lexicon}<span class="required-star">*</span>:
                        </label>
                        <div class="form-group col-md-8">
                            <input type="checkbox" name="{$field}" value="1" id="{$field}">
                            {('payandsee_order_' ~ $field) | lexicon}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12">
            <div class="well">
                <h3>{'payandsee_order_cost' | lexicon}:
                    <span id="pas-order-cost">{$order.cost ?: 0}</span>
                    {'payandsee_unit_cost' | lexicon}
                </h3>
                <button type="submit" name="pasaction" value="order/submit"
                        class="btn btn-default btn-primary pas_link">
                    {'payandsee_order_submit' | lexicon}
                </button>
            </div>
        </div>

    </form>
</div>

