<?php
ob_start();
?>
<!doctype html>
<html>
<head><title>www.composer.com</title>

<style>
.required label { color: maroon };
</style>

</head>
<body>

<center>
	<?php 
require_once('./vendor/autoload.php'); 
use Nette\Forms\Form;
$con = new mysqli('localhost','root','','composer_db');

if(isset($_POST['send']))
    {
	$a=$_POST['name'];
	$b=$_POST['password'];
    $c=$_POST['email'];
    $d=$_POST['mobile'];
	$e=$_POST['address'];
	$f=$_POST['gender'];
	
    $i=	"insert into composer_db(name,password,email,mobile,address,gender)values('$a','$b','$c','$d','$e','$f')";
	
	if($con->query($i)==TRUE)
	{
		echo "<script> alert('YOUR DATE IS SAVED!!!!') </script>";
	}
     }
$form = new Form;


$form->addText('name', 'Name:')->setRequired('Please Enter Name...!!');
$form->addText('email', 'E-mail:')->setRequired('Please Enter Email...!!')->setDefaultValue("abc@gmail.com");
$form->addPassword('password', 'Password:')->setRequired('Please Enter Password...!!');
$form->addInteger('mobile','Mobile No:')->setNullable();
$form->addTextArea('note', 'Address:')  
	->addRule($form::MAX_LENGTH, 'Your note is way too long', 10000);

	$sex = [
		'm' => 'male',
		'f' => 'female',
	];
	$form->addRadioList('gender', 'Gender:', $sex);	
$form->addSubmit('send', 'submit');



    

echo $form;

?>
</center>
</body>
</html>
<?php
ob_end_flush();
?>

