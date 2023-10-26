<section class="one mt-7">
    <div class="flex items-center mt-8">
        <div>
            <h3 class="sm:text-sm sm:font-semibold text-purple-900 text-xs font-medium">RECENT TRANSACTION</h3>
        </div>
       
    </div>

    <div class="flex mt-4 items-center w-full rounded-t-xl bg-purple-200 p-3 pb-4">
        <div id="slider" class="snap-x flex space-x-4 text-sm">
            <div class="scroll-ms-6 pl-4 flex flex-col justify-center items-center"> 
                <img src="{{ asset('img/network/glo.svg') }}" class="" /> 
                <p class="text-center text-purple-900">Dad</p>
            </div>
            <div class="pl-4 flex flex-col justify-center items-center"> 
                <img src="{{ asset('img/network/mtn.svg') }}" class="" /> 
                <p class="text-center text-purple-900">JajJay</p>
            </div>
            <div class="pl-4 flex flex-col justify-center items-center"> 
                <img src="{{ asset('img/network/glo.svg') }}" class="" /> 
                <p class="text-center text-purple-900">Leke</p>
            </div>
            <div class="pl-4 flex flex-col justify-center items-center">
                <img src="{{ asset('img/network/mtn.svg') }}" class=" justify-center" />
                <p class="text-center text-purple-900">Mum </p>
            </div>
            <div class="pl-4 flex flex-col justify-center items-center">
                <img src="{{ asset('img/network/glo.svg') }}" class=" justify-center" />
                <p class="text-center text-purple-900">Kido </p>
            </div>

        </div>
    </div>

    <form id="entryForm" class="mt-4 mb-8">
        <div class=" flex items-center">
            <div>
                <h3 class="text-purple-900 text-sm sm:text-sm font-normal appearance-none">Network Provider</h3>
            </div>
            <div class="ml-auto">
                <button type="reset" class="text-sm font-medium text-red-500">CLEAR ENTRY</button>
            </div>
        </div>


        <div class="sm:col-span-2 w-full mt-2">
            <div class="inline-block relative w-full">
                <select required name="provider" class="custom-select block w-full appearance-none text-purple-500 bg-purple-100 border border-transparent hover:border-purple-300 px-4 h-12 pr-8 rounded leading-tight focus:outline-none focus:ring-0">
                    <option value="MTN">MTN NG</option>
                    <option value="AIRTEL">AIRTEL NG</option>
                    <option value="GLO">GLO NG</option>
                    <option value="9MOBILE">9MOBILE NG</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-purple-500">
                    <svg fill="#808080" class="text-purple-900" height="12px" width="12px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
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
                <h3 class="text-sm font-normal text-purple-900">Phone Number</h3>
            </div>
            <div class="ml-auto">
                <button type="button" onclick="populatePhoneNumber()" class="text-sm font-medium text-purple-900">MY NUMBER</button>
            </div>
        </div>
        <div class="sm:col-span-2 w-full mt-2">
            <div class="inline-block relative w-full">
                <input type="tel" maxlength="11" name="phone" id="phoneNumberInput" pattern="^0(?:70|71|80|81|90|91)[0-9]{8}$" minlength="11"  class="block w-full appearance-none text-purple-500 bg-purple-100 border border-transparent
                hover:border-purple-300 px-4 h-12 pr-8 rounded leading-tight focus:outline-none focus:border-purple-500 focus:ring-0">
            </div>
        </div>
        <div class="sm:col-span-2 w-full mt-4 text-sm font-normal">
            <label class="text-purple-900">Amount</label>
            <div class="inline-block relative w-full mt-3">
                <input type="number" onclick="formatAmount()" maxlength="1" name="amount" id="amountInput"  class="block w-full appearance-none text-purple-500 bg-purple-100 border border-transparent
                hover:border-purple-300 px-4 h-12 pr-8 rounded leading-tight focus:outline-none focus:border-purple-500 focus:ring-0">
            </div>
            <p class="text-purple-900">Balance: ₦88,780.50</p>
        </div>


        <div class="mt-5 border-b border-purple-200 pb-8">
            <label class="flex items-center">
                <input id="check-benenficiary" type="checkbox" class="border-purple-900 checkbox-custom">
                <span class="px-2 py-3 sm:text-md"></span>
                <p class="text-sm text-purple-900">Save as Beneficiary</p>
            </label>
        </div>
    </form>

    <div class="justify-center text-center pb-20">
        <button href="#" class="bg-purple-600 text-white px-4 py-3 w-3/6 rounded-b-xl text-md">
            Buy Now
        </button>
    </div> 
</section>
