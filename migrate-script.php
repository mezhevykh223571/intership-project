<?php
$mydb = new mysqli('localhost', 'root', '', '');

$migratePosts = "
REPLACE INTO intership.wp_posts
SELECT * FROM boat_race.wp_posts
";
$migratePostMeta = "
REPLACE INTO intership.wp_postmeta 
SELECT * FROM boat_race.wp_postmeta
";

if ($mydb->query($migratePosts) === TRUE) echo "<p>Migrate wp_posts</p>";
if ($mydb->query($migratePostMeta) === TRUE) echo "<p>Migrate wp_postmeta</p>";

exec("cp -r /Users/evgeny/Sites/db-migration/wp-content/uploads/ /Users/evgeny/Sites/intership-project/wp-content/uploads/");