<?php
session_set_cookie_params(3600);
session_start();
$utenti = json_decode(file_get_contents("teachers.json"));
if(isset($_POST["userName"])&&isset($_POST["password"])){
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    if(isset($_POST["submit"])){
        foreach ($utenti as $utente){
            if ($utente -> userName ==  $userName){
                if($utente -> password == $password){//$utenti -> password == hash("SHA256",$password)
                    $_SESSION["userName"] = $userName;
                    include "exam.html";
                    //echo "bravo hai fatto il login";
                    exit();
                }
            }else{
                echo "credenziali sbagliate";
                exit();
            }
        }
    }
}else{
    echo "utente nonn registrato";
}

?>