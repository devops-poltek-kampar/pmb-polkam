@extends('pmb.layout')

@section('content')
    <div class="card my-3">
        <div class="card-header">
            <h3>Form Registrasi Mahasiswa Baru</h3>
        </div>
        <div class="card-body">

            @if (session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
            @endif


            @switch($registrasi->status_bayar_registrasi)
                @case('Pending')
                    <div class="alert alert-warning">
                        Pembayaran registrasi akan segera diverifikasi oleh bagian keuangan!
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
                        Selamat pembayaran sudah diverifikasi oleh bagian keuangan, silahlam melanjutkan registrasi ke tahap
                        selanjutnya!.
                        STATUS : {{ $registrasi->status_bayar_registrasi }}
                    </div>
                @break

                @default
            @endswitch

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
                        <select disabled value="{{ $registrasi->agama }}" class="form-select bg-light" id="">
                            <option value="">Pilih</option>
                            <option value="Islam" @selected($registrasi->agama == 'Islam')>Islam</option>
                            <option value="Kristen Katolik" @if ($registrasi->agama == 'Kristen Katolik') selected @endif>kristen
                                Katolik</option>
                            <option value="Kristen Protestan" @if ($registrasi->agama == 'Kristen Protestang') selected @endif>Kristen
                                Protestan</option>
                            <option value="Hindu" @if ($registrasi->agama == 'Hindu') selected @endif>Hindu</option>
                            <option value="Budha" @if ($registrasi->agama == 'Budha') selected @endif>Budha</option>
                        </select>

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-search" class="form-label">Status Nikah <span
                                class="text-danger">*</span></label>
                        <select disabled class="form-select bg-light" id="">
                            <option value="">Pilih</option>
                            <option value="Menikah" @if ($registrasi->status_nikah == 'Menikah') selected @endif>Menikah</option>
                            <option value="Belum Menikah" @if ($registrasi->status_nikah == 'Belum Menikah') selected @endif>Belum Menikah
                            </option>
                        </select>

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-submit" class="form-label">Jenis Kelamin <span
                                class="text-danger">*</span></label>
                        <select disabled value="{{ $registrasi->jenis_kelamin }}" class="form-select bg-light"
                            id="">
                            <option value="">Pilih</option>
                            <option value="Laki-laki" @selected($registrasi->jenis_kelamin == 'Laki-laki')>Laki-laki</option>
                            <option value="Perempuan" @selected($registrasi->jenis_kelamin == 'Perempuan')>Perempuan</option>
                        </select>

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-reset" class="form-label">Asal Sekolah <span
                                class="text-danger">*</span></label>
                        <input readonly type="text" value="{{ $registrasi->asal_sekolah }}"
                            class="form-control bg-light" id="input-reset" />

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-button" class="form-label">Jurusan <span class="text-danger">*</span></label>
                        <input readonly type="text" value="{{ $registrasi->jurusan }}" class="form-control bg-light"
                            id="input-button">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-button" class="form-label">Sumber informasi pendaftaran <span
                                class="text-danger">*</span></label>
                        <select disabled value="{{ $registrasi->sumber_info_daftar }}" class="form-select bg-light"
                            id="">
                            <option value="">Pilih</option>
                            <option value="Koran" @selected($registrasi->sumber_info_daftar == 'Koran')>Koran</option>
                            <option value="Browsur" @selected($registrasi->sumber_info_daftar == 'Browsur')>Browsur</option>
                            <option value="Spanduk" @selected($registrasi->sumber_info_daftar == 'Spanduk')>Spanduk</option>
                            <option value="Teman/Saudara" @selected($registrasi->sumber_info_daftar == 'Teman/Saudara')>Teman/Saudara</option>
                            <option value="Sekolah" @selected($registrasi->sumber_info_daftar == 'Sekolah')>Sekolah</option>
                            <option value="Website/Medsos" @selected($registrasi->sumber_info_daftar == 'Website/Medsos')>Website/Medsos</option>
                            <option value="Sosialisasi" @selected($registrasi->sumber_info_daftar == 'Sosialisasi')>Sosialisasi</option>
                            <option value="Lainnya" @selected($registrasi->sumber_info_daftar == 'Lainnya')>Lainnya</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-file" class="form-label">Apakah saudara keberatan bila biodata ini diberikan
                            pada
                            institusi pendidikan lain <span class="text-danger">*</span> : </label>
                        <div class="form-check d-flex">
                            <label for="yes" class="mb-3 px-0 text-muted">Ya</label>
                            <input readonly id="yes" @checked($registrasi->pernyataan_serah_data == 'Ya')
                                class="form-check-input ms-2 me-2" type="radio">

                            <label for="no" class="mb-3 px-0 text-muted">Tidak</label>
                            <input id="no" class="form-check-input ms-2" @checked($registrasi->pernyataan_serah_data == 'Tidak')
                                type="radio">

                        </div>

                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label class="prodi-pilihan-1">Prodi Pilihan 1 <span class="text-danger">*</span></label>
                        <select disabled id="prodi-pilihan-1" value="{{ $registrasi->prodi_pilihan_1 }}"
                            class="form-select bg-light">
                            <option value="">Pilih</option>
                            <option value="Teknik Pengolahan Sawit" @if ($registrasi->prodi_pilihan_1 == 'TPS01') selected @endif>
                                Teknik Pengolahan Sawit</option>
                            <option value="Perawatan dan Perbaikan Mesin"
                                @if ($registrasi->prodi_pilihan_1 == 'PPM01') selected @endif>Perawatan dan Perbaikan Mesin</option>
                            <option value="Teknik Informatika" @if ($registrasi->prodi_pilihan_1 == 'TIF01') selected @endif>Teknik
                                Informatika</option>
                            <option value="Administrasi Bisnis Internasional"
                                @if ($registrasi->prodi_pilihan_1 == 'ABI01') selected @endif>
                                Administrasi Bisnis Internasional</option>
                            <option value="Teknik Pengolahan Kelapa Sawit"
                                @if ($registrasi->prodi_pilihan_1 == 'TPKS01') selected @endif>Teknik Pengolahan Kelapa Sawit</option>
                            <option value="Teknologi Rekayasa Logistik"
                                @if ($registrasi->prodi_pilihan_1 == 'TRL01') selected @endif>Teknologi Rekayasa Logistik</option>
                            <option value="Pengelolaan Perkebunan" @if ($registrasi->prodi_pilihan_1 == 'PP01') selected @endif>
                                Pengelolaan Perkebunan</option>
                            <option value="Manajemen Agribisnis" @if ($registrasi->prodi_pilihan_1 == 'MAB01') selected @endif>
                                Manajemen Agribisnis</option>
                        </select>

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="prodi-pilihan-2" class="form-label">Prodi Pilihan 2 <span
                                class="text-danger">*</span></label>
                        <select disabled id="prodi-pilihan-2" value="{{ $registrasi->prodi_pilihan_2 }}"
                            class="form-select bg-light">
                            <option value="">Pilih</option>
                            <option value="Teknik Pengolahan Sawit" @if ($registrasi->prodi_pilihan_2 == 'TPS01') selected @endif>
                                Teknik Pengolahan Sawit</option>
                            <option value="Perawatan dan Perbaikan Mesin"
                                @if ($registrasi->prodi_pilihan_2 == 'PPM01') selected @endif>Perawatan dan Perbaikan Mesin</option>
                            <option value="Teknik Informatika" @if ($registrasi->prodi_pilihan_2 == 'TIF01') selected @endif>Teknik
                                Informatika</option>
                            <option value="Administrasi Bisnis Internasional"
                                @if ($registrasi->prodi_pilihan_1 == 'ABI01') selected @endif>
                                Administrasi Bisnis Internasional</option>
                            <option value="Teknik Pengolahan Kelapa Sawit"
                                @if ($registrasi->prodi_pilihan_2 == 'TPKS01') selected @endif>Teknik Pengolahan Kelapa Sawit</option>
                            <option value="Teknologi Rekayasa Logistik"
                                @if ($registrasi->prodi_pilihan_2 == 'TRL01') selected @endif>Teknologi Rekayasa Logistik</option>
                            <option value="Pengelolaan Perkebunan" @if ($registrasi->prodi_pilihan_2 == 'PP01') selected @endif>
                                Pengelolaan Perkebunan</option>
                            <option value="Manajemen Agribisnis" @if ($registrasi->prodi_pilihan_2 == 'MAB01') selected @endif>
                                Manajemen Agribisnis</option>
                        </select>

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-readonlytext" class="form-label">Jalur Masuk <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" readonly
                            value="{{ $registrasi->jalur_masuk->jalur->nama }}">

                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-readonlytext" class="form-label">Gelombang <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" readonly
                            value="{{ $registrasi->jalur_masuk->gelombang->nama }}">

                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-readonlytext" class="form-label">Tahun <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" readonly
                            value="{{ $registrasi->jalur_masuk->gelombang->tahun }}">

                    </div>

                </div>

                <div class="row gy-4 my-3">

                    @foreach ($registrasi->lampiran as $file)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <img class="w-100" src="{{ asset('/storage') }}/{{ $file->path }}" alt="">
                            {{-- <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal"
                                data-bs-target="#modal-file{{ $file->id }}">{{ str_replace('_', ' ', $file->kategori) }}</button>

                            <div class="modal fade" id="modal-file{{ $file->id }}" tabindex="-1"
                                aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalFullscreenLabel">Full
                                                screen modal</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('/storage') }}/{{ $file->path }}" alt="">
                                            <iframe class="w-100 h-100"
                                                src="{{ asset('/storage') }}/{{ $file->path }}"
                                                frameborder="0"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    @endforeach

                </div>
                <div class="d-flex mt-3">
                    <input readonly @checked($registrasi->pernyataan_data_valid == 'Ya') type="checkbox" name="pernyataan" id="pernyataan"
                        class="form-check-input me-2">
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

        <div class="card-footer">
            <a class="btn btn-sm btn-success"
                href="{{ url('/pmb/calon-mahassiwa/acc-formulir') }}/{{ $registrasi->nomor_registrasi }}">Accept</a>

        </div>
    </div>
@endsection
