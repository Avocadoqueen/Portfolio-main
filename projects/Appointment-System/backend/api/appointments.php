<?php
require_once __DIR__ . '/../lib/appointments.php';

header('Content-Type: application/json');

function json_response($status, $payload) {
    http_response_code($status);
    echo json_encode($payload);
    exit;
}

function read_json_body() {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);

    return is_array($data) ? $data : [];
}

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

try {
    if ($method === 'GET') {
        if ($id) {
            $appointment = get_appointment($id);
            if (!$appointment) {
                json_response(404, ['error' => 'Appointment not found']);
            }

            json_response(200, $appointment);
        }

        $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 100;
        json_response(200, list_appointments($limit));
    }

    if ($method === 'POST') {
        $data = read_json_body();
        if (!$data) {
            $data = $_POST;
        }

        $appointment = create_appointment($data);
        json_response(201, $appointment);
    }

    if ($method === 'PUT') {
        if (!$id) {
            json_response(400, ['error' => 'id is required']);
        }

        $data = read_json_body();
        $appointment = update_appointment($id, $data);
        if (!$appointment) {
            json_response(404, ['error' => 'Appointment not found']);
        }

        json_response(200, $appointment);
    }

    if ($method === 'DELETE') {
        if (!$id) {
            json_response(400, ['error' => 'id is required']);
        }

        $deleted = delete_appointment($id);
        if (!$deleted) {
            json_response(404, ['error' => 'Appointment not found']);
        }

        json_response(200, ['deleted' => true]);
    }

    json_response(405, ['error' => 'Method not allowed']);
} catch (InvalidArgumentException $e) {
    json_response(400, ['error' => $e->getMessage()]);
} catch (Exception $e) {
    json_response(500, ['error' => 'Server error']);
}
