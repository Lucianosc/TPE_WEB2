{include file="header.tpl"}
<br>

{if $sessionUser eq true}
<div class="container-fluid">
    <div class="row justify-content-start">
{include file="insertCity.tpl"}
{else}
<div class="container-fluid">
    <div class="row justify-content-center">
        {/if}
        <div class="col-md-4 offset-md-2">
            {if isset($errorMessaje)}
            <div class="alert alert-danger" role="alert">
                {$errorMessaje}
            </div>

            {else}
            <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Ciudades</td>
                                {if $sessionUser eq true}
                            <th scope="col"></th>
                            <th scope="col"></th>
                            {/if}
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$ciudades item=ciudad}
                        <tr>
                            <td>{$ciudad->nombre}</td>
                            {if $sessionUser eq true}
                            <td><a href="editCity/{$ciudad->id_ciudad}"><button type="button"
                                        class="btn btn-secondary">Editar</button></a></td>
                            <td><a href="deleteCity/{$ciudad->id_ciudad}"><button type="button"
                                        class="btn btn-secondary">X</button></a></td>
                            {/if}
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
            {/if}
        </div>
    </div>
</div>
{include file="footer.tpl"}