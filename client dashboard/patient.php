<?php
// Start the session to retrieve the cookies
session_start();

// Check if the user is logged in by verifying the cookie
if (isset($_COOKIE['username'])) {
    $user_email = $_COOKIE['username'];
} else {
    // If not logged in, redirect to login page (optional)
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/png" href="images/icons8-health-insurance-64.png">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">HDIMS</div>
            <nav>
                <div class="menu-toggle" id="menu-toggle">
                    <img src="menu-unfold-line.svg" alt="Menu">
                </div>
                <ul class="menu">
                    <li><a href="#"><img src="home.svg" alt="Overview">Home</a></li>
                    <li class="animate-patients"><a href="#"><img src="group.svg" alt="Patients">Doctor</a></li>
                    <li><a href="message.html"><img src="chat.svg" alt="Message">Message</a></li>
                    <li><a href="payment.html"><img src="card.svg" alt="Transactions">Make Payment</a></li>
                </ul>
            </nav>
            <div class="profile">
                <img src="senior-woman-doctor-and-portrait-smile-for-health-2023-11-27-05-18-16-utc.png" alt="Doctor Profile" class="profile-img">
                <div class="doctor-section">
                    <p class="doctor-name"><?php echo htmlspecialchars($user_email); ?>.</p>
                </div>
                <div class="profile-actions">
                    <div class="vertical-line"></div>
                </div>
            </div>
        </header>

        <main>
            <section class="patients">
                <h2>
                    Doctor 
                    <input type="text" id="searchInput" class="search-input" placeholder="Search for patients..." style="display: none;">
                    <img src="search.svg" alt="Search" class="search-icon">
                </h2>
                <div class="scrollable-container">
                    <ul class="scrollable-list">
                        <li>
                            <img src="Layer-8.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">Naresh Trehan <br> <span>Dermatologist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-1@2x.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">S. Natarajan <br> <span>Oncologist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-3.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">Arvind Kumar<br> <span>Neurologist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-2.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">Rajesh Chopra<br> <span>Dermatologist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-6.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">B. K. Mishra <br> <span>Psychiatrist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-12.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">Ashok Seth <br> <span>Gastroenterologist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-10.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">Arvind Kumar<br> <span>Orthopaedist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-9.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">Ajay Kaul<br> <span>Psychiatrist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-4.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">K. K. Aggarwal <br> <span>Cardiologist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-5.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">Ramakanta Panda<br> <span>Pediatricians</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="Layer-7.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">B.R. Sharma<br> <span>Orthopaedist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                        <li>
                            <img src="pexels-photo-1222271.png" alt="Profile Image" class="profile-img"> 
                            <div class="text-content">Mukesh Hariawala<br> <span>Cardiologist</span></div>
                            <img src="3dots.svg" alt="Options" class="options-icon">
                        </li>
                    </ul>
                </div>
            </section>
            <!--<div id="addPatientPopup" class="popup">
                <div class="popup-content">
                    <span class="close">&times;</span>
                    <h2>Add Patient</h2>
                    <form id="addPatientForm">
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select id="gender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" id="age" name="age" min="0" max="120" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Profile Image:</label>
                            <input type="file" id="image" name="image" accept="image/*">
                        </div>
                        <button type="submit">Add Patient</button>
                    </form>
                </div>
            </div>-->
            
            <!-- Edit Patient Popup 
            <div id="editPatientPopup" class="popup">
                <div class="popup-content">
                    <span class="close">&times;</span>
                    <h2>Edit Patient</h2>
                    <form id="editPatientForm">
                        <div class="form-group">
                            <label for="editFirstName">First Name:</label>
                            <input type="text" id="editFirstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="editLastName">Last Name:</label>
                            <input type="text" id="editLastName" name="lastName" required>
                        </div>
                        <div class="form-group">
                            <label for="editGender">Gender:</label>
                            <select id="editGender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editAge">Age:</label>
                            <input type="number" id="editAge" name="age" min="0" max="120" required>
                        </div>
                        <button type="submit">Update Patient</button>
                        <button type="button" id="deletePatientButton" class="delete-button">Delete Patient</button>
                    </form>
                </div>
            </div>-->

            <section class="diagnosis-history">
                <h2>Checkup History</h2>
                <div class="chart">
                    <div class="chart-header">
                        <h3>Checkup</h3>
                        <select>
                            <option>Last 6 months</option>
                            <option>Last 12 months</option>
                            <option>Last 24 months</option>
                        </select>
                    </div>

                    <div class="chart-content">
                        <canvas id="bloodPressureChart" height="300px"></canvas>
                    </div>
                    <div class="chart-info">
                        <div class="systolic">
                            <span class="dot systolic-dot"></span>
                            
                        </div>
                        <div class="diastolic" >
                            <span class="dot diastolic-dot"></span>
                        </div>
                    </div>
                </div>
                <div class="stats">
                    <div class="stat">
                        <img src="respiratory-rate.png" alt="Respiratory Icon" class="stat-icon">
                        <p>Respiratory Rate</p>
                        <p class="stat-value">20 bpm</p>
                        <p>Normal</p>
                    </div>
                    <div class="stat">
                        <img src="temperature.png" alt="Thermometer Icon" class="stat-icon">
                        <p>Temperature</p>
                        <p class="stat-value">98.6°F</p>
                        <p>Normal</p>
                    </div>
                    <div class="stat">
                        <img src="HeartBPM.png" alt="Heart Icon" class="stat-icon">
                        <p>Heart Rate</p>
                        <p class="stat-value">78 bpm</p>
                        <p class="stat-text">
                            <img src="down.svg" alt="Down Icon" class="lower-icon">
                            Lower than Average
                        </p>
                    </div>
                </div>
            </section>

            <section class="patient-info">
                <img src="Layer-2@2x.png" alt="Jessica Taylor" class="profile-img">
                <h2>Jessica Taylor</h2>
                <ul>
                    <li><img src="BirthIcon.png" alt="Calendar Icon"> Date of Birth <br> August 23, 1996</li>
                    <li><img src="FemaleIcon.png" alt="Gender Icon"> Gender <br> Female</li>
                    <li><img src="PhoneIcon.png" alt="Phone Icon"> Contact Information <br> (415) 555-1234</li>
                    <li><img src="PhoneIcon.png" alt="Emergency Icon"> Emergency Contact <br> (415) 555-5678</li>
                    <li><img src="InsuranceIcon.png" alt="Insurance Icon"> Insurance Provider <br> Sunrise Health Assurance</li>
                </ul>
                <button  id="show-info-button">Next Doctor</button>
            </section>

            <section class="diagnostic-list">
                <h2>Checkup List</h2>
                <table>
                    <tr style="background-color: #f0f0f0;" >
                        <th>Problem/Diagnosis</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>Hypertension</td>
                        <td>Chronic high blood pressure</td>
                        <td>Under Observation</td>
                    </tr>
                    <tr>
                        <td>Type 2 Diabetes</td>
                        <td>Insulin resistance and elevated blood sugar</td>
                        <td>Cured</td>
                    </tr>
                    <tr>
                        <td>Asthma</td>
                        <td>Recurrent episodes of bronchial constriction</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Diabetes</td>
                        <td>Chronic condition that affects the way the body processes blood sugar</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Hypertension</td>
                        <td>High blood pressure</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Hyperthyroidism</td>
                        <td>Overactive thyroid gland</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Chronic Bronchitis</td>
                        <td>Long-term inflammation of the bronchial tubes</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Osteoarthritis</td>
                        <td>Degenerative joint disease</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Rheumatoid Arthritis</td>
                        <td>Autoimmune disorder affecting joints</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Allergic Rhinitis</td>
                        <td>Allergy causing nasal inflammation</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Chronic Fatigue Syndrome</td>
                        <td>Persistent fatigue not improved by rest</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Epilepsy</td>
                        <td>Neurological disorder characterized by seizures</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Gastroesophageal Reflux Disease (GERD)</td>
                        <td>Chronic acid reflux causing heartburn</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Glaucoma</td>
                        <td>Condition causing increased pressure within the eye</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Hepatitis B</td>
                        <td>Viral infection causing liver inflammation</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Insomnia</td>
                        <td>Difficulty falling or staying asleep</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Kidney Stones</td>
                        <td>Hard deposits forming in the kidneys</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Multiple Sclerosis</td>
                        <td>Autoimmune disease affecting the central nervous system</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Parkinson's Disease</td>
                        <td>Neurological disorder causing tremors and stiffness</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Peptic Ulcer</td>
                        <td>Sore in the lining of the stomach or duodenum</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Psoriasis</td>
                        <td>Skin condition causing red, scaly patches</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Raynaud's Disease</td>
                        <td>Condition causing reduced blood flow to extremities</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Schizophrenia</td>
                        <td>Severe mental disorder characterized by distorted thinking</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Sinusitis</td>
                        <td>Inflammation of the sinuses</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Sjögren's Syndrome</td>
                        <td>Autoimmune disorder affecting moisture-producing glands</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Stroke</td>
                        <td>Disruption of blood supply to the brain</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Tuberculosis</td>
                        <td>Infectious disease affecting the lungs</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Ulcerative Colitis</td>
                        <td>Chronic inflammation of the colon and rectum</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Vertigo</td>
                        <td>Sensation of spinning or dizziness</td>
                        <td>Inactive</td>
                    </tr>
                    <tr>
                        <td>Vitamin D Deficiency</td>
                        <td>Lack of vitamin D leading to bone issues</td>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <td>Wheat Allergy</td>
                        <td>Allergic reaction to proteins found in wheat</td>
                        <td>Inactive</td>
                    </tr>
                </table>
            </section>

            <section class="lab-results">
                <h2>Lab Results</h2>
                <ul>
                    <li>Endoscopy Reports
                        <a href="Endo-Report_11Dec14_800.jpg" download="Endo-Report_11Dec14_800.jpg">
                            <img src="download.svg" alt="Download Endoscopy Report" class="icon">
                        </a>
                    </li>
                    <li>Pregnancy Tests
                        <a href="pregnancy.jpg" download="pregnancy.jpg">
                            <img src="download.svg" alt="Download Pregnancy Test Report" class="icon">
                        </a>
                    </li>
                    <li>General Lab Report
                        <a href="LABREPO.png" download="LABREPO.png">
                            <img src="download.svg" alt="Download General Lab Report" class="icon">
                        </a>
                    </li>
                    <li>Peer Report
                        <a href="peer.png" download="peer.png">
                            <img src="download.svg" alt="Download Peer Report" class="icon">
                        </a>
                    </li>
                    <!-- Repeated Links -->
                    <li>Endoscopy Reports
                        <a href="Endo-Report_11Dec14_800.jpg" download="Endo-Report_11Dec14_800.jpg">
                            <img src="download.svg" alt="Download Endoscopy Report" class="icon">
                        </a>
                    </li>
                    <li>Pregnancy Tests
                        <a href="pregnancy.jpg" download="pregnancy.jpg">
                            <img src="download.svg" alt="Download Pregnancy Test Report" class="icon">
                        </a>
                    </li>
                    <li>General Lab Report
                        <a href="LABREPO.png" download="LABREPO.png">
                            <img src="download.svg" alt="Download General Lab Report" class="icon">
                        </a>
                    </li>
                    <li>Peer Report
                        <a href="peer.png" download="peer.png">
                            <img src="download.svg" alt="Download Peer Report" class="icon">
                        </a>
                    </li>
                </ul>
            </section>
        </main>
    </div>
    <script src="script.js"></script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var addPopup = document.getElementById("addPatientPopup");
    var editPopup = document.getElementById("editPatientPopup");
    var addForm = document.getElementById("addPatientForm");
    var editForm = document.getElementById("editPatientForm");
    var patientList = document.querySelector(".scrollable-list");
    var currentEditingLi = null;
    var patientsData = JSON.parse(localStorage.getItem("patientsData")) || [];

    // Show search input when search icon is clicked
    var searchIcon = document.querySelector(".search-icon");
    var searchInput = document.getElementById("searchInput");

    searchIcon.addEventListener("click", function() {
        searchInput.style.display = searchInput.style.display === "block" ? "none" : "block";
        searchInput.focus(); // Focus on the input when it appears
    });

    // Filter patient list based on search input
    searchInput.addEventListener("input", function() {
        var filter = searchInput.value.toLowerCase();
        var patients = document.querySelectorAll(".scrollable-list li:not(.add-patient)");

        patients.forEach(function(patient) {
            var textContent = patient.querySelector(".text-content").textContent.toLowerCase();
            if (textContent.includes(filter)) {
                patient.style.display = "";
            } else {
                patient.style.display = "none";
            }
        });
    });

    // Show "Add Patient" popup when the "Add Patient" li is clicked
    document.querySelector(".add-patient").addEventListener("click", function() {
        addPopup.style.display = "block";
    });

    // Close the popups when clicking the close button or outside the popup
    document.querySelectorAll(".popup .close").forEach(function(closeBtn) {
        closeBtn.onclick = function() {
            closePopups();
        };
    });

    window.onclick = function(event) {
        if (event.target === addPopup || event.target === editPopup) {
            closePopups();
        }
    };

    function closePopups() {
        addPopup.style.display = "none";
        editPopup.style.display = "none";
    }

    // Handle form submission for adding a patient
    addForm.onsubmit = function(event) {
        event.preventDefault();

        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var gender = document.getElementById("gender").value;
        var age = document.getElementById("age").value;
        var imageInput = document.getElementById("image");

        var defaultImageSrc = "path_to_default_image.png";

        if (imageInput.files && imageInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                addNewPatient(e.target.result, firstName, lastName, gender, age);
            };
            reader.readAsDataURL(imageInput.files[0]);
        } else {
            addNewPatient(defaultImageSrc, firstName, lastName, gender, age);
        }
    };

    function addNewPatient(imageSrc, firstName, lastName, gender, age) {
        var newListItem = document.createElement("li");
        newListItem.classList.add("patient-item");
        newListItem.innerHTML = 
            `<img src="${imageSrc}" alt="Profile Image" class="profile-img">
            <div class="text-content">${firstName} ${lastName}<br><span>${gender}, ${age}</span></div>
            <img src="3dots.svg" alt="Options" class="options-icon">`;

        patientList.insertBefore(newListItem, document.querySelector(".add-patient"));

        // Save new patient data
        let patientData = {
            imageSrc,
            firstName,
            lastName,
            gender,
            age
        };

        patientsData.push(patientData);
        localStorage.setItem("patientsData", JSON.stringify(patientsData));

        addForm.reset();
        closePopups();

        // Re-add event listeners to newly added patient items
        newListItem.querySelector(".options-icon").addEventListener("click", function() {
            showEditForm(newListItem);
        });
    }

    // Restore patient data from local storage and display it
    function restorePatientData() {
        patientsData.forEach((patient) => {
            var newListItem = document.createElement("li");
            newListItem.classList.add("patient-item");
            newListItem.innerHTML = 
                `<img src="${patient.imageSrc}" alt="Profile Image" class="profile-img">
                <div class="text-content">${patient.firstName} ${patient.lastName}<br><span>${patient.gender}, ${patient.age}</span></div>
                <img src="3dots.svg" alt="Options" class="options-icon">`;

            patientList.insertBefore(newListItem, document.querySelector(".add-patient"));

            // Add event listener for editing patient
            newListItem.querySelector(".options-icon").addEventListener("click", function() {
                showEditForm(newListItem);
            });
        });
    }

    // Call restorePatientData on page load
    restorePatientData();

    // Show "Edit Patient" popup when the options icon is clicked
    function showEditForm(li) {
        var textContent = li.querySelector(".text-content").innerText.trim();
        var nameParts = textContent.split(" ");
        var firstName = nameParts[0];
        var lastName = nameParts[1];
        var details = textContent.split("\n")[1].split(", ");
        var gender = details[0];
        var age = details[1];

        document.getElementById("editFirstName").value = firstName;
        document.getElementById("editLastName").value = lastName;
        document.getElementById("editGender").value = gender;
        document.getElementById("editAge").value = age;

        currentEditingLi = li;
        editPopup.style.display = "block";
    }

    // Handle form submission for editing a patient
    editForm.onsubmit = function(event) {
        event.preventDefault();

        var firstName = document.getElementById("editFirstName").value;
        var lastName = document.getElementById("editLastName").value;
        var gender = document.getElementById("editGender").value;
        var age = document.getElementById("editAge").value;

        if (currentEditingLi) {
            currentEditingLi.querySelector(".text-content").innerHTML = `${firstName} ${lastName}<br><span>${gender}, ${age}</span>`;
            updatePatientData(currentEditingLi, firstName, lastName, gender, age);
            closePopups();
        }
    };

    // Update patient data in local storage
    function updatePatientData(li, firstName, lastName, gender, age) {
        let index = Array.from(patientList.children).indexOf(li);
        if (index !== -1) {
            patientsData[index] = {
                imageSrc: li.querySelector(".profile-img").src,
                firstName,
                lastName,
                gender,
                age
            };
            localStorage.setItem("patientsData", JSON.stringify(patientsData));
        }
    }

    // Handle delete patient button
    document.getElementById("deletePatientButton").onclick = function() {
        if (currentEditingLi) {
            let textContent = currentEditingLi.querySelector(".text-content").innerText.trim();
            let nameParts = textContent.split(" ");
            let firstName = nameParts[0];
            let lastName = nameParts[1];
            
            currentEditingLi.remove();
            closePopups();

            // Remove patient from local storage
            patientsData = patientsData.filter(patient => !(patient.firstName === firstName && patient.lastName === lastName));
            localStorage.setItem("patientsData", JSON.stringify(patientsData));
        }
    };

    // Toggle gradient border animation on Patients section when the "Patients" li is clicked
    document.querySelector(".animate-patients").addEventListener("click", function(event) {
        event.preventDefault();
        var patientsSection = document.querySelector(".patients");

        if (currentlyAnimating && activeLi === this) {
            patientsSection.classList.remove("animate-border");
            currentlyAnimating = false;
            activeLi = null;
        } else {
            if (activeLi) {
                document.querySelector(".patients").classList.remove("animate-border");
            }
            patientsSection.classList.add("animate-border");
            currentlyAnimating = true;
            activeLi = this;
        }
    });
});

        document.addEventListener("DOMContentLoaded", function() {
            var patientsSection = document.querySelector(".patients");
            var animatePatientsLink = document.querySelector(".animate-patients");

            animatePatientsLink.addEventListener("click", function(event) {
                event.preventDefault();
                // Toggle the border animation
                patientsSection.classList.toggle("animate-border");
            });
        });
    </script>
    <script src="edit-patient.js"></script>
    <script src="displayp.js"></script>
    <script src="clentsdata.js"></script>
</body>
</html>
