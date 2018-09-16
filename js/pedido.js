
function mandar_datos(nombre){

  var producto = $('#pedido').html();
  $('#pedido').text(nombre + ' , ' + producto);

};



console.log("conectada con pedidos.js")