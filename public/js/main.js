const achats = document.getElementById('achats');
if(achats){
    achats.addEventListener('click', e => {
        if(e.target.className === 'btn btn-danger delete-achat'){
            if(confirm('Voulez vous suprimer !!')){
                const id = e.target.getAttribute('data-id');
                alert(id);
            }
        }
    });
}