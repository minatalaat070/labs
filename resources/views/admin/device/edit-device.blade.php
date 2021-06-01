<x-admin-dashboard-layout name="">
	<div class="overflow-y-auto">
		<div class="flex h-screen bg-gray-200 items-center justify-center">
			<div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2 mt-16">
				<div class="flex justify-center py-4">
					<div class="flex bg-purple-200 rounded-full md:p-4 p-2 border-2 border-purple-300">
						<svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
					</div>
				</div>

				<div class="flex justify-center">
					<div class="flex">
						<h1 class="text-gray-600 font-bold md:text-2xl text-xl">{{__('edit_device')}}</h1>
					</div>
				</div>
				<form action="{{route("update_device",$device->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('name_in_english')}}</label>
						<input class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text" name="name" value="{{$device->name}}"/>
					</div>
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('name_in_arabic')}}</label>
						<input dir="rtl" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" type="text"  name="name_ar" value="{{$device->name_ar}}"/>
					</div>
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('lab')}}</label>
						<select  name="lab_id" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
							<option value="{{$device->lab->id}}">{{$device->lab->name}}</option>
							@foreach($labs as $lab)
							@if(!($lab->id == $device->lab->id))
							<option value="{{$lab->id}}">{{$lab->name}}</option>
							@endif
							@endforeach
						</select>
					</div>
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('description_in_english')}}</label>
						<textarea name="description"  class="mt-4 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast="">{{$device->description}}</textarea>
					</div>
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{__('description_in_arabic')}}</label>
						<textarea dir="rtl" name="description_ar" class="mt-4 w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" data-_extension-text-contrast="">{{$device->description_ar}}</textarea>
					</div>
					<div class="grid grid-cols-1 mt-4 mx-7">
						<label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">{{__('upload_photo')}}</label>
						<div class='flex items-center justify-center w-full'>
							<label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
								<div class='flex flex-col items-center justify-center pt-7'>
									<svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
									</svg>
									<p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>{{__("select_photo")}}</p>
								</div>
								<input name="image" type='file' accept="image/*" class="hidden" />
							</label>
						</div>
					</div>
					<div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
						<button type="submit" name="submit" class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{__('edit')}}</button>
					</div>
				</form>

			</div>
		</div>
	</div>
</x-admin-dashboard-layout>
