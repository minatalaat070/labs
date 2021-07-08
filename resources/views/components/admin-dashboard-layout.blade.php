<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>{{__('dashboard')}}</title>
		<meta name="author" content=""/>
		<meta name="description" content=""/>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/font.css') }}" rel="stylesheet"/>
		<style>
			.font-family-karla { font-family: karla; }
			.bg-sidebar { background: #3d68ff; }
			.cta-btn { color: #3d68ff; }
			.upgrade-btn { background: #1947ee; }
			.upgrade-btn:hover { background: #0038fd; }
			.active-nav-link { background: #1947ee; }
			.nav-item:hover { background: #1947ee; }
			.account-link:hover { background: #3d68ff; }
		</style>
	</head>
	<body class="bg-gray-100 font-family-karla flex">
		<script>0</script>

		<!--h-screen was removed and replaced by h-auto-->
		<aside class="relative bg-sidebar w-64 h-auto hidden sm:block shadow-xl">
			<div class="p-6">
				<a href="{{route('dashboard')}}" class="text-white text-3xl font-semibold uppercase">Admin</a>
				<a href="{{route('create_lab')}}">
					<button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
						<i class="fas fa-plus mr-3"></i> {{__('create_lab')}}
					</button>
				</a>
			</div>
			<nav class="text-white text-base font-semibold pt-3">
				<a href="{{route('dashboard')}}" class="flex items-center {{$name=="stats"?"active-nav-link":""}} text-white py-4 pl-6 nav-item">
					<i class="fas fa-chart-pie -alt mr-3"></i>
					{{__('statistics')}}
				</a>
				<!--				<a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
									<i class="fas fa-sticky-note mr-3"></i>
									Blank Page
								</a>-->
				<a href="{{route('dashboard_list_labs')}}" class="flex items-center text-white {{$name=="labs"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
					<i class="fas fa-table mr-3"></i>
					{{__('labs')}}
				</a>
				<a href="{{route('dashborad_list_devices')}}" class="flex items-center text-white {{$name=="devices"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
					<i class="fas fa-microscope mr-3"></i>
					{{__('devices')}}
				</a>
				<a href="{{route('dashborad_list_members')}}" class="flex items-center text-white {{$name=="members"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
					<i class="fas fa-user mr-3"></i>
					{{__('members')}}
				</a>
				<a href="{{route('dashborad_list_theses')}}" class="flex items-center text-white {{$name=="theses"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
					<i class="fas fa-align-left mr-3"></i>
					{{__('theses')}}
				</a>
				<a href="{{route('dashborad_list_research')}}" class="flex items-center text-white {{$name=="research"?"active-nav-link":""}}  opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
					<i class="fas fa-file-alt mr-3"></i>
					{{__('research')}}
				</a>
				<a href="{{route('dashborad_list_events')}}" class="flex items-center text-white  {{$name=="events"?"active-nav-link":""}}  opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
					<i class="fas fa-calendar-alt mr-3"></i>
					{{__('events')}}
				</a>
				<a href="{{route('dashborad_list_events')}}" class="flex items-center text-white  {{$name=="misc"?"active-nav-link":""}}  opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
					<i class="fas fa-file-alt mr-3"></i>
					{{__('misc')}}
				</a>
			</nav>
		</aside>
<!--h-screen was removed and replaced by h-auto-->
		<div class="w-full flex flex-col h-auto overflow-y-auto">
			<!-- Desktop Header -->
			<header class="w-full items-center  py-2 px-6 hidden sm:flex ">
				<form action="{{route('locale.setting', app()->getLocale() === "ar" ? "en" : "ar", false)}}" method="POST">
					@csrf
					<button submit="button" name="button" class="flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-indigo-500 hover:text-white rounded text-base mt-4 md:mt-0" data-_extension-text-contrast="">
						{{app()->getLocale() === "ar"? "En":"Ar"}}
					</button>
				</form>
				<div class="w-1/2"></div>
				<div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
					<button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
						<img src="{{asset('storage/uploads/images/admin.png')}}">
					</button>
					<button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
					<div x-show="isOpen" class="absolute w-38 bg-white rounded-lg shadow-lg py-2 mt-16">
<!--						<a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>-->
						<form action="{{route('logout')}}" method="POST">
							@csrf
							<button  type="submit" class="block px-4 py-2 account-link hover:text-white bg-white"> {{__('log_out')}}</button>
						</form>
					</div>
				</div>
			</header>

			<!-- Mobile Header & Nav -->
			<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
				<div class="flex items-center justify-between">
					<a href="{{route('dashboard')}}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
					<button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
						<i x-show="!isOpen" class="fas fa-bars"></i>
						<i x-show="isOpen" class="fas fa-times"></i>
					</button>
				</div>

				<!-- Dropdown Nav -->
				<nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
					<a href="{{route('dashboard')}}" class="flex items-center {{$name=="stats"?"active-nav-link":""}} text-white py-2 pl-4 nav-item">
						<i class="fas fa-chart-pie mr-3"></i>
						{{__('statistics')}}
					</a>
					<a href="{{route('dashboard_list_labs')}}" class="flex items-center text-white {{$name=="labs"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
						<i class="fas fa-table mr-3"></i>
						{{__('labs')}}
					</a>
					<a href="{{route('dashborad_list_devices')}}" class="flex items-center text-white {{$name=="devices"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
						<i class="fas fa-microscope mr-3"></i>
						{{__('devices')}}
					</a>
					<a href="{{route('dashborad_list_members')}}" class="flex items-center text-white  {{$name=="members"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
						<i class="fas fa-user mr-3"></i>
						{{__('members')}}
					</a>
					<a href="{{route('dashborad_list_theses')}}" class="flex items-center text-white  {{$name=="theses"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
						<i class="fas fa-align-left mr-3"></i>
						{{__('theses')}}
					</a>
					<a href="{{route('dashborad_list_research')}}" class="flex items-center text-white  {{$name=="research"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
						<i class="fas fa-file-alt mr-3"></i>
						{{__('research')}}
					</a>
					<a href="{{route('dashborad_list_events')}}" class="flex items-center text-white  {{$name=="research"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
						<i class="fas fa-calendar-alt mr-3"></i>
						{{__('events')}}
					</a>
					<a href="{{route('misc')}}" class="flex items-center text-white  {{$name=="misc"?"active-nav-link":""}} opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
						<i class="fas fa-calendar-alt mr-3"></i>
						{{__('misc')}}
					</a>
					<form action="{{route('logout')}}" method="POST" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
						@csrf
						<i class="fas fa-door-open mr-3"></i>
						<button  type="submit" > {{__('log_out')}}</button>
					</form>

				</nav>
			</header>

			{{$slot}}
			
			<footer class="w-full bg-white text-right p-4 mt-16">
				Built by <a target="_blank" href="" class="underline">CS 4th Year Students</a>.

			</footer>

		</div>

		<!-- AlpineJS -->
		<script src="{{mix('js/app.js')}}" defer></script>

	</body>
</html>
