@extends('auth.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Login with OTP</div>
            <div class="card-body">
                <form id="otpForm">
                    @csrf
                    <div class="mb-3 row">
                        <label for="mobile" class="col-md-4 col-form-label text-md-end text-start">Mobile No</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}">
                            @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <button type="button" class="col-md-3 offset-md-5 btn btn-primary" onclick="generateOTP();">Generate OTP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection

<script>
    function generateOTP() {
        let mobileNumber = $('#mobile').val();
        alert(mobileNumber);

        $.ajax({
            url: "{{ route('create') }}", // Adjust the route name if needed
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
                mobile: mobileNumber
            },
            success: function(response) {
                // Handle success, e.g., display a success message or OTP input field
                console.log('OTP generated successfully:', response);
                alert("OTP has been sent to your mobile number.");
            },
            error: function(error) {
                // Handle error, e.g., display an error message
                console.error('OTP generation failed:', error);
                alert("Failed to generate OTP. Please try again.");
            }
        });
    }
</script>
