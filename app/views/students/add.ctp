<h1>Add Student</h1>
<?php
    echo $form->create('Student');
    echo $form->input('first_name');
    echo $form->input('last_name');
    echo $form->input('phone_number');
    echo $form->end('Add Student');
?>
