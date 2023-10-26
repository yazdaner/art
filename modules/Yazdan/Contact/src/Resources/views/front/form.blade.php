<div class="container mt-100 mt-60">
    <div class="row align-items-center">
        <div class="col-lg-5 col-md-6 pt-2 pt-sm-0 order-2 order-md-1">
            <div class="card shadow rounded border-0">
                <div class="card-body py-5">
                    <h4 class="card-title">در تماس باشید !</h4>
                    <div class="custom-form mt-3">
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <x-input-home name="name" label="نام" required>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user fea icon-sm icons">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                    </x-input-home>
                                </div>

                                <div class="col-md-6">
                                    <x-input-home type="email" name="email" label="ایمیل" required>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-mail fea icon-sm icons">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </x-input-home>
                                </div>
                                <!--end col-->

                                <div class="col-12">
                                    <x-input-home name="mobile" label="موبایل" required>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-phone fea icon-sm icons">
                                            <path
                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                            </path>
                                        </svg>
                                    </x-input-home>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-12">
                                <x-input-home name="subject" label="موضوع" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-book fea icon-sm icons">
                                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                                    </svg>
                                </x-input-home>
                            </div>

                            <div class="col-12">
                                <x-textarea-home name="message" label="پیام" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-message-circle fea icon-sm icons clearfix">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                        </path>
                                    </svg>
                                </x-textarea-home>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">ارسال پیام</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    </form>
                </div>
                <!--end custom-form-->
            </div>
        </div>

        <div class="col-lg-7 col-md-6 order-1 order-md-2">
            <div class="card border-0">
                <div class="card-body p-0">
                    <img src="{{asset('assets/images/contact.svg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
