@extends('layouts.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[280px] rounded-bl-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]">
    </div>
    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <div class="flex flex-col gap-1">
            <p>Good day,</p>
            <h1 class="font-bold text-xl leading-[30px]">Explore Cozy Home</h1>
        </div>
        <a href="#" class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
            <img src="assets/images/icons/notification.svg" class="w-[28px] h-[28px]" alt="icon">
        </a>
    </div>
    <div id="Categories" class="swiper w-full overflow-x-hidden mt-[30px]">
        <div class="swiper-wrapper">
            @foreach ($categories as $category)
                <div class="swiper-slide !w-fit pb-[30px]">
                    <a href="categories.html" class="card">
                        <div
                            class="flex flex-col items-center w-[120px] shrink-0 rounded-[40px] p-4 pb-5 gap-3 bg-white shadow-[0px_12px_30px_0px_#0000000D] text-center">
                            <div class="w-[70px] h-[70px] rounded-full flex shrink-0 overflow-hidden">
                                <img src="{{ asset('storage/' . $category->image) }}" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <h3 class="font-semibold">{{ $category->name }}</h3>
                                <p class="text-sm text-ngekos-grey">1,304 Kos</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <section id="Popular" class="flex flex-col gap-4">
        <div class="flex items-center justify-between px-5">
            <h2 class="font-bold">Popular Kos</h2>
            <a href="#">
                <div class="flex items-center gap-2">
                    <span>See all</span>
                    <img src="assets/images/icons/arrow-right.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                </div>
            </a>
        </div>
        <div class="swiper w-full overflow-x-hidden">
            <div class="swiper-wrapper">
                @foreach ($popularBoardingHouses as $popularBoardingHouse)
                    <div class="swiper-slide !w-fit">
                        <a href="details.html" class="card">
                            <div
                                class="flex flex-col w-[250px] shrink-0 rounded-[30px] border border-[#F1F2F6] p-4 pb-5 gap-[10px] hover:border-[#91BF77] transition-all duration-300">
                                <div class="flex w-full h-[150px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                                    <img src="{{ Storage::url($popularBoardingHouse->thumbnail) }}" class="w-full h-full object-cover"
                                        alt="thumbnail">
                                </div>
                                <div class="flex flex-col gap-3">
                                    <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{ $popularBoardingHouse->name }}</h3>
                                    <hr class="border-[#F1F2F6]">
                                    <div class="flex items-center gap-[6px]">
                                        <img src="assets/images/icons/location.svg" class="w-5 h-5 flex shrink-0"
                                            alt="icon">
                                        <p class="text-sm text-ngekos-grey">{{ $popularBoardingHouse->city->name }}</p>
                                    </div>
                                    <div class="flex items-center gap-[6px]">
                                        <img src="assets/images/icons/3dcube.svg" class="w-5 h-5 flex shrink-0"
                                            alt="icon">
                                        <p class="text-sm text-ngekos-grey">In {{ $popularBoardingHouse->category->name }}</p>
                                    </div>
                                    <div class="flex items-center gap-[6px]">
                                        <img src="assets/images/icons/profile-2user.svg" class="w-5 h-5 flex shrink-0"
                                            alt="icon">
                                        <p class="text-sm text-ngekos-grey">4 People</p>
                                    </div>
                                    <hr class="border-[#F1F2F6]">
                                    <p class="font-semibold text-lg text-ngekos-orange">Rp {{ $popularBoardingHouse->price }}<span
                                            class="text-sm text-ngekos-grey font-normal">/bulan</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="Cities" class="flex flex-col p-5 gap-4 bg-[#F5F6F8] mt-[30px]">
        <div class="flex items-center justify-between">
            <h2 class="font-bold">Browse Cities</h2>
            <a href="#">
                <div class="flex items-center gap-2">
                    <span>See all</span>
                    <img src="assets/images/icons/arrow-right.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                </div>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-4">
        @foreach ($cities as $city)
            <a href="cities.html" class="card">
                <div
                    class="flex items-center rounded-[22px] p-[10px] gap-3 bg-white border border-white overflow-hidden hover:border-[#91BF77] transition-all duration-300">
                    <div
                        class="w-[55px] h-[55px] flex shrink-0 rounded-full border-4 border-white ring-1 ring-[#F1F2F6] overflow-hidden">
                        <img src="{{ Storage::url($city->image) }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <h3 class="font-semibold">{{ $city->name }}</h3>
                        <p class="text-sm text-ngekos-grey">1,304 Kos</p>
                    </div>
                </div>
            </a>
            
        @endforeach
        </div>
    </section>
    <section id="Best" class="flex flex-col gap-4 px-5 mt-[30px]">
        <div class="flex items-center justify-between">
            <h2 class="font-bold">All Great Koskos</h2>
            <a href="#">
                <div class="flex items-center gap-2">
                    <span>See all</span>
                    <img src="assets/images/icons/arrow-right.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                </div>
            </a>
        </div>
        <div class="flex flex-col gap-4">
        @foreach ($boardingHouses as $boardingHouse)
            
            <a href="details.html" class="card">
                <div
                    class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] transition-all duration-300">
                    <div class="flex w-[120px] h-[183px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                        <img src="{{ Storage::url($boardingHouse->thumbnail) }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <div class="flex flex-col gap-3 w-full">
                        <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{ $boardingHouse->name }}</h3>
                        <hr class="border-[#F1F2F6]">
                        <div class="flex items-center gap-[6px]">
                            <img src="assets/images/icons/location.svg" class="w-5 h-5 flex shrink-0" alt="icon">
                            <p class="text-sm text-ngekos-grey">{{ $boardingHouse->city->name }}</p>
                        </div>
                        <div class="flex items-center gap-[6px]">
                            <img src="assets/images/icons/profile-2user.svg" class="w-5 h-5 flex shrink-0"
                                alt="icon">
                            <p class="text-sm text-ngekos-grey">4 People</p>
                        </div>
                        <hr class="border-[#F1F2F6]">
                        <p class="font-semibold text-lg text-ngekos-orange">{{ $boardingHouse->price }}<span
                                class="text-sm text-ngekos-grey font-normal">/bulan</span></p>
                    </div>
                </div>
            </a>
        @endforeach
        </div>
    </section>
    <div id="BottomNav" class="relative flex w-full h-[138px] shrink-0">
        <nav class="fixed bottom-5 w-full max-w-[640px] px-5 z-10">
            <div class="grid grid-cols-4 h-fit rounded-[40px] justify-between py-4 px-5 bg-ngekos-black">
                <a href="index.html" class="flex flex-col items-center text-center gap-2">
                    <img src="assets/images/icons/global-green.svg" class="w-8 h-8 flex shrink-0" alt="icon">
                    <span class="font-semibold text-sm text-white">Discover</span>
                </a>
                <a href="check-booking.html" class="flex flex-col items-center text-center gap-2">
                    <img src="assets/images/icons/note-favorite.svg" class="w-8 h-8 flex shrink-0" alt="icon">
                    <span class="font-semibold text-sm text-white">Orders</span>
                </a>
                <a href="find-kos.html" class="flex flex-col items-center text-center gap-2">
                    <img src="assets/images/icons/search-status.svg" class="w-8 h-8 flex shrink-0" alt="icon">
                    <span class="font-semibold text-sm text-white">Find</span>
                </a>
                <a href="#" class="flex flex-col items-center text-center gap-2">
                    <img src="assets/images/icons/24-support.svg" class="w-8 h-8 flex shrink-0" alt="icon">
                    <span class="font-semibold text-sm text-white">Help</span>
                </a>
            </div>
        </nav>
    </div>
    @include('includes.nav')
@endsection
