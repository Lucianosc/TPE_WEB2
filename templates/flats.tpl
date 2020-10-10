{include file="header.tpl"}

{if $id_flat eq false}
    {include file="filterFlat.tpl"}
{/if}

{if $sessionUser eq true}
    {include file="insertFlat.tpl"}
{/if}
   
<div>
    {if isset($errorMessaje)}
    <h6>{$errorMessaje}</h6>
    {else}
    <table>
        <thead>
            <td>Nombre</td>
            {if $id_flat neq false}
                <td>Direccion</td>
                <td>Precio</td>
            {/if}
            <td>Ciudad</td>
        </thead>
        {foreach from=$flats item=flat}
            <tr>
                <td>{$flat->nombre}</td>
                {if $id_flat neq false}
                <td>{$flat->direccion}</td>
                <td>{$flat->precio}</td>
                {/if}
                <td>{$flat->nombre_ciudad}</td>
                {if $id_flat eq false}
                <td><a href="flat/{$flat->id_departamento}"><button>Ver detalle</button></a></td>
                {/if}
                {if $sessionUser eq true}
                    <td><a href="editFlat/{$flat->id_departamento}"><button>Editar</button></a></td>
                    <td><a href="deleteFlat/{$flat->id_departamento}"><button>X</button></a></td>
                {/if}
            </tr>
        {/foreach}
    </table>
    {/if}
</div>

{include file="footer.tpl"}