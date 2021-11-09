
$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#province-id').on('change', function () {
        var provinceId = $(this).val();
        if (provinceId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'province_id=' + provinceId,
                success: function (regions) {
                    $select = $('#region-id');
                    $select.find('option').remove();
                    $.each(regions, function (key, value)
                    {
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#region-id').html('<option value="">Select province first</option>');
        }
    }).change();    
});
