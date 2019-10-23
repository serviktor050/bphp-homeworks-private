<?php

    class User extends DataRecordModel
    {
        public $name;
        public $email;
        public $password;
        public $rate;

        public function __conctruct($name, $email, $password, $rate)
        {
            parent::__conctruct();
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->rate = $rate;
        }

        public function addUserFromForm() 
        {
            $this->commit();
        }
    }