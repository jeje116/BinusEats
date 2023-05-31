@extends('/main_template')

@section('content')
    <!-- Add a hidden modal box -->
    <div class="body-section">
        <div class="topup-container">
            <div class="emoneyButton">
                <a class="button" href="/{{ $user->id }}/topup/BiPay" style="background-color: #{{ $active == 1 ? 'F9C140': 'Fad685'}}; border-bottom:{{$active == 1?'none':"solid 0.2vw rgba(0, 0, 0, 0.2)"}}"><img src="" alt=""> BiPay</a>
                <a class="button" href="/{{ $user->id }}/topup/Ovo" style="background-color: #{{ $active == 2 ? 'F9C140': 'Fad685'}}; border-bottom:{{$active == 2?'none':"solid 0.2vw rgba(0, 0, 0, 0.2)"}}">Ovo</a>
                <a class="button" href="/{{ $user->id }}/topup/GoPay"style="background-color: #{{ $active == 3 ? 'F9C140': 'Fad685'}};border-bottom:{{$active == 3?'none':"solid 0.2vw rgba(0, 0, 0, 0.2)"}}">GoPay</a>
            </div>
            <form action="{{ route('topup.process')}}" method="POST" class="topup2" onsubmit="return showTopUpConfirmation(event)">
                @csrf
                <input type="text" name="user_id" value="{{ $user->id }}" style="display: none;">
                <input type="text" name="emoney_id" value="{{ $emoney[0]->id }}" style="display: none;">
                <div class="saldo">
                    <div class="emone">
                        @foreach ($emoney as $em)
                            <img src="{{$em['img']}}" alt="">
                            <p style="margin-left:0.5vw">{{$em['name']}}</p>
                        @endforeach
                    </div>
                    @foreach ($money as $m)
                        <p>Rp{{$m['totalAmount']}}</p>
                    @endforeach
                </div>
                <input class="amount" type="text" name="amount" placeholder="INSERT AMOUNT.." required>

                <div class="method-payment">
                    <p class="method-text">Payment Methods</p>
                    <div class="methods">
                        @foreach ($method as $pm)
                            <label>
                                <input type="radio" name="payment_method" value="{{$pm['id']}}" required>
                                {{$pm['name']}}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div class="button">
                    <button type="submit" class="topup_but">
                        <p>TOP UP</p>
                    </button>
                </div>

            </form>
        </div>
        <div id="topupConfirmation" class="modal">
            <div class="modal-content">
                <h3 style="font-size: 3vw">Top Up Confirmation</h3>
                <p style="font-size: 1.5vw">Are you sure you want to top up your {{$emoney[0]->name}}?</p>

                <div class="modal-buttons">
                    <button style="font-size: 1.5vw" id="confirmTopUpButton" class="confirm-button">Yes</button>
                    <button style="font-size: 1.5vw" id="cancelTopUpButton" class="cancel-button">No</button>
                </div>
            </div>
        </div>

        <div class="history-topup">
            <div class="history-box">
                <p class="judul">History</p>
                <div class="topup-hist">
                    @foreach ($transaction as $t)
                        <div class="date">
                            <p>{{$t['transaction_day']}}, {{$t['transaction_date']}}</p>
                        </div>

                        <div class="topupp">
                            <p>{{$t['method']}}</p>

                            @if ($t['method']==="Payment")
                                <p>- Rp{{$t['amount']}}</p>
                            @else
                                <p>+ Rp{{$t['amount']}}</p>
                            @endif

                        </div>

                        <div class="time-hist">
                            <p>{{$t['transaction_time']}}</p>
                            @foreach ($tr_emone as $em)
                                @if ($em['id']==$t['emoney_id'])
                                    <div class="emoney-hist">
                                        <img src="{{$em['img']}}" alt="">
                                        <p>{{$em['name']}}</p>
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </div>

                    @endforeach
                </div>
            </div>

        </div>


    </div>
@endsection

<script>
    function showTopUpConfirmation(event) {
        event.preventDefault(); // Prevent the form from submitting directly

        // Display the pop-up overlay
        var overlay = document.getElementById("topupConfirmation");
        overlay.style.display = "block";

        // Handle "Yes" button click
        var confirmButton = document.getElementById("confirmTopUpButton");
        confirmButton.addEventListener("click", function() {
            overlay.style.display = "none"; // Hide the pop-up overlay
            event.target.submit(); // Submit the form
        });

        // Handle "No" button click
        var cancelButton = document.getElementById("cancelTopUpButton");
        cancelButton.addEventListener("click", function() {
            overlay.style.display = "none"; // Hide the pop-up overlay
        });
    }
</script>
