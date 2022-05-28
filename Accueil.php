<?php require_once "inc/init.php" ?> 
<?php require_once "inc/header.php" ?> 

<br><h1>Accueil</h1>
<?php

function uppercase_specialchars($string) {
    $string = strtoupper($string);
    $string = str_replace(
       array('é', 'è'),
       array('É', 'È'),
       $string
    );
    return $string;
 }

$pdostatement = $pdo->query(" SELECT title, description, postal_code, city, type, price FROM advert ORDER BY id DESC LIMIT 15 ");
$annonces = $pdostatement->fetchAll(PDO::FETCH_ASSOC);

foreach($annonces as $index){
    echo "<br><strong><u>Annonce</u></strong><br><br>";
        foreach($index as $value){
                if($value == $index['title']){
                    echo "<div class='alert alert-dark'>" . "<strong>" . uppercase_specialchars( $index['title'] ) . "</strong>" . "</div>";
                }
                else
                    echo "<div class='alert alert-dark'> $value </div>";
        }
    echo "</br>";
}
?>

<?php require_once "inc/footer.php" ?>   