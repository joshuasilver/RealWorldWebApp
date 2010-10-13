<?php
class StudentsController extends AppController {

    var $name = 'Students';

    function index() {
        $this->set('studentList', $this->Student->find('all'));
    }
}

?>
