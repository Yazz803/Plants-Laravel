@extends('layout.main')

@section('content')
    <div class="container my-5">
        <div class="col-lg-6 bg-light m-auto border border-dark rounded p-4">
            <h2 class="text-sm-start"><i class="bi bi-flower2"></i> Create New Plant</h2>
            <hr>
            <form action="{{ route('plant.update', $plant->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="code-name d-flex gap-4 justify-content-between">
                    <div class="mb-3 w-50">
                      <label for="kodeTanaman" class="form-label fw-bold">Kode Tanaman </label>
                      <input type="text" name="code_plant" class="form-control @error('code_plant') is-invalid @enderror" id="kodeTanaman" value="{{ $plant->code_plant }}">
                      @error('code_plant')
                      <p class="fw-bold text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="mb-3 w-50">
                      <label for="namaTanaman" class="form-label fw-bold">Nama Tanaman</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="namaTanaman"  value="{{ $plant->name }}">
                      @error('name')
                      <p class="fw-bold text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                </div>
                <label class="form-label fw-bold">Type :</label>
                <select class="form-select mb-3 @error('type') is-invalid @enderror" name="type" aria-label="Default select example">
                    <option value="Obat" @if($plant->type == "Obat") selected @endif>Obat</option>
                    <option value="Sayuran" @if($plant->type == "Sayuran") selected @endif>Sayuran</option>
                    <option value="Buah-buahan" @if($plant->type == "Buah-buahan") selected @endif>Buah-buahan</option>
                    <option value="Kacang-kacangan" @if($plant->type == "Kacang-kacangan") selected @endif>Kacang-kacangan</option>
                    <option value="Umbi-umbian" @if($plant->type == "Umbi-umbian") selected @endif>Umbi-umbian</option>
                    <option value="Serat" @if($plant->type == "Serat") selected @endif>Serat</option>
                    <option value="Rempah-Rempah" @if($plant->type == "Rempah-Rempah") selected @endif>Rempah-Rempah</option>
                    <option value="Tanaman Hias" @if($plant->type == "Tanaman Hias") selected @endif>Tanaman Hias</option>
                </select>
                @error('type')
                    <p class="fw-bold text-danger">{{ $message }}</p>
                @enderror

                <label class="form-label fw-bold">Growth :</label>
                <select name="growth" class="form-select mb-3">
                    <option value="" @if($plant->growth == NULL) selected @endif>-- Silahkan Pilih Perkembangan Tanamannya --</option>
                    <option value="Tunas" @if($plant->growth == "Tunas") selected @endif>Tunas</option>
                    <option value="Mulai Tumbuh Cabang dan Daun" @if($plant->growth == "Mulai Tumbuh Cabang dan Daun") selected @endif>Mulai Tumbuh Cabang dan Daun</option>
                    <option value="Pertambahan Tinggi Cabang" @if($plant->growth == "Pertambahan Tinggi Cabang") selected @endif>Pertambahan Tinggi Cabang</option>
                    <option value="Bertambahnya daun" @if($plant->growth == "Bertambahnya daun") selected @endif>Bertambahnya daun</option>
                    <option value="Bertambahnya dan Membesarnya Cabang dan Daun" @if($plant->growth == "Bertambahnya dan Membesarnya Cabang dan Daun") selected @endif>Bertambahnya dan Membesarnya Cabang dan Daun</option>
                </select>

                <div class="form-floating mb-3">
                    <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px">{{ $plant->notes }}</textarea>
                    <label for="floatingTextarea" class="fw-bold">Notes</label>
                    @error('notes')
                        <p class="fw-bold text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary fw-bold"><i class="bi bi-patch-plus-fill"></i> Update Change</button>
                <a href="{{ route('plant.index') }}" class="btn btn-outline-primary fw-bold">Cancel</a>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text">
                        <h3 class="text-secondary">Plants</h3>
                        <p class="w-75">Cintai Ususmu, minum yakult tiap hari</p>
                    </div>
                    <a href="{{ route('plant.index') }}" class="btn btn-outline-danger fw-bold">Go To Page</a>
                </div>
            </form>
        </div>
    </div>
@endsection