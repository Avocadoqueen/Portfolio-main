<?php
require_once __DIR__ . '/../db.php';

function normalize_appointment_data(array $data) {
    $normalized = [];
    $fields = ['name', 'date', 'time', 'reason', 'type', 'doctor'];

    foreach ($fields as $field) {
        if (array_key_exists($field, $data)) {
            $value = is_string($data[$field]) ? trim($data[$field]) : $data[$field];
            $normalized[$field] = $value;
        }
    }

    return $normalized;
}

function create_appointment(array $data) {
    $data = normalize_appointment_data($data);

    if (empty($data['name']) || empty($data['date']) || empty($data['time'])) {
        throw new InvalidArgumentException('name, date, and time are required');
    }

    $pdo = get_db();
    $stmt = $pdo->prepare(
        'INSERT INTO appointments (name, date, time, reason, type, doctor, created_at) ' .
        'VALUES (:name, :date, :time, :reason, :type, :doctor, :created_at)'
    );

    $stmt->execute([
        ':name' => $data['name'],
        ':date' => $data['date'],
        ':time' => $data['time'],
        ':reason' => $data['reason'] ?? null,
        ':type' => $data['type'] ?? null,
        ':doctor' => $data['doctor'] ?? null,
        ':created_at' => date('c'),
    ]);

    return get_appointment($pdo->lastInsertId());
}

function list_appointments($limit = 100) {
    $limit = (int) $limit;
    if ($limit <= 0 || $limit > 500) {
        $limit = 100;
    }

    $pdo = get_db();
    $stmt = $pdo->prepare('SELECT * FROM appointments ORDER BY date, time LIMIT :limit');
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_appointment($id) {
    $pdo = get_db();
    $stmt = $pdo->prepare('SELECT * FROM appointments WHERE id = :id');
    $stmt->execute([':id' => (int) $id]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

    return $appointment ?: null;
}

function update_appointment($id, array $data) {
    $data = normalize_appointment_data($data);

    $fields = [];
    $params = [':id' => (int) $id];

    foreach (['name', 'date', 'time', 'reason', 'type', 'doctor'] as $field) {
        if (array_key_exists($field, $data)) {
            $fields[] = $field . ' = :' . $field;
            $params[':' . $field] = $data[$field];
        }
    }

    if (!$fields) {
        throw new InvalidArgumentException('No fields to update');
    }

    $pdo = get_db();
    $stmt = $pdo->prepare('UPDATE appointments SET ' . implode(', ', $fields) . ' WHERE id = :id');
    $stmt->execute($params);

    return get_appointment($id);
}

function delete_appointment($id) {
    $pdo = get_db();
    $stmt = $pdo->prepare('DELETE FROM appointments WHERE id = :id');
    $stmt->execute([':id' => (int) $id]);

    return $stmt->rowCount() > 0;
}
