<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>{{__('website_name')}}</title>  
		<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png"/>
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png"/>
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"/>
		<link rel="manifest" href="/site.webmanifest"/>
	</head>
	<header class="text-gray-600 body-font">
		<div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
			<a href="/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
					<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
				</svg>
				<span class="ml-3 text-xl">{{__('website_name')}}</span>
			</a>
			<nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
				<a href ="/" class="mr-5 hover:text-gray-900">{{__('home')}}</a>
				<a href ="/labs" class="mr-5 hover:text-gray-900">{{__('labs')}}</a>
				<a href ="/events" class="mr-5 hover:text-gray-900">{{__('events')}}</a>
				<a href ="/contactus" class="mr-5 hover:text-gray-900">{{__('contact')}}</a>
				<a href ="/about" class="mr-5 hover:text-gray-900">{{__('about')}}</a>
			</nav>
			<div class="flex md:inline-felx">
				<form action="{{route('locale.setting', app()->getLocale()==="ar"?"en":"ar",false)}}" method="POST">
					@csrf
					<button submit="button" name="button" class="flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-indigo-500 hover:text-white rounded text-base mt-4 md:mt-0" data-_extension-text-contrast="">
						{{app()->getLocale() === "ar"? "En":"Ar"}}
					</button>
				</form>
				<br class="ml-4 mr-4"><!-- comment -->
					<a href="/dashboard"><button class="flex items-center bg-indigo-500 text-white border-0 py-1 px-3 focus:outline-none hover:bg-gray-100 hover:text-black rounded text-base mt-4 md:mt-0" data-_extension-text-contrast="">{{__('dashboard')}}</button></a>
			</div>
		</div>
	</header>
	@php
	$isAr = app()->getLocale()==="ar";
	@endphp
	<body>
		<!-- dummy script for preventing browser flashing -->
		<script>0</script>
		{{$slot}}
	</body>
	<footer class="text-gray-600 body-font footer">
		<div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
			<a href="/" class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
					<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
				</svg>
				<span class="ml-3 text-xl">{{__('website_name')}}</span>
			</a>
			<p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2021 Sohag University —
				<a href="https://www.sohag-univ.edu.eg/facsci/" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">Faculty of Science</a>
			</p>

		</div>
	</footer>
</html>