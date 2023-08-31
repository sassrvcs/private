@extends('layouts.master')
@section('content')
    {{-- url({{ asset('frontend/assets/images/main-banner.png')}}); --}}
    <!-- ================ start: main-banner ================ -->
    <section class="common-inner-page-banner" style="background-image: url({{ asset('frontend/assets/images/compare-packages-banner.png') }})">
        <div class="custom-container">
            <div class="left-info">
                <figure data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true" class="aos-init aos-animate">
                    <figcaption class="lg"><figcaption>Checkout</figcaption>
                </figcaption></figure>
                </div>
            <div class="center-info">
                <ul class="prev-nav-menu aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000" data-aos-once="true">
                <li><a href="https://formationshunt.co.uk">Home</a></li>
                <li><a>Checkout</a></li>
            </ul>
            </div>

            <div class="call-info aos-init aos-animate" data-aos="fade-up" data-aos-delay="150" data-aos-duration="1500" data-aos-once="true">
                <div class="icon-container">
                    <img src="https://formationshunt.co.uk/wp-content/themes/formationshunt/assets/images/ic_baseline-phone.svg">
                </div>
                <div class="text-box">
                    <p>Free Consultations 24/7</p>
                    <h4><a href="tel:020 3002 0032">020 3002 0032</a></h4>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end: main-banner ================ -->

    <!-- ================ start: checkout-sec ================ -->
    <section class="sectiongap legal rrr fix-container-width ">
        <div class="container">
           <div class="checkout-wrapper">
              <div class="checkout-notices-wrapper">
                 <div class="checkout-message" role="alert">
                    <p>“{{ end($sessionCart)['package_name'] ?? '' }}” has been added to your cart.</p> <a href="/" tabindex="1" class="theme-btn-primary con-shopping-btn">Continue shopping</a>
                 </div>
              </div>
              {{-- @dump($sessionCart) --}}
              <div class="package-steps text-center mb-4">
                 <ol class="list-inline">
                    <li class="list-inline-item active">1. Name Check</li>
                    <li class="list-inline-item active">2. Select Package</li>
                    <li class="list-inline-item active">3. Additional Services</li>
                    <li class="list-inline-item">4. Checkout</li>
                    <li class="list-inline-item">5. Company Details</li>
                 </ol>
              </div>
               <form name="checkout" method="post" class="checkout" enctype="multipart/form-data" novalidate="novalidate">
                  @csrf
                  <div class="row">
                     <div class="col-md-7 mb-4">
                        <div class="card addonservice">
                           <div class="card-header">
                              <h3>Customers also bought:</h3>
                           </div>
                           <div class="card-body">
                              @foreach($addonServices as $key => $addonService)
                                 <div class="row align-items-center mb-3 pb-2 addons">
                                    <div class="col-md-8 mb-2 mb-md-0">
                                       <h6 class="mt-0">{{ $addonService->service_name }}</h6>
                                       <p class="mt-0">{{ $addonService->short_desc }}</p>
                                    </div>
                                    <div class="col-md-2 col-6 text-md-end"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ $addonService->price }}</bdi></span></div>
                                    <div class="col-md-2 col-6 text-md-end">
                                       {{-- @if( isset(end($sessionCart)['addon_service']) && in_array($addonService->id, end($sessionCart)['addon_service']) )
                                          <a href="javascript:void(0);" class="btn btn-secondary btn-sm addserv addon_{{$addonService->id}}" data-url="{{ route('update-cart', ['id' => $addonService->id ]) }}" data-item="{{ $addonService->id }}">Add</a>
                                       @else --}}
                                       <a href="javascript:void(0);" class="btn btn-primary btn-sm addserv addon_{{$addonService->id}}" data-url="{{ route('update-cart', ['id' => $addonService->id ]) }}" data-item="{{ $addonService->id }}">Add</a>
                                       {{-- @endif --}}
                                    </div>
                                 </div>
                              @endforeach
                           </div>
                        </div>
                     </div>

                     <div class="col-md-5">
                        <div class="position-sticky top-0">
                           <div class="card basket">
                              <div class="card-header">
                                 <h3 id="order_review_heading" class="mb-3">Your Basket</h3>
                                 <div class="alert-info p-3">
                                    <p>Your new company name:</p>
                                    <p class="h6">{{ end($sessionCart)['company_name'] ?? '' }}</p>
                                 </div>
                                 <hr>
                              </div>
                              <div class="card-body">
                                 <div id="order_review" class="checkout-review-order cart-items">
                                    <table class="shop_table checkout-review-order-table" id="item-tbl">
                                       <thead>
                                          <tr>
                                             <th class="product-name" colspan="3" width="75%">Item</th>

                                             <th>&nbsp;</th>
                                             <th class="product-total text-end">Price</th>
                                          </tr>
                                       </thead>
                                       <tbody id="item-tbody">
                                          <tr class="cart_item">
                                             <td class="product-name" colspan="3">

                                                {{ end($sessionCart)['package_name'] ?? '' }}&nbsp;
                                                {!!end($sessionCart)['package_description'] ?? '' !!}
                                             </td>

                                             <td class="text-end">&nbsp;</td>
                                             <td class="product-total text-end">
                                                <span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ end($sessionCart)['price'] ?? '0' }}</bdi></span>
                                             </td>
                                          </tr>
                                          {{-- <tr class="fee row_4">
                                            <td class="product-name" colspan="3">

                                               <span>Pre-Submission Review (we check your company details to avoid mistakes)</span>
                                            </td>

                                            <td class="text-end"><a href="javascript:void(0);" data-route="{{ route('cart.destroy', ['cart' => 4] ) }}" dara-row="4" data-service_id="4.99" class="badge remove bg-secondary"><i class="fa fa-times"></i></a></td>
                                            <td class="product-total text-end">
                                               <span class="amount"><bdi><span class="Price-currencySymbol">£</span>4.99</bdi></span>
                                            </td>
                                         </tr> --}}


                                          @if( isset(end($sessionCart)['addon_service']) )
                                             @php $i=0; @endphp
                                             @foreach( end($sessionCart)['addon_service'] as $key => $value)
                                                <tr class="fee row_{{ $key }}">
                                                   <td colspan="3">{{ $value['service_name'] }}</td>
                                                   <td class="text-end"><a href="javascript:void(0);" data-route="{{ route('cart.destroy', ['cart' => $key] ) }}" dara-row="{{ $key }}" data-service_id="{{ $value['service_id'] }}" class="badge remove bg-secondary"><i class="fa fa-times"></i></a></td>
                                                   <td class="text-end"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ $value['price'] }}</bdi></span></td>
                                                </tr>
                                                @php $i++ @endphp
                                             @endforeach
                                          @endif
                                          @if( isset(end($sessionCart)['additional_service']) )

                                                <tr class="fee row_100">
                                                    <td colspan="3">{{ end($sessionCart)['additional_service']['package_name'] }}</td>
                                                    <td class="text-end"><a href="javascript:void(0);" data-route="{{ route('cart.destroy', ['cart' =>end($sessionCart)['package_id']] ) }}" dara-row="{{100 }}" data-service_id="100" class="badge remove bg-secondary"><i class="fa fa-times"></i></a></td>
                                                    <td class="text-end"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ end($sessionCart)['additional_service']['price'] }}</bdi></span></td>
                                                </tr>

                                         @endif
                                       </tbody>
                                       <tbody id="tax-tbody">
                                          <tr class="cart-subtotal text-end">
                                             <td colspan="3"></td>
                                             <th class="text-end">Net:</th>
                                             <td><span class="amount net"><bdi><span class="Price-currencySymbol">£</span></bdi></span></td>
                                          </tr>
                                          <tr class="tax-rate tax-rate-vat-1 text-end">
                                             <td colspan="3"></td>
                                             <th class="text-end">VAT:</th>
                                             <td><span class="amount vat"><bdi><span class="Price-currencySymbol">£</span></bdi></span></td>
                                          </tr>

                                          <tr class="order-total text-end">
                                             <td colspan="3"></td>
                                             <th class="text-end">Total:</th>
                                             <td><strong><span class="amount"><bdi><span class="Price-currencySymbol">£</span></bdi></span></strong> </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="agree" value="1" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                       I agree to the <a href="#" class="link-primary">Terms and Conditions</a> &amp; <a href="#" class="link-primary">Privacy Policy</a>
                                    </label>
                                    <br>
                                    <span id="error-span" style="display: none; color: red;"> You must agree to the terms and conditions. </span>
                                 </div>
                                 <div class="clearfix"></div>
                                 <a href="#" class="btn btn-primary mt-3 checkout" id="checkout-final">Checkout</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
           </div>
        </div>
     </section>
    <!-- ================ End: checkout-sec ================ -->
