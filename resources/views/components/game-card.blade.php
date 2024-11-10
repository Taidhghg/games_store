@props(['name','image','genre'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$name}}</h4>
    <img src="{{asset( 'images/games/'.$image)}}" alt="{{$name}}">
    <p class="text-gray-600">({{$genre}})</p>


</div>