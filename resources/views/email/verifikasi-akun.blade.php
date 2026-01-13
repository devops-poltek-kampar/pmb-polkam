<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <!DOCTYPE html>

    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <title>Verifikasi Akun</title>
    </head>

    <body style="margin:0; padding:0; background-color:#f8f9fa; font-family:Arial, Helvetica, sans-serif;">

        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" style="padding:40px 15px;">

                    ```
                    <!-- Card (Bootstrap 5 style) -->
                    <table width="100%" cellpadding="0" cellspacing="0"
                        style="max-width:600px; background:#ffffff; border-radius:16px;
                      box-shadow:0 12px 30px rgba(0,0,0,0.08); overflow:hidden;">

                        <!-- Header -->
                        <tr>
                            <td align="center" style="background:#0d6efd; padding:30px;">
                                <h1 style="margin:0; color:#ffffff; font-size:24px;">
                                    🔐 Verifikasi Akun
                                </h1>
                                <p style="margin:8px 0 0; color:#dbe7ff; font-size:14px;">
                                    Aktifkan akun Anda untuk melanjutkan
                                </p>
                            </td>
                        </tr>

                        <!-- Body -->
                        <tr>
                            <td style="padding:32px; color:#212529;">

                                <p style="margin-top:0; font-size:15px;">
                                    Halo <strong>Nama</strong>,
                                </p>

                                <p style="font-size:15px; line-height:1.7; color:#495057;">
                                    Terima kasih telah mendaftar. Untuk keamanan akun Anda,
                                    kami perlu memastikan bahwa alamat email ini benar.
                                </p>

                                <!-- Alert Info -->
                                <div
                                    style="background:#e7f1ff; border-left:6px solid #0d6efd;
                                padding:16px; border-radius:10px; margin:24px 0;">
                                    <p style="margin:0; font-size:14px; color:#084298;">
                                        Klik tombol di bawah untuk menyelesaikan proses
                                        <strong>verifikasi akun</strong>.
                                    </p>
                                </div>

                                <!-- Button -->
                                <div style="text-align:center; margin:32px 0;">
                                    <a href="{{ url('/verified-account') }}/{{ $userid }}"
                                        style="background:#0d6efd; color:#ffffff; text-decoration:none;
                                  padding:14px 34px; border-radius:50px;
                                  font-size:15px; font-weight:600;
                                  display:inline-block;">
                                        Verifikasi Akun
                                    </a>
                                    {{-- <a href="http://demo.pmb.poltek-kampar.ac.id/verified-account/{{ $userid }}"
                                        style="background:#0d6efd; color:#ffffff; text-decoration:none;
                                  padding:14px 34px; border-radius:50px;
                                  font-size:15px; font-weight:600;
                                  display:inline-block;">
                                        Verifikasi Akun
                                    </a> --}}
                                </div>

                                <!-- Expired -->
                                {{-- <p style="font-size:14px; color:#6c757d; text-align:center;">
                                    Tautan ini berlaku selama <strong>20 menit</strong>
                                </p> --}}

                                <hr style="border:none; border-top:1px solid #dee2e6; margin:30px 0;">

                                <p style="font-size:14px; color:#6c757d; line-height:1.6;">
                                    Jika tombol di atas tidak berfungsi, silakan salin dan tempel
                                    tautan berikut ke browser Anda:
                                </p>

                                <p style="font-size:13px; color:#0d6efd; word-break:break-all;">
                                    LINK
                                </p>

                                <p style="font-size:14px; color:#6c757d; margin-top:24px;">
                                    Jika Anda tidak merasa melakukan pendaftaran,
                                    abaikan email ini.
                                </p>

                                <p style="margin-bottom:0; font-size:14px;">
                                    Salam hangat,<br>
                                    <strong>Tim Support</strong>
                                </p>

                            </td>
                        </tr>

                        <!-- Footer -->
                        <tr>
                            <td align="center"
                                style="background:#f1f3f5; padding:16px;
                           font-size:12px; color:#6c757d;">
                                © 2026 Aplikasi Anda. Semua hak dilindungi.
                            </td>
                        </tr>

                    </table>

                </td>
            </tr>
            ```

        </table>

    </body>

    </html>


    {{-- <h3>Terima kasih sudah melakukan registrasi di sistem PMB</h3>
    <p>untuk mengaktifkan akun anda silahkan klik link di bawah ini</p>
    <a href="http://20.20.81.32:8000/verified-account/{{ $userid }}"> Aktifkan Akun </a> --}}

</body>

</html>
