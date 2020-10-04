<div>
    <form action="insertFlat" method="post">
        <label for="title">Name</label>
        <input type="text" name="input_name">
        <label for="address">Address</label>
        <input type="text" name="input_address">
        <label for="price">Price</label>
        <input type="number" name="input_price">
        <!-- ver implementacion -->
        
        <select name="input_id_city_fk" id="cities_s">
            {foreach from=$cities item=city}
                <option value="{$city->id_ciudad}">{$city->nombre}</option>
            {/foreach}
        </select>

        <button type="submit">Agregar</button>
    </form>
</div>