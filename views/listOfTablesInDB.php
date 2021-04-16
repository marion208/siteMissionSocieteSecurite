<?php
$buttons = $_SESSION['buttons'];

for ($i = 0; $i < count($buttons); $i++) {
    $buttonStart = '<a class="btn btn-light btn-block" href="/admin-';
    $buttonLink = $buttons[$i];
    $buttonEnd = '.php" role="button">';
    $textButton = $buttons[$i];
    $closeButton = '</a>';
    $button = $buttonStart . $buttonLink . $buttonEnd . $textButton . $closeButton;
    echo $button;
}

unset($_SESSION['buttons']);
