{{-- 

    $url : link to upload image
    $name :  as id
    ----------
    upload : param data upload through ajax
    ----------
    input[name=image] : name image when uploaded
    #review : image review when uploaded

--}}

@if (isset($name))

<script>

var imageId = "#image{{$name ?? null}}";

$(imageId).change(function(){

    let imageFileName = "input[name=image{{$name ?? null}}]";
    let imageReview = "#review{{$name ?? null}}";

    let upload = new FormData();
    upload.append('upload', this.files[0]);

    if($(imageFileName) != null){
        if($(imageFileName).val() != null){
            upload.append('name', $(imageFileName).val());
        }
    }

    $.ajax({
        type:'POST',
        url: '{{$url}}',
        data:upload,
        processData: false,
        contentType: false,
        dataType : 'json',
        success:function(data){
            $(imageFileName).val("{{$name}}");
            if(data.urls.watermark != null)
                $(imageReview).attr('src', data.urls.watermark + "?" + (new Date()).getTime());
            else if(data.urls.default != null){
                $(imageReview).attr('src', data.urls.default + "?" + (new Date()).getTime());
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            switch (jqXHR.status) {
                case 422:
                    alert(jqXHR.responseJSON.errors.upload[0]);
                    break;
                default:
                    alert(errorThrown);
                    break;
            }
        }
    });
    
});

</script>

@else

<script>
    
var imageId = "#image";

$(imageId).change(function(){

    let imageFileName = "input[name=image]";
    let imageReview = "#review";

    let upload = new FormData();
    upload.append('upload', this.files[0]);

    $.ajax({
        type:'POST',
        url: '{{$url}}',
        data:upload,
        processData: false,
        contentType: false,
        dataType : 'json',
        success:function(data){
            $(imageFileName).val(JSON.stringify(data));
            if(data.urls.watermark != null)
                $(imageReview).attr('src', data.urls.watermark + "?" + (new Date()).getTime());
            else if(data.urls.default != null){
                $(imageReview).attr('src', data.urls.default + "?" + (new Date()).getTime());
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            switch (jqXHR.status) {
                case 422:
                    alert(jqXHR.responseJSON.errors.upload[0]);
                    break;
                default:
                    alert(errorThrown);
                    break;
            }
        }
    });
    
});

</script>

@endif
