<?php

$config = json_decode(file_get_contents('../../config.json'), true);

if ( isset($_POST['title']) && $_POST['title'] != "" )
  $config['title'] = $_POST['title'];

if ( isset($_POST['unlock_pattern']) && $_POST['unlock_pattern'] != "" )
  $config['unlock_pattern'] = $_POST['unlock_pattern'];

if ( isset($_POST['clock_format']) && $_POST['clock_format'] != "" )
  $config['clock_format'] = $_POST['clock_format'];

if ( isset($_POST['custom_url']) && $_POST['custom_url'] != "" )
  $config['custom_url'] = $_POST['custom_url'];

if ( isset($_POST['custom_url_selector']) && $_POST['custom_url_selector'] != "" )
  $config['custom_url_selector'] = $_POST['custom_url_selector'];

if ( isset($_POST['custom_url_headers']) && $_POST['custom_url_headers'] != "" )
  $config['custom_url_headers'] = $_POST['custom_url_headers'];

if ( isset($_POST['unsplash_client_id']) && $_POST['unsplash_client_id'] != "" )
  $config['unsplash_client_id'] = $_POST['unsplash_client_id'];

if ( isset($_POST['idle_timer']) && $_POST['idle_timer'] != "" )
  $config['idle_timer'] = $_POST['idle_timer'];

$new_config = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents('../../config.json', $new_config);
?>
