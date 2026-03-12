<?php
include_once "../DB/DataBase.php"; 

class User
{
    private string $nom;
    private string $prenom;
    private string $email;
    private string $password_hash;
    private string $role;
    private string $photo_url;
    private string $linkedin_url;
    private PDO    $pdo;

    public function __construct(
        PDO    $pdo,          
        string $nom,
        string $prenom,
        string $email,
        string $password_hash,
        string $role,
        string $photo_url    = "",
        string $linkedin_url = ""
    ) {
        $this->pdo           = $pdo;
        $this->nom           = $nom;
        $this->prenom        = $prenom;
        $this->email         = $email;
        $this->password_hash = $password_hash;
        $this->role          = $role;
        $this->photo_url     = $photo_url;
        $this->linkedin_url  = $linkedin_url;
    }

    public function create() 
    {
        $u=$this->pdo->prepare("select * from users where email=? ");
        
        $u->execute([$this->email]);
        $isu=$u->fetch();
        if (empty($isu)) {
          $stmt = $this->pdo->prepare(
            "INSERT INTO users (nom, prenom, email, password_hash, role, photo_url, linkedin_url, created_at, updated_at)
             VALUES (:nom, :prenom, :email, :password_hash, :role, :photo_url, :linkedin_url, :created_at, :updated_at)"
        );

        return $stmt->execute([
            ':nom'           => $this->nom,
            ':prenom'        => $this->prenom,
            ':email'         => $this->email,
            ':password_hash' => password_hash($this->password_hash, PASSWORD_BCRYPT),
            ':role'          => $this->role,
            ':photo_url'     => $this->photo_url,
            ':linkedin_url'  => $this->linkedin_url,
            ':created_at'    => date("Y-m-d H:i:s"),
            ':updated_at'    => date("Y-m-d H:i:s"),
        ]);
        }else{
            echo "ex";
        }
    }

    public function latest()
    {
     $list=$this->pdo->prepare("select * from users")  ;
     $list->execute();
     return $list;
    }

    public function view(int $id)
    {
    $list=$this->pdo->prepare("select * from users where id =?")  ;
     $list->execute([$id]);
     return $list;
    }

    public function edit(int $id, array $fields)
    {
        $u=$this->pdo->prepare("select * from users where id=?");
        $u->execute([$id]);
        if (!empty($u->fetch())) {
           $up=$this->pdo->prepare("UPDATE users SET nom=?,prenom
           =?,email=?,password_hash=?,
           photo_url=?,linkedin_url=?,updated_at=? WHERE id=?");
           $up->execute([$fields[0],$fields[1],$fields[2],$fields[3],$fields[4],$fields[5],date("Y-m-d H:i:s"),$id]);
           echo "valid";
        }else{
            echo "not valid";
        }
    }

    public function destroy(int $id)
    {
        $u=$this->pdo->prepare("select * from users where id=? ");
        $u->execute([$id]);
        if (!empty($u->fetch())) {
         $list=$this->pdo->prepare("delete from users where id =?")  ;
         $list->execute([$id]);
        }else{
            echo "not ex";
        }
   
    
    }
}


$u = new User($link,"Yassin","Elk","yasn@email.com","monMotDePasse","etudiant","photo.jpg","linkedin.com/in/yassin");
$u->edit(1,["rayan","Elk","yksn@email.com","monMotDePasse","photo.jpg","linkedin.com/in/yassin"]); 





?>
 