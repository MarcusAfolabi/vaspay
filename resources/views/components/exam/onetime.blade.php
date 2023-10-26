<section class="one mt-7">
    <div class="flex items-center mt-8">
        <div>
            <h3 class="text-sm font-semibold">RECENT SCRATCH CARDS</h3>
        </div>
    </div>

    <div class="flex mt-4 items-center w-full rounded-lg bg-transparent">
        <div id="slider" class="snap-x flex space-x-4 text-sm">

            <div class="pl-4 flex flex-col justify-center items-center">
                <img src="{{ asset('img/electricity/ibedc.svg') }}" class="" />
                <p class="text-center">Office</p>
            </div>
            <div class="pl-4 flex flex-col justify-center items-center">
                <img src="{{ asset('img/electricity/ibedc.svg') }}" class="" />
                <p class="text-center">Home</p>
            </div>
            <div class="pl-4 flex flex-col justify-center items-center">
                <img src="{{ asset('img/electricity/ibedc.svg') }}" class="" />
                <p class="text-center">Church</p>
            </div>


        </div>
    </div>





    <form id="entryForm" class="mt-8 mb-8">
        <div class="mb-2 flex items-center">
            <div>
                <h3 class="text-sm text-purple-700 font-normal appearance-none">Service Provider</h3>
            </div>
            <div class="ml-auto">
                <button type="reset" class="text-sm font-medium text-red-500">CLEAR ENTRY</button>
            </div>
        </div>


        <div class="sm:col-span-2 w-full mt-2">
            <div class="inline-block relative w-full">
                <select required name="provider" class="custom-select block w-full appearance-none text-purple-400 bg-purple-100 border border-transparent hover:border-purple-300 px-4 h-12 pr-8 rounded leading-tight focus:outline-none focus:ring-0">
                    <option value="family">IBEDC NG</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-purple-400">

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

        <div class="mt-4 flex items-center">
            <div>
                <h3 class="text-sm text-purple-700 font-normal">Package</h3>
            </div>

        </div>


        <div class="sm:col-span-2 w-full mt-2">
            <div class="inline-block relative w-full">
                <select required name="provider" class="custom-select block w-full appearance-none text-purple-400 bg-purple-100 border border-transparent hover:border-purple-0 px-4 h-12 pr-8 rounded leading-tight focus:outline-none focus:ring-0">
                    <option value="family">IKEJA Prepaid</option>
                    <option value="family">ECKO Prepaid</option>
                    <option value="family">IBEDC Prepaid</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-purple-400">

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


        <div class="sm:col-span-2 w-full mt-4 text-sm font-normal">
            <label class="text-purple-700">Meter Number</label>


            <div class="sm:col-span-2 w-full mt-2">
                <div class="inline-block relative w-full">
                    <input type="tel" maxlength="11" name="phone" id="phoneNumberInput" value="110902838390" class="block w-full appearance-none text-purple-400 bg-purple-100 border border-transparent
                    hover:border-purple-300 px-4 h-12 pr-8 rounded leading-tight focus:outline-none focus:border-purple-500 focus:ring-0">
                </div>
            </div>


        </div>



        <div class="sm:col-span-2 w-full mt-4 text-sm font-normal">
            <label class="text-purple-700">Amount</label>


            <div class="sm:col-span-2 w-full mt-2">
                <div class="inline-block relative w-full">
                    <input type="tel" maxlength="11" name="phone" id="phoneNumberInput" value="₦ 2000" class="block w-full appearance-none text-purple-400 bg-purple-100 border border-transparent
                    hover:border-purple-300 px-4 h-12 pr-8 rounded leading-tight focus:outline-none focus:border-purple-500 focus:ring-0">
                </div>
                <p class="text-purple-700">Balance: ₦88,780.50</p>

            </div>


        </div>


        <div class="mt-5 border-b border-purple-400 pb-8">
            <label class="flex items-center">
                <input id="check-benenficiary" type="checkbox" class="bg-purple-100 checkbox-custom">
                <span class="px-2 py-3 sm:text-md"></span>
                <p class="text-sm text-purple-700">Save as Beneficiary</p>
            </label>
        </div>


    </form>


    <div class="justify-center text-center pb-20">
        <button href="#" class="bg-purple-600 text-white px-4 py-3 w-3/6 rounded-b-xl text-md">
            Buy Now
        </button>
    </div>

    <!-- ADD BENEFICIARY MODAL -->
    <div id="beneficiarymodal" class="px-8 md:px-0 fixed hidden inset-0 items-center flex justify-center bg-black bg-opacity-50 ">
        <div class="flex items-center justify-center w-full min-h-screen">
            <!-- Modal content -->
            <div style="width: 480px;" class="bg-white rounded-lg p-8 justify-center items-center">
                <!-- Modal header -->
                <div class="flex justify-between items-center">
                    <h2 class="font-medium text-2xl text-start mb-2">Add beneficiary?</h2>
                </div>

                <p class="text-base font-normal pb-6 border-b border-purple-200">This beneficiary ID and details will be saved to your account.</p>

                <div class="mt-6">
                    <label class="text-sm font-normal">Beneficiary Name</label>
                    <input type="text" maxlength="20" placeholder="Enter beneficiary name" class="mt-1 text-start block w-full border-0 rounded-md px-3 py-3 h-12 border-b border-transparent bg-purple-100 focus:border-indigo-600 focus:ring-0 sm:text-md">
                </div>
                <!-- Modal buttons -->
                <div class="border-b border-purple-200 pt-8"></div>

                <div class="flex justify-between gap-4 w-full mt-8">
                    <button type="cancel-benenficiary" id="cancel-benenficiary" style="background-color: #F2F2F2; color: #4F4F4F" class="text-center block w-full rounded-lg px-4 py-3">No, cancel</button>
                    <button id="save-benenficiary" class="bg-purple-500 text-white text-center block w-full rounded-lg px-4 py-3">Save</button>
                </div>

            </div>
        </div>
    </div>







</section>