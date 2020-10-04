{include file="header.tpl"}

{include file="insertFlat.tpl"}
<p></p>
<div>
    <table>
        <thead>
            <td>Nombre</td>
            <td>Direccion</td>
            <td>Precio</td>
            <td>Ciudad</td>
        </thead>
        {foreach from=$flats item=flat}
        <tr>
            <td>{$flat->nombre}</td>
            <td>{$flat->direccion}</td>
            <td>{$flat->precio}</td>
<<<<<<< HEAD
            <td><a href="edit_f/{$flat->id_departamento}"><button>Editar</button></a></td>
            <td><a href="delete_f/{$flat->id_departamento}"><button>X</button></a></td>
=======
            <td>{$flat->nombre_ciudad}</td>
            <td><a href="editFlat/{$flat->id_departamento}"><button>Editar</button></a></td>
            <td><a href="deleteFlat/{$flat->id_departamento}"><button>X</button></a></td>
>>>>>>> 2ee3eac061920bd3668c2b7d4f472f75c9372965
        </tr>
        {/foreach}
    </table>
</div>
<p></p>
{include file="footer.tpl"}