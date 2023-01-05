// tombol tambah data
const btnTbData = document.getElementById('btnTbData');
const tambahData = document.getElementById('formData');
const btnPushData = document.getElementById('BtnPushData');
const cancelData = document.getElementById('cancelData');

btnTbData.addEventListener('click', function(){
    tambahData.removeAttribute('hidden');
    btnPushData.removeAttribute('hidden');
});
cancelData.addEventListener('click', function(){
    tambahData.removeAttribute('hidden');
    btnPushData.removeAttribute('hidden');
});


// tombol edit data
const btnEdData = document.getElementById('btnEdData');
const aksiEdit = document.getElementsByClassName('aksiEdit');
btnEdData.addEventListener('click', function(){
    for(let i=0; i<aksiEdit.length; i++){
        aksiEdit[i].removeAttribute('hidden');
    }
});


