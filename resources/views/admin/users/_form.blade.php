

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#general">General</a></li>
    <li><a data-toggle="tab" href="#meta">Meta tagy</a></li>
    <li><a data-toggle="tab" href="#og_meta">OG Meta tagy</a></li>
    <li><a data-toggle="tab" href="#publish">Publikace</a></li>
</ul>

<br />

<div class="tab-content">
    <div id="general" class="tab-pane fade in active">
        <input type="hidden" name="id" value="{{ $item->id??'' }}">
        <div class="form-group">
            <label>Název</label>
            <input class="form-control" type="text" name="title" value="{{ $item->title??old('title') }}">
        </div>
        <div class="form-group">
            <label>URL</label>
            <input class="form-control" type="text" name="url" value="{{ $item->url??old('url') }}">
        </div>
        <div class="form-group">
            <label>Perex</label>
            <input class="form-control" type="text" name="perex" value="{{ $item->perex??old('perex') }}">
        </div>
        <div class="form-group">
            <label for="description">Text</label>
            <textarea id="description" name="description">{{ $item->description??old('description') }}</textarea>
            @ckeditor('description', ['height' => 200])
        </div>
        <div class="form-group">
            <label>Obrázek</label>
            <input class="form-control" type="file" name="image">
            @if(isset($item->image))<img src="{{ $item->image }}" width="200px">@else Fotka nepřiřazena @endif
        </div>
        <div class="form-group">
            <label class="switch switch-admin">
                <input type="checkbox" name="status" value="1" @if(isset($item->status) and $item->status == 1) checked @endif>
                <span class="slider round"></span>
                <div class="switch-admin-text">Status</div>
            </label>
        </div>
        <div class="form-group">
            <label class="switch switch-admin">
                <input type="checkbox" name="hp_status" value="1" @if(isset($item->hp_status) and $item->hp_status == 1) checked @endif>
                <span class="slider round"></span>
                <div class="switch-admin-text">Zobrazit na homepage</div>
            </label>
        </div>

    </div>
    <div id="meta" class="tab-pane fade">
        <div class="form-group">
            <label>META title</label>
            <input class="form-control" type="text" name="meta_title" value="{{ $item->meta_title??old('meta_title') }}">
        </div>
        <div class="form-group">
            <label>META description</label>
            <input class="form-control" type="text" name="meta_description" value="{{ $item->meta_description??old('meta_description') }}">
        </div>
        <div class="form-group">
            <label>META keywords</label>
            <input class="form-control" type="text" name="meta_keywords" value="{{ $item->meta_keywords??old('meta_keywords') }}">
        </div>
    </div>
    <div id="og_meta" class="tab-pane fade">
        <div class="form-group">
            <label>OG title</label>
            <input class="form-control" type="text" name="og_title" value="{{ $item->og_title??old('og_title') }}">
        </div>
        <div class="form-group">
            <label>OG desctiption</label>
            <input class="form-control" type="text" name="og_desctiption" value="{{ $item->og_desctiption??old('og_desctiption') }}">
        </div>
        <div class="form-group">
            <label>OG url</label>
            <input class="form-control" type="text" name="og_url" value="{{ $item->og_url??old('og_url') }}">
        </div>
        <div class="form-group">
            <label>OG type</label>
            <input class="form-control" type="text" name="og_type" value="{{ $item->og_type??old('og_type') }}">
        </div>
        <div class="form-group">
            <label>OG image</label>
            <input class="form-control" type="file" name="og_image">
            @if(isset($item->og_image))<img src="{{ $item->og_image }}" width="200px">@else Fotka nepřiřazena @endif
        </div>
    </div>
    <div id="publish" class="tab-pane fade">

    </div>
</div>



