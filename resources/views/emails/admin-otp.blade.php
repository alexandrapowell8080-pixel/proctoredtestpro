<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Login OTP</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; margin: 0; padding: 40px 0;">
    <table width="100%" cellpadding="0" cellspacing="0"
        style="max-w-md; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <tr>
            <td style="padding: 40px 30px; text-align: center;">
                <div
                    style="width: 48px; height: 48px; background-color: #2563eb; color: #ffffff; border-radius: 10px; display: inline-block; line-height: 48px; margin-bottom: 20px;">
                    <svg style="width: 24px; height: 24px; vertical-align: middle;" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <h1 style="color: #111827; font-size: 24px; font-weight: bold; margin: 0 0 10px 0;">Secure Login Code
                </h1>
                <p style="color: #6b7280; font-size: 15px; margin: 0 0 30px 0;">Use the code below to access your admin
                    dashboard. This code expires in 15 minutes.</p>

                <div
                    style="background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; font-size: 32px; font-weight: bold; color: #1e40af; letter-spacing: 8px;">
                    {{ $otp }}
                </div>

                <p style="color: #9ca3af; font-size: 13px; margin-top: 30px; margin-bottom: 0;">If you did not request
                    this code, please ignore this email or contact support.</p>
            </td>
        </tr>
    </table>
</body>

</html>