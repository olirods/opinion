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
                <div class="card">
                    <div class="card-header"><b>{{ $post->title }}</b></div>
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                        <p class="text-lg-right">{{ $post->user->username}}</p>

                        @if ( Auth::user()->id == $post->user_id )
                        <form method="POST"
                                action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Delete</button>
                        </form>
                        @endif

                    </div>
                    <div id="root">
                            <div class="card-footer" v-for="comment in comments">
                                @{{ comment.content }}
                                <p class="text-lg-right">@{{ comment.user.username }}</p>
                                <i>@{{comment.number_of_agrees}}&nbsp&nbsp</i>
                                <button class="material-icons text-lg-left" @click="agree(comment)">thumb_up</button>
                                <button class="material-icons text-lg-left" @click="disagree(comment)">thumb_down</button>
                                <i>&nbsp&nbsp@{{comment.number_of_disagrees}}</i>
                                <br>
                                <button v-if="{{Auth::user()->id}} == comment.user.id" @click="deleteComment(comment.id)" class="btn btn-secondary">
                                    {{ __('Delete') }}
                                    </button>
                        </form>
                            </div>
                            <div class="card-footer">
                                    <div class="col-md-6">
                                        <input id="input" type="text" class="form-control" v-model="newCommentContent">
                                        <button @click="createComment" class="btn btn-primary">
                                        {{ __('Add a comment') }}
                                        </button>
                                </div>
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
                comments: [],
                newCommentContent: '',
            },
        mounted() {
            axios.get("/api/comments/{{ $post->id }}")
            .then(response => {
                // handle success
                this.comments = response.data;

                console.log("ole");
            })
            .catch(response => {
                // handle errors
                console.log(response);
            })

            
        },
        methods: {
            createComment: function () {
                axios.post("{{ route ('api.comments.store') }}", {
                    content: this.newCommentContent,
                    post_id: {{ $post->id }},
                    user_id: {{ Auth::user()->id }},
                })
                .then(response => {
                    // handle success
                    this.comments.push(response.data);
                    this.newCommentContent = '';
                })
                .catch(response => {
                    // handle errors
                    console.log(response);
                })
            },

            deleteComment: function (comment_id) {
                axios.delete("{{ route ('api.comments.destroy') }}", {
                    data: {
                        id: comment_id
                    }
                })
                .then(response => {
                    // handle success
                    this.comments.pop(response.data);
                })
                .catch(response => {
                    // handle errors
                    console.log(response);
                })
            },

            agree: function (comment) {
                axios.post("{{ route ('api.comments.agree') }}", {
                    id: comment.id,
                })
                .then(response => {
                    // handle success
                    comment.number_of_agrees++;
                })
                .catch(response => {
                    console.log(response);
                })
            },

            disagree: function (comment) {
                axios.post("{{ route ('api.comments.disagree') }}", {
                    id: comment.id,
                })
                .then(response => {
                    // handle success
                    comment.number_of_disagrees++;
                })
                .catch(response => {
                    console.log(response);
                })
            }
        }
    });
</script>
@endsection