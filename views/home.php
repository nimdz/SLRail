
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title']; ?></title>
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
</head>
<body>
    <header>
        <h1><?php echo $data['title']; ?></h1>
    </header>
    <main>
        <p><?php echo $data['content']; ?></p>
    </main>
    <footer>
        &copy; <?php echo date('Y'); ?> Railway System
    </footer>
</body>
</html>




