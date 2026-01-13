<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pembayaran Registrasi Terverifikasi</title>
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

                        @if ($status == 'Accept')
                            <td align="center"
                                style="background:linear-gradient(135deg,#198754,#51cf66);
                                    padding:30px;">
                                <div style="font-size:46px;">💳</div>
                                <h1 style="margin:10px 0 5px; color:#ffffff; font-size:24px;">
                                    Pembayaran Terverifikasi
                                </h1>
                                <p style="margin:0; color:#e6fcf5; font-size:14px;">
                                    Status Pembayaran Registrasi
                                </p>
                            </td>
                        @else
                            <td align="center"
                                style="background:linear-gradient(135deg,#871919,#cf5151);
                                    padding:30px;">
                                <div style="font-size:46px;">💳</div>
                                <h1 style="margin:10px 0 5px; color:#ffffff; font-size:24px;">
                                    Pembayaran Terverifikasi
                                </h1>
                                <p style="margin:0; color:#e6fcf5; font-size:14px;">
                                    Status Pembayaran Registrasi
                                </p>
                            </td>
                        @endif

                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:30px; color:#333333;">

                            <!-- ALERT SUCCESS -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#e6fcf5;
                                            border-left:6px solid #198754;
                                            border-radius:10px;
                                            margin-bottom:20px;">
                                <tr>
                                    <td style="padding:15px; font-size:15px; color:#0f5132;">
                                        Pembayaran registrasi Anda telah
                                        <strong>BERHASIL DIVERIFIKASI</strong>.
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size:15px; line-height:1.6; color:#555555;">
                                Terima kasih atas pembayaran yang telah Anda lakukan.
                                Berikut detail pembayaran Anda:
                            </p>

                            <!-- DATA PEMBAYARAN -->
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
                                    <td>Metode Pembayaran</td>
                                    <td><strong>Metode</strong></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Pembayaran</td>
                                    <td><strong>Rp 1334434</strong></td>
                                </tr>  --}}
                                <tr>
                                    <td>Tanggal Verifikasi</td>
                                    <td><strong>{{ $tanggalVerifikasi }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>

                                        @if ($status == 'Accept')
                                            <span
                                                style="background:#198754; color:#ffffff;
                                                        padding:6px 14px;
                                                        border-radius:20px;
                                                        font-size:13px;
                                                        font-weight:bold;">
                                                {{ $status }}
                                            </span>
                                        @else
                                            <span
                                                style="background:#871d19; color:#ffffff;
                                                        padding:6px 14px;
                                                        border-radius:20px;
                                                        font-size:13px;
                                                        font-weight:bold;">
                                                {{ $status }}
                                            </span>
                                        @endif

                                    </td>
                                </tr>
                            </table>

                            <!-- INFO LANJUTAN -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="background:#f1f3f5;
                                            border-left:6px solid #6c757d;
                                            border-radius:10px;
                                            margin:25px 0;">
                                <tr>
                                    <td style="padding:15px; font-size:14px; color:#495057;">
                                        Anda telah resmi terdaftar.
                                        Silakan menunggu informasi tahap seleksi selanjutnya.
                                    </td>
                                </tr>
                            </table>

                            <!-- BUTTON -->
                            <div style="text-align:center; margin:30px 0;">
                                <a href="#"
                                    style="background:#198754;
                                            color:#ffffff;
                                            text-decoration:none;
                                            padding:14px 36px;
                                            border-radius:30px;
                                            font-size:15px;
                                            font-weight:bold;
                                            display:inline-block;">
                                    Lihat Status Pendaftaran
                                </a>
                            </div>

                            <p style="font-size:14px; color:#777777;">
                                Jika Anda merasa tidak melakukan pembayaran,
                                silakan segera hubungi panitia.
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
