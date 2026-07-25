# 🗄️ MySQL User Registration System

> **Developed by:** Meshal Al Mehmady  
> **Live Website:** https://meshalportfolio.42web.io/registry-app/

---

<p align="center">
  <img src="https://github.com/user-attachments/assets/3768a8d3-d12c-48f1-8014-a8f9d8b48b5f"
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

Each user record includes a **Status** field that can be switched instantly between **Active** and **Inactive**.

### Status Examples

<p align="center">
<img src="https://github.com/user-attachments/assets/59c1ad5e-499e-4a41-90a3-b3d8060e6d21" width="85%">
</p>

The image above shows both possible status states:
- **Active** – the user account is enabled.
- **Inactive** – the user account is disabled.

Toggling the status updates the record directly in the MySQL database and refreshes the interface immediately without reloading the page.

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
  <img src="https://github.com/user-attachments/assets/298a7d03-64f0-43a0-9b11-9fe6a5f858b7" 
 width="85%">
</p>

Example:

| id | name | age | status |
|---:|------|----:|-------:|
| 1 | Meshal | 24 | 1 |
| 2 | Tariq | 25 | 0 |

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
<img src="https://github.com/user-attachments/assets/2fecad39-cf07-4fcd-80c8-7841cef0e18f" 
 width="85%">
</p>

---

### 2. Database Records & Live Counter (Backend)

<p align="center">
<img src="https://github.com/user-attachments/assets/298a7d03-64f0-43a0-9b11-9fe6a5f858b7" 
 width="85%">
  </p>
  
---

## ⚙️ How It Works

1. The user enters a name and age through the registration form.
2. The data is sent to the PHP backend using `save.php`.
3. PHP stores the user information inside the MySQL database.
4. The application retrieves stored records dynamically using `records.php`.
5. The live counter gets the current number of registered users through `count.php`.
6. The user status can be changed using the toggle button.
7. The status update is handled by `toggle_status.php` and saved directly in the MySQL database.
8. JavaScript (Fetch API) updates the interface instantly without refreshing the page.

---

## 🛠️ Technologies Used

- HTML5
- CSS3
- JavaScript (Fetch API)
- PHP
- MySQL
- InfinityFree Hosting
- phpMyAdmin

## 📚 References

- W3Schools
- MDN Web Docs
- PHP Documentation
- MySQL Documentation
- InfinityFree Documentation
