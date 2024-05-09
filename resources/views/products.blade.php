@extends('layouts.admin', ['title' => 'Products'])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

@section('mainContent')
    <div class="container">
        <div class="products mb-3">
            @foreach($products as $product)
            @if(auth()->user()->id == $product->user_id)
                <div class="__single">
                <div class="image">
                    <img class="w-100" src="{{ asset('image/' .$product->image) }}" alt="Product_image">
                </div>
                <div>
                    <h2>{{ $product->name }}</h2>
                    <div>
                        <p class="fw-bold m-0">Categories:</p>
                        <div>
                            @foreach($product->category as $category)
                                <span class="badge bg-info text-capitalize">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <p class="fw-bold m-0">Features:</p>
                        <ul>
                            @foreach($product->feature as $feature)
                                <li class="text-capitalize">{{ $feature->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        {{
            $products->links('pagination::bootstrap-4')
         }}

        {{--  <nav aria-label="Page navigation example mt-2">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>  --}}
    </div>

    <script>
        $("#imgSrc").attr('src', "https://ui-avatars.com/api/?background=random&color=fff&name={{ auth()->user()->name }}")
    </script>
@endsection
