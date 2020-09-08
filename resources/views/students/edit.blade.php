@extends('layout/main')

@section('title', 'Form Edit Data Mahasiswa')

@section('container')
<div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3">Form Edit Data Mahasiswa </h1>

                <form method="post" action="/students/{{ $student->id }}">
                    @method('patch')  {{-- methode yg sebenarnya dipake --}}
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value=" {{ $student->nama }} " placeholder="Masukkan Nama">@error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input  class="form-control @error('nrp') is-invalid @enderror" id="nrp" name="nrp" value=" {{ $student->nrp }} "  placeholder="Masukkan NRP">@error('nrp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value=" {{ $student->email }} "  placeholder="Masukkan Email">@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" value=" {{ $student->jurusan }} " placeholder="Masukkan jurusan">@error('jurusan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
               
                
            </div>
        </div>
</div>
@endsection