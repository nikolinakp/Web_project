<?php

    class User {

        public $id;
        public $username;
        public $password;
 

        function __construct($id, $username, $password) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
        }

    }


?>