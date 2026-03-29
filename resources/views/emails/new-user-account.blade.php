<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCS Email</title>
      <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { 
            margin: 0; 
            padding: 0; 
            background-color: #f4f7f9; 
            font-family: 'Poppins', Arial, sans-serif; 
            color: #333; 
        }

        table { border-collapse: collapse; width: 100%; }

        .copy-hint { 
            font-size: 11px; 
            color: #0088C0; 
            font-weight: bold; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
        }

        .credential-value:hover { 
            background-color: #f0faff !important; 
            cursor: text; 
        }

        @media screen and (max-width: 600px) {
            .email-container { width: 100% !important; border-radius: 0 !important; }
            .content-padding { padding: 30px 20px !important; }
        }
    </style>
</head>
<body>

    <table role="presentation" style="width: 100%; background-color: #f4f7f9; padding: 40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" class="email-container" style="width: 550px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin: 40px auto;">
                    
                    <tr>
                        <td align="center" style="background-color: #0088C0; padding: 20px 20px;">
                                <img src="{{ $message->embed(public_path('logo/docs1.png')) }}" 
                                        width="70" 
                                        height="70" 
                                        style="display: block; border-radius: 100%;" 
                                        alt="Logo">
                                    <h2 style="margin: 0; color: #ffffff; font-size: 26px; font-weight: 700; letter-spacing: -0.5px;">
                                        DOST V - DOCS
                                    </h2>
                                    <p style="margin: 0; font-weight: 600; color: #ffffff; font-size: 12px;">Document Operation Communication System</p>
                            </td>
                    </tr>

                    <tr>
                        <td class="content-padding" style="padding: 30px;">
                            <p style="margin: 0 0 30px 0; font-size: 16px; line-height: 1.6; color: #666; text-align: center;">
                                Your account is ready! Please use the temporary credentials below to access your dashboard.
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px;">
                    
                                <!-- Header -->
                                <tr>
                                    <td style="padding: 10px 20px; border-bottom: 1px solid #f1f5f9;">
                                        <p style="margin: 0; font-size: 15px; font-weight: bold; color: #242424;">
                                            Account Credentials
                                        </p>
                                    </td>
                                </tr>

                                <!-- Username -->
                                <tr>
                                    <td style="padding: 10px 20px 20px 20px;">
                                        <p style="margin: 0 0 6px 0; font-size: 11px; color: #94a3b8; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">
                                            Username
                                        </p>

                                        <div style="background-color: #f0f9ff; border: 1px solid #00AEEF; padding: 12px 14px; border-radius: 8px;">
                                            <span style="font-family: 'Courier New', monospace; font-size: 17px; color: #0088C0; font-weight: 700;">
                                                {{ $user->username }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                                    <!-- Password -->
                                    <tr>
                                        <td style="padding: 10px 20px 20px 20px;">
                                            <p style="margin: 0 0 6px 0; font-size: 11px; color: #94a3b8; text-transform: uppercase; font-weight: 600; letter-spacing: 0.5px;">
                                                Temporary Password
                                            </p>

                                            <div style="background-color: #f0f9ff; border: 1px solid #00AEEF; padding: 12px 14px; border-radius: 8px;">
                                                <span style="font-family: 'Courier New', monospace; font-size: 17px; color: #0088C0; font-weight: 700;">
                                                    {{ $generatedPassword }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>

                            </table>

                            <table role="presentation" style="width: 100%; margin-top: 20px;">
                            <tr>
                                <td style="background-color: #fff7ed; border-radius: 8px; padding: 15px; border-left: 4px solid #f6ad55;">
                                    <p style="margin: 0; font-size: 14px; color: #dd6b20; line-height: 1.4;">
                                        <strong>Security Notice:</strong> This password is temporary. You will be prompted to create a new, secure password upon your first login.
                                    </p>
                                </td>
                            </tr>
                            </table>

                            <table role="presentation" style="width: 100%; margin-top: 20px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ url('/login') }}" style="background-color: #00AEEF; color: #ffffff; padding: 8px 40px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 16px; display: inline-block; box-shadow: 0 4px 6px rgba(0,174,239,0.2);">
                                            Redirect to Login
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 0;">
                            <hr style="border: none; border-top: 4px solid #000000; margin: 0;">
                        </td>
                    </tr>

                    <!-- Footer with hard-coded DOST Logo -->
                    <tr>
                        <td align="center" style="padding: 30px 40px; background-color: #E0F2FE;">
                            <!-- Table for Logo + Text -->
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
                                <tr>
                                    <!-- SVG Logo -->
                                    <td style="padding-right: 10px; vertical-align: top; width: 10px;">
                                            <img src="{{ $message->embed(public_path('logo/dost_logo.svg')) }}" 
                                                            width="50" 
                                                            height="50" 
                                                            style="display: block; " 
                                                            alt="Logo">
                                    </td>

                                    <!-- Text -->
                                    <td style="vertical-align: top; color: #333; text-align: left; line-height: 1.2;">
                                        <p style="font-weight: bold; font-size: 18px; margin: 0; padding: 0;">DOST</p>
                                        <p style="font-size: 13px; margin: 0; padding: 0;">BICOL</p>
                                        <p style="font-weight: 800; font-size: 11px; margin: 0; padding: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            OneDOST4U: Solutions and Opportunities
                                        </p>
                                    </td>
                                    <!-- Text + Social Icons -->
                                    <td style="vertical-align: middle; color: #333; text-align: center; line-height: 1.2;">
                                        <!-- Social Icons in a row -->
                                        <img src="{{ $message->embed(public_path('logo/facebook-logo.svg')) }}" 
                                            width="20" 
                                            height="20" 
                                            style="display: inline-block; " 
                                            alt="Facebook Logo">
                                        <img src="{{ $message->embed(public_path('logo/instagram-logo.svg')) }}" 
                                            width="20" 
                                            height="20" 
                                            style="display: inline-block; " 
                                            alt="Instagram Logo">
                                        <img src="{{ $message->embed(public_path('logo/youtube-logo.svg')) }}" 
                                            width="20" 
                                            height="20" 
                                            style="display: inline-block;" 
                                            alt="YouTube Logo">

                                        <!-- Text under icons -->
                                        <p style="font-weight: 800; font-size: 11px; margin: 5px 0 0 0; padding: 0;">
                                            DOST-Bicol
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Footer -->
                            <p style="margin-top: 10px; font-size: 11px; color: #888;">&copy; {{ date('Y') }} DOST Bicol. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>