# Conference Day Management System

## Description

The **Conference Day Management System** is a web-based application designed to help manage conference events. The system allows admins to sign up, sign in, and manage conference schedules, participants, and session information.

## Features Implemented

- **Sign Up**: Admins can create an account by providing a username, password, and role (Admin or Staff). Passwords are securely stored using hashing.
- **Sign In**: Admins can log in using their username and password. The system verifies credentials and redirects users based on their role.
- **Conference Schedule Management**: Admins can view and manage the conference schedule, including session topics, timings, and locations.
- **Session Management**: Admins can manage conference tracks, sessions, and session capacities.
- **Proceedings Sharing**: Admins can upload conference proceedings for registered participants to download.

## Technologies Used

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Password Hashing**: bcrypt (`password_hash()` and `password_verify()` functions in PHP)

## Setup Instructions

Follow the steps below to set up and run the application on your local machine.

### Prerequisites

- **Web Server**: Apache or Nginx
- **PHP**: PHP 7.4 or higher
- **MySQL**: MySQL 5.7 or higher

### 1. Clone the repository

Clone the repository to your local machine:

```bash
git clone https://github.com/dj-creation/conference-day-management-system.git
cd conference-day-management-system

### Notes:
1. **Database Setup**: The setup steps outline how to create the necessary database and tables (`admins` and `schedule`). You can adjust the table schema as needed based on your actual database structure.
   
2. **Configuration Details**: The database connection settings in the `conference_admin.php` file should be adjusted to your own local or remote database configuration.

3. **Features**: The document highlights the major features that have been implemented (sign-up/sign-in, schedule management, etc.).

Let me know if you'd like to include any other specific details or modifications!
