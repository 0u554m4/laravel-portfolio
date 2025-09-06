# Gmail SMTP Setup Guide

To enable email notifications for your contact form, you need to configure Gmail SMTP with an App Password.

## Step 1: Enable 2-Factor Authentication

1. Go to your [Google Account settings](https://myaccount.google.com/)
2. Click on "Security" in the left sidebar
3. Under "Signing in to Google", click on "2-Step Verification"
4. Follow the prompts to enable 2-Factor Authentication

## Step 2: Generate App Password

1. Go back to [Google Account settings](https://myaccount.google.com/)
2. Click on "Security" in the left sidebar
3. Under "Signing in to Google", click on "App passwords"
4. You may need to sign in again
5. Select "Mail" as the app
6. Select "Other (Custom name)" as the device
7. Enter "Portfolio Website" as the name
8. Click "Generate"
9. Copy the 16-character password (it will look like: `abcd efgh ijkl mnop`)

## Step 3: Update Your .env File

Replace `your_app_password_here` in your `.env` file with the App Password you just generated:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=oussahmane@gmail.com
MAIL_PASSWORD=your_16_character_app_password_here
MAIL_FROM_ADDRESS="oussahmane@gmail.com"
MAIL_FROM_NAME="Portfolio Contact Form"
```

## Step 4: Test the Configuration

1. Clear the config cache: `php artisan config:clear`
2. Test the contact form on your website
3. Check your Gmail inbox for the notification email

## Troubleshooting

### "Authentication failed" error
- Make sure you're using the App Password, not your regular Gmail password
- Ensure 2-Factor Authentication is enabled
- Double-check the username and password in your .env file

### "Connection refused" error
- Verify the SMTP settings:
  - Host: smtp.gmail.com
  - Port: 587
  - Encryption: TLS

### Emails not being sent
- Check the Laravel logs: `storage/logs/laravel.log`
- Make sure the .env file is in the root directory
- Clear config cache: `php artisan config:clear`

## Security Notes

- Never commit your .env file to version control
- Keep your App Password secure
- Consider using environment variables in production
- The App Password is specific to this application

## Alternative: Using Mailtrap for Testing

If you want to test email functionality without setting up Gmail, you can use Mailtrap:

1. Sign up at [mailtrap.io](https://mailtrap.io)
2. Get your SMTP credentials from the inbox
3. Update your .env file with Mailtrap settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_FROM_ADDRESS="oussahmane@gmail.com"
MAIL_FROM_NAME="Portfolio Contact Form"
```

This will send emails to your Mailtrap inbox for testing purposes.
