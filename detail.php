<html>
<head>
    <link rel="stylesheet" href="detail.css"> <!-- Link to the external CSS file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script> <!-- Include PapaParse -->
    <script>
        // Function to get the activity ID from the URL
        function getActivityId() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('id');
        }

        // Function to fetch activity details
        function fetchActivityDetails() {
            const activityId = getActivityId();
            fetch(`fetch_single_activity.php?id=${activityId}`) // Use the new PHP script
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(activity => {
                    if (activity && Object.keys(activity).length > 0) {
                        document.getElementById('activity-name').innerText = activity.name || 'Unknown Activity';
                        document.getElementById('activity-teacher').innerText = activity.teacher || 'Unknown Teacher';
                        document.getElementById('activity-schedule').innerText = activity.schedule || 'No Schedule Available';
                        // Display the image
                        document.getElementById('activity-image').src = activity.image || 'default-image.jpg'; // Use a default image if none is found
                        document.getElementById('daftar-button').href = activity.link || '#'; // Set the link for Daftar button
                    } else {
                        console.error('No activity found for the given ID.');
                    }
                })
                .catch(error => console.error('Error fetching activity details:', error));
        }

        // Call function to fetch activity details when the document is ready
        document.addEventListener('DOMContentLoaded', fetchActivityDetails);
    </script>
</head>
<body>
    <img alt="Abstract blue and purple wavy background" class="background-image" height="1080" src="https://storage.googleapis.com/a1aa/image/8blC6zft99QObKIRsfQUbdq5TJrtAgyo8WBXAoSZ5JHBDh3TA.jpg" width="1920"/>
    <div class="container" style="background: none;">
        <div class="left-box">
            <header>
                <h1 id="activity-name">Activity Name</h1>
            </header>
            <section class="navigation" style="display: flex; justify-content: space-between; align-items: center; margin: 0;">
                <a href="main.php" class="home-button">Home</a>
                <div style="flex-grow: 1;"></div> <!-- Ruang kosong di tengah -->
                <a href="prestasi.php" class="prestasi-button">Prestasi</a>
            </section>
    <a href="main.php" class="home-button">Home</a>
    <div style="flex-grow: 1;"></div> <!-- Ruang kosong di tengah -->
    <div style="display: flex; flex-direction: column; align-items: flex-end;">
        <a href="prestasi.php" class="prestasi-button">Prestasi</a>
        <a href="daftar_siswa.php" class="data-siswa-button">Data Siswa</a>
    </div>
</section>
            <section class="image">
                <img id="activity-image" alt="Activity Image" width="300" /> <!-- Image element to display the activity image -->
            </section>

            <section class="intro">
                <h2>Pembina: <span id="activity-teacher">Teacher Name</span></h2>
            </section>

            <section class="details">
                <h2>Jadwal: <span id="activity-schedule">Schedule Details</span></h2>
            </section>

            <section class="registration">
                <a id="daftar-button" href="#" class="registration-button">Daftar</a> <!-- Updated Daftar button -->
            </section>
        </div>
    </div>
</body>
</html>