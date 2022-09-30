{if count($rates)}
    <label for="rate" class="form-control-static control-label col-md-4">
        {'payandsee_term' | lexicon}:
    </label>
    <div class="form-group col-md-8">
        <select name="rate" class="form-control">
            {foreach $rates as $row}
                {set $checked = $row.id == $.request.rate || !$.request.rate && $row.id == $order.rate}

                <option value="{$row.id}" id="rate_{$row.id}" title="{$row.description}" {$checked ? 'selected' : ''}>
                    {$row.term_value} - {$row.term_value | decl : (('payandsee_decl_date_' ~ $row.term_unit) | lexicon)}
                    {$row.cost} {'payandsee_unit_cost' | lexicon}
                </option>
            {/foreach}
        </select>
    </div>
{/if}
