{{-- 

    $url : link to upload image
    ----------
    upload : param data upload through ajax
    ----------
    input[name=image] : name image when uploaded
    #review : image review when uploaded

--}}

<script>
    $('#image').change(function(){
        var upload = new FormData();
        upload.append('upload', this.files[0]);

        $.ajax({
            type:'POST',
            url: '{{$url}}',
            data:upload,
            processData: false,
            contentType: false,
            dataType : 'json',
            success:function(data){
                $('input[name=image]').val(JSON.stringify(data));
                $("#review").attr('src', data.urls.watermark);
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