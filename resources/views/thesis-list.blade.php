<x-layout>
	<h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">{{ucwords($lab->name)}} Lab Research</h1>
	<section class="text-gray-600 body-font overflow-hidden">
		<div class="container px-5 py-24 mx-auto">
			<div class="-my-8 divide-y-2 divide-gray-100">
				@foreach($theses as $thesis)
				<div class="py-8 flex flex-wrap md:flex-nowrap">
					<div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
						<span class="font-semibold title-font text-gray-700">Awarded at</span>
						<span class="mt-1 text-gray-500 text-sm">{{$thesis->awarded_at}}</span>
					</div>
					<div class="md:flex-grow">
						<h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{$thesis->title}}</h2>
<!--						<p class="leading-relaxed">Glossier echo park pug, church-key sartorial biodiesel vexillologist pop-up snackwave ramps cornhole. Marfa 3 wolf moon party messenger bag selfies, poke vaporware kombucha lumbersexual pork belly polaroid hoodie portland craft beer.</p>-->
						<a href="/labs/{{$lab->slug}}/theses/{{$thesis->slug}}" class="text-indigo-500 inline-flex items-center mt-4">Learn More
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