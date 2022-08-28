<x-scaffold>
    <div class="col-xl-12 mt-5">
        <!--begin::List Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title fw-bolder text-dark">Doctor List</h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->

            <div class="card-body pt-2">
                @if (session()->has('success_message'))
                <p class="text-success">{{ session()->get('success_message') }}</p>
                @endif
                

                @foreach ($doctors as $doctor)
                @if($doctor->role->first()->id == 3  && $doctor->is_approved== false   && $doctor->close==false )
                <!--begin::Item-->
                <div class="d-flex flex-row align-items-center mb-7">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img src="{{ asset('assets/media/avatars/300-6.jpg') }}" class="" alt="">
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Text-->
                    <div class="flex-grow-1">
                        <a href="{{ route('DoctorPage',$doctor->id) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{$doctor->full_name}}</a>
                        <span class="text-muted d-block fw-bold">{{$doctor->email}}</span>
                    </div>
                    <!--end::Text-->

                   <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                        <a href="{{ route('d\IsApproved',$doctor->id) }}" class="btn btn-sm btn-flex {{ $doctor->is_approved == true ? 'btn-light-danger disabled' : 'btn-light-primary' }} fw-bolder">
                        {{ $doctor->is_approved == true ? 'approved' : 'approve now' }}
                        </a>
                    </div>
                    <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                        <a href="{{ route('d\Close',$doctor->id) }}" class="btn btn-sm btn-flex {{ $doctor->close == true ? 'btn-light-danger disabled' : 'btn-light-primary' }} fw-bolder">
                        {{ $doctor->close == true ? 'closed' : 'close now' }}
                        </a>
                    </div>
                </div>
                @endif
               @endforeach
                <!--end::Item-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 2-->
    </div>
</x-scaffold>
