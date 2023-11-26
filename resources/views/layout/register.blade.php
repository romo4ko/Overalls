@extends('layout.app')
@section('content')

    <div>
        <section>
            <div class="mask d-flex align-items-center gradient-custom-3">
                <div class="container">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                        <form action="/register" method="post">

                            @csrf

                            <div class="form-outline mb-3">
                            <input type="text" name="name" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1cg">Your Name</label>
                            </div>

                            <div class="form-outline mb-3">
                            <input type="email" name="email" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example3cg">Your Email</label>
                            </div>

                            <div class="form-outline mb-3">
                            <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example4cg">Password</label>
                            </div>

                            <div class="form-check d-flex justify-content-center mb-3">
                            <input class="form-check-input me-2" type="checkbox" required value="" id="form2Example3cg" />
                            <label class="form-check-label" for="form2Example3g">
                                I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                            </label>
                            </div>

                            <div class="d-flex justify-content-center">
                            <button type="submit"
                                class="btn btn-dark btn-block btn-lg">Register</button>
                            </div>

                            <p class="text-center text-muted mt-3 mb-0">Have already an account? <a href="/admin"
                                class="fw-bold text-body"><u>Login here</u></a></p>

                        </form>

                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>

@endsection