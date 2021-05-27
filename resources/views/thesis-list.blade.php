<x-layout>
	@php
	$isAr = app()->getLocale() === "ar" ? true : false;
	@endphp
	<h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">{{$isAr?$lab->name_ar:ucwords($lab->name)}} {{__('lab_theses')}}</h1>
	<section class="text-gray-600 body-font overflow-hidden">
		<div class="container px-5 py-24 mx-auto">
			<div class="-my-8 divide-y-2 divide-gray-100">
				@foreach($theses as $thesis)
				@php
				$dynamic_title = $isAr ? $thesis->title_ar : $thesis->title;
				$dynamic_author = $isAr ? $thesis->author_ar : $thesis->author;
				$dynamic_about = $isAr ? $thesis->about_ar : $thesis->about;
				@endphp
				<div class="py-8 flex flex-wrap md:flex-nowrap">
					<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
						<span class="text-gray-500 text-sm">{{__('awarded_to')}}</span>
						<span class=" font-semibold title-font text-gray-700">{{$dynamic_author}}</span>
						<span class="mt-6 text-gray-500 text-sm">{{__('awarded_at')}}</span>
						<span class=" font-semibold title-font text-gray-700">{{$thesis->awarded_at}}</span>
					</div>
					<div class="md:flex-grow">
						<h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{$dynamic_title}}</h2>
<!--						<p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>-->
						<a href="/labs/{{$lab->slug}}/theses/{{$thesis->slug}}" class="text-indigo-500 inline-flex items-center mt-4">{{__('learn_more')}}
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
</x-layout>