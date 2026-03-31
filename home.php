<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plants and Petals</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <h2 class="header">🌿 PLANTS AND PETALS
        <div class="logsign">
                    <button class="log">Log In</button><button class="sign">Sign Up</button>
        </div>
        <div class="profile-container">
            <button id="menuBtn" class="prof"><img src="" id="profile-img"></button>
            <script>
                function logout() {
                    window.location.href = "/project-rdbms/logout.php";
                }
                document.addEventListener("DOMContentLoaded", function () {

                function renderMenu() {
                    const dropdown = document.getElementById("dropdown");
                    const isLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>;

                    if (isLoggedIn) {
                        dropdown.innerHTML = `
                            <p onclick="goTo('dashboard.php')">Dashboard</p>
                            <p onclick="goTo('profile.php')">Survival Needs</p>
                            <p onclick="goTo('profile.php')">Products</p>
                            <p onclick="goTo('profile.php')">Diseases</p>
                            <p onclick="logout()">Logout</p>
                        `;
                    } else {
                        dropdown.innerHTML = `
                            <p onclick="goTo('profile.php')">Survival Needs</p>
                            <p onclick="goTo('profile.php')">Products</p>
                            <p onclick="goTo('profile.php')">Diseases</p>
                        `;
                    }
                }

                function goTo(page) {
                    window.location.href = page;
                }

                renderMenu();
                const profilePic = document.getElementById("profile-img");
                const pfp = "<?php echo $_SESSION['pfp'] ?? ''; ?>";

                console.log("PFP:", pfp); // debug

                if (pfp !== "") {
                    profilePic.src = pfp;
                } else {
                    profilePic.src = "/project-rdbms/alter/rose.jpg";
                }

                });
            </script>
            <div id="dropdown" class="dropdown-content">
                
            </div>
        </div>
    </h2>

    <div class="promo">
        <p style="font-weight: 525;">
            Welcome to Plants and Petals, your all-in-one platform for managing a thriving nursery with ease and care. 
            Track every plant from seed to sale, maintain accurate inventory, monitor plant health, and streamline 
            daily operations—all in one place.
        </p>
    </div>

    <p style="font-size: xx-large; justify-content: center;align-items: center;display: flex;background-color: #b0d4c2;padding: 25px;">&nbsp;Our Plants , Blooms and Blossoms !!!</p>

    <p class="cap">-- Blossoms --</p>
    <div class="container">
        <!-- Flower 1 -->
        <div class="box">
            <img src="alter/pla3.webp" alt="rose">
            <h3>Plant Name: Rose <br>Available as: Seed , Sapling</h3>
            <div style="display: flex; gap: 5vh;">
                <button class="btn-ac1">Add to cart</button>
                <div class="qty-box">
                    <button class="minus">-</button>
                    <span class="count">0</span>
                    <button class="plus">+</button>
                </div>
            </div>
            <button class="details-btn">Show Details</button>
        </div>
        <!-- Flower 2 -->
        <div class="box">
            <img src="alter/pla8.jpg" alt="lily">
            <h3>Plant Name: Lily <br>Available as: Seed , Sapling</h3>
            <div style="display: flex; gap: 5vh;">
                <button class="btn-ac1">Add to cart</button>
                <div class="qty-box">
                    <button class="minus">-</button>
                    <span class="count">0</span>
                    <button class="plus">+</button>
                </div>
            </div>
            <button class="details-btn">Show Details</button>
        </div>
        <!-- Flower 3 -->
        <div class="box">
            <img src="alter/pla1.webp" alt="Tulip">
            <h3>Plant Name: Tulip <br>Available as: Seed , Sapling</h3>
            <div style="display: flex; gap: 5vh;">
                <button class="btn-ac1">Add to cart</button>
                <div class="qty-box">
                    <button class="minus">-</button>
                    <span class="count">0</span>
                    <button class="plus">+</button>
                </div>
            </div>
            <button class="details-btn">Show Details</button>
        </div>
        <!-- Flower 4 -->
        <div class="box">
            <img src="alter/pla2.avif" alt="sunflower">
            <h3>Plant Name: Sunflower <br>Available as: Seed , Sapling</h3>
            <div style="display: flex; gap: 5vh;">
                <button class="btn-ac1">Add to cart</button>
                <div class="qty-box">
                    <button class="minus">-</button>
                    <span class="count">0</span>
                    <button class="plus">+</button>
                </div>
            </div>
            <button class="details-btn">Show Details</button>
        </div>
    </div>
    <p class="cap">Shrubs</p>
    <div class="container">
        <!-- Shrub 1 -->
        <div class="box">
            <img src="alter/he1.webp" alt="cotton">
            <h3>Plant Name: Cotton <br>Available as: Seed , Sapling</h3>
            <div style="display: flex; gap: 5vh;">
                <button class="btn-ac1">Add to cart</button>
                <div class="qty-box">
                    <button class="minus">-</button>
                    <span class="count">0</span>
                    <button class="plus">+</button>
                </div>
            </div>
            <button class="details-btn">Show Details</button>
        </div>
        <!-- Shrub 2 -->
        <div class="box">
            <img src="alter/shu1.jpg" alt="currey">
            <h3>Plant Name: Currey Leaves <br>Available as: Seed , Sapling</h3>
            <div style="display: flex; gap: 5vh;">
                <button class="btn-ac1">Add to cart</button>
                <div class="qty-box">
                    <button class="minus">-</button>
                    <span class="count">0</span>
                    <button class="plus">+</button>
                </div>
            </div>
            <button class="details-btn">Show Details</button>
        </div>
        <div class="box">Plant 3</div>
        <div class="box">Plant 4</div>
    </div>
    <p class="cap">Herbs</p>
    <div class="container">
        <div class="box">Plant 1</div>
        <div class="box">Plant 2</div>
        <div class="box">Plant 3</div>
        <div class="box">Plant 4</div>
    </div>
<script src="first.js"></script>
</body>
</html>