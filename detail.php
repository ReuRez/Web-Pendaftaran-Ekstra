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
                <nav>
                    <ul>
                        <li><a href="list.php">Home</a></li>
                    </ul>
                </nav>
            </header>

            <section class="intro">
                <h2>Pembina: <span id="activity-teacher">Teacher Name</span></h2>
            </section>

            <section class="details">
                <h2>Jadwal: <span id="activity-schedule">Schedule Details</span></h2>
            </section>

            <section class="registration">
                <h2>Gabung!</h2>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSd9-ANyuBQ7a24eFBeBGjuynW5OyHmBKkvPk YU61tymXjk7zQ/viewform" class="registration-button">Daftar</a>
            </section>
        </div>
        <div class="right-box">
            <!-- You can add additional content for the right box here -->
        </div>
    </div>
</body>
</html>