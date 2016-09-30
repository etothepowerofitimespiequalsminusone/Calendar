<!DOCTYPE html>
<html>
<head>
<title>Setting up database</title>
</head>
<body>
<h3> Setting up...</h3>
<?php
require_once 'functions.php';

createTable('members', 'user VARCHAR(16),pass VARCHAR(16),INDEX(user(6))');
createTable('cars', 'regnum CHAR(6) PRIMARY KEY, type VARCHAR(20) NULL, color VARCHAR(20) NULL, date_seen date NULL');

?>
<br>...done.
</body>
</html>

