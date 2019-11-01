<?php
    Class Person
    {
        public $name;
        public $surname;
        public $patronymic;
        public $gender;

        const GENDER_MALE = 1;
        const GENDER_FEMALE = -1;
        const GENDER_UNDEFINED = 0;

        public function __construct($name, $surname, $patronymic)
        {
            $this->name = $name;
            $this->surname = $surname;

            if ($patronymic != null) {
                $this->patronymic = $patronymic;
            }

            $patronymicEnding = mb_substr($patronymic, -3);

            if ($patronymicEnding === 'вич' || $patronymicEnding === 'ьич' || $patronymicEnding === 'тич' || $patronymicEnding === 'глы') {
                $this->gender = self::GENDER_MALE;
            } elseif ($patronymicEnding === 'вна' || $patronymicEnding === 'чна' || $patronymicEnding === 'шна' || $patronymicEnding === 'ызы') {
                $this->gender = self::GENDER_FEMALE;
            } else {
                $this->gender = self::GENDER_UNDEFINED;
            }
        }

        public function getFio()
        {
            return $this->surname.' '.$this->name.' '. $this->patronymic;
        }

        public function getGender()
        {
            if ($this->gender === 1) {
                return 'male';
            } elseif ($this->gender === 0) {
                return 'undefined';
            } elseif ($this->gender === -1) {
                return 'female';
            };
        }
        
        public function getGenderSymbol()
        {
          if ($this->gender === 1) {
            return '♂';
          } elseif ($this->gender === 0) {
            return '😎';
          } elseif ($this->gender === -1) {
            return '♀';
          };
        }
    }