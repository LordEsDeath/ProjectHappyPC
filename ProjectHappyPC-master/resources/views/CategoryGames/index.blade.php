@extends('layouts.app')

@section('content')
<!-- content categories list -->
<div class="box-title with-border">
    <h3 class="box-title"><strong> Category Games manage</strong></h3>
</div>
<div class="box-body">
    <div class="add">
        <a href="addcategorygame" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
    </div>
    <div class="container">
        <table id="example1" class="table table-bordered">
            <thead>
                <th>Category Name</th>
                <th>Tools</th>
            </thead>
            <tbody>
                @foreach ($categorygames as $category)
                    <tr>
                        <td>{{ $category->categoryName }}</td>
                        <td>
                            <!-- форма отправит на маршрут удаления записи -->
                            <form action="{{ url('deletecategory/'.$category->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <!-- ссылка на маршрут редактирования -->
                                
                                <button type="submit" class='btn btn-danger btn-sm delete btn-flat'>
                                    <i class="fa fa-trash"></i> Delete</button>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection