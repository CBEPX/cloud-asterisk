<?php
require_once('phpagi/phpagi-asmanager.php');
$asm = new AGI_AsteriskManager();
//if($asm->connect("127.0.0.1","phpagi","bora123wind"))
if($asm->connect("127.0.0.1", PHP_AGI_LOGIN, PHP_AGI_PASS))
{
    $peer = $asm->command("core show settings");
   
      $data = array();
      foreach(explode("\n", $peer['data']) as $line)
      {
        $a = strpos('z'.$line.':', ':');
        if($a >= 0) $data[trim(substr($line, 0, $a))] = trim(substr($line, $a + 1));
      }
      //print_r($data);
      
      foreach ($data as $p=>$p_value) {
        echo $p . " " . " " . $p_value;
        echo "<br>";
      }
      echo "<br>";
    
    $asm->disconnect();
}
?>
