<?php
require_once __DIR__ . '/../config/config.php';

echo render(TEMPLATES_DIR . 'index.tpl', [
    'H1'=> 'Холодильное оборудование',
    'TITLE' => 'галерея с холодильниками',
    'H2' => 'Задание сделано через scandir , но при вызове функции добавляются несуществующие фотки',
    'CONTENT' => BuildImg(),

]);



?>
