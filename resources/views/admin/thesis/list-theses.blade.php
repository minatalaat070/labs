<x-admin-dashboard-layout name="theses">
	<div class="inline-flex mt-2 ml-2">
		<a href="{{route("create_thesis")}}" class=" bg-green-500 m-2 p-2 px-8 text-white hover:shadow-lg text-lg font-thin">{{__("add")}}</a>
	</div>
	<div class="table w-full p-2">

		<table class="w-full border">
			<thead>
				<tr class="bg-gray-50 border-b">
					<th class="border-r p-2">#</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							{{__("thesis_title")}} <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
						</div>
					</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							{{__("belongs_to_lab")}}<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"></path></svg>
						</div>
					</th>
					<th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
						<div class="flex items-center justify-center">
							{{__('thesis_about')}} <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewbox="0 0 24 24" stroke="currentColor">
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
				$counter = ($cc-1) * $theses->perPage();
			}
			@endphp
			<tbody>
				@foreach($theses as $thesis)
				<tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
					<td class="p-2 border-r">{{++$counter}}</td>
					<td class="p-2 border-r">{{$isAr?$thesis->title_ar:$thesis->title}}</td>
					<td class="p-2 border-r">{{$isAr?$thesis->lab->name_ar:$thesis->lab->name}}</td>
					<td class="p-2 border-r text-justify">{{$isAr?$thesis->about_ar:$thesis->about}}</td>
					<td>
						<div class="inline-flex">
							<a  href="{{route("edit_thesis",$thesis->slug)}}" class="my-4 mr-2 ml-4 bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">{{__("edit")}}</a>
							<form  class="my-4 mr-4 ml-2" method="POST" action="{{route("delete_thesis",$thesis->id)}}">
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
		{{$theses->links()}}	
	</div>
</x-admin-dashboard-layout>