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