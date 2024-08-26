<?php
include '../includes/header.php';
// string variable
$name = "Peter";
//integer variable
$age = 21;
//boolean variable
$bool = TRUE;
//float - decimal
$float = 2.411111111;
//array
$cars = array("volvo", "renault", "vauxhall", "tesla");
echo "$cars[1]<br>";

//unfinished
// class Car {
//     public $model;
//     public function __construct($model) {
//         $this->var = $var;
//     }

//     public function getModel() {
//         return $this->model;
//     }
// }

$planet = "Mars";
function greet($planet) {
    echo "Hi there I am from $planet";
}
greet($planet);
?>

<header>
    <p>Hi my name is <?= $name ?> and I am <?= $age ?></p>
</header>

<?php
include '../includes/footer.php';
?>