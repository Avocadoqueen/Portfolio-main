export type UserRole = "student" | "lecturer" | "admin"

export interface User {
  id: string
  studentNumber: string
  email: string
  name: string
  role: UserRole
  avatar?: string
}

export interface AuthState {
  user: User | null
  isLoading: boolean
}

interface DemoUser extends User {
  password: string
}

// Mock users for demonstration
const mockUsers: DemoUser[] = [
  {
    id: "1",
    studentNumber: "STU001",
    email: "student@university.edu",
    name: "John Student",
    role: "student",
    password: "demo123",
  },
  {
    id: "2",
    studentNumber: "LEC001",
    email: "lecturer@university.edu",
    name: "Dr. Sarah Professor",
    role: "lecturer",
    password: "demo123",
  },
  {
    id: "3",
    studentNumber: "ADM001",
    email: "admin@university.edu",
    name: "Admin User",
    role: "admin",
    password: "demo123",
  },
]

export const authService = {
  login: async (studentNumber: string, password: string): Promise<User> => {
    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 1000))

    const user = mockUsers.find((u) => u.studentNumber === studentNumber && u.password === password)
    if (!user) {
      throw new Error("Invalid student number or password")
    }

    const { password: _password, ...safeUser } = user

    // Store in localStorage
    localStorage.setItem("auth_user", JSON.stringify(safeUser))
    return safeUser
  },

  logout: async (): Promise<void> => {
    localStorage.removeItem("auth_user")
  },

  getCurrentUser: (): User | null => {
    if (typeof window === "undefined") return null

    const stored = localStorage.getItem("auth_user")
    return stored ? JSON.parse(stored) : null
  },

  register: async (email: string, password: string, name: string, role: UserRole): Promise<User> => {
    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 1000))

    const newUser: User = {
      id: Date.now().toString(),
      studentNumber: email.split("@")[0].toUpperCase(), // Assuming studentNumber is derived from email
      email,
      name,
      role,
    }

    localStorage.setItem("auth_user", JSON.stringify(newUser))
    return newUser
  },
}
