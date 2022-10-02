<?php

class Conversation{
    public $id;
    public $customer_id;
    public $date;
    public $conversation;

    private $customer;

    /**
     * Conversation constructor.
     * @param $customer_id
     * @param $date
     * @param $conversation
     */
    public function __construct($id=null, $customer_id, $date=null, $conversation){
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->date = $date;
        $this->conversation = $conversation;

    }

//    public function save(){
//        $pdo=DB::getPDO();
//        if ($this->id==null){
//            $stm = $pdo->prepare("INSERT INTO contact_information (customer_id, date, conversation) VALUES (?,?,?)");
//            $stm->execute([$this->customer_id, $this->date, $this->conversation]);
//            $this->id=$pdo->lastInsertId();
//        }
//        else{
//            $pdo = DB::getPDO();
//            $stm = $pdo->prepare("UPDATE contact_information SET customer_id=?, date=?, conversation=?");
//            $stm->execute([$this->customer_id, $this->date, $this->conversation]);
//        }
//    }

    public function getCustomers(){
        if ($this->customer==null){
            $this->customer=Customer::getCustomers();
        }
        return $this->customer;
    }

    public static function getConversation($customer_id){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information WHERE customer_id=?");
        $stm->execute([$customer_id]);
        $c=$stm->fetch(PDO::FETCH_ASSOC);
        $conversation=new Conversation($c['id'],$c['customer_id'],$c['date'],$c['conversation']);
        return $conversation;
    }
    public static function getConversations(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM contact_information");
        $stm->execute();
        $conversation=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $conversation[]=new Conversation($c['customer_id'],$c['date'],$c['conversation'],$c['id']);
        }
        return $conversation;
    }

    public function addConversation(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO contact_information (customer_id, date, conversation) VALUES (?,?,?)");
        $stm->execute([$this->customer_id, $_POST['date'], $_POST['conversation']]);
    }

    public function editConversation(){
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("UPDATE contact_information SET customer_id=?, date=?, conversation=? WHERE id=?");
        $stm->execute([$this->customer_id, $this->date, $this->conversation, $this->id]);
    }


    public function delete()
    {
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("DELETE FROM contact_information WHERE id=?");
        $stm->execute([$this->id]);
    }

}
