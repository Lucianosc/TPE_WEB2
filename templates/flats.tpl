{include file="header.tpl"}
<br>

{if $id_flat eq false}
{include file="filterFlat.tpl"}
{/if}

{if $sessionUser eq true}
    <div class="container-fluid">
        <div class="row justify-content-start">
            {include file="insertFlat.tpl"}
{else}
    <div class="container-fluid">
        <div class="row justify-content-center">
{/if}
            <br>
            <div class="col-md-6 offset-md-2">
                {if isset($errorMessaje)}
                    <div class="alert alert-danger" role="alert">
                        {$errorMessaje}
                    </div>
                {else}
                    <div class="col-md">
                        <div class="row">
                            <table class="table">
                                <thead class="thead-dark">
                                    <th scope="col">Departamentos</th>
                                    {if $id_flat neq false}
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Precio</th>
                                    {/if}
                                    <th scope="col">Ciudad</th>
                                    {if $sessionUser eq true}
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    {/if}
                                    <th scope="col"></th>
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
                                            <td>
                                                <a href="flat/{$flat->id_departamento}"><button type="button"
                                                        class="btn btn-secondary">Ver detalle</button></a>
                                            </td>
                                        {/if}
                                        {if $sessionUser eq true}
                                            <td>
                                                <a href="editFlat/{$flat->id_departamento}"><button
                                                type="button" class="btn btn-secondary">Editar</button></a>
                                            </td>
                                            <td>
                                                <a href="deleteFlat/{$flat->id_departamento}"><button
                                                type="button" class="btn btn-secondary">X</button></a>
                                            </td>
                                        {/if}
                                    </tr>
                                {/foreach}
                            </table>
                        </div>
                    </div>
                {/if}
            </div>  
        </div>
    </div>
{include file="footer.tpl"}