<h1>Sending Message to:</h1>
<h2>
    <?php echo $student['Student']['first_name']; ?> <?php echo $student['Student']['last_name']; ?>
    at <?php echo $student['Student']['phone_number']; ?>
</h2>

<?php
echo $form->create(false, array('action' => 'sendMessage/' . $student['Student']['id']));
echo $form->input('message');
echo $form->end('Send SMS Message');
?>
