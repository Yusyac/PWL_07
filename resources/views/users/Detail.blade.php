@extends('users.Layouts') 

@section('content') 

<div class="container mt-5"> 
    <table class="table table-bordered table-hover">
        <ul class="list-group list-group-flush">
            <tr>
            <td class="bg-success" align="center" colspan="2">
                <b>Detail Mahasiswa</b>
            </td>
            </tr>
            <tr>
                <td><b>Nim</b></td>
                <td>{{$List->Nim}}</td>
            </tr>
            <tr>
                <td><b>Nama</b></td>
                <td>{{$List->Nama}}</td>
            </tr>
            <tr>
                <td><b>Tanggal Lahir</b></td>
                <td>{{$List->Tanggal_Lahir}}</td>
            </tr>
            <tr>
                <td><b>Kelas</b></td>
                <td>{{$List->Kelas}}</td>
            </tr>
            <tr>
                <td><b>Jurusan</b></td>
                <td>{{$List->Jurusan}}</td>
            </tr>
            <tr>
                <td><b>Email</b></td>
                <td>{{$List->Email}}</td>
            </tr>
            <tr>
                <td><b>No Handphone</b></td>
                <td>{{$List->No_Handphone}}</td>
            </tr>
        </ul>
    </table>
    <a class="btn btn-success mt-3" href="{{ route('mahasiswa.index') }}">Kembali</a>
</div> 
@endsection