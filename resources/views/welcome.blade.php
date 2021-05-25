<x-layout>
	<section class="text-gray-600 body-font">
		<div class="container px-5 py-24 mx-auto">
			<div class="text-center mb-20">
				<h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Physics Department Laboratories</h1>
				<p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug.</p>
				<div class="flex mt-6 justify-center">
					<div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
				</div>
			</div>
			<div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
				<section class="text-gray-600 body-font">
					<div class="container px-5 py-24 mx-auto">
						<div class="flex flex-wrap -m-4">
							<div class="p-4 md:w-1/3">
								<div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
									<img class="lg:h-48 md:h-36 w-full object-cover object-center" src="#" alt="blog">
									<div class="p-6">
										<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Lab</h2>
										<h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$lab->name}}</h1>
										<p class="leading-relaxed mb-3">{{substr($lab->about,0,strpos($lab->about,' ',strlen($lab->about)/3))}}...</p>
										<div class="flex items-center flex-wrap ">
											<a href="/lab/{{$lab->slug}}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
												<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path d="M5 12h14"></path>
												<path d="M12 5l7 7-7 7"></path>
												</svg>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="p-4 md:w-1/3">
								<div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
									<img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/720x400" alt="blog">
									<div class="p-6">
										<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Thesis</h2>
										@php
										$thesis =$lab->theses->random(1)->take(1)[0];
										@endphp
										<h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$thesis->title}}</h1>
										<p class="leading-relaxed mb-3">{{substr($thesis->about,0,strpos($thesis->about,' ',strlen($thesis->about)/3))}}</p>
										<div class="flex items-center flex-wrap ">
											<a href="/lab/{{$lab->slug}}/theses/{{$thesis->slug}}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
												<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path d="M5 12h14"></path>
												<path d="M12 5l7 7-7 7"></path>
												</svg>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="p-4 md:w-1/3">
								<div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
									<img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://dummyimage.com/721x401" alt="blog">
									<div class="p-6">
										<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Research</h2>
										@php
										$research = $lab->research->random(1)->take(1)[0];
										@endphp
										<h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$research->name}}</h1>
										<p class="leading-relaxed mb-3">{{substr($research->about,0,strpos($research->about,' ',strlen($research->about)/3))}}</p>
										<div class="flex items-center flex-wrap">
											<a href="/lab/{{$lab->slug}}/research/{{$research->slug}}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
												<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path d="M5 12h14"></path>
												<path d="M12 5l7 7-7 7"></path>
												</svg>
											</a>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
</x-layout>