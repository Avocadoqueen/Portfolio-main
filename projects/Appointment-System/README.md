# Near East Hospital Appointment System

A simple appointment scheduling web application for **Near East Hospital**.  
Patients can view available doctors/time slots and book appointments, while staff can review bookings and manage schedule data through the backend.

## About
This project is split into two parts:
- **Frontend (Patient/Staff UI):** server-rendered pages for booking and viewing appointments
- **Backend (API + data layer):** stores appointment data and exposes endpoints for listing/creating appointments

## Key Features
### Patient Features
- Book an appointment by selecting **date** and **time**
- Choose **appointment type** (e.g., Online/Offline)
- Select a **doctor/department**
- Provide appointment reason/details

### Staff Features
- View a list of booked appointments
- Manage and update schedule/appointment data from the backend

## Tech Stack
### Frontend
- PHP (server-rendered pages)
- HTML, CSS, JavaScript

### Backend
- PHP 8.x
- PDO (database access)

### Database
- SQLite (local database file)

## Project Structure
appointment_system/
├─ backend/
│ ├─ api/
│ │ └─ appointments.php
│ ├─ data/
│ │ └─ appointments.sqlite
│ └─ tests/
│ └─ appointments_test.php
├─ frontend/
│ └─ views/
├─ extras/
└─ README.md

## Database Details
- SQLite file location: `backend/data/appointments.sqlite`
- Table: `appointments`

**Columns**
- `id` (INTEGER, Primary Key)
- `name` (TEXT)
- `date` (TEXT)
- `time` (TEXT)
- `reason` (TEXT)
- `type` (TEXT)
- `doctor` (TEXT)
- `created_at` (TEXT)

### Environment Variable (Optional)
You can override the database path using:
- `APPOINTMENTS_DB_PATH`

Example:
export APPOINTMENTS_DB_PATH="backend/data/appointments.sqlite"

How to Run Locally
Requirements
PHP 8.x installed
SQLite enabled (usually enabled by default with PHP builds)
1) Run the Backend API
From the repo root: php -S localhost:8000 -t backend

API Endpoints (example)
List appointments:
GET http://localhost:8000/api/appointments.php
Optional: ?limit=100
Get one appointment:
GET http://localhost:8000/api/appointments.php?id=1
Create appointment:
POST http://localhost:8000/api/appointments.php
Example create request: curl -X POST http://localhost:8000/api/appointments.php \
  -H "Content-Type: application/json" \
  -d '{"name":"Jane Doe","date":"2024-10-01","time":"10:30","reason":"Checkup","type":"Offline","doctor":"Cardiology"}'

2) Run the Frontend Website
In a new terminal, from the repo root:
php -S localhost:8080 -t frontend/views
Open:
http://localhost:8080
Note: If your frontend calls the API, make sure the backend is running too.
Testing
Run the basic API/data test script:
php backend/tests/appointments_test.php

Future Improvements
Proper staff authentication + roles
Prevent double-booking (time-slot collision validation)
Admin dashboard for doctors/schedules
Deploy online (with a hosted database)
Author
Eniola Abdul
