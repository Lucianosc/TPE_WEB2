{foreach from=$images item=image}
    <div class="form-group">
        <img src="{$image->ruta}" alt="Imagen del departamento {$flat->nombre}">
        {if $sessionUser eq true && $sessionUser['ROLE'] eq 0}
            <a href="deleteImage/{$image->id_imagen}"><button type="button" 
               class="btn btn-secondary">X</button></a>
        {/if}
    </div>
{/foreach}