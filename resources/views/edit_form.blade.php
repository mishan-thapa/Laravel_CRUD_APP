@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <pre>
                        @php
                            print_r($errors->all());
                        @endphp
                    </pre> --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$student->name}}">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="faculty" class="form-label">faculty</label>
                        <input type="text" class="form-control" id="faculty" name="faculty" value="{{$student->city}}">
                    </div>
                    <div class="mb-3">
                        <label for="grade" class="form-label">grade</label>
                        <input type="number" class="form-control" id="grade" name="grade" value="{{$student->marks}}">
                        <span class="text-danger">
                            @error('grade')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection