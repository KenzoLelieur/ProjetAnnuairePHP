<?php
require_once "./includes/_header.php";
require_once "./configs/bootstrap.php";
?>

<div class="container">

<H1>Liste Conctact</H1>
    <a href="./inscription.php" class="Btn_add"> Ajouter</a>
    
    <table>
        <tr id="items">
            <th>prenom</th>
            <th>nom</th>
            <th>mail</th>
            <th>téléphone</th>
            <th>Age</th>
            <th>Modifer</th>
            <th>Supprimer</th>
        </tr>

        <?php

            // Request list users
            $req= $connection->prepare("SELECT * FROM users WHERE 1");
            $req->execute();
            $reqDatas = $req->fetchAll();
            
            foreach($reqDatas as $reqData){
                ?>
                    <tr>
                        <td><?=$reqData['prenom']?></td>
                        <td><?=$reqData['nom']?></td>
                        <td><?=$reqData['mail']?></td>
                        <td><?=$reqData['tel']?></td>
                        <td><?=$reqData['age']?></td>
                        <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                        <td><a href="modifier.php?id=<?=$reqData['id']?>">x</td>
                        <td><a href="supprimer.php?id=<?=$reqData['id']?>">x</td>
                    </tr>
                <?php

            }
        
        
        ?>

    </table>

  


</div>


<?php
require_once "./includes/_footer.php";