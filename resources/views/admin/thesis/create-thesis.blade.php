<x-admin-dashboard-layout name="">
	<div class="overflow-y-auto">
		<div class="flex h-auto bg-gray-200 items-center justify-center p-10">
			<div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2 mt-12">
				<div class="flex justify-center py-4">
					<div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
						<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
					</div>
				</div>

				<div class="flex justify-center">
					<div class="flex">
						<h1 class="text-gray-600 font-bold md:text-2xl text-xl">{{__('create_thesis')}}</h1>
					</div>
				</div>
				<form action="{{ route('create_thesis') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('title_in_english')}}</label>
						<input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="title"/>
					</div>

					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('title_in_arabic')}}</label>
						<input dir="rtl" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"  name="title_ar" />
					</div>
					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('author_name_in_english')}}</label>
						<input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="author"/>
					</div>

					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('author_name_in_arabic')}}</label>
						<input dir="rtl" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"  name="author_ar" />
					</div>
					<div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
						<div class="grid grid-cols-1">
							<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('publish_year')}}</label>
							<input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="string"  placeholder="yyyy" required name="year" />
						</div>
<!--						<div class="grid grid-cols-1">
							<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('publish_hour')}}</label>
							<input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="time" placeholder="hh:mm" name="hour" required/>
						</div>-->
					</div>

					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('supervisors_names_in_english')}}</label>
						<input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="supervisors"/>
					</div>

					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('supervisors_names_in_arabic')}}</label>
						<input dir="rtl" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"  name="supervisors_ar" />
					</div>
					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('thesis_pdf_link_optional')}}</label>
						<input dir="ltr" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="url"  name="pdf_url" />
					</div>

					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('lab')}}</label>
						<select name="lab_id" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
							@foreach($labs as $lab)
							<option value="{{$lab->id}}">{{$lab->name}}</option>
							@endforeach
						</select>
					</div>
					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('about_in_english')}}</label>
						<textarea name="about" class="mt-4 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast=""></textarea>
					</div>
					<div class="grid grid-cols-1 mt-5 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('about_in_arabic')}}</label>
						<textarea dir="rtl"name="about_ar" class="mt-4 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast=""></textarea>
					</div>

					<div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
						<button type="submit" name="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{__('add')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-admin-dashboard-layout>
