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
                        
                        addUser($connection, $prenom, $nom, $mail, $tel, $age);

                        //  include_once "connexion.php";

                        //  $req = mysqli_query($con , "INSERT INTO users VALUES(NULL, '$prenom', '$nom','$mail', '$tel', '$age')");
                        //  if($req){//si la requête a été effectuée avec succès , on fait une redirection
                        //      header("location: index.php");
                        //  }else {//si non
                        //      $message = "Employé non ajouté";
                        //  }
        
                    }else {
                        //si non
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


                <input type="submit" value="Ajouter" name="button">

            </form>
        </div>
</div>  

<?php
require_once "./includes/_footer.php";