<nav aria-label="Page navigation example">
  <ul class="pagination">
{for $page=1 to $totalPages}
     <li class="page-item">
        <a class="page-link" href="showFlats/{$page}"><button type="button" 
            class="btn btn-secondary">{$page}</button></a>
    </li>
{/for}
 </ul>
</nav>