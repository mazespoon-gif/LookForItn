<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background-color: #f3f4f6; margin: 0; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: white; border-radius: 12px; border: 1px solid #e5e7eb; box-shadow: 0px 4px 25px 0px #0000000D; padding: 20px; }
        .header { text-align: center; border-radius: 8px 8px 0 0; }
        .header img { width: 100%; height: 200px; border-radius: 6px; object-fit: cover; }
        h2 { color: #0f172a; font-weight: 600; margin: 16px 0 8px; font-size: 20px; }
        .email-text { color: #6b7280; font-size: 13px; margin: 4px 0 12px; }
        p { color: #3f3f46; text-align: left; margin: 16px 0; line-height: 1.5; }
        .hello { color: #6d6dd3; }
        .button { display: inline-block; background: #000000; color: #ffffff; padding: 12px 32px; text-decoration: none; border-radius: 6px; font-size: 14px; font-weight: 500; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://media.assettype.com/sunstar/import/uploads/images/2020/08/17/240684.jpg?w=1200&h=900&auto=format%2Ccompress&fit=max&enlarge=true" alt="header image">
        </div>

        <h2>Hello from <span class="hello">LookForIT</span></h2>
        <p class="email-text">{{ $email }}</p>

        <p>
            Thank you for signing up! To get started and secure your account,
            please confirm your email address by clicking the button below.
        </p>

        <div style="text-align: center; margin: 24px 0;">
            <a href="{{ $url }}" style="display: inline-block; background-color: #000000 !important; color: #ffffff !important; padding: 12px 32px; text-decoration: none; border-radius: 6px; font-size: 14px; font-weight: 500;">Verify Email Address</a>
        </div>

        <p style="text-align: center;">
            We're committed to making your experience simple, secure, and efficient.
        </p>

        <hr style="margin: 24px 0; border: none; border-top: 1px solid #e5e7eb;">

        <table width="100%" style="font-size: 12px; color: #9ca3af; margin-top: 16px;">
            <tr>
                <td style="text-align: left;">Thank you for choosing LookForIT</td>
                <td style="text-align: right;">Develop By <span class="hello">Xfsynflt</span> </td>
            </tr>
        </table> 
    </div>
</body>
</html>