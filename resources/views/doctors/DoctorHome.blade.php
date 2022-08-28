<x-scaffold>
    <div class="col-xl-12 mt-5">
        <!--begin::List Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title fw-bolder text-dark">Patient List</h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">
                @foreach ($consultations as $consultation)
                @if ( $consultation->doctor_id == auth()->user()->id && $consultation->doctor->is_approved == true )
                <!--begin::Item-->
                <div class="d-flex flex-row align-items-center mb-7">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img src="{{ asset('assets/media/avatars/300-6.jpg') }}" class="" alt="">
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Text-->
                    <div class="flex-grow-1">
                        <a href="{{ route('DoctorChat',$consultation->id) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{$consultation->patient->full_name}}</a>
                        <span class="text-muted d-block fw-bold">{{$consultation->messages->last()->content ?? "There's no messages has been sent yet"}}</span>
                    </div>
                    <!--end::Text-->

                    <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                        <a href="{{ route('IsApproved',$consultation->id) }}" class="btn btn-sm btn-flex {{ $consultation->is_approved == true ? 'btn-light-danger disabled' : 'btn-light-primary' }} fw-bolder">
                        {{ $consultation->is_approved == true ? 'approved' : 'approve now' }}
                        </a>
                    </div>

                    <div class="fs-6 fw-bolder mt-5 d-flex flex-stack">
                        <a href="{{ route('Close',$consultation->id) }}" class="btn btn-sm btn-flex {{ $consultation->close == true ? 'btn-light-danger disabled' : 'btn-light-primary' }} fw-bolder">
                        {{ $consultation->close == true ? 'closed' : 'close now' }}
                        </a>
                    </div>
                </div>
                @endif
               @endforeach
                <!--end::Item-->
                @if (session()->has('error'))
                <p class="text-danger">{{ session()->get('error') }}</p>
                @endif
            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 2-->
    </div>
</x-scaffold>
