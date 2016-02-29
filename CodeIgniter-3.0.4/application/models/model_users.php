<?php
/**
 * Created by PhpStorm.
 * User: Falcon
 * Date: 2/29/16
 * Time: 12:41 PM
 */

class Model_users extends CI_Model {
    function __construct() {
        parent::__construct(); // calling the parent class (CI Model contructor)
    }

    function getFirstNames() {
        $query = $this->db->query('SELECT firstname FROM users');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            echo "Not able to retrieve from database";
            return NULL;
        }
    }

    function getUsers() {
        $query = $this->db->query('SELECT * FROM users');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }
}