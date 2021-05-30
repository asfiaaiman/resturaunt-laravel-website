@extends('layouts.admin.main')
<style>
   html {
  font-family: sans-serif;
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.text-center {
  text-align: center;
}

.color-white {
  color: #fff;
}

.box-container {
  align-items: center;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 35px 15px;
  width: 100%;
}

@media screen and (min-width:1380px) {
  .box-container {
    flex-direction: row
  }
}

.box-item {
  position: relative;
  -webkit-backface-visibility: hidden;
  width: 600px;
  margin-bottom: 35px;
  max-width: 100%;
}

.flip-box {
  -ms-transform-style: preserve-3d;
  transform-style: preserve-3d;
  -webkit-transform-style: preserve-3d;
  perspective: 1000px;
  -webkit-perspective: 1000px;
}

.flip-box-front,
.flip-box-back {
  background-size: cover;
  background-position: center;
  border-radius: 8px;
  min-height: 475px;
  -ms-transition: transform 0.7s cubic-bezier(.4,.2,.2,1);
  transition: transform 0.7s cubic-bezier(.4,.2,.2,1);
  -webkit-transition: transform 0.7s cubic-bezier(.4,.2,.2,1);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-box-front {
  -ms-transform: rotateY(0deg);
  -webkit-transform: rotateY(0deg);
  transform: rotateY(0deg);
  -webkit-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-front {
  -ms-transform: rotateY(-180deg);
  -webkit-transform: rotateY(-180deg);
  transform: rotateY(-180deg);
  -webkit-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transform-style: preserve-3d;
}

.flip-box-back {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  
  -ms-transform: rotateY(180deg);
  -webkit-transform: rotateY(180deg);
  transform: rotateY(180deg);
  -webkit-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-back {
  -ms-transform: rotateY(0deg);
  -webkit-transform: rotateY(0deg);
  transform: rotateY(0deg);
  -webkit-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transform-style: preserve-3d;
}

.flip-box .inner {
  position: absolute;
  left: 0;
  width: 100%;
  padding: 60px;
  outline: 1px solid transparent;
  -webkit-perspective: inherit;
  perspective: inherit;
  z-index: 2;
  
  transform: translateY(-50%) translateZ(60px) scale(.94);
  -webkit-transform: translateY(-50%) translateZ(60px) scale(.94);
  -ms-transform: translateY(-50%) translateZ(60px) scale(.94);
  top: 50%;
}

.flip-box-header {
  font-size: 34px;
}

.flip-box p {
  font-size: 20px;
  line-height: 1.5em;
}

.flip-box-img {
  margin-top: 25px;
}

.flip-box-button {
  background-color: transparent;
  border: 2px solid #fff;
  border-radius: 2px;
  color: #fff;
  cursor: pointer;
  font-size: 20px;
  font-weight: bold;
  margin-top: 25px;
  padding: 15px 20px;
  text-transform: uppercase;
}
</style>
@section('content')
   
<div class="box-container">
	<div class="box-item">
    <div class="flip-box">
      <div class="flip-box-front text-center">
        <div class="inner color-white">
          <h3 class="flip-box-header">Edit Food Details</h3>
          <p>It is important to edit the mistakes in details of the food</p>
          <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img">
        </div>
      </div>
      <div class="flip-box-back text-center">
        <div class="inner color-white">
          <h3 class="flip-box-header text-dark">Edit the Name of Food</h3>
          <form action="{{ route('foods.update', [$food->id]) }}" method="post">
              @csrf
              <input name="_method" type="hidden" value="PATCH">
              <div class="form-group">
                  <input type="text" name="name" id="name" class="form-control text-black" value="{{$food->name}}"  required placeholder="Name of the Food">
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
	</div>
</div>
@endsection