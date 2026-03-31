//addition - subtraction
document.querySelectorAll(".qty-box").forEach(box => {

    let count = 0;

    let plus = box.querySelector(".plus");
    let minus = box.querySelector(".minus");
    let display = box.querySelector(".count");

    plus.addEventListener("click", () => {
        count++;
        display.textContent = count;
    });

    minus.addEventListener("click", () => {
        count = Math.max(0, count - 1);
        display.textContent = count;
    });
});

//drop-down
// Get login state
// function login() {
//     localStorage.setItem("isLoggedIn", "true"); // ✅ set first
//     window.location.href = "home.html"; // then redirect
// }
function login() {
    const formData = new FormData(document.querySelector("form"));
    formData.append("action", "login");

    fetch("connect.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        if (data.trim() === "success") {
            window.location.href = "home.php"; // ✅ redirect
        } else {
            alert("Invalid login");
        }
    });
}

// function logout() {
//     // localStorage.setItem("isLoggedIn", "false");
//     window.location.href = "home.html";
// }

let btn = document.getElementById("menuBtn");
let dropdown = document.getElementById("dropdown");

// function renderMenu() {
//     const isLoggedIn = localStorage.getItem("isLoggedIn"); // ✅ ALWAYS fresh value

//     if (isLoggedIn === "true") {
//         dropdown.innerHTML = `
//             <p onclick="goTo('dashboard.html')">Dashboard</p>
//             <p onclick="goTo('profile.html')">Survival Needs</p>
//             <p onclick="goTo('profile.html')">Products</p>
//             <p onclick="goTo('profile.html')">Diseases</p>
//             <p onclick="logout()">Logout</p>
//         `;
//     } else {
//         dropdown.innerHTML = `
//             <p onclick="goTo('profile.html')">Survival Needs</p>
//             <p onclick="goTo('profile.html')">Products</p>
//             <p onclick="goTo('profile.html')">Diseases</p>
//         `;
//     }
// }

function goTo(page) {
    window.location.href = page;
}

// ✅ Run AFTER page loads
// document.addEventListener("DOMContentLoaded", () => {
//     renderMenu();
// });

// Dropdown toggle
btn.addEventListener("click", (e) => {
    e.stopPropagation();
    dropdown.style.display =
        dropdown.style.display === "block" ? "none" : "block";
});

window.addEventListener("click", () => {
    dropdown.style.display = "none";
});
// sign-up, login
let sign=document.querySelector(".sign");
let log=document.querySelector(".log");
sign.addEventListener("click",()=>{
    window.location.href="sign-up.html";
});

log.addEventListener("click",()=>{
    window.location.href="login.html";
});

//dashboard
function switchTab(tabId, btn) {
    document.querySelectorAll(".tab-content").forEach(t => t.classList.remove("active"));
    document.querySelectorAll(".tabs button").forEach(b => b.classList.remove("active"));

    document.getElementById(tabId).classList.add("active");
    btn.classList.add("active");
}

function openEditBox() {
    document.getElementById("editBox").classList.add("active");
}

/* Enable individual field */
function enableField(id, btn) {
    let field = document.getElementById(id);
    field.disabled = false;
    field.focus();
}

/* Save Changes */
function saveChanges() {
    let formData = new FormData();
    let somethingEdited = false;
    
    document.getElementById("editBox").classList.remove("active");
    document.getElementById("editBox").display=none;

    formData.append("action", "updateProfile");
    const fields = ["fnameInput", "mnameInput", "lnameInput", "contactInput", "addressInput"];
    fields.forEach(id => {
        const val = document.getElementById(id).value;
        const edited = editedFields[id] ? "1" : "0";
        formData.append(id.replace("Input", ""), val); // key like fname, mname, etc
        formData.append(id.replace("Input", "") + "_edited", edited);
        if (edited === "1") somethingEdited = true;
    });

    if (somethingEdited) {
        fetch("connect.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.text())
        .then(res => {
            alert(res);
            // Reload page to show updated session values
            setTimeout(() => location.reload(), 500);
        });
    }
}