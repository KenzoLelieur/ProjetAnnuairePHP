<?php
require_once "./includes/_header.php";
require_once "./configs/bootstrap.php";

?>


<?php
echo "salutation";?>

<div class="container">


<div class="containerTitleSearch">
<div class="titleBtn">
<H1 >Liste Conctact</H1>
    <a href="./inscription.php" class="Btn_add"> Ajouter</a>
</div>
  
    
    <form action="" method="GET" class="formSearch">
        <div class="inputSearch">
        <input type="text" name="search" class="search" placeholder="rechercher">
        <input type="submit" class="Btn_add" value="rechercher">
        </div>

    </form>
</div>

    
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


         if(isset($_GET['search'])&& !empty($_GET['search'])){
            $search = $_GET['search'];

            $req =$connection->prepare("SELECT * FROM users WHERE prenom LIKE '%$search%' OR nom LIKE '%$search%' ");
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
                        <td><a href="modifier.php?id=<?=$reqData['id']?>"><img src="images/pen.png"></a></td>
                        <td><a href="supprimer.php?id=<?=$reqData['id']?>"><img src="images/trash.png"></a></td>
                    </tr>
                <?php

            }


         }else{
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
                        <td><a href="modifier.php?id=<?=$reqData['id']?>"><img src="images/pen.png"></a></td>
                        <td><a href="supprimer.php?id=<?=$reqData['id']?>"><img src="images/trash.png"></a></td>
                    </tr>
                <?php

            }
         }

        
        
        
        ?>

    </table>

  


</div>


<?php
require_once "./includes/_footer.php";
