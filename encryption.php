<?php


function encrypt($pure_string) {
   $encrypted_string = password_hash($pure_string, PASSWORD_DEFAULT);
   return $encrypted_string;
 }

function check($hash, $pure_string) {
  if (password_verify($pure_string, $hash)) {
     return true;
  } else {
      return false;
  }
}

?>