
@extends('layout')

@section('title', 'News')

@section('content')
    <p id="pooh" title="news title" onclick="handler();">News!!!</p>

    <image src="https://www.iconsdb.com/icons/preview/red/square-xxl.png" > red </image>
    <image src="https://www.iconsdb.com/icons/preview/royal-blue/square-xxl.png">blue</image>
    <image src="https://www.iconsdb.com/icons/preview/guacamole-green/square-xxl.png">green</image>


    <script>

     function handler(){
         let element = document.getElementById('pooh');
         if (element.style.color === 'blue'){
             element.style.color = 'red';
         }
         else element.style.color = 'blue';
     }
     //console.log(element.innerHTML = 'NEWS!!!!!!!!!!!!!!!!!!!!!!!');
     //element.className += 'some-class';


    </script>
@endsection
