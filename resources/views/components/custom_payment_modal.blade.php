@if ($errors->count() > 0)
<div class="modal fade show" id="custom_payment_modal" tabindex="-1" role="" aria-labelledby="exampleModalCenterTitle" style="padding-right: 17px; display: block;" aria-modal="true">
@else
<div class="modal fade" id="custom_payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
@endif


    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Payment Process</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload();">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('checkout-custom-payment') }}" method="post">
            @csrf
        <div class="modal-body">
            <div class="form-group">
              <label for="name" class="col-form-label">Name:</label>
              <input type="text" value="{{old('custom_payment_name')}}" class="form-control @error('custom_payment_name') is-invalid @enderror" id="custom_payment_name" name="custom_payment_name" placeholder="Required">
              <span class="error" style="color: red">{{$errors->first('custom_payment_name')}}</span>
              {{-- {{$errors->first('name')}} --}}
              {{-- {{print_r($errors)}} --}}

            </div>
            <div class="form-group">
                <label for="name" class="col-form-label">Email:</label>
                <input type="email" value="{{old('custom_payment_email')}}" class="form-control @error('custom_payment_email') is-invalid @enderror" id="custom_payment_email" name="custom_payment_email" placeholder="Required">
              <span class="error" style="color: red">{{$errors->first('custom_payment_email')}}</span>

            </div>
            <div class="form-group">
                <label for="name" class="col-form-label">Amount:</label>
                <input placeholder="Required" type="number" step="0.01" class="form-control @error('custom_payment_amount') is-invalid @enderror" id="custom_payment_amount" name="custom_payment_amount" value="{{old('custom_payment_amount')}}">
              <span class="error" style="color: red">{{$errors->first('custom_payment_amount')}}</span>

              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="location.reload();" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Pay</button>
        </div>
    </form>

      </div>
    </div>
  </div>
