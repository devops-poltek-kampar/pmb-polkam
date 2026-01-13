@extends('website.layout')


@section('content')
    {{-- <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <h3 class="text-center fw-bold mb-3">
                            Profil Politeknik Kampar
                        </h3>

                        <hr class="mb-4">

                        <p class="text-justify text-muted lh-lg">
                            Politeknik Kampar adalah perguruan tinggi vokasi swasta yang berada di bawah naungan
                            <strong>Yayasan Datuk Tabano</strong>.
                            Politeknik Kampar memperoleh izin operasional dari Direktorat Jenderal Pendidikan Tinggi
                            (Dirjen Dikti) melalui Surat Keputusan Nomor
                            <strong>68/D/O/2008</strong>.
                        </p>

                        <p class="text-justify text-muted lh-lg mb-0">
                            Politeknik Kampar didirikan berdasarkan kesepakatan kerja sama antara
                            <strong>Pemerintah Kabupaten Kampar</strong> dan
                            <strong>Dirjen Dikti</strong>, yang dituangkan dalam kontrak Nomor
                            <strong>0910/D2.2/2008</strong> tanggal
                            <strong>22 April 2008</strong>.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Card Utama -->
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-md-5">

                        <!-- Judul -->
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary">
                                Profil Politeknik Kampar
                            </h2>
                            <p class="text-muted mb-0">
                                Perguruan Tinggi Vokasi Berbasis Teknologi Terapan
                            </p>
                        </div>

                        <hr class="mb-4">

                        <!-- Deskripsi -->
                        <p class="text-muted lh-lg text-justify">
                            <strong>Politeknik Kampar</strong> merupakan perguruan tinggi vokasi swasta yang berada
                            di bawah naungan <strong>Yayasan Datuk Tabano</strong>.
                            Politeknik Kampar memperoleh izin operasional dari Direktorat Jenderal Pendidikan Tinggi
                            (Dirjen Dikti) melalui Surat Keputusan Nomor
                            <strong>68/D/O/2008</strong>.
                        </p>

                        <p class="text-muted lh-lg text-justify mb-5">
                            Politeknik Kampar didirikan atas kesepakatan kerja sama antara
                            <strong>Pemerintah Kabupaten Kampar</strong> dan
                            <strong>Dirjen Dikti</strong> yang dituangkan dalam kontrak
                            Nomor <strong>0910/D2.2/2008</strong> tanggal
                            <strong>22 April 2008</strong>.
                        </p>

                        <!-- Visi -->
                        <div class="bg-primary bg-opacity-10 rounded-4 p-4 mb-5">
                            <h4 class="fw-bold text-primary mb-3">
                                Visi
                            </h4>
                            <blockquote class="blockquote mb-0">
                                <p class="fst-italic text-dark">
                                    “Terwujudnya politeknik yang unggul, inovatif, dan terkemuka berbasis
                                    teknologi terapan pada tahun 2032.”
                                </p>
                            </blockquote>
                        </div>

                        <!-- Misi -->
                        <div>
                            <h4 class="fw-bold text-success mb-4">
                                Misi
                            </h4>

                            <ol class="list-group list-group-flush">
                                <li class="list-group-item d-flex gap-3">
                                    {{-- <span class="badge bg-success rounded-pill">1</span> --}}
                                    Menyelenggarakan pendidikan vokasional untuk mencetak tenaga kerja yang berkualitas
                                </li>

                                <li class="list-group-item d-flex gap-3">
                                    {{-- <span class="badge bg-success rounded-pill">2</span> --}}
                                    Mengembangkan teknologi terapan melalui penelitian untuk mendukung perkembangan
                                    industri,
                                    khususnya industri sawit
                                </li>

                                <li class="list-group-item d-flex gap-3">
                                    {{-- <span class="badge bg-success rounded-pill">3</span> --}}
                                    Berperan aktif dalam memecahkan permasalahan masyarakat melalui pengabdian kepada
                                    masyarakat
                                </li>

                                <li class="list-group-item d-flex gap-3">
                                    {{-- <span class="badge bg-success rounded-pill">4</span> --}}
                                    Menjalin kolaborasi dengan dunia usaha dan industri untuk menghadapi persaingan global
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>



    {{-- <div class="container my-3">
        <div class="row">
            <h3>PROFILE POLITEKNIK KAMPAR</h3>

            <hr>

            Politeknik Kampar adalah perguruan tinggi vokasi swasta yang berada dibawah naungan Yayasan Datuk Tabano.
            Politeknik
            Kampar mendapatkan izin operasional dari Dirjen Dikti melalui Surat Keputusan Nomor 68/D/O/2008. Politeknik
            didirikan atas kesepakatan kerjasama antara Pemerintah Kabupaten Kampar dan Dirjen Dikti yang dituangkan dalam
            kontrak Nomor 0910/D2.2/2008 tanggal 22 April 2008.

            Visi :

            "Terwujudnya politeknik yang unggul, inovatif dan terkemuka berbasis teknologi terapan pada tahun 2032"

            Misi :

            1. Menyelenggarakan pendidikan vokasional untuk mencetak tenaga kerja yang berkualitas

            2. Mengembangkan teknologi terapan melalui penelitian untuk mendukung perkembangan industri, khususnya industri
            sawit

            3. Berperan aktif memecahkan permasalahan masyarakat melalui pengabdian kepada masyarakat

            4. Menjalin kolaborasi dengan dunia usaha dan industri untuk menghadapi persaingan global

        </div>
    </div> --}}
@endsection
