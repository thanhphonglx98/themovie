@extends('frontend.layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
                <form class="form-inline" id="formSort">
                    <div class="form-group mx-sm-3 mb-2">


                        <form class="form-inline">
                            @if($_config['sort'])
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sort by</label>
                            <select class=" my-1 mr-sm-2" name="sort" onchange="submitForm('formSort')">
                                @foreach($_config['sort'] as $k => $v)
                                    <option @if($k == $params['sort'])  selected @endif value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Show</label>
                                <select class=" my-1 mr-sm-2" name="show" onchange="submitForm('formSort')">
                                    @foreach($_config['show'] as $k => $v)
                                        <option @if($k == $params['show'])  selected @endif value="{{ $k }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </form>

                    </div>
                </form>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @if($movies && count($movies) > 0)
                    @foreach($movies as $k => $movie)
                        @include('frontend.component.item_movie' , [ 'movie' => $movie ]  )
                    @endforeach

                    <div class="flex justify-content-center">
                        {!! $movies->appends(request()->input())->links() !!}
                    </div>

                @endif
            </div>
            <br>
        </div>

    </div>
@endsection

