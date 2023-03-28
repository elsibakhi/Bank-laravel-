<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
<nav aria-label="Page navigation example  " >
    <ul class="pagination justify-content-center mt-3   ">
        <li class="{{ ($paginator->currentPage() == 1) ? ' page-item disabled' : 'page-item' }} " 
            @if (($paginator->currentPage() == 1))
            tabindex="-1"   aria-disabled="true" 
            @endif
            >
            <a class="page-link  " style="cursor: pointer;" onclick="loadDoc('{{ $paginator->url($paginator->currentPage()-1) }}')" >Previous</a>
         </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li class="{{ ($paginator->currentPage() == $i) ? 'page-item active' : 'page-item' }}">
                    
                    <a class="page-link" style="cursor: pointer;" onclick="loadDoc('{{ $paginator->url($i) }}')" >{{ $i }}</a>
                </li>
            @endif
        @endfor
   
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'page-item disabled' : 'page-item' }}">
            <a class="page-link" style="cursor: pointer;" onclick="loadDoc('{{ $paginator->url($paginator->currentPage()+1) }}')" >Next</a>
        </li>
    </ul>

</nav>
@endif