var totalFactura = 0;
var cant = 1;


// Select que devuelven el nombre del cliente y producto
var customer = document.getElementById("idCustomer");
var product = document.getElementById("idProduct");

// Boton para agregar un nuevo producto a la tabla y guardar la venta
var addProduct = document.getElementById("addProduct");
var save = document.getElementById("saveSale");

// Obtiene la tabla paa insertar los datos
var tabla = document.getElementById("table");


addProduct.addEventListener("click", add);
save.addEventListener("click", saveSale);


// Funcion que añade un producto a la tabla HTML
function add() {

    var nombre = product.options[product.selectedIndex].text;
    var cantidad = parseFloat(document.querySelector('#cantity').value);
    var precio = parseFloat(document.querySelector('#price').value);
    var total = cantidad * precio;
/*     total = total.toFixed(2); */

    totalFactura += total;


    //Variable que asigna el id a una fila, para poder eliminarla
    var id_row = 'row' + cant;


    var fila = '<tr id=' + id_row + '><td id=' + cant + '>' + cant + '</td><td>' + nombre + '</td><td>' + cantidad + ' </td> <td> ' + precio + '</td><td> ' + total + '</td> <td> <a href="#" class="btn btn-outline-danger" onclick="deleteRow(' + cant + ')";><i class="fa-solid fa-trash"></i></a> </td></tr>';

    //Inserta la fila en la tabla
    $("#table").append(fila);

    //Limpia los input
    product.selectedIndex = 0;
    $("#cantity").val('');
    $("#price").val('');
    $("#total").val('');

    cant++;

    /* document.getElementById("totalFinal").innerHTML = "$ " + totalFactura + ""; */



}


//Funcion que envia la informacion a traves de AJAX a la ruta controller post laravel

function saveSale() {

    var sale = [];
    var arrayOfThisRow = [];

    //Obteniendo datos necesarios para la tabla de ventas (NO detalle de venta)
    var noOrden = document.getElementById("no").text;
    var idCliente = customer.options[customer.selectedIndex].value;
    var status = "Pendiente";
    var totalF = totalFactura;

    // Array con la informacion para la venta (Sale)
    sale.push({
        invoice_no: 1234,
        customer_id: idCliente,
        status: status,
        total: totalF
    });

    // Recorre cada td de la tabla y guarda la info en un array (detailSale)
    $("#tbody tr").each(function() {

        var name = $(this).find('td:eq(1)').text();
        var cantity = $(this).find('td:eq(2)').text();
        var price = $(this).find('td:eq(3)').text();
        var total = $(this).find('td:eq(4)').text();

        arrayOfThisRow.push({
            name: name,
            cantity: cantity,
            price: price,
            total: total
       });

    });

    // Une el arrray de la venta con el detalle de la venta
    var datos = {
        "sale": sale,
        "sale_detail": arrayOfThisRow
    }


    var json = JSON.stringify(datos);

    ajax(json);
}



/* function deleteRow(row) {
    $("#row" + row).remove;
} */
