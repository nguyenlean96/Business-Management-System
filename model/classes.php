<?php

use Reminder as GlobalReminder;

class Account {
    private $first_name;
    private $last_name;
    private $cell_phone;
    private $carrier;    
    private $status;
    public function __construct($fn, $ln, $carrier, $phone)
    {
      $this->first_name = $fn;
      $this->last_name = $ln;
      $this->cell_phone = $phone;
      $this->status = false;
    }
    public function getFirstName() { return $this->first_name; }
    public function getLastName() { return $this->last_name; }
    public function getCellNumber() { return $this->cell_phone; }
    public function getCarrier() { return $this->carrier; }
    public function getStatus() {return $this->status; }
    protected function Activate() {
      if ($this->status === false) {
        $this->status = true;
        return true;
      }
      return false;
    }
    protected function Deactivate() {
      if ($this->status === true) {
        $this->status = false;
        return true;
      }
      return false;
    }
  }

  class Client extends Account {
    private $company_name;
    private $company_number;
    private $phone_num;
    private $hst_no;
    private $website;
    private $mail;
    private $numOfReminder;
    private $listOfReminder;

    public function __construct($fn, $ln, $comp, $comp_num, $phone_num, $cell_num, $carrier, $hst_num, $website, $mail)
    {
      parent::__construct($fn, $ln, $carrier, $cell_num);
      $this->company_name = $comp;
      $this->company_number = $comp_num;
      $this->phone_num = $phone_num;
      $this->hst_no = $hst_num;
      $this->website = $website;
      $this->mail = $mail;
      $this->numOfReminder = 0;
      $this->listOfReminder;
    }
    public function Activate() {
      if ($this->parent::Activate()) {
        return true;
      }
      return false;
    }
    public function Deactivate() {
      if ($this->parent::Deactivate()) {
        return true;
      }
      return false;
    }
    public function getData() {
      return ["firstName" => parent::getFirstName(), "lastName" => parent::getLastName(), "compName" => $this->company_name, "compNum" => $this->company_number, "phoneNum" => $this->phone_num, "cellNum" => parent::getCellNumber(), "carrier" => parent::getCarrier(), "hstNum" => $this->hst_no, "website" => $this->website, "mail" => $this->mail, "status" => (parent::getStatus() ? 1 : 0) ];
    }
    public function addReminder($new_reminder) {
      if (is_array($this->listOfReminder)) {
        array_push($this->listOfReminder, $new_reminder);
      } else {
        $this->listOfReminder[0] = $new_reminder;
      }
    }

    function queryGen() {
      $data = $this->getData();
      if ($data != null) {
        return 'insert into client values (null, "'.$data["firstName"].'", "'.$data["lastName"].'", "'.$data["compName"].'", '.$data["compNum"].', "'.$data["phoneNum"].'", "'.$data["cellNum"].'", "'.$data["carrier"].'", "'.$data["hstNum"].'", "'.$data["website"].'", "'.$data["mail"].'", '.$data["status"].');"';
      }
      return "";
    }
  }
  class Employee extends Account {
    private $mail;
    private $position;
    private $passwd;

    public function Activate() {
      if ($this->parent::Activate()) {
        return true;
      }
      return false;
    }
    public function Deactivate() {
      if ($this->parent::Deactivate()) {
        return true;
      }
      return false;
    }
  }
  
  class Reminder {
    private $name;
    private $type;
    private $content;
    private $status;

    public function __construct($name, $type, $content) {
      $this->name = $name;
      $this->type = $type;
      $this->content = $content;
      $this->status = true;
    }
    public function getName() { return $this->name; }
    public function getType() { return $this->type; }
    public function getContent() { return $this->content; }
    public function getStatus() { return $this->status; }
    public function Deactivate() {
      if ($this->status) {
        $this->status=false;
        return true;
      }
      return false;
    }
    public function Reactivate() {
      if (!$this->status) {
        $this->status = true;
        return true;
      }
      return false;
    }
  }

  class Webpage {
    private $title;
    private $authors;
    private $keywords;
    public function __construct($title, $authors, $keywords)
    {
      $this->title = $title;
      $this->authors = $authors;
      $this->keywords = $keywords;
    }
    public function getTitle() { return $this->title; }
    public function getAuthors() {
      $output = "";
      if (is_array($this->authors)) {
        foreach ($this->authors as $a) {
           $output .= $a. ((!next($this->authors))?" ":", ");
        }
        return substr($output, 0, strlen($output) - 1);
      }
      return $this->authors;
    }
    public function getKeywords() {
      $output = "";
      if (is_array($this->keywords)) {
        foreach ($this->keywords as $k) {
          $output .= $k.",";
        }
        return substr($output, 0, strlen($output) - 1);
      }
      return $this->keywords;
    }
  }
?>
