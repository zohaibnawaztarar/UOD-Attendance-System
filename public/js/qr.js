(function () {
let scanner = new Instascan.Scanner(
    {
        video: document.getElementById('preview')
    }
);
scanner.addListener('scan', function(content) {
    alert('Escaneou o conteudo: ' + content);
    window.open(content, "_blank");
});
Instascan.Camera.getCameras().then(cameras =>
{
    if(cameras.length > 0){
        scanner.start(cameras[0]);
    } else {
        console.error("Não existe câmera no dispositivo!");
    }
});
})();
