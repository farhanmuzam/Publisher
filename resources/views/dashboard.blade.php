<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#FFF9D0] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-xl font-semibold">
                    Forum Jual Beli (FJB)
                </div>
            </div>
            <div class="bg-[#FFF9D0] overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="p-6 text-gray-900">
                    @if(count($products) == 0)
                    <p>No Product</p>
                    @else
                    <div class="grid grid-cols-3 gap-8">
                        @foreach($products as $data)
                        <div class="max-w-sm bg-[#5AB2FF] rounded-lg shadow">
                            <div class="bg-center bg-no-repeat bg-contain rounded-t-lg"
                                style="background-image: url('http://127.0.0.1:8080/storage/productPhoto/{{ $data['photo'] }}')">
                                <img class="invisible w-full" src="{{ asset('assets/background.png') }}" alt="" />
                            </div>
                            <div class="p-5">
                                <h5 class="text-2xl font-bold tracking-tight text-white">
                                    {{ $data['name'] }}</h5>
                                <p class="text-sm font-medium text-white mb-2">Rp. {{ $data['price'] }}</p>
                                <p class="mb-3 font-semibold text-sm text-white">
                                    {{$data['description']}}</p>
                                <div class="flex items-center gap-x-2">
                                    @if($data['qty'] == 0)
                                    <button data-modal-target="popup-modal_{{ $data['id'] }}"
                                        data-modal-toggle="popup-modal_{{ $data['id'] }}" disabled
                                        class="disable inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Buy
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </button>
                                    @else
                                    <button data-modal-target="popup-modal_{{ $data['id'] }}"
                                        data-modal-toggle="popup-modal_{{ $data['id'] }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Buy
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </button>
                                    @endif
                                    @if($data['qty'] == 0)
                                    <p class="font-semibold text-sm">Out of Stock</p>
                                    @else
                                    <p class="text-sm text-white font-medium">Stock {{ $data['qty'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div id="popup-modal_{{ $data['id'] }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="popup-modal_{{ $data['id'] }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Are you
                                            sure you want to buy this product?</h3>
                                        <form action="{{ route('buy') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $data['id'] }}" name="product_id">
                                            <button type="submit"
                                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-hide="popup-modal_{{ $data['id'] }}" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                                                cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                    @endif
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
