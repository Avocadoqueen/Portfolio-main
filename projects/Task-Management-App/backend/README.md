# Backend (Task Management)

Express + TypeScript backend for task and auth APIs.

Quick start:

1. Install dependencies:

```bash
cd backend
pnpm install
```

2. Generate Prisma client (if you want DB):

```bash
pnpm prisma generate
pnpm prisma migrate dev --name init
```

3. Run dev server:

```bash
pnpm dev
```

API endpoints:
- `GET /health`
- `POST /api/auth/login`
- `GET /api/auth/demo-users`
- `GET /api/tasks`

Auth is currently demo-mode with fixed credentials:
- Student: `STU001` / `demo123`
- Lecturer: `LEC001` / `demo123`
- Admin: `ADM001` / `demo123`

Tasks API uses Prisma DB calls in `src/routes/tasks.ts`.
