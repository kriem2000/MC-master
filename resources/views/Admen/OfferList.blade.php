<x-scaffold>
    <div class="app-toolbar align-items-center justify-content-between">
    <!--begin::Toolbar wrapper-->
        <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                            <!--begin::Page title-->
                            <div class="d-flex flex-column align-items-start me-3 gap-2">
                                <!--begin::Title-->
                                <!--end::Title-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Toolbar wrapper-->
                        </div>
                        
                 <div class="app-content flex-column-fluid">
                <div class="card">
                     <div class="card-body p-lg-20">
                       <div class="mb-17 m-5 p-5">
                            <!--begin::Content-->
                            <div class="d-flex flex-stack mb-5">
                                <!--begin::Title-->
                                <h3 class="text-dark">Offer list</h3>
                                <!--end::Title-->
                                <!--begin::Link-->
                                @if (session()->has('success_message'))
                                <p class="text-success">{{ session()->get('success_message') }}</p>
                                @endif
                                @if (session()->has('error_message'))
                                <p class="text-danger">{{ session()->get('error_message') }}</p>
                                @endif
                                <!--end::Link-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed mb-9"></div>
                            <!--end::Separator-->
                            <!--begin::Row-->
                            <div class="row g-10">
                                @foreach ($Offers as $offer)
                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Hot sales post-->
                                    <div class="card-xl-stretch me-md-6">
                                        <!--begin::Overlay-->
                                        <a class="d-block overlay" data-fslightbox="lightbox-hot-sales">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-2x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Overlay-->
                                        <!--begin::Body-->
                                        <div class="card-xl-stretch me-md-6">
                                            <!--begin::Overlay-->
                                            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales">
                                                <!--begin::Image-->
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('{{$offer->offer_image}}')"></div>
                                                <!--end::Image-->
                                                <!--begin::Action-->
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                    <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                </div>
                                                <!--end::Action-->
                                            </a>
                                            <!--begin::Title-->
                                            <a href="#" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{ $offer->name }}</a>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 "> price:{{ $offer->price }}</div>
                                            <!--end::Text-->
                                            <!--begin::Text-->
                                            <div class="fw-bold fs-5 text-gray-600 text-dark mt-3 ">consultation:{{ $offer->consultation_number }}</div>
                                            <!--end::Text-->
                                            <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                                                <!--begin::Action-->
                                                <a href="{{ route('DeleteOffer', $offer->id) }}" class="btn btn-s btn-light-danger">Delete</a>
                                                <a href="{{ route('UpDataOfferView', $offer->id) }}" class="btn btn-s btn-light-primary">Up Date</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Hot sales post-->
                                </div>
                                <!--end::Col-->
                            @endforeach
                            </div>
                            <!--end::Row-->
                </div>
            </div>
        </div>
            </div>
    </x-scaffold>
 