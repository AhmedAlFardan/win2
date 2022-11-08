<?php

$firstName =   $_POST['firstName'];
$lastName =    $_POST['lastName'];
$email =       $_POST['email'];

$errors = [
    'firstNameError' => '',
    'lastNameError ' => '',
    'emailError    ' => '',

];




if (isset($_POST['submit'])) { 

   




   
     // تحقق الأسم الأول
     if(empty($firstName)){
         $errors['firstNameError'] = ' يرجى ادخال الأسم الأول';
    }
    
    // تحقق الأسم الأخير
    if(empty($lastName)){
         $errors['lastNameError'] = 'يرجى ادخال الأسم الأخير ';
    }
    // تحقق الأيميل
    if(empty($email)){
         $errors['emailError'] = 'يرجى ادخال الأيميل  ';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $errors['emailError'] = 'يرجى ادخال إيميل صحيح ';

    }     
        

    // تحقق لايوجد اخطاء
    if(!array_filter($errors)){
        $firstName =   mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName =    mysqli_real_escape_string($conn, $_POST['lastName']);
        $email =       mysqli_real_escape_string($conn, $_POST['email']);

        $sql ="INSERT INTO users(firstName,lastName,email) 
            VALUES ('$firstName','$lastName','$email')";

       if( mysqli_query($conn, $sql)){
             header('Location: '. $_SERVER['PHP_SELF']);
        }else{
             echo 'Error: ' . mysqli_error($conn);
        }
    } 
   
}
