<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Details</title>
    <link rel="stylesheet" href="activity.css"> <!-- Link to your CSS file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script> <!-- Include PapaParse -->
</head>
<body>
    <header>
        <h1 id="activity-name">Activity Name</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <main style="display: flex;">
        <section class="content" style="flex: 70%;">
            <section class="intro">
                <h2>Pembina: <span id="activity-teacher">Teacher Name</span></h2>
            </section>

            <section class="details">
                <h2>Jadwal: <span id="activity-schedule">Schedule Details</span></h2>
            </section>

            <section class="registration">
                <h2>Gabung!</h2>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSd9-ANyuBQ7a24eFBeBGjuynW5OyHmBKkvPkYU61tymXjk7zQ/viewform" class="registration-button">Daftar</a>
            </section>
        </section>
    </main>

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

    </script>
</body>
</html>