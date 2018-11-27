<?php 
function s($tr){return str_replace("\'","'",htmlspecialchars($tr));}
function sa($tr){return str_replace("'","\'",htmlspecialchars($tr));}
function a($mot){return Addslashes($mot);}
function i($chiff){return intval($chiff);}
function r($a,$b,$char){return s(str_replace($a,$b,$char));}
function size($taille,$dim){if(strlen($taille)>$dim){$ref='...';}else{$ref='';}return $ref;}
function pp($char,$size){return s(substr(s($char),0,$size).size($char,$size));}
function format_date($date){
          $utc = new DateTime($date, new DateTimeZone('UTC'));
          $utc->setTimezone(new DateTimeZone('Africa/Douala'));
          return $utc->format('d-m-Y à H:i:s');}
$BD=new PDO('mysql:host=localhost;dbname=mathbox','root','');//video?>