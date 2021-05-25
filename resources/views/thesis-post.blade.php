<x-layout>
	<section class="text-gray-600 body-font overflow-hidden">
		<div class="container px-5 py-24 mx-auto">
			<div class="lg:w-4/5 mx-auto flex flex-wrap">
				<div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
					<h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{$thesis->title}}</h1>
					<h2 class="text-sm title-font text-gray-500 tracking-widest mb-4">Author: {{$thesis->author}}</h2>
					<h2 class="text-sm title-font text-gray-500 tracking-widest mb-4">Supervised By: {{$thesis->supervisors}}</h2>
					<!--<p class="leading-relaxed">{{$thesis->about}}</p>-->
					<div class="flex md:inline-felx mt-6 leading-relaxed">
						<a href="{{$thesis->pdf_url}}"><button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded mx-8">PDF Link</button></a>
					</div>
					<a href="/labs/{{$lab->slug}}/theses" class="text-indigo-500 inline-flex items-center mt-4">Go back
						<svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path d="M26.105,21.891c-0.229,0-0.439-0.131-0.529-0.346l0,0c-0.066-0.156-1.716-3.857-7.885-4.59
							  c-1.285-0.156-2.824-0.236-4.693-0.25v4.613c0,0.213-0.115,0.406-0.304,0.508c-0.188,0.098-0.413,0.084-0.588-0.033L0.254,13.815
							  C0.094,13.708,0,13.528,0,13.339c0-0.191,0.094-0.365,0.254-0.477l11.857-7.979c0.175-0.121,0.398-0.129,0.588-0.029
							  c0.19,0.102,0.303,0.295,0.303,0.502v4.293c2.578,0.336,13.674,2.33,13.674,11.674c0,0.271-0.191,0.508-0.459,0.562
							  C26.18,21.891,26.141,21.891,26.105,21.891z"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</section>
</x-layout>