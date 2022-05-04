@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.update', $post)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-2">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" value="{{old('title') ?: $post->title}}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" aria-describedby="emailHelp">
                @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Seleziona una categoria:</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" aria-label="Default select example" name="category_id">
                    <option value="">seleziona una categoria</option>
                    @foreach ($categories as $category)
                        <option {{old('category_id') == $category->id ? 'selected': '' }} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </select>
            </div>

            <div class="mb-2">
                <label for="cover" class="form-label">Cover</label>
                <input type="text" value="{{old('cover') ?: $post->cover}}" class="form-control @error('title') is-invalid @enderror" id="cover" name="cover">
            </div>

            <div class="mb-2">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                    {{old('description') ?: $post->description}}
                </textarea>
            </div>

            <div class="mb-2">
                <label for="published_at" class="form-label">Published_at</label>
                <input type="date" class="form-control" value="{{old('published_at') ?: $post->published_at}}" id="published_at" name="published_at">
            </div>
            
            <button type="submit" class="btn btn-primary">Invia</button>

        </form>
    </div>
@endsection