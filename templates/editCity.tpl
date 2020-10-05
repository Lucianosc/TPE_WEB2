{include file="header.tpl"}
<div>
    <h3>EDITAR</h3>
    <form action="editCity" method="post"> 
        <label for="title">Name</label>
        <input type="text" name="input_edit_name" placeholder="{$city->nombre}">

        <button value="{$city->id_ciudad}" name="input_edit_id" type="submit">submit edition</button>
    </form>
</div>
{include file="footer.tpl"}