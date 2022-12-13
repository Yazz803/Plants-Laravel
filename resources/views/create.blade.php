@extends('layout.main')

@section('content')
    <div class="container mt-5" data-aos="zoom-in-up" data-aos-duration="1000">
        <div class="col-lg-6 bg-light m-auto border border-dark rounded p-4">
            <h2 class="text-sm-start"><i class="bi bi-flower2"></i> Create New Plant</h2>
            <hr>
            <form action="{{ route('plant.store') }}" method="POST">
                @csrf
                <div class="code-name d-flex gap-4 justify-content-between">
                    <div class="mb-3 w-50">
                      <label for="kodeTanaman" class="form-label fw-bold">Kode Tanaman </label>
                      <input type="text" name="code_plant" class="form-control @error('code_plant') is-invalid @enderror" id="kodeTanaman" value="{{ old('code_plant') }}">
                      @error('code_plant')
                      <p class="fw-bold text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="mb-3 w-50">
                      <label for="namaTanaman" class="form-label fw-bold">Nama Tanaman</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="namaTanaman" value="{{ old('name') }}">
                      @error('name')
                      <p class="fw-bold text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                </div>
                <label class="form-label fw-bold">Type :</label>
                <select class="form-select mb-3 @error('type') is-invalid @enderror" name="type" aria-label="Default select example">
                    <option value="" selected hidden>-- Silahkan Pilih Tipe Tanaman --</option>
                    <option value="Obat">Obat</option>
                    <option value="Sayuran">Sayuran</option>
                    <option value="Buah-buahan">Buah-buahan</option>
                    <option value="Kacang-kacangan">Kacang-kacangan</option>
                    <option value="Umbi-umbian">Umbi-umbian</option>
                    <option value="Serat">Serat</option>
                    <option value="Rempah-Rempah">Rempah-Rempah</option>
                    <option value="Tanaman Hias">Tanaman Hias</option>
                </select>
                @error('type')
                    <p class="fw-bold text-danger">{{ $message }}</p>
                @enderror
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px">{{ old('notes') }}</textarea>
                    <label for="floatingTextarea" class="fw-bold">Notes</label>
                    @error('notes')
                        <p class="fw-bold text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-patch-plus-fill"></i> Create</button>
            </form>

            <hr>

            <div class="d-flex justify-content-between align-items-center">
                <div class="text">
                    <h3 class="text-secondary">Plants</h3>
                    <p class="w-75">Cintai Ususmu, minum yakult tiap hari</p>
                </div>
                <a href="{{ route('plant.index') }}" class="btn btn-outline-danger fw-bold">Go To Page</a>
            </div>
        </div>
    </div>
@endsection