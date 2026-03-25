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
                            <div style="background-color: #ffffff; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                                
                          <img src="{{ $message->embed(public_path('logo/docs_logo.png')) }}" 
                                width="70" 
                                height="70" 
                                style="display: block;" 
                                alt="Logo">
                                    
                            </div>

                            <h2 style="margin: 0; color: #ffffff; font-size: 26px; font-weight: 700; letter-spacing: -0.5px;">
                                DOST V - DOCS
                            </h2>
                            <p style="margin: 0; font-weight: 600; color: #ffffff; font-size: 12px;">Document Operation Communication System</p>

                        </td>
                    </tr>

                    <tr>
                        <td class="content-padding" style="padding: 40px;">
                            <p style="margin: 0 0 30px 0; font-size: 16px; line-height: 1.6; color: #666; text-align: center;">
                                Your account is ready! Please use the temporary credentials below to access your dashboard.
                            </p>

              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" 
       style="background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px;">
    
    <!-- Header -->
    <tr>
        <td style="padding: 18px 20px; border-bottom: 1px solid #f1f5f9;">
            <p style="margin: 0; font-size: 14px; font-weight: 600; color: #0088C0;">
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

                            <table role="presentation" style="width: 100%; margin-top: 30px;">
                                <tr>
                                    <td style="background-color: #fff5f5; border-radius: 8px; padding: 15px; border-left: 4px solid #f56565;">
                                        <p style="margin: 0; font-size: 14px; color: #c53030; line-height: 1.4;">
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


                    <!-- Divider line ABOVE footer -->
<tr>
    <td style="padding: 0;">
        <hr style="border: none; border-top: 1px solid #ddd; margin: 0;">
    </td>
</tr>

                <!-- Footer with hard-coded DOST Logo -->
<tr>
    <td align="center" style="padding: 30px 40px; background-color: #f4f7f9;">
        <div style="display: flex; gap: 10px; align-items: center; justify-content: center; flex-wrap: wrap;">
            <!-- Hard-coded SVG Logo -->
<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="50" height="50" version="1.1" viewBox="0 0 100 100"  >
  <!-- Generator: Adobe Illustrator 30.1.0, SVG Export Plug-In . SVG Version: 2.1.1 Build 136)  -->
  <rect x="25.0000025" y="25.0000025" width="50.000005" height="50.000005"/>
  <path d="M50.0000108,25.0000054h-25.0000054v24.9999839c13.8071259,0,25.0000054-11.1928795,25.0000054-24.9999839Z" fill="#fff"/>
  <path d="M75.0000161,49.9999892v-24.9999839h-25.0000054c0,13.8071043,11.1928795,24.9999839,25.0000054,24.9999839Z" fill="#fff"/>
  <path d="M50.0000108,74.9999946h25.0000054v-25.0000054c-13.8071259,0-25.0000054,11.192901-25.0000054,25.0000054Z" fill="#fff"/>
  <path d="M50.0000108,74.9999946c0-13.8071043-11.1928795-25.0000054-25.0000054-25.0000054v25.0000054h25.0000054Z" fill="#fff"/>
  <path d="M0,25.0000054c0,13.8071043,11.1928795,24.9999839,25.0000054,24.9999839v-24.9999839H0Z" fill="#00aeef"/>
  <path d="M75.0000161,0c-13.8071259,0-25.0000054,11.1928795-25.0000054,25.0000054h25.0000054V0Z" fill="#00aeef"/>
  <path d="M75.0000161,49.9999892v25.0000054h24.9999839c0-13.8071043-11.1928795-25.0000054-24.9999839-25.0000054Z" fill="#00aeef"/>
  <path d="M25.0000054,74.9999946v25.0000054c13.8071259,0,25.0000054-11.192858,25.0000054-24.9999839v-.0000215h-25.0000054Z" fill="#00aeef"/>
  <path d="M50.0000108,25.0000054C50.0000108,11.1928795,38.8071313,0,25.0000054,0S0,11.1928795,0,25.0000054h50.0000108Z"/>
  <path d="M75.0000161,49.9999892c13.8071043,0,24.9999839-11.1928795,24.9999839-24.9999839,0-13.8071259-11.1928795-25.0000054-24.9999839-25.0000054v49.9999892Z"/>
  <path d="M50.0000108,74.9999946v.0000215c0,13.8071259,11.1928795,24.9999839,25.0000054,24.9999839,13.8071043,0,24.9999839-11.1928795,24.9999839-25.0000054h-49.9999892Z"/>
  <path d="M25.0000054,74.9999946v-25.0000054c-13.8071259,0-25.0000054,11.192901-25.0000054,25.0000054,0,13.8071259,11.1928795,25.0000054,25.0000054,25.0000054v-25.0000054Z"/>
</svg>  

                <!-- Text -->
        <div style="display: flex; flex-direction: column; color: #333; text-align: left; margin: 0; padding: 0; line-height:2;">
            <span style="font-weight: bold; font-size: 18px; margin: 0; padding: 0; line-height: 1;">DOST</span>
            <span style="font-size: 13px; margin: 0; padding: 0; line-height: 1;">BICOL</span>
            <span style="font-weight: 800; margin: 0; padding: 0; font-size: 11px; line-height: 1;  white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                OneDOST4U: Solutions and Opportunities
            </span>
        </div>
        </div>
        <p style="margin-top: 15px; font-size: 11px; color: #888;">&copy; {{ date('Y') }} DOST Bicol. All rights reserved.</p>
    </td>
</tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>