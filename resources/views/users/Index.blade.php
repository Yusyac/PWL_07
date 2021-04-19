@extends('users.Layouts') 

@section('content') 

<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="pull-left mt-2"> 
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2> 
        </div> 

        <!-- Form Search -->
        <div class="float-left my-2">
            <form action="{{ route('mahasiswa.search') }}" method="Get">
                @csrf
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i> Search </button>
                    </span>
                </div>
            </form>
        </div>
        <!-- End Form Search -->

        <div class="float-right my-2"> 
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a> 
        </div> 
    </div> 
</div> 
@if ($message = Session::get('Success')) 
<div class="alert alert-success"> 
    <p>{{ $message }}</p> 
</div> 
@endif 
<table class="table table-bordered table-hover"> 
    <tr> 
        <th>Nim</th> 
        <th>Nama</th> 
        <th>Tanggal Lahir</th> 
        <th>Kelas</th> 
        <th>Jurusan</th> 
        <th>Email</th> 
        <th>No Handphone</th> 
        <th width="280px">Action</th> 
    </tr>
    @foreach ($posts as $List) 
    <tr> 
        <td>{{ $List->Nim }}</td> 
        <td>{{ $List->Nama }}</td> 
        <td>{{ $List->Tanggal_Lahir }}</td>
        <td>{{ $List->Kelas }}</td> 
        <td>{{ $List->Jurusan }}</td> 
        <td>{{ $List->Email }}</td>
        <td>{{ $List->No_Handphone }}</td> 
        <td> <form action="{{ route('mahasiswa.destroy',$List->Nim) }}" method="POST"> 
            <a class="btn btn-info" href="{{ route('mahasiswa.show',$List->Nim) }}">Show</a> 
            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$List->Nim) }}">Edit</a> 
            @csrf
            @method('DELETE') 
            <button type="submit" class="btn btn-danger">Delete</button> 
        </form> 
    </td>
</tr> 
@endforeach 
</table>
<div class="d-flex">
    {{ $posts->links() }}
</div>
@endsection