@endsection

@section('script')
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         // Get all "Add" buttons with the class "addserv"
         const addButtons = document.querySelectorAll(".addserv");
         const removeButtons = document.querySelectorAll(".remove");

         // Additional Pre submission review

         $(document).on('click', '.addserv', function(e) {
            // e.preventDefaault();
            const itemId = this.getAttribute('data-item');
            const apiUrl = this.getAttribute('data-url');
            console.log("Clicked item ID:", itemId);

            // Add the item to your cart using Axios (you can use your existing API endpoint here)
            axios.patch(apiUrl, {
               type: 'service'
            })
            .then(function(response) {
               // Success: Handle the response (e.g., show a success message, update the cart UI)
               console.log("{{ $i }}");

               if (response.data.service_name) {
                  // Get the table element by its ID
                  var table = document.getElementById("item-tbody");

                  // // Create a new table row
                  var newRow = document.createElement("tr");

                  // Set the class attribute of the row
                  newRow.setAttribute("class", "fee row_{{ $i }}");

                  // Set the HTML content of the row
                  newRow.innerHTML = `<td colspan="3">${response.data.service_name}</td>
                     <td class="text-end"><a href="javascript:void(0);" data-route="{{ route('cart.destroy', ['cart' => $i] ) }}" dara-row="{{ $i }}" class="badge remove bg-secondary"><i class="fa fa-times"></i></button></td>
                     <td class="text-end"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>${response.data.price}</bdi></span></td>`;

                  // Append the new row to the table
                  table.appendChild(newRow);
                  calculateTotal();
               }
            })
            .catch(function(error) {
               // Error: Handle the error (e.g., show an error message)
               console.error(error);
            });
         });

         $(document).on('click', '.remove', function() {

            const rowData = this.getAttribute('dara-row');
            const apiUrl = this.getAttribute('data-route');
            console.log(`rowData - ${rowData}, apiUrl - ${apiUrl}`);

            axios.delete(apiUrl)
            .then(function(response) {
               // Success: Handle the response (e.g., show a success message, update the cart UI)
               console.log(response);
               console.log(rowData);

               $(`.row_${rowData}`).remove();
               calculateTotal();
            })
            .catch(function(error) {
               // Error: Handle the error (e.g., show an error message)
               console.error(error);
            });
         });

         function calculateTotal() {
            var total = 0;

            var net = $('.net').text();
            var vat = $('.vat').text();

            let netWithoutSymbol = net.replace('£', '');
            let vatWithoutSymbol = vat.replace('£', '');

            // Loop through each row in the tbody
            $('#item-tbody tr').each(function() {
               // Extract the price from the row
               var price = parseFloat($(this).find('.amount bdi').text().substring(1));

               // Add the price to the total
               total += price;
            });
            total_net = parseFloat(total);
            total_vat = (parseFloat(total)*20)/100;



            console.log(total, netWithoutSymbol, vatWithoutSymbol);
            // Update the total amount in the HTML
            $('.cart-subtotal .amount bdi').text('£' + total_net.toFixed(2));
            $('.tax-rate .amount bdi').text('£' + total_vat.toFixed(2));

            total =  parseFloat(total_net) + parseFloat(total_vat);
            $('.order-total .amount bdi').text('£' + total.toFixed(2));

         }

         calculateTotal();

         $(document).on('click', '#checkout-final', function() {
            // alert('sdfs');
            if (!$('#flexCheckChecked').is(':checked')) {
               $("#error-span").show();
               return;
            } else {
               location.href = "{{ route('checkout') }}";
            }
         });
      });
   </script>
@endsection
