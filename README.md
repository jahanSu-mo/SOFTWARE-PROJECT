**README: Hospital Management System**

# 🏥 Hospital Management System

The **Hospital Management System** is a full-stack web application built using PHP and MySQL. It is designed to simplify and automate common hospital operations, such as patient registration, appointment booking, doctor management, and administrative oversight. The goal is to deliver an efficient digital platform where multiple roles (patients, doctors, and administrators) can perform their respective actions through a single interface. This system aims to reduce manual errors, save time, and improve communication between patients and hospital staff.

This project supports:

- Patient account creation and appointment booking
- Doctor registration and appointment viewing
- Department-wise doctor listing
- Admin control panel to manage doctors and user messages
- Role-based access for patient, doctor, and admin



## 👥 Team Members

1. Suborna Jahan Sumona - (0562320005101203)
2. Mst Hajera Begum Shimla - (0562220005101044)
3. Upoma dhar Tonny - (0562220005101028)


## 🔧 Setup and Installation Instructions

Follow the steps below to run the project on your local machine using **XAMPP**:

### 1. Move the Folder

Place the downloaded project folder into the `htdocs` directory of your XAMPP installation.

### 2. Start Apache and MySQL

Open XAMPP Control Panel and start the **Apache** and **MySQL** services.

### 3. Create the Database

- Go to: `http://localhost/phpmyadmin`
- Create a new database (e.g., `home_db`)
- Import the provided SQL file into the database (usually named `home_db.sql`)

### 4. Configure the Database Connection

Navigate to the file:
```
../components/connect.php
```

Update the database credentials as needed:

```php
$db_name = 'mysql:host=localhost;dbname=home_db';
$db_user_name = 'root';
$db_user_pass = '';
```

### 5. Launch the Application

Visit this URL in your browser:

```
http://localhost/hospital-management-system
```



## 🚀 Key Features

- **User Registration & Login** (patients & doctors)
- **Doctor Specialization & Profile Management**
- **Book Appointments with Date and Time Selection**
- **Department-based Doctor Listings**
- **Admin Dashboard to Manage Doctors and Messages**
- **Role-Based Login Redirection**
- **Secure Password Hashing and Cookie-based Authentication**
- **SweetAlert Pop-ups and Clean UI Design**



## 🌐 Technologies Used

- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP 8.x
- **Database:** MySQL (via phpMyAdmin)
- **Tools:** XAMPP, VS Code
- **Design:** Custom CSS, FontAwesome icons



## 📊 Project Structure

```
hospital-management-system/
|
|-- admin/             # Admin dashboard files
|-- components/        # Reusable PHP components like headers, db connection
|-- css/               # All CSS styling
|-- images/            # Project images and assets
|-- js/                # Custom JavaScript if any
|-- uploaded_files/    # Core PHP logic files (register, login, appointments, etc.)

```


## 📄 License

This project is intended for educational purposes. You may modify or extend it for your academic submissions or personal learning projects.


## 🙏 Acknowledgments

- Thanks to our course instructor for project guidelines.
- Inspired by real-world hospital systems.
- Special thanks to Open Source tools and libraries used.





