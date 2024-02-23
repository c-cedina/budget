// Obtenez les boutons et les divs de formulaire
const btnSignup = document.getElementById("btnSignup");
const btnLogin = document.getElementById("btnLogin");
const signupDiv = document.getElementById("signup");
const loginDiv = document.getElementById("login");

// Afficher le formulaire d'inscription lorsque le bouton "Sign Up" est cliqué
btnSignup.addEventListener("click", function () {
    signupDiv.style.display = "block";
    loginDiv.style.display = "none";
});

// Afficher le formulaire de connexion lorsque le bouton "Log In" est cliqué
btnLogin.addEventListener("click", function () {
    signupDiv.style.display = "none";
    loginDiv.style.display = "block";
});



// Sélectionnez tous les boutons avec la classe "btn"
const buttons = document.querySelectorAll(".btn");

// Ajoutez un gestionnaire d'événements pour chaque bouton
buttons.forEach((button) => {
    button.addEventListener("click", () => {
        // Retirez la classe "active" de tous les boutons
        buttons.forEach((btn) => {
            btn.classList.remove("active");
        });

        // Ajoutez la classe "active" uniquement au bouton cliqué
        button.classList.add("active");
    });
});

