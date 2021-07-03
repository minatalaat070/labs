<x-layout>
	@php
	$isAr = app()->getLocale() === "ar" ? true : false;
	@endphp
	@if($isAr)
	<h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">{{__('contact')}} {{$lab->name_ar}} </h1>
	@else
	<h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">{{ucwords($lab->name)}} {{__('contact')}}</h1>
	@endif
	<div class="bg-white relative flex flex-wrap py-6 rounded shadow-md w-1/2 mx-auto">
		<div class="lg:w-1/2 px-6">
			<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">{{__('address')}}</h2>
			<p class="mt-1">{{$lab->address}}</p>
			<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">{{__('fax_number')}}</h2>
			<p class="leading-relaxed">{{$lab->fax_number}}</p>
		</div>
		<div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
			<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">{{__('email')}}</h2>
			<a class="text-indigo-500 leading-relaxed" href="mailto:{{$lab->email}}">{{$lab->email}}</a>
			<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">{{__('phone_number')}}</h2>
			<p class="leading-relaxed">{{$lab->phone_number}}</p>
		</div>
	</div>
</x-layout>