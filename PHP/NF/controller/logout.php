<?php
    //realiza o logout do usuário
    session_start();
    session_destroy();
    header('Location: ../index.php');
    

?>