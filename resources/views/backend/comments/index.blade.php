@extends('layouts.backend')

@section('style')
<link rel="stylesheet" href="{{asset('backend/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('content')
<main class="container-fluid mt--8">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#">Комменты</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <button type="button" class="btn btn-dark m-b-sm btn-add pull-right" data-toggle="modal" data-target="#formModal">
                <i class="fa fa-plus"></i> Добавить
            </button>
        </div>
    </div>
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0 h2">КОММЕНТЫ</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Изоброжение</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog apartment-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">КОММЕНТЫ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form" method="POST" enctype="multipart/form-data">
                    {{-- @csrf --}}
                    <input type="hidden" name="id">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="true">RU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="uz-tab" data-toggle="tab" href="#uz" role="tab" aria-controls="uz" aria-selected="false">UZ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false">EN</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name_ru" class="col-form-label form-control-label">Имя (RU)</label>
                                    <input class="form-control" type="text" id="name_ru" name="name_ru">
                                    <label for="description_ru" class="col-form-label form-control-label">Описание (RU)</label>
                                    <input class="form-control" type="text" id="description_ru" name="description_ru">
                                    <label for="job_ru" class="col-form-label form-control-label">Профессия (RU)</label>
                                    <input class="form-control" type="text" id="job_ru" name="job_ru">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="uz-tab">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name_uz" class="col-form-label form-control-label">Имя (UZ)</label>
                                    <input class="form-control" type="text" id="name_uz" name="name_uz">
                                    <label for="description_uz" class="col-form-label form-control-label">Описание (UZ)</label>
                                    <input class="form-control" type="text" id="description_uz" name="description_uz">
                                    <label for="job_uz" class="col-form-label form-control-label">Профессия (UZ)</label>
                                    <input class="form-control" type="text" id="job_uz" name="job_uz">
                                </div>
                            </div>
                        </div>                            
                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name_en" class="col-form-label form-control-label">Имя (EN)</label>
                                    <input class="form-control" type="text" id="name_en" name="name_en">
                                    <label for="description_en" class="col-form-label form-control-label">Описание (EN)</label>
                                    <input class="form-control" type="text" id="description_en" name="description_en">
                                    <label for="job_en" class="col-form-label form-control-label">Профессия (EN)</label>
                                    <input class="form-control" type="text" id="job_en" name="job_en">
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="img" class="col-form-label form-control-label">Изоброжение</label>
                            <input class="form-control" type="file" id="img" name="img">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-default ajax-form">Сохранить</button>
            </div>
        </div>
    </div>
</div>

  @include('partials.remove')
@endsection

@section('script')
<script src="{{asset('backend/assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/js/crud.js')}}"></script> 
<script>
  var crud = new Crud({
    filter: true,
    form: {
      url: "{{ route('backend.comments.form') }}",
    },

    list: {
      url: "{{route('backend.comments.data')}}",
      datatable: {            
        columns: [
          {data: 'id', name: 'id'},
          {data: 'name_ru', name: 'name_ru'},
          {data: 'img', name: 'img'}
        ],
        columnDefs: [
            {
                targets: 3,
                data: null,
                searchable:false, 
                render: function (row, type, val, meta) {
                    return '<div class="text-right">' +
                    crud.makeButton(val, 'btn-default btn-edit', '<i class="fa fa-pen"></i>', [
                        ['toggle', 'modal'],
                        ['target', '#formModal']
                    ]) +
                    crud.makeButton(val, 'btn-danger', '<i class="fa fa-trash"></i>', [
                        ['toggle', 'modal'],
                        ['target', '#removeModal']
                    ]) + '</div>';
                }
            }
        ]
      }
    },

    remove: {
      url: "{{ route('backend.comments.delete') }}",
    }
  })
</script>
@endsection