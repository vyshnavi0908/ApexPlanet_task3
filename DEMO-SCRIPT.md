# Task 3 — 8-minute demo outline

**0:00–0:35 Intro:** “Hello, I’m Vyshnavi Ramisetty. This is my ApexPlanet Full Stack Web Development Task 3, a PHP and MySQL User Management System with CRUD, authentication, role-based access, and profile management.”

**0:35–1:15 Structure/database:** Show folders and `database/schema.sql`. Explain users table fields, unique email, role, and password hash.

**1:15–2:10 Registration:** Demonstrate validation and create a test user. Mention server-side validation and `password_hash()`.

**2:10–3:00 Login/logout:** Sign in, show dashboard, log out, and explain sessions plus `password_verify()`.

**3:00–4:35 Admin CRUD:** As admin, search users, add a disposable test user, edit details/role, then delete a disposable record after confirmation. Explain prepared statements and admin checks.

**4:35–5:45 Profile:** Update phone/bio and upload a valid image under 2 MB. Mention JPG/PNG/WEBP restrictions.

**5:45–6:35 Security:** Show prepared statements, password hashing, CSRF token validation, output escaping, and role guard. Do not reveal credentials.

**6:35–7:20 Responsive design:** Use browser DevTools responsive mode to show desktop/mobile layouts and hamburger menu.

**7:20–8:00 Wrap-up:** Summarize CRUD, authentication, roles, and profile management. Thank the viewer.

Before recording: use test data, ensure XAMPP is running, and do not leave `setup-admin.php` in the final deployed folder.
