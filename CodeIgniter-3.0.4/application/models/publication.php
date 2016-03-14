<?php
/**
 * Created by PhpStorm.
 * User: Falcon
 * Date: 3/14/16
 * Time: 11:19 AM
 */
class Publication extends MY_Model {

    const DB_TABLE = 'publications';
    const DB_TABLE_PK = 'publication_id';

    public $publication_id;


    public $publication_name;
}