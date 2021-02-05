<?php

$itemName  = filter_input(INPUT_POST, 'itemName', FILTER_SANITIZE_STRING);
$itemPrice = filter_input(INPUT_POST, 'itemPrice', FILTER_SANITIZE_STRING);
$itemSize = filter_input(INPUT_POST, 'itemSize', FILTER_SANITIZE_STRING);
$itemImg = filter_input(INPUT_POST, 'itemImg', FILTER_SANITIZE_STRING);


