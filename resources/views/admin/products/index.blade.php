@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.products.create') }}">Create
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}">
                            Edit

                        </a>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection