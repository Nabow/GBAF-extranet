<?php 
require_once "config.php";


function connectBdd(){
    return new PDO('mysql:host='.BDD_HOST.';dbname='.BDD_DATABASE.';charset=utf8;port='. BDD_PORT, BDD_IDENTIFIANT, BDD_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES=>false
    ]);

}



    // fonction pour réaliser des requêtes dans la BDD
function requeteBdd(array $tableau = [] ,string $requete,string $mode = 'fetch'){

    
    
    try {
        $bdd = connectBdd();

            $query = $bdd->prepare($requete);
            $query->execute($tableau);

            if(stripos($requete,'select') !== false){
                
                        $mode = strtolower($mode);
                switch ($mode) {
                    case 'fetch':
                        $post = $query->fetch();
                        break;
                        
                    case 'fetchall':
                        $post = $query->fetchAll();
                        break;
                        
                    case 'rowcount':
                        $post = $query->rowCount();
                        break;
                        
                    default:
                        $post = $query->fetch();
                        break;
                }
                $query->closeCursor();
                return $post;
            } 
    

        $query->closeCursor();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


}