{include file="header.tpl"}
<div class="container-fluid">
    <h3>Editar Departamento</h3>
    <hr>
    <br>
    <form action="editFlat" method="post">

        <label for="name">Nombre</label>
        <input type="text" name="input_edit_name" value="{$flat->nombre}" placeholder="{$flat->nombre}">

        <label for="address">Dirección</label>
        <input type="text" name="input_edit_address" value="{$flat->direccion}" placeholder="{$flat->direccion}">

        <label for="price">Precio</label>
        <input type="number" name="input_edit_price" value="{$flat->precio}" placeholder="{$flat->precio}">

        <label for="city">Ciudad</label>
        <select name="input_edit_id_city_fk" id="cities_s">
            {foreach from=$cities item=city}
            {if $city->id_ciudad eq $flat->id_ciudad_fk}
            <option value="{$city->id_ciudad}" selected>{$city->nombre}</option>
            {else}
            <option value="{$city->id_ciudad}">{$city->nombre}</option>
            {/if}
            {/foreach}
        </select>

        <button value="{$flat->id_departamento}" name="input_edit_id" class="btn btn-secondary"
            type="submit">Editar</button>
    </form>
</div>
{include file="footer.tpl"}