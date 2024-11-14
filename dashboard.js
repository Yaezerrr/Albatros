document.addEventListener("DOMContentLoaded", () => {
    // Sidebar Navigation and Section Display
    function showSection(sectionId) {
        const sections = document.querySelectorAll("main section");
        sections.forEach(section => {
            section.style.display = section.id === sectionId ? "block" : "none";
        });
    }

    document.querySelectorAll("aside ul li a").forEach(link => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            const sectionId = link.getAttribute("href").substring(1);
            showSection(sectionId);
        });
    });

    // Seat Selection for Bus Booking
    const seatGrid = document.getElementById("seatSelection");
    const serviceTypeSelect = document.getElementById("serviceType");
    const selectSeatsButton = document.getElementById("selectSeatsButton");
    const selectedSeatsDisplay = document.getElementById("selectedSeats");
    const selectedBusList = document.getElementById("selectedBusList");
    const selectedBusImage = document.getElementById("selectedBusImage");
    let seatsVisible = false;
    const selectedSeats = new Set();

    // Variables to store booking details
    let selectedBus = null;
    let travelDate = "";
    let travelTime = "";
    let destination = "";
    let serviceType = "";

    // Render seats based on service type
    function renderSeats(serviceType) {
        seatGrid.innerHTML = "";
        selectedSeats.clear();

        if (serviceType === "economy") {
            createSeats(4, 4, "Toyota Hiace");
        } else if (serviceType === "business") {
            createSeats(3, 4, "Mercedes Land Jet");
        } else if (serviceType === "firstClass") {
            createSeats(1, 2, "Mercedes Land Jet");
        }
        updateSelectedSeatsDisplay();
    }

    // Create seat buttons dynamically based on rows and columns
    function createSeats(rows, seatsPerRow, vehicleType) {
        for (let row = 0; row < rows; row++) {
            const rowDiv = document.createElement("div");
            rowDiv.classList.add("seat-row");

            for (let seat = 0; seat < seatsPerRow; seat++) {
                if (row === 0 && seat > 1) continue;
                if (vehicleType === "Mercedes Land Jet" && row === 0 && seat === 0) continue;

                const seatButton = document.createElement("button");
                let seatLabel;

                if (row === 0 && seat === 0) {
                    seatLabel = "Driver";
                    seatButton.disabled = true;
                } else if (row > 0 && seat === 0) {
                    seatLabel = "Window";
                } else if (row > 0 && seat === 1) {
                    seatLabel = "Aisle";
                } else {
                    seatLabel = seat === 2 ? "Aisle" : "Window";
                }

                seatButton.textContent = `Row ${row + 1} - Seat ${seat + 1} (${seatLabel})`;
                seatButton.classList.add("seat");

                seatButton.addEventListener("click", () => {
                    const seatKey = `Row ${row + 1} - Seat ${seat + 1}`;
                    const fullSeatKey = `${seatKey} (${seatLabel})`;

                    if (seatButton.classList.contains("selected")) {
                        seatButton.classList.remove("selected");
                        selectedSeats.delete(fullSeatKey);
                    } else {
                        seatButton.classList.add("selected");
                        selectedSeats.add(fullSeatKey);
                    }
                    updateSelectedSeatsDisplay();
                });

                rowDiv.appendChild(seatButton);
            }
            seatGrid.appendChild(rowDiv);
        }
    }

    // Update the displayed list of selected seats
    function updateSelectedSeatsDisplay() {
        selectedSeatsDisplay.textContent = Array.from(selectedSeats).join(", ") || "None";
    }

    // Toggle the visibility of seat selection grid
    selectSeatsButton.addEventListener("click", () => {
        seatsVisible = !seatsVisible;
        seatGrid.style.display = seatsVisible ? "block" : "none";
        if (seatsVisible) renderSeats(serviceTypeSelect.value);
    });

    // Display the bus image based on service type selection
    serviceTypeSelect.addEventListener("change", (e) => {
        serviceType = e.target.value;
        const busImage = document.createElement("img");
        const imageSrc = serviceType === "economy" ? "images/interior1.png" :
                         serviceType === "business" ? "images/interior3.png" : "images/interior4.jpeg";

        busImage.src = imageSrc;
        busImage.alt = `${serviceType} interior image`;
        busImage.style.width = "100%";
        busImage.style.height = "auto";
        
        selectedBusImage.innerHTML = "";
        selectedBusImage.appendChild(busImage);
    });

    // Select the bus company and display the details
    document.querySelectorAll('.bus-company').forEach(company => {
        company.addEventListener("click", () => {
            selectedBus = company.querySelector('p').textContent;
            displaySelectedBus();
        });
    });

    // Display the selected bus and its details
    function displaySelectedBus() {
        if (!selectedBus || !travelDate || !travelTime || !destination || !serviceType || selectedSeats.size === 0) {
            alert("Please complete all fields before selecting a bus.");
            return;
        }

        const busList = document.getElementById("busList");
        const busItem = document.createElement("li");

        busItem.innerHTML = ` 
            <strong>Bus Company:</strong> ${selectedBus}<br>
            <strong>Service Type:</strong> ${serviceType}<br>
            <strong>Date:</strong> ${travelDate}<br>
            <strong>Time:</strong> ${travelTime}<br>
            <strong>Destination:</strong> ${destination}<br>
            <strong>Selected Seats:</strong> ${Array.from(selectedSeats).join(", ")}
        `;
        busList.appendChild(busItem);
        selectedBusList.style.display = 'block';
    }

    // Capture the travel date, time, and destination selections
    document.getElementById("travelDate").addEventListener("change", (e) => {
        travelDate = e.target.value;
    });

    document.getElementById("travelTime").addEventListener("change", (e) => {
        travelTime = e.target.value;
    });

    document.getElementById("destination").addEventListener("change", (e) => {
        destination = e.target.value;
    });

    // Handle the booking form submission
    document.getElementById("bookingForm").addEventListener("submit", (e) => {
        e.preventDefault();
        if (!selectedBus || !travelDate || !travelTime || !destination || !serviceType || selectedSeats.size === 0) {
            alert("Please complete all fields before booking.");
            return;
        }

        const bookingHistory = document.getElementById("bookingHistory");
        const bookingItem = document.createElement("li");

        bookingItem.innerHTML = ` 
            <strong>Bus Company:</strong> ${selectedBus}<br>
            <strong>Date:</strong> ${travelDate}<br>
            <strong>Time:</strong> ${travelTime}<br>
            <strong>Destination:</strong> ${destination}<br>
            <strong>Service Type:</strong> ${serviceType}<br>
            <strong>Seats:</strong> ${Array.from(selectedSeats).join(", ")}
        `;
        bookingHistory.appendChild(bookingItem);
        resetBookingForm();
    });

    // Reset the booking form after submission
    function resetBookingForm() {
        selectedBus = null;
        travelDate = "";
        travelTime = "";
        destination = "";
        serviceType = "";
        selectedSeats.clear();
        selectedSeatsDisplay.textContent = "None";
        const busList = document.getElementById("busList");
        busList.innerHTML = "";
        selectedBusList.style.display = 'none';
    }

    // Profile photo functionality
    window.onload = function() {
        const profilePhoto = document.getElementById("profilePhoto");
        const savedPhoto = localStorage.getItem("profilePhoto");

        if (savedPhoto) {
            profilePhoto.src = savedPhoto;
            profilePhoto.style.display = "block";
            document.getElementById("addPhotoBtn").textContent = "Change Photo";
        }
    };

    // Upload or change the profile photo
    document.getElementById("addPhotoBtn").addEventListener("click", function() {
        const fileInput = document.createElement("input");
        fileInput.type = "file";
        fileInput.accept = "image/*";

        fileInput.addEventListener("change", function() {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const profilePhoto = document.getElementById("profilePhoto");
                    profilePhoto.src = e.target.result;
                    profilePhoto.style.display = "block";

                    localStorage.setItem("profilePhoto", e.target.result);
                    document.getElementById("addPhotoBtn").textContent = "Change Photo";
                };
                reader.readAsDataURL(file);
            }
        });

        fileInput.click();
    });

    // Login form validation and sound effects
    const successSound = document.getElementById('successSound');
    const errorSound = document.getElementById('errorSound');

    document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (email && password) {
            if (!emailPattern.test(email)) {
                errorSound.play().catch(console.error);
                errorSound.onended = () => alert("Please enter a valid email format.");
            } else {
                successSound.play().catch(console.error);
                successSound.onended = () => this.submit();
            }
        } else {
            errorSound.play().catch(console.error);
            errorSound.onended = () => alert("Please fill out both fields.");
        }
    });

    // Log out functionality
    document.getElementById('logoutBtn').addEventListener('click', function () {
        window.location.href = "http://localhost/albatross/login.php";
    });

    // Alert Sound Override
    const alertSound = document.getElementById('alertSound');
    const originalAlert = window.alert;
    window.alert = function(message) {
        alertSound.play().catch(console.error);
        originalAlert(message);
    };

    // Preload the alert sound
    alertSound.load(); // Ensures sound is preloaded before usage
});
