<?php

class Customer{
    public $id;
    public $name;
    public $surname;
    public $phone;
    public $email;
    public $address;
    public $position;
    public $company_id;

    private $company;
    private $conversation;

    /**
     * Customer Constructor.
     * @param $name
     * @param $surname
     * @param $phone
     * @param $email
     * @param $address
     * @param $position
     * @param $company_id
     */
    public function __construct($name, $surname, $phone, $email, $address, $position, $company_id, $id=null)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->position = $position;
        $this->company_id = $company_id;
        $this->id=$id;
    }

    public static function getCustomers(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM customers");
        $stm->execute([]);
        $customers=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $customers[]=new Customer($c['name'], $c['surname'], $c['phone'], $c['email'], $c['address'], $c['position'], $c['company_id'], $c['id']);
        }
        return $customers;
    }
    public static function getCustomer($id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM customers WHERE id=?");
        $stm->execute([$id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $customer=new Customer($c['name'],$c['surname'],$c['phone'],$c['email'],$c['address'],$c['position'],$c['company_id'], $id);
        return $customer;
    }

    public function getCompany(){
        if($this->company==null){
            $this->company=Company::getCompany($this->company_id);
        }
        return $this->company;
    }

    public function addCustomer(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO `customers`(`name`, `surname`, `phone`, `email`, `address`, `position`, `company_id`) VALUES (?,?,?,?,?,?,?)");
        $stm->execute([$_POST['name'],$_POST['surname'],$_POST['phone'],$_POST['email'],$_POST['address'],$_POST['position'],$_POST['company_id']]);
        $this->id=$pdo->lastInsertId();
        return $this;
    }

//    public function save(){
//        $pdo=DB::getPDO();
//        if($this->id=null){
//            $stm = $pdo->prepare("INSERT INTO customers(name, surname, phone, email, address, position, company_id) VALUES (?,?,?,?,?,?)");
//            $stm->execute([$this->name, $this->surname, $this->phone, $this->email, $this->address, $this->position, $this->company_id]);
//            $this->id=$pdo->lastInsertId();
//
//        }
//        else{
//            $pdo = DB::getPDO();
//            $stm = $pdo->prepare("UPDATE customers SET name=?, surname=?, phone=?, email=?, address=?, position=?, company_id=?");
//            $stm->execute([$this->name, $this->surname, $this->phone, $this->email, $this->address, $this->position, $this->company_id]);
//        }
//    }
    public function getConversations($conversation)
    {
        if ($this->conversation = $conversation) {
            $this->conversation = Conversation::getConversation($this->conversation);
        }
        return $this->conversation;
    }

    public function delete(){
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("DELETE FROM customers WHERE id=?");
        $stm->execute([$this->id]);
    }




}
