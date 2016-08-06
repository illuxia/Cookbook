<?php

if (!isset($_SESSION['user'])) {
  include_once ('templates/loginform.php');
  exit();
}else {
    header('Location: ..');
    exit();
}
