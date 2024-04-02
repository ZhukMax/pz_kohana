<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/path/to/our/admin/styles.css"> <!-- Adjust the path as needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include other global scripts and styles here -->
</head>
<body>
<header>
    <h1>Admin Panel</h1>
    <!-- Navigation can go here -->
    <nav>
        <ul>
            <li><a href="/admin/invoices">Invoices</a></li>
            <li><a href="/admin/payment_systems">Payment Systems</a></li>
            <!-- Add other navigation links here -->
        </ul>
    </nav>
</header>

<div id="content">
    <?php echo $content; ?> <!-- This will render the specific page content -->
</div>

<footer>
    <p>Admin Footer</p>
</footer>

</body>
</html>
