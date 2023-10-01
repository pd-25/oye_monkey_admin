@extends('admin.layout.main')
@section('title', env('APP_NAME').' | Product-index'  )
@section('content')
    <div class="row justify-content-center">

        <div class="col-lg-10">
            <div class="card">
                <div class="card-title pr">
                    <h4>All Products</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="card-title text-right">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">Add Product</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                                <tr>
                                    <th>SN.</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                             
                                    <tr>
                                        <td>#</td>
                                        <td>
                                            {{ $product->title }}
                                            
                                        </td>
                                        <td>
                                            <img style="height: 82px; width: 82px;" src="{{ @$product->previewImage['image'] }}" alt="">
                                            
                                            
                                        </td>
                                        <td>
                                            {{ $product->category->name }}
                                           
                                        </td>
                                        <td><span id="status-btn{{ $product->id }}">
                                            <button class="btn btn-sm {{ $product->status == 'Available' ? 'btn-success' : ($product->status == 'Inactive' ? 'bg-danger' : 'bg-warning'); }}"  onclick="changeStatus('{{ $product->id }}', {{ $product->id}})" >
                                                {{ $product->status }}
                                            </button>
                                        </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('products.show', encrypt($product->id)) }}"><i
                                                class="ti-eye btn btn-sm btn-success"></i></a>
                                            <a href="{{ route('products.edit', encrypt($product->id)) }}"><i
                                                    class="ti-pencil btn btn-sm btn-primary"></i></a>
                                            <form method="POST"
                                                action="{{ route('products.destroy', encrypt($product->id)) }}"
                                                class="action-icon">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger  delete-icon show_confirm"
                                                    data-toggle="tooltip" title='Delete'>
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
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
@endsection

@section('script')
    <script>
        function changeStatus(slug, id) {
            $.ajax({
                type: "POST",
                url: "#",
                data: {
                    'service_slug': slug,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.status) {
                        $("#status-btn"+ id).load(window.location.href + " #status-btn"+ id);
                        swal('Status updated');
                    }else {
                        swal('Some Error occur, relode the page');
                    }
                }
            });
        }
    </script>
@endsection
