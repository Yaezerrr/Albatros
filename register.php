<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Sign Up</title>
    <link rel="stylesheet" href="register.css"> <!-- Correct the CSS file name -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <form action="config.php" method="POST" id="registrationForm" enctype="multipart/form-data">
        <!-- Added enctype for file upload -->
        <!-- Albatross Booking Header -->
        <h1>Albatross Booking</h1> <!-- Moved to the top of the form -->

        <!-- Passenger Sign Up Header -->
        <h2>Passenger Sign Up</h2> <!-- Moved to the top of the form -->

        <!-- Sign Up Text -->
        <p>Join us today and experience seamless travel booking. Fill out the form below to get started!</p>

        <!-- Personal Information -->
        <h3>Personal Information</h3>
        <label for="firstName"><i class="fas fa-user"></i> First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="middleName"><i class="fas fa-user"></i> Middle Name:</label>
        <input type="text" id="middleName" name="middleName">

        <label for="lastName"><i class="fas fa-user"></i> Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>


        <label for="dateOfBirth"><i class="fas fa-calendar-alt"></i> Date of Birth:</label>
        <input type="date" id="dateOfBirth" name="dateOfBirth" required onchange="checkAge()">
        <div id="ageError" class="error-message">You must be at least 18 years old to sign up.</div>


        <label for="gender"><i class="fas fa-venus-mars"></i> Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <label for="zipCode"><i class="fas fa-phone-alt"></i> Zip Code:</label>
        <select id="zipCode" name="zipCode" required>
            <option value="">Select Dial Code</option>
            <option value="+20">+20 (Egypt)</option>
            <option value="+211">+211 (South Sudan)</option>
            <option value="+212">+212 (Morocco)</option>
            <option value="+213">+213 (Algeria)</option>
            <option value="+218">+218 (Libya)</option>
            <option value="+220">+220 (Gambia)</option>
            <option value="+221">+221 (Senegal)</option>
            <option value="+222">+222 (Mali)</option>
            <option value="+223">+223 (Burkina Faso)</option>
            <option value="+224">+224 (Guinea)</option>
            <option value="+225">+225 (Ivory Coast)</option>
            <option value="+226">+226 (Burkina Faso)</option>
            <option value="+227">+227 (Niger)</option>
            <option value="+228">+228 (Togo)</option>
            <option value="+229">+229 (Benin)</option>
            <option value="+230">+230 (Mauritius)</option>
            <option value="+231">+231 (Liberia)</option>
            <option value="+232">+232 (Sierra Leone)</option>
            <option value="+233">+233 (Ghana)</option>
            <option value="+234">+234 (Nigeria)</option>
            <option value="+235">+235 (Chad)</option>
            <option value="+236">+236 (Central African Republic)</option>
            <option value="+237">+237 (Cameroon)</option>
            <option value="+238">+238 (Cape Verde)</option>
            <option value="+239">+239 (São Tomé and Príncipe)</option>
            <option value="+240">+240 (Seychelles)</option>
            <option value="+241">+241 (Gabon)</option>
            <option value="+242">+242 (Congo)</option>
            <option value="+243">+243 (Democratic Republic of Congo)</option>
            <option value="+244">+244 (Angola)</option>
            <option value="+245">+245 (Guinea-Bissau)</option>
            <option value="+246">+246 (Tanzania)</option>
            <option value="+247">+247 (Ascension Island)</option>
            <option value="+248">+248 (Seychelles)</option>
            <option value="+249">+249 (Sudan)</option>
            <option value="+250">+250 (Rwanda)</option>
            <option value="+251">+251 (Ethiopia)</option>
            <option value="+252">+252 (Somalia)</option>
            <option value="+253">+253 (Djibouti)</option>
            <option value="+254">+254 (Kenya)</option>
            <option value="+255">+255 (Tanzania)</option>
            <option value="+256">+256 (Uganda)</option>
            <option value="+257">+257 (Burundi)</option>
            <option value="+258">+258 (Mozambique)</option>
            <option value="+259">+259 (South Africa)</option>
            <option value="+260">+260 (Zambia)</option>
            <option value="+261">+261 (Madagascar)</option>
            <option value="+262">+262 (Reunion)</option>
            <option value="+263">+263 (Zimbabwe)</option>
            <option value="+264">+264 (Namibia)</option>
            <option value="+265">+265 (Malawi)</option>
            <option value="+266">+266 (Lesotho)</option>
            <option value="+267">+267 (Botswana)</option>
            <option value="+268">+268 (Eswatini)</option>
            <option value="+269">+269 (Comoros)</option>
            <option value="+270">+270 (Seychelles)</option>
            <option value="+271">+271 (South Africa)</option>
            <option value="+272">+272 (Angola)</option>
            <option value="+273">+273 (South Africa)</option>
            <option value="+274">+274 (Namibia)</option>
        </select>

        <label for="phoneNumber"><i class="fas fa-phone"></i> Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" required>

        <label for="email"><i class="fas fa-envelope"></i> Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password"><i class="fas fa-lock"></i> Password:</label>
        <input type="password" id="password" name="password" required
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
            title="Password must be at least 8 characters long, include uppercase and lowercase letters, a number, and a special character (e.g., @, #, $, etc.)">

        <label for="confirmPassword"><i class="fas fa-lock"></i> Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required oninput="checkPasswordMatch()">

        <div id="passwordError" class="error-message">Passwords do not match.</div>

        <!-- ID Information -->
        <h3>ID Information</h3>
        <label for="idType"><i class="fas fa-id-card"></i> ID Type:</label>
        <select id="idType" name="idType" required>
            <option value="">Select ID Type</option>
            <option value="national_id">National ID</option>
            <option value="passport">Passport</option>
            <option value="driver_license">Driver's License</option>
            <option value="voter_id">Voter ID</option>
            <option value="other">Other</option>
        </select>



        <label for="idPhoto"><i class="fas fa-file-image"></i> ID Photo:</label>
        <input type="file" id="idPhoto" name="idPhoto" accept="image/*" required>

        <!-- Address -->
        <h3>Address</h3>
        <label for="streetAddress"><i class="fas fa-map-marker-alt"></i> Street Address:</label>
        <input type="text" id="streetAddress" name="streetAddress" required>

        <label for="apartmentNumber"><i class="fas fa-home"></i> Apartment/Unit Number:</label>
        <input type="text" id="apartmentNumber" name="apartmentNumber">


        <label for="country">Select Country:</label>
        <select id="country" name="country">
            <option value="">-- Select Country --</option>
            <option value="algeria">Algeria</option>
            <option value="angola">Angola</option>
            <option value="benin">Benin</option>
            <option value="botswana">Botswana</option>
            <option value="burkina_faso">Burkina Faso</option>
            <option value="burundi">Burundi</option>
            <option value="cabo_verde">Cabo Verde</option>
            <option value="cameron">Cameroon</option>
            <option value="central_african_republic">Central African Republic</option>
            <option value="chad">Chad</option>
            <option value="comoros">Comoros</option>
            <option value="congo">Congo</option>
            <option value="democratic_republic_of_congo">Democratic Republic of Congo</option>
            <option value="djibouti">Djibouti</option>
            <option value="egypt">Egypt</option>
            <option value="equatorial_guinea">Equatorial Guinea</option>
            <option value="eritrea">Eritrea</option>
            <option value="eswatini">Eswatini</option>
            <option value="ethiopia">Ethiopia</option>
            <option value="gabon">Gabon</option>
            <option value="gambia">Gambia</option>
            <option value="ghana">Ghana</option>
            <option value="guinea">Guinea</option>
            <option value="guinea_bissau">Guinea-Bissau</option>
            <option value="ivory_coast">Ivory Coast</option>
            <option value="kenya">Kenya</option>
            <option value="lesotho">Lesotho</option>
            <option value="liberia">Liberia</option>
            <option value="libya">Libya</option>
            <option value="madagascar">Madagascar</option>
            <option value="malawi">Malawi</option>
            <option value="mali">Mali</option>
            <option value="mauritania">Mauritania</option>
            <option value="mauritius">Mauritius</option>
            <option value="morocco">Morocco</option>
            <option value="mozambique">Mozambique</option>
            <option value="namibia">Namibia</option>
            <option value="niger">Niger</option>
            <option value="nigeria">Nigeria</option>
            <option value="rwanda">Rwanda</option>
            <option value="sao_tome_and_principe">Sao Tome and Principe</option>
            <option value="senegal">Senegal</option>
            <option value="seychelles">Seychelles</option>
            <option value="sierra_leone">Sierra Leone</option>
            <option value="south_africa">South Africa</option>
            <option value="south_sudan">South Sudan</option>
            <option value="sudan">Sudan</option>
            <option value="tanzania">Tanzania</option>
            <option value="togo">Togo</option>
            <option value="uganda">Uganda</option>
            <option value="zambia">Zambia</option>
            <option value="zimbabwe">Zimbabwe</option>
        </select>

        <label for="state"><i class="fas fa-globe"></i> State/Province:</label>
        <select id="state" name="state" required onchange="populateLGA()">
            <option value="">Select State</option>
            <option value="abia">Abia</option>
            <option value="adamawa">Adamawa</option>
            <option value="akwaibom">Akwa Ibom</option>
            <option value="anambra">Anambra</option>
            <option value="bauchi">Bauchi</option>
            <option value="bayelsa">Bayelsa</option>
            <option value="benue">Benue</option>
            <option value="borno">Borno</option>
            <option value="crossriver">Cross River</option>
            <option value="delta">Delta</option>
            <option value="ebonyi">Ebonyi</option>
            <option value="edo">Edo</option>
            <option value="ekiti">Ekiti</option>
            <option value="enugu">Enugu</option>
            <option value="gombe">Gombe</option>
            <option value="imo">Imo</option>
            <option value="jigawa">Jigawa</option>
            <option value="kaduna">Kaduna</option>
            <option value="kano">Kano</option>
            <option value="kogi">Kogi</option>
            <option value="kwara">Kwara</option>
            <option value="lagos">Lagos</option>
            <option value="nasarawa">Nasarawa</option>
            <option value="niger">Niger</option>
            <option value="ogun">Ogun</option>
            <option value="ondo">Ondo</option>
            <option value="osun">Osun</option>
            <option value="oyo">Oyo</option>
            <option value="plateau">Plateau</option>
            <option value="rivers">Rivers</option>
            <option value="sokoto">Sokoto</option>
            <option value="taraba">Taraba</option>
            <option value="yobe">Yobe</option>
            <option value="zamfara">Zamfara</option>
            <option value="fct">Abuja (FCT)</option>
            <option value="kebbi">Kebbi</option>


        </select>




        <!-- LGA Dropdown -->
        <label for="lga">Select Local Government Area:</label>
        <select id="lga" name="lga">
            <option value="">-- Select LGA --</option>
        </select>




        <label for="city">City:</label>
        <input type="text" id="city" name="city" readonly>

        <!-- Seat Preference -->
        <h3>Preferences</h3>
        <label for="seatPreference"><i class="fas fa-chair"></i> Seat Preference:</label>
        <select id="seatPreference" name="seatPreference" required>
            <option value="window">Window</option>
            <option value="aisle">Aisle</option>
            <option value="middle">Middle</option>
        </select>

        <!-- Meal Preference -->
        <label for="mealPreference"><i class="fas fa-utensils"></i> Meal Preference:</label>
        <select id="mealPreference" name="mealPreference" required>
            <option value="vegetarian">Vegetarian</option>
            <option value="non_vegetarian">Non-Vegetarian</option>
            <option value="vegan">Vegan</option>
            <option value="halal">Halal</option>
            <option value="kosher">Kosher</option>
        </select>

        <!-- Emergency Contact Information -->
        <h3>Emergency Contact Information</h3>
        <label for="emergencyContactName"><i class="fas fa-user"></i> Emergency Contact Name:</label>
        <input type="text" id="emergencyContactName" name="emergencyContactName" required>

        <label for="emergencyContactRelation"><i class="fas fa-users"></i> Relation to Emergency Contact:</label>
        <select id="emergencyContactRelation" name="emergencyContactRelation" required>
            <option value="">Select Relation</option>
            <option value="parent">Parent</option>
            <option value="sibling">Sibling</option>
            <option value="spouse">Spouse</option>
            <option value="friend">Friend</option>
            <option value="other">Other</option>
        </select>

        <label for="emergencyContactPhone"><i class="fas fa-phone"></i> Emergency Contact Phone:</label>
        <input type="tel" id="emergencyContactPhone" name="emergencyContactPhone" required>


        <input type="submit" value="Sign Up">
        <button type="button" onclick="window.location.href='http://localhost/albatross/login.php'">Already have an
            account? Sign In</button>
    </form>
    <script src="register.js"></script>
</body>

</html>