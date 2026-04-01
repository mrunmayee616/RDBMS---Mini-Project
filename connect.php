<?php
session_start();
$conn = pg_connect("host=localhost dbname=plant_database user=postgres password=postgresql");
if (!$conn) {
    die("Connection failed");
}

$action = $_POST['action'] ?? '';

if ($action == 'signup') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $photo    = $_POST['photo-user'] ?? '';
    $fname    = $_POST['first-name'] ?? '';
    $mname    = $_POST['mid-name'] ?? '';
    $lname    = $_POST['last-name'] ?? '';
    $contact1 = $_POST['contact1'] ?? '';
    $contact2 = $_POST['contact2'] ?? '';
    $address  = $_POST['address'] ?? '';

    // Insert user safely
    $query = "INSERT INTO users(username, passwrd, fname, mname, lname, address_, pfp_link)
              VALUES($1, $2, $3, $4, $5, $6, $7)";

    $result = pg_query_params($conn, $query,
        array($username, $password, $fname, $mname, $lname, $address, $photo)
    );

    if (!$result) {
        echo "Error: " . pg_last_error($conn);
        exit;
    }

    // Insert contacts
    if (!empty($contact1)) {
        pg_query($conn, "INSERT INTO contacts(username, contact) VALUES('$username', '$contact1')");
    }

    if (!empty($contact2)) {
        pg_query($conn, "INSERT INTO contacts(username, contact) VALUES('$username', '$contact2')");
    }

    echo "Signup successful!";
}

elseif ($action == 'login') {

$user = trim($_POST['username']);
$pass = trim($_POST['password']);

$query = "SELECT * FROM users WHERE username = $1 AND passwrd = $2";
$result = pg_query_params($conn, $query, array($user, $pass));

if (pg_num_rows($result) > 0) {

    $row = pg_fetch_assoc($result);

    // ✅ STORE SESSION VALUES
    $_SESSION['username'] = $row['username'];
    $_SESSION['pfp'] = $row['pfp_link'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['mname'] = $row['mname'];
    $_SESSION['lname'] = $row['lname'];

    echo "success"; // ⚠️ important for JS

} else {
    echo "fail";
}
}

if ($action == 'updateProfile') {

    $username = $_SESSION['username'] ?? '';
    if (!$username) {
        echo "Not logged in";
        exit;
    }
    $in_fname=$_SESSION['fnameInput'] ?? '';
    if($in_fname!=''){
        $query = "UPDATE users SET fname= $in_fname WHERE username=$username";
        $result = pg_query_params($conn, $query, array($user, $pass));
    }

    echo "Profile updated successfully!";
}
?>