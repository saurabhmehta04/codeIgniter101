<?php
/**
 * Created by PhpStorm.
 * User: Falcon
 * Date: 3/14/16
 * Time: 10:53 AM
 */
class Magazine extends CI_Controller {
    public function index() {
//        $this->load->view('magazines');
//        $this->load->model('Publication'); // when model is loaded, its properties are available using $this
//        $this->Publication->publication_name = "Sandy Shore";
//        $this->Publication->save();
//        echo '<tt><pre>' . var_export($this->Publication, TRUE) . '</pre></tt>';
//        $this->load->model('Issue');
//        $issue = new Issue();
//        $issue->publication_id = $this->Publication->publication_id;
//        $issue->issue_number = 2;
//        $issue->issue_date_publication = date('2013-02-01');
//        $issue->save();
//        echo '<tt><pre>' . var_export($issue, TRUE) . '</pre></tt>';

        $data = array();
        $this->load->model('Publication');
        $publication = new Publication();
        $publication->load(1);
        $data['publication'] = $publication;

        $this->load->model('Issue');
        $issue = new Issue();
        $issue->load(1);
        $data['issue'] = $issue;

        $this->load->view('magazines');
        $this->load->view('magazine', $data);
        $this->load->library('example');
    }

    /**
     *
     * Adding magazine
     */
    public function add() {
        $this->load->model('Publication');
        $publication = $this->Publication->get();
        $publication_form_options = array();
        foreach ($publication as $id => $publication) {
            $publication_form_options[$id] = $publication->publication_name;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules(array(
            array(
                'field' => 'publication_id',
                'label' => 'Publication',
                'rules' => 'required',
            ),
            array(
                'field' => 'issue_number',
                'label' => 'Issue number',
                'rules' => 'required|is_numeric',
            ),
            array(
                'field' => 'issue_date_publication',
                'label' => 'Publication date',
                'rules' => 'required|callback_date_validation',
            )
        ));
        $this->form_validation->set_error_delimiters('<div class = "alert alert-error">', '</div>');
        if (!$this->form_validation->run()) {
            $this->load->view('magazine_form', array(
                'publication_form_options' => $publication_form_options,

            ));
        } else {
            $this->load->view('magazine_form_success');
        }

    }

//    validation method
    public function date_validation($input) {
        $test_date = explode('-', $input);
        if (!@checkdate($test_date[1], $test_date[2], $test_date[0])) {
            $this->form_validation->set_message('date_validation', 'The %s field must be in YYYY-MM-DD format');
            return FALSE;
        }
        return TRUE;
    }

}