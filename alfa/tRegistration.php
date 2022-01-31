<?php 
$utenti = json_decode(file_get_contents("teachers.json"));
if(isset($_POST["userName"])&&isset($_POST["password"])){
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $userName = trim($userName);
    if(strpos($userName,"\\") !== false || strpos($userName,"/") !== false){
        echo "caratteri non utilizzabili \\ o /";
        exit();
    }
    foreach ($utenti as $utente){
        if ($utente -> userName == $userName){
            echo "utente già registarto";
            exit();
        }
    }
    if(isset($_POST["submit"])){
        $utente -> userName = $userName;
        //$utente -> password = hash("SHA256",$password);
        $utente -> password = $password;
        array_push($utenti, $utente);
        //$folderPath = "users/$userName";
        //mkdir($folderPath,0777);
        $savedJson = json_encode($utenti);
        file_put_contents("teachers.json",$savedJson);
        //echo "super idol de sho <3";
    }
}

?>
