

let deleteModal = document.getElementById('deleteModal')
deleteModal.addEventListener('show.bs.modal',function(event){
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')
            let buttonDelete = deleteModal.querySelector('.modal-footer #btn-delete')
            buttonDelete.value = id
})

function deleteItem() {

    let buttonDelete = document.getElementById('btn-delete')
    let id = buttonDelete.value


    let url = './classes/actualizarCarrito.php'
    let formData = new FormData()
    formData.append('action', 'deleteItem')
    formData.append('id', id)

    fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                    location.reload()
            }
        })
    }



function cantidadCarrito(cantidad, id) {
    let url = './classes/actualizarCarrito.php'
    let formData = new FormData()
    formData.append('action', 'agregar')
    formData.append('id', id)
    formData.append('cantidad', cantidad)

    fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                let divsubtotal = document.getElementById('subtotal_' + id)
                divsubtotal.innerHTML = data.sub
                let total = 0
                let list = document.getElementsByName('subtotal[]')
                for (let i = 0; i<list.length; i++){
                    total += parseFloat(list[i].innerHTML.replace(/[$.]/g, ''))
                }
                document.getElementById('total').innerHTML = '$' + total

            }
        })
}