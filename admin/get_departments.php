<!-- get_departments.php -->
<?php
include('classe/user.class.php');

$p = new User('localhost', 'root', '', 'rh');
$department = $p->RetreiveByIdd();

if ($departement) {
    echo '<option value="' . $departement->id . '">' . $departement->name . '</option>';
}
?>
