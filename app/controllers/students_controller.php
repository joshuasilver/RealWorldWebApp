<?php
class StudentsController extends AppController {

    var $name = 'Students';

    function index() {
        $this->set('studentList', $this->Student->find('all'));
    }

    function add() {
        if (!empty($this->data)) {
            if ($this->Student->save($this->data)) {
                $this->Session->setFlash('Your student has been added.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

}

?>
