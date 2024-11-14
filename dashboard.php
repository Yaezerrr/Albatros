<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Redirect to login page if not logged in
    exit();
}

// Example PHP validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        // If email is not valid, show the alert and play the sound
        echo '<script>showAlert("Please enter a valid email format.");</script>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <audio id="successSound" src="audio/sound3.mp3"></audio>
<audio id="errorSound" src="audio/sound2.mp3"></audio>
<audio id="alertSound" src="audio/sound1.mp3"></audio>

    <header>
        <div class="logo">Albatross Booking</div>
        <nav>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <div class="container">
        <aside>
            <ul>
                <li><a href="#profile"><i class="fas fa-user"></i><span>Profile</span></a></li>
                <li><a href="#bookings"><i class="fas fa-calendar-alt"></i><span>My Bookings</span></a></li>
                <li><a href="#payments"><i class="fas fa-credit-card"></i><span>Payments</span></a></li>
                <li><a href="#support"><i class="fas fa-headset"></i><span>Support</span></a></li>
                <li><a href="#notifications"><i class="fas fa-bell"></i><span>Notifications</span></a></li>
                <li><a href="#settings"><i class="fas fa-cog"></i><span>Settings</span></a></li>
            </ul>
        </aside>
        <main>
            <section id="profile">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['firstName']); ?></h2>
                <p>Manage your profile information below.</p>

                <div class="info-box">
                    <h3>Your Information</h3>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['phoneNumber']); ?></p>
                    <p><strong>Address:</strong>
                        <?php echo htmlspecialchars($_SESSION['streetAddress'] . ', ' . $_SESSION['state'] . ', ' . $_SESSION['country']); ?>
                    </p>
                    <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($_SESSION['dateOfBirth']); ?></p>
                    <p><strong>Preferred Payment Method:</strong>
                        <?php echo htmlspecialchars($_SESSION['paymentMethod']); ?></p>
                </div>
                <div class="photo-container">
                    <h3>Profile Photo</h3>
                    <div id="photoDisplay">
                        <img id="profilePhoto" src="default.jpg" alt="Profile Photo">
                    </div>
                    <button id="addPhotoBtn">Add Photo</button>
                    <img id="profilePhoto" alt="Profile Photo" style="display: none;">

                </div>

                <div class="preferences-box">
                    <h3>Travel Preferences</h3>
                    <p><strong>Preferred Seat:</strong> <?php echo htmlspecialchars($_SESSION['seatPreference']); ?></p>
                    <p><strong>Meal Preference:</strong> <?php echo htmlspecialchars($_SESSION['mealPreference']); ?>
                    </p>
                </div>

                <div class="contacts-box">
                    <h3>Emergency Contacts</h3>
                    <p><strong>Contact Name:</strong> <?php echo htmlspecialchars($_SESSION['emergencyContactName']); ?>
                    </p>
                    <p><strong>Contact Number:</strong>
                        <?php echo htmlspecialchars($_SESSION['emergencyContactPhone']); ?></p>
                </div>

                <div class="action-box">
                    <h3>Actions</h3>
                    <p>Click below to perform additional actions:</p>
                    <button onclick="changePassword()">Change Password</button>
                    <button onclick="deleteAccount()">Delete Account</button>
                </div>
            </section>
            <section id="bookings" style="display: none;">
                <h2>Make a New Booking</h2>
                <form id="bookingForm">
                    <label for="travelDate">Travel Date:</label>
                    <input type="date" id="travelDate" name="travelDate" required>

                    <label for="travelTime">Travel Time:</label>
                    <input type="time" id="travelTime" name="travelTime" required>

                    <label for="destination">Destination:</label>
                    <select id="destination" name="destination">
                        <option value="Lagos">Lagos</option>
                        <option value="Abuja">Abuja</option>
                        <option value="Port Harcourt">Port Harcourt</option>
                    </select>

                    <label for="serviceType">Service Type:</label>
                    <select id="serviceType" name="serviceType">
                        <option value="economy">Economy (Toyota Hiace)</option>
                        <option value="business">Business Class (Mercedes Land Jet)</option>
                        <option value="firstClass">First Class (Mercedes Land Jet)</option>
                    </select>

                    <button type="button" id="selectSeatsButton">Select Seats</button>
                    <div id="seatSelection" class="seat-grid" style="display: none;"></div>

                    <h4>Selected Seats: <span id="selectedSeats"></span></h4>

                    <!-- Bus Companies Section moved before Promo Code -->
                    <div class="bus-companies">
                        <h3>Available Bus Companies</h3>
                        <div class="bus-company-grid">
                            <div class="bus-company">
                                <img src="images/transit1.jpeg" alt="Bus Company 1">
                                <p>Peace Mass</p>
                            </div>
                            <div class="bus-company">
                                <img src="images/transit2.png" alt="Bus Company 2">
                                <p>LIBRA</p>
                            </div>
                            <div class="bus-company">
                                <img src="images/transit3.png" alt="Bus Company 3">
                                <p>GUO</p>
                            </div>
                            <div class="bus-company">
                                <img src="images/transit4.png" alt="Bus Company 4">
                                <p>ABC</p>
                            </div>
                            <div class="bus-company">
                                <img src="images/transit5.jpg" alt="Bus Company 5">
                                <p>YOUNG</p>
                            </div>
                            <div class="bus-company">
                                <img src="images/transit6.webp" alt="Bus Company 6">
                                <p>Cross <br>Country</p>
                            </div>
                            <div class="bus-company">
                                <img src="images/transit7.webp" alt="Bus Company 7">
                                <p>CHISCO</p>
                            </div>
                        </div>
                    </div>
                    <!-- End of Bus Companies Section -->
                    <!-- Selected Bus List Section -->
                    <div id="selectedBusList">
                        <div id="selectedBusImage"></div>

                        <h4>Your Selected Buses</h4>
                        <ul id="busList"></ul>
                    </div>

                    <label for="promoCode">Promo Code:</label>
                    <input type="text" id="promoCode" name="promoCode" placeholder="Enter code if available">

                    <button type="submit">Book Now</button>
                </form>

                <h3>Your Booking History</h3>
                <ul id="bookingHistory"></ul>
            </section>

        </main>
    </div>
    <footer>
        <p>&copy; 2024 Albatross Booking. All rights reserved.</p>
    </footer>
    <script src="dashboard.js"></script>
</body>

</html>