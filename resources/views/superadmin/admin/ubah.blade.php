@extends('admin.home')
@section('isi')

  <div class="container" style="position: relative;">
    
    <form method="POST" action="{{ route('daftar-admin.update',$datas->id) }}" >
        @csrf
            <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="formGroupExampleInput">NIK</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="nik" value="{{ $datas->nik }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Nama</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ $datas->name }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="{{ $datas->email }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">No HP</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="hp" value="{{ $datas->hp }}">
        </div>
        <label for="formFile" class="form-label">Ubah level</label>
            <select class="form-select" aria-label="Default select example" name="opsi" required>
            <option value="ADMIN">Admin</option>
              <option value="USER">User</option>
             
  
            </select>
        <button style="background-color: #FF9106; border: unset" type="submit" class="btn btn-primary mt-4">Ubah</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  @endsection