<?php

class connexionDB
{
    private $host    = 'localhost';
    private $name    = 'ppe';
    private $user    = 'PPE_dev';
    private $pass    = 'operations';
    private $connexion;

    function __construct($host = null, $name = null, $user = null, $pass = null){
        if($host != null){
            $this->host = $host;
            $this->name = $name;
            $this->user = $user;
            $this->pass = $pass;
        }
        try{
            $this->connexion = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name,
                $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        }catch (PDOException $e){
            echo 'Une erreur des survenue lors de la création de la base de données!';
            die();
        }
    }

    /**
     * @param $sql
     * @param array $data
     *
     * Permet d'insérer des données dans la base de données.
     * exemple :
     *  $DB->insert("INSERT INTO nom_table (prenom, nom, age) VALUES (?, ?, ?)",
     *  array("jean", "dupont", 20));
     */
    public function insert($sql, $data =array())
    {
        $req = $this->connexion->prepare($sql);
        $req->execute($data);
    }

    /**
     * @param $sql
     * @param array $data
     * @return bool|PDOStatement
     *
     * Permet de chercher des info dans la BDD.
     * exemple :
     * $req = $DB->query("SELECT * FROM nom_table");
     * $req = $req->fetch();
     *
     */
    public function query($sql, $data =array())
    {
        $req = $this->connexion->prepare($sql);
        $req->execute($data);

        return $req;
    }
}




/***********   Code à deplacer dans la page de login pour la gestion d'erreur ***********/

