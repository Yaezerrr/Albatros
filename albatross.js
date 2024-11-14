window.onload = () => {
    const bird = document.querySelector('.albatross-bird');

    // Optional: Animate the bird when clicking either button
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', () => {
            bird.style.transition = "transform 1s linear";
            bird.style.transform = "translateX(-200vw)";
        });
    });
};
window.addEventListener("resize", function() {
    const header = document.querySelector('header');
    const windowWidth = window.innerWidth;

    if (windowWidth <= 768) {
        header.style.height = `${window.innerHeight}px`; // Dynamically set height for mobile view
    } else {
        header.style.height = '100vh'; // Reset to full viewport height on larger screens
    }
});
