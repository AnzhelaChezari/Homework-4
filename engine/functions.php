<?php
require_once __DIR__ . '/../config/config.php';


function render ($file, $variables=[]) {
    if (!is_file($file)) {
        echo 'Templates "' . $file . '" doesnt exist';
        exit();    
    }
    if (filesize($file) === 0) {
       echo 'Templates "' . $file . '" is empty';
        exit(); 
    }

//вывод на экран

 $templateContent = file_get_contents($file);
	if (empty($variables)) {
		return $templateContent;
    }

foreach ($variables as $key => $value) {
		if (empty($value) || !is_string($value)) {
			continue;
		}
      $key = '{{' . strtoupper( $key) . '}}';
    $templateContent = str_replace( $key, $value, $templateContent);
  }
return $templateContent;
  }
    
function BuildImg() {
    $result = '';
    $dir = "img/img-2";
    $images = array_diff( scandir($dir), array('..', '.'));
    foreach ( $images as $image) {
      if (is_file(WWW_DIR . 'img/img-2/' . $image)) {  
          $result .= render(TEMPLATES_DIR . 'gallery.tpl', [
             'SRC' => IMG_DIR . $image,                      
          ]);   
      }
    } 
    return $result;         
}

?>


<!--
//var_dump($key);
//die;
-->
