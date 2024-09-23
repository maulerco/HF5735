<?php 
    include 'includes/header.php';
    if(!isset($_SESSION['loggedin'])){
        header('Location: login');
    }
     
?>
<h1>Account details</h1>
<?php include 'includes/footer.php'; ?>