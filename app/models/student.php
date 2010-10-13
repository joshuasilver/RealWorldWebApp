<?php

class Student extends AppModel {
    var $name = 'Student';

    var $validate = array(
        'phone_number' => array(
            'rule' => array('phone', null, 'us'),
            'message' => "Must be a valid US phone number"
        )
    );
}

?>
