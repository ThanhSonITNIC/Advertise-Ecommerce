{{-- 

    $data = [
        update,
        delete
        name,
        image,
    ]
    
--}}

<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{$name}}</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                @if(array_key_exists('update', $data))
                <li>
                    <button type="submit" class="btn-link" data-action="expand"><i class="icon-check"></i></button>
                </li>
                @endif
                @if(array_key_exists('delete', $data))
                <li><a href="{{$data['delete']}}" data-action="close"><i class="icon-trash"></i></a></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="card-block my-gallery" data-pswp-uid="1">
        <div class="row">
            <input type="text" hidden name="image{{urlencode($name) ?? null}}" value="{{$name ?? null}}">
            <input id="image{{urlencode($name) ?? null}}" type="file" hidden accept="image/*" class="custom-file-input">
            <label class="cursor-pointer" for="image{{urlencode($name) ?? null}}">
                <img id="review{{urlencode($name) ?? null}}" class="img-fluid form-control" src="{{$image}}" alt="Choose image">
            </label>
        </div>
    </div>
</div>
