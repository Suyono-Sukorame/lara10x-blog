@extends('layouts.app-front')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>
                            Gallery List
                            <a href="{{ url('gallery/upload') }}" class="btn btn-primary float-end">Upload Images</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($gallery as $galImg)
                                <div class="col-md-2">
                                    <div class="card border shadow p-2">
                                        <img src="{{ asset($galImg->image) }}" style="width: 70px; height:70;" alt="Img"/>
                                        <br/>
                                        <form action="{{ url('gallery/'.$galImg->id.'/delete') }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link">Delete</button>
                                        </form>
                                        {{-- <a href="{{ url('gallery/'.$galImg->id.'/delete') }}">Delete</a> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection