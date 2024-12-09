<html>
<head>
    <link rel="stylesheet" href="detail.css"> <!-- Link to the external CSS file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script> <!-- Include PapaParse -->
    <script>
        // Function to get the achievement ID from the URL
        function getAchievementId() {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get('id');
        }

        // Function to fetch achievement details
        function fetchAchievementDetails() {
            const achievementId = getAchievementId();
            fetch(`fetch_single_achievement.php?id=${achievementId}`) // Use the new PHP script
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.statusText);
                    }
                    return response.json();
                })
                .then(achievement => {
                    if (achievement && Object.keys(achievement).length > 0) {
                        document.getElementById('achievement-name').innerText = achievement.name || 'Unknown Achievement';
                        document.getElementById('achievement-description').innerText = achievement.description || 'No Description Available';
                        // Display the image
                        document.getElementById('achievement-image').src = achievement.image || 'default-image.jpg'; // Use a default image if none is found
                    } else {
                        console.error('No achievement found for the given ID.');
                    }
                })
                .catch(error => console.error('Error fetching achievement details:', error));
        }

        // Call function to fetch achievement details when the document is ready
        document.addEventListener('DOMContentLoaded', fetchAchievementDetails);
    </script>
</head>
<body>
    <img alt="Abstract blue and purple wavy background" class="background-image" height="1080" src="https://storage.googleapis.com/a1aa/image/8blC6zft99QObKIRsfQUbdq5TJrtAgyo8WBXAoSZ5JHBDh3TA.jpg" width="1920"/>
    <div class="container" style="background: none;">
        <div class="left-box">
            <header>
                <h1 id="achievement-name">Prestasi yang Dirahih</h1>
            </header>
            <section class="navigation" style="display: flex; justify-content: space-between; align-items: center; margin: 0;">
                <a href="main.php" class="home-button">Home</a>
                <div style="flex-grow: 1;"></div> <!-- Ruang kosong di tengah -->
                <a href="list.php" class="prestasi-button">Kembali</a>
            </section>
            <section class="image">
                <img id="achievement-image" alt="Achievement Image" width="300" /> <!-- Image element to display the achievement image -->
            </section>

            <section class="intro">
                <h2>Deskripsi: <span id="achievement-description">Prestasi terakhir yang baru dicapai oleh ekstra Band merupakan piala gubernur Jawa Tengah 2024</span></h2>
            </section>
        </div>
    </div>
</body>
</html>