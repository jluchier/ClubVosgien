@extends('default')

@section('home', 'navActive')

@section('content')
<div class="fond1 jj-home-container">
	<div class="w3-text-orange jj-TopContainerHome" style="text-shadow:3px 1px 0 #444">
		<h2 class="w3-xxxlarge w3-center" >Bienvenue sur le site du club vosgien RVF</h2>
	</div>
	<div class="jj-flex-home-container">
	<h1>Les actualités</h1>
	                <div class="tuile-flex-horizontal-HC">
                    @foreach($articles as $article)
                    @if($article->category->name == 'Actualité')
                    <div>
                            <h3>{{ $article->title }}</H3>
                            <div>
                                <img style="width: 100%"
                                src="storage/images/small/{{ $article->image }}"
                                srcset="storage/images/small/{{ $article->image }} 800w, storage/images/medium/{{ $article->image }} 1280w, storage/images/large/{{ $article->image }} 1920w"
                                alt="image">
                                {{ $article->content }}
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
		<div> 1 La je mets tout le paragraph qui peut largement s'étendre Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
		<div> 2 La je mets tout le paragraph qui peut largement s'étendre Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
		<div> 3 La je mets tout le paragraph qui peut largement s'étendre Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
		<div> 4 La je mets tout le paragraph qui peut largement s'étendre Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
	</div>

	<div class="jj-flex-home-container">
	<h1>Le programme</h1>
	<div >
		<p>La je mets tout la suite pour voir Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div >
		<p>La je mets tout le paragraph qui peut largement s'étendre Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div >
		<p>La je mets tout la suite pour voir </p>
	</div>	
	<div >
		<p>La je mets tout le paragraph qui peut largement s'étendre </p>
	</div>
	<div >
		<p>La je mets LE DERNIER toute la suite pour voir Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
    </div>
</div>
@endsection