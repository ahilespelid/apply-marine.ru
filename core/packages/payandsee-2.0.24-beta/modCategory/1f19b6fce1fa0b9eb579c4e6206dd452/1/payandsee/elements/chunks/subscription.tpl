<div class="pas-subscription row">
    <div class="col-md-12">
        <div class="col-md-3 col-sm-3 col-xs-6">
            {'payandsee_client'|lexicon}:
            <p><strong>{$user_username}</strong> <sub>{$profile_email}</sub></p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <a href="{$content_resource|url:['scheme'=>'full']}">{$content_name}</a>
            {if $content_description}
                <p>
                    <small>{$content_description}</small>
                </p>
            {/if}
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            {'payandsee_startdate'|lexicon}:
            <p>
                <small>{$startdate | date :"d.m.Y H:i"} </small>
            </p>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-6">
            {'payandsee_stopdate'|lexicon}:
            <p>
                <small>{$stopdate | date :"d.m.Y H:i"} </small>
            </p>
        </div>
        <div class="col-md-2 col-sm-2 hidden-xs">
            {'payandsee_status'|lexicon}:
            <p style="color: #{$status_color}">
                <small>{$status_name} </small>
            </p>
        </div>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>
