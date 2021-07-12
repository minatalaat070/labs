<x-admin-dashboard-layout name="stats">
	<!-- This is an example component -->
	<div class="block py-60">
		<div id="wrapper" class="max-w-xl px-4 py-4 mx-auto">
			<div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
				<div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
					<div>
						<p class="text-3xl font-semibold text-center text-gray-800">{{$labs_count}}</p>
						<p class="text-lg text-center text-gray-500">{{__('labs_count')}}</p>
					</div>
				</div>

				<div id="jh-stats-negative" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
					<div>
						<p class="text-3xl font-semibold text-center text-gray-800">{{$members_count}}</p>
						<p class="text-lg text-center text-gray-500">{{__('members_count')}}</p>
					</div>
				</div>

				<div id="jh-stats-neutral" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
					<div>
						<p class="text-3xl font-semibold text-center text-gray-800">{{$devices_count}}</p>
						<p class="text-lg text-center text-gray-500">{{__('devices_count')}}</p>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="max-w-xl px-4 py-4 mx-auto">
			<div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
				<div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 bg-white border border-gray-300 rounded">
					<div>
						<p class="text-3xl font-semibold text-center text-gray-800">{{$theses_count}}</p>
						<p class="text-lg text-center text-gray-500">{{__('theses_count')}}</p>
					</div>
				</div>

				<div id="jh-stats-negative" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
					<div>
						<p class="text-3xl font-semibold text-center text-gray-800">{{$research_count}}</p>
						<p class="text-lg text-center text-gray-500">{{__('research_count')}}</p>
					</div>
				</div>

				<div id="jh-stats-neutral" class="flex flex-col justify-center px-4 py-4 mt-4 bg-white border border-gray-300 rounded sm:mt-0">
					<div>
						<p class="text-3xl font-semibold text-center text-gray-800">{{$events_count}}</p>
						<p class="text-lg text-center text-gray-500">{{__('events_count')}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-admin-dashboard-layout>
