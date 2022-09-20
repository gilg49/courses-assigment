<?php   
 
    $total_pages = $args['pages_num'];

    if ($total_pages > 1){
        
        $current_page = max(1, get_query_var('paged'));
       
        echo '<div class="paganation-wrap">';
        echo   paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => 'paged/%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text'    => __('« prev'),
                'next_text'    => __('next »'),
            )) ;
        echo '</div>';
    }    

?>