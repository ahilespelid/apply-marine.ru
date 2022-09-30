<div class="pas-order">
    <div class="table-responsive">
        <table class="table table-striped">
            <tr class="header">
                <th class="name col-md-4">{'payandsee_content' | lexicon}</th>
                <th class="options col-md-2">{'payandsee_term' | lexicon}</th>
                <th class="cost col-md-1">{'payandsee_cost' | lexicon}</th>
            </tr>
            {foreach $products as $row}
                <tr>
                    <td class="name">
                        <h4><a href="{$row.content_resource | url}">{$row.content_name}</a></h4>
                        {if $row.content_description}
                            <p>
                                <small>{$row.content_description}</small>
                            </p>
                        {/if}
                    </td>
                    <td class="options">
                        {if $row.term_value?}
                            <div class="small">
                                {$row.term_value} - {$row.term_value | decl : (('payandsee_decl_date_' ~ $row.term_unit) | lexicon)}
                            </div>
                        {/if}
                    </td>
                    <td class="cost">
                        {$row.cost} {'payandsee_unit_cost' | lexicon}
                    </td>
                </tr>
            {/foreach}
            <tr class="footer">
                <th class="">
                    {'payandsee_order_cost' | lexicon}:
                    {if $total.delivery_cost}
                        {$total.cart_cost} {'payandsee_unit_cost' | lexicon} + {$total.delivery_cost}
                        {'payandsee_unit_cost' | lexicon} =
                    {/if}
                    <strong>{$total.cost}</strong> {'payandsee_unit_cost' | lexicon}
                </th>
                <th class="">
                </th>
                <th class="">
                </th>
            </tr>
        </table>
    </div>
</div>