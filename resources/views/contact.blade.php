<!-- edit.blade.php -->
@extends('layouts.nav')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 position-relative" style="min-height: 80vh;">
                <div class="card text-white border-light" style="top: 30%; background-color: #1A1110">
                    <div class="card-header border-light">Contact Us!</div>
                        <div class="card-body">
                            <form action="{{ route('Contactsent') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" placeholder="Type your message here"></textarea>
                                </div>

                                <button type="submit" class="btn btn-outline-light">Send</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
