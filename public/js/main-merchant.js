// chọn phân loại: đơn giản hoặc đa dạng
$('#pro_type').change(function(){
    if($('#pro_type option:selected').val()==1)
    {
        let output = '<table class="table table-hover text-center tInsertProductM">' +
                        '<thead>' +
                            '<tr>' +
                                '<th scope="col">#</th>' +           
                                '<th scope="col">Kích cỡ</th>' +
                                '<th scope="col">Giá bán</th>' +
                                '<th scope="col">Số lượng</th>' +
                                '<th scope="col"><button type="button" class="btn btn-sm btn-primary" onclick="addRowInsertProductM()"><i class="fas fa-plus"></i></button></th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>' +
                            '<tr>' +
                                '<th scope="row">1</th>' +
                                '<td>' +
                                    '<input type="text" name="size[]" class="form-control">' +
                                '</td>' +
                                '<td>' +
                                    '<input type="text" name="price[]" class="form-control">' +
                                '</td>' +
                                '<td>' +
                                    '<input type="text" name="qty[]" class="form-control">' +
                                '</td>' +
                                '<td><i class="fas fa-check"></i></td>' +
                            '</tr>' +
                        '</tbody>' +
                    '</table>';
        $('#info_sell_by_pro_type').html(output);      
    }
    else
    {
        let output = '<div class="form-group row">' +
                        '<label for="price" class="col-sm-2 col-form-label">Giá</label>' +
                        '<div class="col-sm-10">' +
                            '<input type="text" name="price" class="form-control" id="price" placeholder="Giá sản phẩm...">' +
                        '</div>' +
                    '</div>' +
                    '<div class="form-group row">' +
                        '<label for="qty" class="col-sm-2 col-form-label">Số lượng</label>' +
                        '<div class="col-sm-10">' +
                            '<input type="text" name="qty" class="form-control" id="qty" placeholder="Số lượng sản phẩm...">' +
                        '</div>' +
                    '</div>';
        $('#info_sell_by_pro_type').html(output);       
    }
});
// thêm kích cỡ
var countRowInsertProductM = 2;
function addRowInsertProductM(){
    let output = '<tr id="tr_'+countRowInsertProductM+'">' +
                    '<th scope="row">'+countRowInsertProductM+'</th>' +
                    '<td>' +
                        '<input type="text" name="size[]" class="form-control">' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="price[]" class="form-control">' +
                    '</td>' +
                    '<td>' +
                        '<input type="text" name="qty[]" class="form-control">' +
                    '</td>' +
                    '<td><button type="button" class="btn btn-sm btn-danger" onclick="removeRowInsertProductM('+countRowInsertProductM+')"><i class="fas fa-trash-alt"></i></button></td>' +
                '</tr>';
    $('.tInsertProductM tbody').append(output);
    countRowInsertProductM++;
}
function removeRowInsertProductM(num)
{
    $('.tInsertProductM #tr_'+num).remove();
}
