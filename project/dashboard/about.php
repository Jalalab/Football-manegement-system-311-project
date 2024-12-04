<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Football Club Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('nsu.jpg') no-repeat center center/cover;
            margin: 0;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .about-container {
            max-width: 900px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 12px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            color: #4CAF50;
        }
        .developers {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 30px;
        }
        .developer {
            width: 45%;
            margin-bottom: 20px;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 8px;
        }
        .developer img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #4CAF50;
            margin-bottom: 10px;
        }
        .developer h3 {
            margin: 10px 0 5px;
            color: #FFD700;
        }
        .developer p {
            margin: 5px 0;
            font-size: 14px;
        }
        .developer a {
            color: #1E90FF;
            text-decoration: none;
        }
        .developer a:hover {
            text-decoration: underline;
        }
        .project-details {
            margin-top: 20px;
            text-align: left;
        }
        .project-details h2 {
            color: #FFD700;
        }
        .project-details p {
            line-height: 1.6;
        }
        a.back {
            display: inline-block;
            margin-top: 20px;
            color: #FF6347;
            text-decoration: none;
        }
        a.back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="about-container">
        <h1>About Football Club Management</h1>
        
        <!-- Developers Section -->
        <div class="developers">
            <div class="developer">
                <img src="dev1.jpg" alt="Developer 1">
                <h3>Md. Jalal Abedin </h3>
                <p><strong>University:</strong> North South University</p>
                
                <p><a href="https://www.facebook.com/jalal.abedin.pial" target="_blank">Facebook Profile</a></p>
            </div>
            <div class="developer">
                <img src="dev2.jpg" alt="Developer 2">
                <h3>Rakib Rayhan</h3>
                <p><strong>University:</strong> North South University</p>
                <p><a href="https://www.facebook.com/rakib.rayhan.105254" target="_blank">Facebook Profile</a></p>
            </div>
        </div>

        <!-- Project Details Section -->
        <div class="project-details">
            <h2>Project Details</h2>
            <p>This project, *Football Club Management*, aims to streamline the management of football clubs. It offers features such as adding players, managing match schedules, tracking stadiums, and managing kits, managers, and coaches. Built with PHP, HTML, CSS, and MySQL, the project is a comprehensive tool for handling football club operations efficiently.</p>
            <p>Version: 1.0</p>
            <p> PHP, MySQL, HTML, CSS</p>
        </div>
        
        <!-- Back to Dashboard -->
        <a href="dashboard.php" class="back">Back</a>
    </div>
</body>
</html>
