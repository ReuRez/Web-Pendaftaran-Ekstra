<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction Page</title>
    <link rel="stylesheet" href="index.css"> <!-- Link to the external CSS file -->
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#Ekstrakulikuler">Ekstrakulikuler</a></li>
            </ul>
        </nav>
    </header>

    <div class="intro-section" id="home">
        <div class="container">
            <h1>EKSTRAKULIKULER</h1>
            <p>Pendaftaran</p>
        </div>
    </div>

    <div class="content-section" id="Ekstrakulikuler">
        <h2>Our Activities</h2>
        <div class="projects-container" id="projects-container">
            <!-- Activity cards will be dynamically inserted here -->
        </div>
    </div>

    <script>
        // Fetch activities from the database
        fetch('fetch_activities.php')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('projects-container');
                data.forEach(activity => {
                    const card = document.createElement('div');
                    card.className = 'project-card';
                    card.innerHTML = `
                        <a href="activity.php?id=${activity.id}"> <!-- Link to activity page with ID -->
                            <img src="${activity.image}" alt="${activity.name}">
                            <h3>${activity.name}</h3>
                            <p>${activity.description}</p>
                        </a>
                    `;
                    container.appendChild(card);
                });
            })
            .catch(error => console.error('Error fetching activities:', error));
    </script>

    <footer>
        <p>&copy; 2024 Your Organization. All rights reserved.</p>
    </footer>

</body>
</html>