<?php

class Admin{

    protected $username;
    protected $password;
    protected $id;

    /**
     * @param $username
     * @param $password
     * @param $id
     */
    public function __construct($username, $password, $id)
    {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }


    public function getNavigation(){

    }

    public function __toString(){

    }

    public static function getUser($id){

    }
    public static function login($username,$password){
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("SELECT * FROM users WHERE username=?");
        $stm->execute([$username]);
        $u= $stm->fetch(PDO::FETCH_ASSOC);
        if (!$u){
            return null;
        }
        if($u['password']==$password){
            $_SESSION['uid']=$u['id'];
            if($u['type']=='admin'){
                $user=new Admin($u['username'], $u['password'], $u['id']);
            }
            if($u['type']=='superAdmin'){
                $user=new SuperAdmin($u['username'], $u['password'], $u['id']);
            }
            return $user;
        }
        return null;
    }
}
