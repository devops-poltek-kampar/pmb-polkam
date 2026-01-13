<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Formulir Registrasi Terverifikasi</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6f9; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:30px 15px;">

                <!-- CARD -->
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="max-width:600px; background:#ffffff;
                          border-radius:16px;
                          box-shadow:0 12px 30px rgba(0,0,0,0.1);
                          overflow:hidden;">

                    <!-- HEADER -->
                    <tr>
                        <td align="center"
                            style="background:linear-gradient(135deg,#0d6efd,#4dabf7);
                               padding:30px;">
                            <div style="font-size:46px;">✅</div>
                            <h1 style="margin:10px 0 5px; color:#ffffff; font-size:24px;">
                                Registrasi Terverifikasi
                            </h1>
                            <p style="margin:0; color:#e7f1ff; font-size:14px;">
                                Status Formulir Pendaftaran
                            </p>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:30px; color:#333333;">

                            <!-- ALERT -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#e7f1ff;
                                      border-left:6px solid #0d6efd;
                                      border-radius:10px;
                                      margin-bottom:20px;">
                                <tr>
                                    <td style="padding:15px; font-size:15px; color:#084298;">
                                        Formulir registrasi Anda telah
                                        <strong>BERHASIL DIVERIFIKASI</strong>.
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size:15px; line-height:1.6; color:#555555;">
                                Terima kasih telah melengkapi data registrasi.
                                Berikut adalah ringkasan informasi pendaftaran Anda:
                            </p>

                            <!-- DATA -->
                            <table width="100%" cellpadding="6" cellspacing="0"
                                style="font-size:14px; color:#555555; margin-top:10px;">
                                <tr>
                                    <td width="40%">Nama Lengkap</td>
                                    <td><strong>{{ $registrasi->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nomor Registrasi</td>
                                    <td><strong>{{ $registrasi->nomor_registrasi }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Verifikasi</td>
                                    <td><strong>{{ now() }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <span
                                            style="background:#0d6efd; color:#ffffff;
                                                 padding:6px 14px;
                                                 border-radius:20px;
                                                 font-size:13px;
                                                 font-weight:bold;">
                                            TERVERIFIKASI
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <!-- INFO -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#f1f3f5;
                                      border-left:6px solid #6c757d;
                                      border-radius:10px;
                                      margin:25px 0;">
                                <tr>
                                    <td style="padding:15px; font-size:14px; color:#495057;">
                                        Silakan menunggu informasi selanjutnya atau
                                        melanjutkan ke tahap berikutnya sesuai ketentuan.
                                    </td>
                                </tr>
                            </table>

                            <!-- BUTTON -->
                            <div style="text-align:center; margin:30px 0;">
                                <a href="{{ url('/login') }}"
                                    style="background:#0d6efd;
                                      color:#ffffff;
                                      text-decoration:none;
                                      padding:14px 34px;
                                      border-radius:30px;
                                      font-size:15px;
                                      font-weight:bold;
                                      display:inline-block;">
                                    Masuk ke Dashboard
                                </a>
                            </div>

                            <p style="font-size:14px; color:#777777;">
                                Jika Anda tidak merasa melakukan pendaftaran,
                                silakan abaikan email ini.
                            </p>

                            <p style="font-size:14px; color:#555555;">
                                Hormat kami,<br>
                                <strong>Panitia Pendaftaran</strong>
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td align="center"
                            style="background:#f1f3f5;
                               padding:15px;
                               font-size:12px;
                               color:#6c757d;">
                            © {{ date('Y') }} Sistem Pendaftaran
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
