{include file="header.tpl"}

{include file="insertFlat.tpl"}
<p></p>
<div>
    <table>
        <thead>
            <td>Nombre</td>
            <td>Direccion</td>
            <td>Precio</td>
        </thead>
        {foreach from=$flats item=flat}
        <tr>
            <td>{$flat->nombre}</td>
            <td>{$flat->direccion}</td>
            <td>{$flat->precio}</td>
            <td><a href="edit_f/{$flat->id_departamento}"><button>Editar</button></a></td>
            <td><a href="delete_f/{$flat->id_departamento}"><button>X</button></a></td>
        </tr>
        {/foreach}
    </table>
</div>
<p></p>
{include file="footer.tpl"}