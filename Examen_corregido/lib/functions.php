<?php

function clearData($dato){
    if (is_array($dato)){
        return array_map('clearData', $dato);
    }

    return htmlspecialchars(stripslashes(trim($dato)), ENT_QUOTES, 'UTF-8');
}