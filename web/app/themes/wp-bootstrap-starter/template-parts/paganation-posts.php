<?php   
 
    $total_pages = $args['pages_num'];

    if ($total_pages > 1){
        $paged = isset($_GET['paged']) ? $_GET['paged']:1; 
        $current_page = max(1, $paged);
        $big = 999999999;
        echo '<div class="paganation-wrap">';
        echo   paginate_links(array(
                // 'base' => get_pagenum_link() . '?%_%',
                // 'format' => 'paged=%#%',
                'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                'format' => '?paged=%#%',
                'current' => $current_page,
                'total' => $total_pages,
                'prev_text'    => __('« prev'),
                'next_text'    => __('next »'),
            )) ;
        echo '</div>';
    }    

?>