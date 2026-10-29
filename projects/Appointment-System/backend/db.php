<?php
function appointments_db_path() {
    $path = getenv('APPOINTMENTS_DB_PATH');
    if ($path !== false && $path !== '') {
        return $path;
    }

    return __DIR__ . '/data/appointments.sqlite';
}

function get_db() {
    if (isset($GLOBALS['appointments_pdo']) && $GLOBALS['appointments_pdo'] instanceof PDO) {
        return $GLOBALS['appointments_pdo'];
    }

    $path = appointments_db_path();
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    $pdo = new PDO('sqlite:' . $path);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS appointments (' .
        'id INTEGER PRIMARY KEY AUTOINCREMENT,' .
        'name TEXT NOT NULL,' .
        'date TEXT NOT NULL,' .
        'time TEXT NOT NULL,' .
        'reason TEXT,' .
        'type TEXT,' .
        'doctor TEXT,' .
        'created_at TEXT NOT NULL' .
        ')'
    );

    $GLOBALS['appointments_pdo'] = $pdo;
    return $pdo;
}

function reset_db_connection() {
    $GLOBALS['appointments_pdo'] = null;
}
