<?php
require_once("includes/initialize.php");
$data = new Mysql_code_genrator();
global $database;
$table = "image_presets";

$fdata = new formstruck();


$fromx = '';
$fromx = $fdata->co("input", "name", 1) . $fdata->co("textarea", "text", 1);
//$u=User::all();
//echo $x=json_encode($u);

//$data->create($table,$vrs);
$ro = $data->showlist($table, $fromx);
$data->createmodel($table, "includes/model/");
//echo $ro;
$data->cc($table, $fromx);
