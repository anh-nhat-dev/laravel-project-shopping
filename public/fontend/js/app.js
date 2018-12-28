var colorClick = function(ev)
{
    ev.preventDefault()
    $('#size').html()
    $('#size').html('kích thước: ')
    let color_id = $(this).data('id')
    let sizes = Skus.filter(item => {
        return item.values.find(el => el.value_id === color_id)
    });
    sizes.map((item) => {
        let size = item.values.find(el => el.value_id !== color_id)
        $('#size').append(`<a href="#" data-id="${size.value_id}" class="size">${size.value.value}</a> `)
    })
    
    $('#color').find('a.active').eq(0).removeClass('active')
    $('#color').find('input').eq(0).val(color_id)
    $(this).addClass('active')
    addEventForSize();
}

function addEventForSize()
{
    if ($('#size').find('a').length > 0) {
        let active = $('#size').find('a').eq(0).addClass('active')
        $('#size').find('input').eq(0).val($(active).data('id'))
        $('#size').find('a').each((ind, el) => {
            $(el).click(ev => {
                let color_id = $('#color').find('a.active').eq(0).data('id')
                let size_id = $(el).data('id')
                let listSku = Skus.filter(item => {
                    return item.values.find(el => el.value_id === color_id)
                });
                let sku = listSku.find((item) => {
                    return item.values.find(el => el.value_id === size_id);
                })
                if (sku.quantity > 0) {
                    $('#quantity').show()
                    $('#addtocart').show()
                    let quantity = $('#quantity').val()
                    if (quantity >= sku.quantity) {
                        $('#quantity').val(sku.quantity)
                    }

                    $('#quantity').attr('max', sku.quantity)
                    
                } else {
                    $('#quantity').hide()
                    $('#addtocart').hide()
                }
                $('#sku_id').val(sku.id)

                $('#size').find('a.active').eq(0).removeClass('active')
                ev.preventDefault()
                $('#size').find('input').eq(0).val(size_id)
                $(el).addClass('active')
            });
        })
        active.click()
    }
}

function addCart()
{
    $(document).ready(function () {
        var quantity = 0;
        $('.quantity-right-plus').click(function (e) {
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
            $('#quantity').change()
        });

        $('.quantity-left-minus').click(function (e) {
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity - 1);
            $('#quantity').change()
        });

        $('#quantity').change(function(){
            var quantity = parseInt($('#quantity').val());
            var max = parseInt($('#quantity').attr('max'));
            if (quantity > max) {
                alert('Bạn nhập giá trị quá lớn')
                $('#quantity').val(max)
            }
            if (quantity <= 0) {
                alert('Bạn nhập giá trị quá nhỏ')
                $('#quantity').val(1)
            }

        })

        if ($('#color').find('a').length > 0) {
            let active = $('#color').find('a').eq(0).addClass('active')
            $('#color').find('input').eq(0).val($(active).data('id'))
            $('#color').find('a').each((ind, el) => {
                $(el).click(colorClick);
            })
            active.click()
        }

        $('#addtocart').click(function(e){
            e.preventDefault()
            $('#buttonaddtocart').click();
        });
        var _token = $('meta[name="csrf-token"]').attr('content')
        $('#token').val(_token)
    });

}