@extends('layout.main')

@section('content')
    <div class="btn-group btn-group float-right mt-3" role="group">
        @can("create", App\Models\User::class)
            <a href="{{ route('subcategories.create') }}" class="btn btn-success" title="Create New User">
                <span class="fas fa-plus" aria-hidden="true"></span>
            </a>
        @endcan
    </div>
    <p class="clearfix"></p>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <h4>Sub Category</h4>
            </div>
        </div>
        <div class="card-body">
            @if(count($subcategories) == 0)
                <div class=" text-center">
                    <h4>No Sub Categories Available.</h4>
                </div>
            @else
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Main Category </th>
                        <th>Sub Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategories as $index => $subcategory)
                        <tr>
                            
                            <td>{{ $subcategory->category->name }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    {{--  @can("view", $category)  --}}
                                        {{--  <a href="{{ route('users.show', $category->id ) }}" 
                                        class="btn btn-info btn-sm"
                                        title="View User">
                                            <i class="far fa-eye"></i>
                                        </a>  --}}
                                    {{--  @endcan  --}}
                                    {{--  @can("update", $category)  --}}
                                        <a href="{{ route('subcategories.edit', $subcategory->id ) }}" class="btn btn-primary btn-sm"
                                        title="Edit User">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    {{--  @endcan  --}}
                                    {{--  @can("delete", $category)  --}}
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                title="ডিলেট করুন"
                                                data-toggle="modal"
                                                data-target="#delete-{{$index}}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    {{--  @endcan  --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        {{--  @if($subcategories->hasPages())
            <div class="card-footer">
                <div class="float-right">
                    {!! $subcategories->render() !!}
                </div>
            </div>
        @endif  --}}
    </div>
    @foreach($subcategories as $index=>$subcategory)
        {{--  @can("delete", $category)          --}}
            <form method="POST" action="{!! route('subcategories.destroy', $subcategory->id) !!}" accept-charset="UTF-8">
                @method("DELETE")
                @csrf
                <div class="modal fade in" id="delete-{{$index}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Confirm</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p> Delete {{$subcategory->name}} ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        {{--  @endcan  --}}
    @endforeach
@endsection