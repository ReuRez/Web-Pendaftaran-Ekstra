<html>
<head>
    <title>
        Smakanza Ekstrakulikuler Website
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #0b0b3b;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            position: relative;
        }
        .container {
            position: relative;
        }
        .title {
            font-size: 3em;
            font-weight: bold;
            margin: 0;
        }
        .subtitle {
            font-size: 1em;
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer; /* Change cursor to pointer */
        }
        .learn-more {
            font-size: 1em;
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
        .learn-more i {
            margin-left: 5px;
        }
        .learn-more a {
            color: white; /* Ensure the link text is white */
            text-decoration: none; /* Remove underline from link */
        }
    </style>
</head>
<body>
    <div class="subtitle" id="tektias">
        TEKTIAS
    </div>
    <div class="container">
        <div class="title">
            SMAKANZA
            <br/>
            EKSTRAKULIKULER
            <br/>
            WEBSITE
        </div>
    </div>
    <div class="learn-more">
        <a href="list.php">LEARN MORE</a>
        <i class="fas fa-arrow-right"></i>
    </div>

    <script>
        let clickCount = 0; // Initialize click count

        document.getElementById('tektias').addEventListener('click', function() {
            clickCount++; // Increment click count
            if (clickCount === 5) {
                window.location.href = 'admin.php'; // Redirect to admin.php
            }
        });
    </script>
</body>
</html>