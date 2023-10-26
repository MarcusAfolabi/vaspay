
<section class="auto hidden">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8 border-b border-gray-200 pb-8">
        <div>

            <div class="border border-gray-200 rounded-lg py-4 px-4 space-y-4">
                <div class="flex justify-between">
                    <p class="text-base font-normal text-black flex items-center"> <img src="{{ asset('img/network/glo.svg') }}" class="pr-2" /> 08052361689</p>
                    <p class="flex items-center text-end justify-end">
                        <input type="checkbox" id="mySwitch" class="switch-input">
                        <label for="mySwitch" class="switch-label"></label>
                    </p>
                </div>
                <div class="flex justify-between items-center text-base font-normal">
                    <p>₦5,000.00</p>
                    <p>Every week</p>
                </div>
                <div class="flex justify-end items-center gap-4">
                    <button id="edit-Data-Auto" class="rounded-lg bg-green-50 py-2 px-3 text-green-500 text-sm font-semibold">Edit</button>
                    <button id="remove-auto" class="rounded-lg text-gray-500 py-2 px-2 bg-gray-200 text-sm font-semibold">Remove</button>
                </div>
            </div>
        </div>


        <div>

            <div class="border border-gray-200 rounded-lg py-4 px-4 space-y-4">
                <div class="flex justify-between">
                    <p class="text-base font-normal text-black flex items-center"> <img src="{{ asset('img/network/mtn.svg') }}" class="pr-2" /> 08052361689</p>
                    <p class="flex items-center text-end justify-end">
                        <input type="checkbox" checked id="mySwitch" class="switch-input">
                        <label for="mySwitch" class="switch-label"></label>
                    </p>
                </div>
                <div class="flex justify-between items-center text-base font-normal">
                    <p>₦5,000.00</p>
                    <p>Every 5 days</p>
                </div>
                <div class="flex justify-end items-center gap-4">
                    <button class="rounded-lg bg-green-50 py-2 px-3 text-green-500 text-sm font-semibold">Edit</button>
                    <button class="rounded-lg text-gray-500 py-2 px-2 bg-gray-200 text-sm font-semibold">Remove</button>
                </div>
            </div>
        </div>

        <div>
            <div class="border border-gray-200 rounded-lg py-4 px-4 space-y-4">
                <div class="flex justify-between">
                    <p class="text-base font-normal text-black flex items-center"> <img src="{{ asset('img/network/mtn.svg') }}" class="pr-2" /> 08052361689</p>
                    <p class="flex items-center text-end justify-end">
                        <input type="checkbox" id="mySwitch" class="switch-input">
                        <label for="mySwitch" class="switch-label"></label>
                    </p>
                </div>
                <div class="flex justify-between items-center text-base font-normal">
                    <p>₦5,000.00</p>
                    <p>Every Day</p>
                </div>
                <div class="flex justify-end items-center gap-4">
                    <button class="rounded-lg bg-green-50 py-2 px-3 text-green-500 text-sm font-semibold">Edit</button>
                    <button class="rounded-lg text-gray-500 py-2 px-2 bg-gray-200 text-sm font-semibold">Remove</button>
                </div>
            </div>
        </div>


    </div>


    <div class="items-center w-full justify-center text-center mt-8 mb-28 md:mb-12 space-y-6">
        <p class="text-base font-normal text-center mb-8">You can have up to 5 auto top-up entries.</p>


        <span class="bg-green-500 text-white text-sm font-bold py-4 rounded px-20 md:px-24">
            <a
             href="#" >Add new auto top-up</a>
        </span>


    </div>




