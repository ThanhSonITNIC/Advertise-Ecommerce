<script>
    function updateMaterials(selectpicker) {
        $.ajax({
            url: "{{route('admin.materials.index')}}",
            type: "GET",
            dataType: "json",
            data: {
                searchFields : 'name;id',
                search : $('.bs-searchbox input').val(),
            },
            success: function (data) {
                var options = [], _options;

                data.data.data.forEach(material => {
                    options.push('<option class="dropdown-item" data-subtext="'+ material.id +'" value="' + material.id + '">' + material.name + '</option>');
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
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    console.log(errorMessage);
                }
            });
        });

    });
</script>