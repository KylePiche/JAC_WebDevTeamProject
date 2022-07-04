<?php
// define variables and set to empty values
$nameErr = $emailErr = $addressErr = $countryErr = $stateErr = 
$zipErr = $cardErr = $ccNameErr = $ccNumErr = $ccExpErr = $ccCvvErr = "";
$name = $email = $address = $address2 = $country = 
$state = $zip = $card = $ccName = $ccNum = $ccExp = $ccCvv = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["address2"])) {
    $address2 = "";
  } else {
    $address2 = test_input($_POST["address2"]);
  }

  if (empty($_POST["country"])) {
    $countryErr = "Country is required";
  } else {
      $country = $_POST["country"];
  }

  if (empty($_POST["state"])) {
    $stateErr = "State/Province is required";
  } else {
      $state = $_POST["state"];
  }

  if (empty($_POST["zip"])) {
    $zipErr = "Zip/Postal Code is required";
  } else {
    $zip = test_input($_POST["zip"]);
    // check if it's either an american ZIP code or a canadian Postal Code
    if (!preg_match("/^(\d{5}(-\d{4})?|[A-CEGHJ-NPRSTVXY]\d[A-CEGHJ-NPRSTV-Z] ?\d[A-CEGHJ-NPRSTV-Z]\d)$/",$zip)) {
      $zipErr = "Please enter a valid zip/Postal code";
    }
  }

  if (empty($_POST["card"])) {
    $cardErr = "Card type is required";
  } else {
    $card = test_input($_POST["card"]);
  }

  if (empty($_POST["ccName"])) {
    $ccNameErr = "Full name is required";
  } else {
    $ccName = test_input($_POST["ccName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$ccName)) {
      $ccNameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["ccNum"])) {
    $ccNumErr = "Card number is required";
  } else {
    $ccNum = test_input($_POST["ccNum"]);
    // matches Visa, Master Card, Amex, Diners Club, Discover, and JCB cards
    if (!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/",$ccNum)) {
      $ccNumErr = "Enter a valid card number";
    }
  }

  if (empty($_POST["ccExp"])) {
    $ccExpErr = "Card expiration is required";

  } else {
    $ccExp = test_input($_POST["ccExp"]);
    // matches regular expiration dates on credit cards
    if (!preg_match("/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/",$ccExp)) {
      $ccExpErr = "Enter a valid expiration date";
    }
  }

  if (empty($_POST["ccCvv"])) {
    $ccCvvErr = "Card CVV is required";
  } else {
    $ccCvv = test_input($_POST["ccCvv"]);
    // matches CVV on credit cards
    if (!preg_match("/^[0-9]{3,4}$/",$ccCvv)) {
      $ccCvvErr = "Enter a valid CVV";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>