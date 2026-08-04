<?php

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'db_nmc_2081_project';

    function checkEmpty($field, $fieldName) {
        if (!isset($_POST[$field]) || empty($_POST[$field]) || trim($_POST[$field]) == '') {
            return "$fieldName is required";
        }
        return '';
    }

    function displayError($error, $field) {
        if (isset($error[$field])) {
            return '<span class="error">' . $error[$field] . '</span>';
        }
        return '';
    }  
    
    function displayFlashMessage($message, $type = 'success') {
        if (!empty($message)) {
            return '<div class="alert alert-' . $type . '">' . $message . '</div>';
        }
        return '';
    }
?>