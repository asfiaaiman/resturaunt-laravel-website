@extends('layouts.admin.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <form action="{{ route('foods.update', [$food->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control text-black" value="{{$food->name}}"  required placeholder="Name of the Food">
                </div>
                <div class="form-group">
                    <input type="text" name="slug" id="slug" class="form-control text-black" value="{{$food->slug}}"  required placeholder="Slug of the Food">
                </div>
                <div class="form-group">
                    <input type="number" name="price" id="price" class="form-control text-black" value="{{$food->price}}"  required placeholder="Price of the Food">
                </div>
                <div class="form-group">
                    <select name="foodtype_id" id="foodtype_id" class="form-control">
                        @foreach($foodtypes as $foodtype)
                            <option value="{{$foodtype->id}}" selected>{{$foodtype->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input class='form-control' type="file" name="image" id="image">
                <input type='hidden' name='hidden_image' value='{{$food->image}}' />
                <div>
                    <a href="{{route('foods')}}" class="btn btn-default pull-center">Cancel</a>
                    <button type="submit" class="btn btn-primary pull-center">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
