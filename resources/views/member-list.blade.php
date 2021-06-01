<x-layout>
	<h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">{{ucwords($lab->name)}} {{__('lab_members')}}</h1>
	<section class="text-gray-600 body-font">
		<div class="container px-5 py-24 mx-auto">
			<div class="flex flex-wrap -m-4">
				@foreach($members as $member)
				@php
				$dynamic_name = app()->getLocale() === "ar" ? $member->name_ar : $member->name;
				$dynamic_about = app()->getLocale() === "ar" ? $member->about_ar : $member->about;
				@endphp
				<div class="p-4 md:w-1/3">
					<div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
						<img class="lg:h-48 md:h-36 w-full object-cover object-center" src="/storage/uploads/images/members/{{$member->image}}" alt="blog">
						<div class="p-6">
							<!--							<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>-->
							<h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$dynamic_name}}</h1>
							<p class="leading-relaxed mb-3">{{substr($dynamic_about,0,strpos($dynamic_about,' ',strlen($dynamic_about)/3))}}...</p>
							<div class="flex items-center flex-wrap ">
								<a href="/labs/{{$lab->slug}}/members/{{$member->user_name}}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">{{__('learn_more')}}
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
		 {{$members->links()}}
	</div>
</x-layout>