<x-app-web-layout>

    <x-slot:title>
        Product Create
    </x-slot>

    <div class="container">
        <form action="{{ url('products/create') }}" method="POST">
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-6">

                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                @error('name') <span class="text-danger"> {{ $message }} </span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Product Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                                @error('description') <span class="text-danger"> {{ $message }} </span> @enderror
                            </div>
                            <label>Product Price</label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control">
                                @error('price') <span class="text-danger"> {{ $message }} </span> @enderror

                            <div class="mb-3">
                                <label>Product Stock</label>
                                <input type="text" name="stock" class="form-control">
                                @error('stock') <span class="text-danger"> {{ $message }} </span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Is Active</label>
                                <br/>
                                <input type="checkbox" name="is_active" style="width: 40px; height:40px"/>
                                @error('is_active') <span class="text-danger"> {{ $message }} </span> @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

</x-app-web-layout>
