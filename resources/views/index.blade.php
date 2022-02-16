@extends('layout') @section('content') @if (isset($results)) {!!$results->links()!!} @endif

<div class="accordion" id="details">
    @if (isset($results)) @foreach ( $results as $result)

    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{$result['id']}}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$result['id']}}" aria-expanded="false" aria-controls="collapse{{$result['id']}}">
                {{$result['name']}}
            </button>
        </h2>
        <div id="collapse{{$result['id']}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$result['id']}}" data-bs-parent="#details">
            <div class="accordion-body">
                <div><strong>Species </strong> <span>{{$result['species']}}</span></div>
                <div><img src="{{$result['image']}}" alt="{{$result['name']}}" /></div>

                <!-- Origins -->
                <div class="accordion" id="details_org{{$result['id']}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_org{{$result['id']}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_org{{$result['id']}}" aria-expanded="false" aria-controls="collapse_org{{$result['id']}}">
                                Origin
                            </button>
                        </h2>
                        <div id="collapse_org{{$result['id']}}" class="accordion-collapse collapse show" aria-labelledby="heading_org{{$result['id']}}" data-bs-parent="#details__org{{$result['id']}}">
                            <div class="accordion-body">
                                <div><strong>Name </strong> <span>{{$result['origin']['name']}}</span></div>
                                <div>Location <a href="{{$result['origin']['url']}}">Click Me</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <!-- Episodes -->
                <div class="accordion" id="details_ep{{$result['id']}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_ep{{$result['id']}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_ep{{$result['id']}}" aria-expanded="false" aria-controls="collapse_ep{{$result['id']}}">
                                Episodes
                            </button>
                        </h2>
                        <div id="collapse_ep{{$result['id']}}" class="accordion-collapse collapse show" aria-labelledby="heading_ep{{$result['id']}}" data-bs-parent="#details__ep{{$result['id']}}">
                            <div class="accordion-body">
                                @for($idx=0; $idx< count($result['episode']); $idx++)

                                <div><a href="{{$result['episode'][$idx]}}">Episode {{basename($result['episode'][$idx])}}</a></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>

    @endforeach @else

    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{$result['id']}}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$result['id']}}" aria-expanded="false" aria-controls="collapse{{$result['id']}}">
                {{$result['name']}}
            </button>
        </h2>
        <div id="collapse{{$result['id']}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$result['id']}}" data-bs-parent="#details">
            <div class="accordion-body">
                <div><strong>Species </strong> <span>{{$result['species']}}</span></div>
                <div><img src="{{$result['image']}}" alt="{{$result['name']}}" /></div>

                <!-- Origins -->
                <div class="accordion" id="details_org{{$result['id']}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_org{{$result['id']}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_org{{$result['id']}}" aria-expanded="false" aria-controls="collapse_org{{$result['id']}}">
                                Origin
                            </button>
                        </h2>
                        <div id="collapse_org{{$result['id']}}" class="accordion-collapse collapse show" aria-labelledby="heading_org{{$result['id']}}" data-bs-parent="#details__org{{$result['id']}}">
                            <div class="accordion-body">
                                <div><strong>Name </strong> <span>{{$result['origin']['name']}}</span></div>
                                <div>Location <a href="{{$result['origin']['url']}}">Click Me</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <!-- Episodes -->
                <div class="accordion" id="details_ep{{$result['id']}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_ep{{$result['id']}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_ep{{$result['id']}}" aria-expanded="false" aria-controls="collapse_ep{{$result['id']}}">
                                Episodes
                            </button>
                        </h2>
                        <div id="collapse_ep{{$result['id']}}" class="accordion-collapse collapse show" aria-labelledby="heading_ep{{$result['id']}}" data-bs-parent="#details__ep{{$result['id']}}">
                            <div class="accordion-body">
                                @for($idx=0; $idx< count($result['episode']); $idx++)

                                <div><a href="{{$result['episode'][$idx]}}">Episode {{basename($result['episode'][$idx])}}</a></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
    
    @endif @if(isset($results)) {!!$results->links()!!} @endif
</div>
@endsection
