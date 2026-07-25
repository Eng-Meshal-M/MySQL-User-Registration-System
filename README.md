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

- User registration form (Name & Age)
- Store submitted data in a MySQL database
- Real-time communication between HTML and PHP
- Dynamic record counter linked directly to the database
- Automatic record count update after every submission
- Responsive and modern user interface
- Database connection centralized in a dedicated PHP file
- Clean project structure for easier maintenance

---

## 🚀 Improvements

During development, several enhancements were implemented beyond the basic requirements:

- Replaced the local browser counter with a **real SQL record counter**.
- The registration number is now calculated using the actual number of rows stored in the database.
- The counter updates automatically whenever a new record is added.
- If records are deleted directly from the database, the displayed count remains accurate after reopening the page.
- Database connection settings were separated into a dedicated **db.php** file to avoid duplicated configuration.

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

## 📂 Project Structure

```text
.
├── README.md             # Project documentation
├── user_form.sql          # MySQL database schema & initial data
│
└── registry-app/        # Main web application files
    ├── index.html        # Main registration interface
    ├── db.php            # Database connection configuration
    ├── save.php          # Endpoint for inserting new entries
    └── count.php         # Endpoint for retrieving active record count
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

## 📚 References

- W3Schools
- MDN Web Docs
- PHP Documentation
- MySQL Documentation
- InfinityFree Documentation
