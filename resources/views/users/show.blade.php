@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                <div class="card" id="root">
                    <div class="card-header"><b>{{ $user->username }}</b></div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"><b>{{ __('Full name: ') }}</b></label>
                            <label class="col-md-4 col-form-label text-md-right">{{ $user->full_name}}</label>
                        </div>

                        @if ( Auth::user()->id == $user->id )
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"><b>{{ __('Email: ') }}</b></label>
                            <label class="col-md-4 col-form-label text-md-right">{{ $user->email}}</label>
                        </div>
                        @endif

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"><b>{{ __('Total number of agrees: ') }}</b></label>
                            <label class="col-md-4 col-form-label text-md-right">@{{ total_agrees }}</label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"><b>{{ __('Total number of disagrees: ') }}</b></label>
                            <label class="col-md-4 col-form-label text-md-right">@{{ total_disagrees }}</label>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"><b>{{ __('Rank: ') }}</b></label>
                            <label class="col-md-4 col-form-label text-md-right">{{ $user->rank->name }}&nbsp(Level&nbsp{{ 
                                $user->rank->level}})</label>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    var app = new Vue({
            el: "#root",
            data: {
                total_agrees: 0,
                total_disagrees: 0
            },
        mounted() {
            axios.get("/api/users/{{ $user->id }}/info")
            .then(response => {
                // handle success
                this.total_agrees = response.data[0];
                this.total_disagrees = response.data[1];

                console.log("ole");
            })
            .catch(response => {
                // handle errors
                console.log(response);
            })  
        }
    });

</script>
@endsection