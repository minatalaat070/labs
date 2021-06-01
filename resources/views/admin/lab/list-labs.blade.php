<x-admin-dashboard-layout name="labs">
	<div class="table w-full p-2">
		<table class="w-full border">
			<thead>
				<tr class="bg-gray-50 border-b">
					<th class="border-r p-2">#</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							{{__("lab_name")}} <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
						</div>
					</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							{{__("members_count")}}<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
						</div>
					</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							{{__('devices_count')}} <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
						</div>
					</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							{{__('theses_count')}}<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
						</div>
					</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							{{__('research_count')}}<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
						</div>
					</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							Action <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
						</div>
					</th>
				</tr>
			</thead>
			@php
			$isAr = app()->getLocale() === "ar";
			$counter=0;
			$cc = request()->query('page');
			if($cc){
			$counter = ($cc-1) * $labs->perPage();
			}
			@endphp
			<tbody>
				@foreach($labs as $lab)
				<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
					<td class="p-2 border-r">{{++$counter}}</td>
					<td class="p-2 border-r">{{$isAr?$lab->name_ar:$lab->name}}</td>
					<td class="p-2 border-r">{{$lab->members->count()}}</td>
					<td class="p-2 border-r">{{$lab->devices->count()}}</td>
					<td class="p-2 border-r">{{$lab->theses->count()}}</td>
					<td class="p-2 border-r">{{$lab->research->count()}}</td>
					<td>
						<div class="inline-flex">
							<a href="{{route("edit_lab",$lab->slug)}} " class="my-4 mr-2 ml-4 bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__("edit")}}</a>
							<form  class="my-4 mr-4 ml-2" method="POST" action="{{route("delete_lab",$lab->id)}}">
								@csrf
								<button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__("delete")}}</button>
							</form>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="mx-4">
		{{$labs->links()}}	
	</div>

</x-admin-dashboard-layout>