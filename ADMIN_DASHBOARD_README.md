# Admin Dashboard for Portfolio Website

This admin dashboard allows you to manage contact form submissions from your portfolio website without relying on email notifications.

## Features

- **Secure Admin Login**: Simple session-based authentication
- **Contact Management**: View, read, mark as read/unread, and delete contact messages
- **Dashboard Overview**: Statistics showing total messages, unread count, and read count
- **Message Details**: Full view of individual contact messages with reply functionality
- **Responsive Design**: Works on desktop and mobile devices

## Admin Access

### Default Credentials
- **Username**: `admin`
- **Password**: `admin123`

**⚠️ Important**: Change these credentials in production by modifying the `AdminController.php` file.

### Access URLs
- **Admin Login**: `http://your-domain.com/admin/login`
- **Admin Dashboard**: `http://your-domain.com/admin/dashboard`

## How It Works

1. **Contact Form Submission**: When visitors submit the contact form, the data is stored in the `contacts` database table
2. **Admin Login**: Access the admin panel using the credentials above
3. **View Messages**: All contact submissions are displayed in the dashboard with read/unread status
4. **Manage Messages**: 
   - Click "View" to see full message details
   - Mark messages as read/unread
   - Delete unwanted messages
   - Reply directly via email using the "Reply via Email" button

## Database Schema

The `contacts` table includes:
- `id`: Primary key
- `name`: Contact person's name
- `email`: Contact person's email
- `subject`: Message subject
- `message`: Full message content
- `is_read`: Boolean flag for read status
- `read_at`: Timestamp when message was marked as read
- `created_at`: When the message was submitted
- `updated_at`: Last update timestamp

## Security Notes

1. **Change Default Credentials**: Update the hardcoded credentials in `AdminController.php`
2. **HTTPS in Production**: Always use HTTPS for admin access
3. **Session Security**: Consider implementing proper user authentication for production
4. **Database Security**: Ensure your database is properly secured

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── AdminController.php          # Admin functionality
│   └── Middleware/
│       └── AdminMiddleware.php          # Admin authentication middleware
├── Models/
│   └── Contact.php                      # Contact model
resources/
└── views/
    └── admin/
        ├── login.blade.php              # Admin login page
        ├── dashboard.blade.php          # Main admin dashboard
        └── contact-show.blade.php       # Individual message view
database/
└── migrations/
    └── 2025_09_06_135159_create_contacts_table.php
```

## Usage Instructions

1. **Access Admin Panel**: Navigate to `/admin/login`
2. **Login**: Use the default credentials (change in production)
3. **View Messages**: See all contact submissions in the dashboard
4. **Manage Messages**: 
   - Click "View" for full message details
   - Use action buttons to mark as read/unread or delete
   - Use "Reply via Email" to respond to contacts
5. **Logout**: Click the logout button when done

## Customization

- **Styling**: Modify the Tailwind CSS classes in the Blade templates
- **Credentials**: Update the authentication logic in `AdminController.php`
- **Features**: Add more functionality like message filtering, search, or export
- **Notifications**: Integrate with email or other notification systems

## Troubleshooting

- **Can't Access Admin**: Check if the middleware is properly registered in `Kernel.php`
- **Messages Not Showing**: Verify the database migration was run successfully
- **Login Issues**: Check the session configuration in `config/session.php`
- **Styling Issues**: Ensure Tailwind CSS is loading properly

## Future Enhancements

Consider adding:
- User management for multiple admins
- Email notifications for new messages
- Message filtering and search
- Export functionality
- Message categories or tags
- Automated responses
