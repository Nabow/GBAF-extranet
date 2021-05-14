<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try
    {
        // $db = mysqli_connect('ftp.gbaf.yj.lu', 'jbbhvkmg', 'zW8SXtq1wZcKUd', 'jbbhvkmg_gbaf' );
        $db = mysqli_connect('localhost', 'root', 'root', 'gbaf', 3307);
        mysqli_set_charset($db, 'utf8mb4');
    }
    catch (Exception $e)
    {
            // die('Erreur : ' . $e->getMessage());
    }



    // $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8;port=3307', 'root', 'root', [
    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    // ]);
    // $error = null;
    // $success = null; 

    // try {
    //     if (isset($_POST['name'], $_POST['content'])) {
    //         $query = $bdd->prepare('UPDATE posts SET name = :name, content = :content WHERE id = :id');
    //         $query->execute([
    //             'name' => $_POST['name'],
    //             'content' => $_POST['content'],
    //             'id' => $_GET['id']
    //         ]);
    //         $success = 'Votre article a bien été modifié';
    //     }
    //     $query = $bdd->prepare('SELECT * FROM posts WHERE id = :id');
    //     $query->execute([
    //         'id' => $_GET['id']
    //     ]);
    //     $post = $query->fetch();
    // } catch (PDOException $e) {
    //     $error = $e->getMessage();
    // }
    
    function print_var_name($var) {
        foreach($GLOBALS as $var_name => $value) {
            if ($value === $var) {
                return $var_name;
            }
        }
    
        return false;
    }

function requeteBdd($id, $name_id,$requete){

    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8;port=3307', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
    $error = null;
    $success = null; 
    
    try {
        if (isset($id)) {
            $query = $bdd->prepare($requete);
            $query->execute([
                $name_id => $id
            ]);
            $success = 'Votre article a bien été modifié';
        }

        $post = $query->fetch();
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
    echo $success;
    echo $error;
    print_r($post);
}

    ?>


    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8;port=3307', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }    
?>