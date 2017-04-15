<?php

/**
 * Created by PhpStorm.
 * User: Jake
 * Date: 4/14/2017
 * Time: 20:14
 */
class create_account
{

    function CreateAccountButtonClick(){

        $servername = "localhost";
        $username = "root";
        //Change?
        $password = "password";

// Create connection
        $conn = new mysqli($servername, $username, $password);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

        $dbh = "";
        $stmt = $dbh->prepare("INSERT INTO USERS (USERNAME, FIRSTNAME, LASTNAME, EMAIL, PASSWDHASH, LASTUPDATED, LASTUPDATEDBY)
            VALUES (:USERNAME, :FIRSTNAME, :LASTNAME, :EMAIL, :PASSWDHASH, :LASTUPDATED, :LASTUPDATEDBY);");

        //Example
        //$stmt->bindParam(':name', $name);

        $stmt->bindParam(':USERNAME', txtUserName.Value);
        $stmt->bindParam(':FIRSTNAME', txtFirstName.Value);
        $stmt->bindParam(':LASTNAME', txtLastName.Value);
        $stmt->bindParam(':EMAIL', txtEmail.Value);
        $stmt->bindParam(':PASSWDHASH', passwordHash);
        $stmt->bindParam(':LASTUPDATED', DateTime.Today);
        $stmt->bindParam(':LASTUPDATEDBY', "Zachary Torok");
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

        $to      = 'nobody@example.com';
        $subject = 'Your New Wildlife Center of Virginia Account';
        $message = txtFirstName.Value . ',\n\nThank you for creating a Wildlife Center account!  Please click on the link below to complete out you application.\n\n\n'
            ."http://../WLS-CSHARP/applicant/application-index.html";
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

    }


}