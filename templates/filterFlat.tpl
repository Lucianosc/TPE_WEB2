<div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ciudades
        </button>
        <div class="dropdown-menu">
            {foreach from=$cities item=city}
                <button value="{$city->id_city}"name="select_city" type="submit">
                    <a class="dropdown-item"
                    href="city/{$city->nombre}">{$city->nombre}</a></button>
            {/foreach}
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="showFlats">Todas</a>
        </div>
</div>