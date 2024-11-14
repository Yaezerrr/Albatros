// JavaScript for populating LGAs based on selected state
const lgasByState = {
    abia: ['Aba North', 'Aba South', 'Isiala Ngwa North', 'Isiala Ngwa South', 'Obingwa', 'Ugwunagbo', 'Umuneochi', 'Ikwuano', 'Arochukwu', 'Ohafia', 'Bende'],
    adamawa: ['Demsa', 'Fufore', 'Ganye', 'Girei', 'Gombi', 'Hong', 'Jada', 'Larmande', 'Madagali', 'Mayo Belwa', 'Michika', 'Numan', 'Shelleng', 'Song', 'Toungo', 'Yola North', 'Yola South'],
    akwaibom: ['Abak', 'Eastern Obolo', 'Eket', 'Esit Eket', 'Ikono', 'Ikot Abasi', 'Ibiono Ibom', 'Ibesikpo Asutan', 'Ini', 'Itu', 'Nsit Atai', 'Nsit Ibom', 'Obot Akara', 'Onna', 'Oron', 'Uruan', 'Urue Offong/Oruko'],
    anambra: ['Aguata', 'Anambra East', 'Anambra West', 'Awka North', 'Awka South', 'Dunukofia', 'Ekwusigo', 'Idemili North', 'Idemili South', 'Ihiala', 'Njikoka', 'Nnewi North', 'Nnewi South', 'Ogbaru', 'Onitsha North', 'Onitsha South', 'Orumba North', 'Orumba South', 'Oyi'],
    bauchi: ['Alkaleri', 'Bauchi', 'Bogoro', 'Damban', 'Darazo', 'Dass', 'Ganjuwa', 'Gubi', 'Jos South', 'Tafawa Balewa', 'Toro', 'Warji', 'Zaki'],
    bayelsa: ['Brass', 'Ekeremor', 'Kolokuma/Opokuma', 'Nembe', 'Ogbia', 'Sagbama', 'Southern Ijaw', 'Yenagoa'],
    benue: ['Ado', 'Agatu', 'Gboko', 'Guma', 'Gwer East', 'Gwer West', 'Katsina-Ala', 'Konshisha', 'Ogbadibo', 'Oju', 'Ohimini', 'Tarka', 'Ukum', 'Vandeikya'],
    borno: ['Abadam', 'Askira/Uba', 'Bama', 'Bayo', 'Biu', 'Chibok', 'Damboa', 'Dikwa', 'Gubio', 'Gwoza', 'Hawul', 'Kaga', 'Konduga', 'Mafa', 'Magumeri', 'Maiduguri', 'Marte', 'Mobbar', 'Ngala', 'Nganzai', 'Shani'],
    crossriver: ['Akampa', 'Akpabuyo', 'Bakassi', 'Boki', 'Calabar South', 'Calabar Municipal', 'Etung', 'Ikom', 'Obubra', 'Obudu', 'Odukpani', 'Yakuur', 'Yala'],
    delta: ['Aniocha North', 'Aniocha South', 'Bomadi', 'Burutu', 'Ethiope East', 'Ethiope West', 'Ika North East', 'Ika South', 'Okpe', 'Oshimili North', 'Oshimili South', 'Sapele', 'Udu', 'Ughelli North', 'Ughelli South', 'Warri North', 'Warri South', 'Warri South West'],
    ebonyi: ['Abakaliki', 'Afikpo North', 'Afikpo South', 'Ebonyi', 'Ezza North', 'Ezza South', 'Ikwo', 'Ishielu', 'Ohaozara', 'Ohaukwu', 'Onicha'],
    edo: ['Akoko Edo', 'Esan Central', 'Esan North-East', 'Esan South-East', 'Esan West', 'Egor', 'Igueben', 'Ikpoba-Okha', 'Oredo', 'Orhionmwon', 'Ovia North-East', 'Ovia South-West', 'Uhunmwonde'],
    ekiti: ['Ado Ekiti', 'Efon', 'Ekiti East', 'Ekiti South-West', 'Ekiti West', 'Irepodun/Ifelodun', 'Ise/Orun', 'Moba', 'Oye'],
    enugu: ['Enugu East', 'Enugu North', 'Enugu South', 'Igbo-Etiti', 'Igbo-Eze North', 'Igbo-Eze South', 'Nkanu East', 'Nkanu West', 'Nsukka', 'Oji River', 'Udenu', 'Udi', 'Uzo-Uwani'],
    gombe: ['Akko', 'Balanga', 'Billiri', 'Dukku', 'Funakaye', 'Gombe', 'Kaltungo', 'Nafada', 'Shongom', 'Yamaltu/Deba'],
    imo: ['Aboh Mbaise', 'Ahiazu Mbaise', 'Ehime Mbano', 'Ezinihitte', 'Ikeduru', 'Isiala Mbano', 'Isu', 'Mbaitoli', 'Ngor Okpala', 'Njaba', 'Nkwere', 'Obowo', 'Oguta', 'Ohaji/Egbema', 'Okigwe', 'Orlu', 'Orsu', 'Owerri Municipal', 'Owerri North', 'Owerri West', 'Umuna'],
    jigawa: ['Auyo', 'Babura', 'B kirfi', 'Dutse', 'Gagarawa', 'Gumel', 'Hadejia', 'Jahun', 'Kazaure', 'Kiri Kasama', 'Maigatari', 'Malam Madori', 'Miga', 'Ringim', 'Yankwashi'],
    kaduna: ['Birnin Gwari', 'Chikun', 'Giwa', 'Jaba', 'Jema\'a', 'Kachia', 'Kaduna North', 'Kaduna South', 'Kagarko', 'Kajuru', 'Makarfi', 'Sabon Gari', 'Sanga', 'Zango Katuf'],
    kano: ['Ajingi', 'Albasu', 'Bagwai', 'Bebeji', 'Bichi', 'Dala', 'Dawakin Kudu', 'Dawakin Tofa', 'Doguwa', 'Fagge', 'Garko', 'Garun Malam', 'Gaya', 'Gezawa', 'Kano Municipal', 'Karaye', 'Kumbotso', 'Madobi', 'Makoda', 'Minjibir', 'Nasarawa', 'Rimin Gado', 'Takai', 'Tarauni', 'Tofa', 'Tsanyawa', 'Warawa', 'Wudil'],
    kogi: ['Adavi', 'Ajaokuta', 'Bassa', 'Dekina', 'Ibaji', 'Igalamela Odolu', 'Idah', 'Ijumu', 'Kogi', 'Lokoja', 'Mopa-Muro', 'Ofu', 'Ogori Magongo', 'Okehi', 'Okene', 'Olamaboro', 'Yagba East', 'Yagba West'],
    kwara: ['Asa', 'Baruten', 'Ekiti', 'Ilorin East', 'Ilorin South', 'Ilorin West', 'Irepodun', 'Isin', 'Kaiama', 'Moro', 'Offa', 'Oke Ero', 'Oyun', 'Pategi'],
    lagos: ['Agege', 'Alimosho', 'Amuwo Odofin', 'Apapa', 'Badagry', 'Bariga', 'Bishop Court', 'Ejigbo', 'Epe', 'Eti-Osa', 'Ifako-Ijaiye', 'Ikeja', 'Ikorodu', 'Isolo', 'Kosofe', 'Lagos Island', 'Lagos Mainland', 'Mushin', 'Ojo', 'Oshodi-Isolo', 'Somolu', 'Surulere'],
    nasarawa: ['Akwanga', 'Doma', 'Karshi', 'Keffi', 'Karu', 'Nasarawa', 'Nasarawa Eggon', 'Obi', 'Toto', 'Wamba'],
    niger: ['Agaie', 'Agwara', 'Bida', 'Bokani', 'Bosso', 'Chanchaga', 'Edati', 'Gbako', 'Gurara', 'Katcha', 'Lapai', 'Lavun', 'Magama', 'Mashegu', 'Mokwa', 'Paikoro', 'Rafi', 'Shiroro', 'Suleja', 'Tafa'],
    ogun: ['Abeokuta North', 'Abeokuta South', 'Ado-Odo/Ota', 'Egbado North', 'Egbado South', 'Ifo', 'Ijebu East', 'Ijebu North', 'Ijebu Ode', 'Obafemi-Owode', 'Odeda', 'Ogun Waterside', 'Remo North', 'Sagamu', 'Yewa North', 'Yewa South'],
    ondo: ['Akoko North-East', 'Akoko North-West', 'Akoko South-East', 'Akoko South-West', 'Akure North', 'Akure South', 'Ese Odo', 'Idanre', 'Ifedore', 'Ile Oluji/Okeigbo', 'Odigbo', 'Ose', 'Owo'],
    osun: ['Aiyedade', 'Aiyedire', 'Atakunmosa East', 'Atakunmosa West', 'Boluwaduro', 'Boripe', 'Ifelodun', 'Ilesa East', 'Ilesa West', 'Isokan', 'Iwo', 'Odo Otin', 'Osogbo', 'Oshogbo'],
    oyo: ['Afijio', 'Akinyele', 'Atiba', 'Atisbo', 'Egbeda', 'Ibadan North', 'Ibadan North-East', 'Ibadan North-West', 'Ibadan South-East', 'Ibadan South-West', 'Ibarapa Central', 'Ibarapa East', 'Ibarapa North', 'Ido', 'Ogbomosho North', 'Ogbomosho South', 'Oyo East', 'Oyo West'],
    plateau: ['Bokkos', 'Jos East', 'Jos North', 'Jos South', 'Kanam', 'Kanke', 'Langtang North', 'Langtang South', 'Mangu', 'Pankshin', 'Qua\'an Pan', 'Riyom', 'Shendam', 'Wase'],
    rivers: ['Abua/Odual', 'Ahoada East', 'Ahoada West', 'Akuku-Toru', 'Andoni', 'Asari-Toru', 'Bonny', 'Degema', 'Emohua', 'Etche', 'Ikwerre', 'Obio-Akpor', 'Ogba/Egbema/Ndoni', 'Ogu/Bolo', 'Okrika', 'Port Harcourt', 'Tai'],
    sokoto: ['Binji', 'Bodinga', 'Dange Shuni', 'Gada', 'Goronyo', 'Gudu', 'Illela', 'Kebbe', 'Kware', 'Rabah', 'Sabon Birni', 'Shagari', 'Silame', 'Sokoto North', 'Sokoto South', 'Wamako', 'Wurno', 'Yabo'],
    taraba: ['Ardo Kola', 'Bali', 'Donga', 'Gashaka', 'Gassol', 'Jalingo', 'Karim Lamido', 'Kurmi', 'Lau', 'Sunkani', 'Takum', 'Ussa', 'Wukari'],
    yobe: ['Bade', 'Bursari', 'Damaturu', 'Fika', 'Fune', 'Geidam', 'Gujba', 'Jakusko', 'Karasuwa', 'Nguru', 'Potiskum', 'Tarmua', 'Yunusari'],
    zamfara: ['Anka', 'Bakura', 'Birnin Magaji', 'Bukkuyum', 'Gummi', 'Gusau', 'Kaura Namoda', 'Maradun', 'Shinkafi', 'Talata Mafara', 'Zamfara West', 'Zamfara North', 'Zamfara Central']
};

