<?php
require_once "./includes/_header.php";
require_once "./configs/bootstrap.php";
?>

<div class="container">


        <div class="form">
            <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
            <h2>Ajouter</h2>
            <p class="erreur_message">
                <?php 
            
                if(isset($message)){
                    echo $message;
                }

                if(isset($_POST['button'])){

                    extract($_POST);


                    if(isset($prenom) && isset($nom) && isset($mail) && isset($tel) && isset($age) ){

                        require_once "./functions/functions.php";
                        
                        addUser($connection, $prenom, $nom, $mail, $tel, $age, $spe);
        
                    }else {
                        $message = "Veuillez remplir tous les champs !";
                    }
                }
                

                ?>

            </p>
            <form action="" method="POST">

                <label>prenom</label>
                <input type="text" name="prenom">

                <label>nom</label>
                <input type="text" name="nom">

                <label>adresse mail</label>
                <input type="text" name="mail">

                <label>téléphone</label>
                <input type="text" name="tel">

                <label>âge</label>
                <input type="number" name="age">

                <label >Spécialité envisagé</label>
                <select name="spe">
                    <option value="Communication digitale">Communication digitale</option>
                    <option value="Communication graphique">Communication graphique</option>
                    <option value="Développement web">Développement web</option>
                </select>

                <input type="submit" value="Ajouter" name="button">

            </form>
        </div>
</div>  

<?php
require_once "./includes/_footer.php";