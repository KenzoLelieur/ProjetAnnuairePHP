<?php
require_once "./includes/_header.php";
require_once "./configs/bootstrap.php";
?>

<div class="container">


        <div class="form">
            <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
            <h2>Modifier</h2>
            <p class="erreur_message">
                <?php 
            
                if(isset($message)){
                    echo $message;
                }

                // recuper id
                $id = $_GET['id'];
                // recuper datas du user avec id
                $req = $connection->prepare("SELECT * FROM users WHERE id=?");
                $req->execute(array($id));
                $reqDatas = $req->fetch();


                if(isset($_POST['button'])){

                    extract($_POST);


                    if(isset($prenom) && isset($nom) && isset($mail) && isset($tel) && isset($age) ){

                        require_once "./functions/functions.php";
                        
                        updateUser($connection, $prenom, $nom, $mail, $tel, $age, $id);
        
                    }else {
                        
                        $message = "Veuillez remplir tous les champs !";
                    }
                }
                

                ?>

            </p>
            <form action="" method="POST">

                <label>prenom</label>
                <input type="text" name="prenom" value="<?=$reqDatas['prenom']?>">

                <label>nom</label>
                <input type="text" name="nom" value="<?=$reqDatas['nom']?>">

                <label>adresse mail</label>
                <input type="text" name="mail" value="<?=$reqDatas['mail']?>">

                <label>téléphone</label>
                <input type="text" name="tel" value="<?=$reqDatas['tel']?>">

                <label>âge</label>
                <input type="number" name="age" value="<?=$reqDatas['age']?>">

                <input type="submit" value="Modifier" name="button">

            </form>
        </div>
</div>  

<?php
require_once "./includes/_footer.php";