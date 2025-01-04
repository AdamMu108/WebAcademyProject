document.addEventListener("DOMContentLoaded", () => {
    const alreadySubscribedButton = document.getElementById("already-subscribed");
    const backToSignupButton = document.getElementById("back-to-signup");
    const signupForm = document.getElementById("signup-form");
    const loginForm = document.getElementById("login-form");

    alreadySubscribedButton.addEventListener("click", () => {
        signupForm.style.display = "none";
        loginForm.style.display = "block";
        alreadySubscribedButton.style.display = "none";
        backToSignupButton.style.display = "inline-block";
    });

    backToSignupButton.addEventListener("click", () => {
        loginForm.style.display = "none";
        signupForm.style.display = "block";
        backToSignupButton.style.display = "none";
        alreadySubscribedButton.style.display = "inline-block";
    });
});