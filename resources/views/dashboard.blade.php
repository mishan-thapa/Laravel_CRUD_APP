@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <form action="/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <pre>
                        @php
                            print_r($errors->all());
                        @endphp
                    </pre> --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">city</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="mb-3">
                        <label for="marks" class="form-label">marks</label>
                        <input type="number" class="form-control" id="marks" name="marks">
                        <span class="text-danger">
                            @error('marks')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="uploaded_file" class="form-label">File Upload</label>
                        <input type="file" class="form-control" id="uploaded_file" name="uploaded_file">
                    </div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
            <div class="col-sm-8">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Files</th>
                        <th scope="col">Action</th>
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
                                <td>
                                    <a href="{{url('/edit_form',$student->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{ url('/destroy',$student->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
