<div>
    <form action="insertFlat" method="post">
        <label for="name">Nombre</label>
        <input type="text" name="input_name">

        <label for="address">Dirección</label>
        <input type="text" name="input_address">

        <label for="price">Precio</label>
        <input type="number" name="input_price">
        
        <label for="city">Ciudad</label>
        <select name="input_id_city_fk" id="cities_s">
            {foreach from=$cities item=city}
                <option value="{$city->id_ciudad}">{$city->nombre}</option>
            {/foreach}
        </select>

        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>