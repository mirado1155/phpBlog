<?php

    function generateLinks($page, $num_pages)
    {
        //create 'go back' link
        $page_links = '<ul class="pagination">';
        
        if ($page > 1) 
        {
            $page_links .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page - 1) . '"><-</a></li>';
        }
        // else
        // {
        //     $page_links .= '<';
        // }

        //create links for individual pages
        for ($count = 1; $count <= $num_pages; $count++)
        {
            //create string variable for bootstrap class 'active' - highlights current page
            if ($page == $count)
            {
                $activate = ' active';
            }
            else
            {
                $activate = '';
            }

            $page_links .= '<li class="page-item' . $activate . '"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $count . '"> ' . $count . ' </a></li>';
        }

        //create 'go forward' link
        if ($page < $num_pages) 
        {
            $page_links .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page + 1) . '">-></a></li>';
        }
        // else
        // {
        //     $page_links .= '>';
        // }
        $page_links .= '</ul>';
        return $page_links;
    }