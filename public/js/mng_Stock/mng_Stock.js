function calcPrice(val)
{
    calcItemPrice(val);
    calcTotalPrice();
}

function calcItemPrice(val)
{
    
    var p = document.getElementById("item_price["+val+"]").value * document.getElementById("order_qty["+val+"]").value;
    p = p.toFixed(2);
    document.getElementById("item_total_price["+val+"]").value = p;
}

function calcTotalPrice()
{
    var total = 0;
    
    var num = document.getElementById("orderCartTable").rows.length-1;
    for(var a = 1; a < num; a++)
    {
        var iP = document.getElementById("item_total_price["+a+"]").value;

        total = Number(total) + Number(iP);
    }
    total = total.toFixed(2);
    document.getElementById("totalPrice").value = total;
}