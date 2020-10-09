{include file="header.tpl"}

{if $sessionActive eq true}
{include file="insertCity.tpl"}
{/if}


<div>
    <table>
        <thead>
            <td>Nombre</td>
        </thead>
        {foreach from=$ciudades item=ciudad}
        <tr>
            <td>{$ciudad->nombre}</td>
            {if $sessionActive eq true}
                <td><a href="editCity/{$ciudad->id_ciudad}"><button>Editar</button></a></td>
                <td><a href="deleteCity/{$ciudad->id_ciudad}"><button>X</button></a></td>
            {/if}
        </tr>
        {/foreach}
    </table>
</div>

{include file="footer.tpl"}