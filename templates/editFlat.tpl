{include file="header.tpl"}
<div>
    <h3>EDITAR</h3> <!-- codigo repetido -->
    <form action="editFlat" method="post">
    
        <label for="title">Name</label>
        <input type="text" name="input_edit_name" placeholder="{$flat->nombre}">

        <label for="address">Address</label>
        <input type="text" name="input_edit_address" placeholder="{$flat->direccion}">

        <label for="price">Price</label>
        <input type="number" name="input_edit_price" placeholder="{$flat->precio}">
        
        <select name="input_edit_id_city_fk" id="cities_s">
            {foreach from=$cities item=city}
                <option value="{$city->id_ciudad}">{$city->nombre}</option>
            {/foreach}
        </select>

        <a href="updateFlat/{$flat->id_departamento}"><button type="submit">submit edit</button></a>
    </form>
</div>
{include file="footer.tpl"}