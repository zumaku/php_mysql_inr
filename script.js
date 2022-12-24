const btnTbData = document.getElementById('btnTbData');
const tambahData = document.getElementById('formData');
const btnPushData = document.getElementById('BtnPushData');

btnTbData.addEventListener('click', function(){
    tambahData.removeAttribute('hidden');
    btnPushData.removeAttribute('hidden');
});