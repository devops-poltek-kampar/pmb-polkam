@extends('pmb.layout')

@section('content')
    <div class="row mt-4">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">

                <!-- Card Header -->
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="mb-0">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Portal Registrasi
                    </h5>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4">

                    <form action="{{ url('/pmb/portal-registrasi/create') }}" method="POST">
                        @csrf

                        <!-- Gelombang -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Gelombang
                            </label>
                            <select name="pmb_gelombang_id" id="gelombang" class="form-select">
                                <option value="">-- Pilih Gelombang --</option>
                                @foreach ($gelombang as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama }} {{ $item->tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jalur -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Jalur
                            </label>
                            <select name="pmb_jalur_id" id="jalur" class="form-select">
                                <option value="">-- Pilih Jalur --</option>
                                @foreach ($jalur as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Biaya -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Biaya Registrasi
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="biaya_registrasi"
                                    placeholder="Masukkan biaya">
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Keterangan
                            </label>
                            <textarea name="keterangan" rows="4" class="form-control" placeholder="Tambahkan keterangan..."></textarea>
                        </div>

                        <!-- Action Button -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="javascript:history.back()" class="btn btn-light">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>
                                Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Portal Registrasi</h3>
                </div>
                <div class="card-body">

                    <form action="{{ url('/pmb/portal-registrasi/create') }}" method="POST">
                        @csrf


                        <label for="" class="form-label">Gelombang</label>
                        <select name="pmb_gelombang_id" id="gelombang" class="form-select mb-3">
                            <option>Pilih</option>

                            @foreach ($gelombang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }} {{ $item->tahun }}</option>
                            @endforeach
                        </select>

                        <label for="" class="form-label">Jalur</label>
                        <select name="pmb_jalur_id" id="jalur" class="form-select mb-3">
                            <option>Pilih</option>

                            @foreach ($jalur as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>

                        <label for="" class="form-label">Biaya Registrasi</label>
                        <input type="number" class="form-control mb-3" name="biaya_registrasi">

                        <label for="" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>

                        <button class="btn btn-sm btn-info mt-3">Simpan</button>

                    </form>

                </div>
            </div>
        </div>
    </div> --}}

    @push('script')
        <script>
            $('#gelombang').select2({
                placeholder: 'Select an option'
            });

            $('#jalur').select2({
                placeholder: 'Select an option'
            });
        </script>
    @endpush
@endsection
