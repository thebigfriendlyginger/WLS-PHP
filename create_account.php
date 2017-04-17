<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="NiceAdmin/img/favicon.png">

    <title>VA Wildlife Center: Logged out</title>

    <!-- Bootstrap CSS -->
    <link href="NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="NiceAdmin/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->

    <link href="NiceAdmin/css/style-responsive.css" rel="stylesheet" />

    <!--OUR STYLEGUIDE -->
    <link href="custom-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->


    <?php

    /**
     * Created by PhpStorm.
     * User: Jake
     * Date: 4/14/2017
     * Time: 20:14
     */

    $servername = "localhost";
    $username = "root";
    $password = "password";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";




        function CreateAccountButtonClick($conn){



            $dbh = "";
            $stmt = $conn->prepare("INSERT INTO USERS (USERNAME, FIRSTNAME, LASTNAME, EMAIL, PASSWDHASH, LASTUPDATED, LASTUPDATEDBY)
            VALUES (:USERNAME, :FIRSTNAME, :LASTNAME, :EMAIL, :PASSWDHASH, :LASTUPDATED, :LASTUPDATEDBY);");

            $username = $_POST["username"];
            $fName = $_POST["fName"];
            $lName = $_POST["lName"];
            $email = $_POST["email"];
            $ePassword = $_POST["enterPassword"];
            $rePassword = $_POST["rePassword"];
            $date = date('Y-m-d H:i:s');

            //Example
            //$stmt->bindParam(':name', $name);

            $stmt->bindParam(':USERNAME', $username);
            $stmt->bindParam(':FIRSTNAME', $fName);
            $stmt->bindParam(':LASTNAME', $lName);
            $stmt->bindParam(':EMAIL', $email);
            $stmt->bindParam(':PASSWDHASH', $ePassword); //Needs to be Hashed
            $stmt->bindParam(':LASTUPDATED', $date);
            $stmt->bindParam(':LASTUPDATEDBY', "Jacob DuHadway");
            $stmt -> execute();

            //if(txtEmail.Value.Contains("gmail")){

            //    SendApplicantMessage("aspmx.l.google.com", txtEmail.Value);
            //}
            //if(txtEmail.Value.Contains("jmu.edu")){
            //    SendApplicantMessage("exchange.jmu.edu", txtEmail.Value);
            //}
            //Response.Redirect("account-confirmation.aspx");
        }

        function SendApplicantMessage(){

            $fName = $_POST["fName"];
            $to      = 'duhadwje@dukes.jmu.edu';
            $subject = 'Your New Wildlife Center of Virginia Account';
            $message = $fName . ',\n\nThank you for creating a Wildlife Center account!  Please click on the link below to complete out you application.\n\n\n'
                ."http://../WLS-CSHARP/applicant/application-index.html";
            $headers = 'From: webmaster@example.com' . "\r\n" .
                'Reply-To: webmaster@example.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

        }




    ?>

</head>

<body class="login-img3-body">

<div class="container">

    <form class="login-form" action="NiceAdmin/index.html">
        <div class="login-wrap clock-confirmation">
            <!--CREATE ACCOUNT CONFIRMATION-->
            <p>You have made an account! <br>Visit your registered email for a confirmation message.</p>
        </div>
    </form>
    <div class="text-right">

    </div>
</div>

<?php

CreateAccountButtonClick($conn);

?>

</body>
</html>
