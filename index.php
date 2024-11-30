<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction Page</title>
    <style>
        /* General Styles */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        /* Navigation Bar */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.3);
            z-index: 1000;
            transition: background-color 0.3s ease;
            backdrop-filter: blur(10px);
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end;
            padding: 20px;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li:last-child {
            margin-right: 0;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            padding: 10px 15px;
            display: inline-block;
            transition: color 0.3s ease, background-color 0.3s ease;
            border-radius: 5px;
        }

        nav ul li a:hover {
            background-color: rgba(0, 0, 0, 0.1);
            color: #000;
        }

        /* Full-page Background Image */
        .intro-section {
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100vh; /* Full height of the viewport */
            display: flex;
            justify-content: center;
            align-items: center;
            color: rgb(22, 63, 114);
            text-align: center;
            position: relative;
            padding-top: 80px; /* Adjusted for the navbar height */
        }

        /* Container to Center Content */
        .container {
            max-width: 1200px; /* Ensures content doesn’t stretch across wide screens */
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Scrollable Content Section */
        .content-section {
            padding: 50px 20px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding-top: 100px; /* Adjust for navbar height */
            min-height: 100vh; /* Ensure full section height */
            text-align: center;
            border-radius: 20px;
        }

        /* Projects Section */
        .projects-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            text-align: center;
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

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            height: 100vh; /* Full height */
            width: 600px;
            max-width: 90%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border-radius: 0; /* No border radius for touching top and bottom */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .modal-section {
            margin-bottom: 20px;
        }

        .close-button {
            cursor: pointer;
        }
 ```php
        }

        /* Footer Styles */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
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
                        <a href="activity.html?id=${activity.id}"> <!-- Link to activity page with ID -->
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