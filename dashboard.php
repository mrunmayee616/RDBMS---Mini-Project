<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin: 0; font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #e8f5e9, #f1f8f4);">
    <div class="dashboard">
        <!-- left side -->
        <div class="editable-profile">
            <div class="profile-og">
                <div class="pfp-wrapper">
                    <?php
                        $pfp = $_SESSION['pfp'] ?? '';
                        if ($pfp == '') {
                            $pfp = "/project-rdbms/alter/rose.jpg"; // default image
                        }
                    ?>
                    <img src="<?php echo $pfp; ?>" alt="pfp" id="pfp">
                </div>
                <h2 id="displayName">
                    <?php echo $_SESSION['username'] ?? 'Your Name'; ?>
                </h2>
                <p id="displayEmail">
                    <?php 
                        echo ($_SESSION['fname'] ?? '') . " " . 
                        ($_SESSION['mname'] ?? '') . " " . 
                        ($_SESSION['lname'] ?? '');
                    ?>
                </p>
                <button onclick="openEditBox()">Edit Profile</button>
            </div>
            <div class="edit-details">
                <div id="editBox" class="edit-box">
                    <h3>Edit Profile</h3>
                    <div class="field">
                        <input type="text" id="fnameInput" placeholder="Enter First Name" disabled>
                        <button onclick="enableField('fnameInput', this)">Edit</button>
                    </div>

                    <div class="field">
                        <input type="text" id="mnameInput" placeholder="Enter Middle Name" disabled>
                        <button onclick="enableField('mnameInput', this)">Edit</button>
                    </div>

                    <div class="field">
                        <input type="text" id="lnameInput" placeholder="Enter Last Name" disabled>
                        <button onclick="enableField('lnameInput', this)">Edit</button>
                    </div>

                    <div class="field">
                        <input type="text" id="contactInput" placeholder="Enter Contact Number" disabled>
                        <button onclick="enableField('contactInput', this)">Edit</button>
                    </div>

                    <div class="field">
                        <input type="text" id="addressInput" placeholder="Enter Address" disabled>
                        <button onclick="enableField('addressInput', this)">Edit</button>
                    </div>

                    <div class="field">
                        <input type="file" id="pfpInput" disabled>
                        <button onclick="enableField('pfpInput', this)">Edit</button>
                </div>

                    <button class="save" onclick="saveChanges()">Save Changes</button>
                </div>
            </div>
        </div>

        <!-- right hand side -->
        <div class="content">
            <div class="tabs">
                <button class="active" onclick="switchTab('cart',this)">Your Cart</button>
                <button onclick="switchTab('orders', this)">Previous Order</button>
            </div>

            <!-- cart -->
            <div class="tab-content active" id="cart">
                <div class="card">
                    <button class="add-items" onclick="goTo('home.php')">+</button>
                </div>
            </div>

            <!-- orders -->
            <div class="tab-content" id="orders">
                <p>Nothing as of now</p>
            </div>
        </div>
    </div>
    
    <script src="first.js"></script>
</body>
</html>