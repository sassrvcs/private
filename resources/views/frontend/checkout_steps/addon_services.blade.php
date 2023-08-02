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
                    <p>“{{ end($sessionCart)['package_name'] ?? '' }}” has been added to your cart.</p> <a href="#" tabindex="1" class="theme-btn-primary con-shopping-btn">Continue shopping</a> 
                 </div>
              </div>
              @dump($sessionCart)
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
                                       <a href="javascript:void(0);" class="btn btn-primary btn-sm addserv" data-url="{{ route('update-cart', ['id' => $addonService->id ]) }}" data-item="{{ $addonService->id }}">Add</a>
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
                                       <tbody>
                                          <tr class="cart_item">
                                             <td class="product-name" colspan="3">
                                                {{ end($sessionCart)['package_name'] ?? '' }}&nbsp;                                                                    
                                             </td>
                                             <td class="text-end">&nbsp;</td>
                                             <td class="product-total text-end">
                                                <span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ end($sessionCart)['price'] ?? '0' }}</bdi></span>                    
                                             </td>
                                          </tr>
                                          @if( isset(end($sessionCart)['addon_service']) )
                                             @foreach( end($sessionCart)['addon_service'] as $key => $value)
                                                {{-- @dump($value) --}}
                                                <tr class="fee {{ $key }}">
                                                   <td colspan="3">{{ $value['service_name'] }}</td>
                                                   <td class="text-end"><a href="javascript:void(0);" data-route="{{ route('cart.destroy', ['cart' => $key] ) }}" dara-row="{{ $key }}" data-service_id="{{ $value['service_id'] }}" class="badge remove bg-secondary"><i class="fa fa-times"></i></a></td>
                                                   <td class="text-end"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ $value['price'] }}</bdi></span></td>
                                                </tr>
                                             @endforeach
                                          @endif

                                          {{-- <tr class="fee">
                                             <td colspan="3">Pre-Submission Review (we check your company details to avoid mistakes)</td>
                                             <td class="text-end"><a href="javascript:void(0);"  class="badge bg-secondary"><i class="fa fa-times"></i></a></td>
                                             <td class="text-end"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>4.99</bdi></span></td>
                                          </tr> --}}
                                          {{-- <tr class="fee">
                                             <td colspan="3">Pre-Submission Review (we check your company details to avoid mistakes)</td>
                                             <td class="text-end"><a href="javascript:void(0);"  class="badge bg-secondary"><i class="fa fa-times"></i></a></td>
                                             <td class="text-end"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>4.99</bdi></span></td>
                                          </tr> --}}

                                          <tr class="cart-subtotal text-end">
                                             <td colspan="3"></td>
                                             <th class="text-end">Net:</th>
                                             <td><span class="amount"><bdi><span class="Price-currencySymbol">£</span>17.98</bdi></span></td>
                                          </tr>
                                          <tr class="tax-rate tax-rate-vat-1 text-end">
                                             <td colspan="3"></td>
                                             <th class="text-end">VAT:</th>
                                             <td><span class="amount"><span class="Price-currencySymbol">£</span>3.60</span></td>
                                          </tr>
                                          <tr class="order-total text-end">
                                             <td colspan="3"></td>
                                             <th class="text-end">Total:</th>
                                             <td><strong><span class="amount"><bdi><span class="Price-currencySymbol">£</span>{{ number_format((end($sessionCart)['price'] ?? 0 + 17.98 + 4.99 + 3.60), 2) }}</bdi></span></strong> </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="agree" value="1" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                    I agree to the <a href="#" class="link-primary">Terms and Conditions</a> &amp; <a href="#" class="link-primary">Privacy Policy</a>
                                    </label>
                                 </div>
                                 <div class="clearfix"></div>
                                 <a href="javascript:void(0);" onclick="steptoChckout('checkout_step');" class="btn btn-primary mt-3">Checkout</a>
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

         // Add a click event listener to each button
         addButtons.forEach(function(button) {
            button.addEventListener("click", function() {
               // Get the item ID from the data-item attribute
               const itemId = this.getAttribute('data-item');
               const apiUrl = this.getAttribute('data-url');
               console.log("Clicked item ID:", itemId);

               // Add the item to your cart using Axios (you can use your existing API endpoint here)
               axios.patch(apiUrl, {
                  type: 'service'
               })
               .then(function(response) {
                  // Success: Handle the response (e.g., show a success message, update the cart UI)
                  console.log(response.data);

                  location.reload();

                  // Get the table element by its ID
                  // var table = document.getElementById("item-tbl");

                  // // // Create a new table row
                  // var newRow = document.createElement("tr");

                  // // // Set the class attribute of the row
                  // newRow.setAttribute("class", "fee");

                  // // // Set the HTML content of the row
                  // newRow.innerHTML = `<td colspan="3">${response.data.service_name}</td>
                  //             <td class="text-end"><a href="javascript:void(0);" class="badge bg-secondary"><i class="fa fa-times"></i></a></td>
                  //             <td class="text-end"><span class="amount"><bdi><span class="Price-currencySymbol">£</span>${response.data.price}</bdi></span></td`;

                  // // // Append the new row to the table
                  // table.appendChild(newRow);
               })
               .catch(function(error) {
                  // Error: Handle the error (e.g., show an error message)
                  console.error(error);
               });
            });
         });

         $(document).ready(function() {
            $('.remove').click(function() {
               const serviceId = this.getAttribute('data-service_id');
               const rowData = this.getAttribute('data-row');
               const apiUrl = this.getAttribute('data-route');
               
               axios.delete(apiUrl)
               .then(function(response) {
                  // Success: Handle the response (e.g., show a success message, update the cart UI)
                  console.log(response);
                  
                  $(`.${rowData}`).remove();
               })
               .catch(function(error) {
                  // Error: Handle the error (e.g., show an error message)
                  console.error(error);
               });
            });
         });

         // removeButtons.forEach(function(button) {
         //    button.addEventListener("click", function() {
         //       const serviceId = this.getAttribute('data-service_id');
         //       // const row = this.getAttribute('data-row');
         //       const apiUrl = this.getAttribute('data-route');

         //       // Add the item to your cart using Axios (you can use your existing API endpoint here)
               // axios.delete(apiUrl)
               // .then(function(response) {
               //    // Success: Handle the response (e.g., show a success message, update the cart UI)
               //    console.log(response);
                  
               //    // var row = element.parentNode.parentNode;
               //    // row.parentNode.removeChild(row);

               //    // location.reload();

               //    // const closestTr = this.closest('tr');
               //    // if (closestTr) {
               //    //    closestTr.remove();
               //    // }

               //    // const parentDiv = this.closest('tr');
               //    // parentDiv.remove();

               //    // const trElement = this.closest("tr");
               //    // trElement.parentNode.removeChild(trElement);
               // })
               // .catch(function(error) {
               //    // Error: Handle the error (e.g., show an error message)
               //    console.error(error);
               // });
            // });
         // })
      });

   </script>

   {{-- <script>
      function updateCartUI(cartItems) {
         const cartItemsContainer = document.querySelector('.cart-items');
         cartItemsContainer.innerHTML = '';

         cartItems.forEach(function(item) {
               const cartItemHTML = `
                  <tr class="addon-item">
                     <td class="product-name" colspan="3">
                           ${item.service_name}
                     </td>
                     <td class="text-end">&nbsp;</td>
                     <td class="product-total text-end">
                           <span class="amount"><bdi><span class="Price-currencySymbol">£</span>${item.price.toFixed(2)}</bdi></span>                    
                     </td>
                  </tr>
               `;
            cartItemsContainer.innerHTML += cartItemHTML;
         });
      }

      document.addEventListener("DOMContentLoaded", function() {
         // Get all "Add" buttons with the class "addserv"
         const addButtons = document.querySelectorAll(".addserv");
   
         // Add a click event listener to each button
         addButtons.forEach(function(button) {
            button.addEventListener("click", function() {
               // Get the item data from the data attribute
               const itemData = JSON.parse(this.dataset.item);

               // Get the current cart from the session (assuming the cart data is stored in a "cart" variable)
               let cart = JSON.parse(sessionStorage.getItem("cart") || "[]");

               // Add the item data to the cart
               cart.push(itemData);

               // Save the updated cart back to the session
               sessionStorage.setItem("cart", JSON.stringify(cart));

               // Update the cart UI
               updateCartUI(cart);

               // Calculate the total price and update the UI (assuming you have elements with the IDs "netPrice", "vatPrice", and "totalPrice")
               const netPrice = 17.98; // Replace with the actual net price
               const vatPrice = 3.60; // Replace with the actual VAT price
               const totalPrice = itemData.price + netPrice + vatPrice;

               document.getElementById("netPrice").innerText = '£' + netPrice.toFixed(2);
               document.getElementById("vatPrice").innerText = '£' + vatPrice.toFixed(2);
               document.getElementById("totalPrice").innerText = '£' + totalPrice.toFixed(2);
            });
         });
      });
  </script> --}}
  
@endsection