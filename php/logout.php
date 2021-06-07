<?php
session_start();
// Exclui todas as sessões existentes
session_destroy();
header('Location: ../login.php');
exit();