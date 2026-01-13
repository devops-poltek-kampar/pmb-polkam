<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengumuman Lulus Wawancara</title>
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
                            style="background:linear-gradient(135deg,#198754,#20c997);
                               padding:30px;">
                            <div style="font-size:46px;">🏆</div>
                            <h1 style="margin:10px 0 5px; color:#ffffff; font-size:24px;">
                                Pengumuman Kelulusan
                            </h1>
                            <p style="margin:0; color:#eafff4; font-size:14px;">
                                Tahap Wawancara
                            </p>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:30px; color:#333333;">

                            <!-- ALERT SUCCESS -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#e7f5ee;
                                      border-left:6px solid #198754;
                                      border-radius:10px;
                                      margin-bottom:20px;">
                                <tr>
                                    <td style="padding:15px; font-size:15px; color:#146c43;">
                                        Selamat! Anda dinyatakan
                                        <strong>LULUS</strong> pada tahap wawancara.
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size:15px; line-height:1.6; color:#555555;">
                                Berdasarkan hasil penilaian tim pewawancara, berikut adalah
                                informasi hasil wawancara Anda:
                            </p>

                            <!-- DATA PESERTA -->
                            <table width="100%" cellpadding="6" cellspacing="0"
                                style="font-size:14px; color:#555555; margin-top:10px;">
                                <tr>
                                    <td width="40%">Nama Peserta</td>
                                    <td><strong>{{ $wawancara->registrasi->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nomor Registrasi</td>
                                    <td><strong>{{ $wawancara->nomor_registrasi }}</strong></td>
                                </tr>
                                {{-- <tr>
                                    <td>Tanggal Wawancara</td>
                                    <td><strong> </strong></td>
                                </tr> --}}
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <span
                                            style="background:#198754; color:#ffffff;
                                                 padding:6px 14px;
                                                 border-radius:20px;
                                                 font-size:13px;
                                                 font-weight:bold;">
                                            {{ $wawancara->status }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <!-- INFO -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#eefbf6;
                                      border-left:6px solid #20c997;
                                      border-radius:10px;
                                      margin:25px 0;">
                                <tr>
                                    <td style="padding:15px; font-size:14px; color:#0f5132;">
                                        Silakan melanjutkan ke tahapan berikutnya di sistem PMB Politeknik Kampar
                                    </td>
                                </tr>
                            </table>

                            <!-- BUTTON -->
                            {{-- <div style="text-align:center; margin:30px 0;">
                                <a href="#"
                                    style="background:#198754;
                                      color:#ffffff;
                                      text-decoration:none;
                                      padding:14px 34px;
                                      border-radius:30px;
                                      font-size:15px;
                                      font-weight:bold;
                                      display:inline-block;">
                                    Lanjut ke Tahap Berikutnya
                                </a>
                            </div> --}}

                            <p style="font-size:14px; color:#777777;">
                                Jika Anda memiliki pertanyaan, silakan hubungi panitia
                                melalui kontak resmi.
                            </p>

                            <p style="font-size:14px; color:#555555;">
                                Hormat kami,<br>
                                <strong>Tim PMB Politeknik Kampar</strong>
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
                            © {{ date('Y') }} Sistem Seleksi
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
