# Survey Management System

TypeScript + Express backend for survey creation, question management, and response collection.

## Stack
- Node.js
- Express
- TypeScript
- MySQL (`mysql2`)
- JWT authentication

## Features
- Register/login endpoints with hashed passwords
- Survey CRUD
- Question CRUD and reorder
- Response submission and retrieval
- Owner-based permissions for protected actions

## Requirements
- Node.js 16+
- MySQL 8+

## Setup
1. Install dependencies:
   - `npm install`
2. Create env file:
   - `cp .env.example .env`
3. Update `.env` values:
   - `DB_HOST`
   - `DB_PORT`
   - `DB_USER`
   - `DB_PASSWORD`
   - `DB_NAME`
   - `JWT_SECRET` (minimum 16 chars)
4. Create database:
   - `CREATE DATABASE survey_system;`
5. Run SQL migrations from:
   - `src/database/migrations/001_create_users_table.sql`
   - `src/database/migrations/002_create_survey_tables.sql`
6. Start server:
   - `npm run dev`

## Base URL
- `http://localhost:3000`

## Key Endpoints
- `POST /api/auth/register`
- `POST /api/auth/login`
- `GET /api/auth/me`
- `POST /api/surveys`
- `GET /api/surveys`
- `GET /api/surveys/:id/full`
- `POST /api/surveys/:surveyId/questions`
- `POST /api/surveys/:surveyId/responses`

## Notes
- Protected routes require `Authorization: Bearer <token>`.
- The app now fails fast if `JWT_SECRET` is missing or too short.
