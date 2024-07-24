<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex space-x-1">
                    <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">In Process</button>
                    <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Approved</button>
                    <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">Rejected</button>
                </div>
                <div class="p-6 text-gray-900">
                    <table id="table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Customer</td>
                                <td>Product</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas as $item)
                                <tr>
                                    <td class="underline cursor-pointer">{{ $item->referencia }}</td>
                                    <td>{{ $item->fullName }}</td>
                                    <td>{{ $item->producto }}</td>
                                    <td>${{ $item->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="hidden fixed z-10 inset-0 overflow-y-auto modal-content" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-[70%]">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <div class="mt-2">
                                <div class="grid grid-cols-1 md:grid-cols-2">
                                    <div>
                                        <img src="{{ asset('css/images/galeria/1.jpg') }}" id="x_item_image" alt="..." class="w-full h-auto rounded-lg shadow-lg">
                                    </div>
                                    <div class="text-black pl-4">
                                        <h1 class="text-4xl mb-3 caldea-regular" id="x_item_name">Art title</h1>
                                        <p class="caldea-italic" id="x_item_info">...</p>
                                        <p class="caldea-bold text-2xl mt-7" id="x_item_price">...</p>
                                        <div class="grid grid-cols-2">
                                            <div>
                                                <h3>Nombre:</h3>
                                                <p id="itemNombre"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" id="closeModalButton" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                            X
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
