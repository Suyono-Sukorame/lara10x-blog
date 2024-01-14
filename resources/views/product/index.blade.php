<x-app-web-layout>

    <x-slot name="title">
        Products
    </x-slot>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product
                        <a href="{{ url('products/create') }}" class="btn btn-primary float-end">Add Product</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $products as $item )
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                {{-- <td>
                                    <img src="{{ asset($item->image) }}" style="width: 70px; height: 70px; alt="img/">
                                </td> --}}
                                <td>
                                    <a href="{{ url('products/'.$item->id.'/upload') }}" class="btn btn-info">Add / View Images</a>
                                </td>
                                <td>
                                    @if ($item->is_active)
                                        Active
                                    @else 
                                        In-Active
                                    @endif
                                <td>
                                    
                                    <a href="{{ url('products/'.$item->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
                                    <form action="{{ url('products/'.$item->id.'/delete') }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Are you sure ?')">Delete</button>
                                    </form>
                                    
                                    {{-- <a 
                                        href="{{ url('products/'.$item->id.'/delete') }}" class="btn btn-danger mx-1"
                                        onclick="return confirm('Are you sure ?')"    
                                        >
                                        Delete
                                    </a> --}}
                                </td>                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-web-layout>