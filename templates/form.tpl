<form method="post">
    <input type="hidden" name="csrf" value="{Token::generate()}">

    {if $status_error}<div class="alert alert-danger">{$status_error}</div>{/if}

    {foreach $fields as $key => $field}
        <div class="form-group">
            <label>{$field.label}</label>
            {if $field.type == 'textarea'}
                <textarea {include 'attributes/textarea.tpl'}></textarea>
            {elseif $field.type == 'select'}
                <select {include 'attributes/select.tpl'}>
                    <option>{$field.default_option}</option>
                    {foreach $field.options as $key => $field}
                        <option value="{$key}">{$field}</option>
                    {/foreach}
                </select>
            {elseif $field.type == 'text' || $field.type == 'email'}
                <input {include 'attributes/input.tpl'}>
            {/if}
        </div>
    {/foreach}

    <div class="form-group">
        {foreach $buttons as $key => $button}
            {if $button.type == 'submit' || $button.type == 'reset' || $button.type == 'button'}
                <input {include 'attributes/button.tpl'}>
            {/if}
        {/foreach}
    </div>
</form>
