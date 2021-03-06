<h1>Students</h1>
<table>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Created</th>
        <th>Send Message</th>
    </tr>

    <!-- Here is where we loop through our $students array, printing out the students -->

    <?php foreach ($studentList as $student): ?>
    <tr>
        <td><?php echo $student['Student']['id']; ?></td>
        <td><?php echo $student['Student']['first_name']; ?></td>
        <td><?php echo $student['Student']['last_name']; ?></td>
        <td><?php echo $student['Student']['phone_number']; ?></td>
        <td><?php echo $student['Student']['time_created']; ?></td>
        <td>
            <?php echo $html->link("Send Message", array('controller' => 'students', 'action' => 'sendMessage', $student['Student']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php echo $html->link("Add Student", array('controller' => 'students', 'action' => 'add')); ?>
