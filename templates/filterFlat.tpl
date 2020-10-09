<div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filtrar
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="showFlats">Todas</a>
        <div class="dropdown-divider"></div>
            {foreach from=$cities item=city}
                <a value="{$city->id_ciudad}"name="select_city" type="submit">
                    <a class="dropdown-item"
                    href="city/{$city->nombre}">{$city->nombre}</a>
            {/foreach} 
        </div>
</div>