<x-layout>
	@php
	$isAr = app()->getLocale() === "ar" ? true : false;
	@endphp
	<h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">{{$isAr?$lab->name_ar:ucwords($lab->name)}} {{__('lab_research')}}</h1>
	<section class="text-gray-600 body-font overflow-hidden">
		<div class="container px-5 py-24 mx-auto">
			<div class="-my-8 divide-y-2 divide-gray-300">
				@foreach($research as $oneResearch)
				@php
				$dynamic_name = $isAr ? $oneResearch->name_ar : $oneResearch->name;
				$dynamic_pub_name = $isAr ? $oneResearch->publisher_name_ar : $oneResearch->publisher_name;
				$dynamic_about = $isAr ? $oneResearch->about_ar : $oneResearch->about;
				@endphp
				<div class="py-8 flex flex-wrap md:flex-nowrap">
					<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
						<span class="text-gray-500 text-sm">{{__('published_at')}}</span>
						<span class=" font-semibold title-font text-gray-700">{{$oneResearch->published_at}}</span>
						<span class="mt-6 text-gray-500 text-sm">{{__('by')}}</span>
						<span class="font-semibold title-font text-gray-700 ">{{$dynamic_pub_name}}</span>
					</div>
					<div class="md:flex-grow">
						<h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{$dynamic_name}}</h2>
<!--						<p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>-->
						<a href="/labs/{{$lab->slug}}/research/{{$oneResearch->slug}}" class="text-indigo-500 inline-flex items-center mt-4">{{__('learn_more')}}
							<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path d="M5 12h14"></path>
							<path d="M12 5l7 7-7 7"></path>
							</svg>
						</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<div class="mx-20">
		{{$research->links()}}
	</div>
</x-layout>