{{-- MODAL REMOVE --}}
    <div id="remove-modal" class="fixed hidden inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen">
            <!-- Modal content -->
            <div class="bg-white rounded-lg p-8 flex flex-col w-[380px] md:w-full items-center justify-center">
                <!-- Modal header -->
                <img class="" src="{{ asset('img/alert.svg') }}" class="justify-center mb-2" />
                <h2 class="font-medium text-2xl text-black mb-4 mt-2">Remove auto top-up?</h2>

                <div class="text-center justify-center w-full border-b border-gray-200 pb-6">
                    <p class="hidden md:block text-center font-normal">This recurring airtime purchase will be removed from<br> your account.</p>
                    <p class="block md:hidden text-center font-normal">This recurring airtime purchase will be removed from your account.</p>
                </div>

                <div class="mt-6 flex gap-4 justify-between items-center">

                    <button id="cancel-auto-modal" class="bg-gray-200 text-sm md:text-base text-black py-2.5 px-8 md:px-12 md:py-3 rounded-lg ">No, cancel</button>
                    <button class="bg-red-500 text-sm md:text-base text-white py-2.5 px-8 md:px-12 md:py-3 rounded-lg ">Yes, remove</button>
                </div>

            </div>
        </div>
    </div>






    {{-- EDIT MODAL --}}
    <div id="edit-DataAuto-Modal" class="fixed hidden inset-0  items-center justify-center bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen">
            <!-- Modal content -->
            <div class="bg-white w-[360px] lg:w-[470px] rounded-lg px-6 py-6   ">

                <!-- Modal header -->
                <h2 class="text-2xl font-medium border-b border-gray-200 pb-6">Edit auto top-up</h2>
                <div class="sm:col-span-2 mt-6">
                    <label for="gender" class="block text-sm font-normal leading-6 text-gray-900">Network Provider</label>
                    <div class="mt-2">
                        <div class="relative">
                            <select style="color: #808080;" class="my-select block w-full appearance-none bg-gray-100 border border-transparent hover:border-gray-300 px-4 py-3 pr-8 rounded leading-tight focus:outline-none focus:border-green-500 focus:ring-0">
                                <option value="Male">GLO NG</option>
                                <option value="Female">MTN NG</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                <svg fill="#808080" height="12px" width="12px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M505.752,123.582c-8.331-8.331-21.839-8.331-30.17,0L256,343.163L36.418,123.582c-8.331-8.331-21.839-8.331-30.17,0
                                                s-8.331,21.839,0,30.17l234.667,234.667c8.331,8.331,21.839,8.331,30.17,0l234.667-234.667
                                                C514.083,145.42,514.083,131.913,505.752,123.582z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="sm:col-span-2 mt-4">
                    <label for="email" class="block text-sm font-normal leading-6 text-gray-900">Phone Number</label>
                    <div class="mt-2">
                        <input type="tel" name="phone" id="phone" autocomplete="phone" class="block w-full border-0 rounded-md px-4 py-3 border-b border-transparent bg-gray-100 focus:border-green-500 focus:ring-0 sm:text-md" placeholder="08052361689">
                    </div>
                </div>
                <div class=" mt-4 mb-4">
                    <label for="email" class="block text-sm font-normal leading-6 text-gray-900">Amount</label>
                    <div class="mt-2">
                        <input type="tel" name="amount" placeholder="₦" id="amountInput" oninput="formatAmount()" required class="block w-full appearance-none text-gray-500   bg-gray-100 border border-transparent hover:border-gray-300 px-4 h-12 pr-8 rounded leading-tight focus:outline-none focus:border-green-500 focus:ring-0">
                        <p class="text-sm">Balance: ₦88,780.50</p>
                    </div>
                </div>

                <div class="flex items-start justify-start gap-40 mb-2">
                    <label class="block text-sm font-normal leading-6 text-gray-900">Frequency</label>
                    <label class="block text-sm font-normal leading-6 text-gray-900">Start Date</label>
                </div>

                <div class="grid grid-cols-2 justify-between items-center gap-4">
                    <div class="flex bg-gray-100 rounded-lg ">


                        <div class="mt-2.3 flex-grow">
                            <div class="relative">
                                <input type="text" minlength="3" maxlength="255" name="first_name" id="name" required autocomplete="given-name"
                                class="rounded-lg block border-0 px-4 py-3 border-b border-transparent bg-gray-100 focus:border-green-500
                                w-12 focus:ring-0 sm:text-md" placeholder="1">
                            </div>
                        </div>


                        <div class="mt-2.3 flex-none">
                            <div class="text-center h-full border-l border-gray-300"></div>
                        </div>
                        <div class="mt-2.3 flex-grow">
                            <div class="relative rounded-r-lg">
                                <select  class="my-select text-sm md:text-sm block w-full appearance-none bg-gray-100 border border-transparent hover:border-gray-0 px-4 py-3 leading-tight focus:outline-none focus:ring-0">
                                    <option value="week">days</option>
                                    <option value="week">week</option>
                                    <option value="week">week</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 -right-2 md:right-0 flex items-center px-4 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M6 9L12 15L18 9" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mt-2.3 flex-grow">
                        <div class="relative flex justify-center items-center">
                            <input type="text" minlength="3" maxlength="255" name="second_name" id="second_name" required autocomplete="given-name" class="rounded-lg block w-full border-0 px-4 py-3 border-b border-transparent bg-gray-100 focus:border-green-500 focus:ring-0 sm:text-md" placeholder="2 May 2023">

                            <span class="absolute top-3 right-3">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 4.5H5C3.89543 4.5 3 5.39543 3 6.5V20.5C3 21.6046 3.89543 22.5 5 22.5H19C20.1046 22.5 21 21.6046 21 20.5V6.5C21 5.39543 20.1046 4.5 19 4.5Z" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16 2.5V6.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 2.5V6.5" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 10.5H21" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                            </span>
                        </div>
                    </div>
                </div>


                <div class="w-full border-b border-gray-200 pb-6"> </div>

                <div class="flex gap-3 w-full justify-between items-center mt-4">
                    <button id="cancel-edit" class="bg-gray-100 w-full text-dark rounded-lg px-4 py-3">No, cancel</button>
                    <button class="bg-green-500 w-full text-white rounded-lg px-4 py-3">Save</button>

                </div>
            </div>
        </div>
    </div>
</section>


