@extends('default')

@section('infosFede', 'navActive')

@section('content')
<div class="CV-global">
	<div class="CV-flex-container-Column">    
		<div class="CV-TopContainerHome">
			<img src="/images/fonds/Small/small1_006.jpg" alt="Les vosges">
		</div>
		<div id="actu" class="CV-flex-container-Column">
			<h1>Le comité</h1>
			<div class="tuile-flex-horizontal-HC">

				<div class="w3-card-4 w3-third">
					<div class="w3-container w3-theme-dark">
						<h3>Présidente</h3>
					</div>
					<div class="w3-section CV-Orange">
						<img style="width: 100%" src="" alt="Là je mets l'image">
						<p>	
							Faire apparaitre les noms des membres du comité et le bureau avec la fonction de chacun.
						</p>
						<p>
							Pour les photos, on verra avec ceux qui veulent ou pas
						</p>
					</div>
				</div>
				<div class="w3-card-4 w3-third">
					<div class="w3-container w3-theme-dark">
						<h3>Le trésorier</h3>
					</div>
					<div class="w3-section CV-Orange">
						<img style="width: 100%" src="" alt="Là je mets l'image">
						<p>	
							Faire apparaitre les noms des membres du comité et le bureau avec la fonction de chacun.
						</p>
						<p>
							Pour les photos, on verra avec ceux qui veulent ou pas
						</p>
					</div>
				</div>
				<div class="w3-card-4 w3-third">
					<div class="w3-container w3-theme-dark">
						<h3>Le secrétaire</h3>
					</div>
					<div class="w3-section CV-Orange">
						<img style="width: 100%" src="" alt="Là je mets l'image">
						<p>	
							Faire apparaitre les noms des membres du comité et le bureau avec la fonction de chacun.
						</p>
						<p>
							Pour les photos, on verra avec ceux qui veulent ou pas
						</p>
					</div>
				</div>


			</div>

			<!-- <h1>Les formations</h1> -->
			<div class="tuile-flex-horizontal-HC">

				<div class="w3-card-4 w3-third">
					<div class="w3-container w3-theme-dark">
						<h3>Les formations</h3>
					</div>
					<div class="w3-section CV-Orange">
						<img style="width: 100%" src="" alt="Là je mets l'image">
						<p>	
							Etre membre d’une association Club Vosgien, c’est aussi avoir la possibilité de s’impliquer dans la vie de l’association. Ceux qui le souhaitent peuvent se former dans plusieurs domaines et devenir baliseur sur les sentiers ou encore guide de randonnée pédestre.
						</p>
						<p>
							N’hésitez pas à vous renseigner auprès de nous
						</p>
					</div>
				</div>



			</div>			

			<h1>Le code du randonneur</h1>
			<div class="tuile-flex-horizontal-HC">

				@foreach($articles as $article)
				@if($article->category->name == 'Infos fédération')
				<div class="w3-card-4 w3-third">
					<div class="w3-container w3-theme-dark">
						<h3>{{ $article->title }}</h3>
					</div>
					<div class="w3-section CV-Orange">
						<img style="width: 100%"
						src="{{ Storage::url('images/small/' . $article->image)}}"
						srcset="{{ Storage::url('images/small/' . $article->image)}} 800w,
						{{ Storage::url('images/medium/' . $article->image)}} 1280w,
						{{ Storage::url('images/large/' . $article->image)}} 1920w"
						alt="Là je mets l'image">
						<div>{!!$article->content!!}</div>
					</div>
				</div>
				@endif
				@endforeach
				<img src="/images/common/small1_009.jpg" alt="Les vosges">
			</div>
		</div>
	</div>
</div>
@endsection	