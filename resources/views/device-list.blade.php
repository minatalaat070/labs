<x-layout>
	@php
	$isAr = app()->getLocale() === "ar" ? true : false;
	@endphp
	<h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">{{$isAr?$lab->name_ar:ucwords($lab->name)}} {{__('lab_devices')}}</h1>
	<section class="text-gray-600 body-font">
		<div class="container px-5 py-24 mx-auto">
			<div class="flex flex-wrap -m-4">
				@foreach($devices as $device)
				@php
				$dynamic_name = $isAr ? $device->name_ar : $device->name;
				$dynamic_desc = $isAr ? $device->description_ar : $device->description;
				@endphp
				<div class="p-4 md:w-1/3">
					<div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
						<img class="lg:h-48 md:h-36 w-full object-cover object-center" src="/storage/uploads/images/devices/{{$device->image}}" alt="blog">
						<div class="p-6">
							<!--							<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>-->
							<h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$dynamic_name}}</h1>
							<p class="leading-relaxed mb-3">{{substr($dynamic_desc,0,strpos($dynamic_desc,' ',strlen($dynamic_desc)/3))}}...</p>
							<div class="flex items-center flex-wrap ">
								<a href="/labs/{{$lab->slug}}/devices/{{$device->slug}}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">{{__('learn_more')}}
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
	<div class="mx-20">
		{{$devices->links()}}
	</div>
</x-layout>