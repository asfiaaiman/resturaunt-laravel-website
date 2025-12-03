<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;background-color:#f5f5f5;font-family:Arial, Helvetica, sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f5f5f5;padding:20px 0;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff;border-radius:4px;overflow:hidden;">
                <tr>
                    <td style="background-color:#e3594b;color:#ffffff;padding:16px 24px;font-size:18px;font-weight:bold;">
                        @yield('header', config('app.name'))
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px;font-size:14px;line-height:1.6;color:#333333;">
                        @yield('content')
                    </td>
                </tr>
                <tr>
                    <td style="padding:16px 24px;font-size:12px;color:#777777;background-color:#f0f0f0;text-align:center;">
                        @yield('footer', 'This is an automated message from ' . config('app.name') . '.')
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>


