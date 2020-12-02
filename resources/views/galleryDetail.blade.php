@extends('default')

@section('gallery', 'navActive')

@section('content')

<div style="padding-top: 110px ; padding-left: 20px" >

<h3>{{ $gallery->title }}</h3>
<div>{{ $gallery->description }}</div>
<div>Sortie du {{ $gallery->dateSortie }}</div>

</div>


<div class="CV-flex-gallery-row">

    @foreach ($allColumn as $column)


    <div class="CV-flex-gallery-column">

        @foreach($column as $image)

        <div class="w3-card-4 CV-Fond-Carte">
            <div class="w3-bar w3-center ">



                <div><a href="{{ Storage::url('gallery/'.$gallery->title.'/large/'.$image) }}" target="_blank">
                    <img src="{{ Storage::url('gallery/'.$gallery->title.'/small/'.$image) }}" alt="Pas d'image">
                    </a>
                </div>
            </div>

        </div>





        @endforeach
    </div>
    @endforeach
</div>






@endsection
