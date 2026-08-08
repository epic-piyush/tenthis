# Tenthis

Tenthis is a lightweight PHP-based task & reward platform providing user signup/login, referrals, task creation/completion, wallet rewards, and withdrawals.

## Features

- User registration and login
- Referral tracking and validation
- Create and complete tasks to earn rewards
- Wallet management and withdrawals
- Admin area for task and user management
- Lightweight API endpoints in `shortlinks/` for integrations

## Requirements

- PHP 7.4+ (or compatible)
- MySQL / MariaDB
- A local web server (XAMPP, WAMP, or similar)

## Quick start

1. Place the project in your web root. Example for XAMPP:

```bash
cp -r tenthis /c/xampp/htdocs/tenth/tenthis
```

2. Start Apache and MySQL (via XAMPP control panel).

3. Import the database schema:

```bash
mysql -u root -p < userform.sql
```

4. Update database credentials in the connection files:

- `php/connection.php`
- `shortlinks/connection.php` (if using the shortlinks API)

Open those files and set your `DB_HOST`, `DB_USER`, `DB_PASS`, and `DB_NAME` values.

5. Open the site in a browser:

http://localhost/tenth/tenthis/

## Important files and folders

- `index.php` — Public homepage / entry point
- `signup.php`, `login.php`, `logout.php` — Authentication
- `profile.php` — User profile and wallet overview
- `withdraw.php`, `withdraw_history.php` — Withdrawal flow and history
- `refer.php` — Referral handling
- `task_offer.php`, `view_task.php`, `students_offer.php` — Task listing and details
- `admin/` (inside `gfkjkjer/`) — Admin panel for managing tasks, users, and withdrawals
- `php/` — Shared PHP includes (`connection.php`, `function.php`, `head.php`, etc.)
- `shortlinks/` — Minimal API endpoints used by the app (e.g., `get_tasks_info.php`)
- `userform.sql` — Database schema and initial data

## Admin access

The admin area is located at `gfkjkjer/admin/`. Secure this path in production by renaming it, enforcing stronger credentials, or adding additional server-side restrictions.

## Configuration & customization

- Update styles in `style_light.css` and `style_dark.css`.
- Edit email or notification logic in `php/function.php` and related files.
- Add or change tasks via the admin interface (`gfkjkjer/admin/add_tasks.php`).

## Security notes

- Do not run this project in production without reviewing and hardening authentication, input validation, and SQL handling.
- Replace default credentials and avoid using `root` for production databases.
- Sanitize all user inputs and consider using prepared statements if not already used.

## Troubleshooting

- Blank pages: enable PHP errors in `php.ini` or add `ini_set('display_errors', 1); error_reporting(E_ALL);` at the top of a debug copy.
- DB connection errors: verify credentials in `php/connection.php` and that MySQL is running.
- Missing files: ensure you copied the full project and preserved folder structure.

## Contributing

Open issues or submit pull requests. For quick fixes, prefer small, focused changes and document configuration updates here.

## License

This project has no explicit license file.

---
