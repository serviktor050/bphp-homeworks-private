<?php
    class Router
    {
        public $availableLinks;

        public function __construct($availableLinks)
        {
            $this->availableLinks = $availableLinks;
        }

        public function isAvailablePage($nameOfPage)
        {
            if (!array_key_exists('page', $_GET)) {
                throw new BadRequest('Bad Request');
            }
            if (!in_array($nameOfPage, $this->availableLinks)) {
                throw new NotFound('Not found');
            }
            return true;
        }
    }