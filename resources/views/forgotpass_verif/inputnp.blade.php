@extends('/forgotpass')

@section('content')
    <div class="formsection">
        <form action="/verification" id="form" method="post">
            @csrf
            <div class="isiform">
                <div class="pass_input">
                    <input type="password" id="password" class="passbox" placeholder="Password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="confirmpass">
                        <input type="password" id="confirmpassword" class="passbox" placeholder="Confirm Password" name="confirm_password" required>
                        @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="part_button">
                    <button type="submit" id="button" value="verification">
                        <p id="verification">
                            <strong>Submit New Password</strong>
                        </p>
                    </button>
                </div>



            </div>
        </form>
    </div>
@endsection
