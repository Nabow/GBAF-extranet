<?php 
// require "../config.php";
define('BDD_PASSWORD', 'root');


    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    function connectMsqli(){
        try
        {
            return mysqli_connect('localhost', 'root', 'root', 'gbaf', 3307);
            // mysqli_set_charset($db, 'utf8mb4');
        }
        catch (Exception $e)
        {
                // die('Erreur : ' . $e->getMessage());
        }

    }



 
    
    function print_var_name($var) {
        foreach($GLOBALS as $var_name => $value) {
            if ($value === $var) {
                return $var_name;
            }
        }
    
        return false;
    }


function connectBdd(){

    return new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8;port=3307', 'root', BDD_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);

}



    // fonction pour réaliser des requêtes dans la BDD
function requeteBdd(array $tableau = [] ,string $requete,string $mode = 'fetch'){

    $bdd = connectBdd();

    
    try {

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
                return $post;
            } 
    

    $query->closeCursor();
    } catch (PDOException $e) {
        return $e->getMessage();
    }


}

    ?>
