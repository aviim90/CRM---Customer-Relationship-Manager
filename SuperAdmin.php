<?php

class superAdmin extends Admin{
    public function getNavigation(){
        return[
            ['link'=>'login.php', 'name'=>'Log out'],

        ];
    }

    public function canEdit(){
        return true;
    }
}
