<!DOCTYPE html>
<html>
<head>
    <title>Ekstrakurikuler</title>
    <link rel="stylesheet" href="list.css"> <!-- Link to the external CSS file -->
</head>
<body>
    <header>
        <h1>EKSTRAKURIKULER</h1>
    </header>
    <div class="projects-container" id="projects-container">
        <!-- Activity cards will be dynamically inserted here -->
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
                        <a href="detail.php?id=${activity.id}"> <!-- Link to activity page with ID -->
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
</body>
</html>