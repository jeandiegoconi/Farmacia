function carritoProducto(id, token) {
    let url = 'controller/classes/carrito.php'
    let formData = new FormData()
    formData.append('id', id)
    formData.append('token', token)

    fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                let elemento = document.getElementById("num_carr")
                elemento.innerHTML = data.numero
            }
        })
}