

        function addRow() {
            var tr = '<tr>' +
                ' <td><input type="text" name="item_id[]" placeholder="Enter Item ID" class="form-control" required=""></td>' +
                '<td><input type="number" name="req_qty[]" placeholder="Enter Item Quantity" class="form-control quantity" required=""></td>' +
                '<td><a href="#" class="btn btn-danger remove">-</a></td>' +
                '</tr>'

            $('tbody').append(tr);
        };
        $('.remove').live('click', function() {
            var last = $('tbody tr').length;
            if (last == 1) {
                alert("Error ! Last row cannot be deleted.");
            } else {
                $(this).parent().parent().remove();
            }

        });

