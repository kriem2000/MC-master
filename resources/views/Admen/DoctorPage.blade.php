<x-scaffold>
    <div class="col-xl-12 mt-5">
        <!--begin::List Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title fw-bolder text-dark"></h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">
                <!--begin::Item-->
                <div class="d-flex flex-row align-items-center mb-7">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img src="{{ asset('assets/media/avatars/300-6.jpg') }}" class="" alt="">
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Text-->
                    <div class="flex-grow-1">
                        <h5 href="" class="text-dark fw-bolder text-hover-primary fs-6">   Name: {{$doctor->full_name}}</h5>
                        <p href="" class="text-dark fw-bolder text-hover-primary fs-6">  EMail:  {{$doctor->email}}</p>
                        <p href="" class="text-dark fw-bolder text-hover-primary fs-6">  Speciality:  {{$doctor->speciality->first()->name}}</p>
                        <p href="" class="text-dark fw-bolder text-hover-primary fs-6"> PhoneNumber:{{$doctor->phone_number}}</p>
                        <p href="" class="text-dark fw-bolder text-hover-primary fs-6">CV:    {{$doctor->CV}}</p>
                    </div>
                    <!--end::Text-->

                   
            <!--end::Body-->
        </div>
        <!--end::List Widget 2-->
    </div>
</x-scaffold>
