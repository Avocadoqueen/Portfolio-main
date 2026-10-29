<?php
require_once __DIR__ . '/lib/appointments.php';

 $fname = $lname = $dob = $gender = $occupation = '';
 $fnameErr = $lnameErr = $dobErr = $genderErr = $occupationErr = '';

 if(isset($_POST['submit'])) {

    if(empty($_POST['fname'])) {
        $fnameErr = 'First Name is required *';
    } else {
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    //for lname validation
    if(empty($_POST['lname'])) {
        $lnameErr = 'Last Name is required *';
    } else {
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //for dob validation
    if(empty($_POST['dob'])) {
        $dobErr = 'Date of Birth is required *';
    } else {
        $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //for gender
    if(empty($_POST['gender'])) {
        $genderErr = 'Gender is required *';
    } else {
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    //for occupation
    if(empty($_POST['occupation'])) {
        $occupationErr = 'Occupation is required *';
    } else {
        $occupation = filter_input(INPUT_POST, 'occupation', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    
 }
?>

<?php
$uni = $stdno ='';
$uniErr = $stdnoErr = '';

//for uni
if (isset($_POST['sub'])) {

    if(empty($_POST['uni'])) {
        $uniErr = 'University is required *';
}   else{
    $uni = filter_input(INPUT_POST, 'uni', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

//FOR STDNO
    if (empty($_POST['stdno'])) {
        $stdnoErr = 'Student Number is required *';
}   else{
    $stdno = filter_input(INPUT_POST, 'stdno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}

}
?>

<?php 
$passworda = $emaila = '';
$passwordaErr = $emailaErr = '';

//for the third form from page3 
if (isset($_POST['mit'])) {
    if (empty($_POST['emaila'])) {
        $emailaErr = 'The email field is required *';
    } else {
        $emaila = filter_input(INPUT_POST, 'emaila', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['passworda'])) {
        $passwordaErr = 'The password field is required *';
    } 
}
?>

<?php
$name = $aptype = $doc = $aptime = $apdate = $reason = '';
$nameErr = $aptypeErr = $docErr = $aptimeErr = $apdateErr ='';
$appointmentMessage = '';

//for the 7th form from page7
if (isset($_POST['pib'])) {
    if (empty($_POST['name'])) {
        $nameErr = 'The name field is required *';
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['aptype'])) {
        $aptypeErr = 'The Appointment type is required *';
    } else {
        $aptype =  filter_input(INPUT_POST, 'aptype', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['doc'])) {
        $docErr = 'The Doctor type is required *';
    } else {
        $doc =  filter_input(INPUT_POST, 'doc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['aptime'])) {
        $aptimeErr = 'The Appointment time is required *';
    } else {
        $aptime =  filter_input(INPUT_POST, 'aptime', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }


    if (empty($_POST['apdate'])) {
        $apdateErr = 'The Appointment date is required *';
    } else {
        $apdate =  filter_input(INPUT_POST, 'apdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (!empty($_POST['reason'])) {
        $reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (!$nameErr && !$aptypeErr && !$docErr && !$aptimeErr && !$apdateErr) {
        try {
            create_appointment([
                'name' => $name,
                'date' => $apdate,
                'time' => $aptime,
                'reason' => $reason,
                'type' => $aptype,
                'doctor' => $doc,
            ]);
            $appointmentMessage = 'Appointment saved.';
        } catch (Exception $e) {
            $appointmentMessage = 'Could not save appointment.';
        }
    }
}
?>

<?php
$aptime = $apdate = '';
$aptimeErr =$apdateErr = '';

//for the form from page10
if (isset($_POST['flop'])) {
    if (empty($_POST['aptime'])) {
        $aptimeErr = 'The Appointment time is required *';
    } else {
      $aptime = filter_input(INPUT_POST, 'aptime', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['apdate'])) {
        $apdateErr = 'The Appointment date is required *';
    } else {
        $apdate = filter_input(INPUT_POST, 'apdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
}

?>

<?php
$password = $pword = $email = $phoneno = '';
$passwordErr = $pwordErr = $emailErr = $phonenoErr = '';

//for form from page4
if (isset($_POST['blop'])) {
    if (empty($_POST['email'])) {
        $emailErr = 'The email field is required *';
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['phoneno'])) {
        $phonenoErr = 'The Phone number field is required *';
    } else {
        $phoneno = filter_input(INPUT_POST, 'phoneno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['password'])) {
        $passwordErr = 'The password field is required *';
    } 

    if ( $_POST['password'] === $_POST['pword'] ) {
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    } else {
        $pwordErr = 'Your password confirmation is not the same as your password *';
    } 
}
?>
