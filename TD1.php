<?php

require 'App/Autoloader.php';
\App\Autoloader::register();

//question 1

$dsn='mysql:host=localhost;dbname=app;charset=utf8';
$login='root';
$password='';


$query = 'INSERT INTO TARTISTE(id, nom, prenom, nbAlbumsFaits)  VALUES (1,"PERRET","NINO",20)';
$query2 = 'SELECT nbAlbumsFaits FROM TARTISTE WHERE nom="PERRET"';


$con = new Connection($dsn, $login, $password);

$con->executeQuery($query,array(
    ':title' => array($title,PDO::PARAM_STR),
    ':content' => array($content,PDO::PARAM_STR),
    ':date' => array($date_format,PDO::PARAM_STR)
));


//CREER UNE CONFIG


class ArtisteGateway{
    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function FindByName($username)
    {
        $query = 'SELECT * FROM Users WHERE id=:username';
        $this->con->executeQuery($query, array(
            ':username' => array($username, PDO::PARAM_STR)
        ));
        $results = this->con->getResults();
        return this->$this->getInstances($results);
    }

    private function getInstances(array $results){
        $retour = [];
        foreach($results as $artiste){
            $retour[] = new Artiste($artiste['id'], $artiste['nom'], $artiste['prenom'], $artiste['nbAlbumsFaits']);
        }
        return $retour;
    }
}

//QUESTION 3

public static __construct(int $i, int $n, int $p, int $nb)
{
    $this->...
}

public static __constructTwo($param1, $param2, $param3, $param4)
{
    return new Artiste($param1, $param2, $param3, ...);
}

//EN SQL --> LIMIT 10 = affiche seulement 10 lignes

//créer une classe news, NewsGateway --> requête qui va récupérer les élements



class NewsGateway{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function getNews(){
        $query="SELECT * FROM TNews LIMIT 10";

        $this->con->executeQuery($query);
        return $this->con->GetResults();
    }

}