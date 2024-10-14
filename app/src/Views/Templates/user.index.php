
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .social-icons a {
            margin: 0 10px;
            color: #007bff;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="profile-header">
        <img src="https://via.placeholder.com/150" alt="User Image" class="profile-img">
        <h2>{{name}}</h2>
        <p>Web Developer</p>
        <div class="social-icons">
            <a href="#" target="_blank">LinkedIn</a>
            <a href="#" target="_blank">Twitter</a>
            <a href="#" target="_blank">GitHub</a>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5>About Me</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>

            <h5>Contact Information</h5>
            <ul class="list-unstyled">
                <li><strong>Email:</strong> {{email}}</li>
                <li><strong>Phone:</strong> {{phone}}</li>
                <li><strong>Location:</strong> {{location}}</li>
            </ul>

            <h5>Skills</h5>
            <ul class="list-inline">
                <li class="list-inline-item badge badge-primary">HTML</li>
                <li class="list-inline-item badge badge-primary">CSS</li>
                <li class="list-inline-item badge badge-primary">JavaScript</li>
                <li class="list-inline-item badge badge-primary">React</li>
                <li class="list-inline-item badge badge-primary">Node.js</li>
            </ul>

            <h5>Experience</h5>
            <ul class="list-unstyled">
                <li><strong>Web Developer at Company XYZ (2020 - Present)</strong></li>
                <li><strong>Intern at Company ABC (2019 - 2020)</strong></li>
            </ul>

            <button type="button" class="btn btn-primary mt-3">Edit Profile</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
echo "{{name}}";
trace("view -- 'user.index'");