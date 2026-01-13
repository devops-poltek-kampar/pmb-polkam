<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pembayaran Registrasi Ulang Terverifikasi</title>
</head>

<body style="margin:0; padding:0; background-color:#f3f6fb; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:30px 15px;">

                <!-- CONTAINER -->
                <table width="100%" cellpadding="0" cellspacing="0"
                    style="max-width:600px; background:#ffffff;
                          border-radius:14px;
                          box-shadow:0 10px 30px rgba(0,0,0,0.1);
                          overflow:hidden;">

                    <!-- HEADER -->
                    <tr>
                        <td align="center" style="background:#0d6efd; padding:30px;">
                            {{-- <div style="font-size:42px; color:#ffffff;">🎓</div> --}}
                            <h2 style="margin:10px 0 5px; color:#ffffff; font-size:22px;">
                                Registrasi Ulang Terverifikasi
                            </h2>
                            <p style="margin:0; color:#e7f1ff; font-size:14px;">
                                Konfirmasi Pembayaran
                            </p>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:30px; color:#333333;">

                            <!-- SUCCESS INFO -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#e7f1ff;
                                      border-left:5px solid #0d6efd;
                                      border-radius:8px;
                                      margin-bottom:20px;">
                                <tr>
                                    <td style="padding:15px; font-size:15px; color:#084298;">
                                        Pembayaran <strong>registrasi ulang</strong> Anda telah
                                        <strong>BERHASIL DIVERIFIKASI</strong>.
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size:15px; line-height:1.6; color:#555555;">
                                Terima kasih telah menyelesaikan proses registrasi ulang.
                                Berikut detail pembayaran Anda:
                            </p>

                            <!-- DETAIL -->
                            <table width="100%" cellpadding="6" cellspacing="0"
                                style="font-size:14px; color:#555555; margin-top:10px;">
                                <tr>
                                    <td width="40%">Nama Peserta</td>
                                    <td><strong>{{ $nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nomor Registrasi</td>
                                    <td><strong>{{ $nomorRegistrasi }}</strong></td>
                                </tr>
                                {{-- <tr>
                                    <td>Jumlah Pembayaran</td>
                                    <td><strong>Rp Jumlah</strong></td>
                                </tr> --}}
                                {{-- <tr>
                                    <td>Metode Pembayaran</td>
                                    <td><strong>{{ metode_pembayaran }}</strong></td>
                                </tr> --}}
                                <tr>
                                    <td>Tanggal Verifikasi</td>
                                    <td><strong>{{ $tanggalVerifikasi }}</strong></td>
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
                                            {{ $status }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <!-- NEXT STEP -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#f1f3f5;
                                      border-left:5px solid #6c757d;
                                      border-radius:8px;
                                      margin:25px 0;">
                                <tr>
                                    <td style="padding:15px; font-size:14px; color:#495057;">
                                        Anda telah resmi menyelesaikan tahap registrasi ulang.
                                        Silakan menunggu informasi selanjutnya melalui dashboard
                                        atau email resmi.
                                    </td>
                                </tr>
                            </table>

                            <!-- BUTTON -->
                            {{-- <div style="text-align:center; margin:30px 0;">
                                <a href="#"
                                    style="background:#0d6efd;
                                      color:#ffffff;
                                      text-decoration:none;
                                      padding:14px 34px;
                                      border-radius:30px;
                                      font-size:15px;
                                      font-weight:bold;
                                      display:inline-block;">
                                    Lihat Status Pendaftaran
                                </a>
                            </div> --}}

                            <p style="font-size:14px; color:#777777;">
                                Simpan email ini sebagai bukti bahwa pembayaran registrasi ulang
                                Anda telah diverifikasi.
                            </p>

                            <p style="font-size:14px; color:#555555;">
                                Hormat kami,<br>
                                <strong>Panitia Registrasi</strong>
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
                            © {{ date('Y') }} Sistem PMB Politeknik Kampar
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
