    {foreach from=$images item=image}
        <img src="{$image->ruta}" alt="Imagen del departamento {$flat->nombre}">
    {/foreach}