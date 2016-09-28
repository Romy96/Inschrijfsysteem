<?php
/* CREATE A VALID DATABASE CONNECTION */
$mysql_host = 'mysql.hostinger.nl';
$mysql_dbname = 'u619986482_db';
$mysql_user = 'u619986482_user';
$mysql_pass = 'Waterman1';
$db = new PDO('mysql:host='. $mysql_host.';dbname='.$mysql_dbname.';charset=utf8mb4', $mysql_user, $mysql_pass);
// print MySQL version
// $statement = $db->query('SELECT version();');
// foreach($statement as $row) {
//      $_SESSION['errors'][] = 'MySQL server version: ' . implode(' ', $row);
// }
// $statement = $db->query('SELECT * from accounts;');
// foreach($statement as $row) {
//      $_SESSION['errors'][] = 'User record: ' . implode(' ', $row);
//  }