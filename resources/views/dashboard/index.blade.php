<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Daxshboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mb-4 mt-5 print_form" id="print_form">
                <div class="col-lg-5 col-md-6 mb-md-0 mb-4" style="height: 800px !important">
                    <div class="card h-100">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">DDEEF</h6>
                                </div>
                            </div>
                        <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0" style="height: 500px; overflow: scroll;" id="table_1">
                            <table class="table align-items-center mb-0 h-300">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Number
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Quantity
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $a)
                                            @if ($a->type == 0)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{$a->number}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{number_format($a->quantity, 0, '.', ',')}}</span>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <table class="table align-items-center mb-0 h-300">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">Total</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{number_format($sum1, 0, '.', ',')}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        <form method='POST' class="form1 no-print" action='{{ route('statistic.create') }}'>
                            @method('POST')
                            @csrf
                            <div class="row float ">
                                <div class="col-md-2"></div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Number</label>
                                    <input type="number" name="number" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="number_1 form-control border border-2 p-2" min="1" max="99" required>
                                </div>                            
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" name="quantity" data-type="currency_1" class="quantity_1 form-control border border-2 p-2" required>
                                </div>
                                <div class="col-md-2"></div>
                                <input type="number" name="type" class="form-control border border-2 p-2" value="0" hidden>
                            </div>
                            <div class="row mt-1 align-middle ">
                                <div class="col-md-3"></div>
                                <div class="mb-3 col-md-6 text-center">
                                    <button type="submit" class="btn btn-success btn-link"
                                        data-original-title="" title="">
                                        <i class="material-icons">check</i>
                                        <div class="ripple-container"></div>
                                    </button>                
                                    <button type="button" class="btn btn-danger btn-link"
                                        data-original-title="" title="">
                                        <i class="material-icons"  onclick="close_1()">close</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 mb-md-0 mb-4" style="height: 800px !important">
                    <div class="card h-100">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">LOO</h6>
                                </div>
                            </div>
                        <div class="card-body p-3">
                        <div class="table-responsive p-0" style="height: 500px; overflow: scroll;">
                            <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Number
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Quantity
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $a)
                                            @if ($a->type == 1)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{$a->number}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{number_format($a->quantity, 0, '.', ',')}}</span>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <table class="table align-items-center mb-0 h-300">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">Total</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{number_format($sum2, 0, '.', ',')}}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        <form method='POST' class="form2 no-print" action='{{ route('statistic.create') }}'>
                            @method('POST')
                            @csrf
                            <div class="row float ">
                                <div class="col-md-2"></div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Number</label>
                                    <input type="number" name="number" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="number_2 form-control border border-2 p-2"  min="1" max="99" required>
                                </div>                            
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" name="quantity" data-type="currency_2" class="quantity_2 form-control border border-2 p-2" required>
                                </div>
                                <div class="col-md-2"></div>
                                <input type="number" name="type" class="form-control border border-2 p-2" value="1" hidden>
                            </div>
                            <div class="row mt-1 align-middle ">
                                <div class="col-md-3"></div>
                                <div class="mb-3 col-md-6 text-center">
                                    <button type="submit" class="btn btn-success btn-link"
                                        data-original-title="" title="">
                                        <i class="material-icons">check</i>
                                        <div class="ripple-container"></div>
                                    </button>                
                                    <button type="button" class="btn btn-danger btn-link"
                                        data-original-title="" title="">
                                        <i class="material-icons"  onclick="closess()">close</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    </div>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function close_1() {
            $('.form1').attr('action', '{{ route('statistic.update') }}');

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $('.form1').submit();
            }
            })
        }

        $("input[data-type='currency_1']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() { 
                formatCurrency($(this), "blur");
            }
        });

         $("input[data-type='currency_2']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() { 
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }

        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.
            
            // get input value
            var input_val = input.val();
            
            // don't validate empty input
            if (input_val === "") { return; }
            
            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");
                
            // check for decimal
            if (input_val.indexOf(".") >= 0) {
                            
                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);
                
                // On blur make sure 2 numbers after decimal
                
                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;
            }
            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
    @endpush
    <style type="text/css" media="print">
        .no-print { display: none; }
    </style>
</x-layout>
