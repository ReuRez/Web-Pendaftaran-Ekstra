<!DOCTYPE html>
<html>
<head>
    <title>Ekstrakurikuler</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #0A0A2A;
            font-family: Arial, sans-serif;
        }
        header {
            text-align: center;
            padding: 20px 0;
            background-color: #0A0A2A;
        }
        h1 {
            color: #E0E0E0;
            font-size: 2.5rem;
            margin: 0;
        }
        .projects-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            text-align: center;
            padding: 20px;
        }
        .project-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            transition: transform 0.3s ease;
        }
        .project-card:hover {
            transform: translateY(-10px);
        }
        .project-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
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
</body>
</html>