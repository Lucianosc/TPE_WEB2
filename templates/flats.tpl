{include file="header.tpl"}

  
{include file="filterFlat.tpl"}
    

{if $sessionActive eq true}
    {include file="insertFlat.tpl"}
{/if}
   
<div>
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
                {if $id_flat eq true}
                <td>{$flat->direccion}</td>
                <td>{$flat->precio}</td>
                {/if}
                <td>{$flat->nombre_ciudad}</td>
                {if $id_flat eq false}
                <td><a href="flat/{$flat->id_departamento}"><button>Ver detalle</button></a></td>
                {/if}
                {if $sessionActive eq true}
                    <td><a href="editFlat/{$flat->id_departamento}"><button>Editar</button></a></td>
                    <td><a href="deleteFlat/{$flat->id_departamento}"><button>X</button></a></td>
                {/if}
            </tr>
        {/foreach}
    </table>
</div>

{include file="footer.tpl"}