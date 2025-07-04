<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// 🔒 Replace these with your actual Neon DB credentials
$host = "ep-ancient-rice-a14g7v5e-pooler.ap-southeast-1.aws.neon.tech";
$dbname = "ITS132L";
$user = "neondb_owner";
$pass = "npg_R9dyxkUEPAZ6";

$dsn = "pgsql:host=$host;dbname=$dbname;sslmode=require";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $stmt = $pdo->query("SELECT post_id, title, university_name FROM redditpostsdata LIMIT 10");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($posts);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
