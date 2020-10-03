{include file="header.tpl"}
<div>
    <table>
        {foreach from=$flats item=flat}
        <tr>
            <td>{$flat->nombre}</td>
            <td>{$flat->direccion}</td>
            <td>{$flat->precio}</td>
        </tr>
        {/foreach}
    </table>
</div>

{include file="createFlat.tpl"}

{include file="footer.tpl"}