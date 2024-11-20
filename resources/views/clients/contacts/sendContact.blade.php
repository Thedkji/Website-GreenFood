<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin liên hệ</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f9f9f9;">

    <table cellpadding="0" cellspacing="0" width="100%" style="background-color: #f9f9f9; padding: 20px;">
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" width="600px" align="center"
                    style="background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <tr>
                        <td style="background-color: #28a745; color: #ffffff; text-align: center; padding: 20px;">
                            <h1 style="margin: 0; font-size: 24px;">Thông tin liên hệ</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <h2 style="margin-top: 0; color: #333;">Liên hệ mới từ {{ $name }}</h2>
                            <p style="margin: 8px 0; color: #555;"><strong>Email:</strong> {{ $email }}</p>
                            <p style="margin: 8px 0; color: #555;"><strong>Nội dung:</strong></p>
                            <p style="margin: 8px 0; color: #555;">{{ $userMessage }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #f1f1f1; text-align: center; padding: 10px; color: #777;">
                            <p style="margin: 0;">&copy; 2024 GreenFood. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>
