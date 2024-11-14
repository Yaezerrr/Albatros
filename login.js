document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent immediate form submission

    // Get the values from the form
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Get the audio elements
    const successSound = document.getElementById('successSound');
    const errorSound = document.getElementById('errorSound');

    // Email validation regex (basic check for valid email format)
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Perform validation (check if email and password are filled)
    if (email && password) {
        if (!emailPattern.test(email)) {
            // If the email format is invalid, play the error sound
            errorSound.play().then(() => {
                errorSound.onended = () => {
                    alert("Please enter a valid email format.");
                };
            }).catch(error => {
                console.error("Error playing error sound:", error);
            });
        } else {
            // If valid email format, play success sound and submit form
            successSound.play().then(() => {
                successSound.onended = () => {
                    this.submit(); // Submit the form after the sound finishes
                };
            }).catch(error => {
                console.error("Error playing success sound:", error);
                this.submit(); // Submit immediately if sound fails to play
            });
        }
    } else {
        // If fields are incomplete (either email or password), play error sound
        errorSound.play().then(() => {
            errorSound.onended = () => {
                alert("Please fill out both fields.");
            };
        }).catch(error => {
            console.error("Error playing error sound:", error);
        });
    }
});
