<form method="post">
    <input type="hidden" name="csrf" value="{Token::generate()}">

    {if $status_error}<div class="alert alert-danger">{$status_error}</div>{/if}

    {foreach $fields as $key => $field}
        <div class="form-group">
            <label>{$field.label}</label>
            {if $field.type == 'textarea'}
                <textarea name="{$key}" class="form-control" rows="3"></textarea>
            {else}
                <input type="{$field.type}" class="form-control" name="{$key}" value="" {if $field.required}required{/if}>
            {/if}
        </div>
    {/foreach}

    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Send" name="submit"/>
    </div>
</form>
