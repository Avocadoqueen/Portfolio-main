import { Router } from "express";

const router = Router();

type Role = "student" | "lecturer" | "admin";

interface DemoUser {
  id: number;
  studentNumber: string;
  email: string;
  name: string;
  role: Role;
  password: string;
}

const demoUsers: DemoUser[] = [
  {
    id: 1,
    studentNumber: "STU001",
    email: "student@university.edu",
    name: "John Student",
    role: "student",
    password: "demo123",
  },
  {
    id: 2,
    studentNumber: "LEC001",
    email: "lecturer@university.edu",
    name: "Dr. Sarah Professor",
    role: "lecturer",
    password: "demo123",
  },
  {
    id: 3,
    studentNumber: "ADM001",
    email: "admin@university.edu",
    name: "Admin User",
    role: "admin",
    password: "demo123",
  },
];

router.post("/login", (req, res) => {
  const { studentNumber, password } = req.body;
  if (!studentNumber || !password) {
    return res.status(400).json({ error: "studentNumber and password are required" });
  }

  const user = demoUsers.find(
    (candidate) =>
      candidate.studentNumber.toUpperCase() === String(studentNumber).toUpperCase() &&
      candidate.password === String(password),
  );

  if (!user) {
    return res.status(401).json({ error: "Invalid credentials" });
  }

  const { password: _password, ...safeUser } = user;
  return res.json({ token: `demo-token-${safeUser.role}`, user: safeUser });
});

router.get("/demo-users", (_req, res) => {
  const users = demoUsers.map(({ password, ...safeUser }) => safeUser);
  return res.json(users);
});

export default router;