// Function to populate the LGA dropdown based on the selected state
function populateLGA() {
    const stateSelect = document.getElementById('state');
    const lgaSelect = document.getElementById('lga');

    // Clear previous options
    lgaSelect.innerHTML = '';

    // Get selected state
    const selectedState = stateSelect.value;

    // Check if the selected state has LGAs
    if (lgasByState[selectedState]) {
        lgasByState[selectedState].forEach(lga => {
            const option = document.createElement('option');
            option.value = lga.toLowerCase().replace(/ /g, '-'); // Set value for the LGA
            option.textContent = lga; // Set text for the LGA
            lgaSelect.appendChild(option); // Append the option to the LGA dropdown
        });
    }
}

// Add event listener to the state dropdown
document.getElementById('state').addEventListener('change', populateLGA);


function checkAge() {
    const dobInput = document.getElementById('dateOfBirth');
    const dob = new Date(dobInput.value);
    const today = new Date();
    const age = today.getFullYear() - dob.getFullYear();
    const monthDiff = today.getMonth() - dob.getMonth();

    // If the user is under 18
    if (age < 18 || (age === 18 && monthDiff < 0)) {
        document.getElementById('ageError').style.display = 'block';
        dobInput.value = ''; // Clear the date input
    } else {
        document.getElementById('ageError').style.display = 'none';
    }
}

function populateLGA() {
    const state = document.getElementById('state').value;
    const lgaSelect = document.getElementById('lga');
    const cityInput = document.getElementById('city');
    
    // Clear the LGA and city fields
    lgaSelect.innerHTML = '<option value="">-- Select LGA --</option>';
    cityInput.value = ''; // Clear city field

    if (state) {
        const lgas = lgasByState[state];
        // Populate the LGA dropdown
        lgas.forEach(lga => {
            const option = document.createElement('option');
            option.value = lga;
            option.textContent = lga;
            lgaSelect.appendChild(option);
        });
    }
}

document.getElementById('lga').addEventListener('change', function() {
    const selectedLGA = this.value;
    const cityInput = document.getElementById('city');
    cityInput.value = selectedLGA; // Set city to the selected LGA value
});

// Function to check if passwords match
function checkPasswordMatch() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const errorMessage = document.getElementById('passwordError');
    
    if (password !== confirmPassword) {
        errorMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'none';
    }
}