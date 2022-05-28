<?php require_once "inc/init.php" ?> 

<?php require_once "inc/header.php" ?> 
<br><h1>Vous avez choisi cette annonce</h1><br>

<?php

if( $_POST ){ 
    foreach( $_POST as $index => $value ){
    $_POST[$index] = htmlentities( addslashes( $value ) ); 
    }
}

if(!empty($_POST['reservation_message']))
{
    $pdo->exec("UPDATE advert SET reservation_message = '$_POST[reservation_message]' WHERE id = $_GET[id]");
}

if( isset( $_GET['id']) ){ 
    $pdostatement = $pdo->query("SELECT * FROM advert WHERE id = $_GET[id]");
    while( $annonces = $pdostatement->fetch(PDO::FETCH_ASSOC) ){
        foreach( $annonces as $index => $value ){
            if( $index == 'reservation_message' ){ 
                if( !empty( $value ) ){ 
                    echo "<p> $index : $value </p>";
                }
            }else{ 
                echo "<p> $index : $value </p>";
            }
        }
    }
}
else{ 
    header('location:Consulter_toutes_les_annonces.php');
    exit;
}
?>

    <form method="post"><br>
        <label><strong>Vous souhaitez réserver ce bien ?</strong></label><br>
        <textarea id="reservation_message" name="reservation_message" class="form-control"></textarea><br><br>
        <input class='btn btn-dark' type="submit" value="Je réserve">
    </form>
    <br><a href='Consulter_toutes_les_annonces.php' class='btn btn-dark'>Revenir aux annonces</a>


<?php require_once "inc/footer.php" ?>  