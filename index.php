<?php

function link_to($params){
    $prefix = '';
    $title = '';
    $link = '';
    switch ($params['type']){
        case 'default':
            if($params['content'] && $params['href']){
                $title = $params['content'];
                $link = $params['href'];
            }
        break;
        case 'email':
            if($params['content']){
                $prefix ='mailto:';
                $title = $params['content'];
                $link = $prefix . $params['content'];
            }
        break;    
        case 'tel':
            if($params['content']){
                $prefix ='tel:';
                $title = $params['content'];
                $link = $prefix . preg_replace('/[^0-9]/', '', $params['content']);
            }
        break;    
    }
    echo '<a href="'.$link.'">'.$title.'</a><br>';
}
link_to( [
    'type' => 'default',
    'content' => 'Link',
    'href' => 'http://example.com',
] );


link_to( [
    'type' => 'email',
    'content' => 'johndoe@example.com',
] );


link_to( [
    'type' => 'tel',
    'content' => '+38 123 456 78 90',
] );

?>