<?php require_once "inc/init.php" ?> 

<?php require_once "inc/header.php" ?> 
<br><h1>Ici toutes les annonces</h1><br>
<?php 
$pdostatement = $pdo->query( "SELECT * FROM advert ORDER BY id DESC");

while( $annonces = $pdostatement->fetch(PDO::FETCH_ASSOC) ){

        foreach( $annonces as $index => $value ){
            if( $index != 'reservation_message' && $index != "id"  ){
                echo " $value <br>";
            }
            elseif( $index == 'reservation_message'){ 
                if( !empty( $value ) ) { 
                    echo "<br><span style='color: tomato;'><strong>QUELQU'UN EST DÉJÀ POSITIONNÉ SUR CE BIEN</strong></span><br>";    
                }
                else{ 
                    echo "<br><span style='color: green;'><strong>CE BIEN EST DISPONIBLE</strong></span><br>";    
                }
            }
        }
    echo "</br>";
    echo "<a href='Consulter_une_annonce.php?id=$annonces[id]' class='btn btn-dark'>Consulter l'annonce</a>";
    echo "</br><br><hr>";
}
?> 

<?php require_once "inc/footer.php" ?>   