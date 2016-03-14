<?php
/**
 * Created by PhpStorm.
 * User: Falcon
 * Date: 3/14/16
 * Time: 11:20 AM
 */
class Issue extends MY_Model {
    const DB_TABLE = 'issues';
    const DB_TABLE_PK = 'issue_id';
    public $issue_id;
    public $publication_id;
    public $issue_number;
    public $issue_date_publication;
    public $issue_cover;

}