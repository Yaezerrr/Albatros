document.addEventListener("DOMContentLoaded", () => {
    const birdSound = document.getElementById('birdSound');
    const bird = document.querySelector('.albatross-bird');
    const loginButton = document.getElementById('loginButton');
    const signupButton = document.getElementById('signupButton');

    function flyBird(redirectUrl) {
        console.log("Bird is flying!"); // Debugging log to confirm the function is triggered
        
        bird.style.display = 'block';
        bird.style.animation = 'flyAway 1s forwards';

        birdSound.currentTime = 0; // Reset the audio to the beginning
        birdSound.play(); // Play the sound

        // Redirect after the sound has finished playing
        birdSound.onended = () => {
            console.log("Sound finished, redirecting...");
            window.location.href = redirectUrl; // Perform the redirect to the provided URL
        };
    }

    loginButton.addEventListener('click', () => {
        console.log("Login button clicked!");
        flyBird('http://localhost/albatross/login.php'); // Redirect to login page
    });

    signupButton.addEventListener('click', () => {
        console.log("Sign Up button clicked!");
        flyBird('http://localhost/albatross/register.php'); // Redirect to sign up page
    });
});
