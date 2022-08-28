<x-scaffold>
    <div class="col-xl-12 mt-5">
        <!--begin::List Widget 2-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title fw-bolder text-dark">Pending Consultations</h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">

                @foreach ($consultations as $consultation)
                @if ( auth()->user()->id ==1)
                <!--begin::Item-->
                <div class="d-flex flex-row align-items-center mb-7">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img src="{{ asset('assets/media/avatars/300-6.jpg') }}" class="" alt="">
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Text-->
                    <div class="flex-grow-1">
                        <a href="{{ route('patientChat', [$consultation->speciality->id,$consultation->doctor->id]) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{$consultation->doctor->full_name}}</a>
                        <span class="text-muted d-block fw-bold">{{$consultation->messages->last()->content}}</span>
                    </div>
                    <!--end::Text-->
                       
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
