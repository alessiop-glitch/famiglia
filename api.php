<?php
header('Content-Type: application/json');

$file = 'data.json';

// Inizializza il file JSON se non esiste
if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$action = $_GET['action'] ?? '';
$tasks = json_decode(file_get_contents($file), true) ?? [];

if ($action === 'get') {
    echo json_encode($tasks);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if ($action === 'add' && !empty($input['text'])) {
    $newTask = [
        'id' => time() . rand(100, 999),
        'text' => trim($input['text']),
        'member' => trim($input['member'] ?? 'Famiglia'),
        'category' => trim($input['category'] ?? 'Casa'),
        'priority' => trim($input['priority'] ?? 'Media'),
        'dueDate' => trim($input['dueDate'] ?? ''),
        'cost' => floatval($input['cost'] ?? 0),
        'completed' => false,
        'createdAt' => date('Y-m-d H:i:s')
    ];
    array_unshift($tasks, $newTask);
    file_put_contents($file, json_encode($tasks));
    echo json_encode($tasks);
    exit;
}

if ($action === 'toggle' && isset($input['id'])) {
    foreach ($tasks as &$task) {
        if ($task['id'] == $input['id']) {
            $task['completed'] = !$task['completed'];
            break;
        }
    }
    file_put_contents($file, json_encode($tasks));
    echo json_encode($tasks);
    exit;
}

if ($action === 'edit' && isset($input['id']) && !empty($input['text'])) {
    foreach ($tasks as &$task) {
        if ($task['id'] == $input['id']) {
            $task['text'] = trim($input['text']);
            break;
        }
    }
    file_put_contents($file, json_encode($tasks));
    echo json_encode($tasks);
    exit;
}

if ($action === 'delete' && isset($input['id'])) {
    $tasks = array_values(array_filter($tasks, function ($task) use ($input) {
        return $task['id'] != $input['id'];
    }));
    file_put_contents($file, json_encode($tasks));
    echo json_encode($tasks);
    exit;
}

if ($action === 'clear_completed') {
    $tasks = array_values(array_filter($tasks, function ($task) {
        return !$task['completed'];
    }));
    file_put_contents($file, json_encode($tasks));
    echo json_encode($tasks);
    exit;
}
?>