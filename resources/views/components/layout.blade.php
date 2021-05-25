<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Physics Dep Labs</title>
		<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"/>
	</head>
	<header class="text-gray-600 body-font">
		<div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
			<a href="/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
					<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
				</svg>
				<span class="ml-3 text-xl">Physics Dep Labs</span>
			</a>
			<nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
				<a href ="/" class="mr-5 hover:text-gray-900">Home</a>
				<a href ="/labs" class="mr-5 hover:text-gray-900">Labs</a>
				<a href ="/events" class="mr-5 hover:text-gray-900">Events</a>
				<a href ="/contactus" class="mr-5 hover:text-gray-900">Contact Us</a>
				<a href ="/about" class="mr-5 hover:text-gray-900">About</a>
			</nav>
			<div class="flex md:inline-felx">
				<button class="flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-indigo-500 hover:text-white rounded text-base mt-4 md:mt-0" data-_extension-text-contrast="">En</button>
				<br class="ml-4 mr-4"><!-- comment -->
				<a href="/dashboard"><button class="flex items-center bg-indigo-500 text-white border-0 py-1 px-3 focus:outline-none hover:bg-gray-100 hover:text-black rounded text-base mt-4 md:mt-0" data-_extension-text-contrast="">Dashboard</button></a>
			</div>
		</div>
	</header>
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
				<span class="ml-3 text-xl">Physics Dep Labs</span>
			</a>
			<p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2021 Sohag University —
				<a href="https://www.sohag-univ.edu.eg/facsci/" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">Faculty of Science</a>
			</p>
			<span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
				<a class="text-gray-500">
					<svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
						<path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
					</svg>
				</a>
				<a class="ml-3 text-gray-500">
					<svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
						<path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
					</svg>
				</a>
				<a class="ml-3 text-gray-500">
					<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
						<rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
						<path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
					</svg>
				</a>
				<a class="ml-3 text-gray-500">
					<svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
						<path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
						<circle cx="4" cy="4" r="2" stroke="none"></circle>
					</svg>
				</a>
			</span>
		</div>
	</footer>
</html>