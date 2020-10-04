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
            <option value="1">fk 1</option>
            <option value="2">fk 2</option>
            <option value="3">fk 3</option>
        </select>

        <button type="submit">Agregar</button>
    </form>
</div>