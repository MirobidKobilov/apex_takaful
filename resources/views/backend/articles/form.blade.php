@extends('layouts.backend')
@section('content')
<main class="container-fluid mt--8">
    <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="{{route('backend.articles.show')}}">Новости</a></li>
                    <li class="breadcrumb-item"><span>Добавить</span></li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- {{ dd($errors->all()) }} --}}
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0 h2">НОВОСТИ</h3>
                </div>
                {{-- {{dd($errors->all())}} --}}
                <form class="pt-4" action="{{ route('backend.articles.postform', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <input type="hidden" name="id">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">RU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">UZ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">EN</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="title_ru" class="col-form-label form-control-label">Заголовок</label>
                                        <input class="form-control" type="text" id="title_ru" name="title_ru" value="{{ empty($articles) ? old('title_ru') : $articles->{'title_ru'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="short_text_ru" class="col-form-label form-control-label">Краткий текст</label>
                                        <input class="form-control" type="text" id="short_text_ru" name="short_text_ru" value="{{ empty($articles) ? old('short_text_ru') : $articles->{'short_text_ru'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="text_ru" class="col-form-label form-control-label">Описание</label>
                                        <textarea type="text" class="form-control js-selector" id="text_ru" name="text_ru">{{ empty($articles) ? old('text_ru') : $articles->{'text_ru'} }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="title_uz" class="col-form-label form-control-label">Заголовок</label>
                                        <input class="form-control" type="text" id="title_uz" name="title_uz" value="{{ empty($articles) ? old('title_uz') : $articles->{'title_uz'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="short_text_uz" class="col-form-label form-control-label">Краткий текст</label>
                                        <input class="form-control" type="text" id="short_text_uz" name="short_text_uz" value="{{ empty($articles) ? old('short_text_uz') : $articles->{'short_text_uz'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="text_uz" class="col-form-label form-control-label">Описание</label>
                                        <textarea class="form-control js-selector" type="text" id="text_uz" name="text_uz">{{ empty($articles) ? old('text_uz') : $articles->{'text_uz'} }}</textarea>
                                    </div>
                                </div>
                            </div>                            
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="title_en" class="col-form-label form-control-label">Заголовок</label>
                                        <input class="form-control" type="text" id="title_en" name="title_en" value="{{ empty($articles) ? old('title_en') : $articles->{'title_en'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="short_text_en" class="col-form-label form-control-label">Краткий текст</label>
                                        <input class="form-control" type="text" id="short_text_en" name="short_text_en" value="{{ empty($articles) ? old('short_text_en') : $articles->{'short_text_en'} }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="text_en" class="col-form-label form-control-label">Описание</label>
                                        <textarea class="form-control js-selector" type="text" id="text_en" name="text_en">{{ empty($articles) ? old('text_en') : $articles->{'text_en'} }}</textarea>
                                    </div>
                                </div>
                            </div>   
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="type" class="col-form-label form-control-label">Тип</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="news" {{ (!empty($articles) && $articles->type=='news') ? 'selected' : '' }}>Новость</option>
                                        <option value="article" {{ (!empty($articles) && $articles->type=='article') ? 'selected' : '' }}>Статья</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="img" class="col-form-label form-control-label">Изоброжение</label>
                                    <input class="form-control" type="file" id="img" name="img">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="date" class="col-form-label form-control-label">Дата публикации</label>
                                        <div class="input-group">
                                            <input class="form-control date" id="date" name="published_at" value="{{ $articles ? $articles->published_at : ' ' }}" placeholder="Select date" type="text">
                                        </div>
                                        @error('published_at')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>                         
                        </div>
                        <div class="p-4 text-right">
                            <a href="{{ route('backend.articles.show') }}" class="btn btn-secondary" data-dismiss="modal">Отменить</a>
                            <button type="submit" class="btn btn-default">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script src="{{asset('backend/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('backend/assets/js/jquery.mask.js')}}"></script>
<script>
    $('.date').mask('00-00-0000', {placeholder: "день-месяц-год"});
    tinymce.init({
      selector: 'textarea',
      height: 700,
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
</script>
@endsection