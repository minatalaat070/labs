<x-admin-dashboard-layout name="misc">
	<div class="overflow-y-auto">
		<div class="flex h-auto bg-gray-200 items-center justify-center p-10">
			<div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2 mt-16">
				<div class="flex justify-center py-4">
					<div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
						<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
					</div>
				</div>

				<div class="flex justify-center">
					<div class="flex">
						<h1 class="text-gray-600 font-bold md:text-2xl text-xl">{{__('edit_misc')}}</h1>
					</div>
				</div>
				<form action="{{route("misc")}}" method="POST" enctype="multipart/form-data">
					@csrf

					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('word_in_english')}}</label>
						<textarea name="word_en"  class="mt-4 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast="">{{$word_en}}</textarea>
					</div>
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('word_in_arabic')}}</label>
						<textarea dir="rtl" name="word_ar" class="mt-4 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast="">{{$word_ar}}</textarea>
					</div>
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('about_in_english')}}</label>
						<textarea name="about_en"  class="mt-4 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast="">{{$about_en}}</textarea>
					</div>
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('about_in_arabic')}}</label>
						<textarea dir="rtl" name="about_ar" class="mt-4 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast="">{{$about_ar}}</textarea>
					</div>
					<div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
						<button type="submit" name="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{__('edit')}}</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</x-admin-dashboard-layout>
