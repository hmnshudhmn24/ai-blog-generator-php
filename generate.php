<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $topic = trim($_POST['topic']);
    $prompt = "Write an SEO-optimized blog post on: $topic. Include intro, body, and conclusion.";

    $data = [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'system', 'content' => 'You are a blog writing assistant.'],
            ['role' => 'user', 'content' => $prompt]
        ]
    ];

    $ch = curl_init('https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $openai_api_key
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        die('Error: ' . curl_error($ch));
    }
    curl_close($ch);

    $result = json_decode($response, true);
    $content = $result['choices'][0]['message']['content'] ?? 'Error generating content';

    $stmt = $pdo->prepare("INSERT INTO blogs (topic, content, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$topic, $content]);

    header('Location: index.php');
}
?>