<?php require_once "inc/init.php" ?> 

<?php

$title_error = $desc_error = $cp_error = $ville_error = $prix_error = ""; 

if( $_POST ){ 

foreach( $_POST as $index => $value ){
    
    $_POST[$index] = htmlentities( addslashes( $value ) ); 
}

if( empty( $_POST['title'] ) || empty($_POST['desc']) ||  empty($_POST['cp']) || empty($_POST['ville']) || empty($_POST['prix'])){ 
    $title_error = $desc_error = $cp_error = $ville_error = $prix_error =  "<p style='color:red;'>Veuillez renseigner les champs obligatoires &#128127;</p>";
}

if(!isNumberMatch_cp($_POST['cp']) || !isNumberMatch_prix($_POST['prix'])){
    $cp_error = $prix_error = "<p style='color:red;'>Saisissez uniquemement des chiffres SVP &#128127;</p>";
}

if( empty( $title_error) && empty( $desc_error) && empty( $cp_error) && empty( $ville_error) && empty( $prix_error) ){
    $pdostatement = $pdo->query("INSERT INTO advert(title, description, postal_code, city, type, price) 
    
                        VALUES( 
                                '$_POST[title]',
                                '$_POST[desc]',
                                '$_POST[cp]',
                                '$_POST[ville]',
                                '$_POST[type]',
                                '$_POST[prix]'
                            ) 
            ");
}
}

function isNumberMatch_cp($verify){
    return preg_match("/^[0-9][0-9][0-9][0-9][0-9]$/", $verify);
}
function isNumberMatch_prix($verify){
    return preg_match("/^[0-9]*$/", $verify);
}
?>


<?php require_once 'inc/header.php'; ?>

<br><h1>Ajouter une annonce</h1><br>

<div class="row justify-content-center">
            <div class="col-lg-10 col-lg-offset-1">
                <form id="contact-form" method="post" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="title">Titre de l'annonce *</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Entrez le titre de l'annonce">
                            <p class="comments"><?= $title_error;?></p>
                        </div>
                        <div class="col-md-12">
                            <label for="desc">Description de l'annonce *</label>
                            <textarea id="desc" name="desc" class="form-control" placeholder="Décrivez votre annonce" rows="4"></textarea>
                            <p class="comments"><?= $desc_error;?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="cp">Code Postal *</label>
                            <input type="text" id="cp" name="cp" class="form-control" placeholder="Code Postal">
                            <p class="comments"><?= $cp_error;?></p>
                        </div>
                        <div class="col-md-6">
                            <label for="ville">Ville *</label>
                            <input type="text" id="ville" name="ville" class="form-control" placeholder="Où se situe le bien ?">
                            <p class="comments"><?= $ville_error;?></p>
                        </div>
                        <div class="col-md-12"><br>
                            <label for="type">Type de l'annonce</label>
                            <select name="type">
                                <option value="location">location</option>
                                <option value="vente">vente</option>
                            </select><br><br>
                        </div>
                        <div class="col-md-12">
                            <label for="prix">Prix du bien *</label>
                            <input type="text" id="prix" name="prix" class="form-control" placeholder="Prix du bien">
                            <p class="comments"><?= $prix_error;?></p>
                        </div>
                        <div class="col-md-12">
                        <input type="submit" value="ajouter une annonce" class="btn btn-dark">
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php require_once 'inc/footer.php'; ?>