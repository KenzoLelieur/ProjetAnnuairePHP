<?php

$dataContent = file_get_contents("/Users/matrix/Sites/ProjetSchool/configs/global.json");
$dataJson = json_decode($dataContent, true);

try
{
    $connection = new PDO('mysql:host=' . $dataJson["database"]['host'] . ';port=' . $dataJson['database']["port"] . ';dbname='. $dataJson['database']["db_name"] . '', $dataJson['database']['user'], $dataJson['database']['password']);

}
catch (Exception $e)
{
        die('Erreur de connexion à la bdd: ' . $e->getMessage());
}





// class connect {

//     // Information de connection à la db à modifier
//     private $host = 'localhost';
//     private $username = 'kenzo';
//     private $password = '123';

//     private $db_name;
//     private $pdo;

//     public function __construct(string $DBName) {
//         $this->db_name = $DBName;
//         // $this->connect();
//         var_dump($this->connect());

//     }

//     // private
//     private function connect() : bool {
//         try {
//             $pdo = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
//             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             $this->pdo = $pdo;
//             return true;
//         } catch (PDOException $e) {
//             return false;
//             die("Erreur de connexion : " . $e->getMessage());
//         }
//     }}