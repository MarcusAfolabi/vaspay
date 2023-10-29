<div id="fund-modal" class="fixed hidden inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Modal content -->
        <div class="bg-white rounded-t-xl p-8 flex flex-col w-[350px] md:w-full items-center justify-center">
            <!-- Modal header -->
               
            <h2 class="font-medium text-2xl text-black mb-4 mt-2">Fund Wallet</h2>



            <div class="mt-6 flex gap-4 justify-between items-center">
                <button id="card" class="bg-purple-200 text-sm md:text-base text-purple-600 py-2.5 px-8 md:px-12 md:py-3 rounded-lg ">Debit card</button>

                <button id="virtual-account" class="bg-red-500 text-sm md:text-base text-white py-2.5 px-8 md:px-12 md:py-3 rounded-lg ">Bank transfer</button>
            </div>

            <div id="card-section" style="display: none;">

                <form action="{{ route('fund.initiate') }}" method="POST" id="payment-form" class="mt-4">
                    @csrf
                    <div class="w-full mt-4">
                        <label for="amount" class="text-sm font-normal leading-6 text-purple-700">Amount</label>
                        <div class="mt-1">
                            <input type="text" id="amount" name="amount" min="100" max="50000" class="block w-full rounded-md px-4 py-3 bg-purple-100 focus:border-purple-500 focus:ring-0 sm:text-md" placeholder="10000">
                        </div>
                        <input type="hidden" name="consumer_id" class="form-control" value="{{ auth()->user()->id }}" id="consumer_id" placeholder="Consumer ID">
                                    <input type="hidden" name="email" class="form-control" value="{{ auth()->user()->email }}" id="email" placeholder="Email">
                                    <input type="hidden" name="phone_number" class="form-control" value="{{ auth()->user()->phone }}" id="phone_number" placeholder="Phone Number">
                                    <input type="hidden" name="name" class="form-control" value="{{ auth()->user()->name }}" id="name" placeholder="Name">
                                    <input type="hidden" name="app" class="form-control" value="{{ config('app.name') }}" id="app" placeholder="Name">
                                    <input type="hidden" name="redirect" class="form-control" value="http://vaspay.test/fund/end" id="redirect">
                    </div>  
                </form>
            </div>

            <div id="virtual-section" style="display: none;">
                <a href="#" class="py-2 p-2 text-purple-800 text-sm text-center">
                    <div class="flex items-center justify-center">
                        <h1 class="text-xl"> Wema Bank: &nbsp; <span>35155129</span></h1>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 ml-2">
                            <path d="M7 3.5A1.5 1.5 0 018.5 2h3.879a1.5 1.5 0 011.06.44l3.122 3.12A1.5 1.5 0 0117 6.622V12.5a1.5 1.5 0 01-1.5 1.5h-1v-3.379a3 3 0 00-.879-2.121L10.5 5.379A3 3 0 008.379 4.5H7v-1z" />
                            <path d="M4.5 6A1.5 1.5 0 003 7.5v9A1.5 1.5 0 004.5 18h7a1.5 1.5 0 001.5-1.5v-5.879a1.5 1.5 0 00-.44-1.06L9.44 6.439A1.5 1.5 0 008.378 6H4.5z" />
                        </svg>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
</div>

<script>
    const cardButton = document.getElementById("card");
    const virtualAccountButton = document.getElementById("virtual-account");
    const cardSection = document.getElementById("card-section");
    const virtualSection = document.getElementById("virtual-section");

    cardButton.addEventListener("click", () => {
        cardSection.style.display = "block";
        virtualSection.style.display = "none";
    });

    virtualAccountButton.addEventListener("click", () => {
        cardSection.style.display = "none";
        virtualSection.style.display = "block";
    });



 

</script>