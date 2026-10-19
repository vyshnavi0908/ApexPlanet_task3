# ER diagram

One `users` table models account and profile information. `id` is the primary key, `email` is unique, and `role` separates `user` and `admin`.

```text
USERS
-----
id (PK)
full_name
email (UNIQUE)
phone
bio
profile_picture
password_hash
role (user/admin)
created_at
updated_at
```
