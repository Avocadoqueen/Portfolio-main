<?php
require_once __DIR__ . '/../lib/appointments.php';

$testDb = __DIR__ . '/../data/test_appointments.sqlite';
if (file_exists($testDb)) {
    unlink($testDb);
}

putenv('APPOINTMENTS_DB_PATH=' . $testDb);

function assert_true($condition, $message) {
    if (!$condition) {
        fwrite(STDERR, "FAIL: $message\n");
        exit(1);
    }
}

$created = create_appointment([
    'name' => 'Test User',
    'date' => '2024-10-01',
    'time' => '10:30',
    'reason' => 'Checkup',
    'type' => 'Offline',
    'doctor' => 'Cardiology',
]);

assert_true(isset($created['id']), 'create_appointment returns an id');
assert_true($created['name'] === 'Test User', 'create_appointment persists name');

$list = list_appointments(10);
assert_true(count($list) === 1, 'list_appointments returns one row');

$updated = update_appointment($created['id'], ['reason' => 'Follow-up']);
assert_true($updated['reason'] === 'Follow-up', 'update_appointment updates fields');

$deleted = delete_appointment($created['id']);
assert_true($deleted === true, 'delete_appointment removes row');

$missing = get_appointment($created['id']);
assert_true($missing === null, 'deleted appointment is not found');

reset_db_connection();

if (file_exists($testDb)) {
    unlink($testDb);
}

echo "OK\n";
