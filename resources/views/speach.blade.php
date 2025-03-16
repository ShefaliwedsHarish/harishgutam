@extends('layout.header')

@section('title', 'Voice')

@section('content')
<style> 
    .hs_contact_part2 {
    background-color: #fff;
    padding-top: 60px;
    padding-left: 14%;
    border-radius: 30px;
    width: 533px;
    margin-top:90px; 
    /* height: 568px; */
}

.hs_form_part2 {
    margin-bottom:100px;  
 
}
    </style>
<body>
 
    @php 
        $route = env('APP_ENV') == 'live' ? config('live_path.assets') : config('path.assets');
    @endphp
         
    <section>
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="hs_heading">
                    <!-- Add heading content here -->
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-6 col-xl-6 ">                    
                <div class="hs_form_part2">
                    <div class="hs_contact_part2">
                        <form style="width: 26rem;" id="submitamount">
                            <!-- Amount input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="number" id="amount" name="amount" class="form-control" required />
                                <label class="form-label" for="amount">Amount</label>
                            </div>

                            <!-- Submit button -->
                            <button type="button" id="submitBtn" class="btn btn-primary btn-block mb-4">Send Amount</button>
                        </form>

                        <audio id="audioPlayer" controls style="display:none;"></audio>
                        
                        <!-- Response Message -->
                        <div id="responseMessage"></div>
                    </div>
                </div> 
            </div>
        </div>
    </section>
</body>
@endsection

@section('script')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<script>
    $(document).ready(function() {
  
        
        $('#submitBtn').click(function(e) {
            e.preventDefault(); // Prevent default behavior

            let amount = $('#amount').val(); // Get amount value

            if (amount === '') {
                alert('Please enter an amount.');
                return;
            }

            $.ajax({
                url: "{{ route('send.amount') }}", // Adjust this route accordingly
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token for security
                    amount: amount
                },
                success: function (response) {
                    console.log(response);
                if (response.success && response.audioFile) {
                    let audioUrl = response.audioFile;
                    // alert(audioUrl);

                    // Ensure audio tag is updated correctly
                    let audioPlayer = $("#audioPlayer");

                    audioPlayer.attr("src", audioUrl).hide(); // Set source
                    audioPlayer[0].load(); // Load the new source
                    audioPlayer[0].play(); // Play the audio
                } else {
                    alert("Failed to generate audio.");
                }
            }
            });
        });
    });
</script>
@endsection
