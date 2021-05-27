<x-layout>
	<h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">{{ucwords($lab->name)}} Lab Devices</h1>
	<section class="text-gray-600 body-font">
		<div class="container px-5 py-24 mx-auto">
			<div class="flex flex-wrap -m-4">
				@foreach($devices as $device)
				<div class="p-4 md:w-1/3">
					<div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
						<img class="lg:h-48 md:h-36 w-full object-cover object-center" src="/storage/uploads/images/devices/{{$device->image}}" alt="blog">
						<div class="p-6">
<!--							<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>-->
							<h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$device->name}}</h1>
							<p class="leading-relaxed mb-3">{{substr($device->description,0,strpos($device->description,' ',strlen($device->description)/3))}}...</p>
							<div class="flex items-center flex-wrap ">
								<a href="/labs/{{$lab->slug}}/devices/{{$device->slug}}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
									<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path d="M5 12h14"></path>
									<path d="M12 5l7 7-7 7"></path>
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
</x-layout>