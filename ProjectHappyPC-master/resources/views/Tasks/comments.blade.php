@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Comment List manage</h3>
</div>

@if (count($comments ?? '') > 0)
    <table class="table table-bordered">
        <thead>
            <th width=3%>N/#</th>
            <th width="10%">Comment</th>
            <th width=10%>User</th>
            <th width=10%>Date Create</th>
            <th width="50%">News</th>
            <th>Tools</th>
        </thead>
        <tbody>
            @foreach($comments as $index => $comment)
                <tr>
                    <td> {{ $index+1 }} </td>
                    <td> {{ $comment->body }} </td>
                    <td> {{ $comment->user->name }} </td>
                    <td> {{ $comment->created_at }} </td>
                    <td> 
                        ({{ $comment->task->created_at->format('d.m.Y') }}) | {{ $comment->task->title }} | 
                        @foreach ($tasks as $task)
                            @if($comment->task_id == $task->id) 
                             <a href="{{url('show/'.$task->id)}}">Show news</a>
                            @endif
                        @endforeach
                    </td>
                    <td>
                         
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#deleteComment{{ $comment->id }}"><i class='fa fa-trash'></i> Delete </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteComment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Delete comment ?!?!
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <form action="{{ url('deletecomment/'.$comment->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                        </div>
                    </td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
    @else
        <p>Data no found</p>
    @endif
@endsection