@extends('layouts.site')
@section('content')
            <div class="col-12 text-center">
                @include('layouts.message')
                <h1>@lang('words.createProducts')</h1>
            </div>
            <div class="col-12 text-right mb-3">
                <a class="btn btn-warning btn-sm" href="{{route('products.index')}}">
                    @lang('words.back')
                </a>
            </div>
            <div class="col-12">
                <form enctype="multipart/form-data" action="{{route('products.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="category_id">@lang('words.selectCategory')</label>
                        <select class="form-select" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="custom-file mb-3">
                        <input type="file" class="mb-3 custom-file-input @error('image') is-invalid @enderror" name="image" id="customFile">
                        <label class="custom-file-label" for="customFile">@lang('words.choosefile')</label>
                        @error('image')
                        {{$message}}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="name">@lang('words.name')</label>
                        <input  class="form-control  @error('name')
                        is-invalid
                        @enderror" placeholder="name" type="text" id="name" name="name"
                            >
                            @error('name')
                            @lang('words.pleaseEnterName')
                        @enderror
                    </div>

                @for ($i = 0; $i <= 1; $i++ )
                    <div class="mb-3">
                        <label class="form-label" for="types">types</label>
                        <input  class="form-control  @error('types')
                        is-invalid
                        @enderror" placeholder="types" type="number" id="types" name="types[]"
                            >
                            @error('types')
                            @lang('words.pleaseEnterTypes')
                        @enderror
                    </div>
                @endfor


                @for ($i = 0; $i <= 2; $i++ )
                    <div class="mb-3">
                        <label class="form-label" for="sizes">sizes</label>
                        <input  class="form-control  @error('types')
                        is-invalid
                        @enderror" placeholder="sizes" type="number" id="sizes" name="sizes[]"
                            >
                            @error('sizes')
                            @lang('words.pleaseEnterSizes')
                        @enderror
                    </div>
                @endfor


                    <div class="mb-3">
                        <label class="form-label" for="price">@lang('words.price')</label>
                        <input  class="form-control @error('price')
                        is-invalid
                        @enderror" placeholder="price" type="number" id="price" name="price"
                            >
                            @error('price')
                            @lang('words.pleaseEnterPrice')
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="rating">@lang('words.rating')</label>
                        <input  class="form-control @error('rating')
                        is-invalid
                        @enderror" placeholder="rating" type="rating" id="rating" name="rating"
                            >
                            @error('rating')
                           @lang('words.pleaseEnterRating')
                        @enderror
                    </div>

                    <div class="mb-3 text-right">
                        <button type="submit" class="btn btn-success">@lang('words.submit')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
