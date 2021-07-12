<x-layout>
	<section class="text-gray-600 body-font relative">
		<div class="container px-5 py-20 mx-auto">
			<div class="flex flex-col text-center w-full mb-12">
				<h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{__('contact')}}</h1>
<!--				<p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p>-->
			</div>
			@if(Session::get('email-sent'))
			<div class="alert alert-success" role='alert'>
				{{Session::get('email-sent')}}
			</div>
			Session::forget('email-sent');
			@endif
			<form action="{{route('send_email')}}" method="POST"  enctype="multipart/form-data" class="lg:w-1/2 md:w-2/3 mx-auto">
				@csrf
				<div class="flex flex-wrap -m-2">
					<div class="p-2 w-1/2">
						<div class="relative">
							<label for="name" class="leading-7 text-sm text-gray-600">{{__('name')}}</label>
							<input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" data-_extension-text-contrast="">
						</div>
					</div>
					<div class="p-2 w-1/2">
						<div class="relative">
							<label for="email" class="leading-7 text-sm text-gray-600">{{__('email')}}</label>
							<input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" data-_extension-text-contrast="">
						</div>
					</div>
					<div class="p-2 w-full">
						<div class="relative">
							<label for="msg" class="leading-7 text-sm text-gray-600">{{__('message')}}</label>
							<textarea id="message" name="msg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast=""></textarea>
						</div>
					</div>
					<div class="p-2 w-full">
						<button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" data-_extension-text-contrast="">Send</button>
					</div>
				</div>
			</form>
			<div class="bg-gray-100 relative flex flex-wrap py-6 rounded shadow-md w-1/2 mx-auto items-center mt-4i9">
				<div class="lg:w-1/2 px-6">
					<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">{{__('address')}}</h2>
					<p class="mt-1">Faculty of Science, Sohag University, Sohag, Egypt</p>
					<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">{{__('fax_number')}}</h2>
					<p class="leading-relaxed">+20934601159</p>
				</div>
				<div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
					<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">{{__('email')}}</h2>
					<a class="text-indigo-500 leading-relaxed" href="mailto:research.groups.physics@gmail.com">research.groups.physics@gmail.com</a>
					<h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">{{__('phone_number')}}</h2>
					<p class="leading-relaxed">+20934570000 - Ext 2211</p>
				</div>
			</div>
		</div>

	</section>
</x-layout>