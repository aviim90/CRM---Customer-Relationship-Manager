<?php


class Company
{
    public $id;
    public $name;
    public $address;
    public $vat_code;
    public $company_name;
    public $phone;
    public $email;

    /**
     * @var Customer[]
     */
    private $customers=null;

    /**
     * Company constructor.
     * @param $name
     * @param $address
     * @param $vat_code
     * @param $company_name
     * @param $phone
     * @param $email
     */
    public function __construct($name, $address, $vat_code, $company_name, $phone, $email, $id=null)
    {
        $this->name = $name;
        $this->address = $address;
        $this->vat_code = $vat_code;
        $this->company_name = $company_name;
        $this->phone = $phone;
        $this->email = $email;
        $this->id = $id;
    }

    public function createCompany(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("INSERT INTO companys (name, address, vat_code, company_name, phone, email) VALUES (?,?,?,?,?,?)");
        $stm->execute([ $this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email ]);
    }

    public function saveCompany(){
        $pdo=DB::getPDO();
        if ($this->id==null){
            $stm = $pdo->prepare("INSERT INTO companys (name, address, vat_code, company_name, phone, email) VALUES (?,?,?,?,?,?)");
            $stm->execute([$this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email]);
            $this->id=$pdo->lastInsertId();
        }
        else{
            $pdo = DB::getPDO();
            $stm = $pdo->prepare("UPDATE companys SET name=?, address=?, vat_code=?, company_name=?, phone=?, email=? WHERE id=?");
            $stm->execute([$this->name, $this->address, $this->vat_code, $this->company_name, $this->phone, $this->email, $this->id]);
        }
    }

    public function deleteCompany()
    {
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("DELETE FROM companys WHERE id=?");
        $stm->execute([$this->id]);
    }

    /**
     * @return City[]
     */
    public function getCustomers(){
        if($this->customers==null){
            $this->customers=Customer::getCustomers();
        }
        return $this->customers;
    }

    public static function getCompany($id)
    {
        $pdo = DB::getPDO();
        $stm = $pdo->prepare("SELECT * FROM companys WHERE id=?");
        $stm->execute([$id]);
        $c = $stm->fetch(PDO::FETCH_ASSOC);
        $company = new Company($c['name'], $c['address'], $c['vat_code'], $c['company_name'], $c['phone'], $c['email'], $id);
        return $company;
    }

    public static function getCompanies(){
        $pdo=DB::getPDO();
        $stm=$pdo->prepare("SELECT * FROM companys");
        $stm->execute([]);
        $companys=[];
        foreach ($stm->fetchAll(PDO::FETCH_ASSOC) as $c){
            $companys[]=new Company($c['name'], $c['address'], $c['vat_code'], $c['company_name'], $c['phone'], $c['email'], $c['id']);
        }
        return $companys;
    }




}
