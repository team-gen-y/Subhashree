var items = ['Rice', 'Water Bottle 1 Ltr', 'Clothes', 'Medicines', 'Bread'];
var prices = [100, 30, 100, 100, 50];

function incrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
    var index = parseInt(fieldName.replace('quantity_', ''));
    var price = prices[index] * (currentVal + 1);
    if (!isNaN(currentVal)) {
        parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        $("#price_" + index).html(price);
        $("#totalAmount").html(calculateTotalAmount());
    } else {
        parent.find('input[name=' + fieldName + ']').val(0);
        $("#price_" + index).html(0);
        $("#totalAmount").html(calculateTotalAmount());
    }
}

function decrementValue(e) {
    e.preventDefault();
    var fieldName = $(e.target).data('field');
    var parent = $(e.target).closest('div');
    var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
    var index = parseInt(fieldName.replace('quantity_', ''));
    var price = prices[index] * (currentVal - 1);
    if (!isNaN(currentVal) && currentVal > 0) {
        parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        $("#price_" + index).html(price);
        $("#totalAmount").html(calculateTotalAmount());
    } else {
        parent.find('input[name=' + fieldName + ']').val(0);
        $("#price_" + index).html(0);
        $("#totalAmount").html(calculateTotalAmount());
    }
}

function calculateTotalAmount() {
    var amount = 0;
    $('.prices').each( function() {
        amount += parseInt($(this).html());
    });
    return amount;
}

function genTableItem(item, price, index) {
    var html = '';
    html += "<tr>";
    html += "<td>" + item + "</td>";
    html += "<td>";
    html += `<div class="input-group">
    <input type="button" value="-" class="button-minus" data-field="quantity_` + index + `">
    <input type="number" step="1" max="" value="0" name="quantity_` + index + `" class="quantity-field" id="item_` + index + `">
    <input type="button" value="+" class="button-plus" data-field="quantity_` + index + `">
  </div>
  `;
    html += '</td>';
    html += '<td id="price_' + index + '" class="prices">' + 0 + '</td>';
    html += "</tr>";
    return html;
}

$(document).ready(function () {
    var html = '';
    for (var i = 0; i < items.length; i++) {
        html += genTableItem(items[i], prices[i], i);
    }
    $("#table1body").html(html);
    $('.button-plus').click((e) => {
        incrementValue(e);
    });
    $('.button-minus').click((e) => {
        decrementValue(e);
    });
    $("#totalAmount").html(0);

});