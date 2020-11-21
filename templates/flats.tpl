{include file="header.tpl"}

{if !isset($id_flat)}
<div class="filter-div">
    {include file="filterFlat.tpl"}
</div>
{/if}

{if $sessionUser eq true && $sessionUser['ROLE'] eq 0}
    <div class="container-fluid">
        <div class="row justify-content-start">
            {include file="insertFlat.tpl"}
{else}
    <div class="container-fluid">
        <div class="row justify-content-center">
{/if}
            <div class="col-md-6 offset-md-2">
                {if isset($errorMessaje)}
                    <div class="alert alert-danger" role="alert">
                        {$errorMessaje}
                    </div>
                {else}
                    <div class="col-md">
                        <div class="row" id="table-div">
                            <table class="table">
                                <thead class="thead-dark">
                                    {if isset($id_flat)}
                                        <th scope="col">Departamento</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Precio</th>
                                    {else}
                                        <th scope="col">Departamentos</th>
                                    {/if}
                                    <th scope="col">Ciudad</th>
                                    {if $sessionUser eq true && $sessionUser['ROLE'] eq 0}
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    {/if}
                                    <th scope="col"></th>
                                </thead>
                                {foreach from=$flats item=flat}
                                    <tr>
                                        <td>{$flat->nombre}</td>
                                        {if isset($id_flat)}
                                            <td>{$flat->direccion}</td>
                                            <td>{$flat->precio}</td>
                                        {/if}
                                        <td>{$flat->nombre_ciudad}</td>
                                        {if !isset($id_flat)}
                                            <td>
                                                <a href="flat/{$flat->id_departamento}"><button type="button"
                                                        class="btn btn-secondary">Ver detalle</button></a>
                                            </td>
                                        {/if}
                                        {if $sessionUser eq true && $sessionUser['ROLE'] eq 0}
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
                            {if isset($id_flat)}
                                {foreach from=$images item=image}
                                    <div class="form-group">
                                        <img src="{$image->ruta}" alt="Imagen del departamento {$flat->nombre}">
                                    </div>
                                {/foreach}
                            {/if}
                        </div>
                    </div>
                {/if}
            </div>  
        </div>
    </div>
{include file="footer.tpl"}