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
                                    <th scope="col">Departamentos</th>
                                    {if isset($id_flat)}
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Precio</th>
                                    {/if}
                                    <th scope="col">Ciudades</th>
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
                        </div>
                        {if isset($id_flat)}
                        {if $sessionUser eq true}
                        <div class="row" id="form-div">
                            <div class="container mt-5">
                                <div class="d-flex justify-content-center row">
                                    <div class="col">
                                        <form id="comment-form" action="insert" method="post">
                                            <div class="rating"> 
                                                <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                                                <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> 
                                                <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="text-area">Deja tu comentario</label>
                                                <textarea class="form-control" name="input_text" id="input-text" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/if}
                        <div class="row" id="vue-div" user-name="{$sessionUser['USER']}" flat-id="{$id_flat}" user-id="{$sessionUser['ID']}">
                        {include file="vue/comments.vue"}
                        </div>
                        {/if}
                    </div>
                {/if}
            </div>  
        </div>
    </div>
    {* CSR *}
    <script src="js/comments.js"></script>
{include file="footer.tpl"}