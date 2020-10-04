{include file="header.tpl"}

{include file="insertCity.tpl"}

<div>
    <ul>
        <table>
            <thead>
                <td>Nombre</td>
            </thead>
        {foreach from=$ciudades item=ciudad}
            <tr>
                <td>{$ciudad->nombre}</td>
                <td><a href="editCity/{$ciudad->id_ciudad}"><button>Editar</button></a></td>
                <td><a href="deleteCity/{$ciudad->id_ciudad}"><button>X</button></a></td>
            </tr>
        {/foreach}
        </table>
    </ul>
</div>

{include file="footer.tpl"}