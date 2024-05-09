@extends('layouts.admin', ['title' => 'Categories'])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

@section('mainContent')
    <div class="container">
        <div class="row row-gap-3">
            @foreach($categories as $category)
            <div class="col-md-6">
                <div class="single-category">
                    <h3 class="fw-bold">{{ $category->name }}</h3>
                    <p class="m-0">Total Products: {{ $category->products->count('id') }}</p>
                </div>
            </div>
            @endforeach
            {{
                $categories->links('pagination::bootstrap-4')
             }}
            {{--  <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>  --}}
        </div>
    </div>
@endsection
