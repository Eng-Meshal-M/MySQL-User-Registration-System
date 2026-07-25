# 🗄️ MySQL User Registration System

> **Developed by:** Meshal Al Mehmady  
> **Live Website:** https://meshalportfolio.42web.io/registry-app/

---

<p align="center">
  <img src="https://github.com/user-attachments/assets/ec301b03-9de7-4efe-a27a-a648d8da3dd2" 
 width="90%">
</p>

---

## 📖 Overview

This project is a simple web application developed using **HTML, CSS, JavaScript, PHP, and MySQL**. It allows users to enter their name and age through a web form, store the information in a MySQL database, and manage the records through a clean and interactive interface.

The project demonstrates the fundamentals of connecting a frontend interface with a backend database while performing real-time data operations without requiring unnecessary page refreshes.

---

## ✨ Features

- Register users with name and age
- Store user data in a MySQL database
- Display records dynamically without page refresh
- Live database record counter
- Toggle user status (Active / Inactive)
- Instant UI updates using JavaScript (Fetch API)
- Responsive and clean interface
- Centralized database configuration (`db.php`)

---

## 🚀 Improvements

- Replaced the local counter with a live SQL record counter.
- Added dynamic record retrieval.
- Implemented a status toggle system with instant database updates.
- Separated database configuration into `db.php`.
- Improved project organization and maintainability.

---

## 🔄 Status Toggle

Each user record includes a **status** field that can be switched instantly between **Active** and **Inactive**.

### User Interface

| Inactive | Active |
|----------|--------|
| ![Inactive Status](images/status-inactive.png) | ![Active Status](images/status-active.png) |

The toggle button updates the record directly in the MySQL database and refreshes the interface immediately without reloading the page.

### Status Values

| Database Value | Display |
|---------------:|---------|
| `0` | 🔴 Inactive |
| `1` | 🟢 Active |

---

## 🗄️ MySQL Database

The application stores user information inside a MySQL database.

### Database Table

<p align="center">
  <img src="images/database-status.png" width="85%">
</p>

Example:

| id | name | age | status |
|---:|------|----:|-------:|
| 1 | Meshal | 24 | 1 |
| 2 | Ahmed | 30 | 0 |

- `0` → Inactive
- `1` → Active

> Database credentials are excluded from this repository for security reasons.

---

## 📂 Project Structure

```text
.
├── README.md             # Project documentation
├── user_form.sql         # MySQL database schema & initial data
│
└── registry-app/         
    ├── index.html        # Main registration interface
    ├── db.php            # Database connection configuration
    ├── save.php          # Endpoint for inserting new entries
    ├── count.php         # Endpoint for retrieving database record count
    ├── records.php       # Endpoint for retrieving all records
    └── toggle_status.php # Endpoint for updating record status
```
---

## 📸 Project Preview

### 1. Stamped Confirmation View (Frontend)

<p align="center">
<img src="https://github.com/user-attachments/assets/970e90b3-0770-4c38-a838-0da893a07f7d" 
 width="85%">
</p>

---

### 2. Database Records & Live Counter (Backend)

<p align="center">
<img src="https://github.com/user-attachments/assets/b5170568-9824-4160-b2c4-c29ad1c3cc25" 
 width="85%">
---

## ⚙️ How It Works

1. Enter a name and age.
2. Click **Submit**.
3. The data is sent to **save.php**.
4. PHP stores the information inside the MySQL database.
5. The record counter retrieves the current number of database records.
6. The page updates the displayed record count automatically.

---

## 🛠️ Technologies Used

- HTML5
- CSS3
- JavaScript (Fetch API)
- PHP
- MySQL
- InfinityFree Hosting
- phpMyAdmin
  
  ---

## 📚 References

- W3Schools
- MDN Web Docs
- PHP Documentation
- MySQL Documentation
- InfinityFree Documentation
