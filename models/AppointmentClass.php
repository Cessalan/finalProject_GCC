<?php
class AppointmentClass
{
    private $lName;
    private $fName;
    private $email;
    private $phone;
    private $Time;
    private $Date;
    private $price;
    private $service;
    const TAX = 0.15;



    /**
     * AppointmentClass constructor.
     * @param $lName
     * @param $fName
     * @param $email
     * @param $phone
     * @param $Time
     * @param $Date
     * @param $price
     * @param $service
     */
    public function __construct($lName, $fName, $email, $phone, $Time, $Date, $price, $service)
    {
        $this->lName = $lName;
        $this->fName = $fName;
        $this->email = $email;
        $this->phone = $phone;
        $this->Time = $Time;
        $this->Date = $Date;
        $this->price = $price;
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }
    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * @param mixed $lName
     */
    public function setLName($lName)
    {
        $this->lName = $lName;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * @param mixed $fName
     */
    public function setFName($fName)
    {
        $this->fName = $fName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->Time;
    }

    /**
     * @param mixed $Time
     */
    public function setTime($Time)
    {
        $this->Time = $Time;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getTax()
    {
        return $this->getPrice() * self::TAX;

    }
    public function getPriceAfterTax(){
        return $this->getPrice() + $this->getTax();
    }


}

