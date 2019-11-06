<script>
    function updateMaterials(selectpicker) {
        $.ajax({
            url: "{{route('admin.materials.index')}}",
            type: "GET",
            dataType: "json",
            data: {
                searchFields : 'name',
                search : $('.bs-searchbox input').val()
            },
            success: function (data) {
                var options = [], _options;

                data.data.data.forEach(material => {
                    options.push('<option class="dropdown-item" value="' + material.id + '">' + material.name + '</option>');
                });
                
                _options = options.join('');
                $(selectpicker).html(_options);
                $(selectpicker).selectpicker('refresh');
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log(errorMessage);
            }
        });
    }

    $(window).load(function() {        
        var timeout = null;
        
        $('.bs-searchbox input').keyup(function() {
            clearTimeout(timeout);
            timeout = setTimeout(updateMaterials('#material'), 800);
        });

        $('#material').on('changed.bs.select', function () {
            var url = "{{route('admin.materials.show', ':id')}}";
            url = url.replace(':id', $(this).val());

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('input[name=price]').val(data.data.price);
                    $('input[name=description]').val(data.data.description);
                    $('input[name=quantity]').attr("max", data.data.quantity);
                    $('input[name=quantity]').val(data.data.quantity);
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    console.log(errorMessage);
                }
            });
        });

    });
</script>