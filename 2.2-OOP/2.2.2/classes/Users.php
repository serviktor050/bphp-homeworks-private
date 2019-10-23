<?php

    class Users extends JsonDataArray
    {
        public function __construct()
        {
            parent::__construct();
        } 
        
        public function displaySortedList()
        {
            foreach($this->$dataArray as $user)
            {
              echo "$user <br>";
            }                  
        }
    }