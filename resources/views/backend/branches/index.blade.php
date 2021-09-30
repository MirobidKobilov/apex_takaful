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
                    <li class="breadcrumb-item"><a href="#">Филиалы</a></li>
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
                    <h3 class="mb-0 h2">ФИЛИАЛЫ</h3>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
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
                <h5 class="modal-title" id="exampleModalLabel">ФИЛИАЛЫ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="form" method="POST" enctype="multipart/form-data">
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
                                    <label for="title_ru" class="col-form-label form-control-label">Имя Филиала (RU)</label>
                                    <input class="form-control" type="text" id="title_ru" name="title_ru">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="adress_ru" class="col-form-label form-control-label">Адрес (RU)</label>
                                    <input class="form-control" type="text" id="adress_ru" name="adress_ru">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="uz" role="tabpanel" aria-labelledby="uz-tab">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="title_uz" class="col-form-label form-control-label">Имя Филиала (UZ)</label>
                                    <input class="form-control" type="text" id="title_uz" name="title_uz">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="adress_uz" class="col-form-label form-control-label">Адрес (UZ)</label>
                                    <input class="form-control" type="text" id="adress_uz" name="adress_uz">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="en" role="tabpanel" aria-labelledby="en-tab">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="title_en" class="col-form-label form-control-label">Имя Филиала (EN)</label>
                                    <input class="form-control" type="text" id="title_en" name="title_en">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="adress_en" class="col-form-label form-control-label">Адрес (EN)</label>
                                    <input class="form-control" type="text" id="adress_en" name="adress_en">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="mail" class="col-form-label form-control-label">Почта</label>
                                <input class="form-control" type="text" id="mail" name="mail">
                            </div>
                            <div class="col-md-6">
                                <label for="coordinate" class="col-form-label form-control-label">Координаты на карте</label>
                                <input class="form-control" type="text" id="coordinate" name="coordinate">
                            </div>
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
      url: "{{ route('backend.branches.form') }}",
    },

    list: {
      url: "{{route('backend.branches.data')}}",
      datatable: {
        columns: [
          {data: 'id', name: 'id'},
          {data: 'title_ru', name: 'title_ru'}
        ],
        columnDefs: [
            {
                targets: 2,
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
      url: "{{ route('backend.branches.delete') }}",
    }
  })
</script>
@endsection
