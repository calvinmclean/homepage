<?php

$config = json_decode(file_get_contents('../../config.json'), true);

if( isset($_POST['alt']) && isset($_POST['icon']) && isset($_POST['link']) ) {
  $alt = $_POST['alt'];
  $icon = $_POST['icon'];
  $link = $_POST['link'];

  $i = 0;

  // Iterate through json to iterate $i
  foreach ( $config['items'] as $key => $value ) $i++;
  $config['items'][$i]['alt'] = $alt;
  $config['items'][$i]['icon'] = $icon;
  $config['items'][$i]['link'] = $link;

  $new_config = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  file_put_contents('../../config.json', $new_config);

} else if ( isset($_POST['get_items']) ) {
  echo "[";
  echo json_encode($config['items'][0], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  $i = 1;
  foreach ( $config['items'] as $key => $value ) {
    if ( $config['items'][$i] != NULL )
      echo "," . json_encode($config['items'][$i], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    $i++;
  }
  echo "]";
} else if ( isset($_POST['delete']) ) {
  $delete_val = $_POST['delete'];

  foreach($config['items'] as $key => $value) {
    if( $value['alt'] == $delete_val )
      unset($config['items'][$key]);
  }
  $new_config = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
  file_put_contents('../../config.json', $new_config);
}
?>
