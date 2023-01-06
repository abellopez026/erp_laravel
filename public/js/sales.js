

//SELECT de productos
var products = document.getElementById("products");
var customers = document.getElementById("customers");
var table = document.getElementById("myTable");
var save = document.getElementById("save");
var add = document.getElementById("add");

var count = 0;
var totalVenta = 0;

add.addEventListener("click", addItem);
save.addEventListener("click", sendData);

const data = [];

function addItem() {
    var id = products.options[products.selectedIndex].value;
    var name = products.options[products.selectedIndex].text;
    var cantity = parseFloat(document.querySelector('#cantity').value);
    var price = parseFloat(document.querySelector('#price').value);
    var total = cantity * price;
    total = parseFloat(total.toFixed(2));
    totalVenta = parseFloat(totalVenta + total);

    data.push({
        id,
        name,
        cantity,
        price,
        total
   });

   addToTable(name, cantity, price, total);

   console.log(data);

}


function addToTable(nombre, cantidad, precio, total) {

    var fila = '<tr id=' + count +'> <td>' + nombre + '</td><td>' + cantidad + ' </td> <td> ' + precio + '</td><td> ' + total + '</td> <td> <a href="#" class="btn btn-danger btn-sm" onclick="deleteData(' + count + ')";><i class="fa-solid fa-trash"></i></a> </td></tr>';

    count++;

    $("#myTable").append(fila);

    document.getElementById("total").innerHTML = "<b> Total: $ " + totalVenta + "</b> ";

}


function deleteData(id) {
    document.getElementById(id).remove();

    delete data[id];

    //Limpia los valores undefinidos del array
    var filtered = data.filter(function(x) {
        return x !== undefined;
    });

}


function setDataCustomer(e) {
    document.getElementById("address").value = e.target.options[e.target.selectedIndex].dataset.address;

    document.getElementById("phone").value = e.target.options[e.target.selectedIndex].dataset.phone;
}

function setDataProduct(e) {
    document.getElementById("price").value = e.target.options[e.target.selectedIndex].dataset.price;
}


function sendData() {

    /* const sale = [];

    var invoice_no = document.getElementById("invoice_no").value;
    var customer_id = customers.options[customers.selectedIndex].value;
    var isCanceled = document.getElementById('isCanceled').checked;
    var total = totalVenta;
    var date = document.getElementById("date").value;

    sale.push({
        invoice_no ,
        customer_id ,
        isCanceled ,
        total,
        date
    });

    console.log(sale); */

    enviar(); 

}


/* // Select que devuelven el nombre del cliente y producto
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

    var id = product.options[product.selectedIndex].value;
    var nombre = product.options[product.selectedIndex].text;
    var cantidad = parseFloat(document.querySelector('#cantity').value);
    var precio = parseFloat(document.querySelector('#price').value);
    var total = cantidad * precio;
/*     total = total.toFixed(2); */

    /* totalFactura += total;

    var fila = '<tr id=' + id + '><td id=' + cant + '>' + cant + '</td><td>' + nombre + '</td><td>' + cantidad + ' </td> <td> ' + precio + '</td><td> ' + total + '</td> <td> <a href="#" class="btn btn-outline-danger" onclick="deleteRow(' + cant + ')";><i class="fa-solid fa-trash"></i></a> </td></tr>';

    $("#table").append(fila);


    product.selectedIndex = 0;
    $("#cantity").val('');
    $("#price").val('');
    $("#total").val('');

    cant++; */

    /* document.getElementById("totalFinal").innerHTML = "$ " + totalFactura + ""; */



/* } */


//Funcion que envia la informacion a traves de AJAX a la ruta controller post laravel

/* function saveSale() {

    var sale = [];
    var arrayOfThisRow = [];

    //Obteniendo datos necesarios para la tabla de ventas (NO detalle de venta)
    var invoice = document.querySelector('#invoice_no').value;
    var idCliente = customer.options[customer.selectedIndex].value;
    var status = "Pendiente";
    var totalF = totalFactura;

    // Array con la informacion para la venta (Sale)
    sale.push({
        invoice_no: invoice,
        customer_id: idCliente,
        status: status,
        total: totalF
    });

    // Recorre cada td de la tabla y guarda la info en un array (detailSale)
    $("#tbody tr").each(function() {

        var idP = $(this).attr('id');
        var cantity = $(this).find('td:eq(2)').text();
        var price = $(this).find('td:eq(3)').text();
        var total = $(this).find('td:eq(4)').text();

        arrayOfThisRow.push({
            product_id: idP,
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


} */

