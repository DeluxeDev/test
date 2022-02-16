@extends('layout') @section('content')
<div class="accordion" id="details">
    @foreach ( $results as $result)
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{$result['id']}}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$result['id']}}" aria-expanded="false" aria-controls="collapse{{$result['id']}}">
                {{$result['name']}}
            </button>
        </h2>
        <div id="collapse{{$result['id']}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$result['id']}}" data-bs-parent="#details">
            <div class="accordion-body">
                <div><strong>Date Aired </strong> <span>{{$result['air_date']}}</span></div>
                <div><strong>Episode</strong> <span>{{$result['episode']}}</span></div>

                <!-- Characters -->
                <div class="accordion" id="details_ep{{$result['id']}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_ep{{$result['id']}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_ep{{$result['id']}}" aria-expanded="false" aria-controls="collapse_ep{{$result['id']}}">
                                Characters
                            </button>
                        </h2>
                        <div id="collapse_ep{{$result['id']}}" class="accordion-collapse collapse show" aria-labelledby="heading_ep{{$result['id']}}" data-bs-parent="#details__ep{{$result['id']}}">
                            <div class="accordion-body">
                                @for($idx=0; $idx< count($result['characters']); $idx++)

                                <div><a href="{{$result['characters'][$idx]}}">Character {{basename($result['characters'][$idx])}}</a></div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
