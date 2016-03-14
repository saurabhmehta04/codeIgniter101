<?php

/**
 * Created by PhpStorm.
 * User: Falcon
 * Date: 2/22/16
 * Time: 4:00 PM
 */
class MY_Model extends CI_Model {
    const DB_TABLE = 'abstract'; // store the value of the model
    const DB_TABLE_PK = 'abstract'; // primary key

    /*
     * Create record
     *
     * */
    private function insert() {
        $this->db->insert($this::DB_TABLE, $this);  // (name of the table, object containing the argument mapped to the column which is $this)
        $this->{$this::DB_TABLE_PK} = $this->db->insert_id(); // insert operation will not populate anything, so we have to manually populate the model with the insert ID.
                                                              // method "insert_id" will make it achieve this
    }

    /*
     * Update
     *
     */
    private function update() {
        $this->db->update($this::DB_TABLE, $this, $this::DB_TABLE_PK);  // take 3 arguments => name of the table(this),
        // an array or object containing the columns or values to update (which will be this)
        // Primary key of the table which will be updated.

    }

    /*
     * Populate from an array or standard class
     * @param mixed $row
     * */
    public function populate($row) {
        foreach ($row as $key => $value) {
            $this->$key = $value;
        }
    }

    public function load($id)
    {
        $query = $this->db->get_where($this::DB_TABLE, array(
            $this::DB_TABLE_PK => $id,
        ));
        $this->populate($query->row());
    }


    /*
     * Delete the current record
     * */

    public function delete() {
        $this->db->delete($this::DB_TABLE, array(
            $this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK},
        ));
        unset($this->{$this::DB_TABLE_PK});
    }

    /*
     * Save the record
     * this will call insert() or update() method accordingly
     * */

    public function save() {
        if(isset($this->{$this::DB_TABLE_PK})) {
            $this->update();

        } else {
            $this->insert();
        }
    }


    /*
     * Get an array of Models with an optional limit, offset
     *
     * @param int $limit Optional
     * @param int offset Optional; if set, requires $limit.
     * @return array Models populated by database, keyed by PK.
     * */

    public function get($limit = 0, $offset = 0)
    {
        if ($limit) { //if there is a limit
            $query = $this->db->get($this::DB_TABLE, $limit, $offset); //name of table, optional limit and optional offset
        } else {
            $query = $this->db->get($this::DB_TABLE); // return all rows, if limit is not set
        }

//        building a return value
        $ret_val = array();
        $class = get_class($this); // get the class of the current model

//        result() will return the database rows
        foreach ($query->result() as $row) {
            $model = new $class; // creating new instance of the current class
            $model->populate($row); // populate with the helper function
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model; // add to the return value using the PK.
        }
        return $ret_val;
    }

}