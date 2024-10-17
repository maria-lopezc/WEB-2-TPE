<?php
    function encriptar($pass){
        return password_hash($pass, PASSWORD_DEFAULT);
    }
   