<div>
            {foreach from=$cities item=city}
                <a href="city/{$city->$city->nombre}">{$city->nombre}</a>
            {/foreach}
</div>
        <!---<select name="" id="">
            {foreach from=$cities item=city}
            <option value="{$city->id_ciudad}">
                <a href="city/{$city->nombre}">{$city->nombre}</a>
            </option>
            {/foreach}
        </select>
</div>