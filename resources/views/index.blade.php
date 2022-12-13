@extends('layout.main')

@section('content')
    <div class="container mt-5 bg-light m-auto rounded p-4" data-aos="zoom-in-down" data-aos-duration="1000">
      <div class="d-flex justify-content-between align-items-center header">
        <div class="alert alert-primary" role="alert">
          Banyak Tanaman : <span class="fw-bold">{{ \App\Models\Plant::all()->count() }}</span>
        </div>
        <h1 class="text-center"><i class="bi bi-flower1"></i> Plants Report</h1>
        <a href="{{ route('plant.create') }}" class="btn btn-outline-success fw-bold"><i class="bi bi-patch-plus"></i> Create New Plant</a>
      </div>
    </div>

    <div class="container mt-2 w-50" data-aos="zoom-in-down" data-aos-duration="1000">
      <form class="d-flex mt-" role="search">
        <input class="form-control me-2" type="search" name="search" placeholder="Cari Tanaman..." value="{{ request('search') }}" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>

    <div class="container my-5 d-flex justify-content-center flex-wrap gap-5 align-items-baseline">
      @forelse($plants as $plant)
      <div class="card" style="width: 20rem;" data-aos="zoom-in-up" data-aos-duration="1000">
        <div class="card-body">
          <h5 class="card-title">@if($loop->iteration < 10) <i class="bi bi-{{ $loop->iteration }}-circle"></i> @else <i class="bi bi-{{ substr($loop->iteration, 0, 1) }}-circle"></i> <i class="bi bi-{{ substr($loop->iteration, 1, 1) }}-circle"></i>  @endif {{ $plant->name }} ({{ $plant->code_plant }})</h5>
          <h6 class="card-subtitle mb-2 text-muted">Tipe : <span class="text-primary">{{ $plant->type }}</span></h6>
          <h6 class="card-subtitle mb-2 text-muted">Growth : <span class="text-primary">{{ $plant->growth }}</span></h6>
          <p class="card-text"><span class="fw-bold">Notes : </span> {{ $plant->notes }}</p>
          <p class="card-text text-secondary"><strong>{{ \Carbon\Carbon::parse($plant->created_at)->format('j F, Y') }} @if($plant->update != NULL) (last updated) @endif</strong></p>
          <div class="d-flex justify-content-around">
            <a href="{{ route('plant.edit', $plant->id) }}" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i> Edit</a>
            <form action="{{ route('plant.destroy', $plant->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash"></i> Delete</button>
            </form>
          </div>
        </div>
      </div>

      @empty
      <h1 class="text-center text-light">Plants Not Found</h1>
      @endforelse
    </div>

    <div class="container bg-light rounded mb-5 pt-3">
      {{ $plants->links() }}
    </div>
@endsection