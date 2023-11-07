@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div >
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Marks</th>
                    <th scope="col">Files</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th>{{ $student->id}}</th>
                            <td>{{ $student->name}}</td>
                            <td>{{ $student->city}}</td>
                            <td>{{ $student->marks}}</td>
                            <td>{{ $student->files}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection