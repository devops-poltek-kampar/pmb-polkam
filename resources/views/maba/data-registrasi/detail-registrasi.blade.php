@extends('maba.layout')

@section('content')
    <div class="card my-3">
        <div class="card-header">
            <h3>Form Registrasi Mahasiswa Baru</h3>
        </div>
        <div class="card-body">

            @switch($registrasi->status_bayar_registrasi)
                @case('Pending')
                    <div class="alert alert-warning">
                        Pembayaran registrasi akan segera diverifikasi oleh bagian keuangan!
                        STATUS : {{ $registrasi->status_bayar_registrasi }}
                    </div>
                @break

                @case('Reject')
                    <div class="alert alert-danger">
                        Mohon masukan bukti pembayaran yang valid!
                        STATUS : {{ $registrasi->status_bayar_registrasi }}
                    </div>
                @break

                @case('Done')
                    <div class="alert alert-success">
                        Selamat pembayaran sudah diverifikasi oleh bagian keuangan, silahlam melanjutkan registrasi ke tahap
                        selanjutnya!.
                        STATUS : {{ $registrasi->status_bayar_registrasi }}
                    </div>
                @break

                @default
            @endswitch


            {{-- @switch($registrasi->status_bayar_registrasi)
                @case('Pending')
                    <div class="alert alert-warning">
                        Formuilir akan segera diverifikasi oleh bagian PMB. Mohon menunggu verifikasi
                        STATUS : {{ $registrasi->status_bayar_registrasi }}
                    </div>
                @break

                @case('Reject')
                    <div class="alert alert-danger">
                        Mohon lengkapi formulir registrasi
                        STATUS : {{ $registrasi->status_bayar_registrasi }}
                    </div>
                @break

                @case('Done')
                    <div class="alert alert-success">
                        Selamat formulir sudah diverifikasi. silahkan registrasi ke tahap selanjutnya!
                        STATUS : {{ $registrasi->status_bayar_registrasi }}
                    </div>
                @break

                @default
            @endswitch --}}

            <form>
                @csrf
                <label class="form-label mb-3">Keterangan : <span class="text-danger">*</span> Wajib Diisi!</label>

                <div class="row gy-4">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Nama Lengkap <span class="text-danger">*</span> </label>
                        <input readonly type="text" value="{{ $registrasi->nama }}" class="form-control bg-light"
                            id="input">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input readonly type="text" value="{{ $registrasi->tempat_lahir }}" class="form-control bg-light"
                            id="input-label">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-placeholder" class="form-label">Tanggal Lahir <span
                                class="text-danger">*</span></label>
                        <input readonly type="date" value="{{ $registrasi->tanggal_lahir }}"
                            class="form-control bg-light" id="input-placeholder" placeholder="Placeholder">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-text" class="form-label">Alamat Tempat Tinggal <span
                                class="text-danger">*</span></label>
                        <input readonly type="text" value="{{ $registrasi->alamat }}" class="form-control bg-light"
                            id="input-text">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-number" class="form-label">Asal Kecamatan <span
                                class="text-danger">*</span></label>
                        <input readonly type="text" value="{{ $registrasi->asal_kecamatan }}"
                            class="form-control bg-light" id="input-number">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-password" class="form-label">RT</label>
                        <input readonly type="number" value="{{ $registrasi->rt }}" class="form-control bg-light"
                            id="input-password">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-email" class="form-label">RW</label>
                        <input readonly type="number" value="{{ $registrasi->rw }}" class="form-control bg-light"
                            id="input-email">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-tel" class="form-label">Provinsi <span class="text-danger">*</span></label>
                        <input readonly type="text" value="{{ $registrasi->provinsi }}" class="form-control bg-light"
                            id="input-tel">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-date" class="form-label">Kode Pos</label>
                        <input readonly type="text" value="{{ $registrasi->kode_pos }}" class="form-control bg-light"
                            id="input-date">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-week" class="form-label">Nomor HP Orang Tua <span
                                class="text-danger">*</span></label>
                        <input readonly type="number" value="{{ $registrasi->hp_ortu }}" class="form-control bg-light"
                            id="input-week">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-month" class="form-label">Nomor HP Calon Mahasiswa <span
                                class="text-danger">*</span></label>
                        <input readonly type="number" value="{{ $registrasi->hp_mahasiswa }}"
                            class="form-control bg-light" id="input-month">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-time" class="form-label">Nomor WhatsApp Mahasiswa <span
                                class="text-danger">*</span></label>
                        <input readonly type="number" value="{{ $registrasi->no_wa }}" class="form-control bg-light"
                            id="input-time">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-datetime-local" class="form-label">Agama <span
                                class="text-danger">*</span></label>

                        <input type="text" value="{{ $registrasi->agama }}" readonly class="form-control">

                        {{-- <select disabled value="{{ $registrasi->agama }}" class="form-select bg-light" id="">
                            <option value="">Pilih</option>
                            <option value="Islam" @if ($registrasi->agama == 'Islam') selected @endif>Islam</option>
                            <option value="Kristen Katolik" @if ($registrasi->agama == 'Kristen Katolik') selected @endif>kristen
                                Katolik</option>
                            <option value="Kristen Protestan" @if ($registrasi->agama == 'Kristen Protestang') selected @endif>Kristen
                                Protestan</option>
                            <option value="Hindu" @if ($registrasi->agama == 'Hindu') selected @endif>Hindu</option>
                            <option value="Budha" @if ($registrasi->agama == 'Budha') selected @endif>Budha</option>
                        </select> --}}

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-search" class="form-label">Status Nikah <span
                                class="text-danger">*</span></label>
                        <input type="text" value="{{ $registrasi->status_nikah }}" readonly class="form-control">

                        {{-- <select disabled class="form-select bg-light" id="">
                            <option value="">Pilih</option>
                            <option value="Menikah" @if ($registrasi->status_nikah == 'Menikah') selected @endif>Menikah</option>
                            <option value="Belum Menikah" @if ($registrasi->status_nikah == 'Belum Menikah') selected @endif>Belum Menikah
                            </option>
                        </select> --}}

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-submit" class="form-label">Jenis Kelamin <span
                                class="text-danger">*</span></label>
                        <input type="text" value="{{ $registrasi->jenis_kelamin }}" readonly class="form-control">
                        {{-- <select disabled value="{{ $registrasi->jenis_kelamin }}" class="form-select bg-light"
                            id="">
                            <option value="">Pilih</option>
                            <option value="Laki-laki" @if ($registrasi->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if ($registrasi->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                        </select> --}}

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-reset" class="form-label">Asal Sekolah <span
                                class="text-danger">*</span></label>
                        <input readonly type="text" value="{{ $registrasi->asal_sekolah }}"
                            class="form-control bg-light" id="input-reset">

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-button" class="form-label">Jurusan Sekolah <span
                                class="text-danger">*</span></label>
                        <input readonly type="text" value="{{ $registrasi->jurusan }}" class="form-control bg-light"
                            id="input-button">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-button" class="form-label">Sumber informasi pendaftaran <span
                                class="text-danger">*</span></label>
                        <input type="text" value="{{ $registrasi->sumber_info_daftar }}" readonly
                            class="form-control">

                        {{-- <select disabled value="{{ $registrasi->sumber_info_daftar }}" class="form-select bg-light"
                            id="">
                            <option value="">Pilih</option>
                            <option value="Koran" @if ($registrasi->sumber_info_daftar == 'Koran') selected @endif>Koran</option>
                            <option value="Browsur" @if ($registrasi->sumber_info_daftar == 'Browsur') selected @endif>Browsur</option>
                            <option value="Spanduk" @if ($registrasi->sumber_info_daftar == 'Spanduk') selected @endif>Spanduk</option>
                            <option value="Teman/Saudara" @if ($registrasi->sumber_info_daftar == 'Teman/Saudara') selected @endif>Teman/Saudara
                            </option>
                            <option value="Sekolah" @if ($registrasi->sumber_info_daftar == 'Sekolah') selected @endif>Sekolah</option>
                            <option value="Website/Medsos" @if ($registrasi->sumber_info_daftar == 'Website/Medsos') selected @endif>
                                Website/Medsos</option>
                            <option value="Sosialisasi" @if ($registrasi->sumber_info_daftar == 'Sosialisasi') selected @endif>Sosialisasi
                            </option>
                            <option value="Lainnya" @if ($registrasi->sumber_info_daftar == 'Lainnya') selected @endif>Lainnya</option>
                        </select> --}}
                    </div>

                    <div id="container-sumber-info">

                        @if ($registrasi->sumber_info != null)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-button" class="form-label">Sumber Informasi <span
                                        class="text-danger">*</span></label>
                                <input readonly type="text" value="{{ $registrasi->sumber_info }}"
                                    class="form-control bg-light" id="input-button">
                            </div>
                        @endif

                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-file" class="form-label">Apakah saudara keberatan bila biodata ini diberikan
                            pada
                            institusi pendidikan lain <span class="text-danger">*</span> : </label>
                        <div class="form-check d-flex">
                            <label for="yes" class="mb-3 px-0 text-muted">Ya</label>
                            <input readonly id="yes" @checked($registrasi->pernyataan_serah_data == 'Ya') class="form-check-input ms-2 me-2"
                                type="radio">

                            <label for="no" class="mb-3 px-0 text-muted">Tidak</label>
                            <input id="no" @checked($registrasi->pernyataan_serah_data == 'Tidak') class="form-check-input ms-2"
                                name="pernyataan_serah_data" type="radio">

                        </div>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label class="prodi-pilihan-1">Prodi Pilihan 1 <span class="text-danger">*</span></label>

                        <input type="text" readonly class="form-control" value="{{ $registrasi->prodi_1->nama }}">

                        {{-- <select disabled name="prodi_pilihan_1" id="prodi-pilihan-1"
                            value="{{ $registrasi->prodi_pilihan_1 }}" class="form-select bg-light">
                            <option value="">Pilih</option>
                            <option value="Teknik Pengolahan Sawit" @if ($registrasi->prodi_pilihan_1 == 'Teknik Pengolahan Sawit') selected @endif>
                                Teknik Pengolahan Sawit</option>
                            <option value="Perawatan dan Perbaikan Mesin"
                                @if ($registrasi->prodi_pilihan_1 == 'Perawatan dan Perbaikan Mesin') selected @endif>Perawatan dan Perbaikan Mesin</option>
                            <option value="Teknik Informatika" @if ($registrasi->prodi_pilihan_1 == 'Teknik Informatika') selected @endif>Teknik
                                Informatika</option>
                            <option value="Teknik Pengolahan Kelapa Sawit"
                                @if ($registrasi->prodi_pilihan_1 == 'Teknik Pengolahan Kelapa Sawit') selected @endif>Teknik Pengolahan Kelapa Sawit</option>
                            <option value="Teknologi Rekayasa Logistik"
                                @if ($registrasi->prodi_pilihan_1 == 'Teknologi Rekayasa Logistik') selected @endif>Teknologi Rekayasa Logistik</option>
                            <option value="Pengelolaan Perkebunan" @if ($registrasi->prodi_pilihan_1 == 'Pengelolaan Perkebunan"') selected @endif>
                                Pengelolaan Perkebunan</option>
                            <option value="Manajemen Agribisnis" @if ($registrasi->prodi_pilihan_1 == 'Manajemen Agribisnis') selected @endif>
                                Manajemen Agribisnis</option>
                        </select> --}}
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="prodi-pilihan-2" class="form-label">Prodi Pilihan 2 <span
                                class="text-danger">*</span></label>
                        <input type="text" readonly class="form-control" value="{{ $registrasi->prodi_2->nama }}">

                        {{-- <select disabled name="prodi_pilihan_2" id="prodi-pilihan-2"
                            value="{{ $registrasi->prodi_pilihan_2 }}" class="form-select bg-light">
                            <option value="">Pilih</option>
                            <option value="Teknik Pengolahan Sawit" @if ($registrasi->prodi_pilihan_2 == 'Teknik Pengolahan Sawit') selected @endif>
                                Teknik Pengolahan Sawit</option>
                            <option value="Perawatan dan Perbaikan Mesin"
                                @if ($registrasi->prodi_pilihan_2 == 'Perawatan dan Perbaikan Mesin') selected @endif>Perawatan dan Perbaikan Mesin</option>
                            <option value="Teknik Informatika" @if ($registrasi->prodi_pilihan_2 == 'Teknik Informatika') selected @endif>Teknik
                                Informatika</option>
                            <option value="Teknik Pengolahan Kelapa Sawit"
                                @if ($registrasi->prodi_pilihan_2 == 'Teknik Pengolahan Kelapa Sawit') selected @endif>Teknik Pengolahan Kelapa Sawit</option>
                            <option value="Teknologi Rekayasa Logistik"
                                @if ($registrasi->prodi_pilihan_2 == 'Teknologi Rekayasa Logistik') selected @endif>Teknologi Rekayasa Logistik</option>
                            <option value="Pengelolaan Perkebunan" @if ($registrasi->prodi_pilihan_2 == 'Pengelolaan Perkebunan"') selected @endif>
                                Pengelolaan Perkebunan</option>
                            <option value="Manajemen Agribisnis" @if ($registrasi->prodi_pilihan_2 == 'Manajemen Agribisnis') selected @endif>
                                Manajemen Agribisnis</option>
                        </select> --}}

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-readonlytext" class="form-label">Jalur Masuk <span
                                class="text-danger">*</span></label>
                        <input type="text" readonly class="form-control"
                            value="{{ $registrasi->jalur_masuk->jalur->nama }}">
                        {{-- <select disabled name="jalur_masuk" id="" value="{{ $registrasi->jalur_masuk }}"
                            class="form-select bg-light">
                            <option value="">Pilih</option>
                            <option value="Reguler" @if ($registrasi->jalur_masuk == 'Reguler') selected @endif>Reguler</option>
                            <option value="Prestasi Akademik" @if ($registrasi->jalur_masuk == 'Prestasi Akademik') selected @endif>Prestasi
                                Akademik</option>
                            <option value="Prestasi Non Akademik" @if ($registrasi->jalur_masuk == 'Prestasi Non Akademik') selected @endif>
                                Prestasi Non Akademik</option>
                            <option value="RPL (Rekognisi Pembalajaran Lampau)"
                                @if ($registrasi->jalur_masuk == 'RPL (Rekognisi Pembalajaran Lampau)') selected @endif>RPL (Rekognisi Pembalajaran Lampau)
                            </option>
                        </select> --}}

                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-readonlytext" class="form-label">Gelombang <span
                                class="text-danger">*</span></label>
                        <input type="text" readonly class="form-control"
                            value="{{ $registrasi->jalur_masuk->gelombang->nama }}">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-readonlytext" class="form-label">Tahun <span
                                class="text-danger">*</span></label>
                        <input type="text" readonly class="form-control"
                            value="{{ $registrasi->jalur_masuk->gelombang->tahun }}">
                    </div>

                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="pembiayaan" class="form-label">Pembiayaan <span class="text-danger">*</span></label>
                        <select disabled name="pembiayaan" id="pembiayaan" value="{{ $registrasi->pembiayaan }}"
                            class="form-select bg-light">
                            <option value="">Pilih</option>
                            <option value="Mandiri (Bayar Sendiri)" @if ($registrasi->pembiayaan == 'Mandiri (Bayar Sendiri)') selected @endif>
                                Mandiri (Bayar Sendiri)</option>
                            <option value="BPDP-KS" @if ($registrasi->pembiayaan == 'BPDP-KS') selected @endif>BPDP-KS</option>
                            <option value="KIP Kuliah" @if ($registrasi->pembiayaan == 'KIP Kuliah') selected @endif>KIP Kuliah
                            </option>
                        </select>

                    </div> --}}

                </div>

                <div class="row gy-4 my-3">

                    @foreach ($registrasi->lampiran as $file)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            {{-- <label for="readonly-readonlytext" class="form-label">Pas Foto 3x4 cm<span
                                    class="text-danger">*</span></label> --}}
                            <img src="{{ asset('/storage') }}/{{ $file->path }}" class="w-100" alt="">
                            {{-- <iframe src="{{ asset('storage/') }}/{{ $file->path }}" frameborder="0"></iframe> --}}
                            {{-- <input readonly type="file" id="pas-foto" value="{{ asset($file->path) }}"
                                class="form-control" name="pas_foto"> --}}
                            {{-- <img width="250" height="250" src="" id="preview-pas-foto" alt=""
                                accept="image/*"> --}}
                        </div>
                    @endforeach
                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="readonly-readonlytext" class="form-label">Pas Foto 3x4 cm<span
                                class="text-danger">*</span></label>

                        <input readonly type="file" id="pas-foto" value="{{asset($registrasi->)}}" class="form-control"
                            name="pas_foto">

                        <img width="250" height="250" src="" id="preview-pas-foto" alt=""
                            accept="image/*">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="readonly-readonlytext" class="form-label">KTP</label>
                        <input type="file" value="{{ old('ktp') }}" class="form-control" name="ktp">
                        <img src="" alt="">
                    </div> --}}
                </div>

                <div class="d-flex mt-3">
                    <input type="checkbox" @checked($registrasi->pernyataan_data_valid == 'Ya') id="pernyataan" class="me-2">
                    <label for="pernyataan">
                        <strong>
                            <p class="">Formulir ini saya isi dengan sebenarnya dan apabila terdapat kekeliruan yang
                                disengaja saya akan menerima
                                akibatnya untuk dikeluarkan dari Politeknik Kampar <span class="text-danger">*</span></p>
                        </strong>

                    </label>
                </div>

            </form>
        </div>
    </div>
@endsection
