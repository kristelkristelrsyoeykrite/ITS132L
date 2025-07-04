<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    $dsn = getenv("DATABASE_URL");
    $pdo = new PDO($dsn);
    $stmt = $pdo->query("SELECT * FROM redditpostsdata LIMIT 10");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($results);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
