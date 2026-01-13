<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6f9; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;">
        <tr>
            <td align="center">

                <!-- Card -->
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:12px; box-shadow:0 8px 25px rgba(0,0,0,0.08); overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#0d6efd; padding:30px; text-align:center; color:#ffffff;">
                            <h2 style="margin:0;">🔐 Reset Password</h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:40px; color:#333333;">
                            <p style="font-size:16px; margin-bottom:16px;">
                                Halo <strong>{{ $username }}</strong>,
                            </p>

                            <p style="font-size:15px; line-height:1.6; margin-bottom:24px;">
                                Kami menerima permintaan untuk mengatur ulang password akun Anda.
                                Berikut adalah token untuk memverifikasi permintaan anda. simpan token tersebut dengan
                                aman!
                            </p>

                            <!-- Button -->
                            <div style="text-align:center; margin:30px 0;">
                                <a href="#"
                                    style="
                               background:#0d6efd;
                               color:#ffffff;
                               text-decoration:none;
                               padding:14px 30px;
                               border-radius:8px;
                               font-size:16px;
                               display:inline-block;">
                                    {{ $token }}
                                </a>
                            </div>

                            <p style="font-size:14px; color:#6c757d; line-height:1.6;">
                                Token reset password ini hanya berlaku selama
                                <strong>30 menit</strong>.
                                Jika Anda tidak merasa melakukan permintaan reset password,
                                silakan abaikan email ini.
                            </p>

                            <hr style="margin:30px 0; border:none; border-top:1px solid #e9ecef;">

                            <p style="font-size:13px; color:#adb5bd;">
                                Demi keamanan akun Anda, jangan bagikan token ini kepada siapa pun.
                            </p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f8f9fa; padding:20px; text-align:center; font-size:13px; color:#6c757d;">
                            © {{ date('Y') }}
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
