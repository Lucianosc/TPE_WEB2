{include file="header.tpl"}

{include file="insertCity.tpl"}

<div>
    <ul>
        {foreach from=$ciudades item=ciudad}
        <li>{$ciudad->nombre}</li>
        {/foreach}
    </ul>
</div>

{include file="footer.tpl"}