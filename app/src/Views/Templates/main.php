// TODO htmx template
<html>
<head>
    <title>Code Coverage</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css">
</head>
<body>
    <div class="container">
        <h1>Code Coverage</h1>

        <div id="nav" hx-get="/htmx/getNavigation"></div>

        <div id="main" hx-get="/htmx/getContent" hx-trigger="load"></div>

        <div id="footer" hx-trigger="load"></div>
    </div>
</body>
</html>
