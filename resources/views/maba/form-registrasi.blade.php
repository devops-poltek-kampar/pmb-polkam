@extends('maba.layout')

@section('content')
    <div class="card my-3">
        <div class="card-header">
            <h3>Form Registrasi Mahasiswa Baru</h3>
        </div>
        <div class="card-body">

            <form action="{{ url('/user/save-registrasi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label mb-3">Keterangan : <span class="text-danger">*</span> Wajib Diisi!</label>

                <input type="hidden" name="pmb_jalur_masuk_id" value="{{ $dataJalur->id }}">

                <div class="row gy-4">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        {{-- <select id="negara" class="form-select" style="width: 100%;">
                            <option value="">Pilih Negara</option>
                            <option>Indonesia</option>
                            <option>Malaysia</option>
                            <option>Singapura</option>
                            <option>Thailand</option>
                            <option>Vietnam</option>
                            <option>Filipina</option>
                            <option>Brunei Darussalam</option>
                            <option>Kamboja</option>
                            <option>Laos</option>
                            <option>Myanmar</option>
                        </select> --}}
                        <label for="input-label" class="form-label">Nama Lengkap <span class="text-danger">*</span> </label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="form-control bg-light @error('nama')
                            is-invalid
                        @enderror"
                            id="input">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-label" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="form-control bg-light @error('tempat_lahir')
                            is-invalid
                        @enderror"
                            id="input-label">
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-placeholder" class="form-label">Tanggal Lahir <span
                                class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="form-control bg-light @error('tanggal_lahir')
                            is-invalid
                        @enderror"
                            id="input-placeholder" placeholder="Placeholder">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-text" class="form-label">Alamat Tempat Tinggal <span
                                class="text-danger">*</span></label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}"
                            class="form-control bg-light @error('alamat')
                            is-invalid
                        @enderror"
                            id="input-text">
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-number" class="form-label">Asal Kecamatan <span
                                class="text-danger">*</span></label>
                        <input type="text" name="asal_kecamatan" value="{{ old('asal_kecamatan') }}"
                            class="form-control bg-light @error('asal_kecamatan')
                            is-invalid
                        @enderror"
                            id="input-number">

                        @error('asal_kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-password" class="form-label">RT</label>
                        <input type="number" name="rt" value="{{ old('rt') }}"
                            class="form-control bg-light @error('rt')
                            is-invalid
                        @enderror"
                            id="input-password">
                        @error('rt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-email" class="form-label">RW</label>
                        <input type="number" name="rw" value="{{ old('rw') }}"
                            class="form-control bg-light @error('rw')
                            is-invalid
                        @enderror"
                            id="input-email">
                        @error('rw')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-tel" class="form-label">Provinsi <span class="text-danger">*</span></label>
                        <input type="text" name="provinsi" value="{{ old('provinsi') }}"
                            class="form-control bg-light @error('provinsi')
                            is-invalid
                        @enderror"
                            id="input-tel">
                        @error('provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-date" class="form-label">Kode Pos</label>
                        <input type="number" name="kode_pos" value="{{ old('kode_pos') }}"
                            class="form-control bg-light @error('kode_pos')
                            is-invalid
                        @enderror"
                            id="input-date">
                        @error('kode_pos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-week" class="form-label">Nomor HP Orang Tua <span
                                class="text-danger">*</span></label>
                        <input type="number" name="hp_ortu" value="{{ old('hp_ortu') }}"
                            class="form-control bg-light @error('hp_ortu')
                            is-invalid
                        @enderror"
                            id="input-week">
                        @error('hp_ortu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-month" class="form-label">Nomor HP Calon Mahasiswa <span
                                class="text-danger">*</span></label>
                        <input type="number" name="hp_mahasiswa" value="{{ old('hp_mahasiswa') }}"
                            class="form-control bg-light @error('hp_mahasiswa')
                            is-invalid
                        @enderror"
                            id="input-month">
                        @error('hp_mahasiswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-time" class="form-label">Nomor WhatsApp Mahasiswa <span
                                class="text-danger">*</span></label>
                        <input type="number" name="no_wa" value="{{ old('no_wa') }}"
                            class="form-control bg-light @error('no_wa')
                            is-invalid
                        @enderror"
                            id="input-time">
                        @error('no_wa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-datetime-local" class="form-label">Agama <span
                                class="text-danger">*</span></label>
                        <select name="agama" value="{{ old('agama') }}"
                            class="form-select bg-light @error('agama')
                            is-invalid
                        @enderror"
                            id="">
                            <option value="">Pilih</option>
                            <option value="Islam" @if (old('agama') == 'Islam') selected @endif>Islam</option>
                            <option value="Kristen Katolik" @if (old('agama') == 'Kristen Katolik') selected @endif>kristen
                                Katolik</option>
                            <option value="Kristen Protestan" @if (old('agama') == 'Kristen Protestang') selected @endif>Kristen
                                Protestan</option>
                            <option value="Hindu" @if (old('agama') == 'Hindu') selected @endif>Hindu</option>
                            <option value="Budha" @if (old('agama') == 'Budha') selected @endif>Budha</option>
                        </select>
                        @error('agama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-search" class="form-label">Status Nikah <span
                                class="text-danger">*</span></label>
                        <select name="status_nikah"
                            class="form-select bg-light @error('status_nikah')
                            is-invalid
                        @enderror"
                            id="">
                            <option value="">Pilih</option>
                            <option value="Belum Menikah" @if (old('status_nikah') == 'Belum Menikah') selected @endif>Belum Menikah

                            <option value="Menikah" @if (old('status_nikah') == 'Menikah') selected @endif>Menikah</option>
                            </option>
                        </select>
                        @error('status_nikah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-submit" class="form-label">Jenis Kelamin <span
                                class="text-danger">*</span></label>

                        <select name="jenis_kelamin" value="{{ old('jenis_kelamin') }}"
                            class="form-select bg-light @error('jenis_kelamin')
                            is-invalid
                        @enderror"
                            id="">
                            <option>Pilih</option>
                            <option value="Laki-laki" @if (old('jenis_kelamin') == 'Laki-laki') selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-reset" class="form-label">Asal Sekolah <span
                                class="text-danger">*</span></label>
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                            class="form-control bg-light @error('asal_sekolah')
                            is-invalid
                        @enderror"
                            id="input-reset">
                        @error('asal_sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-button" class="form-label">Jurusan Sekolah <span
                                class="text-danger">*</span></label>
                        <input type="text" name="jurusan" value="{{ old('jurusan') }}"
                            class="form-control bg-light @error('jurusan')
                            is-invalid
                        @enderror"
                            id="input-button">
                        @error('jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-button" class="form-label">Sumber informasi pendaftaran <span
                                class="text-danger">*</span></label>
                        <select onchange="onSumberInfoChange(event)" name="sumber_info_daftar"
                            value="{{ old('sumber_info_daftar') }}"
                            class="form-select bg-light @error('sumber_info_daftar')
                            is-invalid
                        @enderror"
                            id="">
                            <option value="">Pilih</option>
                            <option value="Koran" @selected(old('sumber_info_daftar') == 'Koran')>Koran</option>
                            <option value="Browsur" @selected(old('sumber_info_daftar') == 'Browsur')>Browsur</option>
                            <option value="Spanduk" @selected(old('sumber_info_daftar') == 'Spanduk')>Spanduk</option>
                            <option value="Teman/Saudara" @selected(old('sumber_info_daftar') == 'Teman/Saudara')>Teman/Saudara</option>
                            <option value="Sekolah" @selected(old('sumber_info_daftar') == 'Sekolah')>Sekolah</option>
                            <option value="Website/Medsos"@selected(old('sumber_info_daftar') == 'Website/Medsos')>Website/Medsos</option>
                            <option value="Sosialisasi" @selected(old('sumber_info_daftar') == 'Sosialisasi')>Sosialisasi
                            </option>
                            <option value="Lainnya" @selected(old('sumber_info_daftar') == 'Lainnya')>Lainnya</option>
                        </select>
                        @error('sumber_info_daftar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div id="container-sumber-info">

                        @error('sumber_info')
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-month" class="form-label">Masukan Nama Informasi <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="sumber_info" value="{{ old('sumber_info') }}"
                                    class="form-control bg-light @error('sumber_info')
                            is-invalid
                        @enderror"
                                    id="input-month">
                                @error('sumber_info')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @enderror


                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-file" class="form-label">Apakah saudara keberatan bila biodata ini diberikan
                            pada
                            institusi pendidikan lain <span class="text-danger">*</span> : </label>
                        <div class="form-check d-flex">
                            <label for="yes" class="mb-3 px-0 text-muted">Ya</label>
                            <input id="yes"
                                class="form-check-input ms-2 me-2 @error('pernyataan_serah_data')
                            is-invalid
                        @enderror"
                                name="pernyataan_serah_data" value="Ya"
                                @if (old('pernyataan_serah_data') == 'Ya') checked @endif type="radio">

                            <label for="no" class="mb-3 px-0 text-muted">Tidak</label>
                            <input id="no"
                                class="form-check-input ms-2 @error('pernyataan_serah_data')
                            is-invalid
                        @enderror"
                                name="pernyataan_serah_data" value="Tidak"
                                @if (old('pernyataan_serah_data') == 'Tidak') checked @endif type="radio">

                        </div>
                        @error('pernyataan_serah_data')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label class="form-label" id="prodi-pilihan-1">Prodi Pilihan 1 <span
                                class="text-danger">*</span></label>
                        <select name="prodi_pilihan_1" id="prodi-pilihan-1" value="{{ old('prodi_pilihan_1') }}"
                            class="form-select bg-light @error('prodi_pilihan_1')
                            is-invalid
                        @enderror">
                            <option value="">Pilih</option>
                            @foreach ($dataJalur->prodi as $prodi)
                                <option value="{{ $prodi->prodi->kode_prodi }}"
                                    @if (old('prodi_pilihan_1') == $prodi->prodi->kode_prodi) selected @endif>
                                    {{ $prodi->prodi->nama }} </option>
                            @endforeach

                        </select>
                        @error('prodi_pilihan_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="prodi-pilihan-2" class="form-label">Prodi Pilihan 2 <span
                                class="text-danger">*</span></label>
                        <select name="prodi_pilihan_2" id="prodi-pilihan-2" value="{{ old('prodi_pilihan_2') }}"
                            class="form-select bg-light @error('prodi_pilihan_2')
                            is-invalid
                        @enderror">
                            <option value="">Pilih</option>
                            @foreach ($dataJalur->prodi as $prodi)
                                <option value="{{ $prodi->prodi->kode_prodi }}"
                                    @if (old('prodi_pilihan_1') == $prodi->prodi->kode_prodi) selected @endif>
                                    {{ $prodi->prodi->nama }}</option>
                            @endforeach

                        </select>
                        @error('prodi_pilihan_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="prodi-pilihan-2" class="form-label">Gelombang<span
                                class="text-danger">*</span></label>
                        <input type="text" readonly class="form-control" value="{{ $dataJalur->gelombang->nama }}">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="prodi-pilihan-2" class="form-label"> Tahun <span class="text-danger">*</span></label>
                        <input type="text" readonly class="form-control" value="{{ $dataJalur->gelombang->tahun }}">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="prodi-pilihan-2" class="form-label">Jalur Masuk <span
                                class="text-danger">*</span></label>
                        <input type="text" readonly class="form-control" value="{{ $dataJalur->jalur->nama }}">
                    </div>



                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="disabled-readonlytext" class="form-label">Pas Foto 3x4 cm<span
                                class="text-danger">*</span></label>

                        <input type="file" id="pas-foto" value="{{ old('pas_foto') }}"
                            class="form-control @error('pas_foto')
                            is-invalid
                        @enderror"
                            name="pas_foto" onchange="handleChange(event)">
                        @error('pas_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img width="250" height="250" src="{{ asset('/assets/images/default-user.png') }}"
                            id="preview-pas-foto" alt="" accept="image/*">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="disabled-readonlytext" class="form-label">KTP</label>
                        <input type="file" value="{{ old('ktp') }}"
                            class="form-control @error('ktp')
                            is-invalid
                        @enderror"
                            name="ktp" id="ktp">
                        @error('ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img width="250" height="250" src="{{ asset('/assets/images/default-user.png') }}"
                            id="preview-ktp" alt="">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-readonlytext" class="form-label d-none">Jalur Masuk <span
                                class="text-danger">*</span></label>
                        <input type="hidden" class="form-control" readonly name="pmb_jalur_masuk_id"
                            value="{{ $dataJalur->id }}">
                        {{-- <select name="pmb_jalur_masuk_id" onchange="onJalurMasukChange(event)" id=""
                            value="{{ old('jalur_masuk') }}"
                            class="form-select bg-light @error('pmb_jalur_masuk_id')
                            is-invalid
                        @enderror">
                            <option value="">Pilih</option>
                            <option value="1" @if (old('pmb_jalur_masuk_id') == '1') selected @endif>Reguler</option>
                            <option value="2" @if (old('pmb_jalur_masuk_id') == '2') selected @endif>Prestasi
                                Akademik</option>
                            <option value="3" @if (old('pmb_jalur_masuk_id') == '3') selected @endif>
                                Prestasi Non Akademik</option>
                            <option value="4" @if (old('pmb_jalur_masuk_id') == '4') selected @endif>RPL (Rekognisi
                                Pembalajaran Lampau)
                            </option>
                            <option value="5" @if (old('pmb_jalur_masuk_id') == '5') selected @endif>KIP Kuliah
                            </option>
                            <option value="6" @if (old('pmb_jalur_masuk_id') == '6') selected @endif>Beasiswa Yayasan
                            </option>
                        </select> --}}

                        @error('pmb_jalur_masuk_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @error('kartu_keluarga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @error('surat_keterangan_tidak_mampu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row" id="lampiran-container">

                        @error('kartu_keluarga')
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="disabled-readonlytext" class="form-label">Kartu Keluarga <span
                                        class="text-danger">*</span></label>
                                <input type="file"value="{{ old('kartu_keluarga') }}"
                                    class="form-control @error('kartu_keluarga')
                            is-invalid
                        @enderror"
                                    name="kartu_keluarga">
                                @error('kartu_keluarga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img src="{{ asset('/assets/images/default-user.png') }}" alt="">
                            </div>
                        @enderror

                        @error('surat_keterangan_tidak_mampu')
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <label for="disabled-readonlytext" class="form-label">Surat Keterangan Tidak Mampu <span
                                        class="text-danger">*</span></label>
                                <input type="file" value="{{ old('surat_keterangan_tidak_mampu') }}"
                                    class="form-control @error('surat_keterangan_tidak_mampu')
                            is-invalid
                        @enderror"
                                    name="surat_keterangan_tidak_mampu">
                                @error('surat_keterangan_tidak_mampu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <img src="{{ asset('/assets/images/default-user.png') }}" alt="">
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="mt-3">

                    <div class="d-flex">
                        <input type="checkbox" name="pernyataan_data_valid" id="pernyataan-data-valid"
                            class="form-check-input me-2 @error('pernyataan_data_valid')
                        is-invalid
                    @enderror"
                            value="Ya" @if (old('pernyataan_data_valid') == 'Ya') checked @endif>
                        <label for="pernyataan-data-valid">
                            <strong>
                                <p class="">Formulir ini saya isi dengan sebenarnya dan apabila terdapat kekeliruan
                                    yang
                                    disengaja saya akan menerima
                                    akibatnya untuk dikeluarkan dari Politeknik Kampar <span class="text-danger">*</span>
                                </p>
                            </strong>

                        </label>
                    </div>
                    @error('pernyataan_data_valid')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-primary mt-3">Kirim</button>
            </form>
        </div>
    </div>

    @push('script')
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#negara').select2({
                    placeholder: "Pilih...",
                    allowClear: true
                });
            });

            function onSumberInfoChange(event) {
                const htmlSumberInfo = `
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="input-month" class="form-label">Masukan Nama Informasi <span
                                class="text-danger">*</span></label>
                        <input type="text" name="sumber_info" value="{{ old('sumber_info') }}"
                            class="form-control bg-light @error('sumber_info')
                            is-invalid
                        @enderror"
                            id="input-month">
                        @error('sumber_info')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>`;

                switch (event.target.value) {
                    case "Teman/Saudara":
                    case "Website/Medsos":
                    case "Lainnya":
                        console.log("Sumber info");
                        $("#container-sumber-info").html(htmlSumberInfo);
                        break;
                    default:
                        $("#container-sumber-info").html(null);
                        break;
                }
            }
        </script>

        {{-- <script>
            function onJalurMasukChange(event) {

                if (event.target.value == "5") {

                    $("#lampiran-container").html(`
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="disabled-readonlytext" class="form-label">Surat Keterangan Tidak Mampu <span
                                class="text-danger">*</span></label>
                        <input type="file" name="surat_keterangan_tidak_mampu" value="{{ old('surat_keterangan_tidak_mampu') }}"
                            class="form-control @error('surat_keterangan_tidak_mampu')
                            is-invalid
                        @enderror"
                            name="surat_keterangan_tidak_mampu">
                        @error('surat_keterangan_tidak_mampu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset('/assets/images/default-user.png') }}" alt="">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="disabled-readonlytext" class="form-label">Kartu Keluarga <span
                                class="text-danger">*</span></label>
                        <input type="file" name="kartu_keluarga" value="{{ old('kartu_keluarga') }}"
                            class="form-control @error('kartu_keluarga')
                            is-invalid
                        @enderror"
                            name="kartu_keluarga">
                        @error('kartu_keluarga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset('/assets/images/default-user.png') }}" alt="">
                    </div>
                    
                    `);
                }

            }
        </script> --}}

        <script>
            const fileInput = document.getElementById('pas-foto');
            const preview = document.getElementById('preview-pas-foto');

            const fileInputKtp = document.getElementById('ktp');
            const previewKtp = document.getElementById('preview-ktp');


            fileInput.addEventListener('change', function() {
                const file = this.files[0]; // ambil file pertama
                if (file) {
                    const reader = new FileReader(); // pembaca file
                    reader.onload = function(e) {
                        preview.src = e.target.result; // tampilkan hasil di <img>
                    }
                    reader.readAsDataURL(file); // baca file sebagai URL gambar
                } else {
                    preview.src =
                        "http://127.0.0.1:8000/assets/images/default-user.png"; // jika tidak ada file, ubah menjadi default image
                }
            });


            fileInputKtp.addEventListener('change', function() {
                const file = this.files[0]; // ambil file pertama
                if (file) {
                    const reader = new FileReader(); // pembaca file
                    reader.onload = function(e) {
                        previewKtp.src = e.target.result; // tampilkan hasil di <img>
                    }
                    reader.readAsDataURL(file); // baca file sebagai URL gambar
                } else {
                    previewKtp.src =
                        "http://127.0.0.1:8000/assets/images/default-user.png"; // jika tidak ada file, ubah menjadi default image
                }
            });
        </script>
    @endpush
@endsection
